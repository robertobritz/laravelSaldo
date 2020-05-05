@if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $erro)
            <p>{{$erro}}</p>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>   
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>   
@endif