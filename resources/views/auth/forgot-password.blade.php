@extends('layouts.main')

@section('container')
<div class="logincontainer">
    <div class="formkirimemail">
        <img class="logobrins mb-3" src="https://koranbumn.com/wp-content/uploads/2020/11/briin.png" alt="">
        <form action="{{ route('forgot-password') }}" method="POST">
            @include('partials/pesan')
            @csrf
            <div class="form-group mb-5">
                <label for="name" class="form-label">Email Kantor</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-danger w-100">Request Password Reset</button>
            </div>
            <div class="mb-1">
                <a class="btn btn-primary w-100" href="/">Kembali ke login</a>
            </div>
        </form>
    </div>
    <div class="lupapasstitle">
        <h1 class="mb-auto">Portal Aplikasi</h1>
        <p><b>BRI ASURANSI INDONESIA</b></p>
        <br>
        <p class="mb-auto"><b>Lupa email?</b></p>
        <p style="font-weight: lighter">Jika anda lupa dengan email anda atau belum memiliki email BRINS, harap melaporkan ke divisi TSI.</p>
    </div>
</div>
@endsection
