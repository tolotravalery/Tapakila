@extends("template-custom")
@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                @if (session('status'))
                    <div class="col-md-12">
                        <h2 class="initialize" style="text-align: center;">Réinitialiser le mot de passe</h2>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div id="reinitial">
                                    <div class="alert alert-info information">
                                        Nous vous envérons un lien de réinitialisation de mot de passe par
                                        <strong>e-mail.</strong><br/>
                                        Retour à l'<a href="{{url('/')}}" class="information"><b><u>Acceuil</u></b></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <h2 class="initialize"  style="text-align: center;">Réinitialiser le mot de passe</h2>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <form class="form-horizontal" role="form" method="POST" id="bg-custom"
                                      action="{{ route('password.email') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="email"><strong>Votre adresse email :</strong></label>
                                        <input id="email" type="email" class="form-control e-mailR" name="email"
                                               value="{{ old('email') }}" placeholder="Adresse e-mail" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="submit" name="send-submit" id="send-submit" tabindex="4"
                                                       class="form-control btn-send" value="Envoyer">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="button" name="annuler" id="annuler" tabindex="5"
                                                       class="form-control btn-annuler" value="Annuler"
                                                       onclick="goToLogin()">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-md-3"></div>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
@section('specificScript')
    <script type="text/javascript">
        function goToLogin() {
            document.location = '{{url('/login')}}';
        }
    </script>
@endsection