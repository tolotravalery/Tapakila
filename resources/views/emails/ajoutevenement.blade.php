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
            <p style="font-size: 14px;color:#333;">Votre événement a été bien ajouté, nous vous remerçions de votre confiance.</p><br>

        </td>
    </tr>
	<tr>
		<td align="center">
			<table>
				<tr>
					<td>
					<div align="left">
				<p style="font-size: 14px;color:#333;"><b>Titre: </b>{{$event->title}} </p>
				<p style="font-size: 14px;color:#333;"><b>Description
				: </b>{{$event->additional_note}} </p>
				<p style="font-size: 14px;color:#333;"><b>Programme
				: </b>{{$event->additional_note_time}} </p>
				<p style="font-size: 14px;color:#333;"><b>Localisation
				: </b>{{$event->localisation_nom}} {{$event->localisation_adresse}}
				</p>
				<p style="font-size: 14px;color:#333;"><b>Date
				: </b>le {{$event->date_debut_envent->format('d M Y H:i:s')}}
				à {{$event->date_fin_event->format('d M Y H:i:s')}} </p><br>
			</div>
					</td>
				</tr>
			</table>
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
                <p><strong><a style="text-decoration:none;color:white !important" href="www.leguichet.mg">www.leguichet.mg</a> </strong></p>
            </div>
        </div>
    </div>
</div>
</body>
