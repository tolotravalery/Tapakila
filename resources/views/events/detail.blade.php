@extends('template')

@section('content')
    {{--{{ dd($event) }}--}}
    <section>
        <div class="container">
            <div class="row haut">
                <div class="col-lg-2 hier">
                    <div class="">
                        <h2>Payment</h2><br/>

                        <div class="row">
                            <div class="col-lg-4 ">
                                <a><img src="img/orange.png" class="icon_kely"></a>
                            </div>
                            <div class="col-lg-4">
                                <a><img src="img/mvola.png" class="icon_kely"></a>
                            </div>
                            <div class="col-lg-4">
                                <a><img src="img/airtel-money.png" class="icon_kely"></a>
                            </div>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes
                        </p>
                        <h2>Sed ut perspiciatis</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes
                        </p>
                        <h2>Sed ut perspiciatis</h2>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes
                        </p>
                    </div>
                    <div class="">
                        <h2>
                            Nos Parternairs
                        </h2>
                        <p nos partenaire style="margin-left: 30px;">
                            <img src="img/star.png" class="image_logo">
                            <img src="img/taf.jpg" class="image_logo">
                            <img src="img/boa.jpg" class="image_logo">
                            <img src="img/telma-logo.jpeg" class="image_logo">
                            <img src="img/orange.png" class="image_logo">
                    </div>


                </div>
                <div class="col-lg-10 ">
                    <div>
                        <div class="row hier1">
                            <div class="col-lg-6 ">
                                <img src="{{ url('img/'.$event->image) }}" class="detail_picture">
                            </div>
                            <div class="col-lg-6">
                                <h2>{{ $event->title }}</h2>
                                <p>{{$event->additional_note}}</p>
                                <div class="div_style">
                                    <strong>Lieu : </strong>
                                    {{$event->localisation_nom}}
                                    {{$event->localisation_adresse}}
                                </div>
                                <div class="div_style">
                                    <strong>Date : </strong>
                                    {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                    à partir de {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                    jusqu'à {{ \Carbon\Carbon::parse($event->date_fin_event)->format('d M Y')}}
                                    à {{ \Carbon\Carbon::parse($event->date_fin_event)->format('H:i')}}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="table-responsive tableau_detail">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Billet</th>
                                <th>Prix</th>
                                <th>Mode de Payement</th>
                                <th>Acheter en ligne</th>
                                <th>Disponiblité</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($event->tickets as $ticket)
                                {{-- {{dd($ticket)}}--}}
                                <tr>
                                    <td>
                                        <p>{{$ticket->type}}</p>
                                        {{--<p>Disponible
                                            le {{\Carbon\Carbon::parse($ticket->date_debut_vente)->format('d M Y')}} à
                                            {{\Carbon\Carbon::parse($ticket->date_debut_vente)->format('H:i')}} jusqu'à
                                            {{\Carbon\Carbon::parse($ticket->date_fin_vente)->format('d M Y')}} à
                                            {{\Carbon\Carbon::parse($ticket->date_fin_vente)->format('H:i')}}
                                        </p>--}}
                                    </td>
                                    <td>
                                        {{$ticket->price}} Ar
                                    </td>
                                    <td style="text-align: center">
                                        @foreach($ticket->payement_modes as $payement_mode)

                                            {{--{{$payement_mode->value}}--}}
                                            @if($payement_mode->value == 'Orange Money')
                                                <div class="col-lg-4">
                                                    <a><img src="{{ url('/img/orangemoney.png') }}" class="icon_kely">
                                                    </a>
                                                </div>
                                                {{--{{$payement_mode->value}}--}}
                                            @elseif($payement_mode->value == 'MVola')
                                                <div class="col-lg-4">
                                                    <a><img src="{{ url('/img/mvola.png') }}" class="icon_kely">
                                                        {{--{{$payement_mode->value}}--}}
                                                    </a>
                                                </div>
                                            @else
                                                <div class="col-lg-4">
                                                    <a><img src="{{ url('/img/airtel-money.png') }}"
                                                            class="icon_kely">
                                                        {{--{{$payement_mode->value}}--}}
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ url('shopping/cart') }}" method="POST" class="side-by-side">
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
                                            Disponible
                                        @else
                                            Epuisé
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="remarque_details">
                        <div style="padding: 10px; text-align: justify;">
                            <b>Remarque:</b> Les informations pour les bulliet pour cet evenement ne sont pas en temps
                            réel.Parfois les billets se vendent plus vite que nous ne pouvons mettre à jours le site.En
                            semaine , la disponibilité est mise a jours pluisieur fois tout au long de la journée.Dans
                            le
                            cas ,la confirmation final sera envoyée dans les 24 heures, Merci.
                        </div>
                    </div>
                    <div class="row plan_detail">
                        <div class="col-lg-8">
                            <h2>PLAN</h2>
                            <img src="{{ url('img/plan.gif') }}" class="plan">
                        </div>
                        <div class="col-lg-4 plan_right">
                            <h2>Sed ut perspiciatis</h2>
                            <br>
                            <p>sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
                                porro
                                quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed
                                quia
                                non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                                laboriosam,
                                nisi ut aliquid ex ea commodi consequatur?</p>
                        </div>

                    </div>
                    <div class="hier2">
                        <h2>FAQ</h2>
                        <div class="div_style1">
                            <a href="#" target="_blank">Lorem ipsum dolor sit amet, consectetuer</a>
                        </div>
                        <div class="div_style1">
                            <a href="#" target="_blank">Lorem ipsum dolor sit amet, consectetuer</a>
                        </div>
                        <div class="div_style1">
                            <a href="#" target="_blank">Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                rhoncus.</a>
                        </div>
                        <div class="div_style1">
                            <a href="#" target="_blank">Lorem ipsum dolor sit amet, consectetuer</a>
                        </div>
                        <div class="div_style1">
                            <a href="#" target="_blank">Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                rhoncus.</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="categorie-dj">
                <h2>Vous aimeriez aussi</h2><br/>
                <div class="row">
                    @foreach ($interested as $event)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <img src="{{ url('img/'.$event->image) }}" alt="{{$event->title}}">
                                <div class="caption">
                                    <h3><a href="{{ url('events/show',[$event->id]) }}">{{$event->title}}</a></h3>
                                    <p>{{$event->additional_note}}</p><br/>
                                    <div>
                                        <a href="indexnonvide.html">
                                            <div class="price"><i class="glyphicon glyphicon-time time"></i>
                                                {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('d M Y')}}
                                                à partir
                                                de {{ \Carbon\Carbon::parse($event->date_debut_envent)->format('H:i')}}
                                            </div>
                                            <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>
                                                {{$event->localisation_nom}} {{$event->localisation_adresse}}
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection