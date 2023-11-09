@extends('admin.voitures')
@section('container')
<div class="container">
    <div class="row">
        <h2 class="text-white"><a href="/voitures/consulter" style="color:rgb(199,0,0)"><i class="fa-solid fa-arrow-left"></i></a>   {{$voiture->modelVoiture->marqueOrigin->marque}} {{$voiture->modelVoiture->model_voiture}}</h2>
    </div>
    <div class="row">
        <img src="{{$voiture->main_image}}" class="img-responsive w-50 my-3" style="margin-left:27%;"/>
    </div>
    <div class="row">
        <button class="btn btn-info w-15 my-2"  onclick="dloo()" style="margin-left:75.5%"><i class="fa-solid fa-pen-to-square"></i> Activer Modification</button>
    </div>
    <div class="row mx-5">
        <div class="col-md-6">
            <div class="row text-white my-2">
                Date de mise en service:
            </div>
            <div class="row text-white my-2">
                Agence :
            </div>
            <div class="row text-white my-3">
                Prix(DH) :
            </div>
        </div>
        <div class="col-md-6">
            <form method="post" action="/editVoiture">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$voiture->id}}">
                    <div class="row text-white my-2">
                        {{$voiture->date_mise_en_service}}
                    </div>
                    <div class="row text-white my-2">
                        {{$voiture->Agence->nom}}
                    </div>
                    <div class="row text-white my-2">
                        <input type="number" value="{{$voiture->prix}}" class="form-control" id="2" disabled name="prix">      
                    </div>
                    <div class="row text-white my-4">
                        <input type="submit" value="Enregistrer" class="btn btn-outline-danger w-50"/> 
                        <input type="reset" value="Réinitialiser" class="btn btn-secondary w-50"> 
                    </div>
            </form>
        </div>
    </div>

</div>
<script>
    var hidden = document.getElementById('consulter');
    var hidden2 = document.getElementById('ajouter');
    hidden.setAttribute('hidden', true);
    hidden2.setAttribute('hidden', true);

</script>

<script>
       function dloo() {
        document.getElementById("2").removeAttribute('disabled');
  

    }
</script>
@endsection