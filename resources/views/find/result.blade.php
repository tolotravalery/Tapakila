@extends("template")
@section('title')
    <title>Le Guichet | {{$queries}}</title>
@endsection
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
                        <a href="{{url('/event/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst(strtolower($sousmenu->name))}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <br/>
    <section>
        @if($events->count() > 0)

            <div class="container custom-container">
                <div class="search-bg">
                    <h2 class="text-recherhe">Filtrer votre recherche</h2>
                    <div class="row mi_recherche">
                        <div class="col-lg-8 col-lg-offset-2">
                            <form class="form-horizontal" action="{{url('/')}}/find/filtered" method="get">
                                <div class="form-group">
                                    <div class="row row_recherche">
                                        <div class="col-lg-4 mot_recherche">
                                            <label for="usr">Mot-clé</label>
                                        </div>
                                        <div class="col-lg-6  col-xs-10-offset-1">
                                            <input type="text" name="query" class="form-control" value="{{$queries}}">
                                        </div>
                                        <div class="col-lg-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row row_recherche">
                                    <div class="col-lg-4 mot_recherche">
                                        <label for="usr">Type d'événément</label>
                                    </div>
                                    {{--<div class="col-lg-8 col_recherche">--}}
                                        {{--<div class="row select_recherche">--}}
                                            {{--<div class="col-lg-4 col-xs-6">--}}
                                                {{--<label class="checkbox-inline">--}}
                                                    {{--<input type="checkbox" value="">Passé</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-lg-4 col-xs-6">--}}
                                                {{--<label class="checkbox-inline">--}}
                                                    {{--<input type="checkbox" value="">Actuel</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-lg-4">--}}
                                                {{--<label class="checkbox-inline">--}}
                                                    {{--<input type="checkbox" value="">Prochain</label>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                </div>
                                <div class="row_recherche">
                                    <div class="row">
                                        <div class="col-lg-4 mot_recherche">
                                            <label for="usr">Cochez la ou le catégories</label>
                                        </div>
                                        <div class="col-lg-8 col_recherche">
                                            <div class="row select_recherche">
                                                @foreach($sousmenus as $sousmenu)
                                                    <div class="col-lg-4 col-xs-6">
                                                        <label class="checkbox-inline">
                                                            <input type="checkbox" name="categorie[]"
                                                                   value="{{$sousmenu->id}}">{{$sousmenu->name}}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row_recherche">
                                    <div class="col-lg-4 mot_recherche">
                                    </div>
                                    <div class="col-lg-8 col_recherche">
                                        <div class="row">
                                            <div class="col-lg-6 col_bout">
                                                <button type="submit"
                                                        class=" btn btn-success btn-search">
                                                    Recherche
                                                </button>
                                            </div>
                                            <div class="col-lg-6">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container custom-container">
                <h3>Résultats de votre Recherche : " {{$queries}} "</h3>
                <h3> {{$events->count()}} Evénements trouvés</h3>
            </div>
        @endif
        <section id="categorie-concert">
            <div class="container custom-container">
                @if($events->count() > 0)
                    @php $count_id = 0 @endphp
                    @foreach($events as $event)
                        @php
                            $string_url_detail = $event->sous_menus->name ."/".date('Y-m-d',strtotime($event->date_debut_envent)) . "_".  str_replace(' ','-',$event->title)."_".$event->id;
                        @endphp
                        <div class="categorie-item">
                            <h2 class="couleur_mot">{{ucfirst(strtolower($event->sous_menus->name))}}</h2>
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail"
                                         onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                         onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                        <a href="{{url($string_url_detail)}}">
                                            <div class="mg-image">
                                                <img src="{{ url('/public/img/'.$event->image.'') }}">
                                            </div>
                                            <div class="caption taille">
                                                <a href="{{url($string_url_detail)}}">
                                                    <div class="limitelengh">
                                                        <h3>
                                                            <a href="{{url($string_url_detail)}}"
                                                               id="title{{$count_id}}">
                                                                {!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',ucfirst(strtolower(str_limit($event->title,$limit=40, $end = ' ...')))) !!}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div class="limite">
                                                        <a href="{{url($string_url_detail)}}">
                                                            <?php  if ($event->additional_note == null) {
                                                                echo "<br/>";
                                                            }?>
                                                            <p style="text-align: justify">{!! str_replace($queries,'<span style="background-color: yellow;">'.$queries.'</span>',str_limit(ucfirst($event->additional_note),$limit = 140, $end = ' ...')) !!}</p>
                                                        </a><br/>
                                                    </div>
                                                    <div class="row cbg">
                                                        <div class="col-md-3 col-xs-3">
                                                            <a href="{{url($string_url_detail)}}">
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
                                                                @if($event->tickets()->where('date_debut_vente','<=',date('Y-m-d H:i:s'))->where('date_fin_vente','>',date('Y-m-d H:i:s'))->count() > 0)
                                                                    <i class="fa fa-tag prices"></i>A
                                                                    partir de <b
                                                                            class="prx">{{ (int) $event->tickets()->orderBy('price','asc')->take(1)->get()[0]->price  }}</b>
                                                                    AR
                                                                @else
                                                                    <i class="fa fa-tag prices"></i>Non
                                                                    disponible
                                                                @endif
                                                            </div>
                                                            <a href="{{url($string_url_detail)}}">
                                                                <div class="price"><i
                                                                            class="glyphicon glyphicon-time time"></i>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                                                </div>
                                                            </a>
                                                            <a href="{{url($string_url_detail)}}">
                                                                <div class="date"><i
                                                                            class="glyphicon glyphicon-map-marker position"></i>{{ str_limit($event->localisation_adresse, $limit = 15, $end = ' ...')}}
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div style="text-align:center;">
                                                            <a  style="color:white !important;" href="{{url($string_url_detail)}}" class="btn btn-danger btn_reset">Réserver</a>
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