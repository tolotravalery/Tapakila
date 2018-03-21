{{--<!DOCTYPE html>
<html lang="fr">
<head>
</head>
<body width="800px">
<div class="cp" style="position:relative;width:800px;margin:auto;height:auto;">
    <div class="header" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506">
        <div class="logo" style="position:absolute;width:15%;height:80px;top:5px;left:10px;">
            <img src="{{url('/')}}/public/img/logo.png">
        </div>
        <div class="titre" style="position:absolute;width:80%;height:80px;float:right; left:20%;top:2px;">
            <a href="{{url('/')}}" style="position:absolute;text-decoration:underline;color:white; left:165px;padding-top:20px;" ><b>www.leguichet.mg</b></a>

        </div>
    </div>

    <div class="header" style="position:relative;width:100%;height:50px;margin:auto;background:#d70506 ;top:10px;">
        <div class="message" style="position:absolute;left:350px;font-style:bold;color:white;width:100px;top:15px;">SUCCESS</div>
    </div>
    <div class="section" style="position:relative;width:100%;height:auto;margin:auto;margin:50px;">
        <p>Bonjour {{$user->name}},</p>
        <p>Votre événement a été ajouté avec <b style="color:#d70506;font-style:bold">SUCCES</b>. Nous vous remercions de votre confiance.<br/>
        <div class="image" style="position:relative;width:500px;height:220px;border:solid grey 1px;"><img style="width:500px;height:220px;" src="{{url('/')}}/public/img/{{$event->image}}"></div>
        <p>Pour consulter votre événement <a href="{{url('event/show',[$event->id])}}" style="color:#d70506;text-decoration:underline">cliquez ici</p>
    </div>

    <div class="footer" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506;">
        <p style="position:absolute;width:auto;text-decoration:none;color:white;padding-top:10px;text-align:center;left:280px;">Pour toutes questions, consultez<a style="text-decoration:underline;color:white;" href="{{url('/')}}"  > faq</a></p>
    </div>

</div>
</body>
</html>--}}

<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

</style>
<body style="background-color:white;">
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div style="height: 0px; color: white;text-align: center;background-color: #d70506;font-size: 16px;padding: 2px;font-family:sans-serif;">
                <p><a style="text-decoration:none;color:white !important;" href="{{url('/')}}">Le Guichet</a> </p>
            </div>
        </div>
    </div>
</div>
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="background-color: #d70506;padding: 2px">
            <img src="{{url('/')}}/public/img/logo.png" style="padding-left: -5px;">
        </td>
    </tr>
</table>
<br/>
<div class="container">
    </br>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div style="; color: white;text-align: center;background-color: #5cb85c;font-size: 16px;padding: 1px;font-family:sans-serif;">
                <p><b style="text-decoration:none;color:white !important;">SUCCES</b> <img src="{{url('/')}}/public/img/successb.png" style="width:15px;height:15px"></p>
            </div>
        </div>
    </div>
</div>


<table class="wrapper" width="100%" style="margin-top:-20px;margin-left:18px; ">
    <tr>
        <td>
            <h3 style="font-size: 30px; font-family:sans-serif;color:#333;"><b></b></h3>
            <p style="font-family:sans-serif;font-size: 18px;color: #d70506;padding-top: -34px;margin: 0 0 10px;"></p>
        </td>
    </tr>
</table>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="margin-top:-20px">
    <tr>
        <td align="center">

            <p style="font-size: 14px;color:#333;padding-top:20px;">Bonjour {{$user->name}}!</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;width:auto;">Votre événement a été ajouté avec <strong style="color:#d70506"> SUCCES</strong>.Nous vous remercions de votre confiance.</p>

            <p>
                <div class="container">
                    </br>
                    <div class="row">
                        <div class="col-lg-offset-3 col-lg-6">
                            <div style="; color: white;text-align: center;font-size: 16px;padding: 0px;font-family:sans-serif;">
                                 <div class="image" style="position:relative;width:auto;height:auto;"><img style="width:auto;height:auto;" src="{{url('/')}}/public/img/{{$event->image}}"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </p>
            @php
                $string_url_detail = "/evenement/".$event->sous_menus->name ."/".$event->date_debut_envent->format('Y-m-d') . "_".  str_slug($event->title)."_".$event->id;
            @endphp
            <p style="font-size: 14px;color:#333;padding-top:0px;">Nom de l’évenement :{{$event->title}}</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;">Description : {{$event->additional_note}}.</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;">Lieu : {{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;">Date : le {{$event->date_debut_envent->format('d M Y H:i')}} à {{$event->date_fin_event->format('d M Y H:i')}}</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;width:auto;">Pour consulter votre événement   <a style="color:#d70506" href="{{url($string_url_detail)}}"> cliquez ici</a></p>

        </td>
    </tr>
</table>
<br/>
<div class="container">
    <div class="row ">

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div style=" color: white;text-align: center;background-color: #d70506;font-size: 16px;padding: 1px;font-family:sans-serif;">
                <p>Pour toutes questions, consultez <a style="text-decoration:underline;color:white !important" href="{{url('/')}}/faq">faq</a> </p>
            </div>
        </div>
    </div>
</div>
</body>
