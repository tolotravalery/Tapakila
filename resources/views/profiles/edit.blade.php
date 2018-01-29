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
                        <strong>{{ Auth::user()->name }}</strong><br/><br/>
                    </div>
                    <div class="col-md-9">
                        @if (session('message'))
                            <div class="alert alert1 alert-success">
                                <span class="glyphicon glyphicon-ok"></span>
                                <strong>{!! session('message') !!}</strong>
                            </div>
                        @endif
                        {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'class'=>'form-group')) !!}
                        {!! csrf_field() !!}
                        <label for="usr">Nom :</label>
                        {!! Form::text('name', old('name'), array('id' => 'disabledInput', 'class' => 'form-control form-text', 'placeholder' => 'Name')) !!}
                        <label for="usr">Prénom :</label>
                        {!! Form::text('first_name', old('first_name'), array('id' => 'disabledInput', 'class' => 'form-control form-text', 'placeholder' => 'First name')) !!}
                        <label for="usr">Adresse e-mail :</label>
                        {!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control form-text', 'placeholder' => 'user\'s mail')) !!}
                        <label for="usr">Mot de passe :</label>
                        {!! Form::password('password', array('id' => 'password', 'class' => 'form-control form-text-1', 'placeholder' => '***********', 'autocomplete' => 'new-password')) !!}
                        @if ($errors->has('password'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                        @endif
                        {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control form-text-1', 'placeholder' => '***********')) !!}
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                        @endif

                        <input type="hidden" name="changer" value="Vos infomations ont été mises à jour avec succès!">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="check">
                                    <div class="checkbox">
                                        <label>
                                            {!!  Form::checkbox('isOrganisateur', old('isOrganisateur')) !!} Je suis un
                                            Organisateur
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                @if($user->has('newsletter')->get()->count() == 0)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="checked"> <i>S'abonner à notre NewsLetter</i>
                                        </label>
                                    </div>
                                @else
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="checked" checked> <i>S'abonner à notre
                                                NewsLetter</i>
                                        </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6  text-right-md  text-right-lg text-center-xs text-center-sm  ">
                            <div class="col-md-6 col-xs-12" style="margin-top: 20px;">
                                <a href="{{url('/home')}}" class="a_color">Annuler</a>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                {{--<button id="modif_info" type="submit" class="btn bt_modif">Modifier</button>--}}
                                {!! Form::button('Modifier',
                                        array(
                                            'class' 			=> 'btn bt_modif',
                                            'id' 				=> 'delete_account_trigger',
                                            'type' 				=> 'button',
                                            'data-toggle' 		=> 'modal',
                                            'data-submit'       => 'Modifier',
                                            'data-target' 		=> '#confirmForm',
                                            'data-modalClass' 	=> 'modal-danger',
                                            'data-title' 		=> trans('profile.deleteAccountConfirmTitle'),
                                            'data-message' 		=> trans('profile.deleteAccountConfirmMsg')
                                        )
                                ) !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="confirmForm" role="dialog" aria-labelledby="confirmFormLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">
                                        Modifier mon compte
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Confirmer la modification de vos informations ?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i> Annuler', array('class' => 'btn pull-left iko', 'type' => 'button', 'data-dismiss' => 'modal' )) !!}
                                    {!! Form::button('<i class="fa fa-fw fa-check" aria-hidden="true"></i> Confirmer', array('class' => 'btn btn-default pull-right', 'type' => 'submit', 'id' => 'confirm' )) !!}
                                </div>
                            </div>
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
        $('#modif_info').click(function () {
            var changer = "oui";
            $.ajax({
                type: "GET",
                url: '{{ url("/home") }}',
                data: {
                    'changer': changer,
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });
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