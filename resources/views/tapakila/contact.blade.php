@extends('template')
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
                        href="#">FAQ ?</a><br>N'hesitez pas à nous écrire ou à nous contactez !</p>
            <p class="text-center text1 hidden-lg hidden-md hidden-sm">Ecrivez-vous !</p>
            <div class="row spac">
                <div class="col-md-6 text-center-lg text-center-md text-center-sm text-center-lg-xs">
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nom*">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mail*">
                        </div>
                        <div class="form-group">
                            <select class="form-control border">
                                <option>Organisateur</option>
                                <option>Achateur</option>
                                <option>Vendeur</option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Message" id="comment"></textarea>
                            </div>
                        </div>
                        <p class="pull-right olig"><sup>*</sup>&nbsp Champs obligatoire</p>
                    </form>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-4 col-xs-3 col-xs-offset-3 col-sm-3 col-sm-offset-4">
                            <button type="button" class="btn btn-envoye btn-lg">Envoyer</button>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 ">
                    <div class="row">
                        <div class=" infoline">
                            <ul>
                                <li class=" statictitle"><i class="fa fa-map-marker"></i><b>Mahamasina</b></li>
                                <li class=" statictitle"><i class="fa fa-phone"></i><b>032 54 230 24</b></li>
                                <li class=" statictitle"><i class="fa fa-envelope"></i><b>Leguichet@gmail.com</b></li>
                            </ul>
                        </div>
                        <div class="joinfb">
                            <a href="#">
                                <img src="{{url('/')}}/public/img/fbcircle.png">
                                <p class="joins">Nous suivre sur <br>facebook</p></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection