
<style>
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
                                                        <div style=" border-bottom: 1px solid black; padding-bottom: 2px;"><img class="logoactivate" src="{{url('/')}}/public/img/logo.png" title="Leguichet"></div>
                                        
                                        
                                        <h2><b style="font-size: 26px;color:#333;">Bonjour {{$user->name}},</b></h2>
                                        <p style="font-size: 14px;color:#333;">Votre ajout évènement a été bien réussi avec succès.</p>
                                        <p style="font-size: 14px;color:#333;"><b style="color:#d70506;">Programme : </b>{{$event->title}} </p>
                                        <p style="font-size: 14px;color:#333;"><b style="color:#d70506;">Localisation : </b>{{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
                                        <p style="font-size: 14px;color:#333;"><b style="color:#d70506;">Date : </b>le {{$event->date_debut_envent->format('d M Y H:i:s')}} à {{$event->date_fin_event->format('d M Y H:i:s')}} </p><br>
                                       
                                        
                                        <p style="font-size: 14px;color:#333;font-family:Lucida Console;"> Veuiller consulter votre <a style="text-decoration: none;color: #62b2eb;"href="{{url('/home')}}"> Compte</a></p><br>
                                        <div style="font-size: 14px;color:#333;text-align: center;background-color: #cccccc; margin-top: 25px; padding: 15px;  margin-bottom: 20px;  border: 1px solid transparent; border-radius: 4px;">
                                            <p>Vous avez des question? consultez notre <a style="text-decoration: none;color: #62b2eb;"href="{{url('')}}/tapakila/faq">FAQ</a> dès maintenant</p>
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
</body>