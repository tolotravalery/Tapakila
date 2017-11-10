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

    .mim {
        border-bottom: 1px solid black;
        padding-bottom: 2px;
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
                                    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center">
                                                <div style="background-color: white;margin-top: 84px;padding: 20px 30px 20px 30px;overflow: hidden;margin-bottom: 83px;border-radius: 3px;">
                                                <div style=" border-bottom: 1px solid black; padding-bottom: 2px;"><img class="logoactivate" src="{{url('/')}}/public/img/logo.png" title="Tapakila"></div>
                                                    <h4 style="color: #333;font-size: 21px;">Bonjour {{$user->name}},</h4>
                                                    <h4 style="color: #333;font-size: 21px;">Félicitation! Votre paiement est effectué avec succès. </h4>
                                                    
                                                    <p style="font-size: 16px;color:#333;">Voici votre liste de vos achats effectués avec le total à payer.</p>
                                                    <p style="font-size: 16px;color:#333;padding-bottom: 30px;">Nous vous remercions de votre confiance. </p>
                                                    @php($somme=0)
                                                    @foreach($data as $d)
                                                        @php
                                                            $event = $d['ticket']->events[0];
                                                        @endphp
                                                        <table class="content" width="100%" cellpadding="0"
                                                               cellspacing="0"
                                                               style="">

                                                            <tr style="">
                                                                <td style="width: 30%;">
                                                                    <div>
                                                                        <img src="{{url('')}}/public/img/{{$event->image}}"
                                                                             style="width: 238px; height: 133px;">

                                                                    </div>

                                                                </td>

                                                                <td style="color: #333;font-size: 12px;">

                                                                    <p>{{$event->title}}</p>
                                                                    <p style="color: #333;">Lieu
                                                                        : {{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
                                                                    <p style="color: #333;">date et
                                                                        heure:
                                                                        {{\Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y H:i')}}
                                                                        à {{\Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y H:i')}}
                                                                    </p>
                                                                </td>
                                                                <td style="color: #333;font-size: 12px;">
                                                                    <p style="color: #333;">Nombre de ticket : {{count($d['tapakila'])}}</p>
                                                                    <p style="color: #333;">
                                                                        Prix: {{$d['ticket']->price}}
                                                                        AR</p>
                                                                    <p style="margin-top: 56px;color:#333;">
                                                                        Total: {{count($d['tapakila']) * $d['ticket']->price}}
                                                                        AR</p>
                                                                    @php($somme+=count($d['tapakila']) * $d['ticket']->price)
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <hr style="width:100%;color:#eeeeee;">
                                                    @endforeach
                                                    <table class="content" width="100%" cellpadding="0" cellspacing="0"
                                                           style="padding-top: 16px;">
                                                        <tr>
                                                            <td style="width: 30%;">
                                                            </td>
                                                            <td style="width: 25%;">
                                                            </td>
                                                            <td style="color: #333;font-size: 12px;width: 26%;">
                                                            </td>
                                                            <td style="color: #333;font-size: 12px;">
                                                                <b>Totaux : {{$somme}} AR</b>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="content" width="100%" cellpadding="0" cellspacing="0"
                                                           style="padding-top:30px;">
                                                        <tr>
                                                            <td style="width: 30%;">
                                                            </td>
                                                            <td style="width: 25%;">
                                                            </td>
                                                            <td style="color: #333;font-size: 12px;width: 9%;">
                                                                <p>Achat via:</p>
                                                            </td>
                                                            <td style="color: #333;font-size: 12px; width:10%;">
                                                                @if($payment_mode->slug=='telma')
                                                                    <img class="logo-activation"
                                                                         src="{{url('/')}}/public/img/logmvola.png"
                                                                         alt="">
                                                                @elseif($payment_mode->slug=='orange')
                                                                    <img class="logo-activation"
                                                                         src="{{url('/')}}/public/img/logmorange.png"
                                                                         alt="">
                                                                @elseif($payment_mode->slug=='airtel')
                                                                    <img class="logo-activation"
                                                                         src="{{url('/')}}/public/img/logmartel.png"
                                                                         alt="">
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <p style="color: #333;">Leguichet vous remercie de votre fidélité</p>
                                                                <p style="color: #333;">Pour tout information : <a href="www.leguichet.mg">www.leguichet.mg</a>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    </table>
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
        </td>
    </tr>
</table>
</body>