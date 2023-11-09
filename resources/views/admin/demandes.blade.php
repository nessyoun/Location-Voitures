@extends('layouts.location')
@section('content')
    <div class="container table w-100" style="margin-top:15%" >
        <div class="row bg-light">
            <div class="col-md-2">
                Nom
            </div>
            <div class="col-md-2">
                Voiture
            </div>
            <div class="col-md-2">
                Date de creation:
            </div>
            <div class="col-md-2">
                Date fin
            </div>
            <div class="col-md-2">
                Actions
            </div>
        </div>
        @foreach ($reservations as $reservation)
            <div class="row text-white">
                <div class="col-md-2 border">
                    {{ $reservation->client->user->name }}
                </div>
                <div class="col-md-2 border">
                    {{ $reservation->Voiture->modelVoiture->marqueOrigin->marque }}
                    {{ $reservation->Voiture->modelVoiture->model_voiture }}
                </div>
                <div class="col-md-2 border">
                    {{ $reservation->date_de_creation }}
                </div>
                <div class="col-md-2 border">
                    {{$reservation->date_fin}}
                </div>
                <div class="col border">
                    <a class="btn btn-primary mx-3 my-1" href="/approuver/{{$reservation->id}}" >Approuver</a>
                    <a class="btn btn-danger my-1" href="/annulerReservation/{{$reservation->id}}" >Supprimer</a>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        var active = document.getElementById('calendrieradmin');
        active.classList.add('activer');
    </script>
@endsection
