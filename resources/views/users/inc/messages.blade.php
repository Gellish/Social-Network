@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif

@if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif