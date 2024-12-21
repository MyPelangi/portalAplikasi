@extends('layouts.main')

@section('container')
<div class="logincontainer d-flex justify-content-center align-items-center vh-100">
    <div class="login border rounded px-4 py-4" style="width: 400px;">
        <img class="logobrins mb-4" style="width: 300px;" src="https://koranbumn.com/wp-content/uploads/2020/11/briin.png" alt="">
        <form action="/sesi/login" method="POST">
            @include('partials/pesan')
            @csrf
            <div class="mb-3">
                <div class="form-group">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" placeholder="Masukkan nama" value="{{ Session::get('username')}}" name="username" class="form-control">
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" placeholder="Masukkan password" name="password" id="password" class="form-control">
                    <i class="fa fa-eye passwordshow"></i>
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
            <div class="form-group mt-2 mb-2">
                <input type="text" class="form-control" placeholder="Masukkan captcha" name="captcha">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">Login</button>
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
