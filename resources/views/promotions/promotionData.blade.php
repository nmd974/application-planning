@extends('promotions.index')
@section('promotion')
<div class="row mt-4">
    @foreach ( $promotions as $promotion)
        <div class="col-3">
            <a type="button" class="btn btn-outline-primary"  href="/promotion/{{ $promotion->id }}"> {{ $promotion->label }} </a>
        </div>
    @endforeach
</div>
@endsection
