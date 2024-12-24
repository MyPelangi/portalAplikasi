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
        <a class="navbar-brand" href="">PORTAL APLIKASI BRI ASURANSI INDONESIA</a>
      </div>
      {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button> --}}
      <div class="justify-content-end">
        {{-- <div class="navbar-nav"> --}}
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
                                Cabang : {{ Auth::user()->cabang->nama_cabang ?? 'Cabang tidak ditemukan' }}
                                </p>
                            </div>
                        </div>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item" href="{{ route('ubahpassword') }}">Ubah Password</a>
                    <a class="dropdown-item" href="/sesi/logout">Logout</a>
                </div>
              </div>
        {{-- </div> --}}
      </div>
    </div>
</nav>

<script src="public/js/now-ui-dashboard.min.js" type="text/javascript"></script>
<script>
    var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
    var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
        return new bootstrap.Dropdown(dropdownToggleEl)
    })
</script>
