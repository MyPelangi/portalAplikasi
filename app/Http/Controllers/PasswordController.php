<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function sendResetLink(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect('/forgot-password')->withErrors('User not found');
        }

        $token = Str::random(64);

        // Hapus token lama, jika ada
        DB::table('password_resets')->where('email', $user->email)->delete();

        // Simpan token baru ke tabel password_resets
        DB::table('password_resets')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        $resetLink = url('/confirm-reset/' . $token);
        Mail::send('auth.mailResetPassword', ['link' => $resetLink], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password');
        });

        return redirect('/forgot-password')->with('status', 'Reset link sent');
    }

    public function confirmReset($token)
    {
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();
        if (!$passwordReset) {
            return response()->json(['message' => 'Invalid token'], 404);
        }

        // Dapatkan user berdasarkan email
        $user = User::where('email', $passwordReset->email)->first();

        // Generate password baru
        $newPassword = Str::random(8);

        // Update password di database
        $user->password = Hash::make($newPassword);
        $user->save();

        // Hapus token setelah reset selesai
        DB::table('password_resets')->where('email', $user->email)->delete();

        // Kirim email dengan password baru
        Mail::send('auth.mailNewPassword', ['name' => $user->name, 'password' => $newPassword], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Your New Password');
        });

        return redirect('/forgot-password')->with('sukses', 'Password has been reset and emailed');
    }
}
