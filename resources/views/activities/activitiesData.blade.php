@extends('activities.index')

@section('activities')

@include('activities.modal.update')
@include('activities.modal.delete')

<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Ordre</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ( $activities as $activitie )
                {{-- {{dd($activitie)}} --}}
                    @if (!$activitie->pivot->archived)
                        <tr>
                            <td class="align-middle">{{ucfirst($activitie->label) }}</td>
                            <td class="align-middle">{{date("H:i", mktime(0,$activitie->pivot->duration)) }}</td>
                            <td class="align-middle">{{ $activitie->pivot->order }}</td>
                            <td class="d-flex justify-content-around flex-wrap">
                                <button type="button" class="btn btn-success me-4" data-exam="{{$exam->id}}" data-id="{{$activitie->id}}" data-action="update">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </button>
                                <button type="button" class="btn btn-danger me-4" data-exam="{{$exam->id}}" data-id="{{$activitie->id}}" data-action="delete" data-id="{{$activitie->id}}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td class="align-middle" colspan="4">Vous n'avez pas d'activités enregistrées pour cet examen</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
