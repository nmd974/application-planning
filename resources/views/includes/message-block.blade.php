@if (count($errors) > 0)
<div class="row">
    <div class="col-md-6 alert alert-warning offset-md-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
