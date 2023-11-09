@extends('layouts.location')

@section('content')
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-top nav-link active" href="#">Réserver</a>
    </li>
    <li class="nav-item">
        <a class="nav-link nav-top" href="#">Consulter</a>
    </li>
    </ul>
    <div class="container">
        <h1 class="text-center text-white zindex-dropdown" style="font-size:120px">Clio4</h1>
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-50" style="margin-left:25%;" src="{{ asset('storage/img/1.png') }}" alt="First slide">
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-50" src="{{ asset('storage/img/2.png') }}" style="margin-left:25%;" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-50" src="{{ asset('storage/img/3.png') }}" style="margin-left:25%;" alt="Third slide">
                </div>
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
    </div>
@endsection
