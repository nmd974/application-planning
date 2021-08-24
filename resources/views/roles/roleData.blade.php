@extends('users.index')
@section('user')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nom & Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="align-middle">{{ucfirst($user->first_name) }} {{ucfirst($user->last_name) }}</td>
                    <td class="align-middle">{{ucfirst($user->email) }}</td>
                    <td class="align-middle">{{ucfirst($user->birthday) }}</td>
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
                <tr>
                    <td class="align-middle" colspan="4">Vous n'avez pas d'élèves enregistrés</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection