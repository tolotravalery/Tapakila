@extends('template')
@section('title')
    <title>Le Guichet | Evénement {{$menu_event->name}}</title>
@endsection
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">ACCUEIL</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories &nbsp <label class="test">&darr;</label></strong></a>
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
    <section class="clearfix">
        <div class="container custom-container">
            <ul class="herb">
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Acceuil</b></a></li>
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Evenement</b></a></li>
                <li class=" bounce animated2 zoomIn dernier"><a
                            href=""><b>{{ucfirst(strtolower($menu_event->name))}}</b></a>
                </li>
            </ul>
        </div>
    </section>
    <section id="categorie-concert">
        <div class="container custom-container">
            @if($menu_event)
                <h2 class="couleur_mot">{{strtoupper($menu_event->name)}}</h2>
                @if($menu_event->sousmenus()->count() == 0)
                    <div class="bg-custom">
                        <h2 class="text-center"><strong>Pas d'évènement ajoutés récements</strong></h2>
                        @if (Auth::guest())
                            <p class="text-center"><strong>Inscrivez-vous dès maintenant, pour ne pas rater les
                                    prochaines
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
                                                        <a type="button" class="btn btn-sinscrire btn-lg btn-block"
                                                           href="{{url('')}}/register">
                                                            S'inscrire
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <hr class="couvert">
                        <div class="replik">
                            <ul>
                                <li><a href="#"><img src="{{url('/public/img/items1.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Concert</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items2.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Kabaret</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items3.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Sport</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items4.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Soiré</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items5.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Danse</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items6.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Cinema</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items7.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Festivals</a></strong></p></li>
                                <li><a href="#"><img src="{{url('/public/img/items8.png')}}"></a>
                                    <p class="ctgori"><strong><a href="#">Dj</a></strong></p></li>
                            </ul>
                        </div>
                    </div>
                @else
                    {{--{{dd($menu_event->sousmenus()->orderBy('name','asc')->get())}}--}}
                    @php $count_event = 0; @endphp
                    @php $count_id = 0 @endphp
                    @foreach($menu_event->sousmenus()->orderBy('name','asc')->get() as $sousMenu)
                        @php($evenement = $sousMenu->events()->where('publie','=','1')->where('date_debut_envent','>',date('Y-m-d H:i:s')))
                        @if($evenement->count() > 0)
                            @php $count_event++; @endphp
                            <div class="categorie-item">
                                <h2 class="couleur_mot">{{ucfirst(strtolower($sousMenu->name))}}</h2>
                                <div class="row">
                                    @php
                                        $objects= null;
                                        if($evenement->count() > 3 )
                                            $objects = $evenement->get()->random(3);
                                        else
                                            $objects = $evenement->get();
                                    @endphp
                                    @php($c=0)
                                    @foreach($objects as $event)
                                        @php
                                            $string_url_detail = $event->sous_menus->name ."/".date('Y-m-d',strtotime($event->date_debut_envent)) . "_".  str_replace(' ','-',$event->title)."_".$event->id;
                                            $ev = $event->publie == true && \Carbon\Carbon::parse($event->date_debut_envent)->isFuture();
                                        @endphp
                                        @if($ev)
                                            <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail"
                                                     onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                                     onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                                    <a href="{{url($string_url_detail)}}">
                                                        <div class="mg-image">
                                                            <img src="{{ url('public/img/'.$event->image.'') }}">
                                                        </div>
                                                    </a>
                                                    <div class="caption taille">
                                                        <a href="{{url($string_url_detail)}}">
                                                            <div class="limitelengh">
                                                                <h3>
                                                                    <a href="{{url($string_url_detail)}}"
                                                                       id="title{{$count_id}}">{{ucfirst(strtolower(str_limit($event->title,$limit=40, $end = ' ...')))}}</a>
                                                                </h3>
                                                            </div>
                                                            <div class="limite">
                                                                <a href="{{url($string_url_detail)}}">
                                                                    <?php  if ($event->additional_note == null) {
                                                                        echo "<br/>";
                                                                    }?>
                                                                    <p style="text-align: justify">{{ str_limit(ucfirst($event->additional_note), $limit = 100, $end = ' ...') }}</p>
                                                                </a><br/>
                                                            </div>
                                                            <div class="row cbg">
                                                                <div class="col-md-3 col-xs-3">
                                                                    <div class="calendar">
                                                                        <h1 class="month"
                                                                            id="month{{$count_id}}">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('M')}}</h1>
                                                                        <label class="jour">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('D')}}</label>
                                                                        <p class="day">{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d')}}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-9 col-xs-9 ">
                                                                    {{--<a>--}}
                                                                    <div class="prixfx">
                                                                        @if($event->tickets()->where('date_debut_vente','<=',date('Y-m-d'))->where('date_fin_vente','>=',date('Y-m-d'))->count() > 0)
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
                                                                <a style="color:white !important;"
                                                                   href="{{url($string_url_detail)}}"
                                                                   class="btn btn-danger btn_reset">Réserver</a>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php($c++)
                                            @if($c==$objects->count())
                                                <div class="col-sm-6 col-md-4">
                                                    <a href="{{url('/')}}/organisateur/event" class="thumbnail">
                                                        <img class="hut"
                                                             src="{{ url('') }}/public/img/create_events.png">
                                                    </a>
                                                </div>
                                            @endif
                                            @php $count_id++ @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        @if($evenement->count() >= 3)
                            <div class="row">
                                <div class="col-lg-12 pull-right">
                                    <div class="pull-right">
                                        <a href="{{url('/event/list/categorie/'.$sousMenu->name.'',[$sousMenu->id])}}"
                                           style="color: #5cb85c;">
                                            <i><b>Plus d'évènement >> </b></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            @php $count_id++ @endphp
                        @endif
                    @endforeach
                    @if($count_event == 0)
                        <div class="bg-custom">
                            <h2 class="text-center"><strong>Pas d'évènement ajoutés récements</strong></h2>
                            @if (Auth::guest())
                                <p class="text-center"><strong>Inscrivez-vous dès maintenant, pour ne pas rater les
                                        prochaines
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
                                                            <a type="button" class="btn btn-sinscrire btn-lg btn-block"
                                                               href="{{url('')}}/register">
                                                                S'inscrire
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <hr class="couvert">
                            <div class="replik">
                                <ul>
                                    <li><a href="#"><img src="{{url('/public/img/items1.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Concert</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items2.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Kabaret</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items3.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Sport</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items4.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Soiré</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items5.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Danse</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items6.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Cinema</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items7.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Festivals</a></strong></p></li>
                                    <li><a href="#"><img src="{{url('/public/img/items8.png')}}"></a>
                                        <p class="ctgori"><strong><a href="#">Dj</a></strong></p></li>
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
            @endif
        </div>
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