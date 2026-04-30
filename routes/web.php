<?php

use Illuminate\Support\Facades\Route;
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

    return view('dashboard', compact('total_users', 'pengunjung_hari_ini', 'total_paket', 'total_order', 'data_bulanan'));
    })->middleware('auth');