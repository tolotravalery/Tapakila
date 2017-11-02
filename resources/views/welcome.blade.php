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

    @if($slides->count()>0)

        <section id="carousel-slide" class="hidden-xs">
            <div class="container custom-container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        $count_image = count($slides);
                        ?>
                        @php $ci = 0; @endphp
                        @for($ci=0;$ci<$count_image;$ci++)
                            @if($ci == 0)
                                <li data-target="#myCarousel" data-slide-to="{{$ci}}" class="active"></li>
                            @else
                                <li data-target="#myCarousel" data-slide-to="{{$ci}}"></li>
                            @endif
                        @endfor
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="{{ url('/') }}/public/slide/{{$slides[0]->image}}" style="width:100%;">
                        </div>
                        @for($i=1;$i<$count_image;$i++)
                            <div class="item">
                                <img src="{{ url('/') }}/public/slide/{{$slides[$i]->image}}" style="width:100%;">
                            </div>
                        @endfor

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
    @endif
    <section id="categorie-concert">
        <div class="container custom-container">
            @php $count_id = 0 @endphp
            @foreach($sousmenus as $sm)
                @php($evenement = $sm->events()->where('publie','=','1')->where('date_debut_envent','>',date('Y-m-d H:i:s')))
                @if($evenement->count() > 0)
                    <div class="categorie-item">
                        <h2 class="couleur_mot">{{ucfirst(strtolower($sm->name))}}</h2>
                        <div class="row">
                            @php
                                $objects= null;
                                if($evenement->count() > 3 )
                                    $objects = $evenement->take(3)->get();
                                else
                                    $objects = $evenement->get();
                            @endphp
                            @foreach($objects as $event)
                                @php
                                    $ev = $event->publie == true && \Carbon\Carbon::parse($event->date_debut_envent)->isFuture();
                                @endphp
                                @if($ev)
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail"
                                             onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                                             onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                                            <a href="{{url('event/show',[$event->id])}}">
                                                <div class="mg-image">
                                                    <img src="{{ url('public/img/'.$event->image.'') }}">
                                                </div>
                                                <div class="caption taille">
                                                    <a href="{{url('event/show',[$event->id])}}">
                                                        <div class="limitelengh">
                                                            <h3>
                                                                <a href="{{url('event/show',[$event->id])}}"
                                                                   id="title{{$count_id}}">{{str_limit($event->title,$limit=40, $end = ' ...')}}</a>
                                                            </h3>
                                                        </div>
                                                        <div class="limite">
                                                            <a href="{{url('event/show',[$event->id])}}">
                                                                <?php  if ($event->additional_note == null) {
                                                                    echo "<br/>";
                                                                }?>

                                                                <p style="text-align: justify">{{ str_limit(ucfirst($event->additional_note), $limit = 100, $end = ' ...') }}</p>
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
                                                                    @if($event->tickets->where('date_debut_vente','<',date('Y-m-d H:i:s'))->where('date_fin_vente','>',date('Y-m-d H:i:s'))->count() > 0)
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
                                                                                class="glyphicon glyphicon-map-marker position"></i>{{ str_limit($event->localisation_adresse, $limit = 15, $end = ' ...')}}
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                @if($evenement->count() >= 3)
                    <div class="row">
                        <div class="col-lg-12 pull-right">
                            <div class="pull-right">
                                <a href="{{url('/event/list/categorie/'.$sm->name.'',[$sm->id])}}"
                                   style="color: #d70506;">
                                    <i>Plus d'évènement</i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br/>
                    @php $count_id++ @endphp
                @endif
            @endforeach
        </div>
    </section>

    <!-- sectin s'inscrire start -->
    <section>
        <div class="container custom-container ">
            <div class="sinscrire">
                <div class="row">
                    <div class="col-lg-9 col-lg-offset-1">
                        <div class="row">
                            <div class="col-lg-7 col16_index">
                                <div class="infopers">
                                    <h3 class="inscriptioin">S'inscrire</h3>
                                    <label><strong>Une mise à jour mensuel des évènements à Madagascar</strong></label>
                                </div>
                            </div>
                            <div class="col-lg-5 col6_index">
                                <div class="row">
                                    <div class="col-lg-12 col-xs-10 col-lg-offset-0 col-xs-offset-1">
                                        <div class="row">

                                            <form>
                                                <div class="form-group">
                                                    <input type="email" class="form-control email-subscribe placehold"
                                                           id="input-mail" aria-describedby="emailHelp"
                                                           placeholder="| Enter l'adresse E-mail">
                                                </div>
                                            </form>

                                        </div>
                                        <div class="row">

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
            </div>
        </div>
    </section>
    <!-- sectin s'inscrire end -->
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