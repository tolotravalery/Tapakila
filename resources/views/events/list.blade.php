@extends('template')
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
    <br/>
    <section class="clearfix">
        <div class="container custom-container">
            <ul class="herb">
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Acceuil</b></a></li>
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Evenement</b></a></li>
                <li class=" bounce animated2 zoomIn dernier"><a href=""><b>{{ucfirst(strtolower($menu_event->name))}}</b></a>
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
                        <p class="text-center"><strong>Inscrivez-vous dès maintenant, pour ne pas rater les prochaines
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
                                                                   id="input-mail" aria-describedby="emailHelp"
                                                                   placeholder="| Enter l'adresse E-mail">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-10 col-md-offset-1">
                                                    <button type="button" class="btn btn-sinscrire btn-lg btn-block">
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
                        @if($sousMenu->events()->where('publie','=','1')->where('date_debut_envent','>',date('Y-m-d H:i:s'))->count() > 0)
                            @php $count_event++; @endphp
                            <div class="categorie-item">
                                <h2 class="couleur_mot">{{ucfirst(strtolower($sousMenu->name))}}</h2>
                                <div class="row">
                                    @foreach($sousMenu->events as $event)
                                        @if($event->publie == true && \Carbon\Carbon::parse($event->date_debut_envent)->isFuture() )
                                            <div class="col-sm-6 col-md-4">
                                                <div class="thumbnail"
                                                     onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                                     onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                                    <a href="{{url('event/show',[$event->id])}}">
                                                        <div class="mg-image">
                                                            <img src="{{ url('public/img/'.$event->image.'') }}">
                                                        </div>
                                                    </a>
                                                    <div class="caption taille">
                                                        <a href="{{url('event/show',[$event->id])}}">
                                                            <div class="limitelengh">
                                                                <h3>
                                                                    <a href="{{url('event/show',[$event->id])}}"
                                                                       id="title{{$count_id}}">{{str_limit($event->title,$limit=40, $end = ' ...')}}</a>
                                                                </h3>
                                                            </div>
                                                            <div class="limite">
                                                                <a href="{{url('event/show',[$event->id])}}"><p
                                                                            style="text-align: justify">{{ str_limit(ucfirst($event->additional_note), $limit = 100, $end = ' ...') }}</p>
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
                                                                    {{--</a>--}}

                                                                    <a href="{{url('event/show',[$event->id])}}">
                                                                        <div class="price"><i
                                                                                    class="glyphicon glyphicon-time time"></i>{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                                                        </div>
                                                                    </a>
                                                                    <a href="{{url('event/show',[$event->id])}}">
                                                                        <div class="date"><i
                                                                                    class="glyphicon glyphicon-map-marker position"></i>{{ $event->localisation_adresse }}
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @php $count_id++ @endphp
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                    @if($count_event == 0)
                        <div class="bg-custom">
                            <h2 class="text-center"><strong>Pas d'évènement ajoutés récements</strong></h2>
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
                                                        <form>
                                                            <div class="form-group">
                                                                <input type="email"
                                                                       class="form-control email-subscribe placehold"
                                                                       id="input-mail" aria-describedby="emailHelp"
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