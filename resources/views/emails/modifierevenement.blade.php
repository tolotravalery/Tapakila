
{{--<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }
#globcontent {
background-color: white;
margin-top: 84px;
padding: 20px 30px 20px 30px;
overflow: hidden;
margin-bottom: 83px;
border-radius: 3px;
    }
.mim{
    border-bottom: 1px solid black;
    padding-bottom: 2px;
    }
}

</style>
<body style="background-color:#eeeeee;">
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table class="content" width="100%" cellpadding="0" cellspacing="0">

                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0">
                        <table class="inner-body" align="center" width="900" cellpadding="0" cellspacing="0">

                            <tr>
                                <td class="content-cell">
                                <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div style="background-color: white;margin-top: 84px;padding: 20px 30px 20px 30px;overflow: hidden;margin-bottom: 83px;border-radius: 3px;">
                                            <div class="row">
                                                    <div class="col-md-10 col-md-offset-1">
                                                        <!-- <div style=" border-bottom: 1px solid black; padding-bottom: 2px;"><img class="logoactivate" src="{{url('/')}}/public/img/logo.png" title="Tapakila"></div>
                                         -->
                                        
                                        <h2 style="font-size: 26px;color:#333;"><b>Bonjour {{$user->name}},</b></h2>
                                        <p style="font-size: 14px;color:#333;">Votre modification évènement a été bien réussi. </p>
                                        <p style="font-size: 14px;color:#333;"><b >Titre : </b>{{$event->title}} </p>
                                        <p style="font-size: 14px;color:#333;"><b >Localisation : </b>{{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
                                        <p style="font-size: 14px;color:#333;"><b >Date : </b>le {{$event->date_debut_envent->format('d M Y H:i:s')}} à {{$event->date_fin_event->format('d M Y H:i:s')}} </p>
                                       
                                        
                                        <p style="font-size: 14px;color:#333;font-family:Lucida Console;"> Veuiller consulter votre <a style="text-decoration: none;color: #62b2eb;"href="{{url('/home')}}"> Compte</a></p><br>
                                        <div style="font-size: 14px;color:#333;text-align: center;background-color: #cccccc; margin-top: 25px; padding: 15px;  margin-bottom: 20px;  border: 1px solid transparent; border-radius: 4px;">
                                            <p>Vous avez des questions? consultez notre <a style="text-decoration: none;color: #62b2eb;"href="{{url('')}}/leguichet/faq">FAQ</a> dès maintenant</p>
                                            <p style="text-align:center;">Retourner vers <a href="https://leguichet.mg">leguichet.mg</a></p>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>--}}


<!DOCTYPE html>
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
            <a href="{{url('/')}}" style="position:absolute;text-decoration:underline;color:white; left:150px;padding-top:20px;" ><b>www.leguichet.mg</b></a>

        </div>
    </div>

    <div class="header" style="position:relative;width:100%;height:50px;margin:auto;background:#d70506 ;top:10px;">
        <div class="message" style="position:absolute;left:350px;font-style:bold;color:white;width:100px;top:15px;">SUCCESS</div>
    </div>
    <div class="section" style="position:relative;width:100%;height:auto;margin:auto;margin:50px;">
        <p>Bonjour {{$user->name}},</p>
        <p>La mise à jour de votre événement est réussie.</br>
        <div class="image" style="position:relative;width:500px;height:220px;border:solid grey 1px;"><img style="width:500px;height:220px;" src="{{url('/')}}/public/img/{{$event->image}}"></div>
        <p>Pour consulter votre événement <a href="{{url('event/show',[$event->id])}}" style="color:#d70506;text-decoration:underline">cliquez ici</p>
    </div>

    <div class="footer" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506;">
        <a href="{{url('/')}}" style="position:absolute;width:auto;text-decoration:underline;color:white;padding-top:18px;text-align:center;left:300px;" ><b>www.leguichet.mg</b></a>
    </div>

</div>
</body>
</html>