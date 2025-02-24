@extends('layouts.main')

@section('container')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header row">
                <h5 class="col-6 title">Monitoring Activity Log</h5>
            </div>
            <div class="card-body">
                <div class="detail-logs">
                    <div class="logs-item">
                        <p class="label">Jumlah Logs</p>
                        <p class="total"><b>{{ $datalogs }}</b></p>
                    </div>
                    <div class="logs-item">
                        <p class="label">Jumlah Login</p>
                        <p class="total"><b>{{ $datalogin }}</b></p>
                    </div>
                    <div class="logs-item">
                        <p class="label">Jumlah Logout</p>
                        <p class="total"><b>{{ $datalogout }}</b></p>
                    </div>
                </div>
                <hr>

                <script>
                    var Labels = @json($labels);
                    var Values = @json($values);
                </script>

                <canvas id="loginChart"></canvas>

            </div>
        </div>
    </div>
</div>
<hr>
@include('partials/footer')
@endsection

@push('scripts')

@endpush
