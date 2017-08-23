@extends('shopping.master')

@section('content')
    <div class="container">
        <ul class="list-inline">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <li><a data-toggle="tab" href="#menu1">Adresse</a></li>
            <li><a data-toggle="tab" href="#menu2">Delivery</a></li>
            <li><a data-toggle="tab" href="#menu3">Payement</a></li>
            <li><a data-toggle="tab" href="#menu4">Summary</a></li>
        </ul>
        <form action="{{url('/shopping/checkout/store')}}" method="POST">
            {!! csrf_field() !!}
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3>HOME</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua.</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam.</p>
                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
                        explicabo.</p>

                    <br/>
                    <center>
                        <button class="btn btn-primary"><< Previous</button>
                        <button class="btn btn-primary" onclick="goToAdresse()" type="button">Next >></button>
                    </center>
                    <br/>
                </div>

                <div id="menu1" class="tab-pane fade">
                    <h3>Adresse de Facturation</h3>

                    <div class="form-group">
                        <label for="email">Nom et prénom:</label>
                        <input type="text" class="form-control" name="fact_name" id="fact_name">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Adresse</label>
                        <input type="text" class="form-control" name="fact_adress" id="fact_adress">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Ville</label>
                        <input type="text" class="form-control" id="fact_city" name="fact_city">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Téléphone</label>
                        <input type="tel" class="form-control" id="fact_phone" name="fact_phone">
                    </div>
                    <div class="form-group">
                        <label for="pwd">E-mail</label>
                        <input type="email" class="form-control" id="fact_mail" name="fact_mail">
                    </div>
                    <br/>
                    <center>
                        <button class="btn btn-primary"><< Previous</button>
                        <button class="btn btn-primary" onclick="goToDelivery()" type="button">Next >></button>
                    </center>
                    <br/>

                    <br/>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Adresse de livraison</h3>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" id="checkbox"> Comme adresse de Facturation</label>
                            </div>
                        </div>
                        <br/>
                        <div id="form">
                            <div class="form-group">
                                <label for="email">Nom et prénom:</label>
                                <input type="text" class="form-control" id="livr_name" name="livr_name">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Adresse</label>
                                <input type="text" class="form-control" id="livr_adress" name="livr_adress">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Ville</label>
                                <input type="text" class="form-control" id="livr_city" name="livr_city">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Téléphone</label>
                                <input type="tel" class="form-control" id="livr_phone" name="livr_phone">
                            </div>
                            <div class="form-group">
                                <label for="pwd">E-mail</label>
                                <input type="email" class="form-control" id="livr_mail" name="livr_mail">
                            </div>
                        </div>

                        <br/>
                        <center>
                            <button class="btn btn-primary"><< Previous</button>
                            <button class="btn btn-primary" onclick="goToPayement()" type="button">Next >></button>
                        </center>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Payement</h3>
                    <p>On a deux modes de Payement : </p>
                    <div class="radio">
                        <input type="radio" name="radio" id="radio_mvola" value="mvola">
                        <span><img src="{{url('/img/mvola.jpg')}}" style="width: 100px; height: 50px;"></span>
                    </div>
                    <div class="radio">
                        <input type="radio" name="radio" id="radio_paypal" value="paypal">
                        <span><img src="{{url('/img/paypal.png')}}" style="width: 100px; height: 50px;"></span>

                    </div>
                    <br/>
                    <center>
                        <button class="btn btn-primary"><< Previous</button>
                        <button class="btn btn-primary" type="submit">Next >></button>
                    </center>
                    <br/>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            function goToAdresse() {
                $('.list-inline a[href="#menu1"]').tab('show');
            }
            function goToDelivery() {
                $('.list-inline a[href="#menu2"]').tab('show');
            }
            function goToPayement() {
                $('.list-inline a[href="#menu3"]').tab('show');
            }

        </script>
    </div>
@endsection
@section('extra-js')
    <script type="text/javascript">
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
    </script>
@endsection
