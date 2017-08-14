@extends("template")
@section('content')
    <section class="content-elite">
        <!--/content goes here -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <!-- menutab start -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="#" class="active" id="login-form-link">Connexion</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="#" id="register-form-link" class="">S'inscrire</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- menutab end -->

                        <!-- formulaire start -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- connexion start -->
                                    <form id="login-form" style="display: block;" role="form" method="POST"
                                          action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email">Adresse e-mail </label>
                                            <input type="text" name="email" id="username" tabindex="1"
                                                   class="form-control"
                                                   placeholder="e-mail" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="red">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Mot de passe:</label>
                                            <input type="password" name="password" id="password" tabindex="2"
                                                   class="form-control" placeholder="********" required>
                                            @if ($errors->has('password'))
                                                <span class="red">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-offset-0">
                                                    <input name="login-submit" id="login-submit" tabindex="4"
                                                           class="form-control btn btn-login" value="Se connecter"
                                                           type="submit">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="checkbox-custom checkbox-inline checkbox-primary pull-left col-lg-12">
                                                        <input id="inputCheckbox" name="remember" type="checkbox">
                                                        <label for="inputCheckbox">Se souvenir de moi</label><br>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <a href="{{ route('password.request') }}" tabindex="5"
                                                           class="réitinitialiser le mots de passe">Mot de passe oublié&nbsp;?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Connexion facebook start-->
                                        <div class="content-conexion">
                                            <h5 class="facenookconexion"><strong> Se connecter avec votre compte
                                                    facebook?</strong></h5>
                                            <div class="row">
                                                <div class="col-md-8 col-md-offset-2">
                                                    <a href="{{route('social.redirect',['provider' => 'facebook'])}}">
                                                        <button type="button" class="btn-facebooksign"><img
                                                                    src="{{url('/img/fblogo.jpeg')}}">Connexion avec
                                                            facebook
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- connexion facebook end -->
                                    </form>


                                    <!-- connexion end -->

                                    <!-- inscription start -->

                                    {!! Form::open(['id' => 'register-form', 'route' => 'register','style' =>'display:none;', 'role' => 'form', 'method' => 'POST'] ) !!}
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email">Nom:</label>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom', 'id' => 'username', 'required', 'autofocus','tabindex' => '1']) !!}
                                        @if ($errors->has('name'))
                                            <span class="red">
                                        <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Prénom:</label>
                                        {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Prénoms', 'id' => 'username','tabindex' => '1']) !!}
                                        @if ($errors->has('first_name'))
                                            <span class="red">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd"> Adresse e-mail:</label>
                                        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail', 'required','tabindex' => '1']) !!}
                                        @if ($errors->has('email'))
                                            <span class="red">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="pwd">Mot de passe:</label>
                                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => '*******', 'required', 'tabindex' => '2']) !!}
                                        @if ($errors->has('password'))
                                            <span class="red">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'confirm-password', 'placeholder' => '*******', 'required']) !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-offset-0 ">
                                                <input name="register-submit" id="register-submit" tabindex="4"
                                                       class="form-control btn btn-register" value="S'inscrire"
                                                       type="submit">
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- inscription end -->
                                </div>
                            </div>
                        </div>
                        <!-- formulaire end -->
                    </div>
                </div>
            </div>
        </div>
        <!--/content goes here -->
    </section>
@endsection
@section('specificScript')
    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script>
        $(function () {


            $('#register-form-link').click(function (e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#login-form-link').click(function (e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });
    </script>
@endsection