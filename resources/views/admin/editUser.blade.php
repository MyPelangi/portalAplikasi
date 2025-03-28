@extends('layouts/main')

@section('container')
@include('partials.notifikasi')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Edit User</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('daftarUser.update', ['daftarUser' => $data->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tambah-content" style="display: grid; grid-template-columns: 50% 50%">

                        {{-- Nomor Induk Pegawai --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nomor_induk_pegawai" class="form-label">Nomor Induk Pegawai</label>
                                <input type="text" placeholder="Nomor induk pegawai" value="{{ $data->kd_pegawai }}" id="nip" name="nip" class="form-control"  autocomplete="off">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Divisi --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="divisi" class="form-label">Divisi</label>
                                <select id="unitkerja" name="unitkerja" class="form-control">
                                    <option value="">{{ $data->unitkerja->UnitKerja ?? 'Pilih Unit Kerja' }}</option>
                                    @foreach ($unitkerja as $d)
                                        <option value="{{ $d->KodeUnit }}">{{ $d->UnitKerja }}</option>
                                    @endforeach
                                </select>
                                @error('unitkerja')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Nama Pegawai --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nama_pegawai" class="form-label">Nama Pegawai</label>
                                <input type="text" value="{{ $data->nm_pegawai }}" id="nama_pegawai" name="nama_pegawai" class="form-control" autocomplete="off">
                                @error('nama_pegawai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Cabang --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cabang" class="form-label">Cabang</label>
                                <select id="cabang" name="cabang" class="form-control">
                                    <option value="">{{ $data->cabang->nama_cabang ?? 'Pilih Cabang' }}</option>
                                    @foreach ($cabang as $c)
                                    <option value="{{ $c->kd }}">{{ $c->nama_cabang }}</option>
                                    @endforeach
                                </select>
                                @error('cabang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" placeholder="Username" value="{{ $data->usernamePegawai }}" id="username" name="username" class="form-control" autocomplete="off">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- UserCare --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_care" class="form-label">User Care</label>
                                <select id="usercare" name="usercare" class="form-control">
                                    <option value="">{{ $data->usercare->ID_SyUser ?? 'Pilih User Care' }}</option>
                                    @foreach ($usercare as $userc)
                                    <option value="{{ $userc->ID_SyUser }}">{{ $userc->ID_SyUser }}</option>
                                    @endforeach
                                </select>
                                @error('usercare')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" id="email" value="{{ $data->email_pegawai }}" name="email" class="form-control" autocomplete="off">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Jabatan --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control">
                                    <option value="">{{ $data->jabatan->Nama_Jabatan ?? 'Pilih Jabatan' }}</option>
                                    @foreach ($jabatan as $j)
                                    <option value="{{ $j->ID_Jabatan }}">{{ $j->Nama_Jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Status pegawai --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="status" class="form-label">Status Pegawai</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" {{ $data->status_p == 1 ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ $data->status_p == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" href="{{ route('daftarUser.index') }}">Kembali</a>
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
