<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $table = 'paket_wisata';

    protected $fillable = [
        'nama_paket',
        'destinasi',
        'durasi',
        'harga',
        'deskripsi',
        'gambar_paket'
    ];
}
