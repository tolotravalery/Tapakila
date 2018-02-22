@extends('template')
@section('title')
    <title>Le Guichet | Panier</title>
@endsection
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
                <form action="{{url('/shopping/checkout')}}" method="POST">
                    <div id="achat-content">
                        <h2 class="titlebuy">Votre Panier</h2>
                        <div class="spacing"></div>
                        <div class="custom-pg">
                            <table class="tabl-content">
                                <thead>
                                <tr>
                                    <th scope="col" class="th_panier "><b class="bold">Evénement</b></th>
                                    <th scope="col"><b class="bold">Ticket</b></th>
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
                                            <p class="tot">
                                                <input type="button" class="toto"
                                                       onclick="btnDeleteItemCart('{{$item->rowId}}')"
                                                       value="X"
                                                       style="border: none;background-color: white;">
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td data-label=""></td>
                                    <td data-label="" class="hidden-xs"></td>
                                    <td data-label="" class="to text-center-xs tttal">Total</td>
                                    <td data-label="" class="tot"><b
                                                class="totaly">{{ Cart::instance('default')->subtotal() }} AR</b></td>
                                    <input type="hidden" name="amount" value="{{ Cart::instance('default')->subtotal() }}"/>
                                    <td data-label=""><p></p></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <h2 class="titlebuy">Mode de paiement</h2>
                        <div class="spacing"></div>
                        <div class="custom-pg">
                            {{--@if(strpos(Auth::user()->email,'@test.com')!== false && strpos(Auth::user()->email,'missing') !== false)--}}
                            {{--<p><b>Adresse e-mail de livraison des tickets :</b></p>--}}
                            {{--<p><i>Nous vous enverrons les infos payment dans cet email</i></p>--}}
                            {{--<input type="email" class="form-control" name="email_livraison">--}}
                            {{--<br>--}}
                            {{--@else--}}
                            <p><b>Adresse e-mail de livraison des tickets :</b> &nbsp {{Auth::user()->email}}&nbsp;&nbsp;&nbsp;<a
                                        href="{{url('/')}}/profile/{{Auth::user()->id}}/edit"
                                        style="color: #d70506">Modifier</a></p>
                            <br>
                            {{--@endif--}}
                            <p><b>Méthode de payment <span style="color:red;">*</span> :</b></p>
                            <div class="modepaimenent">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div id="ticket-radio2">
                                        <div class="btn-group" data-toggle="buttons">
                                            @foreach($payement_mode as $p)
                                                <div class="col-md-6">
                                                    <div class="radio">
                                                        <label class="button">
                                                            @if($p->slug=='telma')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmvola.png"
                                                                     alt="">
                                                            @elseif($p->slug=='orange')
                                                                <img class="logo"
                                                                     src="{{url('/')}}/public/img/logmorange.jpg"
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

                                    {{--<div class="resum hidden" id="numPhone">--}}
                                    {{--<p><b>Numéro téléphone de payment :  <span style="color:red;">*</span>:</b>--}}
                                    {{--</p>--}}
                                    {{--<input type="tel" class="form-control hidden" name="num__phone" id="num__phone">--}}
                                    {{--<br>--}}
                                    {{--</div>--}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="check">
                                                <div class="checkbox">
                                                    <label id="label">
                                                        <input type="checkbox" value="" name="accept" id="case">
                                                        <b style="left: 5px">Cochez cette case pour confirmer que vous avez lu et
                                                            accepté nos <a href="{{url('/')}}/conditions-generales">conditions de service</a>.</b>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="pull-right">
                                                <p><i><span style="color:red;">*</span> Champs obligatoires</i></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center-xs text-center-sm text-center-md menbottom">
                                <div class="col-md-3 achatquiter">
                                    <a href="{{url('/')}}" class="a_color">Continuer vos achats</a>
                                </div>
                                <div class="col-md-2 col-lg-2"></div>
                                <div class="col-md-3 col-lg-3"></div>
                                <div class="col-md-3 col-lg-4">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12 achatquiter kit">
                                            {{--<form action="{{ url('/shopping/emptyCart') }}" method="POST">--}}
                                            {{--{!! csrf_field() !!}--}}
                                            {{--<input type="hidden" name="_method" value="DELETE">--}}
                                            <button type="button" class="a_color"
                                                    style="border: none;background-color: white;" id="btnEmptyCart">
                                                Vider
                                            </button>
                                            {{--</form>--}}
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
                                            {{--<form action="{{url('shopping/checkout')}}" method="post">--}}
                                            {{--                                                {!! csrf_field() !!}--}}
                                            <button type="submit" class="btn btn_paye" id="bouton">Payer</button>
                                            {{--{!! Form::button('Payer1',array(
                                                        'class' 			=> 'btn btn_paye',
                                                        'id' 				=> 'delete_account_trigger1',
                                                        'type' 				=> 'submit',
                                                        'data-toggle' 		=> 'modal',
                                                        'data-submit'       => 'Modifier',
                                                        'data-target' 		=> '#confirmForm',
                                                        'data-modalClass' 	=> 'modal-danger',
                                                    )
                                            ) !!}--}}
                                            {{--</form>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <section>
                    <div class="container custom-container">
                        <div id="custom-white">
                            <h1 class="couleur_mot">Votre Panier</h1>
                            <div class="panier"></div>
                            <div class="alert alert1 alert-success">

                                <p>Cher client, vous pouvez remplir votre panier des évènements qui vous plaisent <a
                                            class="point" href="{{url('/')}}"><b> ICI</b></a> .</p>

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
        <form action="{{ url('/shopping/emptyCart') }}" method="POST" id="formEmptyCart">
            {!! csrf_field() !!}
            <input type="hidden" name="_method" value="DELETE">
        </form>

        <div class="modal fade" id="confirmForm" role="dialog" aria-labelledby="confirmFormLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="text-align: center;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                            <i class="glyphicon glyphicon-alert" style="color:#d70506;font-size: 44px;"></i>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Veuillez cochez la case pour confirmer que vous accepter nos conditions de services
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('specificScript')
    <script>
        $('#bouton').click(function () {
            if($('#case').prop('checked') == false){
                //alert('tsy cocher');
                $('#label').css('border-radius','5px');
                $('#label').css('border','1px solid red');
                $('#label').css('padding','10px 33px');

                $("#bouton").attr("data-toggle", "modal");
                $("#bouton").attr("data-submit", "Modifier");
                $("#bouton").attr("data-target", "#confirmForm");
                $("#bouton").attr("data-modalClass", "modal-danger");
                $('#bouton').click();

                return false;
            }
            else{
                $("#bouton").removeAttr("data-toggle", "modal");
                $("#bouton").removeAttr("data-submit", "Modifier");
                $("#bouton").removeAttr("data-target", "#confirmForm");
                $("#bouton").removeAttr("data-modalClass", "modal-danger");
            }
        });
        (function () {

            $('input[type=radio]').change(function(){
                var value = $( 'input[name=options]:checked' ).val();
                if(value=='orange'){
                    $('#numPhone').hide();
                    $('#num__phone').removeAttr('required');
                }else{
                    $('#numPhone').show();
                    $('#num__phone').attr('required','required');
                }
            });

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

            $('#btnEmptyCart').on('click', function () {
                $('#formEmptyCart').submit();
            })
        })();

        function btnDeleteItemCart(itemId) {
            $.ajax({
                type: "DELETE",
                url: '{{ url("/shopping/cart") }}' + '/' + itemId,
                success: function (data) {
                    window.location.href = '{{ url('/shopping/cart') }}';
                }
            });
        }
    </script>
@endsection
