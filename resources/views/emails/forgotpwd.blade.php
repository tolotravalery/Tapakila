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

    <div class="header" style="position:relative;width:100%;height:50px;margin:auto; ;top:10px;">
        <div class="message" style="position:absolute;left:275px;font-style:bold;color:black;width:250px;top:15px;text-decoration:underline;font-size:25px">Mot de passe oublié</div>
    </div>
    <div class="section" style="position:relative;width:100%;height:auto;margin:auto;margin:50px;">

        <p>Vous avez demandé à changer le mot de passe de votre compte leguichet ?</p> <p></br>Pour créer un nouveau mot de passe cliquez sur le lien ci-dessous :<br/></p>
        <div class="bouton" style="position:absolute;width:300px;height:50px;left:200px;background:black;"><a href="{{$actionUrl}}" style="position:absolute;text-decoration:underline;color:white; left:35px;padding-top:13px;" ><b>Réinitialiser votre mot de passe</b></a></div>

    </div>

    <div class="footer" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506;top:20px;">
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
                <p><b style="text-decoration:none;color:white !important;">Mot de passe oublié</b> </p>
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

            <p style="font-size: 14px;color:#333;padding-left:50px;padding-top:20px;">Bonjour.</p>
            <p style="font-size: 14px;color:#333;padding-left:50px;padding-top:0px;">Vous avez demandé à changer le mot de passe de votre compte leguichet ? Pour créer un nouveau mot de passe cliquez sur le lien ci-dessous :</p>

            <div style="  text-align: center;position: relative;min-height: 1px;margin-left: auto; margin-right: auto;width: 30%;">
                <a href="{{$actionUrl}}" style=" display:block;text-decoration: none;background-color: black; color: white;padding: 10px 16px;font-size: 18px; line-height: 1.3333333;border-radius: 6px; "> Réinitialiser votre mot de passe </a>
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
                <p>Pour toutes questions, consultez <a style="text-decoration:underline;color:white !important" href="{{url('/')}}/faq">faq</a> </p>
            </div>
        </div>
    </div>
</div>
</body>
