@extends("template")
@section('content')
    <div class="container custom-container">
        <div class="row lof">
            <div class="col-md-4 col-md-offset-4" style="background-color:white;">

                <ul id="myTabs" class="nav nav-pills nav-justified hii" role="tablist" data-tabs="tabs"
                    style="background-color: #e6e6e6;margin-top: 15px;">
                    <li class="active"><a href="#Commentary" data-toggle="tab">Connexion</a></li>
                    <li><a href="#Videos" data-toggle="tab">S'inscrire</a></li>
                </ul>
                <div class="tab-content"
                     style="padding: 26px 19px 13px 19px;border: 2px solid #d70506;margin-bottom: 15px;">
                    <div role="tabpanel" class="tab-pane fade in active" id="Commentary">
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
                                    <div class="col-sm-6 col-md-offset-3">
                                        <input name="login-submit" id="login-submit" tabindex="4"
                                               class="form-control btn btn-login boutt" value="Se connecter"
                                               type="submit">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="checkbox-custom checkbox-inline checkbox-primary pull-left col-lg-12">
                                            <input id="inputCheckbox" name="remember" type="checkbox">
                                            <label for="inputCheckbox">Se souvenir de moi</label><br>
                                        </div>

                                        <div class="col-lg-12 col-xs-12">
                                            <a href="{{ route('password.request') }}" tabindex="5"
                                               class="réitinitialiser le mots de passe">Mot de passe oublié&nbsp;?</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Connexion facebook start-->
                            <div class="content-conexion">
                                <h5 class="facenookconexion"> .. se connecter avec </h5>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <a href="{{route('social.redirect',['provider' => 'facebook'])}}">
                                            <button type="button" class="btn-facebooksign"><img
                                                        src="{{url('public/img/fblogo.jpeg')}}"> Facebook
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Videos">


                        <!-- inscription start -->

                        {!! Form::open(['id' => 'register-form', 'route' => 'register', 'role' => 'form', 'method' => 'POST'] ) !!}
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


                            {{--{!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'E-Mail', 'required','tabindex' => '1']) !!}--}}
                            {!!  Form::checkbox('isOrganisateur', null, false) !!} <label>Je suis un
                                organisateur d'évènement</label>
                            @if ($errors->has('email'))
                                <span class="red">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-offset-3 ">
                                    <input name="register-submit" id="register-submit" tabindex="4"
                                           class="form-control btn btn-register boutt" value="S'inscrire"
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
@endsection



