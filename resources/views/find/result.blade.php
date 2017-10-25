@extends("template")
@section("content")
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
                        <a href="{{url('/event/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <br/>
    <section>
        @if($events->count() > 0)

            <div class="container custom-container">
                <div class="search-bg hidden-xs">
                    <h1 class="text-center">Filtrer votre recherche</h1>
                    <form class="form-horizontal" action="{{url('/')}}/find/filtered" method="get">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Mot clé</label>
                            <div class="col-md-7">
                                <input type="text" name="query" class="form-control" value="{{$queries}}">
                            </div>
                        </div>
                        <div class="form-group">
                            {{--<label class="col-md-2 control-label">Catégorie</label>--}}
                            <div class="col-lg-10 col-lg-offset-3">
                                {{--<div class="thumbnail">--}}
                                <div class="table-responsive">
                                    <table>
                                        @php $i = 0; @endphp
                                        @foreach($sousmenus as $sousmenu)
                                            @if($i % 6 == 0)
                                                <tr>
                                                </tr>
                                            @endif
                                            <td><input type="checkbox" name="categorie[]"
                                                       value="{{$sousmenu->id}}"/>{{$sousmenu->name}}</td>
                                            @php $i++; @endphp
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class=" col-md-3 col-md-offset-5 btn btn-success btn-search">Recherche
                            </button>
                        </div>
                    </form>
                </div>
                <h2>Résultats de votre Recherche : " {{$queries}} "</h2>
                <h3> {{$events->count()}} Evénements trouvés</h3>
            </div>
        @endif
        <section id="categorie-concert">
            <div class="container custom-container">
                @if($events->count() > 0)
                    @php $count_id = 0 @endphp
                    @foreach($events as $event)
                        <div class="categorie-item">
                            <h2 class="couleur_mot">{{$event->sous_menus->name}}</h2>
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail"
                                         onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                         onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                        <a href="{{url('event/show',[$event->id])}}">
                                            <div class="mg-image">
                                                <img src="{{ url('/public/img/'.$event->image.'') }}">
                                            </div>
                                            <div class="caption taille">
                                                <a href="{{url('event/show',[$event->id])}}">
                                                    <div class="limitelengh">
                                                        <h3>
                                                            <a href="{{url('event/show',[$event->id])}}"
                                                               id="title{{$count_id}}">
                                                                {!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',str_limit($event->title,$limit = 40, $end = ' ...')) !!}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="limite">
                                                        <a href="{{url('event/show',[$event->id])}}"><p
                                                                    style="text-align: justify">{!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',str_limit(ucfirst($event->additional_note),$limit = 140, $end = ' ...')) !!}</p>
                                                        </a><br/>
                                                    </div>
                                                    <div class="row cbg">
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="{{url('event/show',[$event->id])}}">
                                                                <div class="calendar">
                                                                    <h1 class="month"
                                                                        id="month{{$count_id}}">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('M')}}</h1>
                                                                    <label class="jour">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('D')}}</label>
                                                                    <p class="day">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d')}}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-9 col-xs-9 ">
                                                            <div class="prixfx">
                                                                @if($event->tickets()->count() > 0)
                                                                    <i class="fa fa-tag prices"></i>A
                                                                    partir de <b
                                                                            class="prx">{{ (int) $event->tickets()->orderBy('price','asc')->take(1)->get()[0]->price  }}</b>
                                                                    AR
                                                                @else
                                                                    <i class="fa fa-tag prices"></i>Non
                                                                    disponible
                                                                @endif
                                                            </div>
                                                            <a href="{{url('event/show',[$event->id])}}">
                                                                <div class="price"><i
                                                                            class="glyphicon glyphicon-time time"></i>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                                                </div>
                                                            </a>
                                                            <a href="{{url('event/show',[$event->id])}}">
                                                                <div class="date"><i
                                                                            class="glyphicon glyphicon-map-marker position"></i>
                                                                    {!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',$event->localisation_adresse) !!}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $count_id++ @endphp
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
                                    <img src="{{url('/')}}/public/img/Search-icon.png" class="panier0">
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
                            <li><a href="#"><img src="{{url('/')}}/public/img/items1.png"></a>
                                <p class="ctgori"><strong><a href="#">Concert</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items2.png"></a>
                                <p class="ctgori"><strong><a href="#">Kabaret</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items3.png"></a>
                                <p class="ctgori"><strong><a href="#">Sport</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items4.png"></a>
                                <p class="ctgori"><strong><a href="#">Soiré</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items5.png"></a>
                                <p class="ctgori"><strong><a href="#">Danse</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items6.png"></a>
                                <p class="ctgori"><strong><a href="#">Cinema</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items7.png"></a>
                                <p class="ctgori"><strong><a href="#">Festivals</a></strong></p></li>
                            <li><a href="#"><img src="{{url('/')}}/public/img/items8.png"></a>
                                <p class="ctgori"><strong><a href="#">Dj</a></strong></p></li>
                        </ul>
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection

@section('specificScript')
    <script type="text/javascript">
        function mouseover(element, title) {
            $('#' + title + '').css('color', '#d70506');
            $('#' + element + '').css('background', '#d70506');
        }
        function mouseleave(element, title) {
            $('#' + title + '').css('color', '#000');
            $('#' + element + '').css('background', '#5cb85c');
        }
    </script>
@endsection