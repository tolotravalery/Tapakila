<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tapakila</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/animate.css">
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bootstrap.min.js"></script>

</head>
<body>
<!-- header start -->
@include('auth.includeheader')
<!-- header end -->
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <p class="reinitialise">Connexion</p>
            <div class="white">
                <div class="champs2">
                    <p><strong>Mail</strong></p>
                    <input id="email" type="placeholde" placeholder="name@domaine.com" class="form-control"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="red">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                    <p class="mdpt"><strong>Mots de passe</strong></p>
                    <input id="password" type="password" class="placeholde" name="password"
                           placeholder="********" required>

                    @if ($errors->has('password'))
                        <span class="red">
                                        <strong>{{ $errors->first('password') }}</strong>
                            </span>
                    @endif

                </div>
            </div>
            <div class="customcolor">
                <div class="row divider">
                    <div class="col-md-6 col-xs-12">
                        <input class="sinscrire input-submit" type="submit" name="s'inscrire'"
                               value="Se Connecter" style="margin-left: 80px;width: 180px;height: 56px;">
                    </div>
                    <div class="col-md-6 col-xs-12">

                        <a href="{{ url('/register') }}"><p class="red4">S'inscrire</p></a>
                        <a href="#"><p class="red3">Réinitialiser mots de passe</p></a>

                    </div>
                </div>
            </div>
            <div class="spacerwhite"></div>
            <div class="white2">
                <p class="fbk"><strong>vous êtes vous connecté avec votre compte facebook?</strong></p>
                <a class="btn btn-block btn-social btn-fb"
                   href="{{route('social.redirect',['provider' => 'facebook'])}}">
                    <span class="fa fa-facebook"></span> Connexion avec Facebook</a>

            </div>
        </form>
    </div>
    <!--/content goes here -->
</section>

@include('auth.includefooter')

<script typae="text/javascript">
    $('.dropdown-menu ul li a').click(function(event){
        event.stopPropagation();
        $(this).parent().toggleClass('active').siblings().removeClass('active');
        var target=$(this).attr('href');
        $('ul li .tab-content '+target).toggleClass(active in);
    });
</script>
</body>
</html>
