<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Str;
use App\Models\Verification;
use App\Mail\OtpEmail;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:50',
        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            if(Auth::user()->role == 'costumer') return redirect('/welcome');
            return redirect('/dashboard');
        }
        return back()->with('failed', 'Email atau Password salah');
    }

    function register(Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|max:50|min:8',
            'confirm_password' => 'required|max:50|min:8|same:password',
        ]);

        $request['status'] = "verify";
        $user = User::create($request->all());
        Auth::login($user);
        return redirect('/verify');
    }

    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function google_callback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::whereEmail($googleUser->email)->first();
        if(!$user){
            $user = User::create([
        'name' => $googleUser->name,
        'email' => $googleUser->email,
        'status' => 'active',
    // password acak yang dienkripsi 
        'password' => bcrypt(Str::random(16)), 
        ]);
        }
        if($user && $user->status == 'banned'){
            return redirect('/login')->with('failed', 'Akun kamu telah di bekukan');
        }
        if($user && $user->status == 'verify'){
            $user->update(['status' => 'active']);
        }
        Auth::login($user);
        if($user->role == 'costumer') return redirect('/welcome');
        return redirect('/welcome');
    }

    public function logout(){
        Auth::logout(Auth::user());
        return redirect('/welcome');
    }

    // Menampilkan halaman Lupa Password
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    // Proses email dan mengirim OTP
    public function sendResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan di sistem kami.');
        }

        // Buat data verifikasi baru
        $otp = rand(100000, 999999);
        $unique_id = uniqid();

        $verify = Verification::create([
            'user_id' => $user->id,
            'unique_id' => $unique_id,
            'otp' => md5($otp),
            'type' => 'reset_password',
            'send_via' => 'email',
            'status' => 'active'
        ]);

        // Kirim email
        Mail::to($user->email)->send(new OtpEmail($otp, $user->name));

        return redirect('/reset-password/'.$unique_id)->with('success', 'Kode OTP reset password telah dikirim ke email Anda.');
    }

    // Menampilkan halaman Input Password Baru
    public function showResetForm($unique_id)
    {
        // Cari data verifikasi yang statusnya masih active
        $verify = Verification::where('unique_id', $unique_id)
                    ->where('type', 'reset_password')
                    ->where('status', 'active')
                    ->first();

        if (!$verify) abort(404);

        return view('auth.reset-password', compact('unique_id'));
    }

    // Memproses update password baru
    public function updatePassword(Request $request, $unique_id)
    {
        // Validasi wajib isi OTP dan Password konfirmasi
        $request->validate([
            'otp' => 'required',
            'password' => 'required|min:6|confirmed' 
        ]);

        $verify = Verification::where('unique_id', $unique_id)
                    ->where('type', 'reset_password')
                    ->where('status', 'active')
                    ->first();

        if (!$verify) abort(404);

        // Cek OTP apakah sama kek yang user input di database
        if (md5($request->otp) != $verify->otp) {
            // Jika salah, kembalikan ke halaman tadi dengan pesan error
            return back()->withErrors(['otp' => 'Kode OTP salah atau tidak valid!']);
        }

        // Jika OTP benar, update password user
        $user = User::find($verify->user_id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        // Nonaktifkan verifikasi agar OTP hangus dan tidak bisa dipakai lagi
        $verify->update(['status' => 'invalid']);

        return redirect('/login')->with('success', 'Password berhasil diubah. Silakan login dengan password baru.');
        
        // total pengunjung web
        $pengunjung_hari_ini = Visitor::whereDate('created_at', Carbon::today())->count();

        return view('dashboard', compact('total_users', 'pengunjung_hari_ini'));
    }

}