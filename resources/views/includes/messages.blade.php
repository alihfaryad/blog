@if (count($errors) > 0)
    @foreach ($errors as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-warning">
        {{session('error')}}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        {{session('danger')}}
    </div>
@endif

