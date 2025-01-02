@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                    <h5 class="title col-6">Aplikasi Eksternal</h5>
                    <div class="col-4 justify-content-end" id="navigation">
                        <form id="searchForm" action="{{ route('eksternal') }}" method="get">
                        <div class="input-group">
                            <input type="text" value="{{ request('search') }}" id="searchInput" name="search" class="form-control" placeholder="Masukkan nama aplikasi...">
                            <div class="input-group-append">
                            <button type="button" class="input-group-text" id="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body all-icons">
                    @if (request('search'))
                        <p>Hasil pencarian untuk: <strong>{{ request('search') }}</strong></p>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach($eksternalApp as $eksternalApps)
                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                @if($eksternalApps->permit === 'enabled')
                                    <!-- Link aktif jika permit adalah 'enabled' dan user memiliki akses -->
                                    <a href="{{ url('/home/' . $eksternalApps->aplink) }}" target="_blank" class="font-icon-detail">
                                        <span class="now-ui-icons"><i class="fa-solid fa-shield-halved"></i></span>
                                        <span>{{ $eksternalApps->apnama }}</span>
                                    </a>
                                @else
                                    <!-- Link tidak aktif jika permit adalah null atau user tidak memiliki akses -->
                                    <a href="#" class="disabled" data-tooltip="Anda tidak memiliki akses ke aplikasi ini">
                                        <span class="now-ui-icons"><i class="fa-solid fa-shield-halved"></i></span>
                                        <span>{{ $eksternalApps->apnama }}</span>
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('partials/footer')
@endsection
