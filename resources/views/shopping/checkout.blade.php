@extends('template')

@section('content')

    <!-- header end -->
    <section style="background:#efefe9;">
        <div class="container">
            <div class="row">
                <div class="board">
                    <div class="board-inner">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active" id="li_home">
                                <a href="#home" data-toggle="tab" title="Acceuil">
								<span class="round-tabs one">
								<i class="glyphicon glyphicon-home"></i>
								</span>
                                </a>
                            </li>
                            <li class="disabled" id="li_profile">
                                <a href="#profile" title="Adresse de Facturation">
								<span class="round-tabs two">
								<i class="glyphicon glyphicon-map-marker disable"></i>
								</span>
                                </a>
                            </li>
                            <li class="disabled" id="li_messages">
                                <a href="#messages" title="Adresse de Livraison">
								<span class="round-tabs three">
								<i class="glyphicon glyphicon-send"></i>
								</span>
                                </a>
                            </li>
                            <li class="disabled" id="li_settings">
                                <a href="#settings" title="Paiment">
								<span class="round-tabs four">
								<i class="glyphicon glyphicon-link"></i>
								</span>
                                </a>
                            </li>
                            <li class="disabled" id="li_settings">
                                <a href="#doner" title="Résumer">
								<span class="round-tabs five">
								<i class="glyphicon glyphicon-ok"></i>
								</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form action="{{url('/shopping/checkout/store')}}" method="POST" id="form_checkout">
                        {!! csrf_field() !!}
                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="home">
                                <div class="bgwhite">
                                    <h1 class="head text-center titre">Accueil</h1>
                                    <p class="narrow text-center">
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula
                                        eget
                                        dolor. Aenean massa. Cum sociis natoque
                                        penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam
                                        felis,
                                        ultricies nec, pellentesque
                                        eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo,
                                        fringilla
                                        vel,
                                        aliquet nec, vulputate
                                        eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                                        Nullam
                                        dictum felis eu pede mollis pretium.
                                        Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate
                                        eleifend tellus. Aenean leo ligula,
                                        porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus
                                        in,
                                        viverra quis, feugiat a, tellus.
                                        Phasellus viverra nulla ut metus varius laoreet.

                                    </p>
                                    <p class="text-center">
                                        <a href="#home" title="Acceuil"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="change1Page('home','profile')"><span style="margin-left:10px;"
                                                                                         class="glyphicon glyphicon-circle-arrow-left"></span>
                                            Précédent </a>
                                        <a href="#profile" class="btn btn-success btn-outline-rounded green"
                                           onClick="changePage('home','profile')">Suivant<span style="margin-left:10px;"
                                                                                               class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="profile">
                                <div class="bgwhite">
                                    <h1 class="head text-center titre">Adresse de Facturation</h1>
                                    <div class="container">
                                        <div class="resume">
                                            <div class="form-group">
                                                <label for="name">Nom et prénom:</label>
                                                <input type="name" class="form-control" id="nom" name="fact_name">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Adresse:</label>
                                                <input type="adresse" class="form-control" id="adresse"
                                                       name="fact_adress">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Ville:</label>
                                                <input type="town" class="form-control" id="ville" name="fact_city">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Télephone:</label>
                                                <input type="phone" class="form-control" id="phone" name="fact_phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="pwd">Adresse E-mail:</label>
                                                <input type="mail" class="form-control" id="email" name="fact_mail">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <a href="#home" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded green "
                                           onClick="change1Page('home','profile')">
                                            <span style="margin-left:10px;"
                                                  class="glyphicon glyphicon-circle-arrow-left"></span>
                                            Précédent </a>
                                        <a href="#messages" data-toggle="tab" title="Adresse de Livraison"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="changePage('profile','messages')">Suivant<span
                                                    style="margin-left:10px;"
                                                    class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="messages">
                                <div class="bgwhite">
                                    <h1 class="head text-center">Adresse de livraison</h1>
                                    <div class="container">
                                        <div class="resume">
                                            <div class="form-group">
                                                <label for="mail">Adresse e-mail</label>
                                                <input type="mail" class="form-control" id="e-mail" name="livr_mail">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <a href="#profile" data-toggle="tab" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="changePage('messages','profile')"><span style="margin-left:10px;"
                                                                                            class="glyphicon glyphicon-circle-arrow-left"></span>
                                            Précédent </a>
                                        <a href="#settings" data-toggle="tab" title="Paiment"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="changePage('messages','settings')">Suivant<span
                                                    style="margin-left:10px;"
                                                    class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="settings">
                                <div class="bgwhite">
                                    <h1 class="head text-center titre">Paiement</h1>
                                    <p class="narrow text-center">
                                    <div class="container">
                                        <div class="row">
                                            <div class="paymentCont">
                                                <div class="headingWrap">
                                                    <h3 class="headingTop text-center">Sélectionnez votre méthode de
                                                        paiement
                                                        :</h3>
                                                </div>
                                                <div class="paymentWrap">
                                                    <div class="btn-group paymentBtnGroup btn-group-justified"
                                                         data-toggle="buttons">

                                                        {{--<label class="btn paymentMethod">
                                                            <div class="method master-card"></div>
                                                            <input type="radio" name="options">
                                                        </label>

                                                        <label class="btn paymentMethod">
                                                            <div class="method vishwa"></div>
                                                            <input type="radio" name="options">
                                                        </label>
                                                        <label class="btn paymentMethod">
                                                            <div class="method ez-cash"></div>
                                                            <input type="radio" name="options">
                                                        --}}{{--</label>--}}

                                                        @foreach($payement_mode as $pay)
                                                            @if($pay->value == 'MVola')
                                                                <label class="btn paymentMethod">
                                                                    <div class="method ez-cash"></div>
                                                                    <input type="radio" name="radio" value="MVola">
                                                                </label>
                                                            @elseif($pay->value == 'Airtel Money')
                                                                <label class="btn paymentMethod">
                                                                    <div class="method vishwa"></div>
                                                                    <input type="radio" name="radio"
                                                                           value="Airtel Money">
                                                                </label>

                                                            @elseif($pay->value == 'Orange Money')
                                                                <label class="btn paymentMethod">
                                                                    <div class="method orange"></div>
                                                                    <input type="radio" name="radio"
                                                                           value="Orange Money">
                                                                </label>
                                                            @endif
                                                        @endforeach


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                    <p class="text-center">
                                        <a href="#messages" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="change1Page('messages','settings')"><span style="margin-left:10px;"
                                                                                              class="glyphicon glyphicon-circle-arrow-left"></span>
                                            Précédent </a>
                                        <a href="#doner" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded green"
                                           onClick="changePage('settings','doner')">Suivant<span
                                                    style="margin-left:10px;"
                                                    class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="doner">
                                <div class="bgwhite">
                                    <div class="text-center">
                                        <i class="img-intro icon-checkmark-circle"></i>
                                    </div>
                                    <h1 class="head text-center titre">Résumer</h1>
                                    <div class="container">
                                        <div class="resume-paiment">
                                            <section id="product">
                                                <div class="row">
                                                    <div class="panel panel-primary filterable">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Produit</h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Produit</td>
                                                                    <td>Quantité</td>
                                                                    <td>Prix</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mahaleo</td>
                                                                    <td>3</td>
                                                                    <td>12.000 Ar</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Samoela</td>
                                                                    <td>2</td>
                                                                    <td>15.000 AR</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <section id="Adresse-facturation">
                                                <div class="row">
                                                    <div class="panel panel-primary filterable">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Adresse de Facturation</h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Mr Rakotoniaina</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <section id="adresse-livrason">
                                                <div class="row">
                                                    <div class="panel panel-primary filterable">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Adresse de Livraison</h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <td>Mr Rakotoniaina</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <section id="mode-paiement">
                                                <div class="row">
                                                    <div class="panel panel-primary filterable">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Produit</h3>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <td><img class="mode" src="img/mvola.png"></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-center">
                                                    <a href="#settings" data-toggle="tab"
                                                       class="btn btn-success btn-outline-rounded green"
                                                       onClick="change1Page('settings','doner')"><span
                                                                style="margin-left:10px;"
                                                                class="glyphicon glyphicon-circle-arrow-left"></span>
                                                        Précédent </a>
                                                    <a href="#doner" class="btn btn-success btn-outline-rounded green"
                                                       onClick="changePage('doner','doner')">Continuer<span
                                                                style="margin-left:10px;"
                                                                class="glyphicon glyphicon-circle-arrow-right"></span></a>
                                                </p>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('specificScript')
    {{--<script type="text/javascript">

        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });

        $('#checkbox').change(function () {
            this.checked ? checkboxIsChecked() : checkboxIsNotChecked;
        });
        function checkboxIsChecked() {
            $('#livr_name').val($('#fact_name').val());
            $('#livr_adress').val($('#fact_adress').val());
            $('#livr_city').val($('#fact_city').val());
            $('#livr_phone').val($('#fact_phone').val());
            $('#livr_mail').val($('#fact_mail').val());
            $('#form').addClass("hidden");
        }
        function checkboxIsNotChecked() {
            $('#form').removeClass("hidden");
        }

        $(function () {
            $('a[title]').tooltip();
        });
    </script>--}}

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
