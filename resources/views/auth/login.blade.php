@extends('layouts.layouts')
@section('title')
Connexion
@endsection

@section('title-section')
Connexion à la plateforme
@endsection
@section('content')
<div class="w-100 mt-5 mb-5">
    <form action="{{ route("loginCheck") }}" method="post">
        @csrf
        <div class="col-12 form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="Votre email" name="email">
            <label for="email">Email</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <label for="password">Password</label>
        </div>
        <div class="text-end my-4">
            <button type="submit" class="btn btn-success w-55 bg-green mr-5" id="ajouter_proprietaire" name="login">Se connecter</button>
        </div>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
</div>
@endsection
