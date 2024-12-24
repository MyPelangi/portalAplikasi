@extends('layouts.main')

@section('container')
<div class="logincontainer">
    <div class="logintitle">
        <img class="logobrins" src="img/logo.png" alt="">
        <h4>Portal Aplikasi BRI Asuransi Indonesia</h4>
    </div>
    <div class="login">
        <h3>LOGIN</h3>
        <form action="/sesi/login" method="POST">
            @include('partials/pesan')
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" placeholder="Masukkan nama" value="{{ Session::get('username')}}" id="username" name="username" class="form-control">
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

<!-- Load jQuery jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reload').click(function(){
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    });

    $(function(){
        $(".passwordshow").click(function(event) {
            $(this).toggleClass('fa-eye fa-eye-slash');
            var x = $("#password").attr("type"); // mendapatkan tipe input saat ini
            if(x == "password"){
                $("#password").attr("type","text");
            }else{
                $("#password").attr("type","password");
            }
        });
    });
</script>

@endsection
