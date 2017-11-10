{{--@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection--}}
@extends("template")
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
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
                    <h1>Modifier votre évènement</h1>

                    @if (session('message'))
                        <div class="alert alert1 alert-success">
                            <span class="glyphicon glyphicon-ok"></span> <strong>{!! session('message') !!} </strong>
                            <hr class="message-inner-separator">
                            @if($event->tickets->count()==0)
                                @if(session('page') == 'details')
                                    <p>A présent, vous devez ajouter les Types de Ticket dans l'onglet "Types de Ticket
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
                    <p><i style="color:red;">La modification d'une publication évènement est accordé par
                            l'administrateur</i></p>
                </div>
            </div>

            <!-- detail end -->
            <div class="row">
                <div class="col-lg-3 col-sm-3 creat">

                    <ul class="navtab">
                        <li class="categorimenu"><strong>Achats</strong></li>
                        <li><a id="a_rapport" onClick="changePage('div_rapport', 'a_rapport')">Rapports</a></li>
                        <li><a id="a_commandes" onClick="changePage('div_commandes', 'a_commandes')">Commandes</a></li>
                        <li><a id="a_valideTicket" onClick="changePage('div_valideTicket', 'a_valideTicket')">Tickets
                                Validés</a></li>
                        <li class="categorimenu"><strong>Editer</strong></li>
                        <li><a id="a_details" @if(session('page')) @if(session('page') == 'details') class="select"
                               @endif @else class="select" @endif
                               onClick="changePage('div_details', 'a_details')">Détails</a></li>
                        <li><a id="a_type" @if(session('page')) @if(session('page')=='tickets') class="select"
                               @endif @endif onClick="changePage('div_type', 'a_type')">Types de Ticket &amp; prix</a>
                        </li>
                        <li class="hidden"><a id="a_siteweb" onClick="changePage('div_siteweb', 'a_siteweb')">Apparence
                                du site</a>
                        </li>
                        <li class="hidden"><a id="a_pdf" onClick="changePage('div_pdf', 'a_pdf')">PDF</a></li>
                        <li><a id="a_cpersonalize" onClick="changePage('div_cpersonalize', 'a_cpersonalize')">Champs
                                additioneles</a></li>
                        <li class="categorimenu"><strong>Paramètre</strong></li>
                        <li><a id="a_paiement" onClick="changePage('div_paiement', 'a_paiement')">Méthodes de
                                payements</a></li>
                    </ul>
                </div>
                <div class="col-lg-9 col-sm-9">
                    <div id="div_details"
                         @if(session('page')) @if(session('page')=='tickets') class="hide" @endif @endif>
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
                                    <h2>Details</h2>
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
                                                            l'évenement</label><span class="champ_required"> *</span>
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
                                                               value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('h:i:s')}}"
                                                               name="heure_debut" id="heured">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label required">Fin de l'évenement</label><span
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
                                                               value="{{ \Carbon\Carbon::parse($event->date_fin_event)->format('h:i:s')}}"
                                                               name="heure_fin" id="heuref">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group form-group-translation et" id="message_comp">
                                        <p style="color:red;" id="message_after_comparaison">La date fin
                                            de l' évenement doit être supérieure à la date debut</p>
                                        <p style="color:red;" id="message_after_comparaison_date_now">La
                                            date début ou fin de l' évènement doit être supérieure à la
                                            date actuelle</p>

                                    </div>
                                    <div class="form-group form-group-translation et">
                                        <label class="control-label">
                                            <span>Notes additionnel sur l'heure</span>
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
                                                   name="localisation_adresse" value="{{$event->localisation_adresse}}">
                                            <em>Entrer l'adresse exact pour l'affichage des directions sur la carte</em>
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

                    <div id="div_commandes" class="hide">
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
                    </div>

                    <!------------------------------------Commande-end--------------------------------------------------------------------------->

                    <!-------------------------------------rapport------------------------------------------------------------------------->

                    <div id="div_rapport" class="hide">
                        <div id="rapport">

                            <ul class="nav nav-tabs nav-tabs1">
                                <li class="active ">
                                    <a href="#1" data-toggle="tab">Aperçu</a>
                                </li>
                                <li><a href="#2" data-toggle="tab">Ventes</a>
                                </li>
                                <li><a href="#3" data-toggle="tab">Ordres</a>
                                <li><a href="#4" data-toggle="tab">Validations</a>
                                </li>
                            </ul>

                            <div class="tab-content ">
                                <div class="tab-pane active" id="1">
                                    <form>
                                        <div class="pane1">
                                            <div class="row">
                                                <div class="col-lg-10 col-lg-offset-1 choix1">
                                                    <select class="form-control" id="sel1">
                                                        <option>Mon événement</option>
                                                        <option>Tous les événements</option>
                                                        <option>Maka en concert</option>
                                                        <option>Se rencontrer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 text-center">
                                                    <div class="counter">
                                                        <div class="counter_number">
                                                            0
                                                            <i class="fa fa-ticket" aria-hidden="true"></i>
                                                            <div class="counter-label">Billets vendus</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <div class="counter">
                                                        <div class="counter_number">
                                                            0
                                                            <i class="fa fa-eur" aria-hidden="true"></i>
                                                            <div class="counter-label">Rotation</div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="com_contenu_type2">
                                            <h2>Billets vendus au cours des 30 derniers jours</h2>

                                            <div id="chart-sales" class="ct-chart ct-octave">
                                                <svg class="ct-chart-bar" style="width: 100%; height: 100%;">
                                                    <g class="ct-grids">
                                                        <line y1="381.25" y2="381.25" x1="10" x2="817.5"
                                                              class="ct-grid ct-vertical"></line>
                                                        <line y1="15" y2="15" x1="10" x2="817.5"
                                                              class="ct-grid ct-vertical"></line>
                                                    </g>
                                                    <g>
                                                        <g class="ct-series ct-series-a">
                                                            <line x1="23.024193548387096" x2="23.024193548387096"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="49.07258064516129" x2="49.07258064516129"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="75.12096774193549" x2="75.12096774193549"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="101.16935483870967" x2="101.16935483870967"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="127.21774193548387" x2="127.21774193548387"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="153.26612903225808" x2="153.26612903225808"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="179.31451612903226" x2="179.31451612903226"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="205.36290322580643" x2="205.36290322580643"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="231.41129032258064" x2="231.41129032258064"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="257.4596774193548" x2="257.4596774193548"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="283.508064516129" x2="283.508064516129"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="309.5564516129032" x2="309.5564516129032"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="335.6048387096774" x2="335.6048387096774"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="361.6532258064516" x2="361.6532258064516"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="387.70161290322574" x2="387.70161290322574"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="413.74999999999994" x2="413.74999999999994"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="439.79838709677415" x2="439.79838709677415"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="465.84677419354836" x2="465.84677419354836"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="491.89516129032256" x2="491.89516129032256"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="517.9435483870967" x2="517.9435483870967"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="543.991935483871" x2="543.991935483871"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="570.0403225806451" x2="570.0403225806451"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="596.0887096774193" x2="596.0887096774193"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="622.1370967741935" x2="622.1370967741935"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="648.1854838709677" x2="648.1854838709677"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="674.2338709677418" x2="674.2338709677418"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="700.2822580645161" x2="700.2822580645161"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="726.3306451612902" x2="726.3306451612902"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="752.3790322580644" x2="752.3790322580644"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="778.4274193548387" x2="778.4274193548387"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                            <line x1="804.4758064516128" x2="804.4758064516128"
                                                                  y1="381.25" y2="381.25" class="ct-bar"
                                                                  value="0"></line>
                                                        </g>
                                                    </g>
                                                    <g class="ct-labels">
                                                        <foreignObject style="overflow: visible;" x="10" y="386.25"
                                                                       width="26.048387096774192" height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">19</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="36.04838709677419"
                                                                       y="386.25" width="26.048387096774192"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">20</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="62.096774193548384"
                                                                       y="386.25" width="26.048387096774192"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">21</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="88.14516129032258"
                                                                       y="386.25" width="26.048387096774192"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">22</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="114.19354838709677"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">23</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="140.24193548387098"
                                                                       y="386.25" width="26.048387096774178"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">24</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="166.29032258064515"
                                                                       y="386.25" width="26.048387096774178"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">25</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="192.33870967741933"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">26</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="218.38709677419354"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">27</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="244.43548387096774"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">28</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="270.48387096774195"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">29</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="296.5322580645161"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">30</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="322.5806451612903"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">31</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="348.6290322580645"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">01</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="374.67741935483866"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">02</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="400.72580645161287"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">03</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="426.7741935483871"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">04</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="452.8225806451613"
                                                                       y="386.25" width="26.048387096774206"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">05</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="478.8709677419355"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">06</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="504.91935483870964"
                                                                       y="386.25" width="26.048387096774263"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">07</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="530.9677419354839"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">08</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="557.016129032258"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">09</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="583.0645161290322"
                                                                       y="386.25" width="26.048387096774263"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">10</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="609.1129032258065"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">11</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="635.1612903225806"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">12</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="661.2096774193548"
                                                                       y="386.25" width="26.048387096774263"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">13</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="687.258064516129"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">14</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="713.3064516129032"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">15</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="739.3548387096773"
                                                                       y="386.25" width="26.048387096774263"
                                                                       height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 26px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">16</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="765.4032258064516"
                                                                       y="386.25" width="26.04838709677415" height="20">
                                                            <span class="ct-label ct-horizontal ct-end"
                                                                  style="width: 26px; height: 20px"
                                                                  xmlns="http://www.w3.org/2000/xmlns/">17</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" x="791.4516129032257"
                                                                       y="386.25" width="30" height="20"><span
                                                                    class="ct-label ct-horizontal ct-end"
                                                                    style="width: 30px; height: 20px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">18</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" y="15" x="10"
                                                                       height="366.25" width="0"><span
                                                                    class="ct-label ct-vertical ct-start"
                                                                    style="height: 366px; width: 0px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">0</span>
                                                        </foreignObject>
                                                        <foreignObject style="overflow: visible;" y="-15" x="10"
                                                                       height="30" width="0"><span
                                                                    class="ct-label ct-vertical ct-start"
                                                                    style="height: 30px; width: 0px"
                                                                    xmlns="http://www.w3.org/2000/xmlns/">1</span>
                                                        </foreignObject>
                                                    </g>
                                                </svg>


                                            </div>

                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="2">
                                    <div class="rapporter">
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <select class="form-control choix2" id="sel2">
                                                    <option>Mon événement</option>
                                                    <option>Tous les événements</option>
                                                    <option>Maka en concert</option>
                                                    <option>Se rencontrer</option>
                                                </select>
                                                <br>
                                                <div class="form-group">
                                                    <p class="text-right">
                                                        <a class="btn btn-default btn-xs" href="#">.xls</a>
                                                        <a class="btn btn-default btn-xs" href="#">.csv</a>
                                                    </p>

                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped">

                                                            <thead class="bg-blue-grey-100">
                                                            <tr>
                                                                <th>Date</th>
                                                                <th class="text-right">Ordres</th>
                                                                <th class="text-right">Ventes</th>
                                                                <th class="text-right">Billets</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            </tbody>


                                                        </table>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="3">
                                    <div class="rapporter">
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <select class="form-control choix2" id="sel2">
                                                    <option>Mon événement</option>
                                                    <option>Tous les événements</option>
                                                    <option>Maka en concert</option>
                                                    <option>Se rencontrer</option>
                                                </select>
                                                <br>
                                                <div class="form-group">
                                                    <p class="text-right">
                                                        <a class="btn btn-default btn-xs" href="#">.xls</a>
                                                        <a class="btn btn-default btn-xs" href="#">.csv</a>
                                                    </p>

                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped">

                                                            <thead class="bg-blue-grey-100">
                                                            <tr>
                                                                <th>Date</th>
                                                                <th class="text-right">ID</th>
                                                                <th class="text-right">Date</th>
                                                                <th class="text-right">Ventes</th>
                                                                <th class="text-right">Billets</th>
                                                                <th class="text-right">Billet régulier</th>
                                                                <th class="text-right">Lang régulier</th>
                                                                <th class="text-right">Ref</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            </tbody>


                                                        </table>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane" id="4">
                                    <div class="rapporter">
                                        <div class="row">
                                            <div class="col-lg-10 col-lg-offset-1">
                                                <select class="form-control choix2" id="sel2">
                                                    <option>Mon événement</option>
                                                    <option>Tous les événements</option>
                                                    <option>Maka en concert</option>
                                                    <option>Se rencontrer</option>
                                                </select>
                                                <br>
                                                <div class="form-group">
                                                    <p class="text-right">
                                                        <a class="btn btn-default btn-xs" href="#">.xls</a>
                                                        <a class="btn btn-default btn-xs" href="#">.csv</a>
                                                    </p>

                                                    <div class="table-responsive">
                                                        <table class="table table-hover table-striped">

                                                            <thead class="bg-blue-grey-100">
                                                            <tr>
                                                                <th>Date</th>
                                                                <th class="text-right">Date</th>
                                                                <th class="text-right">Codes validés</th>
                                                                <th class="text-right">Billets validés</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            </tbody>


                                                        </table>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!------------------------------------Rapport-end--------------------------------------------------------------------------->

                    <!------------------------------------type-ticket-------------------------------------------------------------------------->

                    <div id="div_type"
                         @if(session('page')) @if(session('page') == 'details')  class="hide" @endif @else class="hide" @endif>
                        <div id="type_ticket">
                            <div class="com_contenu_type">
                                <div class="panel panel-content">
                                    <div class="panel-body border-bottom">
                                        <h2>Type des tickets</h2>
                                        @if(isset($event))
                                            @php $id=0; @endphp
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

                                                                        {!! Form::button('<i class="fa fa-fw fa-trash" aria-hidden="true"></i> Supprimer',
                                                                                array(
                                                                                    'class' 			=> 'btn  btn-deleted',
                                                                                    'id' 				=> 'delete_ticket_trigger',
                                                                                    'type' 				=> 'button',
                                                                                    'data-toggle' 		=> 'modal',
                                                                                    'data-target' 		=> '#confirmDelete'
                                                                                )
                                                                        ) !!}
                                                                    </div>
                                                                </h2>
                                                                <div class="modal fade modal-danger" id="confirmDelete"
                                                                     role="dialog" aria-labelledby="confirmDeleteLabel"
                                                                     aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close"><span
                                                                                            aria-hidden="true">&times;</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Confirm
                                                                                    Delete</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Delete this ticket?</p>
                                                                                <p>La suppression de cette ticket a un
                                                                                    risque pour les clients</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                {!! Form::button('<i class="fa fa-fw fa-close" aria-hidden="true"></i> Cancel', array('class' => 'btn btn-outline pull-left btn-flat', 'type' => 'button', 'data-dismiss' => 'modal' )) !!}
                                                                                <a class="btn btn-danger pull-right btn-flat"
                                                                                   href="{{ url("organisateur/event/ticket/delete/".$ticket->id."/".$event->id) }}">
                                                                                        <span class="fa fa-fw fa-trash-o"
                                                                                              aria-hidden="true"></span>Effacer
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p>Nombre de billets: {{$ticket->tapakila()->count()}}</p>
                                                    </div>
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

                    <div id="div_valideTicket" class="hide">
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
                    </div>


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

                                                <div class="dropify-message" id="mot"><span class="file-icon"></span>
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
                                        <input type="hidden" class="filename" name="en[image_pdf]" id="en[image_pdf]"
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
                                    <p>Toutes les données du ticket sont incluses dans le corps du courrier électronique
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
                                            <button type="button" class="btn pull-right c1">Envoyez-moi un email de test
                                            </button>
                                            <div class=" row menu_int1">
                                                <div class="menu_int2">
                                                    <div class="com_contenu_type">
                                                        <h2>Tapakila</h2>
                                                        <p>Merci, voici vos billets! Lorsque vous participez, indiquez
                                                            le code
                                                            dans ce courrier
                                                            électronique ou utilisez le fichier .pdf ci-joint</p>
                                                        <hr class="separe">
                                                        <h2>Mes évènements</h2>
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
                                                        <p class="small" style="text-align: center; font-size: 13px;">
                                                            123456TEST</p>
                                                    </div>

                                                </div>
                                                <table role="presentation" cellspacing="0" cellpadding="0" border="0"
                                                       align="center"
                                                       width="100%" style="max-width: 680px;">
                                                    <tbody>
                                                    <tr>
                                                        <td style="padding: 15px 10px 40px 10px; width: 100%; font-family: sans-serif; text-align: center; color: #888888;">
                                                            <p class="small" style="font-size: 13px; line-height:22px;">
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
                                numéro de téléphone obligatoires. Ici, vous pouvez ajouter d'autres questions telles que
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
                                <i aria-hidden="true "></i> <span class="glyphicon glyphicon-plus "
                                                                  aria-hidden="true "></span> Ajouter
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
                                                        <img class="logo" src="{{url('/')}}/public//img/logmartel.png"
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
                                                        <img class="logo" src="{{url('/')}}/public//img/logmorange.png"
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
                                                Autoriser le paiement par facture. L'acheteur recevra une facture émise
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
                                                <input type="radio" name="optradio" checked="checked">Les billets sont
                                                envoyés à la réception du paiement.
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optradio">Les billets sont envoyés
                                                immédiatement lorsque la commande est effectuée, ainsi que la facture.
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
                                    <label for="usr">La description</label>
                                    <input type="text" name="description" class="form-control"/>
                                    <span class="help-block">
                                        <i>Par exemple : "Préparez-vous à montrer votre carte étudiante"</i>
					                </span>
                                </div>
                                <div class="form-group">
                                    <label>Prix unitaire du ticket <span style="color:red">*</span></label>
                                    <span class="help-block">
                                        <i>Prix en nombre (sans espace)</i>
                                    </span>
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
                                            <i>Votre évènement a @php echo $i @endphp jours. Vous
                                                devriez entrer la date de ce ticket et créer à nouveau un ticket pour les autres dates</i>
                                        </span>
                                        {!! Form::text('date',\Carbon\Carbon::parse($event->date_debut_envent)->format('Y-m-d') , ['class' => 'form-control', 'id' => 'date','placeholder'=>'','required', 'autofocus']) !!}
                                        <span class="help-block">
                                            <i>Ou simplement:</i>
                                        </span>
                                        <input type="checkbox" name="isValable"/>
                                        <i>Ce ticket est valable dans tous les
                                            jours de
                                            l'évènement.</i>
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
                            <label>Disponible entre les dates, y compris <span style="color:red">*</span> :</label>
                            <span class="help-block">
                                <i>Date debut et date fin vente de ce ticket</i>
                            </span>
                            <div class="row" id="event-duration">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                {!! Form::text('date_debut_vente', null, ['class' => 'form-control', 'id' => 'date','placeholder'=>'DD/MM/YYYY','required', 'autofocus']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i>à</i>
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
            document.getElementById("div_commandes").className = "hide";
            document.getElementById("div_rapport").className = "hide";
            document.getElementById("div_type").className = "hide";
            document.getElementById("div_valideTicket").className = "hide";
            document.getElementById("div_siteweb").className = "hide";
            document.getElementById("div_pdf").className = "hide";
            document.getElementById("div_cpersonalize").className = "hide";
            document.getElementById("div_paiement").className = "hide";
            document.getElementById("div_ticket").className = "hide";
            document.getElementById(id).className = "show";

            document.getElementById("a_details").className = "";
            document.getElementById("a_commandes").className = "";
            document.getElementById("a_rapport").className = "";
            document.getElementById("a_type").className = "";
            document.getElementById("a_valideTicket").className = "";
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