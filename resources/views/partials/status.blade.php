@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul class="list-group">
        @foreach ($errors->all() as $error)
            <li class="list-group-item">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif