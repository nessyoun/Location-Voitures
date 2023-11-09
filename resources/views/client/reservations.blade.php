@extends('layouts.location')
@section('content')
    <div class="container w-100" style="margin-top:10%">
        <div class="row bg-light">
            <div class="col">
                Voitures 
            </div>
            <div class="col">
                Etats de reservation:
            </div>
            <div class="col">
                Date de création :
            </div>
            <div class="col">
                Date de debut :
            </div>
            <div class="col">
                Date fin :
            </div>
            <div class="col">
                Prix :
            </div>
            <div class="col">
                Actions :
            </div>
        </div>
        @foreach ($reservations as $res)
            <div class="row w-100">
                <div class="col border text-white">
                    {{ $res->Voiture->modelVoiture->marqueOrigin->marque }} {{ $res->Voiture->modelVoiture->model_voiture }}
                </div>
                <div class="col border text-white">
                    {{ $res->etat->etat }}
                </div>
                <div class="col border text-white">
                    {{ $res->date_de_creation }}
                </div>
                @if ($res->date_debut && $res->date_fin)
                    <div class="col border text-white">
                        {{ $res->date_debut }}
                    </div>
                    <div class="col border text-white">
                        {{ $res->date_fin }}
                    </div>
                @else
                    <div class="col border text-white">
                        ---
                    </div>
                    <div class="col border text-white">
                        ---
                    </div>
                @endif
                <div class="col border text-white">
                    {{ $res->Voiture->prix }}
                </div>
                <div class="col border text-white">
                    <a href="/annulerReservation/{{ $res->id}}" class="btn btn-danger">Annuler</a>
                </div>
            </div>
        @endforeach

    </div>
<script>
     var active = document.getElementById('res');
        active.classList.add('activer');
</script>
@endsection
