<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" >
    <tr>
        <td style="background-color: #d70506;padding: 6px -6px 6px 6px;">
            <img src="{{ url('/') }}/public/img/logo.png" style="padding-left: -5px;">
        </td>
    </tr>
</table>
<table class="wrapper" width="100%" style="margin-top:-20px;margin-left:18px; ">
    <tr>
        <td>
            <h3 style="font-size: 30px; font-family:sans-serif;color:#333;"><b>{{strtoupper($event->title)}}</b></h3>
            <p style="font-family:sans-serif;font-size: 18px;color: #d70506;padding-top: -34px;margin: 0 0 10px;">{{$event->localisation_nom }} {{$event->localisation_adresse}}</p>
        </td>
    </tr>
</table>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="margin-top:-30px;margin-left:21px;">
    <tr>
        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300; width: 150px;">PRIX</p></th>
        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300;width: 194px;">DATE</p></th>
        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300;width: 194px;">HEURE</p></th>
    </tr>
    <tr>
        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width: 150px;"><h4><strong>{!! $price !!} Ar</strong></h4></th>
        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width: 194px;"><h4><strong>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d/M/Y')}}</strong></h4></th>
        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width: 194px;"><h4><strong>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}</strong></h4></th>
    </tr>
</table>
{{--<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="margin-top:-40px;margin-left:15px;">
    <tr>
        <th><h4><strong>3 000 AR</strong></h4></th>
        <th><h4><strong>12-28-20</strong></h4></th>
        <th><h4><strong>20:20</strong></h4></th>
    </tr>
</table>--}}
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0"style="margin-top:-20px">
    <tr>
        <td align="center">
            <img src="{!! $image !!}" width="200px" height="200px">
        </td>
    </tr>
</table>
<div class="container">
    <div class="row ">
        <div class="col-lg-offset-3 col-lg-6">
            <div>
                <img src="{!! $eventImage !!}" style="width: 100%; height: 200px">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div  style=" color: white;text-align: center;background-color: #d70506;font-size: 16px;padding: 2px -6px 2px 6px;font-family:sans-serif;">
                <p><strong>www.leguichet.mg</strong></p>
            </div>
        </div>
    </div>
</div>
{{--<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" >
    <tr>
        <td style=" color: white;text-align: center;background-color: #d70506;font-size: 15px;">
            <p><strong>www.leguichet.mg</strong></p>
        </td>
    </tr>
</table>--}}
{{--<tr>
        <td align="center">
            <img src="{!! $image !!}">
        </td>

    </tr>--}}
{{--<tr>
    <td style="text-align: center;">
        <img src="{!! $eventImage !!}" width="200px" height="100px"><br/>
        <p>{{ucfirst(strtolower($event->title))}}</p>
        <p>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}</p>
        <p>{{$event->localisation_nom }} {{$event->localisation_adresse}}</p>
    </td>
</tr>--}}
{{--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ url('/') }}/public/css/bootstrap.min-1.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
    <script src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div  class="Titre">
                    <img src="{{ url('/') }}/public/img/logo.png">
                </div>
            </div>
        </div>
    </div>
</header>
<content>
    <div class="container">
        <div class="row ">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="w-bg">
                    <h3><b>{{$event->title}}</b></h3>
                    <p>{{$event->localisation_nom }} {{$event->localisation_adresse}}</p>
                    <div class="row ">
                        <div class="col-lg-4">
                            <p>PRIX</p>
                            <h4><b>3 000 AR</b></h4>
                        </div>

                        <div class="col-lg-4">
                            <p>DATE</p>
                            <h4><b>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}</b></h4>
                        </div>

                        <div class="col-lg-4">
                            <p>HEURE</p>
                            <h4><b>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('h s')}}</b></h4>
                        </div>
                    </div>
                    <div class="qrcodescan">
                        <img src="{!! $image !!}" style="width: 50%;">
                    </div>
                </div>
                <div>
                    <img src="{!! $eventImage !!}" style="width: 100%;">
                </div>

            </div>
        </div>
    </div>
</content>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div  class="foottitre">
                    <p><strong>www.leguichet.mg</strong></p>
                </div>
            </div>
        </div>
    </div>
</footer>

</body></html>--}}
