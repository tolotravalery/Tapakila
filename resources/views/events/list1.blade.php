@extends('template')
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
                        <a href="{{url('/events/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <br/>
    <section class="clearfix">
        <div class="container">
            <ul class="herb">
                <li class=" bounce animated2 zoomIn"><a href="#"><b>Acceuil</b></a></li>
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Evenement</b></a></li>
                <li class=" bounce animated2 zoomIn"><a
                            href="{{url('/events/list/categorie',[$sous_menu_event->menus->id])}}"><b>{{ucfirst(strtolower($sous_menu_event->menus->name))}}</b></a>
                </li>
                <li class=" bounce animated2 zoomIn dernier"><a href="#"><b>{{ucfirst($sous_menu_event->name)}}</b></a>
                </li>
            </ul>
        </div>
    </section>

    <section id="categorie-concert">
        <div class="container">
            @if($sous_menu_event)
                <div class="categorie-item">
                    <h2 class="couleur_mot">{{ucfirst($sous_menu_event->name)}}</h2>
                    <div class="row">
                        @if($events->count() > 0)
                            @foreach($events as $event)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <a href="{{url('events/show',[$event->id])}}">
                                            <div class="mg-image">
                                                <img src="{{ url('img/'.$event->image.'') }}">
                                            </div>
                                        </a>
                                        <div class="caption taille">
                                            <a href="{{url('events/show',[$event->id])}}">
                                                <h3>
                                                    <a href="{{url('events/show',[$event->id])}}">{{$event->title}}</a>
                                                </h3>
                                                <a href="#"><p
                                                            style="text-align: justify">{{ str_limit(ucfirst($event->additional_note), $limit = 140, $end = '...') }}</p>
                                                </a><br/>
                                                <div class="row cbg">
                                                    <div class="col-md-3 col-xs-3">
                                                        <div class="calendar">
                                                            <h1 class="month">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('M')}}</h1>
                                                            <label class="jour">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('D')}}</label>
                                                            <p class="day">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d')}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 col-xs-9 ">
                                                        <a href="#">
                                                            <div class="prixfx"><i class="fa fa-tag prices"></i>A
                                                                partir de <b
                                                                        class="prx">6000</b> AR
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="price"><i
                                                                        class="glyphicon glyphicon-time time"></i>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                                            </div>
                                                        </a>
                                                        <a href="#">
                                                            <div class="date"><i
                                                                        class="glyphicon glyphicon-map-marker position"></i>{{ $event->localisation_nom }} {{ $event->localisation_adresse }}
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="bg-custom">
                                <h2 class="text-center"><strong>Pas d'évènement ajoutés récements</strong></h2>
                                <p class="text-center"><strong>Inscrivez-vous dès maintenant, pour ne pas rater
                                        les prochaines
                                        Evènements</strong></p>
                                <div class="sinscrire">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="infopers">
                                                <h1 class="inscriptioin"><strong>S'inscrire</strong></h1>
                                                <label><strong>Une mise à jour mensuel des évènements à
                                                        Madagascar</strong></label>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
                                                    <div class="row">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <form>
                                                                <div class="form-group">
                                                                    <input type="email"
                                                                           class="form-control email-subscribe placehold"
                                                                           id="input-mail"
                                                                           aria-describedby="emailHelp"
                                                                           placeholder="| Enter l'adresse E-mail">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10 col-md-offset-1">
                                                            <button type="button"
                                                                    class="btn btn-sinscrire btn-lg btn-block">
                                                                S'inscrire
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="couvert">
                                <div class="replik">
                                    <ul>
                                        <li><a href="#"><img src="{{url('img/items1.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Concert</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items2.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Kabaret</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items3.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Sport</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items4.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Soiré</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items5.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Danse</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items6.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Cinema</a></strong></p></li>
                                        <li><a href="#"><img src="{{url('img/items7.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Festivals</a></strong></p>
                                        </li>
                                        <li><a href="#"><img src="{{url('img/items8.png')}}"></a>
                                            <p class="ctgori"><strong><a href="#">Dj</a></strong></p></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection