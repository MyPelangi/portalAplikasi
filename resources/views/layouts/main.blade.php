<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal Aplikasi BRINS</title>
    <!-- Fonts and Icons -->
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.jpg">
    <link rel="icon" type="image/jpg" href="img/apple-icon.jpg">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/now-ui-dashboard.css') }}">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/css/perfect-scrollbar.css" />
    <script src="{{ asset('js/asset.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.5/dist/perfect-scrollbar.min.js"></script>

    <script src="https://kit.fontawesome.com/9e3d37c2e9.js" crossorigin="anonymous"></script>


</head>
<body class="">
    <div id="content" class="wrapper">
        @if(Auth::check())
            @include('partials/sidebar')
            <div class="main-panel" id="main-panel">
                @include('partials/navbar')
                <div class="panel-header panel-header-sm">
                </div>
        @endif
                <div  class="content">
                    @yield('container')
                </div>
            </div>
    </div>
  </body>
</html>
