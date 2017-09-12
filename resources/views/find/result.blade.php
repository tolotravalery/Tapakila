{{--{{ dd($events) }}--}}
@extends("template")
@section("content")
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
    <section>
        @if($events->count() > 0)
            <div class="container">
                <div class="search-bg">
                    <h1 class="text-center">Filtrer votre recherche</h1>
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mot clé</label>
                            <div class="col-md-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Catégories</label>
                            <div class="col-md-7">
                                <select class="form-control" placeholder="Country">
                                    <option value="">Tous</option>
                                    <option value="">Concert</option>
                                    <option value="">Cabaret</option>
                                    <option value="">Sport</option>
                                    <option value="">Soreés</option>
                                    <option value="">Danse</option>
                                    <option value="">Festival</option>
                                    <option value="">Cinema</option>
                                    <option value="">Jeux</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"> Catégories spécifiques</label>
                            <div class="col-md-7">
                                <select class="form-control" placeholder="Province">
                                    <option value="">Tous</option>
                                    <option value="">Karaoké</option>
                                    <option value="">Sport</option>
                                    <option value="">Soreés</option>
                                    <option value="">Danse</option>
                                    <option value="">Festival</option>
                                    <option value="">Cinema</option>
                                    <option value="">Jeux</option>
                                    <option value="">projection</option>
                                    <option value="">Exposition</option>
                                    <option value="">Loisir</option>
                                    <option value="">Zumba</option>
                                    <option value="">Thb tour</option>
                                    <option value="">oktoberfest</option>
                                    <option value="">foot-ball</option>
                                    <option value="">Basket-ball</option>
                                    <option value="">Rugby</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class=" col-md-3 col-md-offset-5 btn btn-success btn-search">Recherche
                        </button>
                    </form>
                </div>
                <h2>Résultats de votre Recherche : " {{$queries}} "</h2>
                <h3> {{$events->count()}} Evénements trouvés</h3>
            </div>
        @endif
        <section id="categorie-concert">
            <div class="container">
                @if($events->count() > 0)
                    @foreach($events as $event)
                        <div class="categorie-item">
                            <h2 class="couleur_mot">{{$event->sous_menus->name}}</h2>
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        {{--@php--}}
                                        {{--$replace = array(''.$queries.'' => '<span style="background-color: yellow;">'.$queries.'</span>');--}}
                                        {{--@endphp--}}
                                        <a href="{{url('events/show',[$event->id])}}">
                                            <div class="mg-image">
                                                <img src="{{ url('img/'.$event->image.'') }}">
                                            </div>
                                            <div class="caption taille">
                                                <h3>
                                                    <a href="{{url('events/show',[$event->id])}}">{!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',$event->title) !!}</a>
                                                </h3>
                                                <p style="text-align: justify;">
                                                    {!! str_limit(ucfirst(str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',$event->additional_note)), $limit = 140, $end = '...') !!}
                                                </p>
                                                <div>
                                                    <div class="price"><i
                                                                class="glyphicon glyphicon-time time"></i>
                                                        {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                                    </div>
                                                    <div class="date"><i
                                                                class="glyphicon glyphicon-map-marker position"></i>
                                                        {!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',$event->localisation_nom) !!}
                                                        {!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',$event->localisation_adresse) !!}
                                                        {{--{{ $event->localisation_nom }} {{ $event->localisation_adresse }}--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div id="custom-white">
                        <h1 class="couleur_mot">Resultats de votre recherche</h1>
                        <div class="panier"></div>
                        <div class="alert alert-success">
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en
                                page avant
                                impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années
                                1500 </p>
                        </div>
                        <div class="row panier_3">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="thumbnail panier1">
                                    <img src="{{url('/')}}/img/Search-icon.png" class="panier0">
                                    <div class="caption">
                                        <h3 class="mot_h2">Aucun resultat trouvé</h3>
                                        <h5 class="mot_h2"><a href="{{url('/')}}" class="mot_ha">Retour à l'accueil</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="couvert">
                    </div>

                    <div class="replik">
                        <ul>
                            <li><a href="#"><img src="{{url('/')}}/img/items1.png"></a>
                                <p class="ctgori"><strong><a href="#">Concert</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items2.png"></a>
                                <p class="ctgori"><strong><a href="#">Kabaret</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items3.png"></a>
                                <p class="ctgori"><strong><a href="#">Sport</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items4.png"></a>
                                <p class="ctgori"><strong><a href="#">Soiré</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items5.png"></a>
                                <p class="ctgori"><strong><a href="#">Danse</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items6.png"></a>
                                <p class="ctgori"><strong><a href="#">Cinema</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items7.png"></a>
                                <p class="ctgori"><strong><a href="#">Festivals</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/img/items8.png"></a>
                                <p class="ctgori"><strong><a href="#">Dj</a></strong></p></li>
                        </ul>
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection