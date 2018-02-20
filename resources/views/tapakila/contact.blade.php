@extends('template')
@section('title')
    <title>Le Guichet | Contact</title>
@endsection
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">Accueil</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{url('/event/list/categorie',[$menu->id])}}">{{strtoupper($menu->name)}}</a></li>
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
    <br/>
    <div class="container custom-container">
        <div class="bgcontact">
            <h1 class="contactpg">Nous Contacter</h1>
            <p class="text-center text1 hidden-xs">Vous n'avez pas trouvé la reponse à votre question dans notre <a
                        href="{{url('')}}/faq">FAQ ?</a><br>N'hesitez pas à nous écrire ou à nous contactez !</p>
            <p class="text-center text1 hidden-lg hidden-md hidden-sm">Ecrivez-vous !</p>
            <div class="row spac">
                <form action="{{url('/')}}/contact" method="post">
                    {!! csrf_field() !!}
                    <div class="col-md-6 text-center-lg text-center-md text-center-sm text-center-lg-xs">
                            @if (session('message'))
                                <div class="alert alert1 alert-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    <strong>{!! session('message') !!}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom*" name="contacter_name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mail*" name="contacter_mail"
                                @if (!Auth::guest())
                                    @if(strpos(Auth::user()->email,'@test.com')!== false && strpos(Auth::user()->email,'missing') !== false)
                                        value=""
                                    @else
                                       value="{{ Auth::user()->email }}"
                                    @endif
                                @endif required>
                            </div>
                            <div class="form-group">
                                <select class="form-control border">
                                    <option>Organisateur</option>
                                    <option selected="">Acheteur</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Message" id="comment" name="contacter_message" required></textarea>
                                </div>
                            </div>
                            <p class="pull-right olig"><sup>*</sup>&nbsp Champs obligatoire</p>
                        <div class="row">
                            <div class="col-md-3 col-md-offset-4 col-xs-3 col-xs-offset-3 col-sm-3 col-sm-offset-4">
                                <button type="submit" class="btn btn-envoye btn-lg">Envoyer</button>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="col-md-6 ">
                    <div class="row">
                        <div class=" infoline">
                            <ul>
                                <li class=" statictitle"><i class="fa fa-map-marker"></i><b>Antananarivo</b></li>
                                <li class=" statictitle"><i class="fa fa-phone"></i><b>034 44 892 80  /  032 67 530 94</b></li>
                                <li class=" statictitle"><i class="fa fa-envelope"></i><b>contact@leguichet.mg</b></li>
                            </ul>
                        </div>
                        <div class="joinfb">
                            <a target="_blank" href="https://www.facebook.com/leguichetmg-1194557627312755/">
                                <img src="{{url('/')}}/public/img/fbcircle.png">
                                <p class="joins">Nous suivre sur <br>facebook</p></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection