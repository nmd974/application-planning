@extends('roles.index')
@section('roles')
@include('roles.modal.update')
@include('roles.modal.delete')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Role</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td class="align-middle">{{ $role->label  }}</td>
                    <td class="d-flex justify-content-around flex-wrap">
                        <button type="button" class="btn btn-success me-4" data-id="{{$role->id}}" data-action="update">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>

                        <button type="button" class="btn btn-danger me-4" data-id="{{$role->id}}" data-action="delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
