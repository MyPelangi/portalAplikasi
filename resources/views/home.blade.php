@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                    <h5 class="title col-4">Aplikasi Internal</h5>
                    <div class="col-4 justify-content-end" id="navigation">
                        <form id="searchForm" action="{{ route('internal') }}" method="get">
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
                        @foreach($internalApp as $internalApps)
                            <div class="font-icon-list col-lg-2 col-md-3 col-sm-4 col-xs-6">
                                @if($internalApps->permit === 'enabled')
                                    <!-- Link aktif jika permit adalah 'enabled' -->
                                    <a href="{{ url('/home/' . $internalApps->aplink) }}" target="_blank" class="font-icon-detail">
                                        <span class="now-ui-icons"><i class="fa-solid fa-shield-halved"></i></span>
                                        <span>{{ $internalApps->apnama }}</span>
                                    </a>
                                @else
                                    <!-- Link tidak aktif jika permit adalah null -->
                                    <a href="#" style="pointer-events: none; color: gray;" class="disabled">
                                        <span class="now-ui-icons"><i class="fa-solid fa-shield-halved"></i></span>
                                        <span>{{ $internalApps->apnama }}</span>
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
