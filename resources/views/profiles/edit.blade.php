@extends("template")
@section('content')
    <section id="content" class="debut">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 gauche">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="{{ url('/') }}/img/user.png" id="sary">
                            <strong>{{ Auth::user()->name }}</strong>
                        </div>
                    </div>
                    <div class="s_menu">
                        <div id="a_compte" class="activeee" onClick="changePage('div_compte', 'a_compte')"> Mon compte
                        </div>
                        <div id="a_commandes" onClick="changePage('div_commandes', 'a_commandes')"> Mes commandes</div>
                        <div id="a_ev" onClick="changePage('div_ev', 'a_ev')"> Evènements passés</div>
                        <div id="a_favoris" onClick="changePage('div_favoris', 'a_favoris')"> Mes Favoris</div>
                        <div id="a_news" onClick="changePage('div_news', 'a_news')"> Newsletter</div>
                    </div>
                </div>
                <div class="col-sm-10 droite">
                    <div id="div_compte">
                        <h1 id="compte">Mon compte</h1>
                        @role('user')
                        <p>Vous devriez changer votre profile en organisateur d'évèmenet si vous voulez ajouter un
                            évènement.</p>
                        @endrole
                        {!! Form::model($user, array('action' => array('ProfilesController@updateUserAccount', $user->id), 'method' => 'PUT', 'id' => 'user_basics_form')) !!}
                        {!! csrf_field() !!}
                        <div class="form-group contre">
                            {!! Form::label('name', 'Nom') !!}
                            {!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control forme', 'placeholder' => trans('forms.ph-username'))) !!}
                            {!! Form::label('first_name', 'Prénom')!!}
                            {!! Form::text('first_name', old('first_name'), array('id' => 'first_name', 'class' => 'form-control forme', 'placeholder' => trans('forms.create_user_ph_firstname'))) !!}
                            {!! Form::label('email', 'E-mail') !!}
                            {!! Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control forme', 'placeholder' => trans('forms.ph-useremail'))) !!}
                            {{--{!! Form::label('isOrganisateur', 'Nom') !!}--}}
                            {{--{!! Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control forme', 'placeholder' => trans('forms.ph-username'))) !!}--}}
                            {!!  Form::checkbox('isOrganisateur', old('isOrganisateur')) !!} {!! Form::label('isOrganisateur', 'Je suis un organisateur d\'évènement') !!}
                            <br><br>
                            <label for="usr">Changer mot de passe</label>
                            {!! Form::password('password', array('id' => 'password', 'class' => 'form-control forme ', 'placeholder' => trans('forms.create_user_ph_password'), 'autocomplete' => 'new-password')) !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            {!! Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control forme', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))) !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                            <div id="pw_status" style="color: red;"></div>
                        </div>
                        <div class="contre5">
                            {!! Form::button(
                            'Enregister',
                                     array(
                                        'class' 		 	=> 'btn btn-danger btio2',
                                        'id' 				=> 'account_save_trigger',
                                        'disabled'			=> true
                                )) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div id="div_commandes" class="hide">
                        <h1 id="compte">Mes commandes</h1>
                        <div class="contre">
                            <div class="table-responsive tableau_detail">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Lieu</th>
                                        <th>Avatar</th>
                                        <th>Type de billet</th>
                                        <th>Nombre</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->tickets as $ticket)
                                        @if(\Carbon\Carbon::parse($ticket->events->date_debut_envent)->isFuture() )
                                            <tr>
                                                <td>{{$ticket->events->title}}</td>
                                                <td>{{ \Carbon\Carbon::parse($ticket->pivot->date_achat)->format('d M Y')}}</td>
                                                <td>{{ \Carbon\Carbon::parse($ticket->pivot->date_achat)->format('H:i')}}</td>
                                                <td>{{$ticket->events->localisation_nom}} {{$ticket->events->localisation_adresse}}</td>
                                                <td><img src="{{ url('img/'.$ticket->events->image) }}"
                                                         class="detail_picture1"></td>
                                                <td>{{$ticket->type}}</td>
                                                <td>{{$ticket->pivot->number}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="div_ev" class="hide">
                        <h1 id="compte">Mes Evènements passés</h1>
                        <div class="contre5">
                            <div class="contre">
                                <div class="table-responsive tableau_detail">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Lieu</th>
                                            <th>Avatar</th>
                                            <th>Type de billet</th>
                                            <th>Nombre</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->tickets as $ticket)
                                            @if(\Carbon\Carbon::parse($ticket->events->date_debut_envent)->isPast() )
                                                <tr>
                                                    <td>{{$ticket->events->title}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($ticket->pivot->date_achat)->format('d M Y')}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($ticket->pivot->date_achat)->format('H:i')}}</td>
                                                    <td>{{$ticket->events->localisation_nom}} {{$ticket->events->localisation_adresse}}</td>
                                                    <td><img src="{{ url('img/'.$ticket->events->image) }}"
                                                             class="detail_picture1"></td>
                                                    <td>{{$ticket->type}}</td>
                                                    <td>{{$ticket->pivot->number}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="div_favoris" class="hide">
                        <h1 id="compte">Mes Favoris</h1>
                        <p class="contre5">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                            tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation
                            ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit
                            in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    </div>
                    <div id="div_news" class="hide">
                        <h1 id="compte">Newsletter</h1>
                        <p class="contre5">
                            "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto
                            beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur
                            aut
                            odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                            nesciunt.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/content goes here -->
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