@extends('template')
@section('title')
    <title>{{$event->title}}</title>
    <meta name="description" content="{{$event->additional_note}}"/> 
@endsection
@section('specificMeta')
    <meta property="og:url"
          content="{{url('event/show/'.$event->id)}}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="{{$event->title}}"/>
    <meta property="og:description" content="{{$event->additional_note}}"/>
    <meta property="og:image"
          content="{{url('/')}}/public/img/{{$event->image}}"/>
@endsection
@section('content')

    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">accueil</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/evenement/'.$menu->name)}}">{{strtoupper($menu->name)}}</a></li>
                @endforeach

            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories &nbsp <label class="test">&darr;</label></strong></a>
        </div>
    </section>

    <section id="sectionevenement" role="navigation">
        <div class="container custom-container" >
            <ul>
                @foreach($sousmenus as $sousmenu)
                    <li>
                        <a href="{{url('/tags/'.$sousmenu->name)}}">{{ucfirst(strtolower($sousmenu->name))}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <div class="container custom-container">
        <div class=" hier1">
            <div class="row ">
                <div class="col-lg-7 ">
                    <div class="thumbnail det-picture">
                        <img src="{{url('/')}}/public/img/{{$event->image}}" class="image_detail">
                    </div>
                </div>
                <div class="col-lg-5">
                    <h3 class="couleur_mot">{{ucfirst(strtolower($event->title))}}</h3>
                    <p style="text-align: justify;padding-right: 10px;">{{$event->additional_note}}
                    <div class="div_style">
                        <div class="row">
                            <div class="col-lg-5 col-xs-7 col-sm-3">
                                <i class="fa fa-product-hunt fa-2x zav" aria-hidden="true"></i><strong id="programme"
                                                                                                       class="couleur_mot">
                                    Programme : </strong>
                            </div>
                            <div class="col-lg-7 col-xs-5 gi">
                                {{$event->additional_note_time}}
                            </div>
                        </div>

                    </div>
                    <div class="div_style">
                        <div class="row">
                            <div class="col-lg-5 col-xs-7 col-sm-3">
                                <i class="fa fa-map-marker fa-2x loc zav" aria-hidden="true"></i><strong
                                        id="localisation"
                                        class="couleur_mot">
                                    Localisation : </strong>
                            </div>
                            <div class="col-lg-7 col-xs-5 gi">
                                {{$event->localisation_nom }} {{$event->localisation_adresse}}
                            </div>
                        </div>

                    </div>
                    <div class="div_style">
                        <div class="row">
                            <div class="col-lg-5 col-xs-7 col-sm-3">
                                <i class="fa fa-calendar-o fa-2x  zav" aria-hidden="true"></i><strong id="date"
                                                                                                      class="couleur_mot">
                                    Date
                                    : </strong>
                            </div>
                            <div class="col-lg-7 col-xs-5 gi">
                                {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                            </div>
                        </div>

                    </div>
                    <div class="div_style">
                        <div class="row">
                            <div class="col-lg-5 col-xs-7 col-sm-3">
                                <i class="fa fa-clock-o fa-2x zav" aria-hidden="true"></i>
                                <strong id="heure" class="couleur_mot"> Heure
                                    :</strong>
                            </div>
                            <div class="col-lg-7 col-xs-5 gi">
                                {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                            </div>
                        </div>

                    </div>
                    <div class="div_style">
                        <strong class="couleur_mot zav"> Partagez sur :</strong>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><img
                                    src="{{url('/')}}/public/img/partage_fb.JPG"></a>
                    </div>
                </div>
            </div>
            <div class="men1">
                <ul class="nav nav-tabs tabl" role="tablist">
                    @php
                        $c = 0;
                        $interval = new DateInterval('P1D');
                        $daterange = new DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval ,\Carbon\Carbon::parse($event->date_fin_event));
                    @endphp
                    @foreach($daterange as $date)
                        <li class="@php if($c==0) echo "active" ; else echo "" ;@endphp ">
                            <a href="#date{{$c}}" role="tab"
                               data-toggle="tab" onclick="hideThis('date{{$c}}')">{{$date->format('d M')}}</a>
                        </li>
                        @php $c++; @endphp
                    @endforeach
                    @if($c==0)
                        <li class="active">
                            <a href="#date" role="tab"
                               data-toggle="tab">{{\Carbon\Carbon::parse($event->date_debut_envent)->format('d M')}}</a>
                        </li>
                    @endif
                </ul>
                <section>
                    <div class="tab-content">
                        @php
                            $d = 0;
                            $interval = new DateInterval('P1D');
                            $daterange = new DatePeriod(\Carbon\Carbon::parse($event->date_debut_envent), $interval ,\Carbon\Carbon::parse($event->date_fin_event));
                        @endphp
                        <form action="{{ url('shopping/cart') }}" method="POST"
                              class="side-by-side">
                            @foreach($daterange as $date)
                                <div class="tab-pane tabulation  fade @php if($d == 0)  echo "active in "; else echo "hidden"; @endphp"
                                     id="date{{$d}}">
                                    <div class="table-responsive tableau_detail" id="table_event_1_day">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th style="width: 227px !important;">Type de ticket</th>
                                                <th>Disponiblité</th>
                                                <th>Quantité</th>
                                                <th>Prix unitaire</th>
                                                <th>Totale</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php $count_id_price = 0;
                                            $totaliko=0;
                                            @endphp
                                            @if($event->tickets()->where('date_debut_vente','<=',date('Y-m-d'))->where('date_fin_vente','>=',date('Y-m-d'))->count() > 0)
                                                @foreach($event->tickets()->where('date_debut_vente','<=',date('Y-m-d'))->where('date_fin_vente','>=',date('Y-m-d'))->wherePivot('date',\Carbon\Carbon::parse($date)->format('Y-m-d'))->get() as $ticket)
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="id[]" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="type[]" value="{{ $ticket->type }}">
                                                    <input type="hidden" name="price[]" value="{{ $ticket->price }}">
                                                    <tr>
                                                        <td><strong>{{$ticket->type}}</strong>
                                                            <p>{{$ticket->description}}</p>
                                                        </td>
                                                        @if($ticket->number > 0)
                                                            <td class="unlock"><i class="fa fa-unlock fa-2x"
                                                                                  aria-hidden="true"></i>
                                                                <p id="tickets{{$d}}{{$count_id_price}}">{{$ticket->number-1}}</p>
                                                                tickets
                                                            </td>
                                                        @else
                                                            <td class="clock"><i class="fa fa-close fa-2x"
                                                                                 aria-hidden="true"></i>
                                                                <p>Non disponible</p>
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <div class="tableau-center">
                                                                <div class="input-group number-spinner{{$d}}{{$count_id_price}}  tabdetail">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="input-group-btn">
                                                                                        <button class="btn btn-default btn-circle smoins"
                                                                                                data-dir="dwn"
                                                                                                type="button"
                                                                                                id="btn-down{{$d}}{{$count_id_price}}"><span
                                                                                                    class="fa fa-minus"></span></button>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <input class="form-control text-center ui tests "
                                                                                   readonly
                                                                                   @if($ticket->number > 0) value="1"
                                                                                   @else  value="0" @endif type="text"
                                                                                   name="nombre[]"></li>
                                                                        <li>
																	<span class="input-group-btn">
																				<button class="btn btn-default btn-circle splus "
                                                                                        data-dir="up" type="button"
                                                                                        id="btn-up{{$d}}{{$count_id_price}}"><span
                                                                                            class="fa fa-plus"></span></button>
																	</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <b id="prix{{$d}}{{$count_id_price}}">{{(int)$ticket->price}}</b>
                                                            Ar
                                                        </td>
                                                        @if($ticket->number > 0)
                                                            <td>
                                                                <b id="prixUnit{{$d}}{{$count_id_price}}">{{(int)$ticket->price}}</b>
                                                                Ar
                                                            </td>
                                                        @else
                                                            <td><b id="prixUnit{{$d}}{{$count_id_price}}">0</b> Ar</td>
                                                        @endif
                                                    </tr>
                                                    @if($ticket->number > 0)
                                                        @php
                                                            $count_id_price++;
                                                            $totaliko+=$ticket->price;
                                                        @endphp
                                                    @else
                                                        @php
                                                            $count_id_price++;
                                                            $totaliko+=0;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                                <td><strong>Total</strong></td>
                                                <td><b id="total{{$d}}">{{(int)$totaliko}}</b> Ar <?php $totaly = 0; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                            </tr>
                                            <input type="hidden" id="nombre_id{{$d}}" value="{{$count_id_price}}"/>
                                            </tbody>
                                            @if($event->tickets()->where('date_debut_vente','<=',date('Y-m-d'))->where('date_fin_vente','>=',date('Y-m-d'))->count() == 0)
                                                <p>(*) Les tickets de cette évènements ne sont pas encore disponible</p>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                                @php $d++ @endphp
                            @endforeach
                            <div class="row padding-custom">
                                <div class="col-md-4 col-sm-4 col-xs-0"></div>
                                <div class="col-md-4 col-sm-4 col-xs-2"></div>
                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <button type="button" class=" btn btn-danger btn_reset" onclick="resetPage()">
                                        Reset
                                    </button>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-5">
                                    <button type="submit" class=" btn btn-success btn_acheterr " id="acheter_ticket_1_day">Acheter
                                    </button>
                                </div>
                            </div>

                            <br/>
                        </form>
                        @if($d==0)
                            <div class="tab-pane tabulation  fade active in"
                                 id="date">
                                <div class="table-responsive tableau_detail">
                                    <table class="table table-hover" id="table_event_many_day">
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
                                        <form action="{{ url('shopping/cart') }}" method="POST"
                                              class="side-by-side">
                                            @php $count_id_price = 0;
                                            $totaliko=0;
                                            @endphp
                                            @if($event->tickets()->where('date_debut_vente','<=',date('Y-m-d'))->where('date_fin_vente','>=',date('Y-m-d'))->count() > 0)
                                                @foreach($event->tickets()->wherePivot('date',\Carbon\Carbon::parse($date)->format('Y-m-d'))->get() as $ticket)
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="id[]" value="{{ $ticket->id }}">
                                                    <input type="hidden" name="type[]" value="{{ $ticket->type }}">
                                                    <input type="hidden" name="price[]" value="{{ $ticket->price }}">
                                                    <tr>
                                                        <td><strong>{{$ticket->type}}</strong>
                                                            <p>{{$ticket->description}}</p>
                                                        </td>
                                                        @if($ticket->number > 0)
                                                            <td class="unlock"><i class="fa fa-unlock fa-2x"
                                                                                  aria-hidden="true"></i>
                                                                <p id="tickets{{$count_id_price}}">{{$ticket->number-1}}</p>
                                                                tickets
                                                            </td>
                                                        @else
                                                            <td class="clock"><i class="fa fa-close fa-2x"
                                                                                 aria-hidden="true"></i>
                                                                <p>Non disponible</p>
                                                            </td>
                                                        @endif
                                                        <td>

                                                            <div class="tableau-center">
                                                                <div class="input-group number-spinner{{$count_id_price}}  tabdetail">

                                                                    <ul>
                                                                        <li>
                                                                            <span class="input-group-btn">
                                                                                        <button class="btn btn-default btn-circle smoins"
                                                                                                data-dir="dwn"
                                                                                                type="button"
                                                                                                id="btn-down{{$count_id_price}}"><span
                                                                                                    class="fa fa-minus"></span></button>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <input class="form-control text-center ui tests "
                                                                                   readonly
                                                                                   @if($ticket->number > 0) value="1"
                                                                                   @else  value="0" @endif type="text"
                                                                                   name="nombre[]"></li>
                                                                        <li>
																	<span class="input-group-btn">
																				<button class="btn btn-default btn-circle splus "
                                                                                        data-dir="up" type="button"
                                                                                        id="btn-up{{$count_id_price}}"><span
                                                                                            class="fa fa-plus"></span></button>
																	</span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><b>{{(int)$ticket->price}}</b> Ar</td>
                                                        @if($ticket->number > 0)
                                                            <td>
                                                                <b id="prixUnit{{$d}}{{$count_id_price}}">{{(int)$ticket->price}}</b>
                                                                Ar
                                                            </td>
                                                        @else
                                                            <td><b id="prixUnit{{$d}}{{$count_id_price}}">0</b> Ar</td>
                                                        @endif
                                                    </tr>
                                                    @if($ticket->number > 0)
                                                        @php
                                                            $count_id_price++;
                                                            $totaliko+=$ticket->price;
                                                        @endphp
                                                    @else
                                                        @php
                                                            $count_id_price++;
                                                            $totaliko+=0;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                                <td class="td_detail"></td>
                                                <td><strong>Total</strong></td>
                                                <td><b id="total">{{(int)$totaliko}}</b> Ar</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button type="button" class=" btn btn-danger btn_reset">
                                                        Reset
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="submit" class=" btn btn-success btn_acheterr" id="acheter_ticket_many_day">
                                                        Acheter
                                                    </button>
                                                </td>
                                            </tr>
                                            <input type="hidden" id="nombre_id" value="{{$count_id_price}}"/>
                                        </form>
                                        </tbody>
                                        @if($event->tickets()->wherePivot('date',\Carbon\Carbon::parse($date)->format('Y-m-d'))->get()->count() == 0)
                                            <p>(*) Les tickets de cette évènements ne sont pas encore disponible</p>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
        <div class="categoriesport">
            <h2 class="couleur_mot">Voir aussi</h2>
            <div class="row">
                @php $count_id = 0 @endphp
                @foreach($interested as $ev)
                @php
                    $string_url_detail = "/evenement/".$ev->sous_menus->name ."/".date('Y-m-d',strtotime($ev->date_debut_envent)) . "_".  str_slug($ev->title)."_".$ev->id;
                @endphp
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail"
                             onmouseover="mouseover('month{{$count_id}}','title{{$count_id}}')"
                             onmouseleave="mouseleave('month{{$count_id}}','title{{$count_id}}')">
                            <a href="{{url($string_url_detail)}}">
                                <div class="mg-image">
                                    <img src="{{ url('/public/img/'.$ev->image.'') }}">
                                </div>
                            </a>
                            <div class="caption taille">
                                <a href="{{url($string_url_detail)}}">
                                    <div class="limitelengh">
                                        <h3>
                                            <a href="{{url($string_url_detail)}}"
                                               id="title{{$count_id}}">{{ucfirst(strtolower(str_limit($ev->title,$limit=40, $end = ' ...')))}}</a>
                                        </h3>
                                    </div>
                                    <div class="limite">
                                        <a href="{{url($string_url_detail)}}">
                                            <?php  if ($ev->additional_note == null) {
                                                echo "<br/>";
                                            }?>
                                            <p style="text-align: justify">{{ str_limit(ucfirst($ev->additional_note), $limit = 100, $end = ' ...') }}</p>
                                        </a><br/>
                                    </div>
                                    <div class="row cbg">
                                        <div class="col-md-3 col-xs-3">
                                            <a href="{{url($string_url_detail)}}">
                                                <div class="calendar">
                                                    <h1 class="month"
                                                        id="month{{$count_id}}">{{ \Carbon\Carbon::parse($ev->date_debut_envent)->format('M')}}</h1>
                                                    <label class="jour">{{ \Carbon\Carbon::parse($ev->date_debut_envent)->format('D')}}</label>
                                                    <p class="day">{{ \Carbon\Carbon::parse($ev->date_debut_envent)->format('d')}}</p>
                                                </div>
                                            </a>

                                        </div>
                                        <div class="col-md-9 col-xs-9 ">
                                            <div class="prixfx">
                                                @if($ev->tickets()->where('date_debut_vente','<=',date('Y-m-d H:i:s'))->where('date_fin_vente','>',date('Y-m-d H:i:s'))->count() > 0)
                                                    <i class="fa fa-tag prices"></i>A
                                                    partir de <b
                                                            class="prx">{{ (int) $ev->tickets()->orderBy('price','asc')->take(1)->get()[0]->price  }}</b>
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
                                        <a style="color:white !important;" href="{{url($string_url_detail)}}"
                                           class="btn btn-danger btn_reset">Réserver</a>
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
@endsection

@section('specificScript')
    <script>
        var i = 0;
        var nbre =<?php echo $d;?>;

        for (i = 0; i < nbre; i++) {
            /*var classe= "#reset"+i;
             console.log(classe);*/
            $('#reset' + i).click(function () {
                window.location.reload(false);
            });
        }
        $(document).ready(function () {
            console.log('ready');
            if ($('#table_event_1_day tbody tr').length < 3)
                $('#acheter_ticket_1_day').prop('disabled', true);
            if ($('#table_event_many_day tbody tr').length < 3)
                $('#acheter_ticket_many_day').prop('disabled', true);
        });

    </script>
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
    <script>
        var newticket = new Array();
    </script>

    @for($i=0;$i<$event->tickets()->count();$i++)
        @for($u=0;$u<$d;$u++)

            <script>

                newticket[[{{$i}}]] = {{$event->tickets[$i]->number-1}};
                $(document).on('click', '.number-spinner{{$u}}{{$i}} button', function () {
                    var total = 0;
                    /*for (var j = 0; j < $('#nombre_id{{$u}}').val(); j++) {
                        total += parseInt($('#prixUnit{{$u}}' + j).html());
                    }*/
                    var btn = $(this),
                        oldValue = btn.closest('.number-spinner{{$u}}{{$i}}').find('input').val().trim(),
                        newVal = 0;
                    console.log(oldValue);
                    if (btn.attr('data-dir') == 'up') {
                        console.log("up");
                        $('#acheter').prop('disabled', false);
                        if (oldValue < {{$event->tickets[$i]->number}}) {
                            newVal = parseInt(oldValue) + 1;
                            //var prixUnit1 = {{$event->tickets[$i]->price}} * newVal;
                            var prixUnit1 = $('#prix{{$u}}{{$i}}').html() * newVal;
                            console.log(prixUnit1);
                            newticket[{{$i}}] -= 1;
                            $('#tickets{{$u}}{{$i}}').html(newticket[{{$i}}]);
                            $('#prixUnit{{$u}}{{$i}}').html(0 + prixUnit1);

                            btn.closest('.number-spinner{{$u}}{{$i}}').find('input').val(newVal);

                            var u ={{$u}};
                            for (var j = 0; j < $('#nombre_id{{$u}}').val(); j++) {
                                total += parseInt($('#prixUnit{{$u}}' + j).html());
                            }
                            $('#total{{$u}}').html(total);

                        } else if (oldValue == {{$event->tickets[$i]->number}}) {
                            $('#tickets{{$i}}').html('Epuisé');
                            $('.clock{{$i}}').removeClass('fa-unlock');
                            $('.clock{{$i}}').addClass('fa-lock');
                            $('#btn-up{{$u}}{{$i}}').attr('disabled', 'true');

                            for (var j = 0; j < $('#nombre_id{{$u}}').val(); j++) {
                                //total += parseInt($('#prixUnit' + j).html());
                                total += parseInt($('#prixUnit{{$u}}' + j).html());
                            }
                            $('#total{{$u}}').html(total);
                        }

                    } else {
                        $('#acheter').prop('disabled', false);
                        if (oldValue > 0) {
                            newVal = parseInt(oldValue) - 1;
                            var prixUnit1 = $('#prix{{$u}}{{$i}}').html() * newVal;
                            newticket[{{$i}}] += 1;
                            $('#prixUnit{{$u}}{{$i}}').html(0 + prixUnit1);
                            $('#tickets{{$u}}{{$i}}').html(newticket[{{$i}}]);
                            $('#btn-up{{$u}}{{$i}}').removeAttr('disabled');
                            $('.clock{{$i}}').removeClass('fa-lock');
                            $('.clock{{$i}}').addClass('fa-unlock');
                            btn.closest('.number-spinner{{$u}}{{$i}}').find('input').val(newVal);

                            for (var j = 0; j < $('#nombre_id{{$u}}').val(); j++) {
                                total += parseInt($('#prixUnit{{$u}}' + j).html());
                            }
                            $('#total{{$u}}').html(total);
                            if (total == 0) {
                                $('#acheter').prop('disabled', true);
                            }
                        }
                        else if (oldValue == 0) {
                            $('#acheter').prop('disabled', true);
                        }
                    }
                });

                function hideThis(id) {
                    console.log('hideThis');
                    $('.tab-pane').addClass('hidden');
                    $('#' + id).removeClass('hidden');
                }

                function resetPage() {
                    window.location = '{{url()->current()}}'
                }
            </script>
        @endfor
    @endfor
    <script type="text/javascript" src="{{ url('/') }}/public/js/share.js"></script>
@endsection