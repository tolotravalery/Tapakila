
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
                                <table class="wrapper" width="100%" cellpadding="0" cellspacing="0"style="border:1px solid black;">
                                <tr>
                                    <td align="center">
									<div style="background-color: white;margin-top: 84px;padding: 20px 30px 20px 30px;overflow: hidden;margin-bottom: 83px;border-radius: 3px;">
                                    <h4 style="color: grey; padding-top: 20px;">Félicitation! Votre achat est effectué avec succès</h4>
										
                                        <table class="content" width="100%" cellpadding="0" cellspacing="0" style="">
                            
                                            <tr style="">
                                                <td style="width: 30%;">
                                                     <div>
                                                         <img src="{{url('')}}/public/img/{{$event->image}}" style="width: 238px; height: 133px;">
                                                           
                                                        </div>
                                                        
                                                </td>
                                                
                                                <td style="color: grey;font-size: 12px;">
                                                
                                                            <p>{{$event->title}}</p>
                                                            <p>Lieu : {{$event->localisation_nom}} {{$event->localisation_adresse}}</p>
                                                           <p>date et heure: {{$event->date_debut_envent->format('d M Y H:i:s')}} à {{$event->date_fin_event->format('d M Y H:i:s')}}</p> 
                                                           
                                                       
                                                </td>
                                                <td style="color: grey;font-size: 12px;">
                                                
                                                                <p>Nombre de ticket</p>
                                                                <p>Prix: 20000 AR</p>
                                                                
                                                                <p style="margin-top: 56px;">Total: 40000 AR</p>
                                                                
                                                  
                                                </td>
                                            </tr>
											
                                        </table>

										<hr style="width:100%;color:#eeeeee;">
										 <table class="content" width="100%" cellpadding="0" cellspacing="0" style="padding-top: 16px;">
                            
                                            <tr>
												<td style="width: 30%;">
                                                     
                                                        
                                                </td>
												<td style="width: 25%;">
                                                     
                                                        
                                                </td>
                                                
                                                <td style="color: grey;font-size: 12px;width: 9%;">
                                                
                                                            
                                                            
                                                </td>
                                                <td style="color: grey;font-size: 12px;">
                                                
                                                                <b>Totaux : 80000 AR</b>
                                                                
                                                  
                                                </td>
											</tr>
										</table>
										<table class="content" width="100%" cellpadding="0" cellspacing="0" style="padding-top:30px;">
                            
                                            <tr>
												<td style="width: 30%;">
                                                     
                                                        
                                                </td>
												<td style="width: 25%;">
                                                     
                                                        
                                                </td>
                                                
                                                <td style="color: grey;font-size: 12px;width: 9%;">
                                                
                                                            <p>Achat via:</p>
                                                            
                                                </td>
                                                <td style="color: grey;font-size: 12px;">
                                                
                                                                 <img src="img/mvola_logo.png" class="logo-activation">
                                                  
                                                </td>
											</tr>
											<tr>
												<td colspan="2">
													 <p>Kiosk vous remercie de votre fidélité</p>
													<p>Pour tout information :<a href="www.kiosk.mg" >www.leguichet.mg</a></p>
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
</body>