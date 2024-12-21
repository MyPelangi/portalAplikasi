@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="border rounded px-5 py-5">
        <img class="w-75 mb-3" src="https://koranbumn.com/wp-content/uploads/2020/11/briin.png" alt="">
        <form action="{{ route('forgot-password') }}" method="POST">
            @include('partials/pesan')
            @csrf
            <div class="mb-3 w-75">
                <label for="name" class="form-label">Email Kantor</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-1">
                <button type="submit" class="btn btn-danger">Request Password Reset</button>
            </div>
            <div class="mb-1">
                <a class="btn btn-primary" href="/">Login</a>
            </div>
        </form>
    </div>
    <div class="title w-50 ms-5 px-5">
        <h3 class="mb-auto">Portal Aplikasi</h3>
        <p><b>BRI ASURANSI INDONESIA</b></p>
        <br>
        <p class="mb-auto"><b>lupa email?</b></p>
        <p style="font-weight: lighter">Jika anda lupa dengan email anda atau belum memiliki email BRINS, harap melaporkan ke divisi TSI</p>
    </div>
</div>
@endsection
