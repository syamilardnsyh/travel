<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    $jumlah_orang = (int) $request->jumlah;
    $total_harga = $paket->harga * $jumlah_orang;
    $pesanan = Pesanan::create([

        'user_id' => auth()->id(),
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
    $request->validate([
        'metode_pembayaran' => 'required',
        'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png,jfif|max:2048'
    ]);

    $pesanan = Pesanan::findOrFail($id);
    $file = $request->file('bukti_pembayaran');
    $nama_file = time().'_'.$file->getClientOriginalName();
    $file->move(public_path('bukti'), $nama_file);
    $pesanan->update([
        'metode_pembayaran' => $request->metode_pembayaran,
        'bukti_pembayaran' => $nama_file,
        'status' => 'menunggu_verifikasi'
    ]);
    return back()->with('success', 'Bukti pembayaran berhasil diupload');
}
}