@extends('template')

@section('content')
    <div id="background-detail">
        <?php
        $img = "";
        if ($event->image_background == null) {
            $img = "back_defaut.jpg";
        } else {
            $img = $event->image_background;
        }
        ?>
        <img src="{{url('/')}}/img/{{$img}}" style="width:100%;">
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

            <div class="chosetickets">
                <h3>Choisir tickets</h3>
                @if($event->tickets()->count() > 0)
                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <tbody>
                            @php
                                $i=0;
                            @endphp
                            @foreach($event->tickets as $ticket)
                                <tr>

                                    <input type="hidden" id="id{{$i}}" value="{{ $ticket->id }}">
                                    <input type="hidden" id="type{{$i}}" value="{{ $ticket->type }}">
                                    <input type="hidden" id="price{{$i}}" value="{{ $ticket->price }}">
                                    <input type="hidden" id="number{{$i}}" value="{{$ticket->number}}">
                                    <td><strong>{{$ticket->type}}</strong>
                                        <p>Description tickets</p></td>
                                    <td><b>{{$ticket->price}} Ar</b></td>
                                    <td>
                                        <div class="row position">
                                            <div class="col-md-4 col-md-offset-1">
                                                <div class="input-group number-spinner" id="spinner{{$i}}">
                                                     <span class="input-group-btn">
                                                          <button class="btn btn-default btn-circle smoins"
                                                                  data-dir="dwn"><span
                                                                      class="fa fa-minus"></span></button>
                                                     </span>
                                                    <input type="text" id="nombre{{$i}}"  class="form-control text-center" value="0">
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
                                    <!--<form action="{{ url('shopping/cart') }}" method="POST" class="side-by-side">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="id" value="{{ $ticket->id }}">
                                            <input type="hidden" name="type" value="{{ $ticket->type }}">
                                            <input type="hidden" name="price" value="{{ $ticket->price }}">
                                            <input name="addtocart" value="Choisir" class="addtocartbutton" type="submit">
                                        </form>-->

                                    </td>
                                    <td>
                                        @if($ticket->number > 0 )
                                            <span class="couleur_mot hidden-xs">Disponible</span>
                                        @else
                                            <span class="couleur_mot hidden-xs">Epuisé</span>
                                        @endif

                                    </td>

                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                            <input type="hidden" id="isanCheckbox" value="{{$i}}">
                            <tr>
                                <td></td>
                                <td id="total" value-item="huhu"><b>8000 AR</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" id="buttonUpdate" class="btn btn-validé">Valider</button>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="Pcenter">
                        <p class="text-left"> Tickets non disponible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>

        @endsection

        @section('specificScript')
            <script>
                (function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#buttonUpdate').click(function () {
                        var isanCheckbox = $('#isanCheckbox').val();
                        for (var i = 0; i < (isanCheckbox);) {
                            var id = $('#id' + i).val();
                            var type = $('#type' + i).val();
                            var price = $('#price' + i).val();
                            var nombre = $('#nombre' + i).val();
                            var number = $('#number' + i).val();
                            if (nombre == 0) {

                            }
                            else {
                                console.log($('#spinner'+i).find('input').val());

                                //console.log(nombre);

                                $.ajax({
                                    type: "POST",
                                    url: '{{ url("/shopping/cart/") }}',
                                    data: {
                                        'id': id,
                                        'type': type,
                                        'price': price,
                                        'nombre': nombre
                                    },
                                    success: function (data) {
                                        //console.log(data);
                                        window.location.href = '{{ url('/shopping/cart') }}';
                                    }
                                })
                               // var total = price * nombre;
                                // console.log(type+"/"+nombre);

                            }
                            i++;
                        }

                    });
                })();

            </script>

            <script type="text/javascript">
                $('.dropdown-menu ul li a').click(function (event) {
                    event.stopPropagation();
                    $(this).parent().toggleClass('active').siblings().removeClass('active');
                    var target = $(this).attr('href');
                    $('ul li .tab-content ' + target).toggleClass(active);
                });
            </script>
            <script>
                $(function () {
                    var pull = $('#pull');
                    menu = $('#sectioncategorie ul');
                    menuHeight = menu.height();

                    $(pull).on('click', function (e) {
                        e.preventDefault();
                        menu.slideToggle();
                    });

                    $(window).resize(function () {
                        var w = $(window).width();
                        if (w > 320 && menu.is(':hidden')) {
                            menu.removeAttr('style');
                        }
                    });
                });
            </script>
            <!-- script end -->
            </body></html>

            <!-- script start -->
            <script type="text/javascript">
                $('.dropdown-menu ul li a').click(function (event) {
                    event.stopPropagation();
                    $(this).parent().toggleClass('active').siblings().removeClass('active');
                    var target = $(this).attr('href');
                    $('ul li .tab-content ' + target).toggleClass(active);
                });
            </script>
            <script>
                $(function () {
                    var pull = $('#pull');
                    menu = $('#sectioncategorie ul');
                    menuHeight = menu.height();

                    $(pull).on('click', function (e) {
                        e.preventDefault();
                        menu.slideToggle();
                    });

                    $(window).resize(function () {
                        var w = $(window).width();
                        if (w > 320 && menu.is(':hidden')) {
                            menu.removeAttr('style');
                        }
                    });
                });
            </script>
            <script>
                $(document).on('click', '.number-spinner button', function () {
                    var btn = $(this),
                        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
                        newVal = 0;

                    if (btn.attr('data-dir') == 'up') {
                        newVal = parseInt(oldValue) + 1;
                    }
                    else {
                        if (oldValue > 1) {
                            newVal = parseInt(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                    }
                    btn.closest('.number-spinner').find('input').val(newVal);
                });
            </script>
@endsection