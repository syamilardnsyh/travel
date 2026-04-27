<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;

class WisataController extends Controller
{
    public function create()
    {
        return view('nambah-wisata'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required|numeric',
            'destinasi' => 'required',
            'durasi' => 'required',
            'gambar_paket' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Maks 2MB
            'deskripsi' => 'required'
        ]);

        $nama_gambar = time() . '.' . $request->gambar_paket->extension();
        $request->gambar_paket->move(public_path('images/paket'), $nama_gambar);

        PaketWisata::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'destinasi' => $request->destinasi,
            'durasi' => $request->durasi,
            'gambar_paket' => $nama_gambar,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('success', 'Paket wisata baru berhasil ditambahkan!');
    }
}
