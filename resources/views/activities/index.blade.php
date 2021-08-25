@extends('layouts.layouts')

@section('title')
Gestion des examens
@endsection

@section('title-section')
Déroulé de l'examen {{ $exam->label }}
@endsection

<script>
    //Fonction commune pour cette partie
    const tranform_hours = (data) => {
        var nbHour = parseInt(data / 60);
        if(nbHour < 10){
            nbHour = "0" + nbHour.toString();
        }
        var nbminuteRestante = data % 60;
        if (nbminuteRestante == 0) {
            return nbHour + ":";
        } else {

            return nbHour + ":" + nbminuteRestante;
        }
    }
</script>

@section('content')
    <form class="d-flex" method="post">
        @csrf
        <input class="form-control me-2" type="search" name="search_value" placeholder="Recherche" value="{{ Request::old('search_value') }}">
        <button class="btn btn-outline-success" type="submit">Rechercher</button>
        <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
    @include('activities.modal.create')
    </div>

    <div class="container-fluid">
        @yield('activities')
    </div>
@endsection
