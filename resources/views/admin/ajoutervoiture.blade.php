@extends('admin.voitures')
@section('container')
<div class="container w-75 my-5 text-white">
    <form method="POST" action="/ajouterVoiture" enctype="multipart/form-data">
    <div class="form-group">
        <label for="date_de_mise_en_service">Date de mise en service</label>
        <input type="date" class="form-control" id="date_de_mise_en_service" name="date_de_mise_en_service">
    </div>
    <div class="form-group">
        <label for="prix">Prix (Double)</label>
        <input type="number" step="0.01" class="form-control" id="prix" name="prix">
    </div>
    <div class="form-group">
        <label for="model">Modèle</label>
        <select class="form-control" id="model" name="model">
        @foreach($models as $model)
        <option value="{{$model->id}}">{{$model->marqueOrigin->marque}} {{$model->model_voiture}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="images">Images (plusieurs fichiers .png)</label>
        <input type="file" class="form-control-file" id="images" name="images[]" multiple accept=".png">
    </div>
    <div class="form-group">
        <label for="main_image">Image principale (fichier .png)</label>
        <input type="file" class="form-control-file" id="main_image" name="mainimage">
    </div>
    <div class="form-group">
        <label for="agence">Agence</label>
        <select class="form-control" id="agence" name="agence">
        @foreach($agences as $agence)
        <option value="{{$agence->id}}">{{$agence->nom}}</option>
         @endforeach
        </select>
    </div>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
    </form>
</div>
<script>
    var disabled = document.getElementById('ajouter');
    disabled.classList.add('disabled');
</script>
@endsection