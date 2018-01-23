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
    <div class="container custom-container">
        <div class="row performe">
            <div class="col-md-12">
                <div class="about-bg">
                    <!-- QU'EST-CE QU'UN E-TICKET ? -->
                    <h4><strong>Qu'est-ce qu'un billet électronique ?</strong></h4>
                    <p>Le billet électronique est disponible sur certains événements réservés sur internet. À la différence du billet traditionnel, le billet électronique est un billet imprimable chez soi en couleur ou en noir et blanc à partir de votre imprimante reliée à votre ordinateur. Il utilise un code unique et différent pour chaque billet. Chaque billet électronique est scanné à l’entrée de la salle et sa validité est contrôlée. 
                    Donc, si vous achetez deux billets électroniques, vous imprimerez deux billets sur du papier format A4 blancs et vierge recto-verso.</p><br>
                    <img src="{{url('/')}}/public/img/guide.png"><br>

                    <!-- QUEL EST L'AVANTAGE PRINCIPAL DU E-TICKET ? -->
                    <h4><strong>Quel est l'avantage principal du billet électronique?</strong></h4>
                    <p>Vous obtenez sans attendre votre billet (complication ou de délai d’attente lié à la livraison) en l’imprimant à la fin de votre commande.</p>
                    <br>

                    <!-- COMMENT SE PASSE L'ÉDITION DE MES E-TICKETS A LA FIN DE MA COMMANDE ? -->
                    <h4><strong>Comment se passe l'édition de mon billet électronique à la fin de ma commande ?</strong></h4>
                    <p>Vos E Tickets sont en pièces jointes de votre mail de confirmation de commande au format PDF.</p>
                    <p>Vous les trouverez également dans l'onglet mes commandes de votre compte.</p>
                    <p>Si vous n'avez pas de logiciel pour lire les pdf, cliquez <a href="http://www.01net.com/telecharger/windows/Internet/internet_utlitaire/fiches/14537.html">ici </a>pour telecharger adobe reader.</p>
                    <p>Ouvrez ce fichier, nous vous conseillons de le sauvegarder sur votre PC, puis de l'imprimer
                        (fichier sauvegardé en cas de problème d'impression).</p>
                    <br>

                    <!-- PUIS-JE IMPRIMER AUTANT DE CHOIX QUE JE VEUX MES E-TICKET ? -->
                    <h4><strong>Puis-je imprimer autant de fois que je veux mon billet électronique ?</strong></h4>
                    <p>Oui. Sachez toutefois que seule la première copie de votre billet électronique présentée au
                        lecteur de QRCode  donnera accès à la salle.</p>
                    <br>

                    <!-- DOIS-JE AVOIR UNE IMPRIMANTE COULEUR ? -->
                    <h4><strong>Dois-je avoir une imprimante couleur ?</strong></h4>
                    <p>Vous pouvez imprimer votre billet électronique sur une imprimante couleur ou noir et blanc.
                     Les billets doivent être imprimés sur du papier format A4 blancs et vierge recto-verso.</p>
                    <br>

                    <!-- COMMENT S'EFFECTUE LE CONTRÔLE A L'ENTRÉE DE LA SALLE ? -->
                    <h4><strong>Comment s'effectue le contrôlle à l'entrée de la salle ?</strong></h4>
                    <p>Chaque billet possède un qrcode unique qui sera scanné par un contrôleur à l'entrée de la salle afin de vérifié s'il est valide ou non. </p>
                    <p> Seule la première copie de votre billet électronique présentée au lecteur de qrcode donnera accès à la salle. Toutes les autres copies du même billet seront refusées.</p>
                    
                    <br>

                    <!-- J'AI IMPRIMÉ PLUSIEURS FOIS MES E-TICKET, QUE DOIS-JE FAIRE DES IMPRESSIONS INUTILES ? -->
                    <h4><strong>J'ai imprimé pluisieurs fois mon billet électronique, que dois-je faire des impressions inutiles 
                            ?</strong></h4>
                    <p>Seule la première copie de votre billet électronique présentée au lecteur de qrcode donnera accès à la salle.</p>
                    <p>Vous êtes responsable de vos billets, conservez-le précieusement et prenez la peine de détruire les copies inutiles.</p>
                    <br>

                    <!-- Y-A-T-IL DES FRAIS DE E-TICKETS ? -->
                    <h4><strong>Y-a-t-il des frais de billet électronique?</strong></h4>
                    <p>Oui, les frais associés spécifiquement aux billets électroniques sont mentionnés à chaque évènement.</p>
                    <br>

                    <!-- PUIS-JE ANNULER MA COMMANDE DE E-TICKET ? -->
                    <h4><strong>Puis-je annuler ma commande de billet électronique?</strong></h4>
                    <p>Sauf annulation ou report de l’événement, les billets, comme tout billet classique, ne sont pas annulables ou échangeables.</p>
                    <p>  En cas de report ou d’annulation, veuillez nous retourner par email le fichier PDF de votre billet électronique. Seul, 
                    l’acheteur original des billets électroniques sera remboursé du montant des billets.</p>
                    <br>

                    <!-- QUELLES SONT LES CONDITIONS D'IMPRESSION ET DE VALIDITÉ DU E-TICKET ? -->
                    <h4><strong>Quelles sont les conditions d'impression et de validité du billet électronique?</strong></h4>
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

                    <p><strong>1</strong>	- Commencez par rechercher l'événement auquel vous souhaitez assister dans les menus ou la barre de recherche où il est écrit: Chercher un événement...</p>
                    <p><strong>2</strong>	- Cliquez sur l’évènement que vous souhaitez</p>
                    <p><strong>3</strong>	- Cliquez sur la date que vous souhaitez</p>
                    <p><strong>4</strong>	- Sélectionnez la quantité de billets désirée</p>
                    <p><strong>5</strong>	- Choisissez vos billets parmi les listings disponibles</p>
                    <p><strong>6</strong>	- Suivez les différentes étapes –  vérifiez que votre adresse email est correcte </p>
                    <p><strong>7</strong>	- Entrer votre réponse à la question sécrète si elle est mentionnée, cette question sert à vous authentifier à l’entrée de la salle.</p>
                    <p><strong>8</strong>	- Verifiez les détails de votre commande pour vous assurer que tout vous convient </p>
                    <p><strong>9</strong>	- Achetez vos billets! </p>
                    <p><strong>10</strong>	- Recevez votre e-billet nominatif par mail juste après votre achat.</p>
                    <p><strong>11</strong>	- Imprimez-le à tout moment.</p>
                

                  
                    <!-- Pourquoi choisir le e-billet ? -->
                    <!-- <h5><strong>Pourquoi choisir le e-billet ?</strong></h5>
                    <img src="{{url('/')}}/public/img/ebillet.png"> -->

                </div>
            </div>


        </div>
    </div>
@endsection