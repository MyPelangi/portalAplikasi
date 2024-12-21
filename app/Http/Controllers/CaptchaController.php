<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function index(){

        return view('sesi/login');
    }

    public function reloadCaptcha(){
        return response()->json(['captcha'=>captcha_img('flat')]);
    }
}
