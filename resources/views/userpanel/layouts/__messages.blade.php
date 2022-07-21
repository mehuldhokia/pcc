@if (session('status'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong>
        {{ session('status') }}
    </div>
@endif

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>Success!</strong>
        {{ $message }}
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <strong>Error!</strong>
        {{ $message }}.
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please check the form below for
        errors<br>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
