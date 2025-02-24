@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row">
                <h5 class="col-6 title">Activity Log</h5>
            </div>
            <div class="card-body">
                <div class="filter">
                    <div class="filter-item">
                        <label for="start_date">Start Date :</label>
                        <input type="text" id="start_date" class="form-control datepicker">
                    </div>
                    <div class="filter-item">
                        <label for="end_date">End Date :</label>
                        <input type="text" id="end_date" class="form-control datepicker">
                    </div>
                    <div class="filter-item">
                        <label for="nama_pegawai">Nama Pegawai :</label>
                        <input type="text" id="nama_pegawai" class="form-control">
                    </div>
                    <div class="filter-item">
                        <label for="nama_cabang">Nama Cabang :</label>
                        <input type="text" id="nama_cabang" class="form-control">
                    </div>
                    <div class="fil">
                        <button class="btn btn-primary" id="search">Search</button>
                        <button class="btn btn-secondary" id="reset">Reset</button>
                    </div>
                </div>
                <table id="activitylog" class="table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">ID User</th>
                            <th class="text-center">NIP</th>
                            <th class="text-center">Nama Pegawai</th>
                            <th class="text-center">Kode Cabang</th>
                            <th class="text-center">Cabang</th>
                            <th class="text-center">Type</th>
                            <th class="text-center">IP User</th>
                            <th class="text-center">Latitude</th>
                            <th class="text-center">Longitude</th>
                            <th class="text-center">Created_at</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<hr>
@include('partials/footer')
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function () {
    window.activityLogRoute = "{{ route('activitylog') }}";
});
</script>
@endpush
