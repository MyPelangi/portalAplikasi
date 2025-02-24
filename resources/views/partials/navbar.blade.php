<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler" id="sidebar-toggle">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                 </button>
            </div>
            <a class="navbar-brand" href="/home">PORTAL APLIKASI BRI ASURANSI INDONESIA</a>
        </div>
        <div class="justify-content-end">
            <div class="btn-group">
                <a class="dropdown-toggle no-caret" style="font-size: 1.3rem; margin: 20px 20px 0 0; cursor: pointer;" id="defaultDropdown" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    <i class="fa-regular fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 200px;" aria-labelledby="defaultDropdown">
                        <div class="author">
                            <h6 class="title">Informasi User</h6>
                            <div class="description">
                                <p>{{ Auth::user()->nm_pegawai }}</p>
                                <p>
                                Cabang : <span><b> {{ Auth::user()->cabang->nama_cabang ?? 'Cabang tidak ditemukan' }}</b></span>
                                </p>
                            </div>
                        </div>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="{{ route('ubahpassword') }}">Ubah Password</a>
                    <a class="dropdown-item" href="/sesi/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
