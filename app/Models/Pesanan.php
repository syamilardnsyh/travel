<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'user_id',
        'paket_wisata_id',
        'nama_pemesan',
        'no_hp',
        'tanggal',
        'jumlah_orang',
        'total_harga',
        'status',
        'metode_pembayaran',
        'bukti_pembayaran'
    ];

    public function paket()
    {
        return $this->belongsTo(PaketWisata::class, 'paket_wisata_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}