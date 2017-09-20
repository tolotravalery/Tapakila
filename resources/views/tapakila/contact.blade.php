@extends('template')
@section('content')
    <div class="container custom-container">
        <div class="bgcontact">
            <h1 class="contactpg">Contact</h1>
            <div class="row">
                <div class="col-lg-5">
                    <div class="slogan">
                        Avec Tapakila vous aurrez vos billets
                        d'entrée à nos événement sans frais
                        d'envoi ,sans déplacement,
                        sans perdre de temps...
                    </div>
                    <div class="spaceconect"></div>
                    <div class="infoline">
                        <h2>Infoline </h2>
                        <ul>
                            <li class=" statictitle"><i class="fa fa-home"></i><b>Mahamasina</b></li>
                            <li class=" statictitle"><i class="fa fa-phone"></i><b>032 54 230 24</b></li>
                            <li class=" statictitle"><i class="fa fa-envelope"></i><b>Trustylabs@gmail.com</b></li>
                            <li class=" statictitle"><i class="fa fa-globe"
                                                        aria-hidden="true"></i><b>www.Tapakila.com</b></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-7">
                    <h2 class="message">Laissez nous un message</h2>
                    <div class="spacemessage"></div>
                    <form id="formcontact">

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label statictitle ">Nom<sup class="require1">*</sup></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control border" id="inputPassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label statictitle">Email/Phone <sup
                                        class="require2">*</sup> </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control border" id="inputPassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label statictitle">Organisateur <sup
                                        class="require3">*</sup></label>
                            <div class="col-sm-9">
                                <select class="form-control border" id="sel1">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label statictitle">Votre message<sup
                                        class="require4">*</sup> </label>
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-success pull-right btnenvoie">Envoyer</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <label class="labely pull-right"><sup class="require5">*</sup> : champs obligatoire</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- social footer start -->

            <div class="row ico-social">
                <div class="col-lg-6 footer-social">
                    <a href="#" target="_blank"><img class="social" src="{{url('/')}}/img/facebook.png"></a>
                    <a href="#" target="_blank"><img class="social" style="border-radius: 16px;"
                                                     src="{{url('/')}}/img/twit.png"></a>
                    <a href="#" target="_blank"><img class="social" src="{{url('/')}}/img/google-plus.png"></a>
                    <a href="#" target="_blank"><img class="social" src="{{url('/')}}/img/dribbble.png"></a>
                </div>


            </div>

            <!-- social end footer -->
        </div>
    </div>
@endsection