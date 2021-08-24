@extends('promotions.index')
@section('promotion')
<div class="row mt-4">
    @foreach ( $promotions as $promotion)
    <div class="col-xs-12 col-sm-11 col-md-3">
        <div class="card">
            <div class="card-header">
                {{ $promotion->label }}
            </div>
            <div class="card-body">
                <a type="button" class="btn btn-outline-secondary"  href="/promotion/{{ $promotion->id }}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                @if(!$promotion->archived)
                    <a type="button" class="btn btn-dark"  href="/promotion/archived/{{ $promotion->id }}">
                        <i class="fa fa-folder" aria-hidden="true"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
