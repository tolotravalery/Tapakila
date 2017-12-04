@extends('template')

@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{$menu->name}}</a></li>
                @endforeach
            </ul>
            <a href="#" class="menupull" id="pull"><strong>Catégories &nbsp <label class="test">&darr;</label></strong></a>
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
    <br>
    <section class="clearfix">
        <div class="container custom-container">
            <ul class="herb">
                <li class=" bounce animated2 zoomIn"><a href="{{url('/')}}"><b>Acceuil</b></a></li>
                <li class=" bounce animated2 zoomIn dernier"><a href=""><b>Panier</b></a></li>
            </ul>
        </div>
    </section>
    <section>
        <div class="container custom-container">
            @if (count(Cart::content()) > 0)
                <div id="achat-content">
                    <h2 class="titlebuy">Votre Panier</h2>
                    <div class="spacing"></div>
                    <div class="custom-pg">
                        <table class="tabl-content">
                            <thead>
                            <tr>
                                <th scope="col" class="th_panier "><b class="bold">Evènement</b></th>
                                <th scope="col"><b class="bold">Tickets</b></th>
                                <th scope="col"><b class="bold">Quantité</b></th>
                                <th scope="col"><b class="bold">Prix</b></th>
                                <th scope="col"><b class="bold"></b></th>
                            </tr>
                            </thead>

                            <tbody>
                            @php
                                $i=0;
                                $question = array();
                            @endphp
                            @foreach (Cart::content() as $item)
                                @php
                                    $ticket = \App\Models\Ticket::findOrFail($item->id);
                                    $event = $ticket->events()->take(1)->get()[0];
                                    if($event->question_secret != null)
                                        $question[$i] =$event->question_secret;
                                    $i++;
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
                                                        <p class="sor"><b>{{$item->name}}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Tickets">VIP</td>
                                    <td data-label="Quantité">
                                        <div class="row">
                                            <div class=" col-xs-12 pull-left">
                                                <div class="row">
                                                    <div class="col-lg-8 col-lg-offset-3 col-xs-12 pull-left">
                                                        <div class="form-group">
                                                            <select class="selectpicker quantity form-control"
                                                                    data-id="{{ $item->rowId }}" id="sel1">
                                                                <?php
                                                                $nombreticket = $ticket->number;
                                                                ?>
                                                                @for($nombre=1;$nombre<=$nombreticket;$nombre++)
                                                                    <option {{ $item->qty == $nombre ? 'selected' : '' }}>{{$nombre}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Prix">{{ $item->subtotal }} AR</td>
                                    <td data-label="">
                                        <form action="{{ url('shopping/cart', [$item->rowId]) }}" method="POST"
                                              class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <p class="tot"><input type="submit" class="toto" value="X"
                                                                  style="border: none;background-color: white;"></p>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td data-label=""></td>
                                <td data-label="" class="hidden-xs"></td>
                                <td data-label="" class="to text-center-xs tttal">Total</td>
                                <td data-label="" class="tot"><b
                                            class="totaly">{{ Cart::instance('default')->subtotal() }} AR</b></td>
                                <td data-label=""><p></p></td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="row text-center-xs text-center-sm text-center-md menbottom">
                            <div class="col-md-3 achatquiter">
                                <a href="{{url('/')}}" class="a_color">Continuer vos achats</a>
                            </div>
                            <div class="col-md-2 col-lg-2"></div>
                            <div class="col-md-3 col-lg-3"></div>
                            <div class="col-md-3 col-lg-4">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12 achatquiter kit">
                                        <form action="{{ url('/shopping/emptyCart') }}" method="POST">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="a_color"
                                                    style="border: none;background-color: white;">Vider
                                            </button>
                                        </form>
                                        {{--<a href="#" class="a_color">Quitter</a>--}}
                                    </div>

                                    <div class="col-md-6 col-xs-12">
                                        {{--@if($question!=null)
                                            <button type="button" class="btn bt_panier"
                                                    onclick="window.location.href='{{url('shopping/quiz')}}';">Commander
                                            </button><a href="{{url('shopping/checkout')}}" class="btn btn-success caisse">Commander</a>
                                        @else
                                            <form action="{{url('shopping/checkout')}}" method="post">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn bt_panier">Commander
                                                </button>
                                            </form>
                                            <a href="{{url('shopping/checkout')}}" class="btn btn-success caisse">Commander</a>
                                        @endif--}}
                                        <form action="{{url('shopping/checkout')}}" method="post">
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn bt_panier">Commander
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @else
                <section>
                    <div class="container custom-container">
                        <div id="custom-white">
                            <h1 class="couleur_mot">Votre Panier</h1>
                            <div class="panier"></div>
							<div class="alert alert1 alert-success">

						<p>Cher client, vous pouvez remplir votre panier des évènements qui vous plaisent  <a class="point" href="{{url('/')}}"><b> ICI</b></a> .</p>

						<hr class="message-inner-separator">
					</div>
                            <div class="row panier_3">
                                <div class="col-lg-6 col-lg-offset-3">
                                    <div class="thumbnail panier1">
                                        <img src="{{url('/public/img/pan.jpg')}}" class="panier0">
                                        <div class="caption">
                                            <h3 class="mot_h2">Votre panier est vide</h3>
                                            <h5 class="mot_h2"><a href="{{url('/')}}" class="mot_ha">Remplir vos
                                                    panier</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        </div>
        </div>
    </section>
@endsection

@section('specificScript')
    <script>
        (function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function () {
                var id = $(this).attr('data-id')
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/shopping/cart") }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function (data) {
                        window.location.href = '{{ url('/shopping/cart') }}';
                    }
                });

            });

        })();

    </script>
@endsection
