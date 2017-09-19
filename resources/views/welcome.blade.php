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

    <section id="carousel-slide">
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{ url('/') }}/img/stephani.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="{{ url('/') }}/img/prod-trusty.jpg" style="width:100%;">
                    </div>

                    <div class="item">
                        <img src="{{ url('/') }}/img/mahaleo.jpg" style="width:100%;">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

    <section id="categorie-concert">
        <div class="container">
            @php $count_id = 0 @endphp
            @foreach($sousmenus as $sm)
                @if($sm->events()->where('publie','=','1')->where('date_debut_envent','>',date('Y-m-d H:i:s'))->count() > 0)
                    <div class="categorie-item">
                        <h2 class="couleur_mot">{{$sm->name}}</h2>
                        <div class="row">
                            @foreach($sm->events as $event)
                                @if($event->publie == true && \Carbon\Carbon::parse($event->date_debut_envent)->isFuture() )
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail"
                                             onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                             onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                            <a href="{{url('events/show',[$event->id])}}">
                                                <div class="mg-image">
                                                    <img src="{{ url('img/'.$event->image.'') }}">
                                                </div>
                                                <div class="caption taille">
                                                    <a href="{{url('events/show',[$event->id])}}">
                                                        <h3>
                                                            <a href="{{url('events/show',[$event->id])}}"
                                                               id="title{{$count_id}}">{{$event->title}}</a>
                                                        </h3>
                                                        <a href="#"><p
                                                                    style="text-align: justify">{{ str_limit(ucfirst($event->additional_note), $limit = 140, $end = ' ...') }}</p>
                                                        </a><br/>
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
                                                                <a>
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
                                                {{--<div class="caption taille">--}}
                                                {{--<h3>--}}
                                                {{--<a href="{{url('events/show',[$event->id])}}">{{$event->title}}</a>--}}
                                                {{--</h3>--}}
                                                {{--<p style="text-align: justify;">--}}
                                                {{--{{ str_limit(ucfirst($event->additional_note), $limit = 140, $end = '...') }}--}}
                                                {{--</p>--}}
                                                {{--<div>--}}
                                                {{--<div class="price"><i--}}
                                                {{--class="glyphicon glyphicon-time time"></i>--}}
                                                {{--{{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}--}}
                                                {{--</div>--}}
                                                {{--<div class="date"><i--}}
                                                {{--class="glyphicon glyphicon-map-marker position"></i> {{ $event->localisation_nom }} {{ $event->localisation_adresse }}--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                                {{--</div>--}}
                                            </a>
                                        </div>
                                    </div>
                                    @php $count_id++ @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
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
@section('specificScript')
    <script type="text/javascript">
        function mouseover(element,title) {
            $('#' + title + '').css('color', '#d70506');
            $('#' + element + '').css('background', '#d70506');
        }
        function mouseleave(element,title) {
            $('#' + title + '').css('color', '#000');
            $('#' + element + '').css('background', '#5cb85c');
        }
    </script>
@endsection