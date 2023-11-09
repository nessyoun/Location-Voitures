<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/ae0af63985.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /* Add custom CSS for the fixed side navbar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #eee;
            color: #333;
        }

        .content {
            margin-left: 260px;
            /* Adjust this value based on your sidebar width */
            padding: 15px;
        }

        .a {
            color: #333;
            height: 50px;
            font-weight: bold;

        }

        .a:hover {
            color: #fff;
            background-color: rgb(199, 0, 0);
            transition: 0, 5s ease;
        }

        .activer {
            background-color: rgb(199, 0, 0);
            color: rgb(255, 255, 255);
            border-left:10px solid black;
        }

        .active {
            color: rgb(199, 0, 0);
        }

        .nav-top {
            color: #fff;
        }

        .nav-top:hover {
            color: rgb(199, 0, 0);
        }

        .co-dash {
            border-radius: 15px;
            font-size: 25px;
            color: rgb(255, 255, 255);
        }
    </style>

</head>

<body class="bg-dark">
    <div id="app">
        <div class="sidebar" id="sidebar">
            <h2 class="mx-3 my-4 text-center po" >{{ config('app.name', 'Laravel') }}</h2>
            <br><br>
            <ul class="nav flex-column w-100">
                @if (auth()->user()->hasRole('admin'))
                    <li class="nav-item ">
                        <a class="nav-link a" id="homeadmin" href="/home"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link a" id="voitureadmin" href="/voitures/consulter"><i
                                class="fa-solid fa-car"></i> Voiture</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="calendrieradmin" href="/calendrier"><i
                                class="fa-solid fa-calendar-days"></i> Calendrier</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="stats" href="/stats"><i class="fa-solid fa-chart-simple"></i>
                            Statisques</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="users" href="/users"><i class="fa-solid fa-user"></i> Users</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="clients" href="/clients"><i class="fa-solid fa-user"></i>
                            Clients</a>
                    </li>
                @elseif(auth()->user()->hasRole('commercial'))
                    <li class="nav-item ">
                        <a class="nav-link a" id="homecom" href="/home"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link a" id="voitureadmin" href="/voitures/consulter"><i
                                class="fa-solid fa-car"></i> Voiture</a>
                    </li>
                 <li class="nav-item a">
                        <a class="nav-link a" id="calendrieradmin" href="/calendrier"><i
                                class="fa-solid fa-calendar-days"></i> Calendrier</a>
                    </li>
                <li class="nav-item a">
                        <a class="nav-link a" id="clients" href="/clients"><i class="fa-solid fa-user"></i>
                            Clients</a>
                    </li>
                @elseif(auth()->user()->hasRole('normal_client'))
                    <li class="nav-item ">
                        <a class="nav-link a" id="homeclient" href="/home"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link a" id="miller" href="/milleur"><i class="fa-solid fa-arrow-trend-up"></i> Mieulleur
                            choix</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="newCar" href="/newCar"><i class="fa-solid fa-newspaper"></i> Nouvel arrivage</a>
                    </li>
                    <li class="nav-item a">
                        <a class="nav-link a" id="res" href="/reservations/{{auth()->user()->client_id}}"><i class="fa-solid fa-cart-shopping"></i> Mes réservations</a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="content">



            <div class="dropdown fixed-top my-4" style="margin-left:85%;">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/profile">Profil</a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Deconnexion
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>





            @yield('content')
            <div class="content">
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
</body>

</html>
