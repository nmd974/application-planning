@extends('layouts.layouts')

@section('title')
Gestion des examens
@endsection

@section('title-section')
Déroulé de l'examen {{ $exam->label }}
@endsection

@section('content')
    <form class="d-flex" method="post">
        @csrf
        <input class="form-control me-2" type="search" name="search_value" placeholder="Recherche" value="{{ Request::old('search_value') }}">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
    @include('activities.modal.create')
    </div>

    <div class="container-fluid">
        @yield('activities')
    </div>
    <script src="{{ getenv("APP_URL") . '/js/activities.js' }}"></script>
@endsection
