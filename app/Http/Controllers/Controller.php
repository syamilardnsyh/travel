<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Pesanan;

class Controller
{
   
public function index   ()
{
    $semua_paket = PaketWisata::all();
        return view('detail', compact('semua_paket'));
}

public function konfirmasi(int $id)
{
    $pesanan = Pesanan::findOrFail($id);
    return view('konfirmasi', compact('pesanan'));
}

public function verifikasi(int $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'pending';
        $pesanan->save();
        return back();
    }

    // admin konfirmasi
    public function dikonfirmasi(int $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'dikonfirmasi';
        $pesanan->save();
        return back()->with(
            'success',
            'Pesanan berhasil dikonfirmasi'
        );
    }

    // admin tolak
    public function tolak(int $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = 'ditolak';
        $pesanan->save();
        return back()->with(
            'success',
            'Pesanan berhasil ditolak'
        );
    }
}
