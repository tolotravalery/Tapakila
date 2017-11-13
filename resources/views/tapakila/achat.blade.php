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
    <div class="container">
        <div class="row performe">
            <div class="col-md-12">
                <div class="about-bg">
                    <!-- QU'EST-CE QU'UN E-TICKET ? -->
                    <h4><strong>Qu'est-ce qu'un ticket ?</strong></h4>
                    <p>Le e-ticket ou billet électronique est disponible sur certains événements réservés sur internet.
                        À la différence du billet traditionnel, le e-ticket est un billet imprimable chez soi en couleur
                        ou en noir et blanc à partir de votre imprimante relié à votre ordinateur. Il utilise un code à
                        barres unique et différent pour chaque billet. Chaque e-ticket est scanné à l’entrée de la salle
                        et sa validité est contrôlée. Donc, si vous achetez deux billets électroniques, vous imprimerez
                        deux billets sur du papier format A4 blanc et vierge recto/verso.</p><br>
                    <img src="{{url('/')}}/public/img/guide.png"><br>

                    <!-- QUEL EST L'AVANTAGE PRINCIPAL DU E-TICKET ? -->
                    <h4><strong>Quel est l'avantage principal du E-ticket ?</strong></h4>
                    <p>Vous obtenez sans attendre votre billet en l’imprimant à la fin de votre commande : plus de
                        complication ou de délai d’attente lié à la livraison.</p>
                    <br>

                    <!-- COMMENT SE PASSE L'ÉDITION DE MES E-TICKETS A LA FIN DE MA COMMANDE ? -->
                    <h4><strong>Comment se passe l'édition de mes E-ticket à la fin de ma commande ?</strong></h4>
                    <p>Vos E Tickets sont en pièces jointes de votre mail de confirmation de commande au format PDF.</p>
                    <p>Vous les trouverez également dans l'onglet mes commandes de votre compte.</p>
                    <p>Si vous n'avez pas le programme pour les les PDF,<a href="#"> cliquez ici pour télécharger Adobe
                            Reader</a></p>
                    <p>Ouvrez ce fichier, nous vous conseillons de le sauvegarder sur votre PC, puis de l'imprimer
                        (fichier sauvegardé en cas de problèmes d'impression).</p>
                    <br>

                    <!-- PUIS-JE IMPRIMER AUTANT DE CHOIX QUE JE VEUX MES E-TICKET ? -->
                    <h4><strong>Puis-je imprimer autant de fois que je veux mes E-ticket ?</strong></h4>
                    <p>Oui. Sachez toutefois que seule la première copie de votre billet électronique présentée au
                        lecteur de code à barres donnera accès à la salle.</p>
                    <br>

                    <!-- DOIS-JE AVOIR UNE IMPRIMANTE COULEUR ? -->
                    <h4><strong>Dois-je avoir une imprimante couleur ?</strong></h4>
                    <p>Vous pouvez imprimer votre e-ticket sur une imprimante couleur ou noir et blanc. Les billets
                        doivent êtres imprimés sur du papier format A4 blanc et vierge recto/verso.</p>
                    <br>

                    <!-- COMMENT S'EFFECTUE LE CONTRÔLE A L'ENTRÉE DE LA SALLE ? -->
                    <h4><strong>Comment s'effectue le contrôme à l'entrée de la salle ?</strong></h4>
                    <p>Chaque e-ticket dispose d’un code barre, donnée unique d’un billet, qui est scannée par un
                        contrôleur à l’entrée de la salle afin de vérifier si le billet est valide.</p>
                    <p> - Si le placement est numéroté (place assise attribuée à un acheteur identifié), l'identité
                        légitime de l'acheteur peut être établie par un responsable à l'entrée de la salle en demandant
                        une carte d'identité avec photo valide. Ainsi s'il y a plus d'une copie du même billet
                        électronique, il sera à même d'identifier l'acheteur réel. Veuillez donc apporter votre pièce
                        d'identité avec photo et prenez soin de bien détruire les copies inutiles de vos billets.</p>
                    <p> - Si le e-ticket est en placement libre, seule la première copie de votre billet électronique
                        présentée au lecteur de code à barres donnera accès à la salle. Toutes les autres copies du même
                        billet seront refusées</p>
                    <br>

                    <!-- J'AI IMPRIMÉ PLUSIEURS FOIS MES E-TICKET, QUE DOIS-JE FAIRE DES IMPRESSIONS INUTILES ? -->
                    <h4><strong>J'ai imprimé pluisieurs fois mes E-ticket,que dois-je faire des impressions inutiles
                            ?</strong></h4>
                    <p>Seule la première copie de votre billet électronique présentée au lecteur de code à barres
                        donnera accès à la salle.</p>
                    <p>Vous êtes responsable de vos e-ticket, conservez-le précieusement et prenez la peine de détruire
                        les copies inutiles</p>
                    <br>

                    <!-- Y-A-T-IL DES FRAIS DE E-TICKETS ? -->
                    <h4><strong>Y-a-t-il des frais de E-tickets ?</strong></h4>
                    <p>Des frais E-ticket sont applicables lorsque vous choisissez ce mode d’obtention des billets
                        électronique (1.40€ par commande). Un système élaboré de gestion des données, un personnel
                        technique s'assurant du bon fonctionnement du service et un équipement pour numériser les
                        billets le soir du spectacle occasionnent bien sûr frais et main d'œuvre, ce qui explique les
                        frais associés spécifiquement aux billets électroniques.</p>
                    <br>

                    <!-- PUIS-JE ANNULER MA COMMANDE DE E-TICKET ? -->
                    <h4><strong>Puis-je annuler ma commande de E-ticket ?</strong></h4>
                    <p>Sauf annulation ou report de l’événement, les e-tickets, comme tout billet classique, ne sont pas
                        annulables ou échangeables.</p>
                    <p> En cas de report ou d’annulation, veuillez nous retourner par email le fichier pdf de vos
                        e-ticket. Seul, l’acheteur original des e-ticket sera remboursé du montant des billets.</p>
                    <br>

                    <!-- QUELLES SONT LES CONDITIONS D'IMPRESSION ET DE VALIDITÉ DU E-TICKET ? -->
                    <h4><strong>Quelles sont les conditions d'impression et de validité du E-ticket ?</strong></h4>
                    <p>Ce billet n’est ni échangeable, ni remboursable. Il est personnel et incessible. Lors des
                        contrôles à l’entrée du lieu de l’événement, une pièce d’identité officielle et en cours de
                        validité avec photo pourra être demandée pour identifier l’acheteur des billets (passeport,
                        permis de conduire, carte d’identité ou carte de séjour).</p>
                    <p> - Ce billet codé est uniquement valable pour le lieu, la séance, la date et l’heure précisés
                        ci-dessus. Dans les autres cas, ce billet ne sera pas valable.</p>
                    <p> - Vous devez conserver ce titre pendant toute la durée de votre présence sur le lieu de
                        l’événement.</p>
                    <br>

                    <!--  GUIDE -->
                    <h5><strong> GUIDE</strong></h5>
                    <p>Acheter des billets sur Leguichet est très simple, il vous suffit de suivre les instructions
                        ci-dessous:</p>
                    <p><strong>1</strong>  - Commencez par recherchez l'événement auquel vous souhaitez assister dans la
                        barre de recherche où il est écrit: Chercher un événement...</p>
                    <p><strong>2</strong>  - Cliquez sur la date que vous souhaitez</p>
                    <p><strong>3</strong>  - Selectionez la quantité de billets désirée</p>
                    <p><strong>4</strong>  - Choisissez vos billets parmi les listings disponibles</p>
                    <p><strong>6</strong>  - Suivez les différentes étapes –  vérifiez que votre adresse email, numéro
                        de téléphone & adresse sont corrects</p>
                    <p><strong>7</strong>  - Verifiez les détails de votre commande pour vous assurez que tout vous
                        convient </p>

                    <div class="billet">
                        <ul>
                            <li> - Achetez vos billets! </li>
                            <li>- Recevez votre e-billet nominatif par mail juste après votre achat.</li>
                            <li>- Imprimez-le à tout moment.</li>
                           
                        </ul>
                    </div>

                    <!-- Pourquoi choisir le e-billet ? -->
                    <!-- <h5><strong>Pourquoi choisir le e-billet ?</strong></h5>
                    <img src="{{url('/')}}/public/img/ebillet.png"> -->
                </div>
            </div>


        </div>
    </div>
@endsection