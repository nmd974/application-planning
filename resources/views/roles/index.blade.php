@extends('layouts.layouts')
@section('title')
Gestion des rôles
@endsection

@section('title-section')
Gestion des rôles
@endsection
@section('content')

@include('scripts.searchbar')
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

<script src="{{ getenv("APP_URL") . '/js/roles.js' }}"></script>
@endsection
