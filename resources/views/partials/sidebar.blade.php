<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
        <div class="card-logo">
            <img class="" src="{{ asset('img/logo.png') }}" alt="">
        </div>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="/home">
                    {{-- <i class="now-ui-icons design_app"></i> --}}
                    <p><b>Aplikasi Internal</b></p>
                </a>
            </li>
            <li class="{{ Request::is('eksternal') ? 'active' : '' }}">
                <a href="/eksternal">
                    {{-- <i class="now-ui-icons education_atom"></i> --}}
                    <p><b>Aplikasi Eksternal</b></p>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role_portal === 'admin')
            <li class="{{ Request::is('daftarUser') ? 'active' : '' }}">
                <a href="/daftarUser">
                    {{-- <i class="now-ui-icons education_atom"></i> --}}
                    <p><b>Daftar User</b></p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
