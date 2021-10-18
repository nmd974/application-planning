@extends('layouts.layouts')
@section('title')
Gestion des utilisateurs
@endsection

@section('title-section')
Gestion des utilisateurs
@endsection

@section('content')
@include('scripts.searchbar')
    @include('users.modal.add')
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Liste des utilisateurs</a>
        </li>
    </ul>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th scope="col">Nom & Prénom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de naissance</th>
                        <th scope="col">Token</th>
                        <th scope="col">Role</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (count($users))
                        @foreach ($users as $user)
                            @include('users.modal.edit')
                            @include('users.modal.deleted')

                <tr>
                                    <td class="align-middle">{{ucfirst($user->first_name) }} {{ucfirst($user->last_name) }}</td>
                                    <td class="align-middle">{{ucfirst($user->email) }}</td>
                                    <td class="align-middle">{{ucfirst($user->birthday) }}</td>
                                    <td class="align-middle">{{$user->token}}</td>
                                    <td class="align-middle">{{$user->role->label}}</td>
                                    <td class="d-flex justify-content-around flex-wrap">
                                        <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#{{"edit_user_" . $user->id}}">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </button>

                                        <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_user_" . $user->id}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                        @endforeach
                    @else

                        <tr>
                            <td class="align-middle" colspan="4">Vous n'avez pas d'élèves enregistrés</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
