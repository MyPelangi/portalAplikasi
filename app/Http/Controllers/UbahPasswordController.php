<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function index(){
        return view('ubahpassword');
    }

    public function updatepassword(Request $request)
    {
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/'
        ]);

        // Ambil password yang telah di-hash dari pengguna yang sedang login
        $hashedPassword = Auth::user()->pass_pegawai;

        // Verifikasi password lama
        if (Hash::check($request->current_password, $hashedPassword)) {

            // Update password baru
            $user = User::find(Auth::id());
            $user->pass_pegawai = Hash::make($request->password);
            $user->save();

            // Logout pengguna setelah password diperbarui
            Auth::logout();

            return redirect('/')->with('status', 'Password berhasil diupdate');
        } else {
            // Jika password lama tidak valid
            return redirect()->back()->with('error', 'Password lama tidak valid');
        }
    }

}
