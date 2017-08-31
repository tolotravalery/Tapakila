@extends('template')
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/events/list/categorie',[$menu->id])}}">{{$menu->name}}</a></li>
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
                        <a href="{{url('/events/list/categorie/sous_categorie',[$sousmenu->id])}}">{{$sousmenu->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section id="categorie-concert">
        <div class="container">
            @if($sous_menu_event)
                <div class="categorie-item">
                    <h2>{{$sous_menu_event->name}}</h2>
                    <div class="row">
                        @foreach($sous_menu_event->events as $event)
                            @if($event->publie == true && \Carbon\Carbon::parse($event->date_debut_envent)->isFuture() )
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <a href="{{url('events/show',[$event->id])}}">
                                            <div class="mg-image">
                                                <img src="{{ url('img/'.$event->image.'') }}">
                                            </div>
                                        </a>
                                        <div class="caption">
                                            <h3>
                                                <a href="{{url('events/show',[$event->id])}}">{{$event->title}}</a>
                                            </h3>
                                            <p><a href="{{url('events/show',[$event->id])}}">{{$event->additional_note}}</a></p><br/>
                                            <div>
                                                <a href="{{url('events/show',[$event->id])}}">
                                                    <div class="price"><i
                                                                class="glyphicon glyphicon-time time"></i>
                                                        {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                                    </div>
                                                    <div class="date"><i
                                                                class="glyphicon glyphicon-map-marker position"></i> {{ $event->localisation_nom }} {{ $event->localisation_adresse }}
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container ">
            <div class="sinscrire">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="infopers">
                            <h1 class="inscriptioin"><strong>S'inscrire</strong></h1>
                            <label><strong>Une mise à jour mensuel des évènements à Madagascar</strong></label>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-xs-10 col-md-offset-2 col-xs-offset-1">
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control email-subscribe placehold"
                                                       id="input-mail" aria-describedby="emailHelp"
                                                       placeholder="| Enter l'adresse E-mail">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="button" class="btn btn-sinscrire btn-lg btn-block">S'inscrire
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection