@extends('layouts.main')

@section('container')
@include('partials.notifikasi')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row">
                <h5 class="col-6 title">Daftar User</h5>
                <div class="">
                    <button type="button" class="tambahuser btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                        + Tambah User
                    </button>
                    @include('admin/tambahUser')
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pegawai dan Email</th>
                            <th>Username (NIP)</th>
                            <th class="text-center">Cabang</th>
                            <th class="text-center">Bidang</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                {{-- Modal --}}
                @foreach ($user as $users)
                    @include('admin.resetPass', [
                        'id' => $users->id,
                        'name' => $users->usernamePegawai,
                    ])
                @endforeach
            </div>
        </div>
    </div>
</div>



<hr>
@include('partials/footer')


@php
    use Illuminate\Support\Str;
@endphp

@endsection

@push('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> --}}
<script>
    $(document).ready(function () {
    window.routeDaftarUserIndex = "{{ route('daftarUser.index') }}";
    window.errorsExist = @json($errors->any());
    window.openModal = @json(session('openModal'));

    // MyApp.init(); // Pastikan semua fitur terinisialisasi
});
</script>
@endpush
