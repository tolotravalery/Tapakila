@extends("template-custom")
@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="initialize">Réinitialiser le mot de passe</h2>

                    @if (session('status'))

                    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="reinitial">
                                                <div class="row">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <div class="mim"><img src="{{ url('/') }}/public/img/logo.png" title="leguichet"></div>
                                            
                                            
                                            <h2 ><b>Bonjour,</b></h2>
                                            <p> Nous vous envérons un lien de réinitialisation de mot de passe par <strong>e-mail.</strong><br/></p>
                                         
                                            <div class="alert">
                                            <p> Retour à l'<a href="{{url('/')}}" class="information"><b><u>Acceuil</u></b></a></p>
                                                <p>Vous avez des question? consultez notre <a href="{{url('/')}}tapakila/faq">FAQ</a> dès maintenant</p>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         




                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info information">
                                    Nous vous envérons un lien de réinitialisation de mot de passe par
                                    <strong>e-mail.</strong><br/>
                                    Retour à l'<a href="{{url('/')}}" class="information"><b><u>Acceuil</u></b></a>
                                </div>
                            </div>
                        </div> -->
                    @else
                        <form class="form-horizontal" role="form" method="POST" id="bg-custom"
                              action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="email"><strong>Votre addresse email :</strong></label>
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
                                               class="form-control btn-annuler" value="Annuler" onclick="goToLogin()">
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                </div>
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