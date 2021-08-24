@extends('layouts.layouts')
@section('title')
Gestion des promotions
@endsection

@section('title-section')
Gestion de la promotion {{ $label }}
@endsection
@section('content')
    <form class="d-flex" method="post">
        @csrf
        <input class="form-control me-2" type="search" name="search_value" placeholder="Recherche" value="{{ Request::old('search_value') }}">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
    @include('users.modal.create')
    </div>
{{-- {{dd(Route::currentRouteName())}} --}}
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'usersByPromotion' ? 'active' : '' }}" aria-current="page" href="{{ route("usersByPromotion", $promotion_id) }}">Liste des élèves</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'examsByPromotion' ? 'active' : '' }}" href="{{ route("examsByPromotion", $promotion_id) }}">Liste des examens</a>
        </li>
    </ul>
    <div class="container-fluid">
        @yield('users')
    </div>
@endsection
