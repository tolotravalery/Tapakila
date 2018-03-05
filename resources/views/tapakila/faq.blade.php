@extends('template')
@section('title')
    <title>Le Guichet | FAQ</title>
@endsection
@section('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/public/css/styles.css">
@endsection
@section('content')
    <section id="sectioncategorie" class="clearfix">
        <div class="container custom-container">
            <ul class="clearfix">
                <li><a href="{{url('/')}}">accueil</a></li>
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
                                                    <br> 3 - Sélectionez la quantité de billet désirée
                                                    <br>
                                                    <br> 4 - Choisissez vos billets parmi les listes disponibles
                                                    <br>
                                                    <br> 6 - Suivez les différentes étapes – vérifiez que votre adresse email, numéro de téléphone sont corrects
                                                    <br>
                                                    <br> 7 - Vérifiez les détails de votre commande pour vous assurer que tout vous convient
                                                    <br>
                                                    <br> 8 - Choisissez un mode de paiement, mvola ou orange money
                                                    <br>
                                                    <br> 9 - Achetez vos billets!
                                                    <br>

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
                                                    Vous devriez recevoir vos billets électroniques immédiatement après le paiement via email.

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
                                                    La pièce jointe attachée à votre email de confirmation de votre achat est tout de suite téléchargeable en appuyant sur un bouton.Si vous n'avez pas de logiciel pour lire le PDF <a href="https://get.adobe.com/fr/reader/" target="_blank" style="color:#d70506">cliquez ici</a>
                                                </label>
                                            </p>

                                           

                                            <p onclick="accord8()"><span style="cursor: pointer">Puis-je retirer mes billets le jour de l'évènement plutôt que de les recevoir par courrier ?</span>
                                                <br>
                                                <label id="demo8" class="hidden padd">
                                                    Non, vous ne le pouvez pas. L'envoi d'un billet est programmé automatiquement et il est unique
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
                                                    Il n'est pas possible d'annuler les billets une fois acheté.

                                                </label>
                                            </p>

                                            <p onclick="accord12()"><span style="cursor: pointer">Mon événement a été annulé ou reprogrammé - Que dois-je faire? </span>
                                                <br>
                                                <label id="demo12" class="hidden padd">
                                                    Dans l'éventualité où votre événement serait annulé ou reporté, soyez assuré(e) que nous vous recontacterons dans les plus brefs délais avec les instructions données par les organisateurs.
                                                    <br>

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
                                                    Les paiements se fait par Mvola et Orange money .
                                                    <br>
                                                    <br> Les options de paiement disponibles seront indiquées lors du processus de paiement.
                                                </label>
                                            </p>

                                            <p onclick="accord14()"><span style="cursor: pointer">Mon paiement a été refusé</span>
                                                <br>
                                                <label id="demo14" class="hidden padd">

                                                    Si votre paiement a été refusé, nous vous suggérons de procéder aux vérifications suivantes:
                                                    <br>
                                                        Vérifiez votre numéro de téléphone et le numéro de transaction.
                                                    <br>
                                                   

                                                </label>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div role="tab" id="header-4" class="panel-heading">
                                        <h4 class="panel-title">
                                            <a aria-controls="collapse-4" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-4" role="button" class="collapsed">Gérer mon Compte</a></h4>
                                    </div>

                                    <div id="collapse-4" role="tabpanel" aria-labelledby="header-4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">

                                            <p onclick="accord16()"><span style="cursor: pointer">Comment modifier les informations de mon compte</span>
                                                <br>
                                                <label id="demo16" class="hidden padd">
                                                    En haut à droite de votre page cliquer sur "<a href="{{url('/home')}}" style="color:#d70506"> mon compte </a>" pius allez sur "modifier mes informations" ensuite cliquer sur le bouton " Modifier " pour valider vos modifications.

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
                                                   Leguichet est une plateforme en ligne à Madagascar pour les billets d'événements sportifs, musicaux, et de divertissement en direct. Leguichet vise à fournir aux acheteurs la plus grande sélection de billets possibles pour des événements à Madagascar, et aide les vendeurs à atteindre un large public.
                                                    <br>

                                                    <br> Leguichet est en partenariat avec un grand nombre de personnes les plus éminentes dans le sport et le divertissement, et a aidé des clients venant de presque tous à Madagascar à avoir accès à des billets éléctroniques .

                                                    <br>
                                                    <br> Pour toutes informations supplémentaires, contactez-nous via le lien "nous contacter" en bas de page.
                                                </label>
                                            </p>

                                            <p onclick="accord21()"><span style="cursor: pointer"> Que garantie leguichet?</span>
                                                <br>
                                                <label id="demo21" class="hidden padd">
                                                   Les acheteurs recevront immédiatement leurs billets. En cas de problème, leguichiet interviendra.
                                                    <br>
                                                    <br> Les vendeurs n'ont rien à craindre pour leur paiement.
                                                </label>
                                            </p>

                                            <p onclick="accord22()"><span style="cursor: pointer">Que recouvrent les frais leguichet ?</span>
                                                <br>
                                                <label id="demo22" class="hidden padd">
                                                    Acheteur : leguichet facture des frais de service venant s'ajouter au prix du billet. Ces frais sont indiqués clairement au cours du processus de paiement et ils servent à couvrir les frais de gestion de la plate-forme Leguichet, du service client et d'envoi des billets.
                                                    <br>
                                                    <br> Vendeurs : leguichet facture des frais de service sur la vente de vos billets. Ces frais sont indiqués clairement au cours du processus de vente et ils servent à couvrir les frais de marketing permettant de mettre vos billets à disposition de millions d'acheteurs potentiels dans tout Madagascar. Ces frais seront déduits de votre paiement.
                                                    <br>
                                                    <br> Veuillez noter que le montant des frais de service peut varier selon l'événement et sont assujettis à la TVA.
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

                                                    leguichet autorise la mise en vente de billets sur sa plateforme.<br><br>

                                                   Cliquez sur le bouton "Ajouter votre événement" en haut, à droite de la page d'accueil puis suivez scrupuleusement les étapes indiquées dans le site ensuite vérifiez et confirmer votre annonce pour le mettre en ligne.  <br><br>

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
                                    <div role="tab" id="header-8" class="panel-heading">
                                        <h4 class="panel-title"><a aria-controls="collapse-8" aria-expanded="false" data-parent="#1" data-toggle="collapse" href="#collapse-8" role="button" class="collapsed">Méthode de paiement</a></h4>
                                    </div>

                                    <div id="collapse-8" role="tabpanel" aria-labelledby="header-8" id="accordion" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <p onclick="accord34()"><span style="cursor: pointer">Comment modifier la méthode de paiement?</span>
                                                <br>
                                                <label id="demo34" class="hidden padd">
                                                    Votre paiement se fait par le numéro Mvola ou Orange money que vous avez indiqué lors de votre inscription sur le site. Pour le modifier, veuillez changer  l'information dans votre profil.
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
                                                    En haut à droite de votre page cliquer sur "<a href="{{url('/home')}}" style="color:#d70506"> mon compte </a>" pius allez sur "modifier mes informations" ensuite cliquer sur le bouton " Modifier " pour valider vos modifications.
                                                </label>
                                            </p>

                                            <p onclick="accord38()"><span style="cursor: pointer">Comment réinitialiser mon mot de passe ?</span>
                                                <br>
                                                <label id="demo38" class="hidden padd">
                                                    Cliquez sur le lien <a href="{{ route('password.request') }}" style="color:#d70506">"Modifier mes informations"</a> 
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
                                                    Leguichet est une plateforme en ligne à Madagascar pour les billets d'événements sportifs, musicaux,
                                                     et de divertissement en direct. Leguichet vise à fournir aux acheteurs la plus grande sélection de billets possibles
                                                     pour des événements à Madagascar, et aide les vendeurs à atteindre un large public
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