@extends('layouts.location')
@section('content')
    <br>
    <div class="row w-100">
        <form action="/rechercher" method="GET" class="w-100">
            <div class="form-groupe d-flex justify-content-center my-5 w-100">
                <input type="text" name="voit" id="voit" palceholder="Rechercher par prix, model, marque ..."
                    class="form-control w-75" />
                <input type="submit" value="Chercher" class="btn btn-danger">
            </div>
        </form>
    </div>
    <div class="conatiner mx-5">
        <div class="row">
        @foreach ($voitures as $vo)
            <div class="col-md-3 my-3 mx-4">
                <div class="card" style="width: 18rem; height:100%">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vo->modelVoiture->marqueOrigin->marque }}
                            {{ $vo->modelVoiture->model_voiture }}</h5>
                        <img src="{{ $vo->main_image }}" class="img-responsive" style="width:220px" />
                        <h6 class="card-subtitle mb-2 text-muted">{{ $vo->prix }} DH</h6>
                        <p class="card-text">{{ $vo->date_mise_en_service }}</p>
                        <a href="/showDetails/{{ $vo->id }}" class="card-link text-center">Consulter</a>
                    </div>
                </div>
            </div>
        @endforeach
           </div>
    </div>
<script>
    @if(!empty($milleur))
        var active = document.getElementById('miller');
        active.classList.add('activer');
    @elseif(!empty($newCar))
        var active = document.getElementById('newCar');
        active.classList.add('activer');
    @else
        var active = document.getElementById('homeclient');
        active.classList.add('activer');
    @endif
</script>
@endsection
