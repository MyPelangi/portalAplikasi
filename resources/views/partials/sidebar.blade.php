<div class="sidebar" id="app-sidebar" data-color="orange">
    <div class="logo">
        <div class="card-logo">
            <img class="" src="{{ asset('img/logo.png') }}" alt="">
        </div>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="/home">
                    <p><b>Aplikasi Internal</b></p>
                </a>
            </li>
            <li class="{{ Request::is('eksternal') ? 'active' : '' }}">
                <a href="/eksternal">
                    <p><b>Aplikasi Eksternal</b></p>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role_portal === 'admin')
            <li class="{{ Request::is('daftarUser') ? 'active' : '' }}">
                <a href="/daftarUser">
                    <p><b>Daftar User</b></p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
