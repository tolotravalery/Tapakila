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
        <p>Votre événement a été ajouté avec <b style="color:#d70506;font-style:bold">SUCCES</b>. Nous vous remercions de votre confiance.<br/>
        <div class="image" style="position:relative;width:500px;height:220px;border:solid grey 1px;"><img style="width:500px;height:220px;" src="{{url('/')}}/public/img/{{$event->image}}"></div>
        <p>Pour consulter votre événement <a href="{{url('event/show',[$event->id])}}" style="color:#d70506;text-decoration:underline">cliquez ici</p>
    </div>

    <div class="footer" style="position:relative;width:100%;height:60px;margin:auto;background:#d70506;">
        <a href="{{url('/')}}" style="position:absolute;width:auto;text-decoration:underline;color:white;padding-top:18px;text-align:center;left:300px;" ><b>www.leguichet.mg</b></a>
    </div>

</div>
</body>
</html>

