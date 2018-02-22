@extends('template')
@section('title')
    <title>Le Guichet | 404 </title>
@endsection
@section('content')
    <section>
        <div class="container custom-container">
            <div id="custom-white">
                <div class="row panier_33">
                    <div class="col-lg-6 col-lg-offset-3">
                        <div class="thumbnail panier1">
                            <img src="{{url('/public/img/err404.jpg')}}" class="panier0">
                            <div class="caption">
                                <h3 class="mot_h2">Désolé,<br> la page que vous cherchez n'existe pas</h3>
                                <h5 class="mot_h2"><a href="{{url('/')}}" class="mot_ha">Retour à l'acceuil</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection