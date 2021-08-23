@extends('exams.index')
@section('exams')
<div class="row mt-4">
    <div class="table-responsive">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">Exam</th>
                    <th scope="col">Date Exam</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($promotion->exams))
                    @foreach ($promotion->exams as $exam)
                    <tr>
                        <td class="align-middle">{{ucfirst($exam->label) }}</td>
                        <td class="align-middle">{{ucfirst($exam->date_start) }}</td>
                        <td class="d-flex justify-content-around flex-wrap">
                            <button type="button" class="btn btn-success me-4" data-bs-toggle="modal" data-bs-target="#{{"edit_user_" . $exam->id}}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>

                            <button type="button" class="btn btn-danger me-4" data-bs-toggle="modal" data-bs-target="#{{"delete_user_" . $exam->id}}">
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
@endsection
