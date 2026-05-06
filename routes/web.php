<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WisataController;
use App\Models\Visitor;
use App\Models\PaketWisata;
use App\Models\Pesanan;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendResetOtp']);

Route::get('/reset-password/{unique_id}', [AuthController::class, 'showResetForm'])->name('reset.password');
Route::post('/reset-password/{unique_id}', [AuthController::class, 'updatePassword']);

Route::get('/auth-google-redirect', [AuthController::class, 'google_redirect']);
Route::get('/auth-google-callback', [AuthController::class, 'google_callback']);

Route::group(['middleware' => ['auth', 'check_role:costumer']], function(){
    Route::get('/verify', [VerificationController::class, 'index']);
    Route::post('verify', [VerificationController::class, 'store']);
    Route::get('/verify/{unique_id}', [VerificationController::class, 'show']);
    Route::put('/verify/{unique_id}', [VerificationController::class, 'update']);
});

Route::group(['middleware' => ['auth', 'check_role:costumer', 'check_status']], function(){
    Route::get('/costumer', fn () => 'halaman costumer');
});
Route::group(['middleware' => ['auth', 'check_role:admin,staff']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
Route::get('/welcome', function () {

    Visitor::firstOrCreate([
        'ip_address' => request()->ip(),
        'visit_date' => now()->toDateString(),
    ]);

    $semua_paket = PaketWisata::latest()->get(); 
    return view('welcome', compact('semua_paket'));
});
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/tentang', function () {
    return view('tentang');
});
Route::get('/maps', function () {
    return view('maps');
});

Route::get('/nambah-wisata', [WisataController::class, 'create']);
Route::post('/nambah-wisata', [WisataController::class, 'store']);

Route::get('/dashboard', function () {
    $total_users = User::count();
    $pengunjung_hari_ini = Visitor::where('visit_date', now()->toDateString())->count();
    $total_paket = PaketWisata::count();
    $total_order = Pesanan::count();

    $data_bulanan = [];
    for ($bulan = 1; $bulan <= 12; $bulan++) {

        $data_bulanan[] = Pesanan::whereMonth('created_at', $bulan)
                                 ->whereYear('created_at', date('Y'))
                                 ->count();
    }

    $semua_paket = PaketWisata::all(); 
    $destinasi = [];

    // Looping data asli dari database untuk dijadikan bahan SPK
    foreach($semua_paket as $paket) {
        $destinasi[$paket->nama_paket] = [
            // Menghitung berapa kali paket ini diorder di tabel pesanan
            'pesanan' => Pesanan::where('paket_wisata_id', $paket->id)->count(), 
            // Misal rating sementara di-set statis (atau ambil dari tabel Review jika ada)
            'rating'  => 4.5, 
            // Mengambil harga asli dari database
            'harga'   => $paket->harga 
        ];
    }

    // Bobot SPK (Bisa statis atau dipanggil dari tabel pengaturan_spk)
    $w_pesanan = 0.40; 
    $w_rating  = 0.30; 
    $w_harga   = 0.30; 

    // Mencegah error jika database paket masih kosong
    if(count($destinasi) > 0) {
        $c1_max = max(array_column($destinasi, 'pesanan')); $c1_min = min(array_column($destinasi, 'pesanan'));
        $c2_max = max(array_column($destinasi, 'rating'));  $c2_min = min(array_column($destinasi, 'rating'));
        $c3_max = max(array_column($destinasi, 'harga'));   $c3_min = min(array_column($destinasi, 'harga'));

        $hasil_spk = [];
        foreach ($destinasi as $nama => $kriteria) {
            $u_pesanan = ($c1_max - $c1_min != 0) ? ($kriteria['pesanan'] - $c1_min) / ($c1_max - $c1_min) : 0;
            $u_rating  = ($c2_max - $c2_min != 0) ? ($kriteria['rating'] - $c2_min) / ($c2_max - $c2_min) : 0;
            $u_harga   = ($c3_max - $c3_min != 0) ? ($c3_max - $kriteria['harga']) / ($c3_max - $c3_min) : 0; 

            $nilai_akhir = ($w_pesanan * $u_pesanan) + ($w_rating * $u_rating) + ($w_harga * $u_harga);

            $hasil_spk[] = [
                'nama'  => $nama,
                'nilai' => round($nilai_akhir, 3)
            ];
        }

        $ranking_spk = $hasil_spk; 
    usort($ranking_spk, function($a, $b) {
        return $b['nilai'] <=> $a['nilai'];
    });

    $label_terlaris = [];
    $data_terlaris = [];
    
    // Ambil maksimal 4 destinasi terbaik dari hasil SPK
    $top_4 = array_slice($ranking_spk, 0, 4);
    
    foreach($top_4 as $top) {
        $label_terlaris[] = $top['nama'];
        $data_terlaris[] = $destinasi[$top['nama']]['pesanan'] ?? 0; 
    }

    return view('dashboard', compact(
        'total_users', 'pengunjung_hari_ini', 'total_paket', 'total_order', 
        'data_bulanan', 'ranking_spk', 'label_terlaris', 'data_terlaris'
    ));
}})->middleware('auth');

Route::get('/spk-smart', function () {
    $destinasi = [
        'Bali'        => ['pesanan' => 60, 'rating' => 4.8, 'harga' => 1500000],
        'Jogja'       => ['pesanan' => 35, 'rating' => 4.5, 'harga' => 1000000],
        'Bromo'       => ['pesanan' => 45, 'rating' => 4.9, 'harga' => 1200000],
        'Bandung'     => ['pesanan' => 30, 'rating' => 4.6, 'harga' => 500000],
    ];
    
    $bobot = ['pesanan' => 40, 'rating' => 30, 'harga' => 30];

    return view('spk-smart', compact('destinasi', 'bobot'));
});

Route::post('/spk-smart', function (Request $request) {
    $destinasi = $request->destinasi;
    $bobot = $request->bobot;

    // Konversi persen ke desimal
    $w_pesanan = $bobot['pesanan'] / 100;
    $w_rating  = $bobot['rating'] / 100;
    $w_harga   = $bobot['harga'] / 100;

    // Mencari nilai Max & Min
    $c1_max = max(array_column($destinasi, 'pesanan')); 
    $c1_min = min(array_column($destinasi, 'pesanan'));
    
    $c2_max = max(array_column($destinasi, 'rating'));  
    $c2_min = min(array_column($destinasi, 'rating'));
    
    $c3_max = max(array_column($destinasi, 'harga'));   
    $c3_min = min(array_column($destinasi, 'harga'));

    $utility = [];
    $hasil_spk = [];

    foreach ($destinasi as $nama => $kriteria) {

        $u_pesanan = ($c1_max - $c1_min != 0) ? ($kriteria['pesanan'] - $c1_min) / ($c1_max - $c1_min) : 0;
        $u_rating  = ($c2_max - $c2_min != 0) ? ($kriteria['rating'] - $c2_min) / ($c2_max - $c2_min) : 0;
        $u_harga   = ($c3_max - $c3_min != 0) ? ($c3_max - $kriteria['harga']) / ($c3_max - $c3_min) : 0; 

        $utility[$nama] = [
            'u_pesanan' => round($u_pesanan, 3),
            'u_rating'  => round($u_rating, 3),
            'u_harga'   => round($u_harga, 3),
        ];

        $nilai_akhir = ($w_pesanan * $u_pesanan) + ($w_rating * $u_rating) + ($w_harga * $u_harga);

        $hasil_spk[] = [
            'nama'  => $nama,
            'nilai' => round($nilai_akhir, 3)
        ];
    }

    $ranking_spk = $hasil_spk; 
    usort($ranking_spk, function($a, $b) {
        return $b['nilai'] <=> $a['nilai'];
    });

    return view('spk-smart', compact('destinasi', 'bobot', 'utility', 'ranking_spk'));
});