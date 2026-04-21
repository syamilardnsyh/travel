<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Str;

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
    // Berikan password acak yang dienkripsi 
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
}
