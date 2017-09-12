@extends('template')

@section('content')
    {{--<section id="sectioncategorie" class="clearfix">--}}
    {{--<div class="container">--}}
    {{--<ul class="clearfix">--}}
    {{--<li><a href="{{url('/')}}">TOUS</a></li>--}}
    {{--@foreach($menus as $menu)--}}
    {{--<li><a href="{{url('/events/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--<a href="#" class="menupull" id="pull"><strong>Catégories</strong></a>--}}
    {{--</div>--}}
    {{--</section>--}}

    {{--<section id="sectionevenement" role="navigation">--}}
    {{--<div class="container">--}}
    {{--<ul>--}}
    {{--@foreach($sousmenus as $sousmenu)--}}
    {{--<li>--}}
    {{--<a href="{{url('/events/list/categorie/sous_categorie',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>--}}
    {{--</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</section>--}}
    {{--<br>--}}
    {{--<section  class="clearfix">--}}
    {{--<div class="container">--}}
    {{--<ul id="breadcrumbs-one">--}}
    {{--<li><a href="">Acceuil</a></li>--}}
    {{--<li><a href="{{url('/')}}">Evenement</a></li>--}}
    {{--<li><a href="{{url('/events/list/categorie',[$event->sous_menus->menus->id])}}">{{strtoupper($event->sous_menus->menus->name)}}</a></li>--}}
    {{--<li><a href="{{url('/events/list/categorie/sous_categorie',[$event->sous_menus->id])}}">{{ucfirst($event->sous_menus->name)}}</a></li>--}}
    {{--<li><a href="">{{ ucfirst($event->title) }}</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--</section>--}}
    <div id="background-detail">

        <?php
            $img="";
        if($event->image_background == null){
            $img="back_defaut.jpg";
        }
        else{
            $img = $event->image_background;
        }
        ?>
            <img src="{{url('/')}}/img/{{$img}}"  style="width:100%;">
    </div>
    <div class="container">
        <div class="box1">
            <h2 class="text-center">Detail sur l'événement</h2>
            <div class="Pcenter">
                 <img class="imgdetails" src="{{url('/')}}/img/{{$img}}" style="width:100%;">
            </div>
            <div class="descriptionevent">
                <h3>Descritpion</h3>
                <div class="Pcenter">
                    <p class="text-left"> {{$event->additional_note}}</p>
                </div>
                <h3>Information complémentaire</h3>
                <div class="Pcenter">
                    <div class="infodes">
                        <ul>
                            <li><i class="fa fa-product-hunt" aria-hidden="true"></i><strong>Programme :</strong>
                                <small>&nbsp {{$event->additional_note}}</small>
                            </li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i><strong>Localisation</strong>
                                <small> &nbsp {{$event->localisation_nom}} ; {{$event->localisation_adresse}}</small>
                            </li>
                            <li><i class="fa fa-calendar-o" aria-hidden="true"></i><strong>Date :</strong>
                                <small>
                                    &nbsp {{\Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}</small>
                            </li>
                            <li><i class="fa fa-clock-o icos" aria-hidden="true"></i></i><strong>Heure :</strong>
                                <small> {{\Carbon\Carbon::parse($event->date_debut_envent)->format('h:i:s')}} </small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($event->tickets()->count() > 0)
                <div class="chosetickets">
                    <h3>Choisir tickets</h3>
                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <tbody>
                            @foreach($event->tickets as $ticket)
                                <tr>
                                    <td><strong>{{$ticket->type}}</strong>
                                        <p>Description tickets</p></td>
                                    <td><b>{{$ticket->price}} Ar</b></td>
                                    <td>
                                        <div class="row position">
                                            <div class="col-md-4 col-md-offset-1">
                                                <div class="input-group number-spinner">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-circle smoins"
                                                                            data-dir="dwn"><span
                                                                                class="fa fa-minus"></span></button>
                                                                </span>
                                                    <input type="text" class="form-control text-center" value="1">
                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-default btn-circle splus "
                                                                            data-dir="up"><span
                                                                                class="fa fa-plus"></span></button>
                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ url('shopping/cart') }}" method="POST"
                                              class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                                            <input type="hidden" name="type" value="{{ $ticket->type }}">
                                            <input type="hidden" name="price" value="{{ $ticket->price }}">
                                            <input name="addtocart" value="Choisir" class="addtocartbutton"
                                                   type="submit">
                                        </form>

                                    </td>
                                    <td>
                                        @if($ticket->number > 0 )
                                            <span class="couleur_mot hidden-xs">Disponible</span>
                                        @else
                                            <span class="couleur_mot hidden-xs">Epuisé</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td><b>8000 AR</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-validé">Valider</button>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

@endsection