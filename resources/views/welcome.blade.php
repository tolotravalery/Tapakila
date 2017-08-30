@extends('template')



@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container">
            <ul class="clearfix">
                <li><a href="#">TOUS</a></li>
                @foreach($menus as $menu)
                    <li><a href="#">{{$menu->name}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container">
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li><a href="#">{{$sousmenu->name}}</a></li>
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
                    <div class="item">
                        <img src="{{ url('/') }}/img/mada2.png" style="width:100%;">
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

            <div class="categorie-item">
                <h2>huhu</h2>
                <div class="row">

                    @foreach($eventspopulaire as $event)
                        @if($event->publie == true )
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <div class="mg-image">
                                        <img src="{{ url('img/'.$event->image.'') }}">
                                    </div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{url('events/show',[$event->id])}}">{{$event->title}}</a>
                                        </h3>
                                        <p><a href="#">{{$event->additional_note}}</a></p><br/>
                                        <div>
                                            <a href="indexnonvide.html">
                                                <div class="price"><i class="glyphicon glyphicon-time time"></i>
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
                    {{--<div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="mg-image">
                                <img src="img/tence.jpg" alt="tence_mena">
                            </div>
                            <div class="caption">
                                <h3><a href="#">Lorem ipsum dolor sit amet, vitae enim ultrices</a></h3>
                                <p><a href="#">Pellentesque amet vitae suscipit metus, massa at donec ultrices
                                        mauris at
                                        leo, in aenean, aliquet</a></p><br/>
                                <div>
                                    <a href="indexnonvide.html">
                                        <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1,
                                            100rmb
                                        </div>
                                        <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Andreas
                                            Ottensamer has captured audiences
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="mg-image">
                                <img src="img/dubuald3.jpg">
                            </div>
                            <div class="caption">
                                <h3><a href="#">Lorem ipsum dolor sit amet, vitae enim ultrices</a></h3>
                                <p><a href="#">Pellentesque amet vitae suscipit metus, massa at donec ultrices
                                        mauris at
                                        leo, in aenean, aliquet</a></p><br/>
                                <div>
                                    <a href="indexnonvide.html">
                                        <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1,
                                            100rmb
                                        </div>
                                        <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Andreas
                                            Ottensamer has captured audiences
                                        </div>
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>--}}
                </div>
            </div>

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
    <section id="sectionpartenaire">
        <div class="container">
            <h2 class="text-center">Nos partenaires</h2>
            <div class="row">
                <div class="col-md-3">
                    <a href="#"><img class="partenaire" src="{{ url('/') }}/img/partenaire1.jpg"></a>
                </div>
                <div class="col-md-3">
                    <a href="#"><img class="partenaire" src="{{ url('/') }}/img/partenaire2.jpg"></a>
                </div>
                <div class="col-md-3">
                    <a href="#"><img class="partenaire" src="{{ url('/') }}/img/telma-logo.jpeg"></a>
                </div>
                <div class="col-md-3">
                    <a href="#"><img class="partenaire" src="{{ url('/') }}/img/partenaire4.jpeg"></a>
                </div>
            </div>

        </div>
    </section>
@endsection



