<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function profile()
        {
            $user = Auth::user();
            return view('costumer.profile', compact('user'));
        }
        
   public function riwayatPesanan()
        {
    $pesanan = Pesanan::where('user_id', Auth::id())
                    ->latest()
                    ->get();
    return view('costumer.pesanan', compact('pesanan'));
        }

    public function pembayaranSaya()
        {
            $pesanan = Pesanan::where('user_id', Auth::id())
                ->latest()
                ->get();
            return view('costumer.pembayaran', compact('pesanan'));
        }
        public function bantuan()
        {
            return view('bantuan');
        }   
}
