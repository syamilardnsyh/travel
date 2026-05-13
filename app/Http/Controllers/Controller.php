<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;
use App\Models\Pesanan;

abstract class Controller
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
    $pesanan->update([
        'status' => 'dibayar'
    ]);

    return back();
}
}
