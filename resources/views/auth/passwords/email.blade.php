@extends("template")
@section('content')
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="initialize">Réinitialiser le mot de passe</h2>
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
                            @if (session('status'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info information">
                                            Nous vous envérons un lien de réinitialisation de mot de passe par
                                            <strong>e-mail.</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="submit" name="send-submit" id="send-submit" tabindex="4"
                                           class="form-control btn-send" value="Envoyer">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
