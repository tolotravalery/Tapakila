{{--<style>
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
                <br/><b style=" color:#333;margin-top: 35px; margin-bottom: 10px;font-size: 30px;word-wrap: break-word;font-weight: 700;font-family:Lucida Console;">Bonjour,</b>
            </h2>
            <p style="font-size: 14px;color:#333;">Nous avons reçu une demande de réinitialisation du mot de passe pour
                votre compte.</p>
            <p style="font-size: 14px;color:#333;">Veuillez cliquer sur reinitialiser mot de passe. </p><br>
            <div style="  text-align: center;position: relative;min-height: 1px;margin-left: auto; margin-right: auto;width: 33.33333333%;">
                <a href="{{$actionUrl}}"
                   style=" display:block;text-decoration: none;background-color: black; color: white;padding: 10px 16px;font-size: 18px; line-height: 1.3333333;border-radius: 6px; ">
                    Reinitialiser mot de passe </a>
            </div>
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
                <p><strong><a style="text-decoration: none;" href="www.leguichet.mg">www.leguichet.mg</a> </strong></p>
            </div>
        </div>
    </div>
</div>
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

    <div class="header" style="position:relative;width:100%;height:50px;margin:auto; ;top:10px;">
        <div class="message" style="position:absolute;left:300px;font-style:bold;color:black;width:250px;top:15px;text-decoration:underline;font-size:25px">Mot de passe oublié</div>
    </div>
    <div class="section" style="position:relative;width:100%;height:auto;margin:auto;margin:50px;">

        <p>Vous avez demandé à changer le mot de passe de votre compte leguichet ? </br>Pour créer un nouveau mot de passe cliquez sur le lien ci-dessous :<br/></p>
        <div class="bouton" style="position:absolute;width:300px;height:50px;left:200px;background:black;"><a href="{{$actionUrl}}" style="position:absolute;text-decoration:underline;color:white; left:35px;padding-top:13px;" ><b>Réinitialiser votre mot de passe</b></a></div>

    </div>

    <div class="footer" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506;top:20px;">
        <a href="{{url('/')}}" style="position:absolute;width:auto;text-decoration:underline;color:white;padding-top:18px;text-align:center;left:300px;" ><b>www.leguichet.mg</b></a>
    </div>

</div>
</body>
</html>