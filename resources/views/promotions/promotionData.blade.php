@extends('promotions.index')
@section('promotion')
<h1 class="mb-4 mt-2" >
    {{ $title }}
</h1>

<div class="row">
    @foreach ( $promotions as $promotion)
        <div class="col-3">
            <a type="button" class="btn btn-outline-primary"  href="/promotion/{{ $promotion->id }}"> {{ $promotion->label }} </a>
        </div>
    @endforeach
</div>
@endsection
