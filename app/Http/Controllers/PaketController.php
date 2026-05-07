<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaketWisata;

abstract class Controller
{
    public function index()
    {
        $paket = PaketWisata::all();
        return view('paket.index', compact('paket'));
    }
}

class PaketController extends Controller
{
    public function detail(int $id)
    {
        $paket = PaketWisata::findOrFail($id);

        return view('paket.detail', compact('paket'));
    }
}
