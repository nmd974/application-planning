@extends('layouts.layouts')
@section('title')
Gestion des rôles
@endsection

@section('title-section')
Gestion des rôles
@endsection
@section('content')

<form class="d-flex" method="post">
    @csrf
    <input class="form-control me-2" type="search" name="search_value" placeholder="Recherche" value="{{ Request::old('search_value') }}">
    <button class="btn btn-outline-success" type="submit">Rechercher</button>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
@include('roles.modal.create')
</div>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="./">Liste des roles</a>
    </li>
</ul>
<div class="container-fluid">
    @yield('roles')
</div>


@endsection
