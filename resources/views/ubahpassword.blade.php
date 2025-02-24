@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Form Ubah Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @include('partials/pesan')
                        @csrf
                        <div class="col-md-5 mb-4">
                            <div class="form-group">
                                <label for="current_password" class="form-label">Password lama</label>
                                <input type="password" placeholder="Password lama" id="current_password" name="current_password" class="form-control">
                                <i class="fa fa-eye password-show"></i>
                                @error('current_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="form-group">
                                <label class="form-label">Password baru</label>
                                <input type="password" placeholder="Password baru" id="password" name="password" class="form-control">
                                <i class="fa fa-eye password-show"></i>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="form-group">
                                <label class="form-label">Konfirmasi password baru</label>
                                <input type="password" placeholder="Konformasi Password Baru" id="password_confirmation" name="password_confirmation" class="form-control">
                                <i class="fa fa-eye password-show"></i>
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('partials/footer')
@endsection
