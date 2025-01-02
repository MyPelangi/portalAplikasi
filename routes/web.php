<?php

use App\Models\User;
use Mews\Captcha\Captcha;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\SendEmailNewPassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SendEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\UbahPasswordController;

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ApplicationsController::class, 'internal'])->name('internal');
    Route::get('/eksternal', [ApplicationsController::class, 'eksternal'])->name('eksternal');
    Route::get('/ubahpassword', [UbahPasswordController::class, 'index'])->name('ubahpassword');
    Route::post('/ubahpassword/update', [UbahPasswordController::class, 'updatepassword'])->name('password.update');
    Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('daftarUser', UserController::class);
    Route::get('/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    Route::post('/users/reset-password/{id}', [UserController::class, 'reset'])->name('users.resetPassword');
    Route::put('/users/{id}/access', [UserController::class, 'updateAccess'])->name('users.updateAccess');
});

Route::middleware('guest')->group(function () {
    Route::get('/', [SessionController::class, 'index'])->name('login');
    Route::post('/sesi/login', [SessionController::class, 'login']);
    Route::get('/reload-captcha', [CaptchaController::class, 'reloadCaptcha']);
    Route::get('/captcha', [CaptchaController::class, 'index']);
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->name('forgot-password');
    Route::get('/confirm-reset/{token}', [PasswordController::class, 'confirmReset']);
});

