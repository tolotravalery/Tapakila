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
                <p><a style="text-decoration:none;color:white !important;" href="{{url('/')}}">www.leguichet.mg</a> </p>
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
            <div style="; color: white;text-align: center;background-color: #d70506;font-size: 16px;padding: 1px;font-family:sans-serif;">
                <p><b style="text-decoration:none;color:white !important;">NEWSLETTER</b> </p>
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

            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:20px;">Bonjour {{$user->name}}!</p>
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;">Ne ratez pas les événements importants sur leguichet.mg. Venez visiter le site web .</p>
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;"><a style="color:#d70506" href="{{url('/')}}"> www.leguichet.mg</a></p>

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
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;">Nom de l’évenement :{{$event->title}}</p>
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;">Description : {{$event->additional_note}}.</p>
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;">Lieu : {{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
            <p style="font-size: 14px;color:#333;padding-left:20px;padding-top:0px;">Date : le {{$event->date_debut_envent->format('d M Y H:i:s')}} à {{$event->date_fin_event->format('d M Y H:i:s')}}</p>

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
