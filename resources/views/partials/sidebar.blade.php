<div class="sidebar" id="app-sidebar" data-color="orange">
    <div class="logo">
        <div class="card-logo">
            <img class="" src="{{ asset('img/logo.png') }}" alt="">
        </div>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a href="/home" class="menu-link" data-url="/home">
                    <p><b>Aplikasi Internal</b></p>
                </a>
            </li>
            <li class="{{ Request::is('eksternal') ? 'active' : '' }}">
                <a href="/eksternal" class="menu-link" data-url="/eksternal">
                    <p><b>Aplikasi Eksternal</b></p>
                </a>
            </li>
            @if (Auth::check() && Auth::user()->role_portal === 'admin')
            <li class="{{ Request::is('daftarUser') ? 'active' : '' }}">
                <a href="/daftarUser" class="menu-link" data-url="/daftarUser">
                    <p><b>Daftar User</b></p>
                </a>
            </li>
            <li class="{{ Request::is('activitylog') ? 'active' : '' }}">
                <a href="/activitylog" class="menu-link" data-url="/activitylog">
                    <p><b>Daftar Log User</b></p>
                </a>
            </li>
            <li class="{{ Request::is('monitoringLog') ? 'active' : '' }}">
                <a href="/monitoringlog" class="menu-link" data-url="/monitoringlog">
                    <p><b>Monitoring Log</b></p>
                </a>
            </li>
            <li>
                <a href="#" class="menu-link" data-url="/export-detail-log">
                    <p><b>Export Detail Log</b></p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
