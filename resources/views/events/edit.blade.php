@extends('layouts.app')

@section('template_title')
    Welcome {{ Auth::user()->name }}
@endsection

@section('head')
@endsection

@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/events/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li>
                        <a href="{{url('/events/list/categorie/sous_categorie',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <section id="detail">
        <div class="container">
            <div class="page-menu row">
                <div class="col-md-9">
                    <h1>Créér un évènement</h1>
                </div>
                <div class="col-md-3">
                    <div class="btn-group margin-bottom-5">
                        <div class="btn-group" role="group">
                            <select class="form-control" id="publie" name="publie">
                                <option value="false">Non publié</option>
                                <option value="true">Publié</option>
                            </select>
                        </div>
                    </div>
                    <a class="btn btn-sm btn-default btn-aperçu " href="#" target="_blank">Aperçu</a>
                </div>
            </div>

            <!-- detail end -->
            <div class="row">
                <div class="col-lg-9 col-sm-9">
                    <div id="div_details">
                        <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST"
                              action="{{ route('event') }}">
                            {{ csrf_field() }}
                            <div class="panel panel-content">
                                <div class="panel-body border-bottom">
                                    <h2>Details</h2>
                                    <input type="hidden" id="huhu" name="publie">
                                    <div class="clearfix"></div>

                                    <div class="form-group ">
                                        <label class="control-label ">
                                            <span>Titre : *</span>
                                        </label>
                                        <input type="text" name="title" id="titre" class="form-control"
                                               value="{{$event->title}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label ">
                                            <span>Catégories : </span>
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
                                            <span>Description</span>
                                        </label>
                                        <textarea class="form-control" style=" word-wrap: break-word; resize: horizontal;
                                        height: 54px;" name="note">{{$event->additional_note}}</textarea>
                                    </div>
                                </div>


                                <hr>
                                <div class="panel-body border-bottom">
                                    <h2>Heures</h2>
                                    <div class="row" id="event-duration">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label required">Début</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i></div>
                                                            <input class="form-control" id="date" name="date_debut"
                                                                   value="{{\Carbon\Carbon::parse($event->date_debut_envent)->format('d-m-Y')}}"
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
                                                               name="heure_debut">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label required">Fin</label>
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i></div>
                                                            <input class="form-control" id="date" name="date_fin"
                                                                   value="{{ \Carbon\Carbon::parse($event->date_fin_event)->format('d-m-Y')}}"
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
                                                               name="heure_fin">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-translation et">
                                        <label class="control-label">
                                            <span>Notes additionnel sur l'heure</span>
                                        </label>
                                        <textarea class="form-control" style=" word-wrap: break-word; resize: horizontal;
                                        height: 54px;" name="note_time">{{$event->additional_note_time}}</textarea>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Débuts des ventes des tickets</label>

                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" value="" checked="">
                                                    <label for="starts_published">Lors de la publication</label>
                                                </div>

                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" value="dates">
                                                    <label for="starts_datetime">Date et Heure specifique</label>
                                                </div>

                                                <div class="input-group padding-left-30 start-datepicker-div hide">
                                                    <label class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></label>
                                                    <input type="text" class="sale_start form-control" value=""
                                                           data-default="">
                                                    <label class="input-group-addon"><i
                                                                class="fa fa-clock-o"></i></label>
                                                    <input type="text" data-plugin="timepicker"
                                                           class="sale_start form-control ui-timepicker-input" value=""
                                                           data-default="" autocomplete="off">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="control-label">Fin de vente des tickets</label>
                                                <div class="radio-custom radio-primary">
                                                    <input type="radio" value="dates" checked="">
                                                    <label>A une date et heure précise ou plutôt si tout les tickets
                                                        sont vendus</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label required">Fin</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i></div>
                                                                <input class="form-control" id="date" name="date"
                                                                       placeholder="MM/DD/YYYY" type="text"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group clockpicker">
														<span class="input-group-addon">
															<span class="glyphicon glyphicon-time"></span>
															</span>
                                                            <input type="text" class="form-control" value="23:30">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="radio-custom radio-primary">
                                                    <input type="radio">
                                                    <label>Seulement si tous les tickets sont vendus </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- heure end-->
                                <hr>
                                <!-- location start -->
                                <div class="panel-body border-bottom">
                                    <h2>Localisation :</h2>
                                    <form>
                                        <div class="form-group">
                                            <label for="email">Nom:*</label>
                                            <input type="Adresse" class="form-control" id="email"
                                                   name="localisation_nom" value="{{$event->localisation_nom}}">
                                            <p>E.X:Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="adresses">Adresse:</label>
                                            <input type="Adresse" class="form-control" id="adress"
                                                   name="localisation_adresse" value="{{$event->localisation_adresse}}">
                                            <em>Entrer l'adresse exact pour l'affichage des directions sur la carte</em>
                                            <p>E.X:Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                                        </div>

                                    </form>

                                </div>

                                <!-- location end -->
                                <hr>
                                <!-- organisateur start -->
                                <div class="panel-body">
                                    <h2>Organisateur</h2>
                                    <div class="form-group">
                                        {{ Auth::user()->name }}
                                        <a class="btn btn-default editer" target="_blank"
                                           href="{{url('/')}}/profile/{{ Auth::user()->name }}/edit">Editer</a>
                                    </div>
                                </div>
                                <!-- organisateur end -->

                                <div class="Confirme">
                                    <button type="submit" class="btn btn-default enregistrer ">Enregistrer</button>
                                </div>

                            </div>
                        </form>

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

                    <div id="div_type" class="hide">
                        <div id="type_ticket">
                            <div class="com_contenu_type">
                                <h2>Type des tickets</h2>

                                @if(isset($event))
                                    @foreach($event->tickets as $ticket)
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
                                                            <button type="button" class="btn btn-default">
                                                        <span class="glyphicon glyphicon-edit"
                                                              aria-hidden="true"></span>
                                                                Edit
                                                            </button>
                                                            <button type="button"
                                                                    class="btn btn-default dropdown-toggle pull-right"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu menu_type">
                                                                <li><a href="#"><span
                                                                                class="glyphicon glyphicon-chevron-up"
                                                                                aria-hidden="true"></span> Déplacer
                                                                        vers
                                                                        le haut</a></li>
                                                                <li><a href="#"><span
                                                                                class="glyphicon glyphicon-chevron-down"
                                                                                aria-hidden="true"></span> Déplacer vers
                                                                        le bat</a></li>
                                                                <li role="separator" class="divider"></li>
                                                                <li><a href="#"><span
                                                                                class="glyphicon glyphicon-duplicate"
                                                                                aria-hidden="true"></span>
                                                                        Dupliquer</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </h2>
                                                </div>
                                            </div>
                                            <p>Nombre de billets: {{$ticket->number}}</p>
                                        </div>
                                    @endforeach
                                @endif
                                <a class="btn btn-primary btn-outline text-center center-block primary" role="button"
                                   onClick="changePage('div_ticket','a_type')">
                                    <i aria-hidden="true"></i> <span class="glyphicon glyphicon-plus"
                                                                     aria-hidden="true"></span> Ajouter
                                    le type de ticket
                                </a>
                            </div>
                            <div class="com_contenu_type">
                                <h2>Événement complet</h2>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>
                                            Nombre maximum de billets</label>
                                        <div class="input-group group"><input type="number" name="ticket_limit"
                                                                              value="15"
                                                                              id="ticket_limit" class="form-control"
                                                                              placeholder="∞"
                                                                              min="0">
                                            <span class="input-group-addon">tickets</span></div>
                                        <p>Nombre maximum de billets pour l'ensemble de l'événement. Vous pouvez
                                            également définir les
                                            limites par type de ticket.</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Taxe sur la valeur ajoutée</label>
                                        <form>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">20%
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">21%
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">0%
                                            </label>
                                        </form>
                                    </div>
                                </div>


                            </div>
                            <div class="com_contenu_type_foot">
                                <button type="button" class="btn btn-danger bout">Enregistrer</button>

                            </div>

                        </div>
                    </div>
                    <!------------------------------------type-ticket-end--------------------------------------------------------------------------->

                    <!------------------------------------Ticket validé--------------------------------------------------------------------------->

                    <div id="div_valideTicket" class="hide">
                        <div id="billet">
                            <div class="com_contenu">
                                <h2>Validation des billets</h2>
                                <p>
                                    Pour valider les tickets, vous aurez besoin d'un appareil mobile ou d'un ordinateur
                                    et d'une connexion Internet.

                                    Vous pouvez utiliser cet <a href="#" target="_blank">Exemple de ticket</a> pour
                                    vérifier si la validation fonctionne correctement.</p><br>
                                <h3>Appareils mobiles</h3>
                                <hr/>
                                <p>Téléchargez notre application gratuite:</p>
                                <a href="#" target="_blank"><img src="img/download-appstore.png"></a>
                                <a href="#" target="_blank"><img src="img/download-playstore.png"></a>
                                <p class="a1">Ou utiliser payé <a href="#" data-toggle="collapse">Pic2Shop Pro</a>.</p>
                                <h3 class="h14">Ordinateurs et périphériques spéciaux</h3>
                                <hr/>
                                <p>Vous pouvez également utiliser différentes combinaisons de scanners et d'ordinateurs
                                    de codes à barres pour valider les tickets. Configurez votre scanner pour décoder
                                    les formats "Code QR" et "Code 128" et soumettre le formulaire au <a href="#">https://------ </a>Qui
                                    renvoie l'état actuel du ticket et le marque comme étant utilisé.</p>

                            </div>

                        </div>
                    </div>

                    <!------------------------------------Ticket validé-end------------------------------------------------------------------------->


                    <!------------------------------------Site web-------------------------------------------------------------------------->
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST"
                          action="{{ route('event_siteweb') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <div id="div_siteweb" class="hide">
                            <div class="com_contenu_type">
                                <h2>Apparence du site</h2>
                                @php
                                    $titre=$event->title;
                                    $split= explode(" ",$titre);
                                    $titre=$split[0];

                                @endphp
                                <label class="control-label" for="slug">Adresse web</label>
                                <div class="input-group"><span class="input-group-addon">{{ url('/') }}/events/</span>
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
                                <p>L'adresse de la page de vente de billets. Vous pouvez changer cela, mais sachez que
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
                                    <input type="hidden" class="filename" name="en[image_pdf]" id="en[image_pdf]"
                                           value="">
                                    <span class="help-block">Utilisé sur l'en-tête de la page Web, également sous forme de vignette dans les listes d'événements. Utilisez un fichier JPG ou PNG avec une résolution de 1400x500px. Les fichiers plus gros sont réduits automatiquement.</span>

                                </div>

                            </div>
                            <div class="com_contenu_type_foot">
                                <button type="submit" class="btn btn-danger bout">Mettre à jour</button>

                            </div>
                        </div>
                    </form>
                    <!------------------------------------Site web-end--------------------------------------------------------------------------->

                    <!------------------------------------PDF--------------------------------------------------------------------------->

                    <div id="div_pdf" class="hide">

                        <div class="com_contenu_type">
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
                                <input type="hidden" class="filename" name="en[image_pdf]" id="en[image_pdf]" value="">
                                <span class="help-block">L'image couvrira le ticket d'un côté à l'autre. Utilisez un fichier JPG ou PNG de 1240px. Lorsque vous choisissez la hauteur, assurez-vous que tout sur le ticket PDF correspond à une seule page. Les fichiers les plus étendus sont automatiquement réduits.</span>
                            </div>
                        </div>
                        <hr/>
                        <div class="com_contenu_type_ticket">
                            <form>
                                <div class="radio-custom radio-primary">
                                    <input type="radio" name="split_tickets" id="split_tickets_1" value="1" checked="">
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
                            <p>Toutes les données du ticket sont incluses dans le corps du courrier électronique et dans
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
                                                <p>Merci, voici vos billets! Lorsque vous participez, indiquez le code
                                                    dans ce courrier
                                                    électronique ou utilisez le fichier .pdf ci-joint</p>
                                                <hr/>
                                                <h2>Mes évènements</h2>
                                                <strong>Tue 25. July 2017 - 14:00</strong>
                                                <p>Location · . Viru 12-34, Tallinn, Estonia <a href="#"
                                                                                                target="_blank">Map</a>
                                                </p>
                                                <hr/>
                                                <p style="text-align: center; margin: 5px 0; ">1 x Regular ticket</p>
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
                                                        <a href="#" style="color:#2CB0E1; text-decoration: none;">Piletimasin</a>
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
                                        <hr/>

                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                    <!------------------------------------PDF-end--------------------------------------------------------------------------->


                    <!------------------------------------Champ additionel--------------------------------------------------------------------------->

                    <div id="div_cpersonalize" class="hide">
                        <div class="com_contenu_type1">
                            <h2>Les champs personnalisés</h2>
                            <p>
                                Par défaut, les clients sont invités à fournir une seule adresse électronique et un
                                numéro de téléphone
                                obligatoires. Ici, vous pouvez ajouter d'autres questions telles que le prénom,
                                l'adresse etc.</p>
                        </div>
                        <div class="com_contenu_type2">
                            <h2>Champs personnalisés par participant</h2>
                            <a href=#" class="btn btn-primary btn-outline text-center center-block primary"
                               role="button">
                                <i aria-hidden="true"></i> <span class="glyphicon glyphicon-plus"
                                                                 aria-hidden="true"></span> Ajouter
                            </a>
                        </div>
                        <div class="com_contenu_type2">
                            <h2>Champs personnalisés par participant</h2>
                            <a href=#" class="btn btn-primary btn-outline text-center center-block primary"
                               role="button">
                                <i aria-hidden="true"></i> <span class="glyphicon glyphicon-plus"
                                                                 aria-hidden="true"></span> Ajouter
                            </a>
                        </div>

                    </div>
                    <!------------------------------------Champ additionel-end--------------------------------------------------------------------------->


                    <!------------------------------------Methode des payements--------------------------------------------------------------------------->

                    <div id="div_paiement" class="hide">
                        <div class="com_contenu_type1">
                            <h2>Liens et cartes bancaires</h2>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="control-label block">Liens et cartes bancaires activés</label>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" checked="checked" disabled>Liens
                                                bancaires estoniens</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" checked="checked" disabled>Liens
                                                bancaires en
                                                Lettonie</label>
                                        </div>
                                        <div class="checkbox disabled">
                                            <label><input type="checkbox" value="" checked="checked" disabled>Cartes de
                                                crédit</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="control-label block">Tickets</label>
                                        <p>
                                            Tickets are sent immediately after completing the payment.
                                        </p>
                                    </div>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" checked="checked" disabled>
                                                Piletimasin can send my customers invoices which are genereted behalf of
                                                my
                                                organisation.
                                                Preview
                                                <a href="#" target="_blank">invoice example</a>.
                                            </label>
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
                                            <label><input type="checkbox" value="" id="check" onchange="changing()">
                                                Autoriser le paiement par facture. L'acheteur recevra une facture émise
                                                au nom de ma
                                                société. La réception du paiement et
                                                l'exécution de la commande seront traitées par Piletimasin.
                                                <a href="#" target="_blank">Aperçu de l'exemple de facturation.</a>.
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div id="div_menu" class="hide">
                                        <label>Tickets</label>
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" checked="checked">Les billets
                                                sont envoyés à la réception du
                                                paiement.</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="optradio">Les billets sont envoyés
                                                immédiatement lorsque la
                                                commande est effectuée, ainsi que la facture. En tant qu'organisateur,
                                                je risque de
                                                recevoir le paiement.</label>
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
                                <input type="hidden" name="id_ilaina" value="{{$event->id}}">
                                <h2>Détails du type de ticket</h2><br/>

                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="usr">Nom du type de ticket:*</label>
                                    {!! Form::text('type', null, ['class' => 'form-control', 'id' => 'ticket_type', 'required', 'autofocus']) !!}
                                    <span class="help-block">
					                    Par exemple. "Ticket régulier", "Early Bird", "Student"
                                    </span>

                                </div>
                                <div class="form-group">
                                    <label for="usr">La description</label>
                                    <input type="text" class="form-control" id="usr">
                                    <span class="help-block">
					                    Par exemple. "Vendu jusqu'au 23 juin" ou "Préparez-vous à montrer votre carte étudiante"
					                </span>
                                </div>
                                <div class="form-group">
                                    <label>Prix unitaire du ticket</label>
                                    <div class="input-group group">
                                        {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'ticket_price','placeholder'=>'','step'=>'1','required', 'autofocus']) !!}
                                        <span class="input-group-addon">AR</span>
                                    </div>
                                    <span class="help-block">
                                        Prix ​​de l'utilisateur final par billet incluant <a
                                                href="index.html" target="_blank" class="aa">Frais Tapakila</a> Et
                                        TVA, le cas échéant
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
                                        <label>Date du ticket</label>
                                        {!! Form::text('date', null, ['class' => 'form-control', 'id' => 'date','placeholder'=>'DD/MM/YYYY','required', 'autofocus']) !!}
                                        <span class="help-block">
                                            Votre évènement a @php echo $i @endphp jours. Vous
                                            devriez entrer la date de ce ticket<br/>
                                            Ou simplement:
                                        </span>
                                        <input type="checkbox" name="isValable"/>Ce ticket est valable dans tous les jours de
                                        l'évènement.
                                    @else
                                        {!! Form::hidden('date', \Carbon\Carbon::parse($event->date_debut_envent)->format('d/m/Y'), ['class' => 'form-control', 'id' => 'date','placeholder'=>'MM/DD/YYYY','required', 'autofocus']) !!}
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
                                        Nombre maximum de billets
                                    </label>
                                    <div class="input-group group chiffre1">
                                        {!! Form::number('number', null, ['class' => 'form-control', 'id' => 'ticket_number', 'min' => '0','required', 'autofocus']) !!}
                                        <span class="input-group-addon">Tickets</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>
                            <p class="help-block">Le nombre maximum de tickets pour l'événement entier est défini sur
                                "15".</p>
                            <p class="help-block">Ici, vous pouvez définir une limite supplémentaire pour ce type de
                                ticket uniquement. Il sera caché à partir de la page d'achat une fois épuisé</p>
                            <br/>
                            <label>Disponible entre les dates, y compris:</label>
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
                            <p class="help-block">Toute la vente de billets d'événement commence "Quand je publie
                                cet événement" et finit "Seulement lorsque tous les billets ont été vendus"</p>
                            <p class="help-block">Ici, vous pouvez définir une limite supplémentaire pour ce type de
                                ticket uniquement.</p>
                            <br/>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="usr">Code de réduction</label>
                                        <input type="text" class="form-control" id="usr">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Prix ​​discount</label>
                                    <div class="input-group group chiffre">
                                        <input type="number" name="ticket_limit"
                                               id="ticket_limit" class="form-control" placeholder=""
                                               min="0" step="0.01">
                                        <span class="input-group-addon">AR</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="usr">Prix ​​discount</label>
                                <input type="text" class="form-control" id="usr">
                            </div>
                            <label>Commande manuelle</label>
                            <div class="checkbox">
                                <label><input type="checkbox" value="">Ce type de billet est temporairement non
                                    vendu</label>
                            </div>
                        </div>
                        <div class="com_contenu_type_foot">
                            <button type="submit" class="btn btn-danger bout"
                            {{--onClick="changePage('div_type', 'a_type')--}}">Enregistrer
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
                <!-- menu droit start -->
                <div class="col-lg-3 col-sm-3">
                    <ul class="navtab">
                        <li class="categorimenu"><strong>Achats</strong></li>
                        <li><a href="#" id="a_rapport" onClick="changePage('div_rapport', 'a_rapport')">Rapports</a>
                        </li>
                        <li><a href="#" id="a_commandes"
                               onClick="changePage('div_commandes', 'a_commandes')">Commandes</a></li>
                        <li><a href="#" id="a_valideTicket"
                               onClick="changePage('div_valideTicket', 'a_valideTicket')">Tickets
                                Validés</a></li>
                        <li class="categorimenu"><strong>Editer</strong></li>
                        <li><a href="#" id="a_details" class="select"
                               onClick="changePage('div_details', 'a_details')">Détails</a>
                        </li>
                        <li><a href="#" id="a_type" onClick="changePage('div_type', 'a_type')">Types de Ticket &amp;
                                prix</a></li>
                        <li><a href="#" id="a_siteweb" onClick="changePage('div_siteweb', 'a_siteweb')">Site web</a>
                        </li>
                        <li><a href="#" id="a_pdf" onClick="changePage('div_pdf', 'a_pdf')">PDF</a></li>
                        <li><a href="#" id="a_cpersonalize"
                               onClick="changePage('div_cpersonalize', 'a_cpersonalize')">Champs
                                additioneles</a></li>
                        <li class="categorimenu"><strong>Paramètre</strong></li>
                        <li><a href="#" id="a_paiement" onClick="changePage('div_paiement', 'a_paiement')">Méthodes
                                de
                                payements</a></li>
                    </ul>
                </div>

            </div>

        </div>
        </div>
        <!-- End Page -->
    </section>
@endsection

@section('footer_scripts')
    <script>
        $(document).ready(function () {

            $('#publie').change(function () {
                valeur = $(this).val();
                /* var huhu= $('#publie').val( valeur );
                 console.log(huhu);*/
                var huhu = $('#publie').val(valeur);
                //console.log(huhu);

            });

        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $('#publie').change(function () {
                var valeur = $(this).val();
                $('#publie').val(valeur);
                //console.log(valeur);
                document.getElementById("huhu").value = valeur;
            });

        });
    </script>
    <script>
        function changePage(id, aId) {
            console.log('fghhgfhgfhg');
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
        }
    </script>


    <script>

        $(document).ready(function () {
            var date_input = $('input[id="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'dd-mm-yyyy',
                container: container,
                todayHighlight: true,
                autoclose: true,
            })
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