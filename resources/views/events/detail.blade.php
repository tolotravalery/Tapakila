@extends('template')

@section('content')
    <div class="container custom-container">
        <div class=" hier1">
            <div class="row ">
                <div class="col-lg-7 ">
                    <div class="thumbnail det-picture">
                        <img src="{{url('/')}}/public/img/{{$event->image}}" class="image_detail">
                    </div>
                </div>
                <div class="col-lg-5">
                    <h3 class="couleur_mot">{{$event->title}}</h3>
                    <p style="text-align: justify;padding-right: 10px;">{{$event->additional_note}}</p>
                    <div class="div_style">
                        <i class="fa fa-product-hunt fa-2x zav" aria-hidden="true"></i><strong id="programme"
                                                                                               class="couleur_mot">
                            Programme : </strong>{{$event->additional_note_time}}
                    </div>
                    <div class="div_style">
                        <i class="fa fa-map-marker fa-2x loc zav" aria-hidden="true"></i><strong id="localisation"
                                                                                                 class="couleur_mot">
                            Localisation : </strong> {{$event->localisation_nom }} {{$event->localisation_adresse}}
                    </div>
                    <div class="div_style">
                        <i class="fa fa-calendar-o fa-2x  zav" aria-hidden="true"></i><strong id="date"
                                                                                              class="couleur_mot">
                            Date : </strong> {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                    </div>
                    <div class="div_style">
                        <i class="fa fa-clock-o fa-2x zav" aria-hidden="true"></i><strong id="heure"
                                                                                          class="couleur_mot">
                            Heure :</strong> {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                    </div>
                    <div class="div_style">
                        <strong class="couleur_mot zav"> Partagez sur :</strong> <img
                                src="{{url('/')}}/public/img/facebook.png"
                                style="width: 22px;">
                    </div>
                </div>
            </div>

            <div class="men1">
                <ul class="nav nav-tabs tabl" role="tablist">

                    <li class=" active">
                        <a href="#date1" role="tab"
                           data-toggle="tab">{{\Carbon\Carbon::parse($event->date_debut_envent)->format('d M')}}</a>
                    </li>

                    {{--<li>
                        <a href="#date2" role="tab" data-toggle="tab">23 dec</a>
                    </li>

                    <li>
                        <a href="#date3" role="tab" data-toggle="tab">24 dec</a>
                    </li>

                    <li>
                        <a href="#date4" role="tab" data-toggle="tab">25 dec</a>
                    </li>--}}
                </ul>

                <section>
                    <div class="tab-content">
                        <div class="tab-pane tabulation  fade active in" id="date1">
                            <div class="table-responsive tableau_detail">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Type de ticket</th>
                                        <th>Disponiblité</th>
                                        <th>Quantité</th>
                                        <th>Prix unitaire</th>
                                        <th>Totale</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @php $count_id_price = 0; @endphp
                                    <!-- prixunit1 -->
                                    @foreach($event->tickets as $ticket)
                                        <tr>
                                            <td><strong>{{$ticket->type}}</strong>
                                                <p>Description here</p>
                                            </td>
                                            <td class="clock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>
                                                <p id="tickets{{$count_id_price}}">{{$ticket->number}}</p> tickets
                                            </td>
                                            <td>
                                                <div class="row postions">
                                                    <div class="col-md-4 col-md-offset-2  ">
                                                        <div class="input-group number-spinner">
                                                            <span class="input-group-btn">
																		<button class="btn btn-default btn-circle smoins"
                                                                                data-dir="dwn"
                                                                                id="btn-down{{$count_id_price}}"><span
                                                                                    class="fa fa-minus"></span></button>
                                                            </span>
                                                            <input class="form-control text-center ui" value="0"
                                                                   type="text">
                                                            <span class="input-group-btn">
																		<button class="btn btn-default btn-circle splus "
                                                                                data-dir="up"
                                                                                id="btn-up{{$count_id_price}}"><span
                                                                                    class="fa fa-plus"></span></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-md-offset-1"></div>
                                                </div>
                                            </td>
                                            <td><b>{{(int)$ticket->price}}</b> Ar</td>
                                            <td><b id="prixUnit{{$count_id_price}}">0</b> Ar</td>
                                        </tr>
                                        @php $count_id_price++; @endphp
                                    @endforeach

                                    <tr>
                                        <td class="td_detail"></td>
                                        <td class="td_detail"></td>
                                        <td class="td_detail"></td>
                                        <td><strong>Total</strong></td>
                                        <td><b id="grand_total">0</b> Ar</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="submit" class=" btn btn-danger btn_reset">Reset</button>
                                        </td>
                                        <td>
                                            <button type="submit" class=" btn btn-success btn_acheterr">Acheter
                                            </button>
                                        </td>
                                    </tr>
                                    <input type="hidden" id="nombre_id" value="{{$count_id_price}}"/>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    {{--<!-- date 2 -->--}}
                    {{--<div class="tab-pane tabulation fade" id="date2">--}}
                    {{--<div class="table-responsive tableau_detail">--}}
                    {{--<table class="table table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th>Type de ticket</th>--}}
                    {{--<th>Disponiblité</th>--}}
                    {{--<th>Quantité</th>--}}
                    {{--<th>Prix unitaire</th>--}}
                    {{--<th>Totale</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}

                    {{--<tbody>--}}
                    {{--<!-- prixunit1 -->--}}
                    {{--<tr>--}}
                    {{--<td><strong>VIP</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td class="clock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                    {{--<p id="tickets3">20</p> tickets--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<div class="row postions">--}}
                    {{--<div class="col-md-4 col-md-offset-2  ">--}}
                    {{--<div class="input-group number-spinner3">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle smoins"--}}
                    {{--data-dir="dwn" id="btn-down"><span--}}
                    {{--class="fa fa-minus"></span></button>--}}
                    {{--</span>--}}
                    {{--<input class="form-control text-center ui" value="0"--}}
                    {{--type="text">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle splus "--}}
                    {{--data-dir="up" id="btn-up3"><span--}}
                    {{--class="fa fa-plus"></span></button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td><b id="prixUnit3">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<!-- prixunit1 -->--}}

                    {{--<!-- prixunit2 -->--}}
                    {{--<tr>--}}
                    {{--<td><strong>Standard</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td class="unlock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                    {{--<p id="tickets4">20</p> tickets--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<div class="row postions">--}}
                    {{--<div class="col-md-4 col-md-offset-2 ">--}}
                    {{--<div class="input-group number-spinner4">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle smoins"--}}
                    {{--data-dir="dwn" id="btn-down"><span--}}
                    {{--class="fa fa-minus"></span></button>--}}
                    {{--</span>--}}
                    {{--<input class="form-control text-center ui" value="0"--}}
                    {{--type="text">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle splus "--}}
                    {{--data-dir="up" id="btn-up4"><span--}}
                    {{--class="fa fa-plus"></span></button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td><b id="prixUnit4">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<!-- prixunit2 -->--}}

                    {{--<tr>--}}
                    {{--<td><strong>Standard</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td><i class="fa fa-close fa-2x" aria-hidden="true"></i>--}}
                    {{--<p>Non disponible</p>--}}
                    {{--</td>--}}
                    {{--<td></td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td><strong>Total</strong></td>--}}
                    {{--<td><b id="total2">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td>--}}
                    {{--<button type="submit" class=" btn btn-danger btn_reset">Reset</button>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<button type="submit" class=" btn btn-success btn_acheterr">Acheter</button>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}

                    {{--</table>--}}
                    {{--</div>--}}

                    {{--</div>--}}

                    {{--<!-- date3 -->--}}
                    {{--<div class="tab-pane  tabulation fade" id="date3">--}}
                    {{--<div class="table-responsive tableau_detail">--}}
                    {{--<table class="table table-hover">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                    {{--<th>Type de ticket</th>--}}
                    {{--<th>Disponiblité</th>--}}
                    {{--<th>Quantité</th>--}}
                    {{--<th>Prix unitaire</th>--}}
                    {{--<th>Totale</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}

                    {{--<tbody>--}}
                    {{--<!-- prixunit1 -->--}}
                    {{--<tr>--}}
                    {{--<td><strong>VIP</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td class="clock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                    {{--<p id="tickets5">20</p> tickets--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<div class="row postions">--}}
                    {{--<div class="col-md-4 col-md-offset-2  ">--}}
                    {{--<div class="input-group number-spinner5">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle smoins"--}}
                    {{--data-dir="dwn" id="btn-down"><span--}}
                    {{--class="fa fa-minus"></span></button>--}}
                    {{--</span>--}}
                    {{--<input class="form-control text-center ui" value="0"--}}
                    {{--type="text">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle splus "--}}
                    {{--data-dir="up" id="btn-up5"><span--}}
                    {{--class="fa fa-plus"></span></button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td><b id="prixUnit5">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<!-- prixunit1 -->--}}

                    {{--<!-- prixunit2 -->--}}
                    {{--<tr>--}}
                    {{--<td><strong>Standard</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td class="unlock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                    {{--<p id="tickets6">20</p> tickets--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<div class="row postions">--}}
                    {{--<div class="col-md-4 col-md-offset-2 ">--}}
                    {{--<div class="input-group number-spinner6">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle smoins"--}}
                    {{--data-dir="dwn" id="btn-down"><span--}}
                    {{--class="fa fa-minus"></span></button>--}}
                    {{--</span>--}}
                    {{--<input class="form-control text-center ui" value="0"--}}
                    {{--type="text">--}}
                    {{--<span class="input-group-btn">--}}
                    {{--<button class="btn btn-default btn-circle splus "--}}
                    {{--data-dir="up" id="btn-up6"><span--}}
                    {{--class="fa fa-plus"></span></button>--}}
                    {{--</span>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                    {{--</div>--}}
                    {{--</td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td><b id="prixUnit6">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<!-- prixunit2 -->--}}

                    {{--<tr>--}}
                    {{--<td><strong>Standard</strong>--}}
                    {{--<p>Description</p>--}}
                    {{--</td>--}}
                    {{--<td><i class="fa fa-close fa-2x" aria-hidden="true"></i>--}}
                    {{--<p>Non disponible</p>--}}
                    {{--</td>--}}
                    {{--<td></td>--}}
                    {{--<td><b>4000</b> Ar</td>--}}
                    {{--<td></td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td class="td_detail"></td>--}}
                    {{--<td><strong>Total</strong></td>--}}
                    {{--<td><b id="total3">0</b> Ar</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td></td>--}}
                    {{--<td>--}}
                    {{--<button type="submit" class=" btn btn-danger btn_reset">Reset</button>--}}
                    {{--</td>--}}
                    {{--<td>--}}
                    {{--<button type="submit" class=" btn btn-success btn_acheterr">Acheter</button>--}}
                    {{--</td>--}}
                    {{--</tr>--}}
                    {{--</tbody>--}}

                    {{--</table>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    <!-- date4 -->
                        {{--<div class="tab-pane tabulation fade" id="date4">--}}
                        {{--<div class="table-responsive tableau_detail">--}}
                        {{--<table class="table table-hover">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                        {{--<th>Type de ticket</th>--}}
                        {{--<th>Disponiblité</th>--}}
                        {{--<th>Quantité</th>--}}
                        {{--<th>Prix unitaire</th>--}}
                        {{--<th>Totale</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}

                        {{--<tbody>--}}
                        {{--<!-- prixunit1 -->--}}
                        {{--<tr>--}}
                        {{--<td><strong>VIP</strong>--}}
                        {{--<p>Description</p>--}}
                        {{--</td>--}}
                        {{--<td class="clock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                        {{--<p id="tickets7">20</p> tickets--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--<div class="row postions">--}}
                        {{--<div class="col-md-4 col-md-offset-2  ">--}}
                        {{--<div class="input-group number-spinner7">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default btn-circle smoins"--}}
                        {{--data-dir="dwn" id="btn-down"><span--}}
                        {{--class="fa fa-minus"></span></button>--}}
                        {{--</span>--}}
                        {{--<input class="form-control text-center ui" value="0"--}}
                        {{--type="text">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default btn-circle splus "--}}
                        {{--data-dir="up" id="btn-up7"><span--}}
                        {{--class="fa fa-plus"></span></button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                        {{--</div>--}}
                        {{--</td>--}}
                        {{--<td><b>4000</b> Ar</td>--}}
                        {{--<td><b id="prixUnit7">0</b> Ar</td>--}}
                        {{--</tr>--}}
                        {{--<!-- prixunit1 -->--}}

                        {{--<!-- prixunit2 -->--}}
                        {{--<tr>--}}
                        {{--<td><strong>Standard</strong>--}}
                        {{--<p>Description</p>--}}
                        {{--</td>--}}
                        {{--<td class="unlock"><i class="fa fa-unlock fa-2x" aria-hidden="true"></i>--}}
                        {{--<p id="tickets8">20</p> tickets--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--<div class="row postions">--}}
                        {{--<div class="col-md-4 col-md-offset-2 ">--}}
                        {{--<div class="input-group number-spinner8">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default btn-circle smoins"--}}
                        {{--data-dir="dwn" id="btn-down"><span--}}
                        {{--class="fa fa-minus"></span></button>--}}
                        {{--</span>--}}
                        {{--<input class="form-control text-center ui" value="0"--}}
                        {{--type="text">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default btn-circle splus "--}}
                        {{--data-dir="up" id="btn-up8"><span--}}
                        {{--class="fa fa-plus"></span></button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-md-4 col-md-offset-1"></div>--}}
                        {{--</div>--}}
                        {{--</td>--}}
                        {{--<td><b>4000</b> Ar</td>--}}
                        {{--<td><b id="prixUnit8">0</b> Ar</td>--}}
                        {{--</tr>--}}
                        {{--<!-- prixunit2 -->--}}

                        {{--<tr>--}}
                        {{--<td><strong>Standard</strong>--}}
                        {{--<p>Description</p>--}}
                        {{--</td>--}}
                        {{--<td><i class="fa fa-close fa-2x" aria-hidden="true"></i>--}}
                        {{--<p>Non disponible</p>--}}
                        {{--</td>--}}
                        {{--<td></td>--}}
                        {{--<td><b>4000</b> Ar</td>--}}
                        {{--<td></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td class="td_detail"></td>--}}
                        {{--<td class="td_detail"></td>--}}
                        {{--<td class="td_detail"></td>--}}
                        {{--<td><strong>Total</strong></td>--}}
                        {{--<td><b id="total4">0</b> Ar</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td></td>--}}
                        {{--<td>--}}
                        {{--<button type="submit" class=" btn btn-danger btn_reset">Reset</button>--}}
                        {{--</td>--}}
                        {{--<td>--}}
                        {{--<button type="submit" class=" btn btn-success btn_acheterr">Acheter</button>--}}
                        {{--</td>--}}
                        {{--</tr>--}}
                        {{--</tbody>--}}

                        {{--</table>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </section>
            </div>
        </div>
        <div class="categoriesport">
            <h2 class="couleur_mot">Voir aussi</h2>
            <div class="row">
                @php $count_id = 0 @endphp
                @foreach($interested as $event)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail"
                             onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                             onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                            <a href="{{url('events/show',[$event->id])}}">
                                <div class="mg-image">
                                    <img src="{{ url('/public/img/'.$event->image.'') }}">
                                </div>
                            </a>
                            <div class="caption taille">
                                <a href="{{url('events/show',[$event->id])}}">
                                    <div class="limitelengh">
                                        <h3>
                                            <a href="{{url('events/show',[$event->id])}}"
                                               id="title{{$count_id}}">{{str_limit($event->title,$limit=60, $end = ' ...')}}</a>
                                        </h3>
                                    </div>
                                    <div class="limite">
                                        <a href="#"><p
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
                                            <a>
                                                <div class="prixfx">
                                                    @if($event->tickets()->count() > 0)
                                                        <i class="fa fa-tag prices"></i>A partir de
                                                        <b class="prx">{{ (int) $event->tickets()->orderBy('price','asc')->take(1)->get()[0]->price  }}</b>
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
                @endforeach
            </div>
            </a>
        </div>
    </div>
    </div>
@endsection

@section('specificScript')
    <script type="text/javascript" src="{{url('/')}}/public/js/Tapakila.js"/>
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