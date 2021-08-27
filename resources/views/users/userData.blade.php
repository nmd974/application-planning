@extends('users.index')
@section('users')
@include('users.modal.update')
@include('users.modal.delete')
@include('users.modal.mail')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Nom & Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Token</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($users)}} --}}
                @if (count($users))
                    @forelse ($users as $user)
                        @if (!$user->pivot->archived)
                            <tr>
                                <td class="align-middle">{{ucfirst($user->first_name) }} {{ucfirst($user->last_name) }}</td>
                                <td class="align-middle">{{$user->email }}</td>
                                <td class="align-middle">{{$user->birthday}}</td>
                                <td class="align-middle">{{$user->token}}</td>
                                <td class="d-flex justify-content-around flex-wrap">
                                    <button type="button" class="btn btn-success me-4" data-id="{{$user->id}}" data-action="update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary me-4"  data-promotion="{{ $promotion_id }}" data-id="{{$user->id}}" data-action="send_email">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger me-4" data-promotion="{{ $promotion_id }}" data-id="{{$user->id}}" data-action="delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif
                    @empty

                        <tr>
                            <td class="align-middle" colspan="5">Vous n'avez pas d'élèves enregistrés</td>
                        </tr>
                    @endforelse

                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
