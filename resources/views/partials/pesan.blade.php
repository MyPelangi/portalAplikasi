@if ($errors->any())
    <div class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <span>{{$item}}</span>
            @endforeach
    </div>
@endif

@if (session()->has('status'))
    <div class="alert alert-success">{{session()->get('status')}}</div>
@endif

@if (session('sukses'))
    <script>
        alert("{{ session('sukses') }}");
    </script>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

