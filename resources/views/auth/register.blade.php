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
<section id="content">
    <div class="container">
        {!! Form::open(['route' => 'register', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ) !!}
        {{ csrf_field() }}
        <p class="inscript"><strong>Inscription</strong></p>
        <div class="white5">
            <div class="col-md-6 col-xs-6">
                <div class="champs">
                    <p><strong>Nom</strong></p>
                    {!! Form::text('name', null, ['class' => 'placehold', 'placeholder' => 'Nom', 'id' => 'name', 'required', 'autofocus']) !!}
                    @if ($errors->has('name'))
                        <span class="red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                    <p class="element"><strong>Prénoms</strong></p>
                    {!! Form::text('first_name', null, ['class' => 'placehold', 'placeholder' => 'Prénoms', 'id' => 'first_name']) !!}
                    @if ($errors->has('first_name'))
                        <span class="red">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                    <p class="element"><strong>E-mail</strong></p>
                    {!! Form::email('email', null, ['class' => 'placehold', 'id' => 'email', 'placeholder' => 'E-Mail', 'required']) !!}
                    @if ($errors->has('email'))
                        <span class="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <p class="element"><strong>Mots de passe</strong></p>
                    {!! Form::password('password', ['class' => 'placehold', 'id' => 'password', 'placeholder' => '*******', 'required']) !!}
                    @if ($errors->has('password'))
                        <span class="red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <p class="element"><strong></strong></p>
                    {!! Form::password('password_confirmation', ['class' => 'placehold', 'id' => 'password-confirm', 'placeholder' => '*******', 'required']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input class="inscripto input-submit" type="submit" name="s'inscrire'" value="S'inscrire">
                </div>
                <div class="col-md-6 descript">
                    <p><strong>Déjà inscrit ?</strong> <a href="{{ url('/login') }}" class="siginyou">connecter vous </a>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
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
