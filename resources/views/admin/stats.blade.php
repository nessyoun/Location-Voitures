@extends('layouts.location')
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <canvas id="myChart" width="90" height="90"></canvas>
            <h5 class="text-center my-2">Porifts par mois (les 6 derniers mois)</h5>
        </div>
        <div class="col-md-6">
            <canvas id="myChart1" width="90" height="90"></canvas>
            <h5 class="text-center my-2">Voitures les plus demander</h5>
        </div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script type="text/javascript" src = "{{asset('/js/stats.js')}}"></script>
@endsection