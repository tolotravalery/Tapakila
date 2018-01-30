@extends('template')
@section('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/public/css/styles.css">
@endsection
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

    <section>
        <div class="container custom-container">
            <div class="body_faq">
                <div class="mimi">
                    <h3>Questions les + fréquentes</h3>
                </div>
                <div class="row">

                    <ul class="nav nav-tabs nav-tabs2 faqtp">
                        <li class="active "><a href="#acheteur" data-toggle="tab"><b>ACHETEURS </b></a></li>
                        <li><a href="#vendeur" data-toggle="tab"><b>VENDEURS</b></a></li>
                    </ul>

                </div>
                <div class="content-custom">
                    <div class="tab-content">
                        <div class="tab-pane tabulation  fade active in" id="acheteur">
                            <div id="1" role="tablist" aria-multiselectable="true" class="panel-group">

                                <div class="panel panel-default">
                                    <div role="tab" id="header-0" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-0" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-0" role="button" class="collapsed">Acheter les billets</a></h4>
                                    </div>

                                    <div id="collapse-0" role="tabpanel" aria-labelledby="header-0" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord()"><span style="cursor: pointer"> Comment acheter les billets sur leguichet ?</span>
                                                <br>
                                                <label id="demo" class="hidden padd">
                                                    Acheter des billets sur Leguichet est très simple, il vous suffit de suivre les instructions ci-dessous:
                                                    <br>
                                                    <br> 1 - Commencez par rechercher l'événement auquel vous souhaitez assister dans la barre de recherche où il est écrit: Chercher un événement...
                                                    <br>
                                                    <br> 2 - Cliquez sur la date que vous souhaitez
                                                    <br>
                                                    <br> 3 - Selectionez la quantité de billet désirée
                                                    <br>
                                                    <br> 4 - Choisissez vos billets parmi les listes disponibles
                                                    <br>
                                                    <br> 6 - Suivez les différentes étapes – vérifiez que votre adresse email, numéro de téléphone & adresse sont corrects
                                                    <br>
                                                    <br> 7 - Vérifiez les détails de votre commande pour vous assurer que tout vous convient
                                                    <br>
                                                    <br> 8 - Achetez vos billets!
                                                    <br>

                                                </label>
                                            </p>

                                            <p onclick="accord1()"><span style="cursor: pointer">Les places seront-elles adjacentes ?</span>
                                                <br>
                                                <label id="demo1" class="hidden padd">

                                                    Oui, les billets achetés sur une même annonce seront consécutifs, sauf indication contraire transmis lors du processus d'achat.
                                                    <br>
                                                    <br> Les billets faisant partie de la catégorie « Place non réservée » n'ont pas d'emplacement spécifique. Les billets faisant partie de la catégorie « admission générale » correspondent généralement à des places debout.
                                                </label>
                                            </p>

                                            <p onclick="accord4()"><span style="cursor: pointer">Puis-je acheter des billets personnalisés sur lesquels figure le nom de quelqu'un d'autre ?</span>
                                                <br>
                                                <label id="demo4" class="hidden padd">
                                                    Oui, leguichet autorise des vendeurs tiers, notamment des particuliers, à mettre en vente des billets sur sa plateforme. Il se peut que le nom de l'acheteur d'origine figure sur les billets, ces billets sont valables. Vous n'êtes pas obligé(e) de posséder un billet à votre nom pour accéder à l'événement.
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-1" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-1" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-1" role="button" class="collapsed">Recevoir vos places</a></h4>
                                    </div>

                                    <div id="collapse-1" role="tabpanel" aria-labelledby="header-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord5()"><span style="cursor: pointer">Quand vais-je recevoir mes billets ?</span>
                                                <br>
                                                <label id="demo5" class="hidden padd">
                                                    Vous devriez recevoir vos billets électroniques immédiatement après le paiement.
                                                    <br>
                                                    <br> Si vous avez acheté des billets en téléchargement immédiat, ils pourront être imprimés quasiment tout de suite.
                                                    <br>
                                                    <br> Vous pouvez suivre le statut de votre commande sous la rubrique Achats.
                                                    <br>
                                                    <br> Veuillez vous assurer que le numéro de téléphone enregistré dans votre compte est correct afin que nous puissions vous contacter en cas de nécessité.
                                                    <br>

                                                </label>
                                            </p>

                                            <p onclick="accord6()"><span style="cursor: pointer">Comment télécharger mes billets électroniques ?</span>
                                                <br>
                                                <label id="demo6" class="hidden padd">
                                                    Lorsque vos billets sont prêts à être téléchargés, vous recevez un e-mail de notre part avec un lien pour le téléchargement. En cliquant sur ce lien, vous pouvez voir et imprimer les billets ou les télécharger pour les sauvegarder en tant que fichier PDF. Merci de noter que seule une copie du QRCode ne sera pas accepté à l'événement. Vos billets seront également disponibles dans la section Achats de votre compte, il vous suffira de suivre les instructions pour les télécharger.
                                                </label>
                                            </p>

                                           

                                            <p onclick="accord8()"><span style="cursor: pointer">Puis-je retirer mes billets le jour de l'évènement ,plutôt que de les recevoir par courrier ?</span>
                                                <br>
                                                <label id="demo8" class="hidden padd">
                                                    Non, vous ne le pouvez pas.L'envoi d'un billet est programmé automatiquement et il est unique
                                                    <br>
                                                    
                                                </label>
                                            </p>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-2" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-2" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-2" role="button" class="collapsed">Question d'annulation</a></h4>
                                    </div>

                                    <div id="collapse-2" role="tabpanel" aria-labelledby="header-2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord11()"><span style="cursor: pointer">Puis-je annuler ou modifier mon achat ?</span>
                                                <br>
                                                <label id="demo11" class="hidden padd">
                                                    Il n'est pas possible d'annuler ou d'échanger les billets une fois l'achat finalisé car les commandes sont considérés comme définitifs.

                                                </label>
                                            </p>

                                            <p onclick="accord12()"><span style="cursor: pointer">Mon événement a été annulé ou reprogrammé - Que dois-je faire? </span>
                                                <br>
                                                <label id="demo12" class="hidden padd">
                                                    Dans l'éventualité où votre événement serait annulé ou reporté, soyez assuré(e) que nous vous recontacterons dans les plus brefs délais avec les instructions nécessaires concernant vos billets. En règle générale;
                                                    <br>
                                                    <br> En cas d'annulation – nous vous demanderons de nous retourner les billets et un remboursement intégral de votre transaction sera effectué après réception de ceux-ci.
                                                    <br>
                                                    <br> En cas de reprogrammation – Les billets restent valides pour la nouvelle date. Veuillez consulter régulièrement vos emails et assurez-vous de vérifier également votre dossier de courrier indésirable ou ''spam''. L'email qui vous sera envoyé sera spécifique à votre événement, et contiendra toutes les informations nécessaires.
                                                    <br>
                                                    <br>

                                                </label>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-3" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-3" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-3" role="button" class="collapsed">Recevez votre paiement</a></h4>
                                    </div>

                                    <div id="collapse-3" role="tabpanel" aria-labelledby="header-3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord13()"><span style="cursor: pointer">Quelles sont les méthodes de paiement acceptées ?</span>
                                                <br>
                                                <label id="demo13" class="hidden padd">
                                                    leguichet accepte la plupart des paiements mobiles comme Mvola, Orange Money. 
                                                    <br>
                                                    <br> Les options de paiement disponibles seront indiquées lors du processus de paiement.
                                                </label>
                                            </p>

                                            <p onclick="accord14()"><span style="cursor: pointer">Mon paiement a été refusé</span>
                                                <br>
                                                <label id="demo14" class="hidden padd">

                                                    Si votre paiement est refusé, nous vous suggérons de procéder aux vérifications suivantes:
                                                    <br>
                                                        Vérifier votre numéro de téléphone et le numéro de transaction.
                                                    <br>
                                                   

                                                </label>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-4" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-4" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-4" role="button" class="collapsed">Gérer mon groupe</a></h4>
                                    </div>

                                    <div id="collapse-4" role="tabpanel" aria-labelledby="header-4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord16()"><span style="cursor: pointer">Comment modifier l'adresse e-mail de mon compte ?</span>
                                                <br>
                                                <label id="demo16" class="hidden padd">
                                                    Consultez sur << <a href="{{url('/home')}}">mon compte</a> >>puis cliquez sur << modifier mes information>> en haut à droite.
                                                </label>
                                            </p>

                                            <p onclick="accord17()"><span style="cursor: pointer">Comment réinitialiser mon mot de passe ?</span>
                                                <br>
                                                <label id="demo17" class="hidden padd">
                                                    Cliquez <a href="{{ route('password.request') }}">ici</a> pour réinitialiser votre mot de passe.
                                                </label>
                                            </p>

                                           

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-5" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-5" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-5" role="button" class="collapsed">A propos de Leguichet</a></h4>
                                    </div>

                                    <div id="collapse-5" role="tabpanel" aria-labelledby="header-5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord20()"><span style="cursor: pointer">Qu'est-ce que leguichet ?</span>
                                                <br>
                                                <label id="demo20" class="hidden padd">
                                                    Leguichet est une plateforme en ligne à Madagascar pour les billets d'événements sportifs, musicaux, et de divertissement en direct. Leguichet vise à fournir aux acheteurs de billets la plus grande sélection de billets possibles pour des événements à Madagascar, et aide les vendeurs de billets, des personnes détenant un billet supplémentaire aux grandes organisations événementielles, à atteindre un large public.
                                                    <br>
                                                    <br> Leguichet est en partenariat avec un grand nombre de personnes les plus éminentes dans le sport et le divertissement, et a aidé des clients dans tous Madagascar à avoir accès à des billets dans la langue, devise, et depuis l'appareil de leur choix.
                                                    <br>
                                                    <br> Pour toute demande client, merci de visiter la section Aide du site Internet leguichet.
                                                </label>
                                            </p>

                                            <p onclick="accord21()"><span style="cursor: pointer">Qu'est-ce que la garantie leguichet ?</span>
                                                <br>
                                                <label id="demo21" class="hidden padd">
                                                    Les acheteurs recevront dans tous les cas leurs billets dans les temps avant l'évènement. En cas de problème, leguichet intervient pour proposer des billets de remplacement ou un remboursement.
                                                    <br>
                                                    <br> Les vendeurs sont sûrs d'être payés pour les billets vendus.
                                                </label>
                                            </p>

                                            <p onclick="accord22()"><span style="cursor: pointer">Que recouvrent les frais leguichet ?</span>
                                                <br>
                                                <label id="demo22" class="hidden padd">
                                                    Acheteur : leguichet facture des frais de service venant s'ajouter au prix du billet. Ces frais sont indiqués clairement au cours du processus de paiement et ils servent à couvrir les frais de gestion de la plate-forme Leguichet, du service client et d'envoi des billets.
                                                    <br>
                                                    <br> Vendeurs : leguichet facture des frais de service sur la vente de vos billets. Ces frais sont indiqués clairement au cours du processus de vente et ils servent à couvrir les frais de marketing permettant de mettre vos billets à disposition de millions d'acheteurs potentiels dans le monde entier. Ces frais seront déduits de votre paiement.
                                                    <br>
                                                    <br> Veuillez noter que le montant des frais de service peut varier selon l'événement et sont assujettis à la TVA.
                                                </label>
                                            </p>

                                            <p onclick="accord23()"><span style="cursor: pointer">Quelles sont les Termes et Conditions de leguichet ? </span>
                                                <br>
                                                <label id="demo23" class="hidden padd">
                                                    Conditions d'utilisation
                                                    <br>
                                                    <br> PRÉAMBULE

                                                    <br>
                                                    <br> La société Leguichet, immatriculée à Madagascar, Vous propose sur le site Internet disponible à l’adresse www.leguichet.com un service de mise en relation (ci-après la « Plateforme Leguichet ») entre vendeurs (les « Vendeurs ») de billets de spectacles ou événements sportifs (les « Billets ») et acheteurs (les « Acheteurs ») de ces mêmes Billets. Les Vendeurs et les Acheteurs sont ci-après désignés conjointement les Membres. La Plateforme Leguichet permet la conclusion de contrats de vente des Billets. Toutefois, les Membres sont seuls décisionnaires de la concrétisation de la vente et de l'achat des Billets.
                                                    <br>
                                                    <br> L'acceptation des présentes Conditions générales d'utilisation de la Plateforme Leguichet par les Membres Vous permet d’accéder à cette plateforme servant à mettre en relation Vendeurs et Acheteurs et à opérer les transactions effectuées sur le site www.Leguichet.com selon les modalités définies ci-après.
                                                    <br>
                                                    <br> DÉFINITIONS

                                                    <br>
                                                    <br> Conditions Générales d’Utilisation ou Accord : désigne les présentes conditions générales d’utilisation.
                                                    <br>
                                                    <br> Plateforme Leguichet : désigne la structure fonctionnelle et organisationnelle mise en place par Leguichet sur le site permettant la 
                                                    mise en relation de Vendeurs et d'Acheteurs de Billets.
                                                    <br>
                                                    <br> Billet(s) : désigne les billets de spectacle ou d’événements sportifs à Madagascar ou à l’étranger, susceptibles de faire l'objet d'une mise 
                                                    en relation par le biais de la Plateforme Leguichet.
                                                    <br>
                                                    <br> Billet(s) Interdit(s) : désigne les billets de spectacle ou d’événements sportifs dont la vente ne serait pas autorisée en vertu de dispositions 
                                                    législatives, réglementaires ou contractuelles. Il s'agit notamment des Billets qui constitueraient des billets contrefaisants au sens du Code de la
                                                     propriété intellectuelle ou qui seraient vendus en violation de réseaux de distribution sélective ou exclusive, notamment les Billets vendus en violation 
                                                     de l’article 313-6-2 du code pénal.
                                                    <br>
                                                    <br> Vendeur(s) : désigne un Membre mettant en vente un billet sur la Plateforme Leguichet, et éditant à cet effet une Offre de Vente sur le Site, dans le respect des conditions définies à l’article 3.1 des présentes Conditions Générales d’Utilisation.
                                                    <br>
                                                    <br> Acheteur(s) : désigne un membre ayant accepté l'offre d'un Vendeur.
                                                    <br>
                                                    <br> Membre(s) ou Vous : désigne toute personne, Vendeur ou Acheteur, susceptible de faire usage de la Plateforme Leguichet après acceptation des présentes Conditions Générales d’Utilisation. Tout Membre s'engage à fournir des informations exactes quant à son identité, adresse et autres données nécessaires à l'accès à la Plateforme Leguichet et à mettre à jour toute modification concernant ces informations.
                                                    <br>
                                                    <br> Offre de Vente ou Listing : désigne toute annonce ou offre de vente d’un Billet éditée par un Vendeur sur la Plateforme Leguichet, incluant au moins une description des caractéristiques du Billet proposé à la Vente (date et lieu de la manifestation auquel le Billet donne accès, référence des places ou catégories de places auxquelles le Billet donne accès, etc.) et un Prix de Vente proposé.
                                                    <br>
                                                    <br> Prix de Vente : désigne le prix proposé par le Vendeur pour son Offre de Vente d'un Billet duquel est déduit la Commission lors de la réalisation d’une vente de Billet.
                                                    <br>
                                                    <br> Commission : désigne la rémunération perçue par Leguichet sur le Prix de Vente lors de la vente d’un Billet.
                                                    <br>
                                                    <br> Prix de la Transaction : désigne le prix total payable par l'Acheteur lors de l’achat d’un Billet sur le Site, comportant selon les cas, en plus du Prix de Vente, les frais de réservation, les frais de port définis de façon forfaitaire, la TVA sur l’ensemble des éléments précédents, ou tout autre impôt ou taxe s’appliquant.
                                                    <br>
                                                    <br> Service(s) : désigne tous les services offerts sur le site www.Leguichet.com.
                                                    <br>
                                                    <br> Site : désigne le site<a href="www.leguichet.com"> www.Leguichet.com.</a>
                                                    <br>
                                                    <br> Titulaire des Droits d’Exploitation ou TDE : désigne toute personne responsable, à quelque titre que ce soit, de l’organisation de la manifestation ou du spectacle pour laquelle/lequel un Listing est mis en ligne sur le Site par un Vendeur et disposant en cette qualité de droits d’exploitation sur ladite/ledit manifestation ou spectacle. Cette définition vise notamment, sans que cette liste soit limitative, le producteur, l'organisateur ou le propriétaire des droits d'exploitation de la manifestation ou du spectacle.
                                                    
                                                   
                                                    <br>
                                                    <br> 1.1 Introduction : Les présentes Conditions Générales d'Utilisation de la Plateforme Leguichet ont pour objet de définir les modalités de l'accord entre Vous et Nous, les conditions par lesquelles les Membres sont autorisés à utiliser la Plateforme Leguichet aux fins d'opérer leur mise en relation et tous les autres Services que Nous offrons. Par l'utilisation de ce Site et des Services, Vous confirmez accepter cet Accord et l’intégralité de ses termes.
                                                    <br>
                                                    
                                                    <br> 1.3 Commissions et Services : L'inscription, la mise en vente d’un Billet et l'action de se porter acquéreur 
                                                    de Billets proposés sur notre Site sont gratuit. Cependant, l'utilisation d'autres Services, tels que l’achat effectif d’un Billet, 
                                                    est payante. Lorsque Vous mettez en vente un Billet, Vous avez la possibilité de passer en revue les taux de Commission tels qu’ils sont détaillés 
                                                    dans la rubrique « Quels frais de gestion sont déduits du prix de vente » des pages d’aide du Site disponibles à l’adresse URL suivant 
                                                    http://www.Leguichet.com/faq. Vous devez accepter ces tarifs pour mettre en ligne votre Offre de Vente. Sauf mention contraire, 
                                                    les taux de Commission sont indiqués sous forme de pourcentage du Prix de Vente et sont facturés en AR (Ariary).
                                                    <br>
                                                    <br> 1.4 Garantie Leguichet : Lorsque Vous achetez des billets sur Leguichet, Leguichet vous garantit que vous recevrez 
                                                    les billets achetés à temps pour l'événement. Dans les cas rares où un problème surviendrait et que le vendeur d'origine du billet n’est plus 
                                                    en mesure de fournir les billets mis en vente, Leguichet fait , à sa seule et entière discrétion, une recherche de billets de remplacement équivalents 
                                                    et Vous les fournit sans coût additionnel. Si Leguichet n'est pas en mesure de trouver et Vous fournir des billets équivalents, un remboursement du coût 
                                                    des billets Vous sera proposé. La notion de billets de remplacement équivalents est définie par Leguichet, à sa seule et entière discrétion. Lorsque Vous 
                                                    vendez des billets sur Leguichet, Leguichet vous garantit que vous serez payé(e) pour votre vente, à condition que vous fournissiez exactement les mêmes
                                                     billets que ceux que vous avez mis en vente et que l'acheteur des billets ait pu accéder à l'événement.
                                                    <br>
                                                    <br> 2.1 Conditions requises : Pour être Membre de ce Site, Vous devez accepter les termes de cet Accord. 
                                                    Vous pouvez uniquement utiliser les Services si Vous pouvez légalement conclure un contrat et signer des contrats exécutoires, sinon,
                                                     Vous n'êtes pas autorisé à utiliser ces Services. En outre, les Vendeurs doivent être autorisés à mettre en ligne une Offre de Vente 
                                                     et respecter l’ensemble des présentes Conditions Générales d’Utilisation.
                                                    <br>
                                                    <br> 2.2 Inscription : Nous ne Vous autoriserons pas à acheter ou à vendre des Billets avant que Vous Vous 
                                                    soyez inscrits auprès de Nous. Pour cela, Vous devez fournir notamment votre nom, votre adresse, votre numéro 
                                                    de téléphone et adresse de courrier électronique. Vous Vous engagez à ce que l’ensemble des informations que Vous Nous fournissez soit exact.
                                                    <br>
                                                    <br> 2.3 Pseudonyme et mot de passe : Vous aurez besoin d'un pseudonyme et d'un mot de passe pour accéder au Site et en utiliser les Services. 
                                                    La sécurité de votre pseudonyme et de votre mot de passe Vous incombe et Vous serez tenu responsable de l’ensemble des actions effectuées sous 
                                                    votre pseudonyme et mot de passe. En effet, l’utilisation de votre pseudonyme et de votre mot de passe fera naître une présomption que c’est bien Vous 
                                                    qui utilisez les Services.
            
                                                    <br>
                                                    <br> 2.4 Résolution des litiges : Après réception des billets, si l’Acheteur n’est pas satisfait d’une partie de la commande, 
                                                    l’Acheteur devra respecter les règles de résolution des litiges déterminées dans notre Garantie Leguichet. Toute réclamation doit être déposée dans un délai de 14 jours à compter de la réception des Billets, faute de quoi, ces Billets ne seront plus couverts par la Garantie Leguichet. Dans le cas où vous rencontreriez des difficultés à utiliser vos Billets le jour de l’Évènement, vous devrez contacter Leguichet sous 48 heures pour signaler le problème. Vous devrez remplir un Formulaire de Dépôt de Plainte. Seuls les Formulaires dûment complétés pourront faire l’objet d’un remboursement. Les Formulaires devront être renvoyés à Leguichet sous 5 jours ouvrables à compter de leur réception pour pouvoir prétendre à un remboursement. Leguichet se réserve le droit d’interdire tout nouvel accès à son site internet à toute personne déposant plainte de façon abusive.
                                                    <br>
                                                    
                                                    <br> 3.1 Offre de Billets : Pour mettre des Billets en vente, un Vendeur publie une Offre de Vente sur la Plateforme Leguichet. Toute Offre de Vente doit être publiée conformément aux conditions définies ci-dessous, sous peine d’être retirée du Site dans les cas visés aux articles 3.11 et 6.2 des présentes Conditions Générales d’Utilisation.
                                                    <br>
                                                    <br> Le Vendeur est seul responsable de la licéité de cette Offre de Vente. En particulier, le Vendeur doit s’assurer d’être autorisé à mettre en vente le Billet 
                                                    conformément aux lois et règlementations applicables. Leguichet considère qu’un Vendeur est autorisé à mettre en vente un Billet si et seulement s’il rentre dans au
                                                     moins l’une des catégories suivantes : (i) le Vendeur est un Titulaire des Droits d’Exploitation de la manifestation et/ou du spectacle mentionné(s) par le ou les 
                                                     Billets mis en vente, (ii) le Vendeur est expressément autorisé par le Titulaire des Droits d’Exploitation de ladite manifestation et/ou dudit spectacle à vendre ou 
                                                     mettre en vente des Billets pour le compte du Titulaire des Droits d’Exploitation, (iii) Leguichet est autorisée, par le Titulaire des Droits d’Exploitation, à opérer 
                                                     une bourse d’échange de Billets par laquelle les Membres peuvent librement acheter ou vendre de gré à gré des Billets ou (iv) le Vendeur ne met pas en vente à titre 
                                                     habituel des Billets sur la Plateforme Leguichet.
                                                    <br>
                                                    
                                                    <br> Le Vendeur est seul responsable du contenu de cette Offre de Vente. Ainsi, le Vendeur définit seul le Prix et fournit les informations relatives aux Billets, en ce compris, sans que cette liste soit limitative, les informations sur l'événement, la date, la section, la rangée, et la date de clôture de la vente, le tout conformément au processus indiqué dans les pages d'aide du Site.
                                                    <br>
                                                    <br> Le Vendeur n’est pas autorisé par Leguichet à mettre en vente sur le site des Billets Interdits.
                                                    <br>
                                                   
                                                    <br> 3.2 Tarification : Si un Vendeur met un Billet en vente sur le Site, il doit déterminer seul un prix fixe de vente des Billets.
                                                    <br>
                                                    <br> 3.3 Authenticité des informations : Pour tous les Billets que Vous mettez en vente en tant que Vendeur, Vous garantissez l'exactitude des renseignements que Vous publiez dans l’Offre de Vente que Vous rédigez. Vous garantissez également que Vous possédez les Billets et que Vous êtes autorisé(e) à les transférer ou à les revendre, conformément aux conditions définies à l’article 3.1. Dans le cas où Vous revendez des Billets à un événement pour des raisons commerciales, Vous garantissez que Vous en avez le droit. Vous garantissez notamment que Vous êtes autorisés à proposer les Billets à la vente au prix que Vous avez fixé.
                                                    <br>
                                                    <br> Leguichet Vous informe que la publication d’une Offre de Vente en violation des conditions définies dans les présentes Conditions Générales d’Utilisation 
                                                    est susceptible d’entraîner des poursuites pénales à l’encontre du Vendeur responsable de ladite publication dans certaines juridictions. Leguichet décline toute 
                                                    responsabilité quant à la publication par Vous d’Offres de Vente illicites ou d’Offres de Vente de Billets Interdits, autre que celle qui pourrait lui incomber du fait de son statut d’hébergeur. En mettant en Vente un Billet sur la Plateforme Leguichet et en acceptant à ce titre les présentes Conditions Générales d’Utilisation, Vous garantissez Leguichet contre tout recours, action en justice, dommages-intérêts et tous frais annexes auxquels Leguichet devrait faire face ou qui seraient mis à la charge de Leguichet du fait de Votre publication d’une Offre de Vente illicite sur la Plateforme Leguichet.
                                                    <br>
                                                
                                                    <br> 3.4 Double publication de vente et retrait des Billets : Afin de mettre un Billet en vente sur le Site, Vous devez d'abord Vous inscrire afin de devenir Membre. Une fois un Billet mis en vente sur le Site, Nous Vous déconseillons de le publier ailleurs.
                                                    <br>
                                                    <br> Néanmoins, Vous êtes autorisé(e) à mettre votre Billet en vente sur d'autres places de marché, mais Vous devez immédiatement supprimer votre Billet du Site si celui-ci est vendu ailleurs.
                                                    <br>
                                                    
                                                <br> Sauf disposition contraire dans les présentes Conditions Générales d’Utilisation, Vous acceptez de ne pas promouvoir la vente des Billets publiés sur le Site sur tout autre site. Nous Nous réservons le droit d'interdire aux Membres de mettre en vente des Billets sur le Site s'ils ne peuvent pas fournir les mêmes Billets que ceux qu'ils ont mis en vente sur la Plateforme Leguichet.
                                                    <br>
                                                   
                                                    <br> 3.6 Retrait d’une Offre de Vente : Leguichet peut, à tout moment et de façon unilatérale, décider de supprimer une Offre de Vente pour la vente de Billets du Site. En effet, en tant qu’hébergeur, Leguichet peut être amené à prendre la décision de supprimer une Offre de Vente du Site lorsque des tiers apportent des éléments démontrant que ladite Offre de Vente contrevient à leurs droits et/ou à la règlementation applicable. La responsabilité de Leguichet ne pourra être engagée à ce titre.
                                                    <br>
                                                    <br> 3.7 Licence : Lorsque Vous Nous confiez du contenu, Vous Nous concédez le droit non exclusif, international, sans limitation de durée (c'est-à-dire, pour la durée de la protection), irrévocable, exempt de redevance, transférable dans le cadre d'une sous-licence, d'exercer les droits de propriété intellectuelle (nécessaires pour héberger le contenu) que Vous ou d'autres personnes possédez sur le contenu, dans tout média existant ou à venir. En ce qui concerne les droits d’auteurs, Vous Nous concédez les droits de reproduction, de représentation et d’adaptation pour toute utilisation numérique en ligne sur le Site lorsque et au fur et à mesure que Vous postez votre contenu sur le Site.
                                                    <br>
                                                    <br> Nous pouvons être amenés à Vous proposer des informations génériques pour nourrir votre contenu. Nous Nous efforçons naturellement d’en assurer l’exactitude et l’actualisation. Toutefois, si Vous décidez d’utiliser ces informations, il Vous appartient d’en vérifier l’exactitude et de ne pas inclure d'informations calomnieuses, diffamatoires ou dénigrantes. Vous acceptez de ne pas engager notre responsabilité en cas d’erreur ou d’inexactitude de ces informations. Vous Vous engagez par ailleurs à n’utiliser ces informations que dans le cadre de la rédaction de vos Offres de Vente et d'une manière qui ne porte pas atteinte aux droits de propriété d'un tiers.
                                                    <br>
                                                    <br> En plaçant une « offre » d’achat, Vous, en tant qu'Acheteur, octroyez à Leguichet le droit de débiter du Prix de la Transaction votre carte de crédit ou de débit, votre compte mobile ou votre compte bancaire pour l'achat des Billets choisis.
                                                    <br>
                                                    <br> 4.2 Changement de places : Les Billets mis en vente sont une représentation de la place réelle. Il est possible que ces Billets soient échangés contre des places comparables ou mieux situées après approbation de l'Acheteur.
                                                    <br>
                                                    <br> 4.3 Informations sur les Billets : Les dates d'événements, les horaires, les lieux et l'objet des événements qui sont indiqués sur les Billets peuvent être sujets à changement.
                                                    <br> En cas de paiement par mobile. Nous ajouterons, le cas échéant, la TVA à nos frais et commissions.
                                                    <br>
                                                    <br> En cas de paiement par virement bancaire, Nous vérifierons la validité du compte bancaire émetteur du virement.
                                                    <br>
                                                    
                                                    <br> 5.1 Collecte du paiement : Après confirmation de l'envoi des Billets par le Vendeur, Nous recueillons le paiement auprès de l'Acheteur correspondant au Prix de la Transaction. Nous ne fournissons jamais les informations de règlement de l'Acheteur au Vendeur. Nous percevons le paiement et le Vendeur est ensuite payé conformément au mode de paiement qu'il aura choisi et à notre politique de paiement indiquée dans les pages d'aide du Site.
                                                    <br>
                                                    <br> 6.1 Enquêtes : Nous pouvons être amenés à effectuer une enquête à la suite de plaintes et de violations de nos Conditions Générales d’Utilisation. Vous acceptez de coopérer pleinement, y compris, notamment, de Nous fournir des informations spécifiques sur vos droits concernant un Billet, son origine, votre acquisition d'un Billet et le prix que Vous avez payé pour ce Billet.
                                                    <br>
                                                    <br> 6.2 Violations, résiliation et suspension : Des actions pourront être prises si Nous les jugeons appropriées, Nous pourrons également, sans toutefois s'y limiter, émettre un avertissement, suspendre ou clore un service, refuser un accès, supprimer une offre ou Vous conseiller de modifier une Offre de Vente. Vous acceptez que les paiements qui Vous sont dus à la suite de ventes effectuées par l'intermédiaire de ce Site puissent être suspendus ou retardés. Leguichet ne sera pas obligé de Vous payer toute vente si Nous suspectons que cette vente a été illégale ou exécutée en violation de cet Accord. Lors de la clôture de votre compte, vos Offres de Vente seront supprimées du Site si Vous êtes un Vendeur et vos achats seront annulés si Vous êtes un Acheteur.
                                                    <br>
                                                    <br> 6.3 Divulgation d'informations : Vous acceptez que Leguichet fasse état, aux autorités règlementaires, aux autorités de régulation et/ou à tout tiers compétent, de toute activité dont elle soupçonne qu’elle constitue une violation à la loi. Leguichet coopérera afin de garantir que les auteurs de violations soient poursuivis conformément à la loi.
                                                    <br>
                                                    <br> 6.4 Exécution d'ajustements : Vous Nous autorisez à différer le paiement ou à débiter votre carte de crédit ou de débit, ou votre compte mobile, dans le cadre de l’autorisation de prélèvement que Vous Nous accordez, de tout montant que Vous Nous devrez si (a) un ajustement est effectué du fait de l’exécution de notre garantie Leguichet ; (b) Nous soupçonnons qu’une fraude ou un autre acte illégal a été commis lors des activités de vente ou d'achat et si une autorité compétente Nous fait la demande de différer le paiement ou de débiter votre moyen de paiement à titre provisoire ; (c) Vous ne livrez pas les mêmes Billets que ceux que Vous avez mis en vente sur le Site et dont la transaction a été confirmée ; (d) Vous adressez des objets promotionnels à un Acheteur ; ou (e) si Vous Nous devez de l'argent. Si l'une des situations citées devait se produire, Nous Nous réservons le droit de déduire de votre paiement le montant que Vous Nous devez.
                                                    <br>
                                                    <br> 7.1 Non garantie : À l'exception des garanties explicites déclarées dans cet Accord, Leguichet fournit les logiciels, le Site et les Services « tels qu'ils sont présentés » et « selon leur disponibilité » sans aucune garantie de quelque sorte que ce soit. Leguichet n'offre aucune garantie concernant ses logiciels, les Billets, les événements, les Services que Leguichet offre, ou la bonne exécution des promesses des Vendeurs ou des Acheteurs au-delà des garanties légales telles que prévues par les textes applicables. En particulier, Leguichet décline toute garantie, qu'elle soit explicite, obligatoire ou implicite, y compris et sans réserve(s), les garanties de qualité, de titre, de non violation des droits de tiers, etc. autant que la réglementation applicable le permet.
                                                    <br>
                                                    <br> 7.2 Renonciation des dommages indirects/limite de responsabilité : Sauf dans le cas où elle aurait été dûment informée de l’existence d’un contenu illicite au sens de la législation en vigueur, et n’aurait pas agi promptement pour le retirer, Leguichet ne peut pas être tenue pour responsable ni du contenu ou des actions (ou absence d'action) des Membres, ni des Billets qu'ils mettent en vente. Leguichet décline expressément toute responsabilité pour toute perte de profits, y compris, sans toutefois s'y limiter, tous dommages-intérêts particuliers ou exemplaires, tous dommages indirects ou tous dommages accessoires pouvant résulter des Services, du Site ou de la suspension, de la clôture ou du mauvais fonctionnement des Services ou du Site. La responsabilité de Leguichet envers Vous ou quiconque en toute circonstance, se limite au plus petit des deux montants suivants : (a) 200 €, et (b) la valeur totale de tous les Billets et autres articles que Vous avez achetés et/ou vendus par l'intermédiaire de Leguichet au cours de l'action ayant prétendument engendré la responsabilité. En aucun cas Leguichet ne saurait être tenue responsable de coûts supplémentaires encourus par votre achat de Billets auprès d'un tiers en contrepartie de Billets que Vous n'avez pas pu acheter sur le Site.
                                                    <br>
                                                    <br> 7.3 Enchères : Vous reconnaissez que Nous ne sommes pas une société de ventes aux enchères publiques. Au contraire, le Site est un lieu d'échange dont l'objet est de permettre à n'importe qui, n'importe où et n'importe quand, d'offrir, de vendre ou d'acheter des Billets.
                                                    <br>
                                                    <br> 7.4 Renonciation : Vous reconnaissez expressément que Leguichet n’est pas impliquée dans les transactions réelles entre les Acheteurs et les Vendeurs. En cas de litige avec un ou plusieurs Membres, sauf dans le cas où Leguichet aurait été dûment informée de l’existence d’un contenu illicite au sens de la législation en vigueur, et n’aurait pas agi promptement pour le retirer, Vous Nous dégagez de toute responsabilité (ainsi que nos administrateurs, directeurs, agents, sociétés liées et associées, joint ventures et employés) pour toute réclamation et tout dommage (présent ou futur) de tout type ou nature, connu ou non, résultant de manière directe ou indirecte de ces litiges.
                                                    <br>
                                                    
                                                    <br> 7.5 Indépendance des parties : Vous et Leguichet êtes des parties indépendantes, et aucune agence, aucun partenariat, aucune co-entreprise, aucune relation employeur-employé ou franchiseur-franchisé n'est voulu ou créé par cet Accord.
                                                    <br>
                                                    <br> 7.6 Informations provenant de tiers : Nous ne contrôlons pas les informations fournies sur ce Site par des utilisateurs ou les Membres. Il est possible que Vous trouviez que les informations provenant de tiers soient préjudiciables, inexactes ou décevantes. Veuillez faire preuve d'attention lorsque Vous utilisez le Site et n'oubliez pas la présence de risques d'escroquerie. Lorsque Vous utilisez ce Site, Vous reconnaissez ces risques et acceptez que Leguichet ne pourra être tenue responsable des actes ou omissions des utilisateurs du Site ni des Membres.
                                                    <br>
                                                    <br> 7.7 Toutes les ventes sont irrévocables : Toutes les ventes sont irrévocables. Une fois la commande validée, aucun remboursement, aucune annulation ou aucun échange (pour des dates ou horaires différents), ne sera possible.
                                                    <br>
                                                  
                                                    <br> Si, pour une quelconque raison, Vous ne voulez plus les Billets que Vous avez commandés, Nous Vous invitons à les revendre sur notre Site. Pour en savoir plus sur la mise en vente de Billets sur Leguichet, rendez-Vous sur <a href="#">www.Leguichet.com</a>
                                                    <br>
                                                    <br> 7.8 Modification ou suspension du Site : Leguichet se réserve le droit à tout moment de modifier ou d'arrêter, temporairement ou de manière permanente, le Site ou toute partie du Site avec ou sans préavis. Vous acceptez, dans le cadre de cet Accord, que Nous ne pourrons être tenus responsables envers Vous ou tout tiers de toute modification, suspension ou arrêt du Site ou de quelconque de ces Services, pour quelque raison que ce soit. Nous ne garantissons pas un accès continu, ininterrompu ou sûr à nos Services, et le fonctionnement de notre Site peut être altéré à cause de nombreux facteurs hors de notre contrôle. En outre, il est possible que le Site ne soit pas disponible pendant certaines périodes car il peut être mis à jour ou modifié. Le Site, pendant cette période, sera temporairement indisponible.
                                                    <br>
                                                    <br> 7.9 Avis : Sauf indication explicite contraire de la part de Leguichet, tous les avis et notification que Vous souhaitez adresser à Leguichet doivent être envoyés par l'intermédiaire du formulaire de courrier électronique mis à disposition sur le Site sous le lien Contactez-nous. Notre adresse postale est 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                                    <br>
                                                    <br> Sauf indication explicite contraire, tous les avis et notification que Nous souhaitons Vous adresser seront envoyés à l'adresse email que Vous Nous aurez fournie lors du processus d'inscription à notre Site. Il sera considéré que l'avis aura été soumis un jour ouvrable après l'envoi de l'email.
                                                    <br>
                                                    <br> 8.1 Règlement des litiges : Si, après avoir reçu les Billets, un Acheteur n'était pas satisfait d’une quelconque étape de l'achat, il devra suivre les procédures de recours indiquées dans la garantie Leguichet.
                                                    <br>
                                                    <br> 8.2 Droit de propriété intellectuelle : Vous reconnaissez et acceptez que (i) nos brevets, marques commerciales, appellations commerciales, marques de service, copyrights et autres droits de propriété intellectuelle (collectivement « la propriété intellectuelle ») sont et doivent être notre unique propriété, et que (ii) rien dans cet Accord ne Vous confère de droits de propriété ou de droits de licence dans notre propriété intellectuelle. Par ailleurs, Vous ne devez ni à présent, ni à l'avenir, contester la validité de la propriété intellectuelle de Leguichet.
                                                    <br>
                                                    <br> 8.3 Copyright : Copyright © Leguichet 2017. Les logiciels et le Site, y compris notamment, tous les textes, tous les graphiques, tous les logos, tous les boutons, toutes les images, tous les clips audio, et tous les programmes informatiques, constituent la propriété de Leguichet ou de ses fournisseurs, et ils sont protégés par les lois internationales et nationales sur le copyright, la marque de commerce ou d'autres lois sur la propriété intellectuelle. La compilation (c'est-à-dire la collecte, l'organisation et l'assemblage) de tout le contenu du Site est réservée exclusivement à Leguichet et elle est protégée par les lois internationales et nationales sur le copyright. La reproduction, la modification, la distribution, la transmission, la réédition, l'affichage ou l'exécution des logiciels ou du contenu du Site sont strictement interdits.
                                                    <br>
                                                    <br> 8.4 Contrats supplémentaires : Cet Accord intègre par référence les contrats et documents suivants également inclus au Site:
                                                    <br>
                                                    <br> Protection de vos informations personnelles
                                                    <br>
                                                    <br> 8.5 Loi applicable : Cet Accord est régi par et doit être interprété conformément aux lois de l'Etat du Delaware des Madagascar d’Amérique. Vous consentez à la juridiction non-exclusive et personnelle des tribunaux du Delaware. Leguichet Entertainment Inc est enregistrée au Delaware à l’adresse suivante: 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                                    <br>
                                                    
                                                    <br> 8.7 Divers : Cet Accord (et tous les documents incorporés par référence) constitue l'intégralité de l'accord entre Vous et Nous et supplante tous les accords et toutes les conventions antérieures, écrits ou oraux, entre ces parties. Aucun amendement, aucune modification ou aucun ajout aux clauses de cet Accord ne sera valide ou en vigueur à moins qu'il n'ait été effectué conformément aux conditions explicites de cet Accord. Si une quelconque clause de cet Accord est jugée invalide ou inapplicable dans quelque circonstance que ce soit, son application dans toute autre circonstance ainsi que les autres clauses de cet Accord ne devront pas être affectées. Vous n'êtes pas autorisé(e) à céder ou à transférer cet Accord, ou ses droits ou obligations, sans approbation écrite préalable de Leguichet, qui se réserve le droit de refuser une telle approbation. Rien dans cet Accord n'a pour objet de conférer des droits ou des voies d’action à quiconque ou à toute entité autre que les parties du présent Accord et à leurs successeurs ou ayants droit. Nos fournisseurs et nos partenaires sont des bénéficiaires tiers de cet Accord. Cela ne Nous empêche pas de modifier ces termes sans y faire référence. Les titres des paragraphes de cet Accord ont uniquement valeur de référence et ne définissent, ne limitent, n'interprètent ou ne décrivent en aucun cas la portée ou l'étendue de ces paragraphes.
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- date 2 -->
                        <div class="tab-pane tabulation fade" id="vendeur">
                            <div id="2" role="tablist" aria-multiselectable="true" class="panel-group">
                                <div class="panel panel-default">
                                    <div role="tab" id="header-6" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-6" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-6" role="button" class="collapsed">Vendre les billets</a></h4>
                                    </div>

                                    <div id="collapse-6" role="tabpanel" aria-labelledby="header-0" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord24()"><span style="cursor: pointer">Comment vendre des billets ?</span>
                                                <br>
                                                <label id="demo24" class="hidden padd">

                                                    leguichet autorise la mise en vente de billets sur sa plateforme. Pour vendre vos billets en trop :<br><br>

                                                    Cliquez sur le bouton « Ajout votre événenement » en haut à droite de la page d'accueil.
                                                    Recherchez l'événement pour lequel vous souhaitez vendre des billets. Si vous ne trouvez pas votre événement, indiquez-le en cliquant ici, et nous l'ajouterons à notre site web
                                                    Suivez les étapes de saisie des informations relatives à votre billet. Important : indiquez la manière dont vous souhaitez être payés(e) une fois que les billets auront été vendus.
                                                    Vérifiez et confirmez votre annonce afin qu'elle puisse être mise à la disposition de millions d'acheteurs potentiels dans le monde entier.<br><br>

                                                    Choses importantes à savoir lors de la mise en vente de vos billets :<br><br>

                                                    Donnez à vos acheteurs potentiels le plus d'informations possible concernant l'emplacement en indiquant le bloc, la rangée et le numéro de la place.
                                                    Si des billets en place assise sont mis en vente dans une seule annonce, ces places doivent être consécutives.
                                                    Toute mention spéciale, comme par exemple « billet enfant » ou « vue restreinte » doit figurer clairement.
                                                    Vérifiez régulièrement les prix auxquels vous avez listé vos billets pour vous assurer qu’ils soient compétitifs.
                                                    Téléchargez les billets électroniques dès que vous les avez. Ils figureront dans la rubrique Téléchargement instantané sur le site web, et pourront ainsi être vendus plus rapidement.
                                                    Confirmez rapidement votre vente dès que nous vous aurons informé que les billets ont été vendus.
                                                   
                                                </label>
                                            </p>

                                            <p onclick="accord25()"><span style="cursor: pointer">Comment modifier mon offre ?</span>
                                                <br>
                                                <label id="demo25" class="hidden padd">
                                                    Vous pouvez modifier votre offre si les billets n'ont pas encore été vendus. <br><br>
                        
                                                </label>
                                            </p>

                                            <p onclick="accord26()"><span style="cursor: pointer">Comment supprimer mon offre ?</span>
                                                <br>
                                                <label id="demo26" class="hidden padd">
                                                    Vous pouvez supprimer votre offre si les billets n'ont pas encore été vendus. <br><br>
                                                    Pour supprimer votre offre, veuillez vous rendre à la rubrique Offres. <br><br>
                                                    Si vous souhaitez suspendre temporairement votre offre du site leguichet, vous pouvez la dépublier puis la republier plus tard. <br><br>
                                                </label>
                                            </p>

                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-7" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-7" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-7" role="button" class="collapsed">Envoyer vos places</a></h4>
                                    </div>

                                    <div id="collapse-7" role="tabpanel" aria-labelledby="header-7" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                           
                                            <p onclick="accord30()"><span style="cursor: pointer">Comment télécharger des billets électroniques ?</span>
                                                <br>
                                                <label id="demo30" class="hidden padd">
                                                    Veuillez vous rendre à la rubrique Ventes dès que vous aurez reçu vos billets et que vous serez en mesure de les télécharger. <br><br>
                                                    Cliquez uniquement sur le bouton « Télécharger des billets  » si vous êtes prêt à le faire. Vous recevrez des informations relatives au chargement des billets ainsi que le paiement de votre vente.<br><br>
                                                </label>
                                            </p>

                                            
                                            
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div role="tab" id="header-8" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-8" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-8" role="button" class="collapsed">Méthode de paiement</a></h4>
                                    </div>

                                    <div id="collapse-8" role="tabpanel" aria-labelledby="header-8" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord34()"><span style="cursor: pointer">Comment modifier la méthode de paiement choisit pour la réception des paiements ?</span>
                                                <br>
                                                <label id="demo34" class="hidden padd">
                                                    Vous pouvez modifier votre méthode de paiement à tout moment jusqu'à la réception du paiement. Rendez-vous à la section Méthodes de paiement pour modifier les informations. <br><br>
                                                    Si vous avez ajouté une nouvelle méthode de paiement, n'oubliez pas de cliquer sur l'icône « étoile » pour que cette méthode de paiement soit définie par défaut.
                                                </label>
                                            </p>

                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div role="tab" id="header-9" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-9" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-9" role="button" class="collapsed">Questions d'annulations</a></h4>
                                    </div>

                                    <div id="collapse-9" role="tabpanel" aria-labelledby="header-9" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord35()"><span style="cursor: pointer">Puis-je annuler ou modifier ma vente ?</span>
                                                <br>
                                                <label id="demo35" class="hidden padd">
                                                    Non, une fois que vos billets ont été vendus, vous ne pouvez pas annuler la vente car l'acheteur attend les billets. <br><br>
                                                    Si vous n'êtes plus en mesure d'envoyer les billets que vous avez vendus, leguichet se réserve le droit de facturer des frais de pénalité liés au remplacement des billets pour l'acheteur
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-10" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-10" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-10" role="button" class="collapsed">Gérer mon compte</a></h4>
                                    </div>

                                    <div id="collapse-10" role="tabpanel" aria-labelledby="header-10" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord36()"><span style="cursor: pointer">J'ai saisi une adresse e-mail incorrecte lors de l'inscription, comment puis-je la modifier ?</span>
                                                <br>
                                                <label id="demo36" class="hidden padd">
                                                    Consultez la rubrique Configuration du compte en vous connectant à l'aide de l'e-mail « incorrect » utilisé lors de la première inscription. Cliquez sur le lien « Modifier » situé à côté de l'adresse e-mail.
                                                </label>
                                            </p>

                                            <p onclick="accord38()"><span style="cursor: pointer">Comment réinitialiser mon mot de passe ?</span>
                                                <br>
                                                <label id="demo38" class="hidden padd">
                                                    Cliquez sur le lien <a href="{{ route('password.request') }}">"Modifier mes informations"</a> 
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>





                                <div class="panel panel-default">
                                    <div role="tab" id="header-11" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-11" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-11" role="button" class="collapsed">A propos de Leguichet</a></h4>
                                    </div>

                                    <div id="collapse-11" role="tabpanel" aria-labelledby="header-11" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord41()"><span style="cursor: pointer">Qu'est-ce que leguichet ?</span>
                                                <br>
                                                <label id="demo41" class="hidden padd">
                                                    leguichet est une plate-forme en ligne à Madagascar pour les billets d'événements sportifs, musicaux, et de divertissement en direct. leguichet vise à fournir aux acheteurs de billets la plus grande sélection de billets possible pour des événements à Madagascar, et aide les vendeurs de billets, des personnes détenant un billet supplémentaire aux grandes organisations événementielles multi-nationales, à atteindre un large public.
                                                    <br>
                                                    
                                                    <br> Pour toute demande client, merci de visiter la section Aide du site internet leguichet.
                                                </label>
                                            </p>

                                            <p onclick="accord42()"><span style="cursor: pointer">Qu'est-ce que la garantie leguichet ?</span>
                                                <br>
                                                <label id="demo42" class="hidden padd">
                                                    Les acheteurs recevront dans tous les cas leurs billets dans les temps avant l'évènement. En cas de problème, leguichet intervient pour proposer des billets de remplacement ou un remboursement.
                                                    <br>
                                                    <br> Les vendeurs sont sûrs d'être payés pour les billets vendus.
                                                </label>
                                            </p>

                                            <p onclick="accord44()"><span style="cursor: pointer">Quelles sont les Termes et Conditions de leguichet ? </span>
                                                <br>
                                                <label id="demo23" class="hidden padd">
                                                Conditions d'utilisation
                                                <br>
                                                <br> PRÉAMBULE

                                                <br>
                                                <br> La société Leguichet, immatriculée à Madagascar, Vous propose sur le site Internet disponible à l’adresse www.leguichet.com un service de mise en relation (ci-après la « Plateforme Leguichet ») entre vendeurs (les « Vendeurs ») de billets de spectacles ou événements sportifs (les « Billets ») et acheteurs (les « Acheteurs ») de ces mêmes Billets. Les Vendeurs et les Acheteurs sont ci-après désignés conjointement les Membres. La Plateforme Leguichet permet la conclusion de contrats de vente des Billets. Toutefois, les Membres sont seuls décisionnaires de la concrétisation de la vente et de l'achat des Billets.
                                                <br>
                                                <br> L'acceptation des présentes Conditions générales d'utilisation de la Plateforme Leguichet par les Membres Vous permet d’accéder à cette plateforme servant à mettre en relation Vendeurs et Acheteurs et à opérer les transactions effectuées sur le site www.Leguichet.com selon les modalités définies ci-après.
                                                <br>
                                                <br> DÉFINITIONS

                                                <br>
                                                <br> Conditions Générales d’Utilisation ou Accord : désigne les présentes conditions générales d’utilisation.
                                                <br>
                                                <br> Plateforme Leguichet : désigne la structure fonctionnelle et organisationnelle mise en place par Leguichet sur le Site permettant la 
                                                mise en relation de Vendeurs et d'Acheteurs de Billets.
                                                <br>
                                                <br> Billet(s) : désigne les billets de spectacle ou d’événements sportifs en Madagascar ou à l’étranger, susceptibles de faire l'objet d'une mise 
                                                en relation par le biais de la Plateforme Leguichet.
                                                <br>
                                                <br> Billet(s) Interdit(s) : désigne les billets de spectacle ou d’événements sportifs dont la vente ne serait pas autorisée en vertu de dispositions 
                                                législatives, réglementaires ou contractuelles. Il s'agit notamment des Billets qui constitueraient des Billets contrefaisants au sens du Code de la
                                                 propriété intellectuelle ou qui seraient vendus en violation de réseaux de distribution sélective ou exclusive, notamment les Billets vendus en violation 
                                                 de l’article 313-6-2 du Code pénal.
                                                <br>
                                                <br> Vendeur(s) : désigne un Membre mettant en vente un Billet sur la Plateforme Leguichet, et éditant à cet effet une Offre de Vente sur le Site, dans le respect des conditions définies à l’article 3.1 des présentes Conditions Générales d’Utilisation.
                                                <br>
                                                <br> Acheteur(s) : désigne un Membre ayant accepté l'offre d'un Vendeur.
                                                <br>
                                                <br> Membre(s) ou Vous : désigne toute personne, Vendeur ou Acheteur, susceptible de faire usage de la Plateforme Leguichet après acceptation des présentes Conditions Générales d’Utilisation. Tout Membre s'engage à fournir des informations exactes quant à son identité, adresse et autres données nécessaires à l'accès à la Plateforme Leguichet et à mettre à jour toute modification concernant ces informations.
                                                <br>
                                                <br> Offre de Vente ou Listing : désigne toute annonce ou offre de vente d’un Billet éditée par un Vendeur sur la Plateforme Leguichet, incluant au moins une description des caractéristiques du Billet proposé à la Vente (date et lieu de la manifestation auquel le Billet donne accès, référence des places ou catégories de places auxquelles le Billet donne accès, etc.) et un Prix de Vente proposé.
                                                <br>
                                                <br> Prix de Vente : désigne le prix proposé par le Vendeur pour son Offre de Vente d'un Billet duquel est déduit la Commission lors de la réalisation d’une vente de Billet.
                                                <br>
                                                <br> Commission : désigne la rémunération perçue par Leguichet sur le Prix de Vente lors de la vente d’un Billet.
                                                <br>
                                                <br> Prix de la Transaction : désigne le prix total payable par l'Acheteur lors de l’achat d’un Billet sur le Site, comportant selon les cas, en plus du Prix de Vente, les frais de réservation, les frais de port définis de façon forfaitaire, la TVA sur l’ensemble des éléments précédents, ou tout autre impôt ou taxe s’appliquant.
                                                <br>
                                                <br> Service(s) : désigne tous les services offerts sur le site www.Leguichet.com.
                                                <br>
                                                <br> Site : désigne le site<a href="www.leguichet.com"> www.Leguichet.com.</a>
                                                <br>
                                                <br> Titulaire des Droits d’Exploitation ou TDE : désigne toute personne responsable, à quelque titre que ce soit, de l’organisation de la manifestation ou du spectacle pour laquelle/lequel un Listing est mis en ligne sur le Site par un Vendeur et disposant en cette qualité de droits d’exploitation sur ladite/ledit manifestation ou spectacle. Cette définition vise notamment, sans que cette liste soit limitative, le producteur, l'organisateur ou le propriétaire des droits d'exploitation de la manifestation ou du spectacle.
                                                
                                               
                                                <br>
                                                <br> 1.1 Introduction : Les présentes Conditions Générales d'Utilisation de la Plateforme Leguichet ont pour objet de définir les modalités de l'accord entre Vous et Nous, les conditions par lesquelles les Membres sont autorisés à utiliser la Plateforme Leguichet aux fins d'opérer leur mise en relation et tous les autres Services que Nous offrons. Par l'utilisation de ce Site et des Services, Vous confirmez accepter cet Accord et l’intégralité de ses termes.
                                                <br>
                                                
                                                <br> 1.3 Commissions et Services : L'inscription, la mise en vente d’un Billet et l'action de se porter acquéreur 
                                                de Billets proposés sur notre Site sont gratuites. Cependant, l'utilisation d'autres Services, tels que l’achat effectif d’un Billet, 
                                                est payante. Lorsque Vous mettez en vente un Billet, Vous avez la possibilité de passer en revue les taux de Commission tels qu’ils sont détaillés 
                                                dans la rubrique « Quels frais de gestion sont déduits du prix de vente » 
                                                . Vous devez accepter ces tarifs pour mettre en ligne votre Offre de Vente. Sauf mention contraire, 
                                                les taux de Commission sont indiqués sous forme de pourcentage du Prix de Vente et sont facturés en AR (Ariary).
                                                <br>
                                                <br> 1.4 Garantie Leguichet : Lorsque Vous achetez des billets sur Leguichet, Leguichet vous garantit que vous recevrez 
                                                les billets achetés à temps pour l'événement. Dans les cas rares où un problème surviendrait et que le vendeur d'origine du billet n’est plus 
                                                en mesure de fournir les billets mis en vente, Leguichet fait , à sa seule et entière discrétion, une recherche de billets de remplacement équivalents 
                                                et Vous les fournit sans coût additionnel. Si Leguichet n'est pas en mesure de trouver et Vous fournir des billets équivalents, un remboursement du coût 
                                                des billets Vous sera proposé. La notion de billets de remplacement équivalents est définie par Leguichet, à sa seule et entière discrétion. Lorsque Vous 
                                                vendez des billets sur Leguichet, Leguichet vous garantit que vous serez payé(e) pour votre vente, à condition que vous fournissiez exactement les mêmes
                                                 billets que ceux que vous avez mis en vente et que l'acheteur des billets ait pu accéder à l'événement.
                                                <br>
                                                <br> 2.1 Conditions requises : Pour être Membre de ce Site, Vous devez accepter les termes de cet Accord. 
                                                Vous pouvez uniquement utiliser les Services si Vous pouvez légalement conclure un contrat et signer des contrats exécutoires, sinon,
                                                 Vous n'êtes pas autorisé à utiliser ces Services. En outre, les Vendeurs doivent être autorisés à mettre en ligne une Offre de Vente 
                                                 et respecter l’ensemble des présentes Conditions Générales d’Utilisation.
                                                <br>
                                                <br> 2.2 Inscription : Nous ne Vous autoriserons pas à acheter ou à vendre des Billets avant que Vous Vous 
                                                soyez inscrits auprès de Nous. Pour cela, Vous devez fournir notamment votre nom, votre adresse, votre numéro 
                                                de téléphone et adresse de courrier électronique. Vous Vous engagez à ce que l’ensemble des informations que Vous Nous fournissez soit exact.
                                                <br>
                                                <br> 2.3 Pseudonyme et mot de passe : Vous aurez besoin d'un pseudonyme et d'un mot de passe pour accéder au Site et en utiliser les Services. 
                                                La sécurité de votre pseudonyme et de votre mot de passe Vous incombe et Vous serez tenu responsable de l’ensemble des actions effectuées sous 
                                                votre pseudonyme et mot de passe. En effet, l’utilisation de votre pseudonyme et de votre mot de passe fera naître une présomption que c’est bien Vous 
                                                qui utilisez les Services.
        
                                                <br>
                                                <br> 2.4 Résolution des litiges : Après réception des billets, si l’Acheteur n’est pas satisfait d’une partie de la commande, 
                                                l’Acheteur devra respecter les règles de résolution des litiges déterminées dans notre Garantie Leguichet. Toute réclamation doit être déposée dans un délai de 14 jours à compter de la réception des Billets, faute de quoi, ces Billets ne seront plus couverts par la Garantie Leguichet. Dans le cas où vous rencontreriez des difficultés à utiliser vos Billets le jour de l’Évènement, vous devrez contacter Leguichet sous 48 heures pour signaler le problème. Vous devrez remplir un Formulaire de Dépôt de Plainte. Seuls les Formulaires dûment complétés pourront faire l’objet d’un remboursement. Les Formulaires devront être renvoyés à Leguichet sous 5 jours ouvrables à compter de leur réception pour pouvoir prétendre à un remboursement. Leguichet se réserve le droit d’interdire tout nouvel accès à son site internet à toute personne déposant plainte de façon abusive.
                                                <br>
                                                
                                                <br> 3.1 Offre de Billets : Pour mettre des Billets en vente, un Vendeur publie une Offre de Vente sur la Plateforme Leguichet. Toute Offre de Vente doit être publiée conformément aux conditions définies ci-dessous, sous peine d’être retirée du Site dans les cas visés aux articles 3.11 et 6.2 des présentes Conditions Générales d’Utilisation.
                                                <br>
                                                <br> Le Vendeur est seul responsable de la licéité de cette Offre de Vente. En particulier, le Vendeur doit s’assurer d’être autorisé à mettre en vente le Billet 
                                                conformément aux lois et règlementations applicables. Leguichet considère qu’un Vendeur est autorisé à mettre en vente un Billet si et seulement s’il rentre dans au
                                                 moins l’une des catégories suivantes : (i) le Vendeur est un Titulaire des Droits d’Exploitation de la manifestation et/ou du spectacle mentionné(s) par le ou les 
                                                 Billets mis en vente, (ii) le Vendeur est expressément autorisé par le Titulaire des Droits d’Exploitation de ladite manifestation et/ou dudit spectacle à vendre ou 
                                                 mettre en vente des Billets pour le compte du Titulaire des Droits d’Exploitation, (iii) Leguichet est autorisée, par le Titulaire des Droits d’Exploitation, à opérer 
                                                 une bourse d’échange de Billets par laquelle les Membres peuvent librement acheter ou vendre de gré à gré des Billets ou (iv) le Vendeur ne met pas en vente à titre 
                                                 habituel des Billets sur la Plateforme Leguichet.
                                                <br>
                                                
                                                <br> Le Vendeur est seul responsable du contenu de cette Offre de Vente. Ainsi, le Vendeur définit seul le Prix et fournit les informations relatives aux Billets, en ce compris, sans que cette liste soit limitative, les informations sur l'événement, la date, la section, la rangée, et la date de clôture de la vente, le tout conformément au processus indiqué dans les pages d'aide du Site.
                                                <br>
                                                <br> Le Vendeur n’est pas autorisé par Leguichet à mettre en vente sur le site des Billets Interdits.
                                                <br>
                                               
                                                <br> 3.2 Tarification : Si un Vendeur met un Billet en vente sur le Site, il doit déterminer seul un prix fixe de vente des Billets.
                                                <br>
                                                <br> 3.3 Authenticité des informations : Pour tous les Billets que Vous mettez en vente en tant que Vendeur, Vous garantissez l'exactitude des renseignements que Vous publiez dans l’Offre de Vente que Vous rédigez. Vous garantissez également que Vous possédez les Billets et que Vous êtes autorisé(e) à les transférer ou à les revendre, conformément aux conditions définies à l’article 3.1. Dans le cas où Vous revendez des Billets à un événement pour des raisons commerciales, Vous garantissez que Vous en avez le droit. Vous garantissez notamment que Vous êtes autorisés à proposer les Billets à la vente au prix que Vous avez fixé.
                                                <br>
                                                <br> Leguichet Vous informe que la publication d’une Offre de Vente en violation des conditions définies dans les présentes Conditions Générales d’Utilisation 
                                                est susceptible d’entraîner des poursuites pénales à l’encontre du Vendeur responsable de ladite publication dans certaines juridictions. Leguichet décline toute 
                                                responsabilité quant à la publication par Vous d’Offres de Vente illicites ou d’Offres de Vente de Billets Interdits, autre que celle qui pourrait lui incomber du fait de son statut d’hébergeur. En mettant en Vente un Billet sur la Plateforme Leguichet et en acceptant à ce titre les présentes Conditions Générales d’Utilisation, Vous garantissez Leguichet contre tout recours, action en justice, dommages-intérêts et tous frais annexes auxquels Leguichet devrait faire face ou qui seraient mis à la charge de Leguichet du fait de Votre publication d’une Offre de Vente illicite sur la Plateforme Leguichet.
                                                <br>
                                            
                                                <br> 3.4 Double publication de vente et retrait des Billets : Afin de mettre un Billet en vente sur le Site, Vous devez d'abord Vous inscrire afin de devenir Membre. Une fois un Billet mis en vente sur le Site, Nous Vous déconseillons de le publier ailleurs.
                                                <br>
                                                <br> Néanmoins, Vous êtes autorisé(e) à mettre votre Billet en vente sur d'autres places de marché, mais Vous devez immédiatement supprimer votre Billet du Site si celui-ci est vendu ailleurs.
                                                <br>
                                                <br> Sauf disposition contraire dans les présentes Conditions Générales d’Utilisation, Vous acceptez de ne pas promouvoir la vente des Billets publiés sur le Site sur tout autre site. Nous Nous réservons le droit d'interdire aux Membres de mettre en vente des Billets sur le Site s'ils ne peuvent pas fournir les mêmes Billets que ceux qu'ils ont mis en vente sur la Plateforme Leguichet.
                                                <br>
                                                <br> 3.5 Confirmation du Vendeur : Le Vendeur doit confirmer la commande dans 48 heures suivants la date de la vente des Billets. Les Vendeurs doivent utiliser notre procédure de confirmation automatisée en ligne. Les Vendeurs pourront s’informer des frais de service et taxes sur nos frais avant d’avoir finalisé la procédure de vente et avant d’avoir mis leurs Billets en vente. Le Vendeur doit envoyer les Billets dès qu’ils sont en sa possession. Le Vendeur doit prévoir assez de temps pour que l’Acheteur reçoive les Billets à temps pour l’événement. En tout état de cause, pour tout événement, le Vendeur doit envoyer les Billets au plus tard sept (7) jours avant l’événement. 
                                                <br>
                                               
                                                <br> 3.6 Retrait d’une Offre de Vente : Leguichet peut, à tout moment et de façon unilatérale, décider de supprimer une Offre de Vente pour la vente de Billets du Site. En effet, en tant qu’hébergeur, Leguichet peut être amené à prendre la décision de supprimer une Offre de Vente du Site lorsque des tiers apportent des éléments démontrant que ladite Offre de Vente contrevient à leurs droits et/ou à la règlementation applicable. La responsabilité de Leguichet ne pourra être engagée à ce titre.
                                                <br>
                                                <br> 3.7 Licence : Lorsque Vous Nous confiez du contenu, Vous Nous concédez le droit non exclusif, international, sans limitation de durée (c'est-à-dire, pour la durée de la protection), irrévocable, exempt de redevance, transférable dans le cadre d'une sous-licence, d'exercer les droits de propriété intellectuelle (nécessaires pour héberger le contenu) que Vous ou d'autres personnes possédez sur le contenu, dans tout média existant ou à venir. En ce qui concerne les droits d’auteurs, Vous Nous concédez les droits de reproduction, de représentation et d’adaptation pour toute utilisation numérique en ligne sur le Site lorsque et au fur et à mesure que Vous postez votre contenu sur le Site.
                                                <br>
                                                <br> Nous pouvons être amenés à Vous proposer des informations génériques pour nourrir votre contenu. Nous Nous efforçons naturellement d’en assurer l’exactitude et l’actualisation. Toutefois, si Vous décidez d’utiliser ces informations, il Vous appartient d’en vérifier l’exactitude et de ne pas inclure d'informations calomnieuses, diffamatoires ou dénigrantes. Vous acceptez de ne pas engager notre responsabilité en cas d’erreur ou d’inexactitude de ces informations. Vous Vous engagez par ailleurs à n’utiliser ces informations que dans le cadre de la rédaction de vos Offres de Vente et d'une manière qui ne porte pas atteinte aux droits de propriété d'un tiers.
                                                <br>
                                                <br> En plaçant une « offre » d’achat, Vous, en tant qu'Acheteur, octroyez à Leguichet le droit de débiter du Prix de la Transaction votre carte de crédit ou de débit, votre compte mobile ou votre compte bancaire pour l'achat des Billets choisis.
                                                <br>
                                                <br> 4.2 Changement de places : Les Billets mis en vente sont une représentation de la place réelle. Il est possible que ces Billets soient échangés contre des places comparables ou mieux situées après approbation de l'Acheteur.
                                                <br>
                                                <br> 4.3 Informations sur les Billets : Les dates d'événements, les horaires, les lieux et l'objet des événements qui sont indiqués sur les Billets peuvent être sujets à changement. L'Acheteur se doit de vérifier les informations officielles les plus récentes en contactant la billetterie, les caisses, le bureau de location ou bien l’organisateur de l’événement pour tout changement.
                                                <br>
                                                <br> 5.1 Paiement : Dès présentes Conditions Générales d’Utilisation, en cas de paiement par carte de crédit ou de débit, Nous obtenons une autorisation de prélèvement auprès de l’émetteur de la carte de crédit ou de débit de l'Acheteur équivalente au Prix de la Transaction. L'autorisation restera valable jusqu'à ce que la vente soit exécutée ou la commande annulée.
                                                <br>
                                                
                                                <br> En cas de paiement par virement bancaire, Nous vérifierons la validité du compte bancaire émetteur du virement.
                                                <br>
                                                
                                                <br> 5.3 Collecte du paiement : Après confirmation de l'envoi des Billets par le Vendeur, Nous recueillons le paiement auprès de l'Acheteur correspondant au Prix de la Transaction. Nous ne fournissons jamais les informations de règlement de l'Acheteur au Vendeur. Nous percevons le paiement et le Vendeur est ensuite payé conformément au mode de paiement qu'il aura choisi et à notre politique de paiement indiquée dans les pages d'aide du Site.
                                                <br>
                                                <br> 6.1 Enquêtes : Nous pouvons être amenés à effectuer une enquête à la suite de plaintes et de violations de nos Conditions Générales d’Utilisation. Vous acceptez de coopérer pleinement, y compris, notamment, de Nous fournir des informations spécifiques sur vos droits concernant un Billet, son origine, votre acquisition d'un Billet et le prix que Vous avez payé pour ce Billet.
                                                <br>
                                                <br> 6.2 Violations, résiliation et suspension : Des actions pourront être prises si Nous les jugeons appropriées, Nous pourrons également, sans toutefois s'y limiter, émettre un avertissement, suspendre ou clore un service, refuser un accès, supprimer une offre ou Vous conseiller de modifier une Offre de Vente. Vous acceptez que les paiements qui Vous sont dus à la suite de ventes effectuées par l'intermédiaire de ce Site puissent être suspendus ou retardés. Leguichet ne sera pas obligé de Vous payer toute vente si Nous suspectons que cette vente a été illégale ou exécutée en violation de cet Accord. Lors de la clôture de votre compte, vos Offres de Vente seront supprimées du Site si Vous êtes un Vendeur et vos achats seront annulés si Vous êtes un Acheteur.
                                                <br>
                                                <br> 6.3 Divulgation d'informations : Vous acceptez que Leguichet fasse état, aux autorités règlementaires, aux autorités de régulation et/ou à tout tiers compétent, de toute activité dont elle soupçonne qu’elle constitue une violation à la loi. Leguichet coopérera afin de garantir que les auteurs de violations soient poursuivis conformément à la loi.
                                                <br>
                                                <br> 6.4 Exécution d'ajustements : Vous Nous autorisez à différer le paiement ou à débiter votre carte de crédit ou de débit, ou votre compte mobile, dans le cadre de l’autorisation de prélèvement que Vous Nous accordez, de tout montant que Vous Nous devrez si (a) un ajustement est effectué du fait de l’exécution de notre garantie Leguichet ; (b) Nous soupçonnons qu’une fraude ou un autre acte illégal a été commis lors des activités de vente ou d'achat et si une autorité compétente Nous fait la demande de différer le paiement ou de débiter votre moyen de paiement à titre provisoire ; (c) Vous ne livrez pas les mêmes Billets que ceux que Vous avez mis en vente sur le Site et dont la transaction a été confirmée ; (d) Vous adressez des objets promotionnels à un Acheteur ; ou (e) si Vous Nous devez de l'argent. Si l'une des situations citées devait se produire, Nous Nous réservons le droit de déduire de votre paiement le montant que Vous Nous devez.
                                                <br>
                                                <br> 7.1 Non garantie : À l'exception des garanties explicites déclarées dans cet Accord, Leguichet fournit les logiciels, le Site et les Services « tels qu'ils sont présentés » et « selon leur disponibilité » sans aucune garantie de quelque sorte que ce soit. Leguichet n'offre aucune garantie concernant ses logiciels, les Billets, les événements, les Services que Leguichet offre, ou la bonne exécution des promesses des Vendeurs ou des Acheteurs au-delà des garanties légales telles que prévues par les textes applicables. En particulier, Leguichet décline toute garantie, qu'elle soit explicite, obligatoire ou implicite, y compris et sans réserve(s), les garanties de qualité, de titre, de non violation des droits de tiers, etc. autant que la réglementation applicable le permet.
                                                <br>
                                                <br> 7.2 Renonciation des dommages indirects/limite de responsabilité : Sauf dans le cas où elle aurait été dûment informée de l’existence d’un contenu illicite au sens de la législation en vigueur, et n’aurait pas agi promptement pour le retirer, Leguichet ne peut pas être tenue pour responsable ni du contenu ou des actions (ou absence d'action) des Membres, ni des Billets qu'ils mettent en vente. Leguichet décline expressément toute responsabilité pour toute perte de profits, y compris, sans toutefois s'y limiter, tous dommages-intérêts particuliers ou exemplaires, tous dommages indirects ou tous dommages accessoires pouvant résulter des Services, du Site ou de la suspension, de la clôture ou du mauvais fonctionnement des Services ou du Site. La responsabilité de Leguichet envers Vous ou quiconque en toute circonstance, se limite au plus petit des deux montants suivants : (a) 200 €, et (b) la valeur totale de tous les Billets et autres articles que Vous avez achetés et/ou vendus par l'intermédiaire de Leguichet au cours de l'action ayant prétendument engendré la responsabilité. En aucun cas Leguichet ne saurait être tenue responsable de coûts supplémentaires encourus par votre achat de Billets auprès d'un tiers en contrepartie de Billets que Vous n'avez pas pu acheter sur le Site.
                                                <br>
                                                <br> 7.3 Enchères : Vous reconnaissez que Nous ne sommes pas une société de ventes aux enchères publiques. Au contraire, le Site est un lieu d'échange dont l'objet est de permettre à n'importe qui, n'importe où et n'importe quand, d'offrir, de vendre ou d'acheter des Billets.
                                                <br>
                                                <br> 7.4 Renonciation : Vous reconnaissez expressément que Leguichet n’est pas impliquée dans les transactions réelles entre les Acheteurs et les Vendeurs. En cas de litige avec un ou plusieurs Membres, sauf dans le cas où Leguichet aurait été dûment informée de l’existence d’un contenu illicite au sens de la législation en vigueur, et n’aurait pas agi promptement pour le retirer, Vous Nous dégagez de toute responsabilité (ainsi que nos administrateurs, directeurs, agents, sociétés liées et associées, joint ventures et employés) pour toute réclamation et tout dommage (présent ou futur) de tout type ou nature, connu ou non, résultant de manière directe ou indirecte de ces litiges.
                                                <br>
                                                
                                                <br> 7.5 Indépendance des parties : Vous et Leguichet êtes des parties indépendantes, et aucune agence, aucun partenariat, aucune co-entreprise, aucune relation employeur-employé ou franchiseur-franchisé n'est voulu ou créé par cet Accord.
                                                <br>
                                                <br> 7.6 Informations provenant de tiers : Nous ne contrôlons pas les informations fournies sur ce Site par des utilisateurs ou les Membres. Il est possible que Vous trouviez que les informations provenant de tiers soient préjudiciables, inexactes ou décevantes. Veuillez faire preuve d'attention lorsque Vous utilisez le Site et n'oubliez pas la présence de risques d'escroquerie. Lorsque Vous utilisez ce Site, Vous reconnaissez ces risques et acceptez que Leguichet ne pourra être tenue responsable des actes ou omissions des utilisateurs du Site ni des Membres.
                                                <br>
                                                <br> 7.7 Toutes les ventes sont irrévocables : Toutes les ventes sont irrévocables. Une fois la commande validée, aucun remboursement, aucune annulation ou aucun échange (pour des dates ou horaires différents), ne sera possible.
                                                <br>
                                              
                                                <br> Si, pour une quelconque raison, Vous ne voulez plus les Billets que Vous avez commandés, Nous Vous invitons à les revendre sur notre Site. Pour en savoir plus sur la mise en vente de Billets sur Leguichet, rendez-Vous sur <a href="#">www.Leguichet.com</a>
                                                <br>
                                                <br> 7.8 Modification ou suspension du Site : Leguichet se réserve le droit à tout moment de modifier ou d'arrêter, temporairement ou de manière permanente, le Site ou toute partie du Site avec ou sans préavis. Vous acceptez, dans le cadre de cet Accord, que Nous ne pourrons être tenus responsables envers Vous ou tout tiers de toute modification, suspension ou arrêt du Site ou de quelconque de ces Services, pour quelque raison que ce soit. Nous ne garantissons pas un accès continu, ininterrompu ou sûr à nos Services, et le fonctionnement de notre Site peut être altéré à cause de nombreux facteurs hors de notre contrôle. En outre, il est possible que le Site ne soit pas disponible pendant certaines périodes car il peut être mis à jour ou modifié. Le Site, pendant cette période, sera temporairement indisponible.
                                                <br>
                                                <br> 7.9 Avis : Sauf indication explicite contraire de la part de Leguichet, tous les avis et notification que Vous souhaitez adresser à Leguichet doivent être envoyés par l'intermédiaire du formulaire de courrier électronique mis à disposition sur le Site sous le lien Contactez-nous. Notre adresse postale est 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                                <br>
                                                <br> Sauf indication explicite contraire, tous les avis et notification que Nous souhaitons Vous adresser seront envoyés à l'adresse email que Vous Nous aurez fournie lors du processus d'inscription à notre Site. Il sera considéré que l'avis aura été soumis un jour ouvrable après l'envoi de l'email.
                                                <br>
                                                <br> 8.1 Règlement des litiges : Si, après avoir reçu les Billets, un Acheteur n'était pas satisfait d’une quelconque étape de l'achat, il devra suivre les procédures de recours indiquées dans la garantie Leguichet.
                                                <br>
                                                <br> 8.2 Droit de propriété intellectuelle : Vous reconnaissez et acceptez que (i) nos brevets, marques commerciales, appellations commerciales, marques de service, copyrights et autres droits de propriété intellectuelle (collectivement « la propriété intellectuelle ») sont et doivent être notre unique propriété, et que (ii) rien dans cet Accord ne Vous confère de droits de propriété ou de droits de licence dans notre propriété intellectuelle. Par ailleurs, Vous ne devez ni à présent, ni à l'avenir, contester la validité de la propriété intellectuelle de Leguichet.
                                                <br>
                                                <br> 8.3 Copyright : Copyright © Leguichet 2017. Les logiciels et le Site, y compris notamment, tous les textes, tous les graphiques, tous les logos, tous les boutons, toutes les images, tous les clips audio, et tous les programmes informatiques, constituent la propriété de Leguichet ou de ses fournisseurs, et ils sont protégés par les lois internationales et nationales sur le copyright, la marque de commerce ou d'autres lois sur la propriété intellectuelle. La compilation (c'est-à-dire la collecte, l'organisation et l'assemblage) de tout le contenu du Site est réservée exclusivement à Leguichet et elle est protégée par les lois internationales et nationales sur le copyright. La reproduction, la modification, la distribution, la transmission, la réédition, l'affichage ou l'exécution des logiciels ou du contenu du Site sont strictement interdits.
                                                <br>
                                                <br> 8.4 Contrats supplémentaires : Cet Accord intègre par référence les contrats et documents suivants également inclus au Site:
                                                <br>
                                                <br> Protection de vos informations personnelles
                                                <br>
                                                <br> 8.5 Loi applicable : Cet Accord est régi par et doit être interprété conformément aux lois de l'Etat du Delaware des Madagascar d’Amérique. Vous consentez à la juridiction non-exclusive et personnelle des tribunaux du Delaware. Leguichet Entertainment Inc est enregistrée au Delaware à l’adresse suivante: 160 Greentree Drive, Suite 101, Dover, Delaware, Country of Kent, 19904, Madagascar d’Amérique.
                                                <br>
                                                
                                                <br> 8.7 Divers : Cet Accord (et tous les documents incorporés par référence) constitue l'intégralité de l'accord entre Vous et Nous et supplante tous les accords et toutes les conventions antérieures, écrits ou oraux, entre ces parties. Aucun amendement, aucune modification ou aucun ajout aux clauses de cet Accord ne sera valide ou en vigueur à moins qu'il n'ait été effectué conformément aux conditions explicites de cet Accord. Si une quelconque clause de cet Accord est jugée invalide ou inapplicable dans quelque circonstance que ce soit, son application dans toute autre circonstance ainsi que les autres clauses de cet Accord ne devront pas être affectées. Vous n'êtes pas autorisé(e) à céder ou à transférer cet Accord, ou ses droits ou obligations, sans approbation écrite préalable de Leguichet, qui se réserve le droit de refuser une telle approbation. Rien dans cet Accord n'a pour objet de conférer des droits ou des voies d’action à quiconque ou à toute entité autre que les parties du présent Accord et à leurs successeurs ou ayants droit. Nos fournisseurs et nos partenaires sont des bénéficiaires tiers de cet Accord. Cela ne Nous empêche pas de modifier ces termes sans y faire référence. Les titres des paragraphes de cet Accord ont uniquement valeur de référence et ne définissent, ne limitent, n'interprètent ou ne décrivent en aucun cas la portée ou l'étendue de ces paragraphes.
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        </div>

        <!-- End Page -->

    </section>
@endsection
@section('specificScript')
<script type="text/javascript">
    function accord() {
        if ($('#demo').hasClass('hidden')) {
            $('#demo').removeClass('hidden');
        } else {
            $('#demo').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord1() {
        if ($('#demo1').hasClass('hidden')) {
            $('#demo1').removeClass('hidden');
        } else {
            $('#demo1').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord2() {
        if ($('#demo2').hasClass('hidden')) {
            $('#demo2').removeClass('hidden');
        } else {
            $('#demo2').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord3() {
        if ($('#demo3').hasClass('hidden')) {
            $('#demo3').removeClass('hidden');
        } else {
            $('#demo3').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord4() {
        if ($('#demo4').hasClass('hidden')) {
            $('#demo4').removeClass('hidden');
        } else {
            $('#demo4').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord5() {
        if ($('#demo5').hasClass('hidden')) {
            $('#demo5').removeClass('hidden');
        } else {
            $('#demo5').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord6() {
        if ($('#demo6').hasClass('hidden')) {
            $('#demo6').removeClass('hidden');
        } else {
            $('#demo6').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord7() {
        if ($('#demo7').hasClass('hidden')) {
            $('#demo7').removeClass('hidden');
        } else {
            $('#demo7').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord8() {
        if ($('#demo8').hasClass('hidden')) {
            $('#demo8').removeClass('hidden');
        } else {
            $('#demo8').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord9() {
        if ($('#demo9').hasClass('hidden')) {
            $('#demo9').removeClass('hidden');
        } else {
            $('#demo9').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord10() {
        if ($('#demo10').hasClass('hidden')) {
            $('#demo10').removeClass('hidden');
        } else {
            $('#demo10').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord11() {
        if ($('#demo11').hasClass('hidden')) {
            $('#demo11').removeClass('hidden');
        } else {
            $('#demo11').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord12() {
        if ($('#demo12').hasClass('hidden')) {
            $('#demo12').removeClass('hidden');
        } else {
            $('#demo12').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord13() {
        if ($('#demo13').hasClass('hidden')) {
            $('#demo13').removeClass('hidden');
        } else {
            $('#demo13').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord14() {
        if ($('#demo14').hasClass('hidden')) {
            $('#demo14').removeClass('hidden');
        } else {
            $('#demo14').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord15() {
        if ($('#demo15').hasClass('hidden')) {
            $('#demo15').removeClass('hidden');
        } else {
            $('#demo15').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord16() {
        if ($('#demo16').hasClass('hidden')) {
            $('#demo16').removeClass('hidden');
        } else {
            $('#demo16').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord17() {
        if ($('#demo17').hasClass('hidden')) {
            $('#demo17').removeClass('hidden');
        } else {
            $('#demo17').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord18() {
        if ($('#demo18').hasClass('hidden')) {
            $('#demo18').removeClass('hidden');
        } else {
            $('#demo18').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord19() {
        if ($('#demo19').hasClass('hidden')) {
            $('#demo19').removeClass('hidden');
        } else {
            $('#demo19').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord20() {
        if ($('#demo20').hasClass('hidden')) {
            $('#demo20').removeClass('hidden');
        } else {
            $('#demo20').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord21() {
        if ($('#demo21').hasClass('hidden')) {
            $('#demo21').removeClass('hidden');
        } else {
            $('#demo21').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord22() {
        if ($('#demo22').hasClass('hidden')) {
            $('#demo22').removeClass('hidden');
        } else {
            $('#demo22').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord23() {
        if ($('#demo23').hasClass('hidden')) {
            $('#demo23').removeClass('hidden');
        } else {
            $('#demo23').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord24() {
        if ($('#demo24').hasClass('hidden')) {
            $('#demo24').removeClass('hidden');
        } else {
            $('#demo24').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord25() {
        if ($('#demo25').hasClass('hidden')) {
            $('#demo25').removeClass('hidden');
        } else {
            $('#demo25').addClass('hidden');
        }
    }

</script>
<script type="text/javascript">
    function accord26() {
        if ($('#demo26').hasClass('hidden')) {
            $('#demo26').removeClass('hidden');
        } else {
            $('#demo26').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord27() {
        if ($('#demo27').hasClass('hidden')) {
            $('#demo27').removeClass('hidden');
        } else {
            $('#demo27').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord28() {
        if ($('#demo28').hasClass('hidden')) {
            $('#demo28').removeClass('hidden');
        } else {
            $('#demo28').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord29() {
        if ($('#demo29').hasClass('hidden')) {
            $('#demo29').removeClass('hidden');
        } else {
            $('#demo29').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord30() {
        if ($('#demo30').hasClass('hidden')) {
            $('#demo30').removeClass('hidden');
        } else {
            $('#demo30').addClass('hidden');
        }
    }
</script>

<script type="text/javascript">
    function accord31() {
        if ($('#demo31').hasClass('hidden')) {
            $('#demo31').removeClass('hidden');
        } else {
            $('#demo31').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord32() {
        if ($('#demo32').hasClass('hidden')) {
            $('#demo32').removeClass('hidden');
        } else {
            $('#demo32').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord33() {
        if ($('#demo33').hasClass('hidden')) {
            $('#demo33').removeClass('hidden');
        } else {
            $('#demo33').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord34() {
        if ($('#demo34').hasClass('hidden')) {
            $('#demo34').removeClass('hidden');
        } else {
            $('#demo34').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord35() {
        if ($('#demo35').hasClass('hidden')) {
            $('#demo35').removeClass('hidden');
        } else {
            $('#demo35').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord36() {
        if ($('#demo36').hasClass('hidden')) {
            $('#demo36').removeClass('hidden');
        } else {
            $('#demo36').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord37() {
        if ($('#demo37').hasClass('hidden')) {
            $('#demo37').removeClass('hidden');
        } else {
            $('#demo37').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord38() {
        if ($('#demo38').hasClass('hidden')) {
            $('#demo38').removeClass('hidden');
        } else {
            $('#demo38').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord39() {
        if ($('#demo39').hasClass('hidden')) {
            $('#demo39').removeClass('hidden');
        } else {
            $('#demo39').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord40() {
        if ($('#demo40').hasClass('hidden')) {
            $('#demo40').removeClass('hidden');
        } else {
            $('#demo40').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord41() {
        if ($('#demo41').hasClass('hidden')) {
            $('#demo41').removeClass('hidden');
        } else {
            $('#demo41').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord42() {
        if ($('#demo42').hasClass('hidden')) {
            $('#demo42').removeClass('hidden');
        } else {
            $('#demo42').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord43() {
        if ($('#demo43').hasClass('hidden')) {
            $('#demo43').removeClass('hidden');
        } else {
            $('#demo43').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord44() {
        if ($('#demo44').hasClass('hidden')) {
            $('#demo44').removeClass('hidden');
        } else {
            $('#demo44').addClass('hidden');
        }
    }
</script>
<script type="text/javascript">
    function accord45() {
        if ($('#demo45').hasClass('hidden')) {
            $('#demo45').removeClass('hidden');
        } else {
            $('#demo45').addClass('hidden');
        }
    }
</script>
@endsection