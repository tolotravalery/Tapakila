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
    <div class="container">
        <div class="row performe">
            <div class="col-md-9">
                <div class="about-bg">
                    <img src="{{url('/')}}/public/img/aboutus.png">
                    <h3>QUI SOMMES-NOUS ?</h3>
                    <p style="text-align: justify;">Leguichet.mg est un service de réservation indépendant proposant un accès exlusif aux meilleurs
                       manifestations culturelles ou sportives, en Afrique.</p>
                    <p style="text-align: justify;">Ressentir le public vibrer avant les premières notes, vivre intensément un moment unique, il y a
                        tout ceci et plus dans un évènement live. Mais tout commence avec l’achat d’un billet et
                        malheureusement, cette étape est bien trop souvent synonyme de frustration pour le consommateur.
                        Entre la cohue des mises en ventes, les arnaques, le manque d’informations, ou encore le marché
                        noir, il est bien souvent difficile de se procurer des places pour une manifestation culturelle
                        dans de bonnes conditions.</p>
                    <p style="text-align: justify;">La recette est simple : une équipe de passionnés et un service client aux petits soins. Tous nos
                        billets sont authentiques, côte à côte, garantis, et expédiés avec le sourire sous 48h. Vous
                        pouvez enfin assister aux évènements qui comptent pour vous, et ce en toute sérénité.</p><br>

                    <h3>NOS TARIFS</h3>
                    <p style="text-align: justify;">Nos tarifs diffèrent généralement de ceux des billetteries traditionnelles. En fonction de
                        l’évolution de la demande dans le temps, les prix peuvent en effet être ajustés pour chaque
                        évènement.</p>
                    <p style="text-align: justify;">Les prix peuvent ainsi varier au fil du temps, à la hausse comme à la baisse, et s'éloigner du
                        prix de référence. Cette logique permet d’assurer un taux de remplissage des salles optimal, et
                        de maintenir évènement disponible aussi longtemps que possible.</p><br>

                    <h3>LES PRÉ-RÉSERVATIONS</h3>
                    <p style="text-align: justify;">Pour les évènements à très forte affluence, un service de pré-réservation est susceptible d’être
                        mis en place. En employant la pré-réservation sureguichetLeguichet, vous mandatez notre équipe pour
                        obtenir vos billets, et bénéficiez de la garantie d’obtenir vos places côte à côte dans la
                        catégorie souhaitée.</p>
                    <p style="text-align: justify;">Si un évènement vous intéresse, n’hésitez pas à nous contacter pour demander la mise en place
                        d’une pré-réservation.</p><br>

                    <h3>ORGANISATEURS D'ÉVÈNEMENTS</h3>
                    <p style="text-align: justify;">Vous souhaitez distribuer vos billets via un canal de distribution innovant, et assurer une
                        expérience optimale à vos clients? Vous avez frappé à la bonne porte. Voir FAQ en bas de
                        page</p><br>

                    <h3>SERVICE CORPORATE</h3>
                    <p style="text-align: justify;">Demandes de groupes, entreprises, conciergeries… Ne cherchez plus, notre équipe spécialisée prend
                        en charge tous vos besoins en matière de billetterie.</p>
                    <p style="text-align: justify;">
                        <small><b>Voir FAQ en bas de page</b></small>
                    </p>
                    <br>

                    <h3>LA GARANTIE LEGUICHET</h3>
                    <p style="text-align: justify;"><b>Quand vous achetez sureguichetLeguichet, vous profitez des avantages suivants :</b></p>
                    <ul>
                        <li>La garantie 100% en cas d’annulation de l’évènement par l’organisateur</li>
                        <li>Un paiement en ligne sécurisé</li>
                        <li>Des options de livraisons pour l’économe (lettre suivie) et le pressé (Chronopost)</li>
                        <li>La possibilité de commander au dernier moment grâce à la remise en main propre le jour de
                            l'événement via nos partenaires locaux
                        </li>
                        <li>Un service clientèle à votre écoute par mail ou par téléphone</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 social-bg">
                <div class="espacepersonnel">
                    <h3 class="all"><strong>Espace personnel</strong></h3>
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
                    <h3 class="all"><strong>Newletter</strong></h3>
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
                    <h3 class="all"><strong>Top vente</strong></h3>
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