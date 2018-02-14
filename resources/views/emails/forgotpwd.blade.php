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
</html>

