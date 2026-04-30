<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'nama_pemesan', 
        'no_whatsapp', 
        'paket_wisata_id', 
        'tanggal_berangkat', 
        'jumlah_peserta', 
        'status'
    ];
}
