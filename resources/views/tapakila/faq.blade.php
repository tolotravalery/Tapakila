@extends('template')
@section('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/css/styles.css">
@endsection
@section('content')
    <div class="container">
        <div class="auu">
            <h3>Bienvenue sur Tapakila</h3>
            <h2>Centre d'Aide</h2>
        </div>


        <div class="row tab_client">
            <div class="col-lg-4 col-lg-offset-4">
                <ul class="nav nav-tabs nav-tabs2 tabs0">
                    <li class="active ">
                        <a href="#1" data-toggle="tab" onClick="changePage('div_compte', 'a_compte')">Pour les
                            acheteurs</a>
                    </li>
                    <li><a href="#2" data-toggle="tab" onClick="changePage('div_compte2', 'a_compte2')">Pour les
                            vendeurs</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">

                <div class="tab-content ">
                    <div class="tab-pane active" id="1">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="menu_FQ">

                                    <div id='cssmenu'>
                                        <ul id="coco">
                                            <li class='active has-sub generale'
                                                onClick="changePage('div_compte', 'a_compte')" id="a_compte"><a
                                                        href='#'><span class="glyphicon glyphicon-exclamation-sign"
                                                                       aria-hidden="true"></span>Generale</a>
                                            <li>
                                            <li class='active has-sub' id="li_achat_billet"><a href='#'><span
                                                            class="glyphicon glyphicon-tags" aria-hidden="true"></span>Acheter
                                                    les billets</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_billets_acheter"
                                                             onClick="changePage('div_billets_acheter', 'a_billets_acheter', 'li_achat_billet')">
                                                            Commment acheter des billets sur Tapalika?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_places_acheter"
                                                             onClick="changePage('div_places_acheter', 'a_places_acheter', 'li_achat_billet')">
                                                            Les places seront-elles adjacentes ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_places_situee"
                                                             onClick="changePage('div_places_situee', 'a_places_situee', 'li_achat_billet')">
                                                            Où mes places seront-elles situées ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_personnel"
                                                             onClick="changePage('div_billets_personnel', 'a_billets_personnel', 'li_achat_billet')">
                                                            Puis-je acheter des billets personnalisés sur lesquels
                                                            figure le nom de quelqu'un d'autre ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>

                                            <li class='active has-sub' id="li_recevoir_place"><a href='#'><span
                                                            class="glyphicon glyphicon-bed" aria-hidden="true"></span>Recevoir
                                                    vos places</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_billets_recu"
                                                             onClick="changePage('div_billets_recu', 'a_billets_recu', 'li_recevoir_place')">
                                                            Quand vais-je recevoir mes billets ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_download"
                                                             onClick="changePage('div_billets_download', 'a_billets_download', 'li_recevoir_place')">
                                                            Comment télécharger mes billets électroniques ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_voyage"
                                                             onClick="changePage('div_billets_voyage', 'a_billets_voyage', 'li_recevoir_place')">
                                                            Je voyage - Où et quand vais-je recevoir mes billets ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_livraison"
                                                             onClick="changePage('div_billets_livraison', 'a_billets_livraison', 'li_recevoir_place')">
                                                            Comment modifier mon adresse de livraison ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_retirer"
                                                             onClick="changePage('div_billets_retirer', 'a_billets_retirer', 'li_recevoir_place')">
                                                            Où et quand dois-je retirer mes billets ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_plutot"
                                                             onClick="changePage('div_billets_plutot', 'a_billets_plutot', 'li_recevoir_place')">
                                                            Puis-je retirer mes billets le jour de l'événement plutôt
                                                            que de les recevoir par courrier ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_different"
                                                             onClick="changePage('div_billets_different', 'a_billets_different', 'li_recevoir_place')">
                                                            Pourquoi le prix imprimé sur le billet est-il différent de
                                                            celui que j'ai payé ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_nom"
                                                             onClick="changePage('div_billets_nom', 'a_billets_nom', 'li_recevoir_place')">
                                                            Pourquoi il y a-t-il un autre nom sur mes billets ?
                                                        </div>

                                                    </li>

                                                </ul>
                                            </li>

                                            <li class='active has-sub' id="li_question_ann"><a href='#'><span
                                                            class="glyphicon glyphicon-minus-sign"
                                                            aria-hidden="true"></span>Questions
                                                    d'annulations</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_ev"
                                                             onClick="changePage('div_ev', 'a_ev', 'li_question_ann')">
                                                            <span class="glyphicon glyphicon-minus-sign"
                                                                  aria-hidden="true"></span> Puis-je annuler ou modifier
                                                            mon achat
                                                            ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_annulation_evenement"
                                                             onClick="changePage('div_annulation_evenement', 'a_annulation_evenement')">
                                                            <span class="glyphicon glyphicon-minus-sign"
                                                                  aria-hidden="true"></span> Mon événement a été annulé
                                                            ou reprogrammé
                                                            - Que dois-je faire?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>

                                            <li class='active has-sub' id="li_receive_paiement"><a href='#'><span
                                                            class="glyphicon glyphicon-shopping-cart"
                                                            aria-hidden="true"></span>Recevez
                                                    votre paiement</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_favoris"
                                                             onClick="changePage('div_favoris', 'a_favoris', 'li_receive_paiement')">
                                                            Quelles sont les méthodes de paiement acceptées ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_paiement-refuser"
                                                             onClick="changePage('div_paiement-refuser', 'a_paiement-refuser', 'li_receive_paiement')">
                                                            Mon paiement a été refusé
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>

                                            <li class='active has-sub' id="li_gerer_compte"><a href='#'><span
                                                            class="glyphicon glyphicon-user" aria-hidden="true"></span>Gérer
                                                    mon
                                                    compte</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_news"
                                                             onClick="changePage('div_news', 'a_news', 'li_gerer_compte')">
                                                            J'ai saisi une adresse e-mail incorrecte lors de
                                                            l'inscription, comment puis-je la modifier ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_email"
                                                             onClick="changePage('div_compte_email', 'a_compte_email', 'li_gerer_compte')">
                                                            Comment modifier l'adresse e-mail de mon compte ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_pswd"
                                                             onClick="changePage('div_compte_pswd', 'a_compte_pswd', 'li_gerer_compte')">
                                                            Comment réinitialiser mon mot de passe ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_newsletter"
                                                             onClick="changePage('div_compte_newsletter', 'a_compte_newsletter', 'li_gerer_compte')">
                                                            Comment se désinscrire de la newsletter ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_commande"
                                                             onClick="changePage('div_compte_commande', 'a_compte_commande', 'li_gerer_compte')">
                                                            Pourquoi est-ce que je ne peux pas voir ma commande ou vente
                                                            dans mon compte ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>
                                            <li class='active has-sub' id="li_a_propos"><a href='#'><span
                                                            class="glyphicon glyphicon-exclamation-sign"
                                                            aria-hidden="true"></span>A propos de Tapakila</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_tapakila_definition"
                                                             onClick="changePage('div_tapakila_definition', 'a_tapakila_definition', 'li_a_propos')">
                                                            Qu'est-ce que Tapakila ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_garantie"
                                                             onClick="changePage('div_tapakila_garantie', 'a_tapakila_garantie', 'li_a_propos')">
                                                            Qu'est-ce que la garantie Tapakila?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_recouvre"
                                                             onClick="changePage('div_tapakila_recouvre', 'a_tapakila_recouvre', 'li_a_propos')">
                                                            Que recouvrent les frais Tapakila?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_terme"
                                                             onClick="changePage('div_tapakila_terme', 'a_tapakila_terme', 'li_a_propos')">
                                                            Quelles sont les Termes et Conditions de Tapalika ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_contact"
                                                             onClick="changePage('div_tapakila_contact', 'a_tapakila_contact', 'li_a_propos')">
                                                            Comment puis-je contacter Tapakila ?
                                                        </div>

                                                    </li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div id="div_compte">
                                    <div class="centre">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <h4 class="titre"><span class="glyphicon glyphicon-tags"
                                                                        aria-hidden="true"></span> Acheter les billets
                                                </h4>

                                                <p>
                                                    <a onClick="changePage('div_billets_acheter', 'a_billets_acheter', 'li_achat_billet')">Comment
                                                        acheter les billets sur Tapakila ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_places_acheter', 'a_places_acheter', 'li_achat_billet')">Les
                                                        places seront-elles adjacents ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_places_situee', 'a_places_situee', 'li_achat_billet')">Où
                                                        mes places seront-elles situées ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_personnel', 'a_billets_personnel', 'li_achat_billet')">Puis-je
                                                        acheter des billets personnalisés sur lesquels figure le nom de
                                                        quelqun d'autre ?</a></p>


                                            </div>
                                            <div class="col-lg-6">

                                                <h4 class="titre"><span class="glyphicon glyphicon-bed"
                                                                        aria-hidden="true"></span> Recevoir vos places
                                                </h4>

                                                <p>
                                                    <a onClick="changePage('div_billets_recu', 'a_billets_recu', 'li_recevoir_place')">Quand
                                                        vais-je reçevoir mes billets ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_download', 'a_billets_download', 'li_recevoir_place')">Comment
                                                        télécharger mes billets éléctroniques ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_voyage', 'a_billets_voyage', 'li_recevoir_place')">Je
                                                        voyage - Où et quand vais-je reçevoir mes billets ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_livraison', 'a_billets_livraison', 'li_recevoir_place')">Comment
                                                        modifier moin adresse de livraison ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_retirer', 'a_billets_retirer', 'li_recevoir_place')">Où
                                                        et quand dois-je retiré mes billets ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_plutot', 'a_billets_plutot', 'li_recevoir_place')">Puis-je
                                                        retirer mes billets le jour de l'évenement plûtot que de les
                                                        recevoir par courrier ? </a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_different', 'a_billets_different', 'li_recevoir_place')">Pouquoi
                                                        le prix imprimé sur le billet est-il différent de celui que j'ai
                                                        payé ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_nom', 'a_billets_nom', 'li_recevoir_place')">Pourquoi
                                                        il y a-t-il un autre nom sur mes billets ?</a></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                        aria-hidden="true"></span> Questions
                                                    d'annulations</h4>


                                                <p><a onClick="changePage('div_ev', 'a_ev', 'li_question_ann')">Mon
                                                        événement a été annulé ou reprogrammé - Que dois-je faire ?</a>
                                                </p>

                                                <p>
                                                    <a onClick="changePage('div_annulation_evenement', 'a_annulation_evenement', 'li_question_ann')">Puis-je
                                                        acheter des billets personnalisés sur lesquels figure le nom de
                                                        quelqun d'autre ?</a></p>


                                            </div>
                                            <div class="col-lg-6">
                                                <a>
                                                    <h4 class="titre"><span class="glyphicon glyphicon-shopping-cart"
                                                                            aria-hidden="true"> Recevez votre paiement
                                                    </h4></a>
                                                <p>
                                                    <a onClick="changePage('div_favoris', 'a_favoris', 'li_receive_paiement')">Quelles
                                                        sont les méthodes de paiement acceptées ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_paiement-refuser', 'a_paiement-refuser', 'li_receive_paiement')">Mon
                                                        paiement a été refusé</a></p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4 class="titre"><span class="glyphicon glyphicon-user"
                                                                        aria-hidden="true"> Gérer mon compte</h4>
                                                <p><a onClick="changePage('div_news', 'a_news', 'li_gerer_compte')">J'ai
                                                        saisi une adresse e-mail incorrecte lors de l'inscription,
                                                        comment
                                                        puis-je la modifier ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_email', 'a_compte_email', 'li_gerer_compte')">Comment
                                                        modifier l'adresse e-mail de mon compte ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_pswd', 'a_compte_pswd', 'li_gerer_compte')">Comment
                                                        réinitialiser mon mot de passe ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_newsletter', 'a_compte_newsletter', 'li_gerer_compte')">Comment
                                                        se désinscrire de la newsletter ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_commande', 'a_compte_commande', 'li_gerer_compte')">
                                                        Pourquoi est-ce que je ne peux pas voir ma commande ou vente
                                                        dans mon compte ?</a></p>

                                            </div>
                                            <div class="col-lg-6">
                                                <a><h4 class="titre"><span class="glyphicon glyphicon-exclamation-sign"
                                                                           aria-hidden="true">   A propos de Tapakila
                                                    </h4></a>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_definition', 'a_tapakila_definition', 'li_a_propos')">Qu'est-ce
                                                        que Tapakila ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_garantie', 'a_tapakila_garantie', 'li_a_propos')">Qu'est-ce
                                                        que la garantie Tapakila?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_recouvre', 'a_tapakila_recouvre', 'li_a_propos')">
                                                        Que recouvrent les frais Tapakila?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_terme', 'a_tapakila_terme', 'li_a_propos')">
                                                        Quelles sont les Termes et Conditions de Tapalika ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_contact', 'a_tapakila_contact', 'li_a_propos')">
                                                        Comment puis-je contacter Tapakila ?</a></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div id="div_billets_acheter" class="hide">
                                    <div class="centre">
                                        <h4 class="titre"> Commment acheter des billets sur Tapakila?</h4>
                                        <br><br>
                                        <div class="ptxl">
                                            <p><br/>&nbsp;Acheter des billets sur Tapalika est très simple, il vous
                                                suffit de suivre les instructions ci-dessous:</p><br>
                                            <p><strong>1&nbsp;</strong>&nbsp;Commencez par recherchez l'événement auquel
                                                vous souhaitez assister dans la barre de recherche où il est écrit:
                                                Chercher un événement...</p>
                                            <p><strong>2&nbsp;</strong>&nbsp;Cliquez sur la date que vous souhaitez</p>
                                            <p><strong>3&nbsp;</strong>&nbsp;Selectionez la quantité de billets désirée
                                            </p>
                                            <p><strong>4&nbsp;</strong>&nbsp;Choisissez vos billets parmi les listings
                                                disponibles</p>
                                            <p><strong>6&nbsp;</strong>&nbsp;Suivez les différentes étapes &ndash;&nbsp;
                                                vérifiez que votre adresse email, numéro de téléphone &amp; adresse sont
                                                corrects</p>
                                            <p><strong>7&nbsp;</strong>&nbsp;Verifiez les détails de votre commande pour
                                                vous assurez que tout vous convient&nbsp;</p>
                                            <p><strong>8&nbsp;</strong>&nbsp;Achetez vos billets!&nbsp;</p>
                                        </div>


                                    </div>
                                </div>
                                <div id="div_places_acheter" class="hide">
                                    <div class="centre">
                                        <h4 class="titre">Les places seront-elles adjacentes ?</h4>
                                        <br><br>
                                        Oui, les billets achetés sur une même annonce seront consécutifs, sauf
                                        indication contraire transmise lors du processus d'achat.
                                        <br><br>

                                        Les billets faisant partie de la catégorie « Place non réservée » n'ont pas
                                        d'emplacement spécifique. Les billets faisant partie de la catégorie « admission
                                        générale » correspondent généralement à des places debout.


                                    </div>
                                </div>
                                <div id="div_places_situee" class="hide">
                                    <div class="centre">
                                        <h4 class="titre"> Où mes places seront-elles situées ?</h4>
                                        <br><br>
                                        <div class="ptxl">
                                            Les informations relatives au bloc et à la rangée figurant sur le billet
                                            sont indiquées sur la page de l'événement, lors de l'achat et sous Mon
                                            compte.
                                            La carte interactive figurant sur la page de l'événement vous aidera à
                                            déterminer votre emplacement.
                                            <br><br>
                                            Tapakila autorise des vendeurs tiers à vendre des billets sur sa plateforme,
                                            et transmet les informations relatives à l'emplacement telles que fournies
                                            par les vendeurs.
                                            <br><br>
                                            N'oubliez pas que vous disposerez de places adjacentes si vous achetez des
                                            billets vendus sur une seule annonce, sauf indication contraire transmise
                                            lors du processus d'achat.

                                        </div>


                                    </div>
                                </div>
                                <div id="div_billets_personnel" class="hide">
                                    <div class="centre">
                                        <h4 class="titre">Puis-je acheter des billets personnalisés sur lesquels figure
                                            le nom de quelqu'un d'autre ?</h4>

                                        <br><br>

                                        Oui, Tapalika autorise des vendeurs tiers, notamment des particulier, à mettre
                                        en ventedes billets sur sa plateforme. Il se peut que le nom de l'acheteur
                                        d'origine figure sur les billet, ces billets sont valables. Vous n'êtes pas
                                        obligé(e) de posséder un billet à votre nom pour accéder à l'événement.


                                    </div>
                                </div>
                                <div id="div_billets_recu" class="hide">
                                    <div class="centre">
                                        <h4 class="titre"><span class="glyphicon glyphicon-bed"
                                                                aria-hidden="true"></span> Quand vais-je recevoir mes
                                            billets ?</h4>

                                        <br><br> Vous devriez recevoir vos billets papier ou électroniques au cours de
                                        la semaine précédant l'événement.
                                        Les billets étant en général émis par les organisateurs une semaine avant la
                                        date de l'événement.
                                        <br>
                                        <p>Si vous avez acheté des billets en téléchargement immédiat, ils pourront être
                                            imprimés quasiment tout de suite.
                                        </p>
                                        <p>Vous pouvez suivre le statut de votre commande dans la rubrique Achats. </p>
                                        Comment vous assurer que vous recevrez vos billets à temps :
                                        <ul class='ul'>
                                            <li>Assurez-vous que l'adresse de livraison est correcte. Vérifiez votre
                                                adresse de livraison <a href="/secure/myaccount/address">ici</a>.
                                            </li>
                                            <li>Assurez-vous que vous avez sélectionné une adresse de livraison à
                                                laquelle une personne sera présente pour signer
                                                le bordereau de livraison, votre adresse professionnelle par example.
                                            </li>
                                            <li>Si vous voyagez pour vous rendre à l'événement, <a
                                                        href="/secure/myaccount/purchases"> ajoutez dès que possible
                                                    votre
                                                    adresse de voyage ainsi qu'une estimation de votre date de
                                                    départ</a>.
                                                Nous ferons en sorte que vos billets soient envoyés à la bonne adresse.
                                            </li>
                                            <li>Veuillez vous assurer que le numéro de téléphone enregistré dans votre
                                                compte est correct afin que nous puissions
                                                vous contacter en cas de nécessité.
                                            </li>
                                        </ul>


                                    </div>

                                </div>

                                <div id="div_billets_download" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Comment télécharger mes
                                            billets électroniques
                                            ?</h4>

                                        <br><br> Lorsque vos billets sont prêts à être téléchargés, vous recevez un
                                        e-mail de notre part avec un lien
                                        pour le téléchargement. En cliquant sur ce lien, vous pouvez voir et imprimer
                                        les billets ou les télécharger pour
                                        les sauvegarder en tant que fichier PDF. Merci de noter que seule une copie du
                                        code barre ne sera acceptée à l'événement.
                                        <br> Vos billets seront également disponibles dans la section Achats de votre
                                        compte, il vous suffira de suivre
                                        les instructions pour les télécharger.

                                    </div>

                                </div>

                                <div id="div_billets_voyage" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Je voyage - Où et quand
                                            vais-je recevoir
                                            mes billets ?</h4>

                                        <br><br> Vous devez voyager pour vous rendre à l'événement ? Ne vous inquiétez
                                        pas, Tapakila possède un réseau
                                        global de près de 60 sites web : les billets peuvent être livrés n'importe où à
                                        travers le monde.
                                        <br><br> Si vous voyagez pour vous rendre à l'événement, ajoutez dès que
                                        possible votre adresse de voyage et la
                                        date étimée de votre départ. Vos billets pourront ainsi être envoyés à la bonne
                                        adresse une fois prêts pour l'expédition.

                                    </div>

                                </div>
                                <div id="div_billets_livraison" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Comment modifier mon adresse
                                            de livraison
                                            ?</h4>

                                        <br><br> Vous pouvez modifier votre adresse de livraison à tout moment jusqu'à
                                        l'envoi de vos billets. Consultez
                                        la rubrique Achats et cliquez sur le bouton « Modifier l'adresse de livraison ».
                                        <br> Vous pouvez sélectionner une adresse différente sur la liste ou saisir une
                                        nouvelle adresse. Vous recevrez
                                        un e-mail vous informant de la mise à jour de votre adresse de livraison.


                                    </div>

                                </div>
                                <div id="div_billets_retirer" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Où et quand dois-je retirer
                                            mes billets
                                            ?</h4>

                                        <br><br> Dans le cas où vos billets devraient être récupérés sur le lieu ou à
                                        proximité de l'événement, vous recevrez
                                        en temps voulu un e-mail indiquant l'adresse du point de retrait.

                                        <br> Vous pouvez également consulter les instructions dans la rubrique Achats en
                                        cliquant sur le lien « Consulter
                                        les instructions de retrait ».

                                    </div>

                                </div>
                                <div id="div_billets_plutot" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Puis-je retirer mes billets
                                            le jour de
                                            l'événement plutôt que de les recevoir par courrier ?</h4>

                                        <br><br> Non, si un billet a été programmé pour être livré, il ne peut pas être
                                        retiré.

                                        <br> Vous devriez recevoir vos billets au cours de la semaine précédant
                                        l'événement. Les organisateurs émettant
                                        le plus souvent les billets (y compris électroniques) environ une semaine avant
                                        la date de l'événement.
                                        <br> Si vous voyagez pour vous rendre à l'événement, ajoutez dès que possible
                                        votre adresse de voyage ainsi que
                                        la date estimée de votre départ. Une fois les billets prêts à être expédiés,
                                        nous nous assurerons de l'envoi de
                                        vos billets à la bonne adresse.

                                    </div>

                                </div>
                                <div id="div_billets_different" class="hide">
                                    <div class="centre">

                                        <h4 class="titre">Pourquoi le prix imprimé sur le billet est-il différent de
                                            celui que j'ai payé ?</h4>

                                        <br><br> Le prix des billets mis en vente sur Tapakila peut être identique,
                                        supérieur ou inférieur à la valeur
                                        faciale imprimée sur le billet.

                                        <br><br> En raison d'une forte demande, le prix des billets pour les événements
                                        populaires peut être plus élevés
                                        que la valeur faciale. Cependant, de nombreux billet sur Tapakila sont vendus à
                                        un prix inférieur à la valeur
                                        faciale.

                                        <br><br> Tapakila affiche toujours la valeur faciale du billet pour un événement
                                        dans la rubrique « Informations
                                        importantes » ou sur la « Page d'informations relatives au billet ».

                                    </div>

                                </div>
                                <div id="div_billets_nom" class="hide">
                                    <div class="centre">

                                        <h4 class="titre">Pourquoi il y a-t-il un autre nom sur mes billets ?</h4>

                                        <br><br> Tapakila autorise des vendeurs tiers, notamment des particulier, à
                                        mettre des billets en vente sur sa
                                        plate-forme. Il arrive parfois que le nom de l'acheteur d'origine figure sur les
                                        billets. Ces billets sont valables.
                                        Vous n'êtes pas obligé(e) de posséder un billet à votre nom pour accéder à
                                        l'événement.
                                        <br><br>

                                    </div>

                                </div>

                                <div id="div_ev" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Puis-je annuler ou modifier
                                            mon achat
                                            ?</h4>

                                        <br><br> Il n'est pas possible d'annuler ou d'échanger les billets une fois
                                        l'achat finalisé car les commandes
                                        sont considérées comme définitives. Si vous ne pouvez pas utiliser les billets
                                        achetés, et qu'il reste du temps
                                        avant la date de l'événement, nous vous recommandons de les re-lister en
                                        cliquant sur le lien "Vendre" sur l'événement
                                        pour lequel vous avez des billets. Nous commercialiserons vos billets sur notre
                                        plateforme pour trouver un nouvel
                                        acheteur. Nous ne facturons pas de frais supplémentaires pour relister des
                                        billets que vous auriez acheté chez
                                        nous. Occasionellement, il se peut qu'il y ai des raisons pour que les billets
                                        ne puissent être relistés. Généralement
                                        ceci est lié à une date de l'événement trop proche pour permettre une livraison
                                        sûre ou un téléchargement pour
                                        l'acheteur.
                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_annulation_evenement" class="hide">
                                    <div class="centre">

                                        <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                aria-hidden="true"></span> Puis-je annuler ou modifier
                                            mon achat
                                            ?</h4>

                                        <br><br> Dans l'eventualité où votre événement serait annulé ou reporté, soyez
                                        assuré(e) que nous vous recontacterons
                                        dans les plus brefs délais avec les instructions nécéssaires concernant vos
                                        billets. En règle générale;
                                        <br><br>
                                        <ul>
                                            <li><strong>En cas d'annulation</strong> &ndash; nous vous demanderons de
                                                nous retourner les billets et un remboursement
                                                intégral de votre transaction sera effectué après réception de ceux-ci.
                                            </li>
                                        </ul>
                                        <ul>
                                            <li><strong>En cas de reprogrammation</strong> &ndash; Les billets restent
                                                valides pour la nouvelle date. Veuillez
                                                consulter régulièrement vos emails et assurez-vous de vérifier également
                                                votre dossier de courrier indésirable
                                                ou ''spam''. L'email qui vous sera envoyé sera spécifique à votre
                                                événement, et contiendra toutes les informations
                                                nécéssaires.
                                            </li>
                                        </ul>


                                    </div>

                                </div>
                                <div id="div_favoris" class="hide">
                                    <div class="centre">

                                        <h4 class="titre">Quelles sont les méthodes de paiement acceptées ?</h4>

                                        <br><br>Tapakila accepte la plupart des cartes de crédit, PayPal, ainsi que les
                                        transferts bancaires directs dans
                                        certains pays.
                                        <br><br>Les options de paiement disponibles seront indiquées lors du processus
                                        de paiement.


                                    </div>
                                </div>
                                <div id="div_paiement-refuser" class="hide">
                                    <div class="centre">

                                        <h4 class="titre">Mon paiement a été refusé</h4>

                                        <br><br>

                                        <div class="ptxl">
                                            <p>Si votre paiement est refusé, nous vous suggérons de procéder aux
                                                vérifications suivantes:</p>
                                            <p>&bull; Essayez une carte de crédit internationale telle que Visa,
                                                Mastercard ou American Express, si cela n'est
                                                pas déjà fait.<br/>&bull; Vérifiez que le code de sécurité (appelé
                                                également CVV2 ou CVC2) est correct. Pour
                                                Visa, Mastercard, Maestro, Switch and Electron, il s'agit des 3 chiffres
                                                au verso de votre carte de débit. Pour
                                                American Express, il s'agit des 4 chiffres se trouvant au recto, à
                                                droite de votre carte.<br/>&bull; Assurez-vous
                                                que les informations de la carte de débit ou de crédit que vous avez
                                                saisies concernent une carte valide non
                                                expirée et disposant des fonds suffisants pour honorer cette commande.&nbsp;<br/>&bull;
                                                Contactez votre banque
                                                ou la société émettrice de votre carte bancaire pour vérifier
                                                l'autorisation de paiement à Tapakila.<br/>&bull;
                                                Réglez par PayPal, un service gratuit pour payer en ligne sans partager
                                                vos informations financières.<br/><br
                                                /> Si nous ne sommes pas en mesure de valider votre paiment dans les 30
                                                minutes suivant votre achat, nous devrons
                                                l'annuler et vous ne serez pas prélevé(e).</p>
                                        </div>


                                    </div>
                                </div>
                                <div id="div_news" class="hide">
                                    <div class="centre">
                                        <a>
                                            <h4 class="titre"><span class="glyphicon glyphicon-exclamation-sign"
                                                                    aria-hidden="true">  J'ai saisi une adresse e-mail incorrecte lors de l'inscription, comment puis-je la modifier ?
                                            </h4></a>
                                        <br><br>
                                        Consultez la rubrique Configuration du compte en vous connectant à l'aide de
                                        l'e-mail « incorrect » utilisé lors de la première inscription. Cliquez sur le
                                        lien « Modifier » situé à côté de l'adresse e-mail.

                                    </div>
                                </div>
                                <div id="div_compte_email" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Comment modifier l'adresse e-mail de mon compte ?</h4></a>
                                        <br><br>
                                        Consultez la rubrique Configuration du compte en vous connectant à l'aide de
                                        l'e-mail « incorrect » utilisé lors de la première inscription. Cliquez sur le
                                        lien « Modifier » situé à côté de l'adresse e-mail.

                                    </div>
                                </div>
                                <div id="div_compte_pswd" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Comment réinitialiser mon mot de passe ?</h4></a>
                                        <br><br>
                                        Cliquez <a href="{{route('password.request')}}" class="class_a">ici</a> pour réinitialiser
                                        votre mot de passe.

                                    </div>
                                </div>
                                <div id="div_compte_newsletter" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Comment se désinscrire de la newsletter ?</h4></a>
                                        <br><br>
                                        Rendez-vous à la rubrique Configuration du compte et cliquez sur le lien «
                                        Modifier » situé à côté de l'onglet « Abonnements » pour modifier vos
                                        préférences.

                                    </div>
                                </div>
                                <div id="div_compte_commande" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Pourquoi est-ce que je ne peux pas voir ma commande ou
                                                vente dans mon compte ?</h4></a>
                                        <br><br>
                                        <div class="ptxl">
                                            <p> Les deux principales raisons pour lesquelles les clients ne voient pas
                                                leur commande ou leur vente sont:
                                                <br/>
                                                <br/>
                                                <strong> Il se peut que vous soyez connecté sur le mauvais
                                                    compte</strong>
                                                <br/>
                                                Il est probable que vous ayez effectué votre achat en étant connecté
                                                depuis un deuxième compte à l'aide de l'une de vos autres adresses
                                                email, ou par le bais de Facebook.
                                                <br/>
                                                <br/>
                                                <strong> Vous avez fait une faute de frappe dans votre adresse email en
                                                    utilisant la procédure de paiement pour invité</strong>
                                                <br/>
                                                Lorsque vous payez en tant qu'invité, l'adresse email que vous entrez
                                                deviend l'adresse email de votre compte et celle grâce à laquelle vous
                                                pourrez trouver votre commande.
                                                <br/>
                                                <br/>
                                                <em>Afin de résoudre ceci:</em>
                                            <p><strong>1</strong> - Consultez vos <a href="mon_compte.html">Paramètres
                                                    de Compte</a> et prenez note de l'adresse email de ce compte.</p>
                                            <p><strong>2</strong> - Déconnectez-vous et tentez de vous reconnecter à
                                                l'aide d'une autre adresse email que vous pouvez avoir, ou bien à l'aide
                                                de Facebook, afin de voir si vous possédez un deuxième compte sur lequel
                                                votre commande pourrait se trouver.</p>
                                            <p><strong>3</strong> - Si vous ne parvenez toujours pas à trouver votre
                                                commande ou vente, rendez-vous sur notre page mot de passe oublié / aide
                                                à la connection.</p>
                                        </div>


                                    </div>
                                </div>

                                <div id="div_tapakila_definition" class="hide">
                                    <div class="centre">
                                        <h4 class="titre">Qu'est-ce que Tapakila ?</h4>
                                        <br><br>
                                        Tapakila est une plate-forme en ligne d'échelle mondiale pour les billets
                                        d'événements sportifs, musicaux, et de divertissement en direct. Tapakila vise à
                                        fournir aux acheteurs de billets la plus grande sélection de billets possible
                                        pour des événements à travers le monde,
                                        et aide les vendeurs de billets, des personnes détenant un billet supplémentaire
                                        aux grandes organisations événementielles multi-nationales, à atteindre un large
                                        public.
                                        <br><br>
                                        Tapakila est en partenariat avec un grand nombre des marques mondiales les plus
                                        éminentes dans le sport et le divertissement, et a aidé des clients venant de
                                        presque tous les pays du monde à avoir accès à des billets dans la langue,
                                        devise, et depuis l'appareil de leur choix.
                                        <br><br>
                                        Pour toute demande client, merci de visiter la section Aide du site internet
                                        Tapakila.
                                        <br>

                                    </div>
                                </div>

                                <div id="div_tapakila_garantie" class="hide">
                                    <div class="centre">
                                        <h4 class="titre">Qu'est-ce que la garantie Tapakila ?</h4>
                                        <br><br>
                                        Les <strong>acheteurs</strong> recevront dans tous les cas leurs billets dans
                                        les temps avant l'évènement.
                                        En cas de problème, Tapakila intervient pour proposer des billets de
                                        remplacement ou un remboursement.
                                        </p>

                                        <p>
                                            Les <strong>vendeurs</strong> sont sûrs d'être payés pour les billets
                                            vendus.
                                        </p>

                                        <br>

                                    </div>

                                </div>
                                <div id="div_tapakila_recouvre" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Que recouvrent les frais Tapakila ?</h4></a>
                                        <br><br>
                                        <div class="ptxl">
                                            <b>Acheteur :</b> Tapakila facture des frais de service venant s'ajouter au
                                            prix du billet. Ces frais sont indiqués clairement au cours du processus de
                                            paiement et ils servent à couvrir les frais de gestion de la plate-forme
                                            Tapalika, du service client et d'envoi des billets.
                                            <br><br>
                                            <b>Vendeurs :</b> Tapakila facture des frais de service sur la vente de vos
                                            billets. Ces frais sont indiqués clairement au cours du processus de vente
                                            et ils servent à couvrir les frais de marketing permettant de mettre vos
                                            billets à disposition de millions d'acheteurs potentiels dans le monde
                                            entier. Ces frais seront déduits de votre paiement.
                                            <br><br>
                                            Veuillez noter que le montant des frais de service peut varier selon
                                            l'événement et sont assujettis à la TVA.

                                            <br>

                                        </div>
                                    </div>
                                </div>
                                <div id="div_tapakila_terme" class="hide">
                                    <div class="centre">
                                        <a><h4 class="titre">Quelles sont les Termes et Conditions de Tapakila ? </h4>
                                        </a>
                                        <br><br>
                                        <h2>Conditions d'utilisation</h2>
                                        <p>
                                            <br/>
                                            <b>PRÉAMBULE</b><br/><br/>
                                        <p>La société Tapalika Entertainment Inc, immatriculée au Madagascar, Vous
                                            propose sur le site Internet disponible à l’adresse <a
                                                    href="http://www.Tapalika.com">www.Tapalika.com</a> un service de
                                            mise en relation (ci-après la « Plateforme Tapalika ») entre vendeurs (les «
                                            Vendeurs ») de billets de spectacles ou événements sportifs (les « Billets
                                            ») et acheteurs (les « Acheteurs ») de ces mêmes Billets. Les Vendeurs et
                                            les Acheteurs sont ci-après désignés conjointement les Membres. La
                                            Plateforme Tapalika permet la conclusion de contrats de vente des Billets.
                                            Toutefois, les Membres sont seuls décisionnaires de la concrétisation de la
                                            vente et de l'achat des Billets.</p>

                                        <p>L'acceptation des présentes Conditions générales d'utilisation de la
                                            Plateforme Tapalika par les Membres Vous permet d’accéder à cette plateforme
                                            servant à mettre en relation Vendeurs et Acheteurs et à opérer les
                                            transactions effectuées sur le site <a href="http://www.Tapalika.fr">www.Tapalika.com</a>
                                            selon les modalités définies ci-après. </p>

                                        <p>
                                            <b>DÉFINITIONS</b></p>

                                        <p><b>Conditions Générales d’Utilisation ou Accord :</b> désigne les présentes
                                            conditions générales d’utilisation.</p>

                                        <p><b>Plateforme Tapalika :</b> désigne la structure fonctionnelle et
                                            organisationnelle mise en place par Tapalika sur le Site permettant la mise
                                            en relation de Vendeurs et d'Acheteurs de Billets.</p>

                                        <p><b>Billet(s) :</b> désigne les billets de spectacle ou d’événements sportifs
                                            en Madagascar ou à l’étranger, susceptibles de faire l'objet d'une mise en
                                            relation par le biais de la Plateforme Tapalika.</p>

                                        <p><b>Billet(s) Interdit(s) :</b> désigne les billets de spectacle ou
                                            d’événements sportifs dont la vente ne serait pas autorisée en vertu de
                                            dispositions législatives, réglementaires ou contractuelles. Il s'agit
                                            notamment des Billets qui constitueraient des Billets contrefaisants au sens
                                            du Code de la propriété intellectuelle ou qui seraient vendus en violation
                                            de réseaux de distribution sélective ou exclusive, notamment les Billets
                                            vendus en violation de l’article 313-6-2 du Code pénal. </p>

                                        <p><b>Vendeur(s) :</b> désigne un Membre mettant en vente un Billet sur la
                                            Plateforme Tapalika, et éditant à cet effet une Offre de Vente sur le Site,
                                            dans le respect des conditions définies à l’article 3.1 des présentes
                                            Conditions Générales d’Utilisation. </p>

                                        <p><b>Acheteur(s) :</b> désigne un Membre ayant accepté l'offre d'un Vendeur.
                                        </p>

                                        <p><b>Membre(s) ou Vous :</b> désigne toute personne, Vendeur ou Acheteur,
                                            susceptible de faire usage de la Plateforme Tapalika après acceptation des
                                            présentes Conditions Générales d’Utilisation. Tout Membre s'engage à fournir
                                            des informations exactes quant à son identité, adresse et autres données
                                            nécessaires à l'accès à la Plateforme Tapalika et à mettre à jour toute
                                            modification concernant ces informations.</p>

                                        <p><b>Offre de Vente ou Listing :</b> désigne toute annonce ou offre de vente
                                            d’un Billet éditée par un Vendeur sur la Plateforme Tapalika, incluant au
                                            moins une description des caractéristiques du Billet proposé à la Vente
                                            (date et lieu de la manifestation auquel le Billet donne accès, référence
                                            des places ou catégories de places auxquelles le Billet donne accès, etc.)
                                            et un Prix de Vente proposé. </p>

                                        <p><b>Prix de Vente :</b> désigne le prix proposé par le Vendeur pour son Offre
                                            de Vente d'un Billet duquel est déduit la Commission lors de la réalisation
                                            d’une vente de Billet. </p>

                                        <p><b>Commission :</b> désigne la rémunération perçue par Tapalika sur le Prix
                                            de Vente lors de la vente d’un Billet. </p>

                                        <p><b>Prix de la Transaction :</b> désigne le prix total payable par l'Acheteur
                                            lors de l’achat d’un Billet sur le Site, comportant selon les cas, en plus
                                            du Prix de Vente, les frais de réservation, les frais de port définis de
                                            façon forfaitaire, la TVA sur l’ensemble des éléments précédents, ou tout
                                            autre impôt ou taxe s’appliquant. </p>

                                        <p><b>Service(s) :</b> désigne tous les services offerts sur le site <a
                                                    href="http://www.Tapalika.com">www.Tapalika.com</a>.</p>

                                        <p><b>Site :</b> désigne le site <a href="http://www.Tapalika.com">www.Tapalika.com</a>.
                                        </p>

                                        <p><b>Titulaire des Droits d’Exploitation ou TDE :</b> désigne toute personne
                                            responsable, à quelque titre que ce soit, de l’organisation de la
                                            manifestation ou du spectacle pour laquelle/lequel un Listing est mis en
                                            ligne sur le Site par un Vendeur et disposant en cette qualité de droits
                                            d’exploitation sur ladite/ledit manifestation ou spectacle. Cette définition
                                            vise notamment, sans que cette liste soit limitative, le producteur,
                                            l'organisateur ou le propriétaire des droits d'exploitation de la
                                            manifestation ou du spectacle.</p>

                                        <p><b>Tapalika ou Nous :</b> désigne la société Tapalika Entertainment Inc, sise
                                            à 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent, 19904,
                                            Madagascar d’Amérique.</p>

                                        <p>
                                            <b>1.1 Introduction :</b> Les présentes Conditions Générales d'Utilisation
                                            de la Plateforme Tapalika ont pour objet de définir les modalités de
                                            l'accord entre Vous et Nous, les conditions par lesquelles les Membres sont
                                            autorisés à utiliser la Plateforme Tapalika aux fins d'opérer leur mise en
                                            relation et tous les autres Services que Nous offrons. Par l'utilisation de
                                            ce Site et des Services, Vous confirmez accepter cet Accord et l’intégralité
                                            de ses termes. </p>

                                        <p>
                                            <b>1.2 Mise en relation :</b> Tapalika offre à ses Membres de mettre en
                                            relation Acheteurs et Vendeurs de Billets. Tapalika ne devient pas
                                            propriétaire des Billets et les transactions sont effectuées entre les
                                            Acheteurs et les Vendeurs. Nous n'intervenons pas dans la transaction entre
                                            Acheteurs et Vendeurs. En conséquence, Nous n'exerçons aucun contrôle sur la
                                            qualité, la sûreté ou la licéité des Billets, la véracité ou l'exactitude du
                                            contenu ou des Offres de Vente des Membres, la capacité des Vendeurs à
                                            vendre ni la capacité des Acheteurs à payer les Billets. Nous ne pouvons pas
                                            non plus assurer que le Vendeur ou l'Acheteur concluront la transaction.
                                        </p>

                                        <p>
                                            <b>1.3 Commissions et Services :</b> L'inscription, la mise en vente d’un
                                            Billet et l'action de se porter acquéreur de Billets proposés sur notre Site
                                            sont gratuites. Cependant, l'utilisation d'autres Services, tels que l’achat
                                            effectif d’un Billet, est payante. Lorsque Vous mettez en vente un Billet,
                                            Vous avez la possibilité de passer en revue les taux de Commission tels
                                            qu’ils sont détaillés dans la rubrique <a href="service-clientele.html">«
                                                Quels frais de gestion sont déduits du prix de vente » </a>des pages
                                            d’aide
                                            du Site disponibles à l’adresse URL suivante <a
                                                    href="service-clientele.html">http://www.Tapalika.com/service-clientele.html</a>.
                                            Vous devez accepter ces tarifs pour mettre en ligne votre Offre de Vente.
                                            Sauf mention contraire, les taux de Commission sont indiqués sous forme de
                                            pourcentage du Prix de Vente et sont facturés en AR (Ariary).
                                        </p>

                                        <p>
                                            <b>1.4 Garantie Tapalika :</b> Lorsque Vous achetez des billets sur
                                            Tapalika, Tapalika vous garantit que vous recevrez les billets achetés à
                                            temps pour l'événement. Dans les cas rares où un problème surviendrait et
                                            que le vendeur d'origine du billet n’est plus en mesure de fournir les
                                            billets mis en vente, Tapalika fait , à sa seule et entière discrétion, une
                                            recherche de billets de remplacement équivalents et Vous les fournit sans
                                            coût additionnel. Si Tapalika n'est pas en mesure de trouver et Vous fournir
                                            des billets équivalents, un remboursement du coût des billets Vous sera
                                            proposé. La notion de billets de remplacement équivalents est définie par
                                            Tapalika, à sa seule et entière discrétion. Lorsque Vous vendez des billets
                                            sur Tapalika, Tapalika vous garantit que vous serez payé(e) pour votre
                                            vente, à condition que vous fournissiez exactement les mêmes billets que
                                            ceux que vous avez mis en vente et que l'acheteur des billets ait pu accéder
                                            à l'événement.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>2.1 Conditions requises :</b> Pour être Membre de ce Site, Vous devez
                                            accepter les termes de cet Accord. Vous pouvez uniquement utiliser les
                                            Services si Vous pouvez légalement conclure un contrat et signer des
                                            contrats exécutoires, sinon, Vous n'êtes pas autorisé à utiliser ces
                                            Services. En outre, les Vendeurs doivent être autorisés à mettre en ligne
                                            une Offre de Vente et respecter l’ensemble des conditions définies à
                                            l’article 3.1. des présentes Conditions Générales d’Utilisation.
                                        </p>
                                        <p>
                                            <b>2.2 Inscription :</b> Nous ne Vous autoriserons pas à acheter ou à vendre
                                            des Billets avant que Vous Vous soyez inscrits auprès de Nous. Pour cela,
                                            Vous devez fournir notamment votre nom, votre adresse, votre numéro de
                                            téléphone et adresse de courrier électronique. Vous Vous engagez à ce que
                                            l’ensemble des informations que Vous Nous fournissez soit exact.
                                        </p>
                                        <p>
                                            <b>2.3 Pseudonyme et mot de passe : </b>Vous aurez besoin d'un pseudonyme et
                                            d'un mot de passe pour accéder au Site et en utiliser les Services. La
                                            sécurité de votre pseudonyme et de votre mot de passe Vous incombe et Vous
                                            serez tenu responsable de l’ensemble des actions effectuées sous votre
                                            pseudonyme et mot de passe. En effet, l’utilisation de votre pseudonyme et
                                            de votre mot de passe fera naître une présomption que c’est bien Vous qui
                                            utilisez les Services.
                                        </p>
                                        <p>
                                            <b>2.4 Autres informations : </b>Vous faites valoir et garantissez que
                                            toutes les informations que Vous Nous fournissez ou que Vous soumettez à
                                            tout autre Membre ou visiteur du Site (a) ne sont pas fausses, inexactes,
                                            trompeuses, obscènes ou diffamatoires ; (b) qu'elles ne sont pas
                                            frauduleuses ; (c) qu'elles n'impliquent pas la vente d'articles volés ou
                                            contrefaits ; (d) qu'elles n'empiètent pas sur les droits d'auteur, les
                                            brevets, les marques de commerce, les secrets industriels, les droits à la
                                            protection de la personnalité ou à la vie privée ou sur tout autre droit de
                                            tiers ; (e) qu'elles ne violent aucune loi, aucun statut ou aucun règlement,
                                            y compris et sans réserve(s), ceux qui régissent la protection des
                                            consommateurs, la concurrence déloyale, la lutte contre la discrimination ou
                                            bien la publicité mensongère ; et, (f) qu'elles ne contiennent aucun virus
                                            ou aucune programmation visant à endommager, entraver, intercepter ou
                                            extraire quelconque système, données ou informations personnelles.
                                        </p>
                                        <p>
                                            <b>2.5 Lois et réglementations : </b>Vous garantissez que Vous Vous
                                            conformerez à toutes les lois internationales, nationales, régionales et
                                            locales applicables, ainsi qu'à toutes les réglementations concernant
                                            l'utilisation de ce Site et la vente des Billets. En particulier, Vous
                                            reconnaissez ne pas procéder à la revente de Billets sur la Plateforme
                                            Tapalika à titre habituel si Vous n’y êtes pas autorisé par le Titulaire des
                                            Droits d’Exploitation. Vous confirmez être âgé(e) de plus de 18 ans et avoir
                                            la capacité juridique d'effectuer la transaction.
                                        </p>
                                        <p>
                                            <b>2.6 Dédommagement :</b> Vous acceptez de dégager de toute responsabilité,
                                            frais et dépenses (y compris les honoraires raisonnables d'avocats) Tapalika
                                            et (le cas échéant) toute société mère, succursale, société affiliée,
                                            membres, directeurs, avocats, agents et employés, et d'indemniser Tapalika
                                            et (le cas échéant) toute société mère, succursale, société affiliée,
                                            membres, directeurs, avocats, agents et employés, contre toute
                                            responsabilité, frais et dépenses encourus à la suite de réclamations par un
                                            tiers qui impliquent ou concernent vos actions ou omissions sur ce Site.
                                        </p>
                                        <p>
                                            <b>2.7 Résolution des litiges :</b> Après réception des billets, si
                                            l’Acheteur n’est pas satisfait d’une partie de la commande, l’Acheteur devra
                                            respecter les règles de résolution des litiges déterminées dans notre
                                            Garantie Tapalika. Toute réclamation doit être déposée dans un délai de 14
                                            jours à compter de la réception des Billets, faute de quoi, ces Billets ne
                                            seront plus couverts par la Garantie Tapalika. Dans le cas où vous
                                            rencontreriez des difficultés à utiliser vos Billets le jour de l’Évènement,
                                            vous devrez contacter Tapalika sous 48 heures pour signaler le problème.
                                            Vous devrez remplir un Formulaire de Dépôt de Plainte. Seuls les Formulaires
                                            dûment complétés pourront faire l’objet d’un remboursement. Les Formulaires
                                            devront être renvoyés à Tapalika sous 5 jours ouvrables à compter de leur
                                            réception pour pouvoir prétendre à un remboursement. Tapalika se réserve le
                                            droit d’interdire tout nouvel accès à son site internet à toute personne
                                            déposant plainte de façon abusive.
                                        </p>
                                        <p>
                                            <b>2.8 Cartes d’abonnement/ abonnements annuels :</b> L’acheteur accepte
                                            deux (2) prélèvements sur sa carte de crédit ou autre moyen de paiement
                                            utilisé : l’un pour acheter les billets et l’autre pour garantir le retour
                                            de la carte d’abonnement/ l’abonnement annuel. Si cette carte d’abonnement /
                                            l’abonnement annuel n’est pas renvoyé(e) à Tapalika dans les 24h suivant
                                            l’événement, l’Acheteur accepte que Tapalika prélève une pénalité de 200€
                                            par carte d’abonnement/ abonnement annuel en tant que « pénalité de non
                                            renvoi ». Cette pénalité s’ajouter au prix des billets achetés.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>3.1 Offre de Billets :</b> Pour mettre des Billets en vente, un Vendeur
                                            publie une Offre de Vente sur la Plateforme Tapalika. Toute Offre de Vente
                                            doit être publiée conformément aux conditions définies ci-dessous, sous
                                            peine d’être retirée du Site dans les cas visés aux articles 3.11 et 6.2 des
                                            présentes Conditions Générales d’Utilisation.</p>

                                        <p>Le Vendeur est seul responsable de la licéité de cette Offre de Vente. En
                                            particulier, le Vendeur doit s’assurer d’être autorisé à mettre en vente le
                                            Billet conformément aux lois et règlementations applicables. Tapalika
                                            considère qu’un Vendeur est autorisé à mettre en vente un Billet si et
                                            seulement s’il rentre dans au moins l’une des catégories suivantes : (i) le
                                            Vendeur est un Titulaire des Droits d’Exploitation de la manifestation et/ou
                                            du spectacle mentionné(s) par le ou les Billets mis en vente, (ii) le
                                            Vendeur est expressément autorisé par le Titulaire des Droits d’Exploitation
                                            de ladite manifestation et/ou dudit spectacle à vendre ou mettre en vente
                                            des Billets pour le compte du Titulaire des Droits d’Exploitation, (iii)
                                            Tapalika est autorisée, par le Titulaire des Droits d’Exploitation, à opérer
                                            une bourse d’échange de Billets par laquelle les Membres peuvent librement
                                            acheter ou vendre de gré à gré des Billets ou (iv) le Vendeur ne met pas en
                                            vente à titre habituel des Billets sur la Plateforme Tapalika.</p>

                                        <p>Tout Vendeur reconnait expressément que la vente de Billets à titre habituel
                                            peut faire l’objet d’une qualification d’acte de commerce au sens de
                                            l’article L.121-1 du Code de commerce.</p>
                                        <p>Le Vendeur est seul responsable du contenu de cette Offre de Vente. Ainsi, le
                                            Vendeur définit seul le Prix et fournit les informations relatives aux
                                            Billets, en ce compris, sans que cette liste soit limitative, les
                                            informations sur l'événement, la date, la section, la rangée, et la date de
                                            clôture de la vente, le tout conformément au processus indiqué dans les
                                            pages d'aide du Site. </p>
                                        <p>Le Vendeur n’est pas autorisé par Tapalika à mettre en vente sur le site des
                                            Billets Interdits.</p>
                                        <p>Pour mettre ses Billets en vente, le Vendeur doit fournir une carte de crédit
                                            ou de débit valide.</p>
                                        <p>Par ailleurs, le Vendeur octroie à Tapalika une licence internationale, non
                                            exclusive, transférable et libre de redevance pour reproduire, modifier,
                                            adapter, publier et afficher sur le Site et sur les sites de nos partenaires
                                            marketing les Offres de Vente, afin que Nous puissions promouvoir les
                                            Billets que Vous mettez en vente.</p>
                                        <p>

                                            <b>3.2 Tarification :</b> Si un Vendeur met un Billet en vente sur le Site,
                                            il doit déterminer seul un prix fixe de vente des Billets.</p>
                                        <p>
                                            <b>3.3 Authenticité des informations :</b> Pour tous les Billets que Vous
                                            mettez en vente en tant que Vendeur, Vous garantissez l'exactitude des
                                            renseignements que Vous publiez dans l’Offre de Vente que Vous rédigez. Vous
                                            garantissez également que Vous possédez les Billets et que Vous êtes
                                            autorisé(e) à les transférer ou à les revendre, conformément aux conditions
                                            définies à l’article 3.1. Dans le cas où Vous revendez des Billets à un
                                            événement pour des raisons commerciales, Vous garantissez que Vous en avez
                                            le droit. Vous garantissez notamment que Vous êtes autorisés à proposer les
                                            Billets à la vente au prix que Vous avez fixé.
                                        </p>
                                        <p>
                                            Tapalika Vous informe que la publication d’une Offre de Vente en violation
                                            des conditions définies dans les présentes Conditions Générales
                                            d’Utilisation est susceptible d’entraîner des poursuites pénales à
                                            l’encontre du Vendeur responsable de ladite publication dans certaines
                                            juridictions. Tapalika décline toute responsabilité quant à la publication
                                            par Vous d’Offres de Vente illicites ou d’Offres de Vente de Billets
                                            Interdits, autre que celle qui pourrait lui incomber du fait de son statut
                                            d’hébergeur. En mettant en Vente un Billet sur la Plateforme Tapalika et en
                                            acceptant à ce titre les présentes Conditions Générales d’Utilisation, Vous
                                            garantissez Tapalika contre tout recours, action en justice,
                                            dommages-intérêts et tous frais annexes auxquels Tapalika devrait faire face
                                            ou qui seraient mis à la charge de Tapalika du fait de Votre publication
                                            d’une Offre de Vente illicite sur la Plateforme Tapalika.
                                        </p>

                                        <p>
                                            <b>3.4 Paiement du Vendeur :</b> Le Vendeur sera payé cinq (5) à huit (8)
                                            jours après l’événement auquel les Billets donnent accès, à la condition que
                                            le Billet ait été utilisé, c’est-à-dire que l’Acheteur ait effectivement pu
                                            accéder à l’événement. Nous Nous réservons le droit de différer le paiement
                                            si Nous avons de bonnes raisons de croire que la vente est illégale ou
                                            qu'elle constitue une quelconque violation de cet Accord.
                                        </p>
                                        <p><b>3.5 Taxes applicables à la vente :</b> Le Vendeur est seul responsable de
                                            son régime fiscal, et il lui appartient de déterminer lui-même les impôts,
                                            taxes fiscales et parafiscales, retenues à la source, cotisations,
                                            redevances de quelque nature que ce soit auxquelles il est assujetti
                                            lorsqu’il procède à une vente sur le Site, incluant, sans limitation, la
                                            TVA. Tapalika ne propose qu’un service d’hébergement d’Offres de Vente et ne
                                            prend aucune responsabilité quant aux obligations fiscales des Vendeurs. Si
                                            le Vendeur est assujetti à des impôts, taxes fiscales et parafiscales,
                                            retenues à la source, cotisations, redevances de quelque nature que ce soit
                                            applicables à la vente (en Madagascar ou ailleurs), il doit inclure leur
                                            montant aux Prix des Billets qu'il affiche sur le Site. Ces impôts, taxes
                                            fiscales et parafiscales, retenues à la source, cotisations, redevances de
                                            quelque nature que ce soit ne se confondent pas avec celles que Tapalika
                                            peut facturer sur ces frais, et notamment la TVA facturée par Tapalika sur
                                            ses frais.
                                        </p>
                                        <p><b>3.6 Double publication de vente et retrait des Billets :</b> Afin de
                                            mettre un Billet en vente sur le Site, Vous devez d'abord Vous inscrire afin
                                            de devenir Membre. Une fois un Billet mis en vente sur le Site, Nous Vous
                                            déconseillons de le publier ailleurs. </p>

                                        <p>Néanmoins, Vous êtes autorisé(e) à mettre votre Billet en vente sur d'autres
                                            places de marché, mais Vous devez immédiatement supprimer votre Billet du
                                            Site si celui-ci est vendu ailleurs.
                                        </p>
                                        <p>Sauf disposition contraire dans les présentes Conditions Générales
                                            d’Utilisation, Vous acceptez de ne pas promouvoir la vente des Billets
                                            publiés sur le Site sur tout autre site. Nous Nous réservons le droit
                                            d'interdire aux Membres de mettre en vente des Billets sur le Site s'ils ne
                                            peuvent pas fournir les mêmes Billets que ceux qu'ils ont mis en vente sur
                                            la Plateforme Tapalika.
                                        </p>

                                        <p><b>3.7 Biens volés :</b> La vente sur le Site de biens volés est strictement
                                            interdite. Tapalika soutient les efforts d'application de la loi visant à
                                            récupérer les biens volés mis en vente sur le Site, et elle soutient les
                                            poursuites engagées contre les personnes qui tentent sciemment de vendre de
                                            tels articles sur le Site. Les biens volés englobent les articles volés
                                            auprès de personnes mais également auprès de sociétés ou gouvernements.
                                        </p>
                                        <p><b>3.8 Les Vendeurs ne doivent pas inclure d'objets promotionnels avec les
                                                Billets :</b> Le nom et l'adresse de l'Acheteur sont fournis aux
                                            Vendeurs
                                            uniquement afin de livrer le(s) Billet(s) achetés et ils ne doivent être
                                            utilisés à aucune autre fin par le Vendeur, que cela soit en rapport ou non
                                            avec cette/ces livraison(s). Vous acceptez de ne pas inclure de matériel de
                                            promotion ou commercial qui n'est pas fourni ou approuvé par Tapalika, autre
                                            qu'une facture avec TVA, le cas échéant, et conforme à la demande de
                                            l'Acheteur et de Tapalika. Ce matériel de promotion inclut, sans toutefois
                                            s'y limiter, le matériel annonçant un site Web ou qui invite l'Acheteur à
                                            consulter un site autre que celui de Tapalika, des catalogues, des cartes
                                            professionnelles, des flyers, des coupons de réduction, des sollicitations
                                            ou autres matériels marketing ou publicitaires. Cela inclut également tout
                                            article susceptible de constituer une entrave ou une violation des présentes
                                            Conditions Générales d'Utilisation. Vous acceptez de pas contacter
                                            l'Acheteur à aucun moment et quelle qu’en soit la raison, en dehors de la
                                            livraison des Billets. Vous acceptez expressément que Tapalika puisse
                                            décider unilatéralement de retenir le Prix des Billets que Vous mettez en
                                            vente dans le cas où Vous violeriez les termes de cet article.
                                        </p>
                                        <p><b>3.9 Confirmation du Vendeur :</b> Le Vendeur doit confirmer la commande
                                            dans 48 heures suivants la date de la vente des Billets. Les Vendeurs
                                            doivent utiliser notre procédure de confirmation automatisée en ligne. Les
                                            Vendeurs pourront s’informer des frais de service et taxes sur nos frais
                                            avant d’avoir finalisé la procédure de vente et avant d’avoir mis leurs
                                            Billets en vente. Le Vendeur doit envoyer les Billets dès qu’ils sont en sa
                                            possession. Le Vendeur doit prévoir assez de temps pour que l’Acheteur
                                            reçoive les Billets à temps pour l’événement. En tout état de cause, pour
                                            tout événement, le Vendeur doit envoyer les Billets au plus tard sept (7)
                                            jours avant l’événement. Le Vendeur doit envoyer les Billets conformément à
                                            la méthode de livraison sélectionnée par l’Acheteur au moment de l’achat,
                                            comme il l’est précisé dans les pages “aide” du Site.
                                        </p>

                                        <p><b>3.10 Exécution de l'obligation concernant les Billets :</b> Une fois que
                                            le Vendeur met des Billets en vente et qu'un Acheteur achète ces Billets, le
                                            Vendeur est responsable de la réalisation de la transaction. Le Vendeur sera
                                            facturé des frais de remplacement s’il propose à la vente des Billets et
                                            confirme la transaction sans que les Billets proposés ne soient
                                            effectivement disponibles. Les frais de remplacement dépendront des prix du
                                            marché et des coûts que Nous devrons supporter pour acheter des Billets de
                                            remplacement équivalents ou mieux placés pour l'Acheteur. Nous ferons les
                                            efforts raisonnables pour fournir des billets de remplacement équivalents ou
                                            mieux placés pour l'acheteur. Dans le cas où un événement est annulé ou
                                            reporté, Tapalika se réserve le droit d'annuler la transaction d'un Vendeur.
                                            Si pour quelque raison que ce soit vos billets nous sont retournés ou ne
                                            peuvent être livrés, nous allons essayer de livrer les billets à nouveau,
                                            avec un maximum de trois tentatives. Nous nous efforçons de fixer une
                                            nouvelle livraison qui convienne à l’Acheteur ou de lui proposer de
                                            récupérer les billets dans un point de retrait si l’événement le permet. Si
                                            ces tentatives échouent également, nous ne proposerons pas de remboursement.
                                            Nous nous efforçons de nous assurer que tous les billets sont livrés à temps
                                            pour l'événement, et dans le cas où l’événement serait trop proche en terme
                                            de temps, nous pouvons proposer de récupérer les billets dans un point de
                                            retrait ou au guichet.
                                        </p>
                                        <p><b>3.11 Retrait d’une Offre de Vente :</b> Tapalika peut, à tout moment et de
                                            façon unilatérale, décider de supprimer une Offre de Vente pour la vente de
                                            Billets du Site. En effet, en tant qu’hébergeur, Tapalika peut être amené à
                                            prendre la décision de supprimer une Offre de Vente du Site lorsque des
                                            tiers apportent des éléments démontrant que ladite Offre de Vente
                                            contrevient à leurs droits et/ou à la règlementation applicable. La
                                            responsabilité de Tapalika ne pourra être engagée à ce titre. </p>

                                        <p><b>3.12 Licence :</b> Lorsque Vous Nous confiez du contenu, Vous Nous
                                            concédez le droit non exclusif, international, sans limitation de durée
                                            (c'est-à-dire, pour la durée de la protection), irrévocable, exempt de
                                            redevance, transférable dans le cadre d'une sous-licence, d'exercer les
                                            droits de propriété intellectuelle (nécessaires pour héberger le contenu)
                                            que Vous ou d'autres personnes possédez sur le contenu, dans tout média
                                            existant ou à venir. En ce qui concerne les droits d’auteurs, Vous Nous
                                            concédez les droits de reproduction, de représentation et d’adaptation pour
                                            toute utilisation numérique en ligne sur le Site lorsque et au fur et à
                                            mesure que Vous postez votre contenu sur le Site.</p>

                                        <p>Nous pouvons être amenés à Vous proposer des informations génériques pour
                                            nourrir votre contenu. Nous Nous efforçons naturellement d’en assurer
                                            l’exactitude et l’actualisation. Toutefois, si Vous décidez d’utiliser ces
                                            informations, il Vous appartient d’en vérifier l’exactitude et de ne pas
                                            inclure d'informations calomnieuses, diffamatoires ou dénigrantes. Vous
                                            acceptez de ne pas engager notre responsabilité en cas d’erreur ou
                                            d’inexactitude de ces informations. Vous Vous engagez par ailleurs à
                                            n’utiliser ces informations que dans le cadre de la rédaction de vos Offres
                                            de Vente et d'une manière qui ne porte pas atteinte aux droits de propriété
                                            d'un tiers.
                                        </p>

                                        <p><b>3.13 Commissions :</b> Il est de la responsabilité du Vendeur de payer
                                            tous les frais et taxes applicables résultant de l'utilisation du Site et
                                            des Services, y compris notamment la Commission, dans les délais et par
                                            l'intermédiaire d'un mode de paiement valable. En cas de problème lié à
                                            Votre mode de paiement ou si votre compte présente un arriéré, Nous
                                            tenterons de percevoir les montants dus par d'autres moyens de recouvrement.
                                            Nous pourrons être amenés à faire appel à des professionnels du recouvrement
                                            ou initier une action judiciaire. Cela signifie que Vous devrez régler la
                                            Commission due, plus les éventuels intérêts de retard au taux légal.
                                        </p>
                                        <br/>

                                        <p><b>4.1 Faire une offre :</b> Un Membre qui désire acheter un Billet doit tout
                                            d'abord consulter la Plateforme Tapalika afin de trouver les Billets
                                            correspondant à ses critères de recherches. Lorsque ces Billets ont été
                                            trouvés par l'Acheteur, il matérialise sa décision par l'intermédiaire d'une
                                            « offre » d'achat des Billets. Nous attirons votre attention sur le fait que
                                            Vous êtes seul responsable du choix des Billets que Vous souhaitez acquérir.
                                        </p>
                                        <p>En plaçant une « offre » d’achat, Vous, en tant qu'Acheteur, octroyez à
                                            Tapalika le droit de débiter du Prix de la Transaction votre carte de crédit
                                            ou de débit, votre compte PayPal ou votre compte bancaire pour l'achat des
                                            Billets choisis. </p>

                                        <p><b>4.2 Changement de places :</b> Les Billets mis en vente sont une
                                            représentation de la place réelle. Il est possible que ces Billets soient
                                            échangés contre des places comparables ou mieux situées après approbation de
                                            l'Acheteur. </p>
                                        <p><b>4.3 Informations sur les Billets :</b> Les dates d'événements, les
                                            horaires, les lieux et l'objet des événements qui sont indiqués sur les
                                            Billets peuvent être sujets à changement. L'Acheteur se doit de vérifier les
                                            informations officielles les plus récentes en contactant la billetterie, les
                                            caisses, le bureau de location ou bien l’organisateur de l’événement pour
                                            tout changement. </p>
                                        <br/>

                                        <p>
                                            <b>5.1 Paiement :</b> Conformément à l’article 4.1 des présentes Conditions
                                            Générales d’Utilisation, en cas de paiement par carte de crédit ou de débit,
                                            Nous obtenons une autorisation de prélèvement auprès de l’émetteur de la
                                            carte de crédit ou de débit de l'Acheteur équivalente au Prix de la
                                            Transaction. L'autorisation restera valable jusqu'à ce que la vente soit
                                            exécutée ou la commande annulée.
                                        </p>
                                        <p>En cas de paiement par PayPal, Nous obtiendrons une autorisation auprès du
                                            compte PayPal de l'Acheteur équivalente à la somme du Prix, des commissions
                                            et frais de livraison des Billets. Nous ajouterons, le cas échéant, la TVA à
                                            nos frais et commissions. </p>
                                        <p>En cas de paiement par virement bancaire, Nous vérifierons la validité du
                                            compte bancaire émetteur du virement. </p>
                                        <p>
                                            <b>5.2 Notification :</b> Une fois que Nous obtenons confirmation de l’achat
                                            par l'Acheteur, Nous informons le Vendeur de la vente par e-mail et / ou par
                                            téléphone et Nous lui confirmons que l'Acheteur est prêt à payer le Prix de
                                            Vente.
                                        </p>
                                        <p>
                                            <b>5.3 Collecte du paiement :</b> Après confirmation de l'envoi des Billets
                                            par le Vendeur, Nous recueillons le paiement auprès de l'Acheteur
                                            correspondant au Prix de la Transaction. Nous ne fournissons jamais les
                                            informations de règlement de l'Acheteur au Vendeur. Nous percevons le
                                            paiement et le Vendeur est ensuite payé conformément au mode de paiement
                                            qu'il aura choisi et à notre politique de paiement indiquée dans les pages
                                            d'aide du Site.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>6.1 Enquêtes :</b> Nous pouvons être amenés à effectuer une enquête à la
                                            suite de plaintes et de violations de nos Conditions Générales
                                            d’Utilisation. Vous acceptez de coopérer pleinement, y compris, notamment,
                                            de Nous fournir des informations spécifiques sur vos droits concernant un
                                            Billet, son origine, votre acquisition d'un Billet et le prix que Vous avez
                                            payé pour ce Billet.
                                        </p>
                                        <p>
                                            <b>6.2 Violations, résiliation et suspension :</b> Des actions pourront être
                                            prises si Nous les jugeons appropriées, Nous pourrons également, sans
                                            toutefois s'y limiter, émettre un avertissement, suspendre ou clore un
                                            service, refuser un accès, supprimer une offre ou Vous conseiller de
                                            modifier une Offre de Vente. Vous acceptez que les paiements qui Vous sont
                                            dus à la suite de ventes effectuées par l'intermédiaire de ce Site puissent
                                            être suspendus ou retardés. Tapalika ne sera pas obligé de Vous payer toute
                                            vente si Nous suspectons que cette vente a été illégale ou exécutée en
                                            violation de cet Accord. Lors de la clôture de votre compte, vos Offres de
                                            Vente seront supprimées du Site si Vous êtes un Vendeur et vos achats seront
                                            annulés si Vous êtes un Acheteur.
                                        </p>
                                        <p>
                                            <b>6.3 Divulgation d'informations :</b> Vous acceptez que Tapalika fasse
                                            état, aux autorités règlementaires, aux autorités de régulation et/ou à tout
                                            tiers compétent, de toute activité dont elle soupçonne qu’elle constitue une
                                            violation à la loi. Tapalika coopérera afin de garantir que les auteurs de
                                            violations soient poursuivis conformément à la loi.
                                        </p>
                                        <p>
                                            <b>6.4 Exécution d'ajustements :</b> Vous Nous autorisez à différer le
                                            paiement ou à débiter votre carte de crédit ou de débit, ou votre compte
                                            Paypal, dans le cadre de l’autorisation de prélèvement que Vous Nous
                                            accordez, de tout montant que Vous Nous devrez si (a) un ajustement est
                                            effectué du fait de l’exécution de notre garantie Tapalika ; (b) Nous
                                            soupçonnons qu’une fraude ou un autre acte illégal a été commis lors des
                                            activités de vente ou d'achat et si une autorité compétente Nous fait la
                                            demande de différer le paiement ou de débiter votre moyen de paiement à
                                            titre provisoire ; (c) Vous ne livrez pas les mêmes Billets que ceux que
                                            Vous avez mis en vente sur le Site et dont la transaction a été confirmée ;
                                            (d) Vous adressez des objets promotionnels à un Acheteur ; ou (e) si Vous
                                            Nous devez de l'argent. Si l'une des situations citées devait se produire,
                                            Nous Nous réservons le droit de déduire de votre paiement le montant que
                                            Vous Nous devez.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>7.1 Non garantie :</b> À l'exception des garanties explicites déclarées
                                            dans cet Accord, Tapalika fournit les logiciels, le Site et les Services «
                                            tels qu'ils sont présentés » et « selon leur disponibilité » sans aucune
                                            garantie de quelque sorte que ce soit. Tapalika n'offre aucune garantie
                                            concernant ses logiciels, les Billets, les événements, les Services que
                                            Tapalika offre, ou la bonne exécution des promesses des Vendeurs ou des
                                            Acheteurs au-delà des garanties légales telles que prévues par les textes
                                            applicables. En particulier, Tapalika décline toute garantie, qu'elle soit
                                            explicite, obligatoire ou implicite, y compris et sans réserve(s), les
                                            garanties de qualité, de titre, de non violation des droits de tiers, etc.
                                            autant que la réglementation applicable le permet.
                                        </p>
                                        <p>
                                            <b>7.2 Renonciation des dommages indirects/limite de responsabilité :</b>
                                            Sauf dans le cas où elle aurait été dûment informée de l’existence d’un
                                            contenu illicite au sens de la législation en vigueur, et n’aurait pas agi
                                            promptement pour le retirer, Tapalika ne peut pas être tenue pour
                                            responsable ni du contenu ou des actions (ou absence d'action) des Membres,
                                            ni des Billets qu'ils mettent en vente. Tapalika décline expressément toute
                                            responsabilité pour toute perte de profits, y compris, sans toutefois s'y
                                            limiter, tous dommages-intérêts particuliers ou exemplaires, tous dommages
                                            indirects ou tous dommages accessoires pouvant résulter des Services, du
                                            Site ou de la suspension, de la clôture ou du mauvais fonctionnement des
                                            Services ou du Site. La responsabilité de Tapalika envers Vous ou quiconque
                                            en toute circonstance, se limite au plus petit des deux montants suivants :
                                            (a) 200 €, et (b) la valeur totale de tous les Billets et autres articles
                                            que Vous avez achetés et/ou vendus par l'intermédiaire de Tapalika au cours
                                            de l'action ayant prétendument engendré la responsabilité. En aucun cas
                                            Tapalika ne saurait être tenue responsable de coûts supplémentaires encourus
                                            par votre achat de Billets auprès d'un tiers en contrepartie de Billets que
                                            Vous n'avez pas pu acheter sur le Site.
                                        </p>
                                        <p>
                                            <b>7.3 Enchères :</b> Vous reconnaissez que Nous ne sommes pas une société
                                            de ventes aux enchères publiques. Au contraire, le Site est un lieu
                                            d'échange dont l'objet est de permettre à n'importe qui, n'importe où et
                                            n'importe quand, d'offrir, de vendre ou d'acheter des Billets.
                                        </p>
                                        <p>
                                            <b>7.4 Renonciation :</b> Vous reconnaissez expressément que Tapalika n’est
                                            pas impliquée dans les transactions réelles entre les Acheteurs et les
                                            Vendeurs. En cas de litige avec un ou plusieurs Membres, sauf dans le cas où
                                            Tapalika aurait été dûment informée de l’existence d’un contenu illicite au
                                            sens de la législation en vigueur, et n’aurait pas agi promptement pour le
                                            retirer, Vous Nous dégagez de toute responsabilité (ainsi que nos
                                            administrateurs, directeurs, agents, sociétés liées et associées, joint
                                            ventures et employés) pour toute réclamation et tout dommage (présent ou
                                            futur) de tout type ou nature, connu ou non, résultant de manière directe ou
                                            indirecte de ces litiges.
                                        </p>
                                        <p>
                                            <b>7.5 Indemnité fiscale :</b> Vous reconnaissez que Tapalika n’est
                                            aucunement responsable de l'exactitude ou de la pertinence des paiements
                                            d'impôts ou taxes à une entité quelconque de votre part. Vous Vous engagez à
                                            indemniser Tapalika de tous dommages, frais, intérêts et dépenses (y compris
                                            les honoraires raisonnables d'avocats) et (le cas échéant) quelconque
                                            société mère, succursale, société affiliée, membres, directeurs, agents et
                                            employés, provenant d'un tiers ou d'un gouvernement qui implique ou concerne
                                            (i) toute obligation fiscale internationale, nationale, régionale ou locale
                                            ou tout montant dû conformément à tout décret, toute ordonnance, toute loi
                                            ou règlementation fiscaux ou (ii) tout litige sur le statut fiscal de
                                            Tapalika.
                                        </p>
                                        <p>
                                            <b>7.6 Indépendance des parties : </b> Vous et Tapalika êtes des parties
                                            indépendantes, et aucune agence, aucun partenariat, aucune co-entreprise,
                                            aucune relation employeur-employé ou franchiseur-franchisé n'est voulu ou
                                            créé par cet Accord.
                                        </p>
                                        <p>
                                            <b>7.7 Informations provenant de tiers :</b> Nous ne contrôlons pas les
                                            informations fournies sur ce Site par des utilisateurs ou les Membres. Il
                                            est possible que Vous trouviez que les informations provenant de tiers
                                            soient préjudiciables, inexactes ou décevantes. Veuillez faire preuve
                                            d'attention lorsque Vous utilisez le Site et n'oubliez pas la présence de
                                            risques d'escroquerie. Lorsque Vous utilisez ce Site, Vous reconnaissez ces
                                            risques et acceptez que Tapalika ne pourra être tenue responsable des actes
                                            ou omissions des utilisateurs du Site ni des Membres.
                                        </p>
                                        <p>
                                            <b>7.8 Toutes les ventes sont irrévocables :</b> Toutes les ventes sont
                                            irrévocables. Une fois la commande validée, aucun remboursement, aucune
                                            annulation ou aucun échange (pour des dates ou horaires différents), ne sera
                                            possible.</p>

                                        <p>Conformément à l'article L.121-20-4 du code de la consommation qui prévoit,
                                            en substance, que les dispositions des articles L.121-20-1 (concernant
                                            notamment le droit de rétractation) ne sont pas applicables aux contrats
                                            ayant pour objet la prestation de services d'hébergement, de transport, de
                                            restauration, de loisirs - y compris la billetterie de spectacles - qui
                                            doivent être fournis à une date ou selon une périodicité déterminée, toute
                                            commande est définitive et ne peut être annulée ou échangée une fois la
                                            vente conclue. </p>

                                        <p>Si, pour une quelconque raison, Vous ne voulez plus les Billets que Vous avez
                                            commandés, Nous Vous invitons à les revendre sur notre Site. Pour en savoir
                                            plus sur la mise en vente de Billets sur Tapalika, rendez-Vous sur <a
                                                    href="http://www.Tapalika.fr/SellTickets.aspx">www.Tapalika.com</a>
                                        </p>

                                        <p>
                                            <b>7.9 Modification ou suspension du Site :</b> Tapalika se réserve le droit
                                            à tout moment de modifier ou d'arrêter, temporairement ou de manière
                                            permanente, le Site ou toute partie du Site avec ou sans préavis. Vous
                                            acceptez, dans le cadre de cet Accord, que Nous ne pourrons être tenus
                                            responsables envers Vous ou tout tiers de toute modification, suspension ou
                                            arrêt du Site ou de quelconque de ces Services, pour quelque raison que ce
                                            soit. Nous ne garantissons pas un accès continu, ininterrompu ou sûr à nos
                                            Services, et le fonctionnement de notre Site peut être altéré à cause de
                                            nombreux facteurs hors de notre contrôle. En outre, il est possible que le
                                            Site ne soit pas disponible pendant certaines périodes car il peut être mis
                                            à jour ou modifié. Le Site, pendant cette période, sera temporairement
                                            indisponible.
                                        </p>
                                        <p>
                                            <b>7.10 Avis :</b> Sauf indication explicite contraire de la part de
                                            Tapalika, tous les avis et notification que Vous souhaitez adresser à
                                            Tapalika doivent être envoyés par l'intermédiaire du formulaire de courrier
                                            électronique mis à disposition sur le Site sous le lien Contactez-nous.
                                            Notre adresse postale est 160 Greentree Drive, Suite 101, Dover, Delaware,
                                            Country of Kent, 19904, Madagascar d’Amérique.

                                        <p>Sauf indication explicite contraire, tous les avis et notification que Nous
                                            souhaitons Vous adresser seront envoyés à l'adresse email que Vous Nous
                                            aurez fournie lors du processus d'inscription à notre Site. Il sera
                                            considéré que l'avis aura été soumis un jour ouvrable après l'envoi de
                                            l'email.
                                        </p>
                                        <br/>
                                        <p>
                                            <b>8.1 Règlement des litiges :</b> Si, après avoir reçu les Billets, un
                                            Acheteur n'était pas satisfait d’une quelconque étape de l'achat, il devra
                                            suivre les procédures de recours indiquées dans la garantie Tapalika.</p>
                                        <p>
                                            <b>8.2 Droit de propriété intellectuelle :</b> Vous reconnaissez et acceptez
                                            que (i) nos brevets, marques commerciales, appellations commerciales,
                                            marques de service, copyrights et autres droits de propriété intellectuelle
                                            (collectivement « la propriété intellectuelle ») sont et doivent être notre
                                            unique propriété, et que (ii) rien dans cet Accord ne Vous confère de droits
                                            de propriété ou de droits de licence dans notre propriété intellectuelle.
                                            Par ailleurs, Vous ne devez ni à présent, ni à l'avenir, contester la
                                            validité de la propriété intellectuelle de Tapalika.
                                        </p>
                                        <p>
                                            <b>8.3 Copyright :</b> Copyright &copy; Tapalika Entertainment Inc 2017. Les
                                            logiciels et le Site, y compris notamment, tous les textes, tous les
                                            graphiques, tous les logos, tous les boutons, toutes les images, tous les
                                            clips audio, et tous les programmes informatiques, constituent la propriété
                                            de Tapalika ou de ses fournisseurs, et ils sont protégés par les lois
                                            internationales et nationales sur le copyright, la marque de commerce ou
                                            d'autres lois sur la propriété intellectuelle. La compilation (c'est-à-dire
                                            la collecte, l'organisation et l'assemblage) de tout le contenu du Site est
                                            réservée exclusivement à Tapalika et elle est protégée par les lois
                                            internationales et nationales sur le copyright. La reproduction, la
                                            modification, la distribution, la transmission, la réédition, l'affichage ou
                                            l'exécution des logiciels ou du contenu du Site sont strictement interdits.
                                        </p>
                                        <p>
                                            <b>8.4 Contrats supplémentaires :</b> Cet Accord intègre par référence les
                                            contrats et documents suivants également inclus au Site: </p>
                                        <ul class="go_list">
                                            <li><a href="" target="_new">Protection de vos informations personnelles</a>
                                            </li>
                                        </ul>
                                        </p>

                                        <p>
                                            <b>8.5 Loi applicable :</b> Cet Accord est régi par et doit être interprété
                                            conformément aux lois de l'Etat du Delaware des Madagascar d’Amérique. Vous
                                            consentez à la juridiction non-exclusive et personnelle des tribunaux du
                                            Delaware. Tapalika Entertainment Inc est enregistrée au Delaware à l’adresse
                                            suivante: 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent,
                                            19904, Madagascar d’Amérique.
                                        </p>
                                        <p><b>8.6 Modification :</b> Si Nous amendons cet Accord, une version révisée
                                            qui remplacera automatiquement les termes de cet Accord sera publiée sur le
                                            Site. La version révisée de cet Accord entre automatiquement en vigueur sept
                                            (7) jours après sa publication initiale sur le Site. Votre utilisation
                                            continue du Site et des Services après la publication par Tapalika de
                                            l'Accord révisé constituera une acceptation de votre part des termes de
                                            l'Accord révisé. Si Vous ne souhaitez pas accepter les termes de cet Accord
                                            ou une quelconque version révisée, Vous devez cesser d’utiliser les Services
                                            ou le Site.
                                        </p>
                                        <p><b>8.7 Divers :</b> Cet Accord (et tous les documents incorporés par
                                            référence) constitue l'intégralité de l'accord entre Vous et Nous et
                                            supplante tous les accords et toutes les conventions antérieures, écrits ou
                                            oraux, entre ces parties. Aucun amendement, aucune modification ou aucun
                                            ajout aux clauses de cet Accord ne sera valide ou en vigueur à moins qu'il
                                            n'ait été effectué conformément aux conditions explicites de cet Accord. Si
                                            une quelconque clause de cet Accord est jugée invalide ou inapplicable dans
                                            quelque circonstance que ce soit, son application dans toute autre
                                            circonstance ainsi que les autres clauses de cet Accord ne devront pas être
                                            affectées. Vous n'êtes pas autorisé(e) à céder ou à transférer cet Accord,
                                            ou ses droits ou obligations, sans approbation écrite préalable de Tapalika,
                                            qui se réserve le droit de refuser une telle approbation. Rien dans cet
                                            Accord n'a pour objet de conférer des droits ou des voies d’action à
                                            quiconque ou à toute entité autre que les parties du présent Accord et à
                                            leurs successeurs ou ayants droit. Nos fournisseurs et nos partenaires sont
                                            des bénéficiaires tiers de cet Accord. Cela ne Nous empêche pas de modifier
                                            ces termes sans y faire référence. Les titres des paragraphes de cet Accord
                                            ont uniquement valeur de référence et ne définissent, ne limitent,
                                            n'interprètent ou ne décrivent en aucun cas la portée ou l'étendue de ces
                                            paragraphes.
                                        </p>

                                        <br>


                                    </div>
                                </div>

                                <div id="div_tapakila_contact" class="hide">
                                    <div class="centre">
                                        <h4 class="titre">Comment puis-je contacter Tapakila ?</h4>
                                        <br><br>
                                        <div class="ptxl">
                                            Nous sommes une entreprise en ligne, nous proposons donc également un
                                            service client en ligne !<br>
                                            Vous pouvez nous contacter à propos d'une commande ou d'une vente n'importe
                                            quand avant la date de l'événement, et ce jusqu'à 3 mois après.
                                            <br>
                                            <br>
                                            <i class="i-comments-alt cGrn3 fs30"></i> <Strong>La meilleure façon de nous
                                                contacter :</Strong>
                                            <br>
                                            <br>
                                            <ul class="ul">
                                                <li><a href="">Cliquez ici pour vous Connecter à votre compte</a> avec
                                                    l'adresse email que vous avez utilisé pour créer votre commande ou
                                                    votre listing.
                                                <li>Choisissez "Mes Achats" ou "Mes Ventes".</li>
                                                <li>Selectionnez la commande à propos de laquelle vous souhaitez nous
                                                    contacter en cliquant sur le lien "Service Clientèle".
                                                </li>
                                                <li>Choisissez la question que vous souhaitez poser.</li>
                                                <li>Nous vérifierons immédiatement votre commande pour vous donner une
                                                    réponse personnalisée.
                                                </li>
                                                <li>En ce qui concerne les questions pour lesquelles il est possible de
                                                    faire appel à un conseiller, cliquer "Non- Contactez-nous" après
                                                    "Avez-vous trouvé cette réponse satisfaisante ?" et renseignez votre
                                                    demande.
                                                </li>
                                                <li>L'un de nos conseillers vous répondra le plus rapidement possible.
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tile">
                                                <Strong><a href="">Aide à la connexion</a></Strong>
                                                <br>
                                                Si vous ne vous souvenez plus de l'email que vous avez utilisé, si vous
                                                réglez en tant qu'invité, ou avez oublié votre mot de passe, nous
                                                pouvons vous aider !
                                            </div>
                                            <br>
                                            <div class="tile">
                                                <Strong><a href="sercice-clientele.html">Voir notre FAQ</a></Strong>
                                                <br>
                                                Si vous n'avez pas encore de commande ou de listing, la réponse à votre
                                                question se trouve peut-être dans notre top FAQ
                                            </div>
                                            <br>
                                            <br>
                                            Vous n'arrivez toujours pas à nous contacter ? Veuillez <a href="">cliquer
                                                ici</a> pour sélectionner une raison et nous permettre d'améliorer nos
                                            services.
                                            </p>
                                        </div>


                                        <br>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--                                    ID2                            -->


                    <div class="tab-pane" id="2">
                        <div class="row">
                            <div class="col-lg-4">

                                <div class="menu_FQ">

                                    <div id='cssmenu'>
                                        <ul id="coco2">
                                            <li class='active has-sub generale'
                                                onClick="changePage('div_compte2', 'a_compte2')" id="a_compte2"><a
                                                        href='#'><span class="glyphicon glyphicon-exclamation-sign"
                                                                       aria-hidden="true"></span>Generale</a>
                                            <li>
                                            <li class='active has-sub' id="li_ach"><a href='#'><span
                                                            class="glyphicon glyphicon-tags" aria-hidden="true"></span>Acheter
                                                    les billets</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_billets"
                                                             onClick="changePage('div_billets', 'a_billets','li_ach')">
                                                            Comment vendre les billets ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_offre"
                                                             onClick="changePage('div_offre', 'a_offre','li_ach')">
                                                            Comment modifier mon offre ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_supprimer_offre"
                                                             onClick="changePage('div_supprimer_offre', 'a_supprimer_offre','li_ach')">
                                                            Comment supprimer mon offre ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_options_offre"
                                                             onClick="changePage('div_options_offre', 'a_options_offre','li_ach')">
                                                            Que signifient les options de séparation de billets ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>

                                            <li class='active has-sub' id="li_envoyer"><a href='#'><span
                                                            class="glyphicon glyphicon-bed" aria-hidden="true"></span>Envoyer
                                                    vos places</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_places_envoyer"
                                                             onClick="changePage('div_places_envoyer', 'a_places_envoyer','li_envoyer')">
                                                            Comment envoyer vos places ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_places_organiser"
                                                             onClick="changePage('div_places_organiser', 'a_places_organiser','li_envoyer')">
                                                            Comment organiser le retrait des billets par coursier ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_electronique"
                                                             onClick="changePage('div_billets_electronique', 'a_billets_electronique','li_envoyer')">
                                                            Comment télécharger des billets électroniques ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_billets_autre"
                                                             onClick="changePage('div_billets_autre', 'a_billets_autre','li_envoyer')">
                                                            Puis-je envoyer les billets en utilisant une autre méthode
                                                            de livraison ?
                                                        </div>

                                                    </li>

                                                </ul>
                                            </li>
                                            <li class='active has-sub' id="li_recevez"><a href='#'><span
                                                            class="glyphicon glyphicon-shopping-cart"
                                                            aria-hidden="true"></span>Recevez
                                                    votre paiement</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_vente_paiement"
                                                             onClick="changePage('div_vente_paiement', 'a_vente_paiement','li_recevez')">
                                                            Quand vais-je recevoir un paiement pour ma vente ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_vente_methode"
                                                             onClick="changePage('div_vente_methode', 'a_vente_methode','li_recevez')">
                                                            Comment modifier la méthode de paiement choisie pour la
                                                            réception des paiements ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>


                                            <li class='active has-sub' id="li_annulation"><a href='#'><span
                                                            class="glyphicon glyphicon-minus-sign"
                                                            aria-hidden="true"></span>Questions
                                                    d'annulations</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_ev2"
                                                             onClick="changePage('div_ev2', 'a_ev2','li_annulation')">
                                                            <span class="glyphicon glyphicon-minus-sign"
                                                                  aria-hidden="true"></span> Puis-je annuler ma vente ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>


                                            <li class='active has-sub' id="li_gererr"><a href='#'><span
                                                            class="glyphicon glyphicon-user" aria-hidden="true"></span>Gérer
                                                    mon
                                                    compte</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_news2"
                                                             onClick="changePage('div_news2', 'a_news2','li_gererr')">
                                                            J'ai saisi une adresse e-mail incorrecte lors de
                                                            l'inscription, comment puis-je la modifier ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_email2"
                                                             onClick="changePage('div_compte_email2', 'a_compte_email2','li_gererr')">
                                                            Comment modifier l'adresse e-mail de mon compte ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_pswd2"
                                                             onClick="changePage('div_compte_pswd2', 'a_compte_pswd2','li_gererr')">
                                                            Comment réinitialiser mon mot de passe ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_newsletter2"
                                                             onClick="changePage('div_compte_newsletter2', 'a_compte_newsletter2','li_gererr')">
                                                            Comment se désinscrire de la newsletter ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_compte_commande2"
                                                             onClick="changePage('div_compte_commande2', 'a_compte_commande2','li_gererr')">
                                                            Pourquoi est-ce que je ne peux pas voir ma commande ou vente
                                                            dans mon compte ?
                                                        </div>

                                                    </li>
                                                </ul>
                                            </li>
                                            <li class='active has-sub' id="li_tapakila"><a href='#'><span
                                                            class="glyphicon glyphicon-exclamation-sign"
                                                            aria-hidden="true"></span>A propos de Tapakila</a>
                                                <ul>
                                                    <li>
                                                        <div id="a_tapakila_definition2"
                                                             onClick="changePage('div_tapakila_definition2', 'a_tapakila_definition2')">
                                                            Qu'est-ce que Tapakila ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_garantie2"
                                                             onClick="changePage('div_tapakila_garantie2', 'a_tapakila_garantie2','li_tapakila')">
                                                            Qu'est-ce que la garantie Tapakila?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_recouvre2"
                                                             onClick="changePage('div_tapakila_recouvre2', 'a_tapakila_recouvre2','li_tapakila')">
                                                            Que recouvrent les frais Tapakila?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_terme2"
                                                             onClick="changePage('div_tapakila_terme2', 'a_tapakila_terme2','li_tapakila')">
                                                            Quelles sont les Termes et Conditions de Tapalika ?
                                                        </div>

                                                    </li>
                                                    <li>
                                                        <div id="a_tapakila_contact2"
                                                             onClick="changePage('div_tapakila_contact2', 'a_tapakila_contact2','li_tapakila')">
                                                            Comment puis-je contacter Tapakila ?
                                                        </div>

                                                    </li>
                                                </ul>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div id="div_compte2">
                                    <div class="centre">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a>
                                                    <h4 class="titre"><span class="glyphicon glyphicon-tags"
                                                                            aria-hidden="true"></span> Vendre les
                                                        billets</h4>
                                                </a>
                                                <p><a onClick="changePage('div_billets', 'a_billets','li_ach')">Comment
                                                        vendre les billets sur Tapakila ?</a></p>
                                                <p><a onClick="changePage('div_offre', 'a_offre','li_ach')">Comment
                                                        modifier mon offre ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_supprimer_offre', 'a_supprimer_offre','li_ach')">Comment
                                                        supprimer mon offre ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_options_offre', 'a_options_offre','li_ach')">Que
                                                        signifient les options de séparation de billets ?</a></p>


                                            </div>
                                            <div class="col-lg-6">
                                                <a>
                                                    <h4 class="titre"><span class="glyphicon glyphicon-bed"
                                                                            aria-hidden="true"></span> Envoyer vos
                                                        places</h4>
                                                </a>
                                                <p>
                                                    <a onClick="changePage('div_places_envoyer', 'a_places_envoyer','li_envoyer')">Comments
                                                        envoyer les billets ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_places_organiser', 'a_places_organiser','li_envoyer')">Comment
                                                        organisé le retrait des billets par coursier ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_electronique', 'a_billets_electronique','li_envoyer')">Comment
                                                        télécharger des billets électroniques ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_billets_autre', 'a_billets_autre','li_envoyer')">Puis-je
                                                        envoyer les billets en utilisant une autre méthode de livraison
                                                        ?</a></p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a>
                                                    <h4 class="titre"><span class="glyphicon glyphicon-minus-sign"
                                                                            aria-hidden="true"></span> Questions
                                                        d'annulations</h4>
                                                </a>
                                                <p><a onClick="changePage('div_ev2', 'a_ev2','li_annulation')">Puis-je
                                                        annuler ma vente ?</a></p>


                                            </div>
                                            <div class="col-lg-6">
                                                <a>
                                                    <h4 class="titre"><span class="glyphicon glyphicon-shopping-cart"
                                                                            aria-hidden="true"> Recevez votre paiement
                                                    </h4></a>
                                                <p>
                                                    <a onClick="changePage('div_vente_paiement', 'a_vente_paiement','li_recevez')">Quand
                                                        vais-je recevoir un paiement pour ma vente ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_vente_methode', 'a_vente_methode','li_recevez')">Comment
                                                        modifier la méthode de paiement choisie pour la réception des
                                                        paiements ?</a></p>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a><h4 class="titre"><span class="glyphicon glyphicon-user"
                                                                           aria-hidden="true"> Gérer mon compte</h4></a>
                                                <p><a onClick="changePage('div_news2', 'a_news2','li_gererr')">J'ai
                                                        saisi une adresse e-mail incorrecte lors de l'inscription,
                                                        comment
                                                        puis-je la modifier ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_email2', 'a_compte_email2','li_gererr')">Comment
                                                        modifier l'adresse e-mail de mon compte ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_pswd2', 'a_compte_pswd2','li_gererr')">Comment
                                                        réinitialiser mon mot de passe ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_newsletter2', 'a_compte_newsletter2','li_gererr')">Comment
                                                        se désinscrire de la newsletter ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_compte_commande2', 'a_compte_commande2','li_gererr')">
                                                        Pourquoi est-ce que je ne peux pas voir ma commande ou vente
                                                        dans mon compte ?</a></p>

                                            </div>
                                            <div class="col-lg-6">
                                                <a><h4 class="titre"><span class="glyphicon glyphicon-exclamation-sign"
                                                                           aria-hidden="true">   A propos de Tapakila
                                                    </h4></a>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_definition2', 'a_tapakila_definition2','li_tapakila')">Qu'est-ce
                                                        que Tapakila ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_garantie2', 'a_tapakila_garantie2','li_tapakila')">Qu'est-ce
                                                        que la garantie Tapakila?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_recouvre2', 'a_tapakila_recouvre2','li_tapakila')">
                                                        Que recouvrent les frais Tapakila?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_terme2', 'a_tapakila_terme2','li_tapakila')">
                                                        Quelles sont les Termes et Conditions de Tapalika ?</a></p>
                                                <p>
                                                    <a onClick="changePage('div_tapakila_contact2', 'a_tapakila_contact2','li_tapakila')">
                                                        Comment puis-je contacter Tapakila ?</a></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div id="div_billets">
                                    <div class="centre">
                                        <h4 class="titre">Comment vendre des billets ?</h4>

                                        <br><br>
                                        Tapakila autorise la mise en vente de billets sur sa plateforme. Pour vendre vos
                                        billets en trop :

                                        <br><br>
                                        <ol type="i">
                                            <li>Cliquez sur le bouton « Vendre des billets » en haut à droite de la page
                                                d'accueil.
                                            </li>
                                            <li>Recherchez l'événement pour lequel vous souhaitez vendre des billets. Si
                                                vous ne trouvez pas votre événement, indiquez-le en cliquant <a
                                                        href="/Browse/eventrequest" rel="nofollow" data-modal="true"
                                                        target="_blank">ici</a>, et nous l'ajouterons à notre site web
                                            </li>
                                            <li>Suivez les étapes de saisie des informations relatives à votre billet.
                                                Important : indiquez la manière dont vous souhaitez être payé(e) une
                                                fois que les billets auront été vendus.
                                            </li>
                                            <li>Vérifiez et confirmez votre annonce afin qu'elle puisse être mise à la
                                                disposition de millions d'acheteurs potentiels dans le monde entier.
                                            </li>
                                        </ol>
                                        <strong>Choses importantes à savoir lors de la mise en vente de vos billets
                                            :</strong>
                                        <ul class="ul mtm">
                                            <li>Donnez à vos acheteurs potentiels le plus d'informations possibles
                                                concernant l'emplacement en indiquant le bloc, la rangée et le numéro de
                                                la place.
                                            </li>
                                            <li>Si des billets en place assise sont mis en vente dans une seule annonce,
                                                ces places doivent être consécutives.
                                            </li>
                                            <li>Toute mention spéciale, comme par exemple « billet enfant » ou « vue
                                                restreinte » doit figurer clairement.
                                            </li>
                                            <li>Vérifiez régulièrement les prix auxquels vous avez listé vos billets
                                                pour vous assurer qu’ils soient compétitifs.
                                            </li>
                                            <li>Téléchargez les billets électroniques dès que vous les avez. Ils
                                                figureront dans la rubrique Téléchargement instantané sur le site web,
                                                et pourront ainsi être vendus plus rapidement.
                                            </li>
                                            <li>Confirmez rapidement votre vente dès que nous vous aurons informé que
                                                les billets ont été vendus.
                                            </li>
                                            <li>Envoyez vos billets à l'acheteur avant la date limite d'envoi.</li>
                                        </ul>


                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_offre">
                                    <div class="centre">
                                        <h4 class="titre">Comment modifier mon offre ?</h4>

                                        <br><br>
                                        Vous pouvez modifier votre offre si les billets n'ont pas encore été vendus.


                                        <br><br>
                                        Pour modifier votre offre, veuillez vous rendre à la rubrique Offres. Cliquez
                                        sur le lien « Modifier l'offre » pour corriger les données. Une fois les
                                        changements effectués, n'oubliez pas de « Sauvegarder ».

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_supprimer_offre">
                                    <div class="centre">
                                        <a><h4 class="titre">Comment supprimer mon offre ?</h4></a>

                                        <br><br>
                                        Vous pouvez supprimer votre offre si les billets n'ont pas encore été vendus.

                                        <br><br>
                                        Pour supprimer votre offre, veuillez vous rendre à la rubrique Offres. Cliquez
                                        sur le lien « Modifier l'offre » puis sélectionnez l'option « Supprimer l'offre
                                        ». Vous devrez confirmer cette action.
                                        <br><br>
                                        Si vous souhaitez suspendre temporairement votre offre du site Tapakila, vous
                                        pouvez la dépublier puis la republier plus tard.

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_options_offre">
                                    <div class="centre">
                                        <h4 class="titre"> Que signifient les options de séparation de billets ?</h4>

                                        <br><br>
                                        Les options de séparation vous permettent de choisir la manière dont vous
                                        souhaitez
                                        vendre vos billets. Un groupe de billets peut être vendu en bloc ou peut être
                                        séparé et vendu à plusieurs acheteurs différents.
                                        <br>
                                        <ul class='ul'>
                                            <li>Peu importe : n'importe quelle quantité de billets peut être achetée, à
                                                hauteur du nombre maximum mis en vente
                                            </li>
                                            <li>Aucun : aucun billet ne peut être vendu séparément</li>
                                            <li>Éviter de laisser un billet : aucun billet ne peut être vendu
                                                séparément
                                            </li>
                                            <!--<li>Éviter de laisser un ou trois billet(s) : aucun billet ou groupe de trois billets ne peut être vendu séparément</li>-->
                                            <li>Éviter les nombres impairs : les billets peuvent être uniquement vendus
                                                par deux
                                            </li>
                                        </ul>

                                        <br><br>
                                        Veuillez noter que les places assises se vendent plus facilement si elles sont
                                        vendues par groupe de deux ou plus.

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_places_envoyer">
                                    <div class="centre">
                                        <h4 class="titre"> Comment envoyer les billets ?</h4>

                                        <br><br>
                                        Veuillez vous rendre à la rubrique Ventes dès que vous aurez reçu vos billets et
                                        que vous serez en mesure de les envoyer.

                                        <br><br>
                                        Cliquez uniquement sur le bouton « prêt à envoyer » si vous êtes prêt(e) à
                                        envoyer les billets. Vous recevrez des informations relatives à l'envoi des
                                        billets ainsi que le paiement de votre vente.

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_places_organiser">
                                    <div class="centre">
                                        <h4 class="titre"> Comment organiser le retrait des billets par coursier ?</h4>

                                        <br><br>
                                        La collecte par coursier des billets vendus est uniquement nécessaire lorsque
                                        vous utilisez des méthodes de livraison telles qu'UPS.

                                        <br><br>
                                        Cliquez uniquement sur le bouton « prêt à envoyer » si vous êtes prêt(e) à
                                        envoyer les billets. Suivez les étapes pour imprimer le bordereau d'envoi et
                                        sélectionnez une date de retrait ainsi que l'adresse. Les billets peuvent être
                                        retirés à domicile ou sur le lieu de travail.

                                        <br><br>
                                        Une fois que vous aurez organisé le retrait des billets par coursier, vous ne
                                        pourrez ni annuler, ni effectuer de modifications sur le site web. Veuillez
                                        contacter la société de livraison (pour UPS : 0821 23 38 77) pour modifier
                                        l'heure de retrait des billets.
                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_billets_electronique">
                                    <div class="centre">
                                        <h4 class="titre"> Comment télécharger des billets électroniques ?</h4>

                                        <br><br>
                                        Veuillez vous rendre à la rubrique Ventes dès que vous aurez reçu vos billets et
                                        que vous serez en mesure de les télécharger.
                                        <br><br>

                                        Cliquez uniquement sur le bouton « Télécharger des billets électroniques » si
                                        vous êtes prêt à le faire. Vous recevrez des informations relatives au
                                        chargement des billets ainsi que le paiement de votre vente.
                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_billets_autre">
                                    <div class="centre">
                                        <h4 class="titre"></span> Puis-je envoyer les billets en utilisant une autre
                                            méthode de livraison ?</h4>


                                        <br><br> Non, il n'est pas possible d'utiliser une autre méthode de livraison.
                                        L'utilisation de cette méthode
                                        de livraison permet d'éviter tout retard de paiement correspondant à la vente de
                                        vos billets.

                                        <br><br> Lorsque vous serez prêt(e) à envoyer vos billets, rendez-vous sur la
                                        rubrique Ventes pour savoir comment
                                        envoyer vos billets à votre acheteur.
                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_vente_paiement">
                                    <div class="centre">

                                        <h4 class="titre"> Quand vais-je recevoir un paiement pour ma vente ?</h4>


                                        <br><br> Vous pouvez modifier votre méthode de paiement à tout moment jusqu'à la
                                        réception du paiement. Rendez-vous
                                        à la section Méthodes de paiement pour modifier les informations.

                                        <br><br> Si vous avez ajouté une nouvelle méthode de paiement, n'oubliez pas de
                                        cliquer sur l'icône « étoile »
                                        pour que cette méthode de paiement soit définie par défaut.
                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_vente_methode">
                                    <div class="centre">

                                        <h4 class="titre">
                                            </span> Comment modifier la méthode de paiement choisie pour la réception
                                            des paiements ?</h4>

                                        <br><br> Vous pouvez modifier votre méthode de paiement à tout moment jusqu'à la
                                        réception du paiement. Rendez-vous
                                        à la section Méthodes de paiement pour modifier les informations.

                                        <br><br> Si vous avez ajouté une nouvelle méthode de paiement, n'oubliez pas de
                                        cliquer sur l'icône « étoile »
                                        pour que cette méthode de paiement soit définie par défaut.

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_ev2">
                                    <div class="centre">

                                        <h4 class="titre">
                                            </span> Puis-je annuler ou modifier mon vente ?</h4>

                                        <br><br> Non, une fois que vos billets ont été vendus, vous ne pouvez pas
                                        annuler la vente car l'acheteur attend
                                        les billets.
                                        <br><br> Si vous n'êtes plus en mesure d'envoyer les billets que vous avez
                                        vendus, Tapakila se réserve le droit
                                        de facturer des frais de pénalité liés au remplacement des billets pour
                                        l'acheteu

                                        <br><br>

                                    </div>

                                </div>
                                <div id="div_news2">
                                    <div class="centre">

                                        <h4 class="titre"> J'ai saisi une adresse e-mail incorrecte lors de
                                            l'inscription, comment puis-je la modifier ?</h4>

                                        <br><br> Consultez la rubrique Configuration du compte en vous connectant à
                                        l'aide de l'e-mail « incorrect » utilisé
                                        lors de la première inscription. Cliquez sur le lien « Modifier » situé à côté
                                        de l'adresse e-mail.

                                    </div>

                                </div>
                                <div id="div_compte_email2">
                                    <div class="centre">

                                        <h4 class="titre">Comment modifier l'adresse e-mail de mon compte ?</h4>

                                        <br><br> Consultez la rubrique Configuration du compte en vous connectant à
                                        l'aide de l'e-mail « incorrect » utilisé
                                        lors de la première inscription. Cliquez sur le lien « Modifier » situé à côté
                                        de l'adresse e-mail.

                                    </div>

                                </div>
                                <div id="div_compte_pswd2">
                                    <div class="centre">

                                        <h4 class="titre">Comment réinitialiser mon mot de passe ?</h4>

                                        <br><br> Cliquez <a href="réinitialiser.html" class="class_a">ici</a> pour
                                        réinitialiser votre mot de passe.

                                    </div>

                                </div>
                                <div id="div_compte_newsletter2">
                                    <div class="centre">

                                        <h4 class="titre">Comment se désinscrire de la newsletter ?</h4>

                                        <br><br> Rendez-vous à la rubrique Configuration du compte et cliquez sur le
                                        lien « Modifier » situé à côté de
                                        l'onglet « Abonnements » pour modifier vos préférences.

                                    </div>

                                </div>
                                <div id="div_compte_commande2">
                                    <div class="centre">

                                        <h4 class="titre">Pourquoi est-ce que je ne peux pas voir ma commande ou vente
                                            dans mon compte ?</h4>

                                        <br><br>
                                        <div class="ptxl">
                                            <p> Les deux principales raisons pour lesquelles les clients ne voient pas
                                                leur commande ou leur vente sont:
                                                <br/>
                                                <br/>
                                                <strong> Il se peut que vous soyez connecté sur le mauvais
                                                    compte</strong>
                                                <br/> Il est probable que vous ayez effectué votre achat en étant
                                                connecté depuis un deuxième compte à l'aide
                                                de l'une de vos autres adresses email, ou par le bais de Facebook.
                                                <br/>
                                                <br/>
                                                <strong> Vous avez fait une faute de frappe dans votre adresse email en
                                                    utilisant la procédure de paiement pour invité</strong>
                                                <br/> Lorsque vous payez en tant qu'invité, l'adresse email que vous
                                                entrez deviend l'adresse email de votre
                                                compte et celle grâce à laquelle vous pourrez trouver votre commande.
                                                <br/>
                                                <br/>
                                                <em>Afin de résoudre ceci:</em>
                                            <p><strong>1</strong> - Consultez vos <a href="mon_compte.html">Paramètres
                                                    de Compte</a> et prenez note de l'adresse
                                                email de ce compte.</p>
                                            <p><strong>2</strong> - Déconnectez-vous et tentez de vous reconnecter à
                                                l'aide d'une autre adresse email que vous
                                                pouvez avoir, ou bien à l'aide de Facebook, afin de voir si vous
                                                possédez un deuxième compte sur lequel votre
                                                commande pourrait se trouver.</p>
                                            <p><strong>3</strong> - Si vous ne parvenez toujours pas à trouver votre
                                                commande ou vente, rendez-vous sur notre
                                                page mot de passe oublié / aide à la connection.</p>
                                        </div>


                                    </div>

                                </div>
                                <div id="div_tapakila_definition2">
                                    <div class="centre">

                                        <h4 class="titre">Qu'est-ce que Tapakila ?</h4>

                                        <br><br> Tapakila est une plate-forme en ligne d'échelle mondiale pour les
                                        billets d'événements sportifs, musicaux,
                                        et de divertissement en direct. Tapakila vise à fournir aux acheteurs de billets
                                        la plus grande sélection de billets
                                        possible pour des événements à travers le monde, et aide les vendeurs de
                                        billets, des personnes détenant un billet
                                        supplémentaire aux grandes organisations événementielles multi-nationales, à
                                        atteindre un large public.
                                        <br><br> Tapakila est en partenariat avec un grand nombre des marques mondiales
                                        les plus éminentes dans le sport
                                        et le divertissement, et a aidé des clients venant de presque tous les pays du
                                        monde à avoir accès à des billets
                                        dans la langue, devise, et depuis l'appareil de leur choix.
                                        <br><br> Pour toute demande client, merci de visiter la section Aide du site
                                        internet Tapakila.
                                        <br>

                                    </div>

                                </div>
                                <div id="div_tapakila_garantie2">
                                    <div class="centre">

                                        <h4 class="titre">Qu'est-ce que la garantie Tapakila ?</h4>

                                        <br><br> Les <strong>acheteurs</strong> recevront dans tous les cas leurs
                                        billets dans les temps avant l'évènement.
                                        En cas de problème, Tapakila intervient pour proposer des billets de
                                        remplacement ou un remboursement.
                                        </p>

                                        <p>
                                            Les <strong>vendeurs</strong> sont sûrs d'être payés pour les billets
                                            vendus.
                                        </p>

                                        <br>

                                    </div>

                                </div>
                                <div id="div_tapakila_recouvre2">
                                    <div class="centre">

                                        <h4 class="titre">Que recouvrent les frais Tapakila ?</h4>

                                        <br><br>
                                        <div class="ptxl">
                                            <b>Acheteur :</b> Tapakila facture des frais de service venant s'ajouter au
                                            prix du billet. Ces frais sont indiqués
                                            clairement au cours du processus de paiement et ils servent à couvrir les
                                            frais de gestion de la plate-forme
                                            Tapalika, du service client et d'envoi des billets.
                                            <br><br>
                                            <b>Vendeurs :</b> Tapakila facture des frais de service sur la vente de vos
                                            billets. Ces frais sont indiqués
                                            clairement au cours du processus de vente et ils servent à couvrir les frais
                                            de marketing permettant de mettre
                                            vos billets à disposition de millions d'acheteurs potentiels dans le monde
                                            entier. Ces frais seront déduits de
                                            votre paiement.
                                            <br><br> Veuillez noter que le montant des frais de service peut varier
                                            selon l'événement et sont assujettis
                                            à la TVA.

                                            <br>

                                        </div>
                                    </div>

                                </div>
                                <div id="div_tapakila_terme2">
                                    <div class="centre">

                                        <h4 class="titre">Quelles sont les Termes et Conditions de Tapakila ? </h4>

                                        <br><br>
                                        <h2>Conditions d'utilisation</h2>
                                        <p>
                                            <br/>
                                            <b>PRÉAMBULE</b><br/><br/>
                                        <p>La société Tapalika Entertainment Inc, immatriculée au Madagascar, Vous
                                            propose sur le site Internet disponible
                                            à l’adresse <a href="http://www.Tapalika.com">www.Tapalika.com</a> un
                                            service de mise en relation (ci-après
                                            la « Plateforme Tapalika ») entre vendeurs (les « Vendeurs ») de billets de
                                            spectacles ou événements sportifs
                                            (les « Billets ») et acheteurs (les « Acheteurs ») de ces mêmes Billets. Les
                                            Vendeurs et les Acheteurs sont
                                            ci-après désignés conjointement les Membres. La Plateforme Tapalika permet
                                            la conclusion de contrats de vente
                                            des Billets. Toutefois, les Membres sont seuls décisionnaires de la
                                            concrétisation de la vente et de l'achat
                                            des Billets.</p>

                                        <p>L'acceptation des présentes Conditions générales d'utilisation de la
                                            Plateforme Tapalika par les Membres Vous
                                            permet d’accéder à cette plateforme servant à mettre en relation Vendeurs et
                                            Acheteurs et à opérer les transactions
                                            effectuées sur le site <a href="http://www.Tapalika.fr">www.Tapalika.com</a>
                                            selon les modalités définies ci-après.
                                        </p>

                                        <p>
                                            <b>DÉFINITIONS</b></p>

                                        <p><b>Conditions Générales d’Utilisation ou Accord :</b> désigne les présentes
                                            conditions générales d’utilisation.</p>

                                        <p><b>Plateforme Tapalika :</b> désigne la structure fonctionnelle et
                                            organisationnelle mise en place par Tapalika
                                            sur le Site permettant la mise en relation de Vendeurs et d'Acheteurs de
                                            Billets.</p>

                                        <p><b>Billet(s) :</b> désigne les billets de spectacle ou d’événements sportifs
                                            en Madagascar ou à l’étranger, susceptibles
                                            de faire l'objet d'une mise en relation par le biais de la Plateforme
                                            Tapalika.</p>

                                        <p><b>Billet(s) Interdit(s) :</b> désigne les billets de spectacle ou
                                            d’événements sportifs dont la vente ne serait
                                            pas autorisée en vertu de dispositions législatives, réglementaires ou
                                            contractuelles. Il s'agit notamment des
                                            Billets qui constitueraient des Billets contrefaisants au sens du Code de la
                                            propriété intellectuelle ou qui
                                            seraient vendus en violation de réseaux de distribution sélective ou
                                            exclusive, notamment les Billets vendus
                                            en violation de l’article 313-6-2 du Code pénal. </p>

                                        <p><b>Vendeur(s) :</b> désigne un Membre mettant en vente un Billet sur la
                                            Plateforme Tapalika, et éditant à cet
                                            effet une Offre de Vente sur le Site, dans le respect des conditions
                                            définies à l’article 3.1 des présentes
                                            Conditions Générales d’Utilisation. </p>

                                        <p><b>Acheteur(s) :</b> désigne un Membre ayant accepté l'offre d'un Vendeur.
                                        </p>

                                        <p><b>Membre(s) ou Vous :</b> désigne toute personne, Vendeur ou Acheteur,
                                            susceptible de faire usage de la Plateforme
                                            Tapalika après acceptation des présentes Conditions Générales d’Utilisation.
                                            Tout Membre s'engage à fournir
                                            des informations exactes quant à son identité, adresse et autres données
                                            nécessaires à l'accès à la Plateforme
                                            Tapalika et à mettre à jour toute modification concernant ces informations.
                                        </p>

                                        <p><b>Offre de Vente ou Listing :</b> désigne toute annonce ou offre de vente
                                            d’un Billet éditée par un Vendeur
                                            sur la Plateforme Tapalika, incluant au moins une description des
                                            caractéristiques du Billet proposé à la Vente
                                            (date et lieu de la manifestation auquel le Billet donne accès, référence
                                            des places ou catégories de places
                                            auxquelles le Billet donne accès, etc.) et un Prix de Vente proposé. </p>

                                        <p><b>Prix de Vente :</b> désigne le prix proposé par le Vendeur pour son Offre
                                            de Vente d'un Billet duquel est
                                            déduit la Commission lors de la réalisation d’une vente de Billet. </p>

                                        <p><b>Commission :</b> désigne la rémunération perçue par Tapalika sur le Prix
                                            de Vente lors de la vente d’un Billet.
                                        </p>

                                        <p><b>Prix de la Transaction :</b> désigne le prix total payable par l'Acheteur
                                            lors de l’achat d’un Billet sur
                                            le Site, comportant selon les cas, en plus du Prix de Vente, les frais de
                                            réservation, les frais de port définis
                                            de façon forfaitaire, la TVA sur l’ensemble des éléments précédents, ou tout
                                            autre impôt ou taxe s’appliquant.
                                        </p>

                                        <p><b>Service(s) :</b> désigne tous les services offerts sur le site <a
                                                    href="http://www.Tapalika.com">www.Tapalika.com</a>.</p>

                                        <p><b>Site :</b> désigne le site <a href="http://www.Tapalika.com">www.Tapalika.com</a>.
                                        </p>

                                        <p><b>Titulaire des Droits d’Exploitation ou TDE :</b> désigne toute personne
                                            responsable, à quelque titre que ce
                                            soit, de l’organisation de la manifestation ou du spectacle pour
                                            laquelle/lequel un Listing est mis en ligne
                                            sur le Site par un Vendeur et disposant en cette qualité de droits
                                            d’exploitation sur ladite/ledit manifestation
                                            ou spectacle. Cette définition vise notamment, sans que cette liste soit
                                            limitative, le producteur, l'organisateur
                                            ou le propriétaire des droits d'exploitation de la manifestation ou du
                                            spectacle.</p>

                                        <p><b>Tapalika ou Nous :</b> désigne la société Tapalika Entertainment Inc, sise
                                            à 160 Greentree Drive, Suite 101,
                                            Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.</p>

                                        <p>
                                            <b>1.1 Introduction :</b> Les présentes Conditions Générales d'Utilisation
                                            de la Plateforme Tapalika ont pour
                                            objet de définir les modalités de l'accord entre Vous et Nous, les
                                            conditions par lesquelles les Membres sont
                                            autorisés à utiliser la Plateforme Tapalika aux fins d'opérer leur mise en
                                            relation et tous les autres Services
                                            que Nous offrons. Par l'utilisation de ce Site et des Services, Vous
                                            confirmez accepter cet Accord et l’intégralité
                                            de ses termes. </p>

                                        <p>
                                            <b>1.2 Mise en relation :</b> Tapalika offre à ses Membres de mettre en
                                            relation Acheteurs et Vendeurs de Billets.
                                            Tapalika ne devient pas propriétaire des Billets et les transactions sont
                                            effectuées entre les Acheteurs et
                                            les Vendeurs. Nous n'intervenons pas dans la transaction entre Acheteurs et
                                            Vendeurs. En conséquence, Nous n'exerçons
                                            aucun contrôle sur la qualité, la sûreté ou la licéité des Billets, la
                                            véracité ou l'exactitude du contenu ou
                                            des Offres de Vente des Membres, la capacité des Vendeurs à vendre ni la
                                            capacité des Acheteurs à payer les
                                            Billets. Nous ne pouvons pas non plus assurer que le Vendeur ou l'Acheteur
                                            concluront la transaction. </p>

                                        <p>
                                            <b>1.3 Commissions et Services :</b> L'inscription, la mise en vente d’un
                                            Billet et l'action de se porter acquéreur
                                            de Billets proposés sur notre Site sont gratuites. Cependant, l'utilisation
                                            d'autres Services, tels que l’achat
                                            effectif d’un Billet, est payante. Lorsque Vous mettez en vente un Billet,
                                            Vous avez la possibilité de passer
                                            en revue les taux de Commission tels qu’ils sont détaillés dans la rubrique
                                            <a href="service-clientele.html">« Quels frais de gestion sont déduits du
                                                prix de vente » </a>des
                                            pages d’aide du Site disponibles à l’adresse URL suivante <a
                                                    href="service-clientele.html">http://www.Tapalika.com/service-clientele.html</a>.
                                            Vous devez accepter ces tarifs pour mettre en ligne votre Offre de Vente.
                                            Sauf mention contraire, les taux de
                                            Commission sont indiqués sous forme de pourcentage du Prix de Vente et sont
                                            facturés en AR (Ariary).
                                        </p>

                                        <p>
                                            <b>1.4 Garantie Tapalika :</b> Lorsque Vous achetez des billets sur
                                            Tapalika, Tapalika vous garantit que vous
                                            recevrez les billets achetés à temps pour l'événement. Dans les cas rares où
                                            un problème surviendrait et que
                                            le vendeur d'origine du billet n’est plus en mesure de fournir les billets
                                            mis en vente, Tapalika fait , à sa
                                            seule et entière discrétion, une recherche de billets de remplacement
                                            équivalents et Vous les fournit sans coût
                                            additionnel. Si Tapalika n'est pas en mesure de trouver et Vous fournir des
                                            billets équivalents, un remboursement
                                            du coût des billets Vous sera proposé. La notion de billets de remplacement
                                            équivalents est définie par Tapalika,
                                            à sa seule et entière discrétion. Lorsque Vous vendez des billets sur
                                            Tapalika, Tapalika vous garantit que vous
                                            serez payé(e) pour votre vente, à condition que vous fournissiez exactement
                                            les mêmes billets que ceux que vous
                                            avez mis en vente et que l'acheteur des billets ait pu accéder à
                                            l'événement.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>2.1 Conditions requises :</b> Pour être Membre de ce Site, Vous devez
                                            accepter les termes de cet Accord.
                                            Vous pouvez uniquement utiliser les Services si Vous pouvez légalement
                                            conclure un contrat et signer des contrats
                                            exécutoires, sinon, Vous n'êtes pas autorisé à utiliser ces Services. En
                                            outre, les Vendeurs doivent être autorisés
                                            à mettre en ligne une Offre de Vente et respecter l’ensemble des conditions
                                            définies à l’article 3.1. des présentes
                                            Conditions Générales d’Utilisation.
                                        </p>
                                        <p>
                                            <b>2.2 Inscription :</b> Nous ne Vous autoriserons pas à acheter ou à vendre
                                            des Billets avant que Vous Vous
                                            soyez inscrits auprès de Nous. Pour cela, Vous devez fournir notamment votre
                                            nom, votre adresse, votre numéro
                                            de téléphone et adresse de courrier électronique. Vous Vous engagez à ce que
                                            l’ensemble des informations que
                                            Vous Nous fournissez soit exact.
                                        </p>
                                        <p>
                                            <b>2.3 Pseudonyme et mot de passe : </b>Vous aurez besoin d'un pseudonyme et
                                            d'un mot de passe pour accéder
                                            au Site et en utiliser les Services. La sécurité de votre pseudonyme et de
                                            votre mot de passe Vous incombe et
                                            Vous serez tenu responsable de l’ensemble des actions effectuées sous votre
                                            pseudonyme et mot de passe. En effet,
                                            l’utilisation de votre pseudonyme et de votre mot de passe fera naître une
                                            présomption que c’est bien Vous qui
                                            utilisez les Services.
                                        </p>
                                        <p>
                                            <b>2.4 Autres informations : </b>Vous faites valoir et garantissez que
                                            toutes les informations que Vous Nous
                                            fournissez ou que Vous soumettez à tout autre Membre ou visiteur du Site (a)
                                            ne sont pas fausses, inexactes,
                                            trompeuses, obscènes ou diffamatoires ; (b) qu'elles ne sont pas
                                            frauduleuses ; (c) qu'elles n'impliquent pas
                                            la vente d'articles volés ou contrefaits ; (d) qu'elles n'empiètent pas sur
                                            les droits d'auteur, les brevets,
                                            les marques de commerce, les secrets industriels, les droits à la protection
                                            de la personnalité ou à la vie
                                            privée ou sur tout autre droit de tiers ; (e) qu'elles ne violent aucune
                                            loi, aucun statut ou aucun règlement,
                                            y compris et sans réserve(s), ceux qui régissent la protection des
                                            consommateurs, la concurrence déloyale, la
                                            lutte contre la discrimination ou bien la publicité mensongère ; et, (f)
                                            qu'elles ne contiennent aucun virus
                                            ou aucune programmation visant à endommager, entraver, intercepter ou
                                            extraire quelconque système, données ou
                                            informations personnelles.
                                        </p>
                                        <p>
                                            <b>2.5 Lois et réglementations : </b>Vous garantissez que Vous Vous
                                            conformerez à toutes les lois internationales,
                                            nationales, régionales et locales applicables, ainsi qu'à toutes les
                                            réglementations concernant l'utilisation
                                            de ce Site et la vente des Billets. En particulier, Vous reconnaissez ne pas
                                            procéder à la revente de Billets
                                            sur la Plateforme Tapalika à titre habituel si Vous n’y êtes pas autorisé
                                            par le Titulaire des Droits d’Exploitation.
                                            Vous confirmez être âgé(e) de plus de 18 ans et avoir la capacité juridique
                                            d'effectuer la transaction.
                                        </p>
                                        <p>
                                            <b>2.6 Dédommagement :</b> Vous acceptez de dégager de toute responsabilité,
                                            frais et dépenses (y compris les
                                            honoraires raisonnables d'avocats) Tapalika et (le cas échéant) toute
                                            société mère, succursale, société affiliée,
                                            membres, directeurs, avocats, agents et employés, et d'indemniser Tapalika
                                            et (le cas échéant) toute société
                                            mère, succursale, société affiliée, membres, directeurs, avocats, agents et
                                            employés, contre toute responsabilité,
                                            frais et dépenses encourus à la suite de réclamations par un tiers qui
                                            impliquent ou concernent vos actions
                                            ou omissions sur ce Site.
                                        </p>
                                        <p>
                                            <b>2.7 Résolution des litiges :</b> Après réception des billets, si
                                            l’Acheteur n’est pas satisfait d’une partie
                                            de la commande, l’Acheteur devra respecter les règles de résolution des
                                            litiges déterminées dans notre Garantie
                                            Tapalika. Toute réclamation doit être déposée dans un délai de 14 jours à
                                            compter de la réception des Billets,
                                            faute de quoi, ces Billets ne seront plus couverts par la Garantie Tapalika.
                                            Dans le cas où vous rencontreriez
                                            des difficultés à utiliser vos Billets le jour de l’Évènement, vous devrez
                                            contacter Tapalika sous 48 heures
                                            pour signaler le problème. Vous devrez remplir un Formulaire de Dépôt de
                                            Plainte. Seuls les Formulaires dûment
                                            complétés pourront faire l’objet d’un remboursement. Les Formulaires devront
                                            être renvoyés à Tapalika sous 5
                                            jours ouvrables à compter de leur réception pour pouvoir prétendre à un
                                            remboursement. Tapalika se réserve le
                                            droit d’interdire tout nouvel accès à son site internet à toute personne
                                            déposant plainte de façon abusive.
                                        </p>
                                        <p>
                                            <b>2.8 Cartes d’abonnement/ abonnements annuels :</b> L’acheteur accepte
                                            deux (2) prélèvements sur sa carte
                                            de crédit ou autre moyen de paiement utilisé : l’un pour acheter les billets
                                            et l’autre pour garantir le retour
                                            de la carte d’abonnement/ l’abonnement annuel. Si cette carte d’abonnement /
                                            l’abonnement annuel n’est pas renvoyé(e)
                                            à Tapalika dans les 24h suivant l’événement, l’Acheteur accepte que Tapalika
                                            prélève une pénalité de 200€ par
                                            carte d’abonnement/ abonnement annuel en tant que « pénalité de non renvoi
                                            ». Cette pénalité s’ajouter au prix
                                            des billets achetés.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>3.1 Offre de Billets :</b> Pour mettre des Billets en vente, un Vendeur
                                            publie une Offre de Vente sur la
                                            Plateforme Tapalika. Toute Offre de Vente doit être publiée conformément aux
                                            conditions définies ci-dessous,
                                            sous peine d’être retirée du Site dans les cas visés aux articles 3.11 et
                                            6.2 des présentes Conditions Générales
                                            d’Utilisation.</p>

                                        <p>Le Vendeur est seul responsable de la licéité de cette Offre de Vente. En
                                            particulier, le Vendeur doit s’assurer
                                            d’être autorisé à mettre en vente le Billet conformément aux lois et
                                            règlementations applicables. Tapalika considère
                                            qu’un Vendeur est autorisé à mettre en vente un Billet si et seulement s’il
                                            rentre dans au moins l’une des catégories
                                            suivantes : (i) le Vendeur est un Titulaire des Droits d’Exploitation de la
                                            manifestation et/ou du spectacle
                                            mentionné(s) par le ou les Billets mis en vente, (ii) le Vendeur est
                                            expressément autorisé par le Titulaire
                                            des Droits d’Exploitation de ladite manifestation et/ou dudit spectacle à
                                            vendre ou mettre en vente des Billets
                                            pour le compte du Titulaire des Droits d’Exploitation, (iii) Tapalika est
                                            autorisée, par le Titulaire des Droits
                                            d’Exploitation, à opérer une bourse d’échange de Billets par laquelle les
                                            Membres peuvent librement acheter
                                            ou vendre de gré à gré des Billets ou (iv) le Vendeur ne met pas en vente à
                                            titre habituel des Billets sur la
                                            Plateforme Tapalika.</p>

                                        <p>Tout Vendeur reconnait expressément que la vente de Billets à titre habituel
                                            peut faire l’objet d’une qualification
                                            d’acte de commerce au sens de l’article L.121-1 du Code de commerce.</p>
                                        <p>Le Vendeur est seul responsable du contenu de cette Offre de Vente. Ainsi, le
                                            Vendeur définit seul le Prix et
                                            fournit les informations relatives aux Billets, en ce compris, sans que
                                            cette liste soit limitative, les informations
                                            sur l'événement, la date, la section, la rangée, et la date de clôture de la
                                            vente, le tout conformément au
                                            processus indiqué dans les pages d'aide du Site. </p>
                                        <p>Le Vendeur n’est pas autorisé par Tapalika à mettre en vente sur le site des
                                            Billets Interdits.</p>
                                        <p>Pour mettre ses Billets en vente, le Vendeur doit fournir une carte de crédit
                                            ou de débit valide.</p>
                                        <p>Par ailleurs, le Vendeur octroie à Tapalika une licence internationale, non
                                            exclusive, transférable et libre
                                            de redevance pour reproduire, modifier, adapter, publier et afficher sur le
                                            Site et sur les sites de nos partenaires
                                            marketing les Offres de Vente, afin que Nous puissions promouvoir les
                                            Billets que Vous mettez en vente.</p>
                                        <p>

                                            <b>3.2 Tarification :</b> Si un Vendeur met un Billet en vente sur le Site,
                                            il doit déterminer seul un prix
                                            fixe de vente des Billets.</p>
                                        <p>
                                            <b>3.3 Authenticité des informations :</b> Pour tous les Billets que Vous
                                            mettez en vente en tant que Vendeur,
                                            Vous garantissez l'exactitude des renseignements que Vous publiez dans
                                            l’Offre de Vente que Vous rédigez. Vous
                                            garantissez également que Vous possédez les Billets et que Vous êtes
                                            autorisé(e) à les transférer ou à les revendre,
                                            conformément aux conditions définies à l’article 3.1. Dans le cas où Vous
                                            revendez des Billets à un événement
                                            pour des raisons commerciales, Vous garantissez que Vous en avez le droit.
                                            Vous garantissez notamment que Vous
                                            êtes autorisés à proposer les Billets à la vente au prix que Vous avez fixé.
                                        </p>
                                        <p>
                                            Tapalika Vous informe que la publication d’une Offre de Vente en violation
                                            des conditions définies dans les présentes Conditions
                                            Générales d’Utilisation est susceptible d’entraîner des poursuites pénales à
                                            l’encontre du Vendeur responsable
                                            de ladite publication dans certaines juridictions. Tapalika décline toute
                                            responsabilité quant à la publication
                                            par Vous d’Offres de Vente illicites ou d’Offres de Vente de Billets
                                            Interdits, autre que celle qui pourrait
                                            lui incomber du fait de son statut d’hébergeur. En mettant en Vente un
                                            Billet sur la Plateforme Tapalika et
                                            en acceptant à ce titre les présentes Conditions Générales d’Utilisation,
                                            Vous garantissez Tapalika contre tout
                                            recours, action en justice, dommages-intérêts et tous frais annexes auxquels
                                            Tapalika devrait faire face ou
                                            qui seraient mis à la charge de Tapalika du fait de Votre publication d’une
                                            Offre de Vente illicite sur la Plateforme
                                            Tapalika.
                                        </p>

                                        <p>
                                            <b>3.4 Paiement du Vendeur :</b> Le Vendeur sera payé cinq (5) à huit (8)
                                            jours après l’événement auquel les
                                            Billets donnent accès, à la condition que le Billet ait été utilisé,
                                            c’est-à-dire que l’Acheteur ait effectivement
                                            pu accéder à l’événement. Nous Nous réservons le droit de différer le
                                            paiement si Nous avons de bonnes raisons
                                            de croire que la vente est illégale ou qu'elle constitue une quelconque
                                            violation de cet Accord.
                                        </p>
                                        <p><b>3.5 Taxes applicables à la vente :</b> Le Vendeur est seul responsable de
                                            son régime fiscal, et il lui appartient
                                            de déterminer lui-même les impôts, taxes fiscales et parafiscales, retenues
                                            à la source, cotisations, redevances
                                            de quelque nature que ce soit auxquelles il est assujetti lorsqu’il procède
                                            à une vente sur le Site, incluant,
                                            sans limitation, la TVA. Tapalika ne propose qu’un service d’hébergement
                                            d’Offres de Vente et ne prend aucune
                                            responsabilité quant aux obligations fiscales des Vendeurs. Si le Vendeur
                                            est assujetti à des impôts, taxes
                                            fiscales et parafiscales, retenues à la source, cotisations, redevances de
                                            quelque nature que ce soit applicables
                                            à la vente (en Madagascar ou ailleurs), il doit inclure leur montant aux
                                            Prix des Billets qu'il affiche sur
                                            le Site. Ces impôts, taxes fiscales et parafiscales, retenues à la source,
                                            cotisations, redevances de quelque
                                            nature que ce soit ne se confondent pas avec celles que Tapalika peut
                                            facturer sur ces frais, et notamment la
                                            TVA facturée par Tapalika sur ses frais.
                                        </p>
                                        <p><b>3.6 Double publication de vente et retrait des Billets :</b> Afin de
                                            mettre un Billet en vente sur le Site,
                                            Vous devez d'abord Vous inscrire afin de devenir Membre. Une fois un Billet
                                            mis en vente sur le Site, Nous Vous
                                            déconseillons de le publier ailleurs. </p>

                                        <p>Néanmoins, Vous êtes autorisé(e) à mettre votre Billet en vente sur d'autres
                                            places de marché, mais Vous devez
                                            immédiatement supprimer votre Billet du Site si celui-ci est vendu ailleurs.
                                        </p>
                                        <p>Sauf disposition contraire dans les présentes Conditions Générales
                                            d’Utilisation, Vous acceptez de ne pas promouvoir
                                            la vente des Billets publiés sur le Site sur tout autre site. Nous Nous
                                            réservons le droit d'interdire aux Membres
                                            de mettre en vente des Billets sur le Site s'ils ne peuvent pas fournir les
                                            mêmes Billets que ceux qu'ils ont
                                            mis en vente sur la Plateforme Tapalika.
                                        </p>

                                        <p><b>3.7 Biens volés :</b> La vente sur le Site de biens volés est strictement
                                            interdite. Tapalika soutient les
                                            efforts d'application de la loi visant à récupérer les biens volés mis en
                                            vente sur le Site, et elle soutient
                                            les poursuites engagées contre les personnes qui tentent sciemment de vendre
                                            de tels articles sur le Site. Les
                                            biens volés englobent les articles volés auprès de personnes mais également
                                            auprès de sociétés ou gouvernements.
                                        </p>
                                        <p><b>3.8 Les Vendeurs ne doivent pas inclure d'objets promotionnels avec les
                                                Billets :</b> Le nom et l'adresse
                                            de l'Acheteur sont fournis aux Vendeurs uniquement afin de livrer le(s)
                                            Billet(s) achetés et ils ne doivent
                                            être utilisés à aucune autre fin par le Vendeur, que cela soit en rapport ou
                                            non avec cette/ces livraison(s).
                                            Vous acceptez de ne pas inclure de matériel de promotion ou commercial qui
                                            n'est pas fourni ou approuvé par
                                            Tapalika, autre qu'une facture avec TVA, le cas échéant, et conforme à la
                                            demande de l'Acheteur et de Tapalika.
                                            Ce matériel de promotion inclut, sans toutefois s'y limiter, le matériel
                                            annonçant un site Web ou qui invite
                                            l'Acheteur à consulter un site autre que celui de Tapalika, des catalogues,
                                            des cartes professionnelles, des
                                            flyers, des coupons de réduction, des sollicitations ou autres matériels
                                            marketing ou publicitaires. Cela inclut
                                            également tout article susceptible de constituer une entrave ou une
                                            violation des présentes Conditions Générales
                                            d'Utilisation. Vous acceptez de pas contacter l'Acheteur à aucun moment et
                                            quelle qu’en soit la raison, en dehors
                                            de la livraison des Billets. Vous acceptez expressément que Tapalika puisse
                                            décider unilatéralement de retenir
                                            le Prix des Billets que Vous mettez en vente dans le cas où Vous violeriez
                                            les termes de cet article.
                                        </p>
                                        <p><b>3.9 Confirmation du Vendeur :</b> Le Vendeur doit confirmer la commande
                                            dans 48 heures suivants la date de
                                            la vente des Billets. Les Vendeurs doivent utiliser notre procédure de
                                            confirmation automatisée en ligne. Les
                                            Vendeurs pourront s’informer des frais de service et taxes sur nos frais
                                            avant d’avoir finalisé la procédure
                                            de vente et avant d’avoir mis leurs Billets en vente. Le Vendeur doit
                                            envoyer les Billets dès qu’ils sont en
                                            sa possession. Le Vendeur doit prévoir assez de temps pour que l’Acheteur
                                            reçoive les Billets à temps pour l’événement.
                                            En tout état de cause, pour tout événement, le Vendeur doit envoyer les
                                            Billets au plus tard sept (7) jours
                                            avant l’événement. Le Vendeur doit envoyer les Billets conformément à la
                                            méthode de livraison sélectionnée par
                                            l’Acheteur au moment de l’achat, comme il l’est précisé dans les pages
                                            “aide” du Site.
                                        </p>

                                        <p><b>3.10 Exécution de l'obligation concernant les Billets :</b> Une fois que
                                            le Vendeur met des Billets en vente
                                            et qu'un Acheteur achète ces Billets, le Vendeur est responsable de la
                                            réalisation de la transaction. Le Vendeur
                                            sera facturé des frais de remplacement s’il propose à la vente des Billets
                                            et confirme la transaction sans que
                                            les Billets proposés ne soient effectivement disponibles. Les frais de
                                            remplacement dépendront des prix du marché
                                            et des coûts que Nous devrons supporter pour acheter des Billets de
                                            remplacement équivalents ou mieux placés
                                            pour l'Acheteur. Nous ferons les efforts raisonnables pour fournir des
                                            billets de remplacement équivalents ou
                                            mieux placés pour l'acheteur. Dans le cas où un événement est annulé ou
                                            reporté, Tapalika se réserve le droit
                                            d'annuler la transaction d'un Vendeur. Si pour quelque raison que ce soit
                                            vos billets nous sont retournés ou
                                            ne peuvent être livrés, nous allons essayer de livrer les billets à nouveau,
                                            avec un maximum de trois tentatives.
                                            Nous nous efforçons de fixer une nouvelle livraison qui convienne à
                                            l’Acheteur ou de lui proposer de récupérer
                                            les billets dans un point de retrait si l’événement le permet. Si ces
                                            tentatives échouent également, nous ne
                                            proposerons pas de remboursement. Nous nous efforçons de nous assurer que
                                            tous les billets sont livrés à temps
                                            pour l'événement, et dans le cas où l’événement serait trop proche en terme
                                            de temps, nous pouvons proposer
                                            de récupérer les billets dans un point de retrait ou au guichet.
                                        </p>
                                        <p><b>3.11 Retrait d’une Offre de Vente :</b> Tapalika peut, à tout moment et de
                                            façon unilatérale, décider de supprimer
                                            une Offre de Vente pour la vente de Billets du Site. En effet, en tant
                                            qu’hébergeur, Tapalika peut être amené
                                            à prendre la décision de supprimer une Offre de Vente du Site lorsque des
                                            tiers apportent des éléments démontrant
                                            que ladite Offre de Vente contrevient à leurs droits et/ou à la
                                            règlementation applicable. La responsabilité
                                            de Tapalika ne pourra être engagée à ce titre. </p>

                                        <p><b>3.12 Licence :</b> Lorsque Vous Nous confiez du contenu, Vous Nous
                                            concédez le droit non exclusif, international,
                                            sans limitation de durée (c'est-à-dire, pour la durée de la protection),
                                            irrévocable, exempt de redevance, transférable
                                            dans le cadre d'une sous-licence, d'exercer les droits de propriété
                                            intellectuelle (nécessaires pour héberger
                                            le contenu) que Vous ou d'autres personnes possédez sur le contenu, dans
                                            tout média existant ou à venir. En
                                            ce qui concerne les droits d’auteurs, Vous Nous concédez les droits de
                                            reproduction, de représentation et d’adaptation
                                            pour toute utilisation numérique en ligne sur le Site lorsque et au fur et à
                                            mesure que Vous postez votre contenu
                                            sur le Site.</p>

                                        <p>Nous pouvons être amenés à Vous proposer des informations génériques pour
                                            nourrir votre contenu. Nous Nous efforçons
                                            naturellement d’en assurer l’exactitude et l’actualisation. Toutefois, si
                                            Vous décidez d’utiliser ces informations,
                                            il Vous appartient d’en vérifier l’exactitude et de ne pas inclure
                                            d'informations calomnieuses, diffamatoires
                                            ou dénigrantes. Vous acceptez de ne pas engager notre responsabilité en cas
                                            d’erreur ou d’inexactitude de ces
                                            informations. Vous Vous engagez par ailleurs à n’utiliser ces informations
                                            que dans le cadre de la rédaction
                                            de vos Offres de Vente et d'une manière qui ne porte pas atteinte aux droits
                                            de propriété d'un tiers.
                                        </p>

                                        <p><b>3.13 Commissions :</b> Il est de la responsabilité du Vendeur de payer
                                            tous les frais et taxes applicables
                                            résultant de l'utilisation du Site et des Services, y compris notamment la
                                            Commission, dans les délais et par
                                            l'intermédiaire d'un mode de paiement valable. En cas de problème lié à
                                            Votre mode de paiement ou si votre compte
                                            présente un arriéré, Nous tenterons de percevoir les montants dus par
                                            d'autres moyens de recouvrement. Nous
                                            pourrons être amenés à faire appel à des professionnels du recouvrement ou
                                            initier une action judiciaire. Cela
                                            signifie que Vous devrez régler la Commission due, plus les éventuels
                                            intérêts de retard au taux légal.
                                        </p>
                                        <br/>

                                        <p><b>4.1 Faire une offre :</b> Un Membre qui désire acheter un Billet doit tout
                                            d'abord consulter la Plateforme
                                            Tapalika afin de trouver les Billets correspondant à ses critères de
                                            recherches. Lorsque ces Billets ont été
                                            trouvés par l'Acheteur, il matérialise sa décision par l'intermédiaire d'une
                                            « offre » d'achat des Billets.
                                            Nous attirons votre attention sur le fait que Vous êtes seul responsable du
                                            choix des Billets que Vous souhaitez
                                            acquérir.
                                        </p>
                                        <p>En plaçant une « offre » d’achat, Vous, en tant qu'Acheteur, octroyez à
                                            Tapalika le droit de débiter du Prix
                                            de la Transaction votre carte de crédit ou de débit, votre compte PayPal ou
                                            votre compte bancaire pour l'achat
                                            des Billets choisis. </p>

                                        <p><b>4.2 Changement de places :</b> Les Billets mis en vente sont une
                                            représentation de la place réelle. Il est
                                            possible que ces Billets soient échangés contre des places comparables ou
                                            mieux situées après approbation de
                                            l'Acheteur. </p>
                                        <p><b>4.3 Informations sur les Billets :</b> Les dates d'événements, les
                                            horaires, les lieux et l'objet des événements
                                            qui sont indiqués sur les Billets peuvent être sujets à changement.
                                            L'Acheteur se doit de vérifier les informations
                                            officielles les plus récentes en contactant la billetterie, les caisses, le
                                            bureau de location ou bien l’organisateur
                                            de l’événement pour tout changement. </p>
                                        <br/>

                                        <p>
                                            <b>5.1 Paiement :</b> Conformément à l’article 4.1 des présentes Conditions
                                            Générales d’Utilisation, en cas
                                            de paiement par carte de crédit ou de débit, Nous obtenons une autorisation
                                            de prélèvement auprès de l’émetteur
                                            de la carte de crédit ou de débit de l'Acheteur équivalente au Prix de la
                                            Transaction. L'autorisation restera
                                            valable jusqu'à ce que la vente soit exécutée ou la commande annulée.
                                        </p>
                                        <p>En cas de paiement par PayPal, Nous obtiendrons une autorisation auprès du
                                            compte PayPal de l'Acheteur équivalente
                                            à la somme du Prix, des commissions et frais de livraison des Billets. Nous
                                            ajouterons, le cas échéant, la TVA
                                            à nos frais et commissions. </p>
                                        <p>En cas de paiement par virement bancaire, Nous vérifierons la validité du
                                            compte bancaire émetteur du virement.
                                        </p>
                                        <p>
                                            <b>5.2 Notification :</b> Une fois que Nous obtenons confirmation de l’achat
                                            par l'Acheteur, Nous informons
                                            le Vendeur de la vente par e-mail et / ou par téléphone et Nous lui
                                            confirmons que l'Acheteur est prêt à payer
                                            le Prix de Vente.
                                        </p>
                                        <p>
                                            <b>5.3 Collecte du paiement :</b> Après confirmation de l'envoi des Billets
                                            par le Vendeur, Nous recueillons
                                            le paiement auprès de l'Acheteur correspondant au Prix de la Transaction.
                                            Nous ne fournissons jamais les informations
                                            de règlement de l'Acheteur au Vendeur. Nous percevons le paiement et le
                                            Vendeur est ensuite payé conformément
                                            au mode de paiement qu'il aura choisi et à notre politique de paiement
                                            indiquée dans les pages d'aide du Site.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>6.1 Enquêtes :</b> Nous pouvons être amenés à effectuer une enquête à la
                                            suite de plaintes et de violations
                                            de nos Conditions Générales d’Utilisation. Vous acceptez de coopérer
                                            pleinement, y compris, notamment, de Nous
                                            fournir des informations spécifiques sur vos droits concernant un Billet,
                                            son origine, votre acquisition d'un
                                            Billet et le prix que Vous avez payé pour ce Billet.
                                        </p>
                                        <p>
                                            <b>6.2 Violations, résiliation et suspension :</b> Des actions pourront être
                                            prises si Nous les jugeons appropriées,
                                            Nous pourrons également, sans toutefois s'y limiter, émettre un
                                            avertissement, suspendre ou clore un service,
                                            refuser un accès, supprimer une offre ou Vous conseiller de modifier une
                                            Offre de Vente. Vous acceptez que les
                                            paiements qui Vous sont dus à la suite de ventes effectuées par
                                            l'intermédiaire de ce Site puissent être suspendus
                                            ou retardés. Tapalika ne sera pas obligé de Vous payer toute vente si Nous
                                            suspectons que cette vente a été
                                            illégale ou exécutée en violation de cet Accord. Lors de la clôture de votre
                                            compte, vos Offres de Vente seront
                                            supprimées du Site si Vous êtes un Vendeur et vos achats seront annulés si
                                            Vous êtes un Acheteur.
                                        </p>
                                        <p>
                                            <b>6.3 Divulgation d'informations :</b> Vous acceptez que Tapalika fasse
                                            état, aux autorités règlementaires,
                                            aux autorités de régulation et/ou à tout tiers compétent, de toute activité
                                            dont elle soupçonne qu’elle constitue
                                            une violation à la loi. Tapalika coopérera afin de garantir que les auteurs
                                            de violations soient poursuivis
                                            conformément à la loi.
                                        </p>
                                        <p>
                                            <b>6.4 Exécution d'ajustements :</b> Vous Nous autorisez à différer le
                                            paiement ou à débiter votre carte de
                                            crédit ou de débit, ou votre compte Paypal, dans le cadre de l’autorisation
                                            de prélèvement que Vous Nous accordez,
                                            de tout montant que Vous Nous devrez si (a) un ajustement est effectué du
                                            fait de l’exécution de notre garantie
                                            Tapalika ; (b) Nous soupçonnons qu’une fraude ou un autre acte illégal a été
                                            commis lors des activités de vente
                                            ou d'achat et si une autorité compétente Nous fait la demande de différer le
                                            paiement ou de débiter votre moyen
                                            de paiement à titre provisoire ; (c) Vous ne livrez pas les mêmes Billets
                                            que ceux que Vous avez mis en vente
                                            sur le Site et dont la transaction a été confirmée ; (d) Vous adressez des
                                            objets promotionnels à un Acheteur
                                            ; ou (e) si Vous Nous devez de l'argent. Si l'une des situations citées
                                            devait se produire, Nous Nous réservons
                                            le droit de déduire de votre paiement le montant que Vous Nous devez.
                                        </p>
                                        <br/>

                                        <p>
                                            <b>7.1 Non garantie :</b> À l'exception des garanties explicites déclarées
                                            dans cet Accord, Tapalika fournit
                                            les logiciels, le Site et les Services « tels qu'ils sont présentés » et «
                                            selon leur disponibilité » sans aucune
                                            garantie de quelque sorte que ce soit. Tapalika n'offre aucune garantie
                                            concernant ses logiciels, les Billets,
                                            les événements, les Services que Tapalika offre, ou la bonne exécution des
                                            promesses des Vendeurs ou des Acheteurs
                                            au-delà des garanties légales telles que prévues par les textes applicables.
                                            En particulier, Tapalika décline
                                            toute garantie, qu'elle soit explicite, obligatoire ou implicite, y compris
                                            et sans réserve(s), les garanties
                                            de qualité, de titre, de non violation des droits de tiers, etc. autant que
                                            la réglementation applicable le
                                            permet.
                                        </p>
                                        <p>
                                            <b>7.2 Renonciation des dommages indirects/limite de responsabilité :</b>
                                            Sauf dans le cas où elle aurait été
                                            dûment informée de l’existence d’un contenu illicite au sens de la
                                            législation en vigueur, et n’aurait pas agi
                                            promptement pour le retirer, Tapalika ne peut pas être tenue pour
                                            responsable ni du contenu ou des actions (ou
                                            absence d'action) des Membres, ni des Billets qu'ils mettent en vente.
                                            Tapalika décline expressément toute responsabilité
                                            pour toute perte de profits, y compris, sans toutefois s'y limiter, tous
                                            dommages-intérêts particuliers ou exemplaires,
                                            tous dommages indirects ou tous dommages accessoires pouvant résulter des
                                            Services, du Site ou de la suspension,
                                            de la clôture ou du mauvais fonctionnement des Services ou du Site. La
                                            responsabilité de Tapalika envers Vous
                                            ou quiconque en toute circonstance, se limite au plus petit des deux
                                            montants suivants : (a) 200 €, et (b) la
                                            valeur totale de tous les Billets et autres articles que Vous avez achetés
                                            et/ou vendus par l'intermédiaire
                                            de Tapalika au cours de l'action ayant prétendument engendré la
                                            responsabilité. En aucun cas Tapalika ne saurait
                                            être tenue responsable de coûts supplémentaires encourus par votre achat de
                                            Billets auprès d'un tiers en contrepartie
                                            de Billets que Vous n'avez pas pu acheter sur le Site.
                                        </p>
                                        <p>
                                            <b>7.3 Enchères :</b> Vous reconnaissez que Nous ne sommes pas une société
                                            de ventes aux enchères publiques.
                                            Au contraire, le Site est un lieu d'échange dont l'objet est de permettre à
                                            n'importe qui, n'importe où et n'importe
                                            quand, d'offrir, de vendre ou d'acheter des Billets.
                                        </p>
                                        <p>
                                            <b>7.4 Renonciation :</b> Vous reconnaissez expressément que Tapalika n’est
                                            pas impliquée dans les transactions
                                            réelles entre les Acheteurs et les Vendeurs. En cas de litige avec un ou
                                            plusieurs Membres, sauf dans le cas
                                            où Tapalika aurait été dûment informée de l’existence d’un contenu illicite
                                            au sens de la législation en vigueur,
                                            et n’aurait pas agi promptement pour le retirer, Vous Nous dégagez de toute
                                            responsabilité (ainsi que nos administrateurs,
                                            directeurs, agents, sociétés liées et associées, joint ventures et employés)
                                            pour toute réclamation et tout
                                            dommage (présent ou futur) de tout type ou nature, connu ou non, résultant
                                            de manière directe ou indirecte de
                                            ces litiges.
                                        </p>
                                        <p>
                                            <b>7.5 Indemnité fiscale :</b> Vous reconnaissez que Tapalika n’est
                                            aucunement responsable de l'exactitude ou
                                            de la pertinence des paiements d'impôts ou taxes à une entité quelconque de
                                            votre part. Vous Vous engagez à
                                            indemniser Tapalika de tous dommages, frais, intérêts et dépenses (y compris
                                            les honoraires raisonnables d'avocats)
                                            et (le cas échéant) quelconque société mère, succursale, société affiliée,
                                            membres, directeurs, agents et employés,
                                            provenant d'un tiers ou d'un gouvernement qui implique ou concerne (i) toute
                                            obligation fiscale internationale,
                                            nationale, régionale ou locale ou tout montant dû conformément à tout
                                            décret, toute ordonnance, toute loi ou
                                            règlementation fiscaux ou (ii) tout litige sur le statut fiscal de Tapalika.
                                        </p>
                                        <p>
                                            <b>7.6 Indépendance des parties : </b> Vous et Tapalika êtes des parties
                                            indépendantes, et aucune agence, aucun
                                            partenariat, aucune co-entreprise, aucune relation employeur-employé ou
                                            franchiseur-franchisé n'est voulu ou
                                            créé par cet Accord.
                                        </p>
                                        <p>
                                            <b>7.7 Informations provenant de tiers :</b> Nous ne contrôlons pas les
                                            informations fournies sur ce Site par
                                            des utilisateurs ou les Membres. Il est possible que Vous trouviez que les
                                            informations provenant de tiers soient
                                            préjudiciables, inexactes ou décevantes. Veuillez faire preuve d'attention
                                            lorsque Vous utilisez le Site et
                                            n'oubliez pas la présence de risques d'escroquerie. Lorsque Vous utilisez ce
                                            Site, Vous reconnaissez ces risques
                                            et acceptez que Tapalika ne pourra être tenue responsable des actes ou
                                            omissions des utilisateurs du Site ni
                                            des Membres.
                                        </p>
                                        <p>
                                            <b>7.8 Toutes les ventes sont irrévocables :</b> Toutes les ventes sont
                                            irrévocables. Une fois la commande validée,
                                            aucun remboursement, aucune annulation ou aucun échange (pour des dates ou
                                            horaires différents), ne sera possible.</p>

                                        <p>Conformément à l'article L.121-20-4 du code de la consommation qui prévoit,
                                            en substance, que les dispositions
                                            des articles L.121-20-1 (concernant notamment le droit de rétractation) ne
                                            sont pas applicables aux contrats
                                            ayant pour objet la prestation de services d'hébergement, de transport, de
                                            restauration, de loisirs - y compris
                                            la billetterie de spectacles - qui doivent être fournis à une date ou selon
                                            une périodicité déterminée, toute
                                            commande est définitive et ne peut être annulée ou échangée une fois la
                                            vente conclue. </p>

                                        <p>Si, pour une quelconque raison, Vous ne voulez plus les Billets que Vous avez
                                            commandés, Nous Vous invitons à
                                            les revendre sur notre Site. Pour en savoir plus sur la mise en vente de
                                            Billets sur Tapalika, rendez-Vous sur
                                            <a href="http://www.Tapalika.fr/SellTickets.aspx">www.Tapalika.com</a>
                                        </p>

                                        <p>
                                            <b>7.9 Modification ou suspension du Site :</b> Tapalika se réserve le droit
                                            à tout moment de modifier ou d'arrêter,
                                            temporairement ou de manière permanente, le Site ou toute partie du Site
                                            avec ou sans préavis. Vous acceptez,
                                            dans le cadre de cet Accord, que Nous ne pourrons être tenus responsables
                                            envers Vous ou tout tiers de toute
                                            modification, suspension ou arrêt du Site ou de quelconque de ces Services,
                                            pour quelque raison que ce soit.
                                            Nous ne garantissons pas un accès continu, ininterrompu ou sûr à nos
                                            Services, et le fonctionnement de notre
                                            Site peut être altéré à cause de nombreux facteurs hors de notre contrôle.
                                            En outre, il est possible que le
                                            Site ne soit pas disponible pendant certaines périodes car il peut être mis
                                            à jour ou modifié. Le Site, pendant
                                            cette période, sera temporairement indisponible.
                                        </p>
                                        <p>
                                            <b>7.10 Avis :</b> Sauf indication explicite contraire de la part de
                                            Tapalika, tous les avis et notification
                                            que Vous souhaitez adresser à Tapalika doivent être envoyés par
                                            l'intermédiaire du formulaire de courrier électronique
                                            mis à disposition sur le Site sous le lien Contactez-nous. Notre adresse
                                            postale est 160 Greentree Drive, Suite
                                            101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                        </p>
                                        <p>Sauf indication explicite contraire, tous les avis et notification que Nous
                                            souhaitons Vous adresser seront
                                            envoyés à l'adresse email que Vous Nous aurez fournie lors du processus
                                            d'inscription à notre Site. Il sera
                                            considéré que l'avis aura été soumis un jour ouvrable après l'envoi de
                                            l'email.
                                        </p>
                                        <br/>
                                        <p>
                                            <b>8.1 Règlement des litiges :</b> Si, après avoir reçu les Billets, un
                                            Acheteur n'était pas satisfait d’une
                                            quelconque étape de l'achat, il devra suivre les procédures de recours
                                            indiquées dans la garantie Tapalika.</p>
                                        <p>
                                            <b>8.2 Droit de propriété intellectuelle :</b> Vous reconnaissez et acceptez
                                            que (i) nos brevets, marques commerciales,
                                            appellations commerciales, marques de service, copyrights et autres droits
                                            de propriété intellectuelle (collectivement
                                            « la propriété intellectuelle ») sont et doivent être notre unique
                                            propriété, et que (ii) rien dans cet Accord
                                            ne Vous confère de droits de propriété ou de droits de licence dans notre
                                            propriété intellectuelle. Par ailleurs,
                                            Vous ne devez ni à présent, ni à l'avenir, contester la validité de la
                                            propriété intellectuelle de Tapalika.
                                        </p>
                                        <p>
                                            <b>8.3 Copyright :</b> Copyright &copy; Tapalika Entertainment Inc 2017. Les
                                            logiciels et le Site, y compris
                                            notamment, tous les textes, tous les graphiques, tous les logos, tous les
                                            boutons, toutes les images, tous
                                            les clips audio, et tous les programmes informatiques, constituent la
                                            propriété de Tapalika ou de ses fournisseurs,
                                            et ils sont protégés par les lois internationales et nationales sur le
                                            copyright, la marque de commerce ou
                                            d'autres lois sur la propriété intellectuelle. La compilation (c'est-à-dire
                                            la collecte, l'organisation et
                                            l'assemblage) de tout le contenu du Site est réservée exclusivement à
                                            Tapalika et elle est protégée par les
                                            lois internationales et nationales sur le copyright. La reproduction, la
                                            modification, la distribution, la
                                            transmission, la réédition, l'affichage ou l'exécution des logiciels ou du
                                            contenu du Site sont strictement
                                            interdits.
                                        </p>
                                        <p>
                                            <b>8.4 Contrats supplémentaires :</b> Cet Accord intègre par référence les
                                            contrats et documents suivants également
                                            inclus au Site: </p>
                                        <ul class="go_list">
                                            <li><a href="" target="_new">Protection de vos informations personnelles</a>
                                            </li>
                                        </ul>
                                        </p>
                                        <p>
                                            <b>8.5 Loi applicable :</b> Cet Accord est régi par et doit être interprété
                                            conformément aux lois de l'Etat
                                            du Delaware des Madagascar d’Amérique. Vous consentez à la juridiction
                                            non-exclusive et personnelle des tribunaux
                                            du Delaware. Tapalika Entertainment Inc est enregistrée au Delaware à
                                            l’adresse suivante: 160 Greentree Drive,
                                            Suite 101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                        </p>
                                        <p><b>8.6 Modification :</b> Si Nous amendons cet Accord, une version révisée
                                            qui remplacera automatiquement les
                                            termes de cet Accord sera publiée sur le Site. La version révisée de cet
                                            Accord entre automatiquement en vigueur
                                            sept (7) jours après sa publication initiale sur le Site. Votre utilisation
                                            continue du Site et des Services
                                            après la publication par Tapalika de l'Accord révisé constituera une
                                            acceptation de votre part des termes de
                                            l'Accord révisé. Si Vous ne souhaitez pas accepter les termes de cet Accord
                                            ou une quelconque version révisée,
                                            Vous devez cesser d’utiliser les Services ou le Site.
                                        </p>
                                        <p><b>8.7 Divers :</b> Cet Accord (et tous les documents incorporés par
                                            référence) constitue l'intégralité de l'accord
                                            entre Vous et Nous et supplante tous les accords et toutes les conventions
                                            antérieures, écrits ou oraux, entre
                                            ces parties. Aucun amendement, aucune modification ou aucun ajout aux
                                            clauses de cet Accord ne sera valide ou
                                            en vigueur à moins qu'il n'ait été effectué conformément aux conditions
                                            explicites de cet Accord. Si une quelconque
                                            clause de cet Accord est jugée invalide ou inapplicable dans quelque
                                            circonstance que ce soit, son application
                                            dans toute autre circonstance ainsi que les autres clauses de cet Accord ne
                                            devront pas être affectées. Vous
                                            n'êtes pas autorisé(e) à céder ou à transférer cet Accord, ou ses droits ou
                                            obligations, sans approbation écrite
                                            préalable de Tapalika, qui se réserve le droit de refuser une telle
                                            approbation. Rien dans cet Accord n'a pour
                                            objet de conférer des droits ou des voies d’action à quiconque ou à toute
                                            entité autre que les parties du présent
                                            Accord et à leurs successeurs ou ayants droit. Nos fournisseurs et nos
                                            partenaires sont des bénéficiaires tiers
                                            de cet Accord. Cela ne Nous empêche pas de modifier ces termes sans y faire
                                            référence. Les titres des paragraphes
                                            de cet Accord ont uniquement valeur de référence et ne définissent, ne
                                            limitent, n'interprètent ou ne décrivent
                                            en aucun cas la portée ou l'étendue de ces paragraphes.
                                        </p>
                                        <br>
                                    </div>
                                </div>
                                <div id="div_tapakila_contact2">
                                    <div class="centre">
                                        <h4 class="titre">Comment puis-je contacter Tapakila ?</h4>
                                        <br><br>
                                        <div class="ptxl">
                                            Nous sommes une entreprise en ligne, nous proposons donc également un
                                            service client en ligne !<br> Vous pouvez
                                            nous contacter à propos d'une commande ou d'une vente n'importe quand avant
                                            la date de l'événement, et ce jusqu'à
                                            3 mois après.
                                            <br>
                                            <br>
                                            <i class="i-comments-alt cGrn3 fs30"></i>
                                            <Strong>La meilleure façon de nous contacter :</Strong>
                                            <br>
                                            <br>
                                            <ul class="ul">
                                                <li><a href="">Cliquez ici pour vous Connecter à votre compte</a> avec
                                                    l'adresse email que vous avez utilisé pour
                                                    créer votre commande ou votre listing.
                                                <li>Choisissez "Mes Achats" ou "Mes Ventes".</li>
                                                <li>Selectionnez la commande à propos de laquelle vous souhaitez nous
                                                    contacter en cliquant sur le lien "Service
                                                    Clientèle".
                                                </li>
                                                <li>Choisissez la question que vous souhaitez poser.</li>
                                                <li>Nous vérifierons immédiatement votre commande pour vous donner une
                                                    réponse personnalisée.
                                                </li>
                                                <li>En ce qui concerne les questions pour lesquelles il est possible de
                                                    faire appel à un conseiller, cliquer "Non-
                                                    Contactez-nous" après "Avez-vous trouvé cette réponse satisfaisante
                                                    ?" et renseignez votre demande.
                                                </li>
                                                <li>L'un de nos conseillers vous répondra le plus rapidement possible.
                                                </li>
                                            </ul>
                                            <br>
                                            <div class="tile">
                                                <Strong><a href="">Aide à la connexion</a></Strong>
                                                <br> Si vous ne vous souvenez plus de l'email que vous avez utilisé, si
                                                vous réglez en tant qu'invité, ou avez
                                                oublié votre mot de passe, nous pouvons vous aider !
                                            </div>
                                            <br>
                                            <div class="tile">
                                                <Strong><a href="sercice-clientele.html">Voir notre FAQ</a></Strong>
                                                <br> Si vous n'avez pas encore de commande ou de listing, la réponse à
                                                votre question se trouve peut-être dans
                                                notre top FAQ
                                            </div>
                                            <br>
                                            <br> Vous n'arrivez toujours pas à nous contacter ? Veuillez <a href="">cliquer
                                                ici</a> pour sélectionner une
                                            raison et nous permettre d'améliorer nos services.
                                            </p>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 social-bg1">
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
                        <div class="col-lg-7">
                            <div>
                                <a href="#"><span class="fa fa-caret-square-o-right label"> Créer un compte</span></a>
                            </div>
                            <div>
                                <a href="#"><span
                                            class="fa fa-caret-square-o-right label"> Mots de passe oubliè ?</span></a>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <button type="button" class="btn btn-primary btn-menu">connecter</button>
                        </div>
                    </div>
                </div>
                <div class="newsletter">
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
                        <div class="col-lg-7">
                            <div class="radio">
                                <label><input type="radio" name="optradio">s'inscrire</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio">Se desinscrire</label>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <button type="button" class="btn btn-primary btn-menu2">Enregistrer</button>
                        </div>
                    </div>
                </div>
                <div class="vente">
                    <h3 class="all">événement de ce week-end</h3>
                    <div class="row space">
                        <div id="hidden-info">
                            <div class="thumbnail thumb1">
                                <a href="detailup.html">
                                    <div class="mg-image">
                                        <img src="{{url('/')}}/img/motocross.jpg" alt="tence_mena">
                                    </div>
                                    <div class="caption">
                                        <h3><a href="detailup.html">Lorem ipsum dolor sit amet, vitae enim ultrices</a>
                                        </h3>
                                        <p>Pellentesque amet vitae suscipit metus, massa at donec ultrices mauris at
                                            leo, in aenean, aliquet</p><br/>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="row space">
                                <div class="col-lg-2">
                                    <label class="top10">1</label>
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="Titre"><strong>Ambondrona</strong></h5>
                                    <p>
                                    <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                                    <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                                    </p>
                                </div>
                                <div class="col-lg-2">
                                    <label id="click" class="glyphicon glyphicon-plus mytop"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row space">
                        <div>
                            <div id="hidden-info1">
                                <div class="thumbnail thumb1">
                                    <a href="detailup.html">
                                        <div class="mg-image">
                                            <img src="{{url('/')}}/img/motocross.jpg" alt="tence_mena">
                                        </div>
                                        <div class="caption">
                                            <h3><a href="detailup.html">Lorem ipsum dolor sit amet, vitae enim
                                                    ultrices</a></h3>
                                            <p>Pellentesque amet vitae suscipit metus, massa at donec ultrices mauris at
                                                leo, in aenean, aliquet</p><br/>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row space">
                                <div class="col-lg-2">
                                    <label class="top10">2</label>
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="Titre"><strong>Mahaleo</strong></h5>
                                    <p>
                                    <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                                    <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                                    </p>
                                </div>
                                <div class="col-lg-2">
                                    <label id="click1" class="glyphicon glyphicon-plus mytop"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row space">
                        <div>
                            <div id="hidden-info2">
                                <div class="thumbnail">
                                    <a href="detailup.html">
                                        <div class="mg-image">
                                            <img src="{{url('/')}}/img/motocross.jpg" alt="tence_mena">
                                        </div>
                                        <div class="caption">
                                            <h3><a href="detailup.html">Lorem ipsum dolor sit amet, vitae enim
                                                    ultrices</a></h3>
                                            <p>Pellentesque amet vitae suscipit metus, massa at donec ultrices mauris at
                                                leo, in aenean, aliquet</p><br/>
                                            <div>
                                                <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1,
                                                    100rmb
                                                </div>
                                                <div class="date"><i
                                                            class="glyphicon glyphicon-map-marker position"></i>Andreas
                                                    Ottensamer has captured audiences
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row space">
                                <div class="col-lg-2">
                                    <label class="top10">3</label>
                                </div>
                                <div class="col-lg-8">
                                    <h5 class="Titre"><strong>Anyah</strong></h5>
                                    <p>
                                    <div class="price"><i class="glyphicon glyphicon-time time"></i> Apr 1, 100rmb</div>
                                    <div class="date"><i class="glyphicon glyphicon-map-marker position"></i>Paris</div>
                                    </p>
                                </div>
                                <div class="col-lg-2">
                                    <label id="click2" class="glyphicon glyphicon-plus mytop"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("specificScript")
    <script typae="text/javascript">
        $('.dropdown-menu ul li a').click(function (event) {
            event.stopPropagation();
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            var target = $(this).attr('href');
            $('ul li .tab-content ' + target).toggleClass(active in);
        });
    </script>
    <script src="{{ url('/') }}/js/script.js"></script>
    <script>

        function changePage(id, aId, liId) {
            $('#coco li').removeClass('open');
            $('#coco2 li').removeClass('open');
            if (liId) {

                document.getElementById("li_achat_billet").children[1].style.display = "none";
                document.getElementById("li_recevoir_place").children[1].style.display = "none";
                document.getElementById("li_question_ann").children[1].style.display = "none";
                document.getElementById("li_receive_paiement").children[1].style.display = "none";
                document.getElementById("li_gerer_compte").children[1].style.display = "none";
                document.getElementById("li_a_propos").children[1].style.display = "none";


                document.getElementById("li_ach").children[1].style.display = "none";
                document.getElementById("li_envoyer").children[1].style.display = "none";
                document.getElementById("li_recevez").children[1].style.display = "none";
                document.getElementById("li_annulation").children[1].style.display = "none";
                document.getElementById("li_gererr").children[1].style.display = "none";
                document.getElementById("li_tapakila").children[1].style.display = "none";

                document.getElementById(liId).className += " open";
                document.getElementById(liId).children[1].style.display = "block";

            }

            document.getElementById("div_compte").className = "hide";
            document.getElementById("div_billets_acheter").className = "hide";
            document.getElementById("div_places_acheter").className = "hide";
            document.getElementById("div_places_situee").className = "hide";
            document.getElementById("div_billets_personnel").className = "hide";
            document.getElementById("div_billets_recu").className = "hide";
            document.getElementById("div_billets_download").className = "hide";
            document.getElementById("div_billets_voyage").className = "hide";
            document.getElementById("div_billets_livraison").className = "hide";
            document.getElementById("div_billets_retirer").className = "hide";
            document.getElementById("div_billets_plutot").className = "hide";
            document.getElementById("div_billets_different").className = "hide";
            document.getElementById("div_billets_nom").className = "hide";
            document.getElementById("div_ev").className = "hide";
            document.getElementById("div_annulation_evenement").className = "hide";
            document.getElementById("div_favoris").className = "hide";
            document.getElementById("div_paiement-refuser").className = "hide";
            document.getElementById("div_news").className = "hide";
            document.getElementById("div_compte_email").className = "hide";
            document.getElementById("div_compte_pswd").className = "hide";
            document.getElementById("div_compte_newsletter").className = "hide";
            document.getElementById("div_compte_commande").className = "hide";
            document.getElementById("div_tapakila_definition").className = "hide";
            document.getElementById("div_tapakila_garantie").className = "hide";
            document.getElementById("div_tapakila_recouvre").className = "hide";
            document.getElementById("div_tapakila_terme").className = "hide";
            document.getElementById("div_tapakila_contact").className = "hide";

            document.getElementById("div_compte2").className = "hide";
            document.getElementById("div_billets").className = "hide";
            document.getElementById("div_offre").className = "hide";
            document.getElementById("div_supprimer_offre").className = "hide";
            document.getElementById("div_options_offre").className = "hide";
            document.getElementById("div_places_envoyer").className = "hide";
            document.getElementById("div_places_organiser").className = "hide";
            document.getElementById("div_billets_electronique").className = "hide";
            document.getElementById("div_billets_autre").className = "hide";
            document.getElementById("div_vente_paiement").className = "hide";
            document.getElementById("div_vente_methode").className = "hide";
            document.getElementById("div_ev2").className = "hide";
            document.getElementById("div_news2").className = "hide";
            document.getElementById("div_compte_email2").className = "hide";
            document.getElementById("div_compte_pswd2").className = "hide";
            document.getElementById("div_compte_newsletter2").className = "hide";
            document.getElementById("div_compte_commande2").className = "hide";
            document.getElementById("div_tapakila_definition2").className = "hide";
            document.getElementById("div_tapakila_garantie2").className = "hide";
            document.getElementById("div_tapakila_recouvre2").className = "hide";
            document.getElementById("div_tapakila_terme2").className = "hide";
            document.getElementById("div_tapakila_contact2").className = "hide";
            document.getElementById(id).className = "show";

            document.getElementById("a_compte").className = "";
            document.getElementById("a_billets_acheter").className = "";
            document.getElementById("a_places_acheter").className = "";
            document.getElementById("a_places_situee").className = "";
            document.getElementById("a_billets_personnel").className = "";
            document.getElementById("a_billets_recu").className = "";
            document.getElementById("a_billets_download").className = "";
            document.getElementById("a_billets_voyage").className = "";
            document.getElementById("a_billets_livraison").className = "";
            document.getElementById("a_billets_retirer").className = "";
            document.getElementById("a_billets_plutot").className = "";
            document.getElementById("a_billets_different").className = "";
            document.getElementById("a_billets_nom").className = "";
            document.getElementById("a_ev").className = "";
            document.getElementById("a_annulation_evenement").className = "";
            document.getElementById("a_favoris").className = "";
            document.getElementById("a_paiement-refuser").className = "";
            document.getElementById("a_news").className = "";
            document.getElementById("a_compte_email").className = "";
            document.getElementById("a_compte_pswd").className = "";
            document.getElementById("a_compte_newsletter").className = "";
            document.getElementById("a_compte_commande").className = "";
            document.getElementById("a_tapakila_definition").className = "";
            document.getElementById("a_tapakila_garantie").className = "";
            document.getElementById("a_tapakila_recouvre").className = "";
            document.getElementById("a_tapakila_terme").className = "";
            document.getElementById("a_tapakila_contact").className = "";

            document.getElementById("a_compte2").className = "";
            document.getElementById("a_billets").className = "";
            document.getElementById("a_offre").className = "";
            document.getElementById("a_supprimer_offre").className = "";
            document.getElementById("a_options_offre").className = "";
            document.getElementById("a_places_envoyer").className = "";
            document.getElementById("a_places_organiser").className = "";
            document.getElementById("a_billets_electronique").className = "";
            document.getElementById("a_billets_autre").className = "";
            document.getElementById("a_vente_paiement").className = "";
            document.getElementById("a_vente_methode").className = "";
            document.getElementById("a_ev2").className = "";
            document.getElementById("a_news2").className = "";
            document.getElementById("a_compte_email2").className = "";
            document.getElementById("a_compte_pswd2").className = "";
            document.getElementById("a_compte_newsletter2").className = "";
            document.getElementById("a_compte_commande2").className = "";
            document.getElementById("a_tapakila_definition2").className = "";
            document.getElementById("a_tapakila_garantie2").className = "";
            document.getElementById("a_tapakila_recouvre2").className = "";
            document.getElementById("a_tapakila_terme2").className = "";
            document.getElementById("a_tapakila_contact2").className = "";
            document.getElementById(aId).className = "activy";


            if (screen.width <= 750) {
                window.location.hash = id;
            }
        }
    </script>

    <script>
        $(document).ready(function () {
            $('#click').click(function () {
                if ($('#hidden-info').css("display") == "block") {
                    $('#hidden-info').slideUp();
                }
                else {
                    $('#hidden-info').slideDown();

                }
            });

        });

        $(document).ready(function () {
            $('#click1').click(function () {
                if ($('#hidden-info1').css("display") == "block") {
                    $('#hidden-info1').slideUp();
                }
                else {
                    $('#hidden-info1').slideDown();

                }
            });

            $(document).ready(function () {
                $('#click2').click(function () {
                    if ($('#hidden-info2').css("display") == "block") {
                        $('#hidden-info2').slideUp();
                    }
                    else {
                        $('#hidden-info2').slideDown();

                    }
                });
            });
        });
    </script>
@endsection