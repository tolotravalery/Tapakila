@extends("template")
@section('content')
    <section>
        <div class="container custom-container">
            <div class="compte-bg">
                <h2 class="Modifcompte">Modification de compte</h2>
                <div class="row row-custom">
                    <div class="col-md-3 text-center-md usercompte">
                        <img src="{{ url('/') }}/public/img/user.png" id="sary">
                        <br>
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>
                    @role('user')
                    <p>Vous devriez changer votre profile en organisateur d'évèmenet si vous voulez ajouter un
                        évènement.</p>
                    @endrole
                    <div class="col-md-9">
                        {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'class'=>'form-group')) !!}
                        {!! csrf_field() !!}
                        <label for="usr">Nom :</label>
                        {!! Form::text('name', old('name'), array('id' => 'disabledInput', 'class' => 'form-control form-text', 'placeholder' => trans('forms.ph-username'))) !!}
                        <label for="usr">Prénom :</label>
                        {!! Form::text('first_name', old('first_name'), array('id' => 'disabledInput', 'class' => 'form-control form-text', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                        <label for="usr">Adresse e-mail :</label>
                        {!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control form-text', 'placeholder' => trans('forms.ph-useremail'))) !!}
                        <label for="usr">Mots de passe :</label>
                        {!! Form::password('password', array('id' => 'password', 'class' => 'form-control form-text-1', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                        @endif
                        {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control form-text-1', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                        @endif


                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="check">
                                    <div class="checkbox">
                                        <label>
                                            {!!  Form::checkbox('isOrganisateur', old('isOrganisateur')) !!} Je suis un Organisateur
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6  text-right-md  text-right-lg text-center-xs text-center-sm  ">
                                <button type="submit" class="btn bt_modif">Modifier</button>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection


@section(('specificScript'))
    <script type="text/javascript">

        $("#password, #password_confirmation").keyup(function () {
            enableSubmitPWCheck();
        });

        $('#user_basics_form').on('keyup change', 'input, select, textarea', function () {
            //$('#account_save_trigger').attr('disabled', false);
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            //var taille = ;
            if (password != confirmPassword) {
                console.log('disabled', true);
                $('#account_save_trigger').attr('disabled', true);
            }
            else if (password == confirmPassword) {
                console.log('disabled', false);
                $('#account_save_trigger').attr('disabled', false);
            }
        });

        $("#password_confirmation").keyup(function () {
            checkPasswordMatch();
        });

        function checkPasswordMatch() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            if (password != confirmPassword) {
                $("#pw_status").html("Les mots de passe ne correspondent pas!");
            }
            else {
                $("#pw_status").html("Les mots de passe correspondent!");
            }
        }

        function enableSubmitPWCheck() {
            var password = $("#password").val();
            var confirmPassword = $("#password_confirmation").val();
            //var submitChange = $('#pw_save_trigger');
            var submitChange = $('#account_save_trigger');
            if (password != confirmPassword) {
                submitChange.attr('disabled', true);
            }
            else if (password == confirmPassword) {
                submitChange.attr('disabled', false);
            }
        }
        $('#account_save_trigger').click(function () {
            $('#user_basics_form').submit();
        })

        function changePage(id, aId) {
            document.getElementById("div_compte").className = "hide";
            document.getElementById("div_commandes").className = "hide";
            document.getElementById("div_ev").className = "hide";
            document.getElementById("div_favoris").className = "hide";
            document.getElementById("div_news").className = "hide";
            document.getElementById(id).className = "show";

            document.getElementById("a_compte").className = "";
            document.getElementById("a_commandes").className = "";
            document.getElementById("a_ev").className = "";
            document.getElementById("a_favoris").className = "";
            document.getElementById("a_news").className = "";
            document.getElementById(aId).className = "activeee";
        }

    </script>
@endsection