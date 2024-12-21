<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/login');
    }

    public function login(Request $request){
        Session::flash('name', $request->username);
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],[
            'username.required' => 'Nama wajib diisi',
            'password.required' => 'Password wajib diisi',
            'captcha.required' => 'Captcha wajib diisi',
            'captcha.captcha' => 'Captcha tidak valid',
        ]);

         // Cek apakah pengguna dengan username ini memiliki status_p = 1
        $user = \App\Models\User::where('name', $request->username)->first();
        if (!$user || $user->status_p != 1) {
            return redirect('/')->withErrors('Akun Anda tidak diizinkan untuk login.');
        }

        $infologin = [
            'name' => $request->username,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // Login berhasil
            $user = Auth::user(); // Ambil user yang sedang login
            $user->setLoginStatus(true); // Set status_login = 1 dan generate token_login.

            return redirect('/home');
        }else{
            // kalau otentikasi gagal
            return redirect('/')->withErrors('Username dan password yang dimasukkan tidak valid');
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $user->setLoginStatus(false); // Set status_login = 0 dan hapus token_login
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'berhasil logout');
    }

}
