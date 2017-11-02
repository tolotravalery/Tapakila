<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Leguichets</title>
    <link rel="stylesheet" href="{{ url('/') }}/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/mediaqueries.css">
    @yield('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/public/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/font-awesome.css">
    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row" style="background-color: #eeeeee;">
        <div class="menu_int2">
            <div class="com_contenu_type">
                <div class="row">
                    <div class="col-lg-2">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{ url('/') }}/public/img/logo.png" title="leguichet">
                        </a>
                    </div>
                    <div class="col-lg-10">
                        <h2>leguichet</h2>
                        <p>Merci, voici vos billets! Lorsque vous participez, indiquez le code
                            dans ce courrier électronique ou utilisez le fichier .pdf
                            ci-joint</p>
                    </div>

                </div>

                <hr class="separe">
                <h2>Mes évènements</h2>

                @foreach($tic as $ticket)
                    @php
                        $event = $ticket->events[0];
                    @endphp
                    <strong>{{$event->title}}</strong>
                    <p>Localisation :
                        {{$event->localisation_nom}}
                        {{$event->localisation_adresse}}
                    </p>
                    {{--<p>Date : {{ \Carbon\Carbon::parse($ticket->pivot->date)->format('d D M Y')}}</p>--}}
                    <hr class="separe">

                    <div class="row">
                        @foreach($tap as $tapakila)
                            <div class="col-lg-4">
                                <p style="text-align: center; margin: 5px 0; ">{{$ticket->type}}</p>
                                <p style="text-align: center">
                                    <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}" class="qt">
                                </p>
                            </div>
                        @endforeach
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>
</body>