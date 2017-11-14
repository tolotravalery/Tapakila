@extends('template')
@section('content')
    <div class="container">
        <div class="row performe">
            <div class="col-md-9">
                <div class="about-bg">
                    <h4><strong>Comment vendre des billets ?</strong></h4>
                    <p>leguichet.mg autorise la mise en vente de billets sur sa plateforme. Pour vendre vos billets en trop
                        : </p>
                    <div class="avendre">
                        <ul>
                            <li>
                            	Vous devez être inscrit en tant qu’organisateur. Pour ce faire
                            </li>
                            <li>	Si vous avez déjà un compte sur leguichet.mg il suffit de vous s’authentifier et allez dans le lien <a href="#">« Modifier mes Informations »</a> et cochez « Je suis un Organisateur »
                            </li>
                            <li>
                            	Si vous n’avez pas encore un compte sur leguichet.mg, vous devez remplier les champs dans le menu s’inscrire et n’oubliez pas de cocher « Je suis un Organisateur »                            
                            </li>
                            <li>	Cliquez sur le bouton vert « Ajouter votre évènement » en haut à droite de la page d'accueil.<br>Important : indiquez la manière dont vous souhaitez être payé(e) une fois que les billets auront été vendus.
                            </li>
                            <li>
                                Vérifiez et confirmez votre annonce afin qu'elle puisse être mise à la disposition de millions d'acheteurs potentiels dans le monde entier en sélectionner « publié » dans le select haut à guache.

                            </li>
                        </ul>
                        <br>
                    </div>

                    <h4><strong>Choses importantes à savoir lors de la mise en vente de vos billets :</strong></h4>
                    <div class="avendre">
                        <ul>
                            <li>Donnez à vos acheteurs potentiels le plus d'informations possibles concernant
                                l'emplacement en indiquant le bloc, la rangée et le numéro de la place.
                            </li>
                            <li>Si des billets en place assise sont mis en vente dans une seule annonce, ces places
                                doivent être consécutives.
                            </li>
                            <li>Toute mention spéciale, comme par exemple « billet enfant » ou « vue restreinte » doit
                                figurer clairement.
                            </li>
                            <li>Vérifiez régulièrement les prix auxquels vous avez listé vos billets pour vous assurer
                                qu’ils soient compétitifs.
                            </li>
                            <li>Téléchargez les billets électroniques dès que vous les avez. Ils figureront dans la
                                rubrique Téléchargement instantané sur le site web, et pourront ainsi être vendus plus
                                rapidement.
                            </li>
                            <li>Confirmez rapidement votre vente dès que nous vous aurons informé que les billets ont
                                été vendus.
                            </li>
                            <li>Envoyez vos billets à l'acheteur avant la date limite d'envoi.</li>
                        </ul>
                        <br>
                    </div>
                </div>
            </div>

            <div class="col-md-3 social-bg">
                <div class="espacepersonnel">
                    <h3 class="all">Espace personnel</h3>
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nom d'utilisateur : <sup
                                        class="champsobligatoire">*</sup></label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mots de passe : <sup
                                        class="champsobligatoire">*</sup></label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-7">
                            <div>
                                <a href="#"><span class="fa fa-caret-square-o-right label"> Créer un compte</span></a>
                            </div>
                            <div>
                                <a href="#"><span
                                            class="fa fa-caret-square-o-right label"> Mots de passe oubliè ?</span></a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-menu">connecter</button>
                        </div>
                    </div>
                </div>
                <!-- <div class="newsletter">
                    <h3 class="all">Newletter</h3>
                    Recevez nos dernier actualités !
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse e-mail : <sup
                                        class="champsobligatoire">*</sup></label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp">
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="radio">
                                <label><input type="radio" name="optradio">s'inscrire</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio">Se desinscrire</label>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <button type="button" class="btn btn-primary btn-menu2">Enregistrer</button>
                        </div>
                    </div>
                </div> -->
                {{--<div class="vente">
                    <h3 class="all">Top vente</h3>
                    <div class="row space">
                        <div class="col-md-2">
                            <label class="top10">1</label>
                        </div>
                        <div class="col-md-8">
                            <h5 class="Titre"><strong>Mahaleo</strong></h5>
                            <p>
                            <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                            <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                        </div>
                        </p>
                        <div class="col-md-2">
                            <a href="#"><label class="glyphicon glyphicon-plus mytop"></label></a>
                        </div>

                    </div>
                    <div class="row space">
                        <div class="col-md-2">
                            <label class="top10">2</label>
                        </div>
                        <div class="col-md-8">
                            <h5 class="Titre"><strong>Ambondrona</strong></h5>
                            <p>
                            <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                            <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                        </div>
                        </p>
                        <div class="col-md-2">
                            <a href="#"><label class="glyphicon glyphicon-plus mytop"></label></a>
                        </div>

                    </div>
                    <div class="row space">
                        <div class="col-md-2">
                            <label class="top10">3</label>
                        </div>
                        <div class="col-md-8">
                            <h5 class="Titre"><strong>Bodo</strong></h5>
                            <p>
                            <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                            <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                        </div>
                        </p>
                        <div class="col-md-2">
                            <a href="#"><label class="glyphicon glyphicon-plus mytop"></label></a>
                        </div>

                    </div>
                </div>--}}
            </div>
        </div>
    </div>
@endsection