@extends('layouts.location')
@section('content')
    <div class="container" style="margin-top:6%">
        <h1 class="title text-center text-white">{{ $voiture->modelVoiture->marqueOrigin->marque }}
            {{ $voiture->modelVoiture->model_voiture }}</h1>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-50" src="{{ $images[0] }}" alt="First slide" style="margin-left:27%;">
                </div>
                @for ($i = 1; $i < count($images); $i++)
                    <div class="carousel-item">
                        <img class="d-block w-50 h-50" src="{{ $images[$i] }}" alt="Second slide"
                            style="margin-left:27%;">
                    </div>
                @endfor
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>



        <br>
        <div class="table">
            <div class="row">
                <div class="col-md-6 bg-light border">Etat</div>
                <div class="col-md-6 text-white border" id="etat"><b>{{ $etat }}</b></div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-light border">Prix</div>
                <div class="col-md-6 text-white border">{{ $voiture->prix }}</div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-light border">Date de mise en service</div>
                <div class="col-md-6 text-white border">{{ $voiture->date_mise_en_service }}</div>
            </div>
            <div class="row">
                <div class="col-md-6 bg-light border">Agence</div>
                <div class="col-md-6 text-white border">{{ $voiture->Agence->nom }}</div>
            </div>
        </div>




        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Réserver
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Veuillez inserer ces données</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class = "form" action="/reserver" method = "POST">
                            <input type="hidden" name="cin" value = "{{ auth()->user()->client_id }}">
                            <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                            <input type="hidden" name="voiture" value = "{{ $voiture->id }}">
                            <label for="date_debut" > Date Debut</label>
                            <input type="Date" name="date_debut" class="form-control"/>
                            <label for="date_fin" > Date Fin</label>
                            <input type="Date" name="date_fin" class="form-control"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Réserver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>






    </div>

    <script>
        var etatValeur = "{{ $etat }}";
        var btn = document.getElementById("btn");
        var etatDiv = document.getElementById("etat");

        if (etatValeur === "Disponible") {
            etatDiv.classList.add("text-success");
        } else {
            etatDiv.classList.add("text-danger");
            btn.setAttribute('disabled', 'true');
        }
    </script>
    <script>
        var active = document.getElementById('homeclient');
        active.classList.add('activer');
    </script>
@endsection
