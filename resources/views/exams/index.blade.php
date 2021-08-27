@extends('layouts.layouts')
@section('title')
Gestion des promotions
@endsection

@section('title-section')
Gestion de la promotion {{ $label }}
@endsection
@section('content')
@include('scripts.searchbar')
    @include('exams.modal.create')
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'usersByPromotion' ? 'active' : '' }}" aria-current="page" href="{{ route("usersByPromotion", $promotion_id) }}">Liste des élèves</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'examsByPromotion' ? 'active' : '' }}" href="{{ route("examsByPromotion", $promotion_id) }}">Liste des examens</a>
        </li>
    </ul>
    <div class="container-fluid">
        @yield('exams')
    </div>
    <script src="{{ getenv("APP_URL") . '/js/examen.js' }}"></script>
@endsection
