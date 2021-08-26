@extends('layouts.layouts')
@section('title')
Gestion des promotions
@endsection

@section('title-section')
Gestion des promotions
@endsection
@section('content')
@include('scripts.searchbar')
    @include('promotions.modal.create')
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route("getPromotions", "promoEnCours") }}">Promotion En Cours</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("getPromotions", "promoArchived") }}">Promotion Archived</a>
        </li>
    </ul>
    <div class="container-fluid">
        @yield('promotion')
    </div>
@endsection
