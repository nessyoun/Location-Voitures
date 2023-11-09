@extends('layouts.location')
@section('content')
    <div class="container" style="margin-top:15%">
        <div class="row bg-light">
            <div class="col-md-3">Nom complet :</div>
            <div class="col-md-3">Email :</div>
            <div class="col-md-2">Telephone :</div>
            <div class="col-md-2">Permis :</div>
            <div class="col-md-2">Actions :</div>
        </div>
        @foreach ($clients as $client)
            <div class="row">
                <div class="col-md-3 border text-white">{{ $client->user->name }}</div>
                <div class="col-md-3 border text-white">{{ $client->user->email }}</div>
                <div class="col-md-2 border text-white">{{ $client->tel }}</div>
                <div class="col-md-2 border text-white"><a href="{{ $client->permis }}">Consulter permis</a></div>
                <div class="col-md-2 border text-white">
                    <a href="/showClient/{{ $client->id }}"><i class="fa-solid fa-eye text-warning"
                            style="margin-right:3%;"></i></a>
                    <a style="color:rgb(199,0,0);margin-right:3%;" href="/deleteClient/{{ $client->id }}"
                        onclick="fon(this)" data-toggle="modal" data-target="#exampleModal"><i
                            class="fa-solid fa-trash"></i></a>
                </div>
            </div>
        @endforeach
    </div>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                        Annuler</button>
                    <a href="" id="valider" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Valider</a>
                </div>
            </div>
        </div>
    </div>


    @if (session()->has('success'))
        <div class="alert alert-success" onclick="hide(this)" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <script>
        function fon(rp) {
            var btn = rp.href;
            var valider = document.getElementById('valider');
            valider.setAttribute('href', btn);
        }

        function hide(smp) {
            smp.setAttribute('hidden', true);
        }
    </script>
    <script>
        var active = document.getElementById('clients');
        active.classList.add('activer');
    </script>
@endsection
