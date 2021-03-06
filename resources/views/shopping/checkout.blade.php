@extends('template')
@section('title')
    <title>Le Guichet | Paiement</title>
@endsection
@section('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries_sample.css">
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
    <section>
        <form action="{{url('/shopping/checkout/save')}}" method="POST">
            <div class="container custom-container">
                <div id="achat-content">
                    <h2 class="titlebuy">Votre Commande</h2>
                    <div class="spacing"></div>
                    <div class="custom-pg">
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
                            @foreach (Cart::content() as $item)
                                @if($data != null)
                                    @php($temp=0)
                                    @foreach($data as $d)
                                        @php
                                            $ticket = \App\Models\Ticket::findOrFail($item->id);
                                            $event = $ticket->events()->take(1)->get()[0];
                                            $reponse = "";
                                            if($d['ev'] == $event->id)
                                                $reponse = $d['ans'];
                                            else
                                                $reponse = "";
                                        @endphp
                                        @if($temp!=$item->id)
                                            <tr>
                                                <td data-label="">
                                                    <div class="row">
                                                        <div class=" col-xs-12 ">
                                                            <div class="row">
                                                                <div class="col-lg-7 ">
                                                                    <div class="thumbnail imgpaiment">
                                                                        <a href="{{url('event/show',[$event->id])}}">
                                                                            <img src="{{url('/public/img/'.$event->image)}}"
                                                                                 class="image_panier">
                                                                        </a>
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
                                                <input type="hidden" name="answer[]" value="{{$reponse}}">
                                                <input type="hidden" name="event[]" value="{{$event->id}}">
                                                <td data-label="Tickets">{{$ticket->type}}</td>
                                                <td data-label="Quantité">{{$item->qty}}</td>
                                                <td data-label="Prix">{{ $ticket->price *  $item->qty}}</td>
                                            </tr>
                                            @php($temp=$item->id)
                                        @endif
                                    @endforeach
                                @else
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
                                                                <a href="{{url('event/show',[$event->id])}}">
                                                                    <img src="{{url('/public/img/'.$event->image)}}"
                                                                         class="image_panier">
                                                                </a>
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
                                        <input type="hidden" name="answer[]" value="">
                                        <input type="hidden" name="event[]" value="">
                                        <td data-label="Tickets">{{$ticket->type}}</td>
                                        <td data-label="Quantité">{{$item->qty}}</td>
                                        <td data-label="Prix">{{ $ticket->price *  $item->qty}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-5 col-md-8 col-md-offset-4 Fraisservice ">
                                <p><b class="tright">Frais de service :</b>0 AR </p>
                                <p><b class="t2right">Somme Total à payer : </b>
                                    <label class="TT">{{ Cart::instance('default')->subtotal() }} AR</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    @if($data!=null)
                        <h2 class="titlebuy">Question(s) secrète(s) / Réponse(s)</h2>
                        <div class="spacing"></div>
                        <div class="custom-pg">
                            <div class="resum">
                                <table class="tabl-content">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="th_panier "><b class="bold">Evènement</b></th>
                                        <th scope="col"><b class="bold">Question</b></th>
                                        <th scope="col"><b class="bold">Réponse</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach (Cart::content() as $item)
                                        @php($temporaire = 0)
                                        @foreach($data as $d)
                                            @php
                                                $ticket = \App\Models\Ticket::findOrFail($item->id);
                                                $event = $ticket->events()->take(1)->get()[0];
                                            @endphp
                                            @if($d['ev'] == $event->id)
                                                @if($temporaire!=$item->id)
                                                    <tr>
                                                        <td data-label="">
                                                            <div class="row">
                                                                <div class=" col-xs-12 ">
                                                                    <div class="row">
                                                                        <div class="col-lg-7 ">
                                                                            <div class="thumbnail imgpaiment">
                                                                                <a href="{{url('event/show',[$event->id])}}">
                                                                                    <img src="{{url('/public/img/'.$event->image)}}"
                                                                                         class="image_panier">
                                                                                </a>
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
                                                        <input type="hidden" name="answer[]" value="{{$reponse}}">
                                                        <input type="hidden" name="event[]" value="{{$event->id}}">
                                                        <td data-label="Question">{{$event->question_secret}}</td>
                                                        <td data-label="Réponse">{{$d['ans']}}</td>
                                                    </tr>
                                                    @php($temporaire=$item->id)
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>
                    @endif
                    <h2 class="titlebuy">Mode de paiement</h2>
                    <div class="spacing"></div>
                    <div class="custom-pg">
                        @if(strpos(Auth::user()->email,'@test.com')!== false && strpos(Auth::user()->email,'missing') !== false)
                            <p><b>Adresse e-mail de livraison des tickets :</b></p>
                            <p><i>Nous vous enverrons les infos payment dans cet email</i></p>
                            <input type="email" class="form-control" name="email_livraison">
                            <br>
                        @else
                            <p><b>Adresse e-mail de livraison des tickets :</b> &nbsp {{Auth::user()->email}}&nbsp;&nbsp;&nbsp;<a
                                        href="{{url('/home')}}" style="color: #d70506">Edit</a></p>
                            <br>
                        @endif
                        <p><b>Méthode de payment <span style="color:red;">*</span> :</b></p>
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
                                                        <label class="btn btn-customs   pull-right">
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
                                        <div class="pull-right">
                                            <p><i><span style="color:red;">*</span> Champs obligatoires</i></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="Ttal row">

                                    <div class="row text-center-xs text-center-sm text-center-md menbottom">
                                        <div class="col-md-3 col-lg-3"></div>
                                        <div class="col-md-2 col-lg-2"></div>
                                        <div class="col-md-3 col-lg-3"></div>
                                        <div class="col-md-3 col-lg-4">
                                            <div class="row">
                                                <div class="col-md-6 col-xs-12 achatquiter kit annultnt ">
                                                    <a class="btnanul" href="{{url('/')}}/shopping/cart">Annuler</a>
                                                </div>

                                                <div class="col-md-6 payee col-xs-12">
                                                    <input value="Payer" class="button ticket"
                                                           name="submit_ticket_order" id="place-order-button"
                                                           type="submit" @php if(Cart::count() == 0) echo "disabled"; @endphp>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
