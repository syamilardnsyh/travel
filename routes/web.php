<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', fn () => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

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
Route::get('/welcome', function (){
    return view('welcome');
});
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/tentang', function () {
    return view('tentang');
});