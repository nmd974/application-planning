@extends('layouts.layouts')
@section('content')
<div class="d-flex">
<ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="/">Promotion En Cours</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/promoArchived">Promotion Archived</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Deconnecter</a>
    </li>
</ul>
<div class="container">
    @yield('promotion')
</div>
</div>
@endsection
