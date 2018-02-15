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
                <p><a style="text-decoration:none;color:white !important;" href="{{url('/')}}">www.leguichet.mg</a></p>
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
                <p><b style="text-decoration:none;color:white !important;">SUCCES</b><img src="{{url('/')}}/public/img/successb.png" style="width:15px;height:15px"></p>
            </div>
        </div>
    </div>
</div>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="margin-top:-20px">
    <tr>
        <td align="center">
            <h2>
                <br/><b style=" color:#333;margin-top: 35px; margin-bottom: 10px;font-size: 30px;word-wrap: break-word;font-weight: 700;font-family:Lucida Console;">Bonjour {{$user->name}}
                    ,</b>
            </h2>
            <p style="font-size: 14px;color:#333;">L’achat de votre ticket a été bien effectué.</p><br>

        </td>
    </tr>
    <tr>
        <td align="center">
            <table>
                <ul>
                    @foreach($data as $d)
                        @php
                            $event = $d['ticket']->events[0];
                        @endphp
                        <ol>
                            <p style="font-size: 14px;color:#333;">
                                <strong>{{$event->title}}
                                    ( {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                    )</strong>
                            </p>
                            <p style="font-size: 14px;color:#333;">
                                Localisation : {{$event->localisation_nom}}
                                {{$event->localisation_adresse}}
                            </p>
                        </ol>
                        <table class="wrapper" width="100%" cellpadding="0"
                               cellspacing="0">
                            @if(count($d['tapakila'])<=4)
                                <tr>
                                    @foreach($d['tapakila'] as $tapakila)
                                        <td>
                                            <p style="text-align: center; margin: 5px 0; ">{{$d['ticket']->type}}</p>
                                            <p style="text-align: center">
                                                <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}"
                                                     width="500px" height="500px"
                                                     class="qt">
                                            </p>
                                        </td>
                                    @endforeach
                                </tr>
                            @else
                                @php($i=0)
                                @foreach($d['tapakila'] as $tapakila)
                                    @if($i%4 == 0)
                                        @if($i==0)
                                            <tr>
                                                <td>
                                                    <p style="text-align: center; margin: 5px 0; ">{{$d['ticket']->type}}</p>
                                                    <p style="text-align: center">
                                                        <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}"
                                                             width="500px"
                                                             height="500px"
                                                             class="qt">
                                                    </p>
                                                </td>
                                                @else
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p style="text-align: center; margin: 5px 0; ">{{$d['ticket']->type}}</p>
                                                    <p style="text-align: center">
                                                        <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}"
                                                             width="500px"
                                                             height="500px"
                                                             class="qt">
                                                    </p>
                                                </td>
                                                @endif
                                                @else
                                                    <td>
                                                        <p style="text-align: center; margin: 5px 0; ">{{$d['ticket']->type}}</p>
                                                        <p style="text-align: center">
                                                            <img src="{{url('/public/qr_code/'.$tapakila->qr_code)}}"
                                                                 width="500px"
                                                                 height="500px"
                                                                 class="qt">
                                                        </p>
                                                    </td>
                                                @endif
                                                @if($i==count($d['tapakila']))
                                            </tr>
                                        @endif
                                        @php($i++)
                                        @endforeach
                                    @endif

                        </table>
                    @endforeach
                </ul>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <p style="font-size: 14px;color:#333;padding-top:0px;width:auto;">Ce QR Code est votre clé
                d’entré pour cet événement. Un ticket imprimable en format PDF est attaché en pièce jointe.</p>
            <p style="font-size: 14px;color:#333;padding-top:0px;width:auto;">Cliquez sur <a
                        style="color:#d70506" href="{{url('/')}}">leguichet.mg</a> pour revenir vers le site. </p>

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
                <p>Pour toutes questions, consultez <a style="text-decoration:underline;color:white !important"
                                                       href="{{url('/')}}/faq">faq</a></p>
            </div>
        </div>
    </div>
</div>
</body>
