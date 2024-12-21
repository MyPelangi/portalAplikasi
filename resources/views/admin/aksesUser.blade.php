@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Pengaturan Akses Aplikasi</h5>
                </div>
                <div class="card-body">
                    @if ($data)
                    <table>
                        <tr>
                            <td>Nama Pegawai</td>
                            <td style="padding-left: 50px; padding-right: 20px;">:</td>
                            <td>{{ $data->nm_pegawai }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td style="padding-left: 50px; padding-right: 20px;">:</td>
                            <td>{{ $data->name }}</td>
                        </tr>
                        <tr>
                            <td>Cabang</td>
                            <td style="padding-left: 50px; padding-right: 20px;">:</td>
                            <td>{{ $data->cabang->nama_cabang }}</td>
                        </tr>
                        <tr>
                            <td>Kode Bidang</td>
                            <td style="padding-left: 50px; padding-right: 20px;">:</td>
                            <td>{{ $data->kd_bidang }}</td>
                        </tr>
                    </table>

                    <form method="POST" action="{{ route('users.updateAccess', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <table class="tableAkses">
                            <thead>
                                <tr class="trAkses">
                                    <th class="titleAkses">APLIKASI INTERNAL</th>
                                    <th class="titleAkses">APLIKASI EKSTERNAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $maxRows = max($internalApp->count(), $eksternalApp->count());
                                @endphp
                                @for ($i = 0; $i < $maxRows; $i++)
                                    <tr>
                                        <td class="internal">
                                            @if (isset($internalApp[$i]))
                                                <input class="inputAkses" type="checkbox" name="akses[]" value="{{ $internalApp[$i]->id }}"{{ in_array($internalApp[$i]->id, $userAccess) ? 'checked' : '' }}>
                                                {{ $internalApp[$i]->apnama }}
                                            @endif
                                        </td>
                                        <td class="eksternal">
                                            @if (isset($eksternalApp[$i]))
                                                <input class="inputAkses" type="checkbox" name="akses[]" value="{{ $eksternalApp[$i]->id }}"{{ in_array($eksternalApp[$i]->id, $userAccess) ? 'checked' : '' }}>
                                                {{ $eksternalApp[$i]->apnama }}
                                            @endif
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" href="{{ route('daftarUser.index') }}">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                    @else
                        <p>Data tidak ditemukan.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <hr>
    @include('partials/footer')

@endsection
