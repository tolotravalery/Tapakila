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
<body style="background-color:#eeeeee;">
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="background-color: #d70506;padding: 2px">
            <img src="{{url('/')}}/public/img/logo.png" style="padding-left: -5px;">
        </td>
    </tr>
</table>
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
            <h2>
                <br/><b style=" color:#333;margin-top: 35px; margin-bottom: 10px;font-size: 30px;word-wrap: break-word;font-weight: 700;font-family:Lucida Console;">Bonjour {{$user->name}},</b>
            </h2>
            <p style="font-size: 14px;color:#333;">Nous vous remerçions pour votre achat. <br>Ce QrCode peut être scanné directement via votre smartphone ou bien téléchargez et imprimez le PDF pour pouvoir le présenter au guichet.</p><br>

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
	<tr align="center">
		<div style="background-color: white; bottom: 0; padding: 20px 25px 20px 25px; text-align: center;">
				<img src="{{url('/')}}/public/tickets/guide.png" width="700px"
					 height="120px">
			</div>
	</tr>
</table>
<br/>
<div class="container">
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div style=" color: white;text-align: center;background-color: #d70506;font-size: 16px;padding: 1px;font-family:sans-serif;">
                <p><strong><a style="text-decoration:none;color:white !important" href="www.leguichet.mg">www.leguichet.mg</a> </strong></p>
            </div>
        </div>
    </div>
</div>
</body>
