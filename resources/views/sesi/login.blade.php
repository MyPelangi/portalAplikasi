@extends('layouts.main')

@section('container')
<div class="logincontainer">
    <div class="logintitle">
        <div class="logobrins">
            <img src="img/logo.png" alt="">
        </div>
        <h5>Portal Aplikasi BRI Asuransi Indonesia</h5>
        <img class="illustration" style="width:500px;" src="img/illustrasi.svg" alt="">
    </div>
    <div class="login">
        <h3>LOGIN</h3>
        <form action="/sesi/login" method="POST">
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" placeholder="Masukkan nama" value="{{ old('username')}}" id="username" name="username" class="form-control">
                    @error('username')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Masukkan password" name="password" id="password" class="form-control">
                    <i class="fa fa-eye passwordshow"></i>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group mt-2 mb-2">
                <div class="captcha">
                    <span>{!! captcha_img('flat') !!}</span>
                    <button type="button" class="btn btn-danger reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
            </div>
            <div class="form-group mt-2 mb-3">
                <input type="text" class="form-control" placeholder="Masukkan captcha" id="captcha" name="captcha">
                @error('captcha')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
        <a href="/forgot-password">forgot password?</a>
    </div>
</div>
@endsection
