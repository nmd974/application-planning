@extends('exams.index')
@section('exams')
@include('exams.modal.update')
@include('exams.modal.delete')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Exam</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure de début</th>
                    <th scope="col">Token</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($promotion->exams))

                    @foreach ($promotion->exams as $exam)
                    {{-- {{dd($exam->getOriginal('pivot_archived'))}} --}}
                        @if (!$exam->getOriginal('pivot_archived'))

                            <tr>
                                <td class="align-middle">{{ucfirst($exam->label) }}</td>
                                <td class="align-middle">{{date("Y-m-d", strtotime($exam->date_start)) }}</td>
                                <td class="align-middle">{{date("H:i", strtotime($exam->date_start)) }}</td>
                                <td class="align-middle">{{ $exam->token }}</td>
                                <td class="d-flex justify-content-around flex-wrap">
                                    <button type="button" class="btn btn-success me-4" data-id="{{$exam->id}}" data-promotion="{{$promotion_id}}" data-action="update">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <a class="btn btn-warning me-4" href="{{ route("getActivitiesByExam", $exam->id)}}" role="button">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger me-4" data-id="{{$exam->id}}" data-promotion="{{$promotion_id}}" data-action="delete">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endif

                    @endforeach
                @else

                <tr>
                    <td class="align-middle" colspan="4">Vous n'avez pas d'examens enregistrés</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
