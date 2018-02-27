{{--@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection--}}
@extends("template")
@section('title')
    <title>{{$event->title}}</title>
@endsection
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">accueil</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories <label class="test">&darr;</label></strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container custom-container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li>
                        <a href="{{url('/event/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst(strtolower($sousmenu->name))}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <section id="detail">
        <div class="container custom-container">
            <div class="page-menu row">
                <div class="col-lg-9 col-sm-9 col-lg-push-3 col-sm-push-3 fi">
                    <h1>Modifier votre événement </h1>

                    @if (session('message'))
                        <div class="alert alert1 alert-success">
                            <span class="glyphicon glyphicon-ok"></span>
                            <strong>{!! session('message') !!} </strong>
                            <hr class="message-inner-separator">
                            @if($event->tickets->count()==0)
                                @if(session('page') == 'details')
                                    <p>A présent, vous devez ajouter les Types de Ticket dans l'onglet "Types de
                                        Ticket
                                        &
                                        prix"</p>
                                @endif
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-pull-9 col-sm-pull-9 sec">
                    <div class="btn-group margin-bottom-5">
                        <div class="btn-group" role="group">
                            <div class="form-group full">
                                <label for="sel1"></label>
                                <select class="btn btn-sm nonpublier dropdown-toggle" id="publie" name="publie">
                                    @if($event->publie_organisateur == true)
                                        <option value="false">Non publié</option>
                                        <option value="true" selected="selected">Publié</option>
                                    @else
                                        <option value="false" selected="selected">Non publié</option>
                                        <option value="true">Publié</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-default btn-aperçu " href="#" target="_blank">Aperçu</a>
                    <p><i style="color:red;">La modification d'une publication de l'événement est accordé par
                            l'administrateur</i></p>
                </div>
                <div class="row">
                    <div class="col-lg-11 col-sm-10"></div>
                    <div class="col-lg-1 col-sm-2" style="text-align: center;">
                        <a href="{{url('/home')}}"
                           style="text-align: center;color: #428bca !important;font-size: 16px;">Retour</a>
                    </div>
                </div>

            </div>

            <!-- detail end -->
            <div class="row">
                <div class="col-lg-3 col-sm-3 creat">

                    <ul class="navtab">
                        <li class="categorimenu"><strong>Achats</strong></li>
                        <li><a id="a_rapport" @if(session('page')) @if(session('page') == 'rapport') class="select"
                               @endif @else  @endif onClick="changePage('div_rapport', 'a_rapport')">Rapports</a>
                        </li>
                        {{-- <li><a id="a_commandes" onClick="changePage('div_commandes', 'a_commandes')">Commandes</a></li>--}}
                        {{-- <li><a id="a_valideTicket" onClick="changePage('div_valideTicket', 'a_valideTicket')">Tickets Validés</a></li>--}}
                        <li class="categorimenu"><strong>Modifier</strong></li>
                        <li><a id="a_details" @if(session('page')) @if(session('page') == 'details') class="select"
                               @endif @else class="select" @endif
                               onClick="changePage('div_details', 'a_details')">Détails</a></li>
                        <li><a id="a_type" @if(session('page')) @if(session('page')=='tickets') class="select"
                               @endif @endif onClick="changePage('div_type', 'a_type')">Types de Ticket &amp;
                                prix</a>
                        </li>
                        <li class="hidden"><a id="a_siteweb" onClick="changePage('div_siteweb', 'a_siteweb')">Apparence
                                du site</a>
                        </li>
                        <li class="hidden"><a id="a_pdf" onClick="changePage('div_pdf', 'a_pdf')">PDF</a></li>
                        <li class="hidden"><a id="a_cpersonalize"
                                              onClick="changePage('div_cpersonalize', 'a_cpersonalize')">Champs
                                additioneles</a></li>
                        <li class="categorimenu hidden"><strong>Paramètre</strong></li>
                        <li class="hidden"><a id="a_paiement" onClick="changePage('div_paiement', 'a_paiement')">Méthodes
                                de
                                payement</a></li>
                    </ul>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <div id="div_details"
                         @if(session('page')) @if(session('page')=='tickets') class="hide"
                         @elseif(session('page')=='rapport') class="hide" @endif @endif>
                        <div class="com_contenu_type">
                            {!! Form::model($event, array('action' => array('EventController@update'), 'method' => 'PUT', 'id' => 'user_basics_form','files' => true,'class'=>'form-horizontal')) !!}
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{Crypt::encryptString(($event->id))}}">
                            <div class="panel panel-content">
                                <div class="panel-body border-bottom">
                                    <?php
                                    if(isset($niova)){?>
                                    <div class="container">
                                        <div style="margin-left: 36px;">
                                            <div class="alert alert-success col-md-7" style="text-align: left;">
                                                <p style="margin-left: 5px;"><?php echo $niova; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <?php
                                    }
                                    ?>
                                    <h2>Détails</h2>
                                    <?php
                                    $publie_org = $event->publie_organisateur;
                                    if ($publie_org == 0) {
                                        $p = "false";
                                    } else {
                                        $p = "true";
                                    }
                                    ?>
                                    <input type="hidden" id="huhu" name="publie" value="{{$p}}">
                                    <div class="clearfix"></div>

                                    <div class="form-group ">
                                        <label class="control-label ">
                                            <span>Titre :</span> <span class="champ_required"> *</span>
                                        </label>
                                        <input type="text" name="title" id="titre" class="form-control"
                                               value="{{$event->title}}" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-5 col-xs-12">
                                                <img src="{{url('/public/img/'.$event->image)}}"
                                                     style="height: 175px;width: 225px;"/>
                                            </div>
                                            <div class="col-md-7 col-xs-12">
                                                <label class="control-label">
                                                    <span>Image : </span>
                                                </label>
                                                <div class="input-group image-preview">
                                                    <input type="text" class="form-control image-preview-filename"
                                                           disabled="disabled">
                                                    <span class="input-group-btn">
													<button type="button" class="btn btn-default image-preview-clear"
                                                            style="display:none;">
														<span class="glyphicon glyphicon-remove"></span> Supprimer
													</button>
													<div class="btn btn-default image-preview-input">
														<span class="glyphicon glyphicon-folder-open definitive"></span>
														<span class="image-preview-input-title"></span>
														<input type="file" accept="image/png, image/jpeg, image/gif"
                                                               name="image"/>
													</div>
												</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">
                                            <span>Catégories : </span> <span class="champ_required"> *</span>
                                        </label>
                                        <div class="form-group"
                                             style="margin-left: 0px!important;margin-right: 0px!important;">
                                            <select class="form-control" name="sousmenu">
                                                <option value="{{$event->sous_menus->id}}">{{$event->sous_menus->name}}</option>
                                                @foreach($sousmenus as $sousmenu)
                                                    <option value="{{$sousmenu->id}}">{{$sousmenu->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-translation et">
                                        <label class="control-label">
                                            <span>Description : </span><span class="champ_required"> *</span>
                                        </label>
                                        <textarea class="form-control" style=" word-wrap: break-word; resize: horizontal;
                                        height: 150px;" name="note">{{$event->additional_note}}</textarea>
                                    </div>
                                </div>
                                <div class="panel-body border-bottom">
                                    <h2>Heures</h2>
                                    <div class="row" id="event-duration">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label required">Début de
                                                            l'événement</label><span
                                                                class="champ_required"> *</span>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i></div>
                                                            <input class="form-control" id="dated" name="date_debut"
                                                                   value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d')}}"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-time"></span>
															</span>
                                                        <input type="text" class="form-control"
                                                               value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('H:i:s')}}"
                                                               name="heure_debut" id="heured">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label required">Fin de
                                                            l'événement</label><span
                                                                class="champ_required"> *</span>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i></div>
                                                            <input class="form-control" id="datef" name="date_fin"
                                                                   value="{{ \Carbon\Carbon::parse($event->date_fin_event)->format('Y-m-d')}}"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="input-group clockpicker">
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-time"></span>
															</span>
                                                        <input type="text" class="form-control"
                                                               value="{{ \Carbon\Carbon::parse($event->date_fin_event)->format('H:i:s')}}"
                                                               name="heure_fin" id="heuref">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group form-group-translation et" id="message_comp">
                                        <p style="color:red;" id="message_after_comparaison">La date fin
                                            de l' événement doit être supérieure à la date début</p>
                                        <p style="color:red;" id="message_after_comparaison_date_now">La
                                            date début ou fin de l' événement doit être supérieure à la
                                            date actuelle</p>

                                    </div>
                                    <div class="form-group form-group-translation et">
                                        <label class="control-label">
                                            <span>Notes additionnelle sur l'heure</span>
                                        </label>
                                        <textarea class="form-control" style=" word-wrap: break-word; resize: horizontal;
                                        height: 54px;" name="note_time">{{$event->additional_note_time}}</textarea>

                                    </div>
                                </div>


                                <!-- heure end-->
                                <hr class="separe">
                                <!-- location start -->
                                <div class="panel-body border-bottom">
                                    <h2>Localisation :</h2>
                                    <form>
                                        <div class="form-group">
                                            <label for="email">Nom :</label><span class="champ_required"> *</span>
                                            <input type="Adresse" class="form-control" id="email"
                                                   name="localisation_nom" value="{{$event->localisation_nom}}"
                                                   required>
                                            <p>E.X : Antananarivo</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="adresses">Adresse :</label>
                                            <input type="Adresse" class="form-control" id="adress"
                                                   name="localisation_adresse"
                                                   value="{{$event->localisation_adresse}}">
                                            <em>Entrer l'adresse exact pour l'affichage des directions sur la
                                                carte</em>
                                            <p>E.X : Palais des sports</p>
                                        </div>

                                    </form>
                                </div>

                                <!-- location end -->
                                <hr class="separe">
                                <!-- organisateur start -->
                                <div class="panel-body">
                                    <h2>Organisateur</h2>

                                    <div class="form-group">
                                        {{ Auth::user()->name }}
                                        <a class="btn btn-default editer" target="_blank"
                                           href="{{url('/')}}/profile/{{ Auth::user()->id }}/edit">Editer</a>
                                    </div>
                                </div>
                                <!-- organisateur end -->
                                <p style="text-align: right;margin: 15px;"><span style="color:#FF0000;">*</span><i>
                                        Champs olbligatoires</i></p>
                                <div class="Confirme">
                                    <button id="enregister" type="submit" class="btn btn-default enregistrer ">
                                        Enregistrer
                                    </button>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                    <!------------------------------------Commandes--------------------------------------------------------------------------->

                {{--<div id="div_commandes" class="hide">
                    <div id="commande">
                        <div class="com_contenu">
                            <h2>Commandes</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="num">ID</th>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Totale</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" id="usr"></td>
                                        <td><input type="text" class="form-control" id="usr"></td>
                                        <td><input type="text" class="form-control" id="usr"></td>
                                        <td><select class="form-control">
                                                <option>Terminé</option>
                                                <option>En attendant</option>
                                                <option>Expiré</option>
                                                <option>Annulé</option>
                                                <option>Remboursé</option>
                                            </select></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>--}}

                <!------------------------------------Commande-end--------------------------------------------------------------------------->

                    <!-------------------------------------rapport------------------------------------------------------------------------->

                    <div id="div_rapport" @if(session('page')) @if(session('page')=='rapport') class="show"
                         @elseif(session('page') == 'tickets') class="hide" @endif @else class="hide" @endif >
                        <div id="rapport" style="padding-top:30px;">
                            <div class="com_contenu_type">
                                <div class="table-responsive users-table">
                                    <div class="box">
                                        <div class="box-header with-border">
                                            <h2 class="box-title">Rapports</h2>
                                        </div>
                                        <div class="box-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th style="width: 16%">Type de ticket</th>
                                                    <th style="width: 16%">Prix</th>
                                                    <th style="width: 16%">Nombres</th>
                                                    <th style="width: 17%">Ticket vendu</th>
                                                    <th style="width: 17%">Ticket scanné</th>
                                                    <th style="width: 16%">Montant reçu</th>
                                                </tr>
                                                @php $id=0; @endphp
                                                @foreach($event->tickets as $ticket)
                                                    @if($ticket->id != $id)
                                                        @php
                                                            $id = $ticket->id;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$ticket->type}}</td>
                                                            <td>{{$ticket->price}} Ariary</td>
                                                            <td>{{count($ticket->tapakila)}}</td>
                                                            <td>{{count($ticket->tapakila()->where('vendu','=',1)->get())}}</td>
                                                            <td>{{count($ticket->tapakila()->where('scanne','=',1)->get())}}</td>
                                                            <td>{{count($ticket->tapakila()->where('vendu','=',1)->get()) * $ticket->price}} Ariary</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </div>
                                        <div class="box-header with-border" style="padding-top: 20px;">
                                            <h3 class="box-title">Total</h3>
                                        </div>
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>Revenu</th>
                                                    <th>Nombres</th>
                                                    <th>Ticket vendu </th>
                                                    <th>Montant</th>
                                                    <th>Frais</th>
                                                    <th>Transfert</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$revenu}}%</td>
                                                    <td>{{$ticket_genere}}</td>
                                                    @php($ticket_vendu = 0)
                                                    @foreach($data_achat as $data)
                                                        @php($ticket_vendu += $data['nombreVendu'])
                                                    @endforeach
                                                    <td>{{$ticket_vendu}}</td>
                                                    @php($montant=0)
                                                    @foreach($event->tickets as $t)
                                                        @php($montant += count($t->tapakila()->where('vendu','=',1)->get()) * $t->price)
                                                    @endforeach
                                                    <td>{{$montant}} Ariary</td>
                                                    <td>{{$pourcentage}} %</td>
                                                    <?php
                                                    $frais=($pourcentage*$montant)/100;
                                                    $transfert=$montant-$frais;
                                                    ?>
                                                    <td>{{$transfert}} Ariary</td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="box">
                                        <div class="box-header with-border" style="padding-top: 20px;">
                                            <h3 class="box-title">Paiement</h3>
                                        </div>
                                        <div class="box-body table-responsive no-padding">
                                            @if(count($event->payevents) > 0)
                                                <input type="checkbox" checked data-toggle="toggle"> Payer le {{ $event->payevents()->first()->date_payment }} 
                                                (Transaction numéro : {{$event->payevents()->first()->reference_transaction}})
                                            @else
                                                En attente <br/>
                                                contacter l'administrateur : <a href="mailto:contact@leguichet.mg" class="foot">contact@leguichet.mg</a>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<table class="table table-striped table-condensed data-table">
                                        <thead>
                                        <tr>
                                            <th>Type de ticket</th>
                                            <th>Nombre</th>
                                            <th>Billet vendu</th>
                                            <th>Billet scanné</th>
                                            <th>Montant reçu</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $id=0; @endphp
                                        @foreach($event->tickets as $ticket)
                                            @if($ticket->id != $id)
                                                @php
                                                    $id = $ticket->id;
                                                @endphp
                                                <tr>
                                                    <td>{{$ticket->type}}</td>
                                                    <td>{{count($ticket->tapakila)}}</td>
                                                    <td>{{count($ticket->tapakila()->where('vendu','=',1)->get())}}</td>
                                                    <td>{{count($ticket->tapakila()->where('scanne','=',1)->get())}}</td>
                                                    <td>{{count($ticket->tapakila()->where('vendu','=',1)->get()) * $ticket->price}} Ariary</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Revenu total:
                                        </div>
                                        <div class="col-md-6">
                                            {{$revenu}}%
                                        </div>
                                        <div class="col-md-6">
                                            Nombre total des tickets généré:
                                        </div>
                                        <div class="col-md-6">
                                            {{$ticket_genere}}
                                        </div>
                                        @php($ticket_vendu = 0)
                                        @foreach($data_achat as $data)
                                            @php($ticket_vendu += $data['nombreVendu'])
                                        @endforeach
                                        <div class="col-md-6">
                                            Nombre total des tickets vendu :
                                        </div>
                                        <div class="col-md-6">
                                            {{$ticket_vendu}}
                                        </div>
                                        <div class="col-md-6">
                                            Montant total :
                                        </div>
                                        <div class="col-md-6">
                                            @php($montant=0)
                                            @foreach($event->tickets as $t)
                                                @php($montant += count($t->tapakila()->where('vendu','=',1)->get()) * $t->price)
                                            @endforeach
                                            {{$montant}} Ariary
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------------Rapport-end--------------------------------------------------------------------------->

                    <!------------------------------------type-ticket-------------------------------------------------------------------------->

                    <div id="div_type"
                         @if(session('page')) @if(session('page') == 'details')  class="hide"
                         @elseif(session('page') == 'rapport') class="hide" @endif @else class="hide" @endif>
                        <div id="type_ticket">
                            <div class="com_contenu_type">
                                <div class="panel panel-content">
                                    <div class="panel-body border-bottom">
                                        <h2>Type des tickets</h2>
                                        @if(isset($event))
                                            @php $id=0;
                                            $i=0;
                                            @endphp
                                            @foreach($event->tickets as $ticket)
                                                @if($ticket->id != $id)
                                                    @php
                                                        $id = $ticket->id;
                                                    @endphp
                                                    <div class="ticket_type_contenu">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <h2>{{$ticket->type}}</h2>
                                                            </div>
                                                            <div class="col-lg-2">
                                                                <h2>{{$ticket->price}}</h2>
                                                                <p>AR</p>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <h2>
                                                                    <div class="btn-group pull-right">
                                                                        {!! Form::button('<i class="fa fa-fw fa-eye" aria-hidden="true"></i> Aperçu ',
                                                                                array(
                                                                                    'class' 			=> 'btn btn-default',
                                                                                    'id' 				=> 'preview_ticket_trigger',
                                                                                    'type' 				=> 'button',
                                                                                    'data-toggle' 		=> 'modal',
                                                                                    'data-target' 		=> '#previewTicket'.$i,
                                                                                    'style'             =>  'margin: 5px !important;'
                                                                                )
                                                                        ) !!}<br>
                                                                        {!! Form::button('<i class="fa fa-fw fa-trash" aria-hidden="true"></i> Supprimer',
                                                                                array(
                                                                                    'class' 			=> 'btn-deleted',
                                                                                    'id' 				=> 'delete_ticket_trigger',
                                                                                    'type' 				=> 'button',
                                                                                    'data-toggle' 		=> 'modal',
                                                                                    'data-target' 		=> '#confirmDelete'.$i,
                                                                                )
                                                                        ) !!}
                                                                    </div>
                                                                </h2>
                                                                <div class="modal fade modal-danger"
                                                                     id="confirmDelete{{$i}}"
                                                                     role="dialog"
                                                                     aria-labelledby="confirmDeleteLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Confirmer la
                                                                                    suppression</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Voulez vous vraiment supprimer ce
                                                                                    ticket?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                {!! Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i>Annuler', array('class' => 'btn  pull-left btn-flat btn-annulation iko', 'type' => 'button', 'data-dismiss' => 'modal' )) !!}
                                                                                <a id="confirm"
                                                                                   class="btn btn-supr  pull-right btn-flat"
                                                                                   href="{{ url("organisateur/event/ticket/delete/".$ticket->id."/".$event->id) }}">
                                                                                        <span class="fa fa-fw fa-trash-o"
                                                                                              aria-hidden="true"></span>Supprimer</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="modal fade modal-default"
                                                                     id="previewTicket{{$i}}"
                                                                     role="dialog"
                                                                     aria-labelledby="previewTicketLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Aperçu de votre
                                                                                    ticket</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" >
                                                                                    <tr>
                                                                                        <td style="background-color: #d70506;padding: 6px -6px 6px 6px;">
                                                                                            <img src="{{ url('/public/img/logo.png') }}" style="padding-left: -5px;">
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <table width="100%" style="margin-top:-10px;margin-left:18px; ">
                                                                                    <tr>
                                                                                        <td>
                                                                                            <h3 style="font-size: 20px; font-family:sans-serif;color:#333;"><b>{{str_limit(strtoupper($event->title),$limit=15,$end=' ...')}}</b></h3>
                                                                                            <p style="font-family:sans-serif;font-size: 18px;color: #d70506;padding-top: -20px;margin: 0 0 10px;">{{$event->localisation_nom }} {{$event->localisation_adresse}}</p>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:15px;margin-left:21px;">
                                                                                    <tr>
                                                                                        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300; width:33,3%">PRIX</p></th>
                                                                                        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300; width:33,3%">DATE</p></th>
                                                                                        <th><p style="font-size: 12px;font-family:sans-serif;color:#333;font-weight: 300;width:33,3%">HEURE</p></th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width:33,3%"><h4><strong>{{$ticket->price}} Ar</strong></h4></th>
                                                                                        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width:33,3%"><h4><strong>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d/M/Y')}}</strong></h4></th>
                                                                                        <th style="padding-top:-42px;font-family:sans-serif;color:#333;width:33,3%"><h4><strong>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}</strong></h4></th>
                                                                                    </tr>
                                                                                </table>
                                                                                {{--<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="margin-top:-40px;margin-left:15px;">
                                                                                    <tr>
                                                                                        <th><h4><strong>3 000 AR</strong></h4></th>
                                                                                        <th><h4><strong>12-28-20</strong></h4></th>
                                                                                        <th><h4><strong>20:20</strong></h4></th>
                                                                                    </tr>
                                                                                </table>--}}
                                                                                <table width="100%" cellpadding="0" cellspacing="0"style="margin-top:20px">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <img src="{{url('/public/qr_code/'.$ticket->tapakila()->first()->qr_code)}}" width="200px" height="200px">
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                                <br/>
                                                                                <table width="100%" cellpadding="0" cellspacing="0"style="margin-top:20px">
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <img src="{{url('/public/img/'.$event->image)}}" width="100%" height="100px">
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <div  style="height:50px;color: white;text-align: center;background-color: #d70506;font-size: 16px;">
                                                                                                <p style="padding-top: 10px;"><strong>www.leguichet.mg</strong></p>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>

                                                                                </table>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <p>Nombre de billets: {{$ticket->tapakila()->count()}}</p>
                                                    </div>
                                                    @php
                                                        $i+=1;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                        <a class="btn btn-primary btn-outline text-center center-block primary"
                                           role="button"
                                           onClick="changePage('div_ticket','a_type')">
                                            <i aria-hidden="true"></i> <span class="glyphicon glyphicon-plus"
                                                                             aria-hidden="true"></span> Ajouter
                                            le type de ticket
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------------type-ticket-end--------------------------------------------------------------------------->

                    <!------------------------------------Ticket validé--------------------------------------------------------------------------->

                {{--<div id="div_valideTicket" class="hide">
                    <div id="billet">
                        <div class="com_contenu">
                            <div class="panel panel-content">
                                <div class="panel-body border-bottom">
                                    <h2>Validation des billets</h2>
                                    <p>
                                        Pour valider les tickets, vous aurez besoin d'un appareil mobile ou d'un
                                        ordinateur
                                        et d'une connexion Internet.

                                        Vous pouvez utiliser cet <a href="#" target="_blank">Exemple de ticket</a>
                                        pour
                                        vérifier si la validation fonctionne correctement.</p><br>
                                    <h3>Appareils mobiles</h3>
                                    <hr class="separe">
                                    <p>Téléchargez notre application gratuite:</p>
                                    <a href="#" target="_blank"><img src="img/download-appstore.png"></a>
                                    <a href="#" target="_blank"><img src="img/download-playstore.png"></a>
                                    <p class="a1">Ou utiliser payé <a href="#" data-toggle="collapse">Pic2Shop
                                            Pro</a>.</p>
                                    <h3 class="h14">Ordinateurs et périphériques spéciaux</h3>
                                    <hr class="separe">
                                    <p>Vous pouvez également utiliser différentes combinaisons de scanners et
                                        d'ordinateurs
                                        de codes à barres pour valider les tickets. Configurez votre scanner pour
                                        décoder
                                        les formats "Code QR" et "Code 128" et soumettre le formulaire au <a
                                                href="#">https://------ </a>Qui
                                        renvoie l'état actuel du ticket et le marque comme étant utilisé.</p>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>--}}


                <!------------------------------------Ticket validé-end------------------------------------------------------------------------->


                    <!------------------------------------Site web-------------------------------------------------------------------------->
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST"
                          action="{{ route('event_siteweb') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{Crypt::encryptString($event->id)}}">
                        <div id="div_siteweb" class="hide">
                            <div class="com_contenu_type">
                                <div class="panel panel-content">
                                    <div class="panel-body border-bottom">
                                        <h2>Apparence du site</h2>
                                        @php
                                            $titre=$event->title;
                                            $split= explode(" ",$titre);
                                            $titre=$split[0];

                                        @endphp
                                        <label class="control-label" for="slug">Adresse web</label>
                                        <div class="input-group"><span class="input-group-addon">{{ url('/') }}
                                                /events/</span>
                                            <input
                                                    type="text" name="slug"
                                                    value=<?php if (strcmp($event->siteweb, "") == 0) {
                                                        echo $titre;
                                                    } else echo $event->siteweb;
                                                    ?>
                                                            id="slug"
                                                    class="form-control"
                                                    data-fv-field="slug">
                                            <span class="input-group-addon">
                <a href="#" target="_blank"><i class="fa fa-external-link"></i></a></span></div>
                                        <br/>
                                        <p>L'adresse de la page de vente de billets. Vous pouvez changer cela, mais
                                            sachez que
                                            le
                                            lien précédent ne
                                            fonctionnera plus.</p>
                                        <div class="form-group form-group-translation">
                                            <label class="control-label" for="en[image_pdf_file]">
                                                <span>Image</span>
                                            </label>
                                            <div class="dropify-wrapper" onmouseover="mouseOverFunction()"
                                                 onmouseout="mouseOutFunction()">

                                                <div class="dropify-message" id="mot"><span
                                                            class="file-icon"></span>
                                                    <i class="glyphicon glyphicon-open"></i>
                                                    <p>Cliquez ou faites glisser votre fichier ici</p>
                                                </div>

                                                <input type="file" id="input" type="file" accept="image/*"
                                                       onchange="loadFile(event)" name="image">
                                                <img id="output" class="hide"/>

                                                <button id="button" type="button" class="btn btn-danger hide"
                                                        onclick="buttonClick()">Supprimer
                                                </button>


                                            </div>
                                            <input type="hidden" class="delete" name="en[image_pdf_delete]"
                                                   id="en[image_pdf_delete]">
                                            <input type="hidden" class="filename" name="en[image_pdf]"
                                                   id="en[image_pdf]"
                                                   value="">
                                            <span class="help-block">Utilisé sur l'en-tête de la page Web, également sous forme de vignette dans les listes d'événements. Utilisez un fichier JPG ou PNG avec une résolution de 1400x500px. Les fichiers plus gros sont réduits automatiquement.</span>

                                        </div>

                                    </div>
                                    <div class="com_contenu_type_foot">
                                        <button type="submit" class="btn btn-danger bout">Mettre à jour</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!------------------------------------Site web-end--------------------------------------------------------------------------->

                    <!------------------------------------PDF--------------------------------------------------------------------------->

                    <div id="div_pdf" class="hide">


                        <div class="com_contenu_type">
                            <div class="panel panel-content">
                                <div class="panel-body border-bottom">
                                    <h2>Informations sur le ticket</h2>

                                    <div class="form-group">
                                        <label>
                                            <span>Text</span>
                                        </label>
                                        <textarea class="form-control" rows="5" id="comment"></textarea>
                                    </div>
                                    <div class="form-group form-group-translation en">
                                        <label class="control-label" for="en[image_pdf_file]">
                                            <span>Image</span>
                                        </label>
                                        <div class="dropify-wrapper" onmouseover="mouse1OverFunction()"
                                             onmouseout="mouse1OutFunction()">

                                            <div class="dropify-message" id="mot1"><span class="file-icon"></span>
                                                <i class="glyphicon glyphicon-open"></i>
                                                <p>Cliquez ou faites glisser votre fichier ici</p>
                                            </div>

                                            <input type="file" id="input1" type="file" accept="image/*"
                                                   onchange="loadFile1(event)">
                                            <img id="output1" class="hide"/>

                                            <button id="button1" type="button" class="btn btn-danger hide"
                                                    onclick="button1Click()">Supprimer
                                            </button>


                                        </div>
                                        <input type="hidden" class="delete" name="en[image_pdf_delete]"
                                               id="en[image_pdf_delete]">
                                        <input type="hidden" class="filename" name="en[image_pdf]"
                                               id="en[image_pdf]"
                                               value="">
                                        <span class="help-block">L'image couvrira le ticket d'un côté à l'autre. Utilisez un fichier JPG ou PNG de 1240px. Lorsque vous choisissez la hauteur, assurez-vous que tout sur le ticket PDF correspond à une seule page. Les fichiers les plus étendus sont automatiquement réduits.</span>
                                    </div>
                                </div>
                                <hr class="separe">
                                <div class="com_contenu_type_ticket">
                                    <form>
                                        <div class="radio-custom radio-primary">
                                            <input type="radio" name="split_tickets" id="split_tickets_1" value="1"
                                                   checked="">
                                            <label for="split_tickets_1">Créer des billets distincts pour chaque
                                                participant</label>
                                            <span class="help-block">Utile lorsque les participants arrivent séparément.</span>
                                        </div>
                                        <div class="radio-custom radio-primary">
                                            <input type="radio" name="split_tickets" id="split_tickets_0" value="0">
                                            <label for="split_tickets_0">Créer un ticket composé</label>
                                            <span class="help-block">Utile lorsque les participants arrivent ensemble - de cette façon, vous gagnez du temps lors de la validation des billets.</span>
                                        </div>
                                    </form>
                                </div>
                                <div class="com_contenu_type_foot">
                                    <button type="button" class="btn btn-danger bout">Enregistrer</button>

                                </div>

                                <div class="com_contenu_type">
                                    <h2>Aperçu des tickets</h2>
                                    <p>Toutes les données du ticket sont incluses dans le corps du courrier
                                        électronique
                                        et dans
                                        le fichier .pdf
                                        joint.</p>


                                    <ul class="nav nav-tabs nav-tabs1">
                                        <li class="active ">
                                            <a href="#1a" data-toggle="tab">Email</a>
                                        </li>
                                        <li><a href="#2a" data-toggle="tab">PDF</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content ">
                                        <div class="tab-pane active" id="1a">
                                            <button type="button" class="btn pull-right c1">Envoyez-moi un email de
                                                test
                                            </button>
                                            <div class=" row menu_int1">
                                                <div class="menu_int2">
                                                    <div class="com_contenu_type">
                                                        <h2>Tapakila</h2>
                                                        <p>Merci, voici vos billets! Lorsque vous participez,
                                                            indiquez
                                                            le code
                                                            dans ce courrier
                                                            électronique ou utilisez le fichier .pdf ci-joint</p>
                                                        <hr class="separe">
                                                        <h2>Mes événements</h2>
                                                        <strong>Tue 25. July 2017 - 14:00</strong>
                                                        <p>Location · . Viru 12-34, Tallinn, Estonia <a href="#"
                                                                                                        target="_blank">Map</a>
                                                        </p>
                                                        <hr class="separe">
                                                        <p style="text-align: center; margin: 5px 0; ">1 x Regular
                                                            ticket</p>
                                                        <p style="text-align: center">
                                                            <img src="img/123456TEST.png" class="qt">

                                                        </p>
                                                        <p class="small"
                                                           style="text-align: center; font-size: 13px;">
                                                            123456TEST</p>
                                                    </div>

                                                </div>
                                                <table role="presentation" cellspacing="0" cellpadding="0"
                                                       border="0"
                                                       align="center"
                                                       width="100%" style="max-width: 680px;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding: 15px 10px 40px 10px; width: 100%; font-family: sans-serif; text-align: center; color: #888888;">
                                                            <p class="small"
                                                               style="font-size: 13px; line-height:22px;">
                                                                Ticket order 123456<br>
                                                                This email has been sent to <a
                                                                        href="mailto:dinavonjy@icloud.com">dinavonjy@icloud
                                                                    .com</a><br>
                                                                <a href="#"
                                                                   style="color:#2CB0E1; text-decoration: none;">Piletimasin</a>
                                                                ·
                                                                Organize your event
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                        <div class="tab-pane" id="2a">
                                            <button type="button" class="btn pull-right c2">Ouvrir PDF</button>
                                            <div class=" row menu_int2">
                                                <div class="menu_int3">
                                                    <div id="menu_left">
                                                        <img src="img/123456TEST.png" class="qt">

                                                    </div>
                                                    <div id="menu_right">
                                                        <h2>Mon événement</h2>
                                                        <p>Tue 25. July 2017 - 14:00</p>
                                                        <p>Location · . Viru 12-34, Tallinn, Estonia</p>
                                                    </div>

                                                </div>
                                                <hr class="separe">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!------------------------------------PDF-end--------------------------------------------------------------------------->


                    <!------------------------------------Champ additionel--------------------------------------------------------------------------->

                    <div id="div_cpersonalize" class="hide">
                        <div class="com_contenu_type1">
                            <h2>Les champs additioneles</h2>
                            <p>
                                Par défaut, les clients sont invités à fournir une seule adresse électronique et un
                                numéro de téléphone obligatoires. Ici, vous pouvez ajouter d'autres questions telles
                                que
                                le prénom, l'adresse etc.</p>
                        </div>
                        <div class="com_contenu_type2">
                            <h2>Champs personnalisés par participant</h2>
                            {!! Form::open(['id' => 'question-form', 'route' => 'question','role' => 'question', 'method' => 'POST'] ) !!}
                            <input type="text" name="question" class="form-control"><br/>
                            @if(isset($event))
                                {!! Form::hidden('events_id', Crypt::encryptString($event->id), ['class' => 'form-control']) !!}
                            @endif
                            <button type="submit"
                                    class="btn btn-primary btn-outline text-center center-block primary">
                                <i aria-hidden="true "></i> <span aria-hidden="true "></span> Ajouter
                            </button>
                            {!! Form::close() !!}
                        </div>

                    </div>
                    <!------------------------------------Champ additionel-end--------------------------------------------------------------------------->


                    <!------------------------------------Methode des payements--------------------------------------------------------------------------->
                    <div id="div_paiement" class="hide">
                        <div class="com_contenu_type12">
                            <h2>Le méthodes des paiements</h2>
                            <div class="modepaimenent">


                                <div class="row">

                                    <div id="ticket-radio2">
                                        <div class="btn-group" data-toggle="buttons">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="radio">
                                                    <label class="button  active">
                                                        <img class="logo" src="{{url('/')}}/public/img/logmvola.png"
                                                             alt="">
                                                        <b class="operateura">Telma Mvola</b>
                                                        <label class="custom-control custom-checkbox che pull-right">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description"></span>
                                                        </label>

                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-6">
                                                <div class="radio">
                                                    <label class="button  ">
                                                        <img class="logo"
                                                             src="{{url('/')}}/public//img/logmartel.png"
                                                             alt="">
                                                        <b class="operateura">Airtel money</b>
                                                        <label class="custom-control custom-checkbox che pull-right">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description"></span>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-sm-12">
                                                <div class="radio">
                                                    <label class="button  ">
                                                        <img class="logo"
                                                             src="{{url('/')}}/public//img/logmorange.png"
                                                             alt="">
                                                        <b class="operateura">Orange money</b>
                                                        <label class="custom-control custom-checkbox che pull-right">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description"></span>
                                                        </label>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="com_contenu_type2">
                            <div class="row">
                                <h2>Facture d'achat</h2>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" id="check" onchange="changing()">
                                                Autoriser le paiement par facture. L'acheteur recevra une facture
                                                émise
                                                au nom de ma société. La réception du paiement et l'exécution de la
                                                commande seront traitées par Piletimasin.
                                                <a href="#" target="_blank">Aperçu de l'exemple de facturation.</a>.
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div id="div_menu" class="hide">
                                        <label>Tickets</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optradio" checked="checked">Les billets
                                                sont
                                                envoyés à la réception du paiement.
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optradio">Les billets sont envoyés
                                                immédiatement lorsque la commande est effectuée, ainsi que la
                                                facture.
                                                En tant qu'organisateur, je risque de recevoir le paiement.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="com_contenu_type_foot">
                            <button type="button" class="btn btn-danger bout">Mettre à jour</button>

                        </div>

                        <script>
                            function changing() {
                                if ($('#check').is(":checked")) {
                                    $('#div_menu').removeClass('hide');
                                } else {
                                    $('#div_menu').addClass('hide');
                                }
                            }
                        </script>

                    </div>

                    <!------------------------------------Methode de payement-end--------------------------------------------------------------------------->


                    <!---------------------------ticket---------------------------------------------------------------------------------------->

                    <!----------------------------------création-ticket------------------------------------->
                    <div id="div_ticket" class="hide">
                        {!! Form::open(['id' => 'ticket-form', 'route' => 'ticket.store','role' => 'ticket', 'method' => 'POST'] ) !!}
                        <div class="com_contenu_type1">
                            <div class="ticket_details">
                                <input type="hidden" name="id" value="{{Crypt::encryptString($event->id)}}">
                                <h2>Détails du type de ticket</h2><br/>

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="usr">Nom de ticket: <span style="color:red">*</span></label>
                                    {!! Form::text('type', null, ['class' => 'form-control', 'id' => 'ticket_type', 'required', 'autofocus']) !!}
                                    <span class="help-block">
                                        <i>Par exemple. "Ticket régulier", "Early Bird", "Student"</i>
                                    </span>

                                </div>
                                <div class="form-group">
                                    <label for="usr">Description</label>
                                    <input type="text" name="description" class="form-control"/>
                                    <span class="help-block">
                                        <i>Par exemple : "Préparez-vous à montrer votre carte étudiante"</i>
					                </span>
                                </div>
                                <div class="form-group">
                                    <label>Prix unitaire du ticket <span style="color:red">*</span></label>
                                    <div class="input-group group">
                                        {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'ticket_price','placeholder'=>'','step'=>'1','required', 'autofocus']) !!}
                                        <span class="input-group-addon">AR</span>
                                    </div>
                                    <span class="help-block">
                                        <i>Prix ​​de l'utilisateur final par billet incluant <a
                                                    href="index.html" target="_blank" class="aa">Frais leguichet</a> Et
                                            TVA, le cas échéant</i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    @php
                                        $i = 0;
                                        $interval = new DateInterval('P1D');
                                        $daterange = new DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval ,\Carbon\Carbon::parse($event->date_fin_event));
                                        foreach ($daterange as $d)
                                        $i++;
                                    @endphp
                                    @if($i > 1)
                                        <label>Date du ticket <span style="color:red">*</span></label>
                                        <span class="help-block">
                                            <i>Votre événement dure @php echo $i @endphp jours. Vous
                                                devriez entrer la date de ce ticket et créer à nouveau un ticket pour les autres dates</i>
                                        </span>
                                        {!! Form::text('date',\Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d') , ['class' => 'form-control', 'id' => 'date','placeholder'=>'','required', 'autofocus']) !!}
                                        <span class="help-block">
                                            <i>Ou simplement:</i>
                                        </span>
                                        <input type="checkbox" name="isValable"/>
                                        <i>Ce ticket est toujours valable</i>
                                    @else
                                        {!! Form::hidden('date', \Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d'), ['class' => 'form-control', 'id' => 'date','placeholder'=>'','required', 'autofocus']) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                        <div class="com_contenu_type2">
                            <h2>Avancée</h2><br/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>
                                        Nombre de billets <span style="color:red">*</span>
                                    </label>
                                    <div class="input-group group chiffre1">
                                        {!! Form::number('number', null, ['class' => 'form-control', 'id' => 'ticket_number', 'min' => '0','required', 'autofocus']) !!}
                                        <span class="input-group-addon">Tickets</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>
                            <br/>
                            <label>Disponible entre les dates <span style="color:red">*</span> :</label>
                            <span class="help-block">
                                <i>Ticket</i>
                            </span>
                            <div class="row" id="event-duration">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i>Du</i>
                                                </div>
                                                {!! Form::text('date_debut_vente', null, ['class' => 'form-control', 'id' => 'date','placeholder'=>'DD/MM/YYYY','required', 'autofocus']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i>Au</i>
                                                </div>
                                                {!! Form::text('date_fin_vente', null, ['class' => 'form-control', 'id' => 'date','placeholder'=>'DD/MM/YYYY','required', 'autofocus']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <i><span style="color: red;">*</span> Champs obligatoires</i>
                            </div>
                        </div>
                        <div class="com_contenu_type_foot">

                            <button type="submit" class="btn btn-danger bout">Enregistrer
                            </button>
                            <button type="button" class="btn btn-danger bout1"
                                    onClick="changePage('div_type', 'a_type')">Annuler
                            </button>
                        </div>
                    </div>
                    @if(isset($event))
                        {!! Form::hidden('events_id', $event->id, ['class' => 'form-control']) !!}
                    @endif
                    {!! Form::close() !!}
                </div>
                <!----------------------------------création ticket-end------------------------------------->
                <!---------------------------ticket-end--------------------------------------------------------------------------------------->
            </div>
        </div>
        </div>
        <!-- End Page -->
    </section>
@endsection

@section('specificScript')
    <script type="text/javascript">
        $('#enregister').click(function () {

            var datedebut = $('#dated').val();
            var datefin = $('#datef').val();

            var arrdd = datedebut.split("-");
            datedebut = arrdd[1] + "-" + arrdd[2] + "-" + arrdd[0];
            var arrdf = datefin.split("-");
            datefin = arrdf[1] + "-" + arrdf[2] + "-" + arrdf[0];
            console.log(datedebut + " " + $('#heured').val());
            console.log(datefin + " " + $('#heuref').val());
            var dd = new Date(datedebut + " " + $('#heured').val());
            var df = new Date(datefin + " " + $('#heuref').val());
            var now = new Date();
            console.log(dd + df);
            if (dd < now || df < now) {
                $('#message_comp').show();
                $('#message_after_comparaison_date_now').show();
                //alert("La date fin de l' évenement doit être supérieure à la date debut");
                return false;
            }
            if (df <= dd) {
                $('#message_comp').show();
                $('#message_after_comparaison').show();
                //alert("La date fin de l' évenement doit être supérieure à la date debut");
                return false;
            }

        });
    </script>
    <script>
        $(document).ready(function () {

            $('#publie').change(function () {
                valeur = $(this).val();
                /* var huhu= $('#publie').val( valeur );
                 console.log(huhu);*/
                var huhu = $('#publie').val(valeur);
            });
            $('#message_after_comparaison').hide();
            $('#message_after_comparaison_date_now').hide();
            $('#message_comp').hide();
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#publie').change(function () {
                var valeur = $(this).val();
                $('#publie').val(valeur);
                console.log(valeur);
                document.getElementById("huhu").value = valeur;
            });

        });
    </script>
    <script>
        function changePage(id, aId) {
            document.getElementById("div_details").className = "hide";
            /*document.getElementById("div_commandes").className = "hide";*/
            document.getElementById("div_rapport").className = "hide";
            document.getElementById("div_type").className = "hide";
            /*document.getElementById("div_valideTicket").className = "hide";*/
            document.getElementById("div_siteweb").className = "hide";
            document.getElementById("div_pdf").className = "hide";
            document.getElementById("div_cpersonalize").className = "hide";
            document.getElementById("div_paiement").className = "hide";
            document.getElementById("div_ticket").className = "hide";
            document.getElementById(id).className = "show";

            document.getElementById("a_details").className = "";
            /*document.getElementById("a_commandes").className = "";*/
            document.getElementById("a_rapport").className = "";
            document.getElementById("a_type").className = "";
            /*document.getElementById("a_valideTicket").className = "";*/
            document.getElementById("a_siteweb").className = "";
            document.getElementById("a_pdf").className = "";
            document.getElementById("a_cpersonalize").className = "";
            document.getElementById("a_paiement").className = "";
            document.getElementById(aId).className = "select";

            if (screen.width <= 750) {
                window.location.hash = id;
            }
        }
    </script>


    <script>

        $(document).ready(function () {
            var date_input = $('input[id="dated"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            });

            var date_input1 = $('input[id="datef"]'); //our date input has the name "date"
            var container1 = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input1.datepicker({
                format: 'yyyy-mm-dd',
                container: container1,
                todayHighlight: true,
                autoclose: true,
            });
            var date_input2 = $('input[id="date"]'); //our date input has the name "date"
            var container2 = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input2.datepicker({
                format: 'yyyy-mm-dd',
                container: container2,
                todayHighlight: true,
                autoclose: true,
            });

        })

    </script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker({
            placement: 'bottom', // clock popover placement
            align: 'left',       // popover arrow align
            donetext: 'Done',     // done button text
            autoclose: false,    // auto close when minute is selected
            vibrate: true        // vibrate the device when dragging clock hand
        });
    </script>

    <!--Script de l'image------------->


    <script>
        var output = document.getElementById('output');
        var button = document.getElementById('button');
        var input = document.getElementById('input');
        var loadFile = function (event) {
            $('#mot').addClass('hide');
            output.src = URL.createObjectURL(event.target.files[0]);
            input.className = "hide";
            output.className = "show";
        };

        function mouseOverFunction() {
            if (output.className == "show") {
                button.className = "show";
            }
        }

        function mouseOutFunction() {
            button.className = "hide";
        }

        function buttonClick() {
            $('#mot').removeClass('hide');
            input.value = null;
            input.className = "show";
            output.className = "hide";
            button.className = "hide";
        }
    </script>

    <script>
        var output1 = document.getElementById('output1');
        var button1 = document.getElementById('button1');
        var input1 = document.getElementById('input1');
        var loadFile1 = function (event) {
            $('#mot1').addClass('hide');
            output1.src = URL.createObjectURL(event.target.files[0]);
            input1.className = "hide";
            output1.className = "show";
        };

        function mouse1OverFunction() {
            if (output1.className == "show") {
                button1.className = "show";
            }
        }

        function mouse1OutFunction() {
            button1.className = "hide";
        }

        function button1Click() {
            $('#mot1').removeClass('hide');
            input1.value = null;
            input1.className = "show";
            output1.className = "hide";
            button1.className = "hide";
        }
    </script>

    <script>
        $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');
            // Hover befor close the preview
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                },
                function () {
                    $('.image-preview').popover('hide');
                }
            );
        });

        $(function () {
            // Create the close button
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            // Set the popover default content
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Aperçu</strong>" + $(closebtn)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            // Clear event
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("");
            });
            // Create the preview image
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                // Set preview image into the popover data-content
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection