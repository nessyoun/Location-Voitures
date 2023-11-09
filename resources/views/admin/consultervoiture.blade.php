@extends('admin.voitures')
@section('container')
<div class="row my-5 w-100">
  <form action="/rechercher" method="GET" class="form-inline w-100">
        <input type="text" name="voit" id="recher" placeholder="Rechercher model, prix, ..." class="form-control">
        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-magnifying-glass"></i> Chercher</button>
  </form>
</div>
<div class="row my-4 mx-2">
    @foreach($voiture as $vo)
        <div class="col-md-3 my-3 mx-4">
            <div class="card" style="width: 18rem; height:100%">
                <div class="card-body">
                    <h5 class="card-title">{{$vo->modelVoiture->marqueOrigin->marque}} {{$vo->modelVoiture->model_voiture}}</h5>
                    <img src="{{$vo->main_image}}" class="img-responsive" style="width:220px"/>
                    <h6 class="card-subtitle mb-2 text-muted">{{$vo->prix}} DH</h6>
                    <p class="card-text">{{$vo->date_mise_en_service}}</p>
                    <a href="/consulter/{{$vo->id}}" class="card-link">Consulter</a>
                    <a href="/deleteVoiture/{{$vo->id}}" onclick="fon(this)" data-toggle="modal" data-target="#exampleModal" class="text-danger"> Supprimer</a>
                </div>
            </div>

        </div>
        @endforeach

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Est-ce que vous êtes surs?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i> Annuler</button>
        <a href="" id="valider"  class="btn btn-danger"><i class="fa-solid fa-trash"></i> Valider</a>
      </div>
    </div>
  </div>
</div>

</div>
<script>
    var disabled = document.getElementById('consulter');
    disabled.classList.add('disabled');
</script>
<script>
    function fon(rp){
        var btn = rp.href;
        var valider = document.getElementById('valider');
        valider.setAttribute('href',btn);
    }


</script>

@endsection