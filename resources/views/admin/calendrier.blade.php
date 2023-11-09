@extends('layouts.location')
@section('content')
<a class="nav-link nav-top" id="consulter" href="/Demandes">Voir demandes</a>
    <div class="container bg-light h-50 w-75" style="margin-top:10%">
        <div id="calendar">
            <!-- Le calendrier sera affiché ici -->
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: [
                    @foreach ($reservation as $res)
                        {

                            title: "{{ $res->Voiture->modelVoiture->model_voiture }} {{ $res->client->user->name }} {{ $res->etat->etat }}",
                            start: "{{ $res->date_debut }}",
                            end: "{{ $res->date_fin }}"
                        },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>


    <script>
        var active = document.getElementById('calendrieradmin');
        active.classList.add('activer');
    </script>
@endsection
