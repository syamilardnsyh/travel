<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Visitor;
use App\Models\PaketWisata;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $total_users = User::count();
        $pengunjung_hari_ini =
            Visitor::where('visit_date', now()->toDateString())->count();
        $total_paket = PaketWisata::count();
        $total_order = Pesanan::count();

        return view('dashboard', compact(
            'total_users',
            'pengunjung_hari_ini',
            'total_paket',
            'total_order'
        ));
    }

    public function pesanan()
    {
        $pesanan = Pesanan::with('paket')->latest()->get();
        return view('admin.pesanan', compact('pesanan'));
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