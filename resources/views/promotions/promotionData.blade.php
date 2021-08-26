@extends('promotions.index')
@section('promotion')
@include('promotions.modal.update')
<div class="row mt-4" id="container">
    @foreach ( $promotions as $promotion)

    <div class="element col-xs-12 col-sm-11 col-md-3">
        <div class="card">
            <div class="card-header">
                <p>{{ $promotion->label }}</p>
            </div>
            <div class="card-body">
                <a type="button" class="btn btn-outline-secondary"  href="/promotion/{{ $promotion->id }}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
                <button type="button" class="btn btn-success me-4" data-id="{{$promotion->id}}" data-action="update">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
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
<script src="{{ getenv("APP_URL") . '/js/promotions.js' }}"></script>
@endsection
