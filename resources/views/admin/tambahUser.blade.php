<div class="modal fade @if(session('openModal') === 'tambahUserModal') show @endif"
     id="tambahUserModal"
     tabindex="-1"
     aria-labelledby="tambahUserModalLabel"
     aria-hidden="true"
     style="@if(session('openModal') === 'tambahUserModal') display: block; @endif">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahUserModalLabel">Form Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
            <form action="{{ route('daftarUser.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="tambah-content" style="display: grid; grid-template-columns: 50% 50%;">

                        {{-- Nomor Induk Pegawai --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="nomor_induk_pegawai" class="form-label">Nomor Induk Pegawai</label>
                                <input type="text" placeholder="Nomor induk pegawai" id="nip" name="nip" class="form-control @error('nip') is-invalid @enderror" value="{{ old('nip') }}" autocomplete="off">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Divisi --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="divisi" class="form-label">Divisi</label>
                                <select id="unitkerja" name="unitkerja" class="form-control @error('unitkerja') is-invalid @enderror">
                                    <option value="">Pilih Divisi</option>
                                    @foreach ($unitkerja as $d)
                                        <option value="{{ $d->KodeUnit }}" {{ old('unitkerja') == $d->KodeUnit ? 'selected' : '' }}>{{ $d->UnitKerja }}</option>
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
                                <input type="text" placeholder="Nama pegawai" id="nama_pegawai" name="nama_pegawai" class="form-control @error('nama_pegawai') is-invalid @enderror" value="{{ old('nama_pegawai') }}" autocomplete="off">
                                @error('nama_pegawai')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Username --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" placeholder="Username" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" autocomplete="off">
                                @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" placeholder="Masukkan password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                                <i class="fa fa-eye passwordshow"></i>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Usercare --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="user_care" class="form-label">User Care</label>
                                <select id="usercare" name="usercare" class="form-control @error('usercare') is-invalid @enderror">
                                    <option value="">Pilih User Care</option>
                                    @foreach ($usercare as $userc)
                                        <option value="{{ $userc->ID_SyUser }}" {{ old('usercare') == $userc->ID_SyUser ? 'selected' : '' }}>{{ $userc->ID_SyUser }}</option>
                                    @endforeach
                                </select>
                                @error('usercare')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Jabatan --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->ID_Jabatan }}" {{ old('jabatan') == $j->ID_Jabatan ? 'selected' : '' }}>{{ $j->Nama_Jabatan }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Cabang --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label for="cabang" class="form-label">Cabang</label>
                                <select id="cabang" name="cabang" class="form-control @error('cabang') is-invalid @enderror">
                                    <option value="">Pilih Cabang Aplikasi</option>
                                    @foreach ($cabang as $c)
                                        <option value="{{ $c->kd }}" {{ old('cabang') == $c->kd ? 'selected' : '' }}>{{ $c->nama_cabang }}</option>
                                    @endforeach
                                </select>
                                @error('cabang')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- javascript --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/asset.js') }}"></script>
