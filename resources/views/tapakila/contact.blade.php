@extends('template')
@section('content')
    <div class="container ">
        <div class="bg-contact">
            <div class="row ">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h3 class="titreC"><strong>Contact</strong></h3>
                            <div class="contact">
                                <ul>
                                    <li><h4><strong>TAPAKILA</strong></h4></li>
                                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><label
                                                class="informations"><a href="#"> &nbsp Mahamasina T07 </a></label></li>
                                    <li><i class="fa fa-phone" aria-hidden="true"></i><label class="informations"><a
                                                    href="#">&nbsp +261 032 65 065 65</a></label></li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><label class="informations"><a
                                                    href="#">&nbsp Tapakila@trustylabs.mg</a></label></li>
                                    <li><i class="fa fa-twitter" aria-hidden="true"></i><label class="informations"><a
                                                    href="#">&nbsp Tapakila-twitter</a></label></li>
                                    <li><i class="fa fa-facebook" aria-hidden="true"></i><label class="informations"><a
                                                    href="#"> &nbsp Tapakila-facebook</a></label></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-center slogan">Avec Tapakila vous aurrez vos billets d’entrée à nos événements sans
                        frais d'envoi, sans déplacement, sans perdre de temps..."</h3>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-9 col-md-offset-1">
                            <h3 class="titreC"><strong>Se renseigner </strong></h3>
                            <form>
                                <div class="form-group">
                                    <label class="formgroup">Nom :</label><span class="pull-right requiere">Champs obligatoire</span>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label class="formgroup">Adresse é-mail :</label><span class="pull-right requiere">Champs obligatoire</span>
                                    <input type="text" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label class="formgroup">Nature du renseignement :</label><span
                                            class="pull-right requiere">Champs obligatoire</span>
                                    <select class="form-control" id="sel1">
                                        <option>Organisateur</option>
                                        <option>Acheteur</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="formgroup">Message :</label>
                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                </div>
                            </form>

                            <div class="col-md-3 col-md-offset-4">
                                <button type="button" class="btn btn-soumettre">Soumettre</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection