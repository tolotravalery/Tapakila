@extends("template")
@section("content")
    <section>
        <div class="container custom-container">
            <div id="custom-white">
                <h1 class="couleur_mot">Oups !</h1>
                <div class="panier"></div>
                {{--<div class="alert alert-success">
                    <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la
                        mise en page avant
                        impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis
                        les
                        années 1500 </p>
                </div>--}}
                <div class="row panier_3">
                    <div class="col-lg-9 ">
                        <div class="thumbnail panier1">
                                <h4 class="mot_h2" style="text-align: justify;">{{$message}}</h4>
                        </div>
                    </div>
                    <div class="col-lg-3 ">
                        <img src="{{url('/public/img/errors.PNG')}}" style="width: 50%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection