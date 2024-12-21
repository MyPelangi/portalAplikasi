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

    public function updatepassword(Request $request){
        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $hashedPassword)) {

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect('/')->with('status', 'Password berhasil di update');

        }else{
            return redirect()->back()->with('error', 'Password lama tidak valid');
        }
    }
}
