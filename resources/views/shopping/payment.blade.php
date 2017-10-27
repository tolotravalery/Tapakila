@extends('template')
@section('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries_sample.css">
@endsection
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
                        <a href="{{url('/event/list/categorie/'.$sousmenu->name.'',[$sousmenu->id])}}">{{ucfirst($sousmenu->name)}}</a>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
    <section>
        <div class="container custom-container">
            <div id="achat-content">
                <h2 class="titlebuy">Votre Commande</h2>
                <div class="spacing"></div>
                @if(($ticket_to_pay[0]->pivot->number < \App\Models\Ticket::find($ticket_to_pay[0]->id)->number))
                    <div class="custom-pg">
                        <form action="{{url('/shopping/checkout/payment')}}" method="POST">
                            <table class="tabl-content">
                                <thead>
                                <tr>
                                    <th scope="col" class="th_panier "><b class="bold">Evènement</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Quantité</b></th>
                                    <th scope="col"><b class="bold">Prix</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $i = 0;
                                    $somme = 0;
                                @endphp
                                @foreach ($ticket_to_pay as $item)
                                    @php
                                        $ticket = \App\Models\Ticket::findOrFail($item->id);
                                        $event = $ticket->events()->take(1)->get()[0];
                                    @endphp
                                    <tr>
                                        <td data-label="">
                                            <div class="row">
                                                <div class=" col-xs-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-7 ">
                                                            <div class="thumbnail imgpaiment">
                                                                <img src="{{url('/public/img/'.$event->image)}}"
                                                                     class="image_panier">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 ">
                                                            <p class="sor">
                                                                <b>{{str_limit($event->title,$limit=20,$end=' ...')}}</b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tickets">{{$ticket->type}}</td>
                                        <td data-label="Quantité">{{$item->pivot->number}}</td>
                                        <td data-label="Prix">{{ $ticket->price *  $item->pivot->number}}</td>
                                    </tr>
                                    <input type="hidden" value="{{$id}}" name="id">
                                    <input type="hidden" value="{{$item->pivot->number}}" name="number">
                                    @php
                                        $i++;
                                        $somme+=$ticket->price *  $item->pivot->number;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-5 Fraisservice ">
                                    <p><b class="tright">Frais de service :</b>0 AR </p>
                                    <p><b class="t2right">Somme Total à payer : </b>
                                        <label class="TT">{{$somme}} AR</label>
                                    </p>
                                </div>
                            </div>
                            <hr class="sep">
                            <div class="resum">
                                <p><b>Adresse e-mail de livraison des tickets :</b> &nbsp {{Auth::user()->email}}</p>
                                <p><b>Méthode de payment :</b></p>
                            </div>

                            <div class="modepaimenent">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div id="ticket-radio2">
                                        <div class="btn-group" data-toggle="buttons">
                                            @foreach($payement_mode as $p)
                                                <div class="col-md-4">
                                                    <div class="radio">
                                                        <label class="button">
                                                            @if($p->slug=='telma')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmvola.png"
                                                                     alt="">
                                                            @elseif($p->slug=='orange')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmorange.png"
                                                                     alt="">
                                                            @elseif($p->slug=='airtel')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmartel.png"
                                                                     alt="">
                                                            @endif
                                                            <b class="operateur">{{$p->slug}}</b>
                                                            <label class="btn btn-customs  btn-success pull-right">
                                                                <input type="radio" name="options" id="option2"
                                                                       autocomplete="off" style="display: none;"
                                                                       value="{{$p->slug}}" required>
                                                                <span class="glyphicon gly-custom  glyphicon-ok"></span>
                                                            </label>

                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="check">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" name="accept" required>

                                                        <b>Cochez cette case pour confirmer que vous avez lu et
                                                            accepté nos terms de
                                                            contrat.</b>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Ttal row">
                                        <div class="col-md-5 col-md-offset-7">
                                            <div class="row">
                                                <div class="col-md-3 Annulerbtn col-xs-3 col-xs-offset-1">
                                                    <a href="{{url('/')}}/shopping/cart">Annuler</a>
                                                </div>

                                                <div class="col-md-3 payee col-xs-3">
                                                    <input value="Payer" class="button ticket"
                                                           name="submit_ticket_order"
                                                           id="place-order-button"
                                                           type="submit" @php if($i == 0) echo "disabled"; @endphp>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{--@endif--}}
                @elseif(($ticket_to_pay[0]->pivot->number > \App\Models\Ticket::find($ticket_to_pay[0]->id)->number) && \App\Models\Ticket::find($ticket_to_pay[0]->id)->number > 0)
                    <div class="alert alert-success">
                        <p> Votre achat est épuisé</p>
                        <p>Vous avez
                            commandez {{$ticket_to_pay[0]->pivot->number}} {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->type}}
                            de {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->events()->take(1)->get()[0]->title}}
                            mais vous n'avez pas encore payez.
                            Il reste maintenant
                            {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->number}} {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->type}}
                            disponibles
                            .
                        </p>
                    </div>
                    <div class="custom-pg">
                        <form action="{{url('/shopping/checkout/payment')}}" method="POST">
                            <table class="tabl-content">
                                <thead>
                                <tr>
                                    <th scope="col" class="th_panier "><b class="bold">Evènement</b></th>
                                    <th scope="col"><b class="bold">Tickets</b></th>
                                    <th scope="col"><b class="bold">Quantité</b></th>
                                    <th scope="col"><b class="bold">Prix</b></th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $i = 0;
                                    $somme = 0;
                                @endphp
                                @foreach ($ticket_to_pay as $item)
                                    @php
                                        $ticket = \App\Models\Ticket::findOrFail($item->id);
                                        $event = $ticket->events()->take(1)->get()[0];
                                    @endphp
                                    <tr>
                                        <td data-label="">
                                            <div class="row">
                                                <div class=" col-xs-12 ">
                                                    <div class="row">
                                                        <div class="col-lg-7 ">
                                                            <div class="thumbnail imgpaiment">
                                                                <img src="{{url('/public/img/'.$event->image)}}"
                                                                     class="image_panier">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 ">
                                                            <p class="sor">
                                                                <b>{{str_limit($event->title,$limit=20,$end=' ...')}}</b>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-label="Tickets">{{$ticket->type}}</td>
                                        <td data-label="Quantité">{{$ticket->number}}</td>
                                        <td data-label="Prix">{{ $ticket->price *  $ticket->number}}</td>
                                    </tr>
                                    <input type="hidden" value="{{$id}}" name="id">
                                    <input type="hidden" value="{{$ticket->number}}" name="number">
                                    @php
                                        $i++;
                                        $somme+=$ticket->price *  $ticket->number;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-5 Fraisservice ">
                                    <p><b class="tright">Frais de service :</b>0 AR </p>
                                    <p><b class="t2right">Somme Total à payer : </b>
                                        <label class="TT">{{$somme}} AR</label>
                                    </p>
                                </div>
                            </div>
                            <hr class="sep">
                            <div class="resum">
                                <p><b>Adresse e-mail de livraison des tickets :</b> &nbsp {{Auth::user()->email}}</p>
                                <p><b>Méthode de payment :</b></p>
                            </div>

                            <div class="modepaimenent">

                                <div class="row">
                                    {{ csrf_field() }}
                                    <div id="ticket-radio2">
                                        <div class="btn-group" data-toggle="buttons">
                                            @foreach($payement_mode as $p)
                                                <div class="col-md-4">
                                                    <div class="radio">
                                                        <label class="button">
                                                            @if($p->slug=='telma')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmvola.png"
                                                                     alt="">
                                                            @elseif($p->slug=='orange')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmorange.png"
                                                                     alt="">
                                                            @elseif($p->slug=='airtel')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmartel.png"
                                                                     alt="">
                                                            @endif
                                                            <b class="operateur">{{$p->slug}}</b>
                                                            <label class="btn btn-customs  btn-success pull-right">
                                                                <input type="radio" name="options" id="option2"
                                                                       autocomplete="off" style="display: none;"
                                                                       value="{{$p->slug}}" required>
                                                                <span class="glyphicon gly-custom  glyphicon-ok"></span>
                                                            </label>

                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="check">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" value="" name="accept" required>

                                                        <b>Cochez cette case pour confirmer que vous avez lu et
                                                            accepté nos terms de
                                                            contrat.</b>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="Ttal row">
                                        <div class="col-md-5 col-md-offset-7">
                                            <div class="row">
                                                <div class="col-md-3 Annulerbtn col-xs-3 col-xs-offset-1">
                                                    <a href="{{url('/')}}/shopping/cart">Annuler</a>
                                                </div>

                                                <div class="col-md-3 payee col-xs-3">
                                                    <input value="Payer" class="button ticket"
                                                           name="submit_ticket_order"
                                                           id="place-order-button"
                                                           type="submit" @php if($i == 0) echo "disabled"; @endphp>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="alert alert-success">
                        <p> Votre achat est épuisé</p>
                        <p>Vous avez
                            commandez {{$ticket_to_pay[0]->pivot->number}} {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->type}}
                            de {{\App\Models\Ticket::find($ticket_to_pay[0]->id)->events()->take(1)->get()[0]->title}}
                            mais vous n'avez pas payez. Alors les tickets sont maintenant épuisés.
                        </p>
                    </div>
                    <div class="row panier_3">
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="thumbnail panier1">
                                <img src="{{url('/public/img/pan.jpg')}}" class="panier0">
                                <div class="caption">
                                    <h3 class="mot_h2">Achetez des autres évènements</h3>
                                    <h5 class="mot_h2"><a href="{{url('/')}}" class="mot_ha">Remplir vos
                                            panier</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="modepaimenent">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('specificScript')

    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script>
        $(function () {
            $('a[title]').tooltip();
        });
    </script>
    <script>
        function changePage(idNow, idNext) {
            //li reto
            $('#li_' + idNext).removeClass('disabled');
            $('#li_' + idNext).addClass('active');
            $('#li_' + idNow).removeClass('active');
            $('#li_' + idNow).addClass('disabled');
            //contenu
            if (idNext == 'doner') {
                $('#form_checkout').submit();
            } else {
                $('#' + idNext).addClass('in active');
                $('#' + idNow).removeClass('in active');
            }
        }
    </script>
    <script>
        function change1Page(idNext, idNow) {
            //li reto
            $('#li_' + idNow).removeClass('active');
            $('#li_' + idNow).addClass('disabled');
            $('#li_' + idNext).removeClass('disabled');
            $('#li_' + idNext).addClass('active');

            //contenu
            $('#' + idNext).addClass('in active');
            $('#' + idNow).removeClass('in active');
        }
    </script>
@endsection
