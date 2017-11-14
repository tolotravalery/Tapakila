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
    <section id="content">
        <div class="container custom-container">
            <div class="vie">
                <h2 class="Modifcompte">Respect de la vie privée</h2>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <h3>Vie privée</h3>
                        <label>1. Introduction</label>
                        <p style="text-align: justify;">
                            Cette politique relative au Respect de la vie privée fait partie des Conditions générales
                            d’utilisation
                            de notre site Internet. Elle explique la façon dont nous utilisons les informations
                            personnelles vous concernant
                            recueillies par l'intermédiaire de ce site Web. De plus, elle détaille le mode d’utilisation
                            des cookies.

                        </p><br>
                        <label>2. Informations personnelles collectées</label>
                        <p style="text-align: justify;">En règle générale, nous pouvons être amenés à collecter les
                            informations suivantes vous concernant via le présent site Internet.
                            Veuillez noter que cette liste n'est pas définitive et qu'elle peut évoluer dans le temps
                            :</p>

                        <UL TYPE="square">
                            <LI>• Votre nom et vos coordonnées, y compris votre adresse email</LI>
                            <LI>• Vos identifiants de connexion, mots de passe en tant que de besoin afin de créer et
                                gérer les comptes d'utilisateurs nominatifs.
                            </LI>
                            <LI> • Les informations de carte de paiement en tant que de besoin afin de faciliter vos
                                achats en ligne.
                            </LI>
                            <LI>• Toutes les informations personnelles vous concernant susceptibles d'être contenues
                                dans les zones de texte libres,
                                y compris celles concernant les demandes de renseignement ou les commentaires qui nous
                                sont envoyés par l'intermédiaire du présent site Internet.
                            </LI>

                        </UL>
                        <br>

                        <label>
                            3. Fins
                        </label>
                        <p style="text-align: justify;">
                            En règle générale, nous utilisons vos informations personnelles aux fins suivantes. Veuillez
                            noter que cette liste n'est pas définitive et qu'elle peut évoluer dans le temps :

                        </p>
                        <ul>
                            <li>
                                <p style="text-align: justify;">• Afin de vous fournir des informations sur évènements
                                    phare et services connexes, de faciliter vos achats en ligne.</p>
                            </li>
                            <li>
                                <p style="text-align: justify;">
                                    • A des fins de conformité légale et réglementaire, notamment afin de donner suite à
                                    d'éventuelles demandes
                                    gouvernementales, réglementaires ou d'organismes chargés de l'application de la loi
                                    ; afin de garantir en
                                    permanence la sécurité et l'intégrité de nos systèmes, nos transactions
                                    commerciales, notre réputation ou la
                                    sécurité et la réputation de Leguichet et de ses employés ; afin de déceler toute
                                    utilisation abusive des
                                    systèmes de Leguichet et toute fraude ou tout autre activité illégale ou illicite ou
                                    toute autre activité
                                    contraire ou
                                    susceptible d'être contraire à nos obligations en matière de conformité légale et
                                    réglementaire.
                                </p>
                            </li>
                            <li>
                                <p style="text-align: justify;">
                                    • Aussi souvent qu'il est jugé nécessaire, afin de garantir une gouvernance
                                    d’entreprise
                                    responsable ou lorsque cela est exigé ou autorisé par les lois et/ou réglementations
                                    applicables.
                                </p>
                            </li>
                        </ul>
                        <br>
                        <label>4. Stockage des données</label>
                        <p style="text-align: justify;">Dans le respect de la loi applicable en matière de
                            confidentialité des données, nous ne conserverons les informations vous concernant que le
                            temps nécessaire aux fins précisées ci-dessus.</p>
                        <label>5. Mettre à jour et obtenir une copie de vos informations personnelles</label>
                        <p style="text-align: justify;">
                            Si vous pensez que les informations que nous détenons à propos de vous sont inexactes,
                            incorrectes ou incomplètes, nous vous remercions de bien vouloir nous en avertir dès que
                            possible. Veuillez vous reporter à la section « Nous contacter » ci-après. Vous êtes en
                            droit de nous demander une copie de vos informations personnelles. Toute demande doit être
                            faite par écrit (par courrier ou par email). Nous vous invitons à nous contacter pour de
                            plus amples renseignements. Veuillez vous reporter à la section « Nous contacter » ci-après.

                        </p><br>
                        <label>
                            6. Sécurité
                        </label>
                        <p style="text-align: justify;">
                            Conformément à nos obligations en vertu de la loi applicable sur la confidentialité des
                            données, nous prenons toutes les mesures de prudence permettant de protéger vos données
                            personnelles, notamment contre des tentatives d’accès non autorisés ou leur perte. De même,
                            nous nous employons à protéger toutes les informations confidentielles que vous nous
                            envoyez. Notre « Déclaration sur la sécurité » sur le présent site Internet contient de plus
                            amples détails sur les mesures de sécurité associées à notre site Web. Toutefois, et à
                            l'instar de tous les opérateurs de sites Internet, nous ne pouvons garantir la sécurité de
                            toutes les données transmises par email ou l'intermédiaire du présent site Internet.

                        </p><br>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection