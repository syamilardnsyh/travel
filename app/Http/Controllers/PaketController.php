<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PaketWisata;
use App\Models\Pesanan;

class PaketController extends Controller
{
    public function detail(int $id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('detail', compact('paket'));
    }

  public function pesan(Request $request)
  {
    $paket = PaketWisata::findOrFail($request->paket_id);
    $jumlah_orang = (int) $request->jumlah_orang;
    $total_harga = $paket->harga * $jumlah_orang;
    $pesanan = Pesanan::create([

        'user_id' => Auth::id(),
        'paket_wisata_id' => $paket->id,
        'nama_pemesan' => $request->nama_pemesan,
        'no_hp' => $request->no_hp,
        'tanggal' => $request->tanggal,
        'jumlah_orang' => $request->jumlah_orang,
        'total_harga' => $total_harga,
        'status' => 'pending',
        ]);
        return redirect('/konfirmasi/'.$pesanan->id);
        }

public function konfirmasi(int $id)
    {
    $pesanan = Pesanan::findOrFail($id);
    return view('konfirmasi', compact('pesanan'));
    }
public function uploadBukti(Request $request, int $id)
{
    $pesanan = Pesanan::find($id);
    if($request->hasFile('bukti_pembayaran')){
        $file = $request->file('bukti_pembayaran');
        $namaFile = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('bukti'), $namaFile);
        $pesanan->bukti_pembayaran = $namaFile;
        $pesanan->metode_pembayaran =
            $request->metode_pembayaran;
        // INI PENTING
        $pesanan->status = 'pending';
        $pesanan->save();
    }
    return back()->with(
        'success',
        'Bukti pembayaran berhasil diupload'
    );
}
}