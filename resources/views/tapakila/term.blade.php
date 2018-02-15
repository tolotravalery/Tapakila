@extends('template')

@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">accueil</a></li>
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
            <div class="col-md-12">
                <div class="about-bg">
                    <h3>CONDITION GENERALES</h3>
                    <br>
                    <p style="text-align: justify;">En utilisant nos services, vous acceptez les conditions ci-après, merci de les lire attentivement. </p>
                    <p style="text-align: justify;">Les services dans ce magasin de billet électronique sont fournis par Leguichet, emplacement Mahamasina,
                        e-mail <strong style="color:#d70506">contact@leguichet.mg</strong>. Nous vous invitons à cliquer sur ce lien : A propos de nous pour comprendre ce que nous faisons. </p>
                    <p style="text-align: justify;">Leguichet n'agit pas en tant qu'organisateur d'un événement. Leguichet vend des billets sur demande et au nom
                        des organisateurs et n'a pas le droit de fixer ou de modifier le prix et les conditions de vente des billets, notamment la détermination des places,
                        l'échange ou le remboursement des billets perdus, détruits, volés ou endommagés et d'autres objets liés aux événements.</p><br>

                    <p style="text-align: justify;">
                        Les droits et obligations liés au billet sont fixés et informés par l'Organisateur de l'événement et
                        Leguichet n'est pas responsable du contenu ou de l'exécution ou de la modification de ces droits et obligations.
                    </p><br>
                    <p style="text-align: justify;">Leguichet n'agit pas en tant que représentant de l'Organisateur de l'événement, de l'artiste
                        ou de toute autre personne responsable du contenu, de la qualité, des informations ou des publicités de l'événement. </p><br>


                    <p style="text-align: justify;">Le client reçoit les billets commandés au format PDF par e-mail immédiatement après le paiement. </p><br>

                    <p style="text-align: justify;">Leguichet décline toute responsabilité pour le retard de livraison des billets qui a été causé par des données inexactes ou des instructions
                        fournies par l'utilisateur de la billetterie, par l'action de toute tierce partie et par d'autres circonstances indépendantes de Leguichet. </p>
                    <br>

                    <p style="text-align: justify;">
                        Dans le cas où l'événement est annulé, reporté ou son emplacement est modifié, Leguichet n'est pas obligé d'échanger ou de rembourser le billet.
                        Les échanges et/ou les remboursements sont définis et gérés par l'organisateur.
                    </p><br>

                    <p style="text-align: justify;">
                        La violation des Conditions d'utilisation donne à Leguichet le droit de bloquer l'accès et/ou d'annuler une commande de billets sur n'importe quel utilisateur.</p><br>
                    
                    <p style="text-align: justify;">En agissant sur ce site Web, l'utilisateur accepte d'avoir au moins 18 ans, c’est-à-dire une personne entièrement responsable.</p> <br>

                    <p style="text-align: justify;">Leguichet utilise les données personnelles de ses clients uniquement pour traiter les commandes de vente de billets électroniques. Leguichet ne partagera pas les données
                        personnelles avec des tiers, sauf avec l'organisateur et lorsque cela est nécessaire pour le traitement de la transaction ou requis par la loi.</p>
                    <br>
                    <p style="text-align: justify;">Leguichet ne vérifie pas le droit de l'utilisateur d'acheter des billets avec réduction.
                        L'achat d'un billet avec remise ne garantit pas l'entrée à un événement, l'entrée à ces occasions est vérifiée sur le site.</p><br>

                    <p style="text-align: justify;">
                        Leguichet se réserve le droit de modifier les conditions de service sans préavis, les modifications sont mises en œuvre par leur publication sur le site Web.
                    </p><br>
                    <p style="text-align: justify;">Tout désaccord découlant de l'utilisation du site est traité par le tribunal d’Antananarivo conformément aux présentes conditions d'utilisation. </p><br>
                    <p style="text-align: justify;">Si vous avez des questions concernant nos Conditions d'Utilisation ou notre politique de protection
                        de la Vie Privée, n'hésitez pas à nous contacter par e-mail <strong style="color:#d70506">contact@leguichet.mg</strong>.</p>

                    <p style="text-align: justify;">Dernière mise à jour: Février 2018.</p>
                </div>
            </div>

            
        </div>
    </div>
@endsection