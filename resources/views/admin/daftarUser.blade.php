@extends('layouts.main')

@section('container')
@include('partials.notifikasi')
<!-- Include Modal tambah user -->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row">
                <h5 class="col-6 title">Daftar User</h5>
                <div class="col-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahUserModal">
                        + Tambah User
                    </button>
                    @include('admin/tambahUser')
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="display" style="width:100%">
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
                <!-- Modal -->
                @foreach ($user as $users)
                    @include('admin.resetPass', [
                        'id' => $users->id,
                        'name' => $users->name,
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

{{-- $(document).ready(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('daftarUser.index') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
            { data: 'nm_email', name: 'nm_email' },
            { data: 'username_id', name: 'username_id' },
            { data: 'cabang', name: 'cabang', className: 'text-center' },
            { data: 'bidang', name: 'bidang', className: 'text-center' },
            { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false },
        ]
    });
}); --}}

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function() {
        $('#example').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('daftarUser.index') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                { data: 'nama_email', name: 'nama_email' },
                { data: 'name_id', name: 'name_id' },
                { data: 'cabang', name: 'cabang', className: 'text-center' },
                { data: 'bidang', name: 'bidang', className: 'text-center' },
                { data: 'action', name: 'action', className: 'text-center', orderable: false, searchable: false },
            ]
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        @if ($errors->any())
            @if (session('openModal') && Str::startsWith(session('openModal'), 'resetPasswordModal'))
                var resetPasswordModalId = '{{ session('openModal') }}'; // Ambil ID dari session
                var resetPasswordModal = new bootstrap.Modal(document.getElementById(resetPasswordModalId));
                resetPasswordModal.show();
            @elseif (session('openModal') === 'tambahUserModal')
                var tambahUserModal = new bootstrap.Modal(document.getElementById('tambahUserModal'));
                tambahUserModal.show();
            @endif
        @endif
    });

    // $(function() {
    //     $(".password-show").click(function(event) {
    //         // Cari input yang berada di dalam grup yang sama
    //         const input = $(this).siblings(".form-control");

    //         // Toggle type antara password dan text
    //         const type = input.attr("type") === "password" ? "text" : "password";
    //         input.attr("type", type);

    //         // Toggle antara ikon fa-eye dan fa-eye-slash
    //         $(this).toggleClass('fa-eye fa-eye-slash');
    //     });
    // });
</script>
@endsection
