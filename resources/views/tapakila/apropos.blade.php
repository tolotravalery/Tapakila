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
            <div class="col-md-12">
                <div class="about-bg">
                    <img src="{{url('/')}}/public/img/aboutus.png">
                    <h3>QUI SOMMES-NOUS ?</h3>
                    <p style="text-align: justify;">Leguichet.mg est un service de réservation indépendante proposant un accès exclusif aux meilleures manifestations culturelles ou sportives à Madagascar.</p>
                    <p style="text-align: justify;">Ressentir le public, vibrer avant les premières notes, vivre intensément un moment unique, il y a tout ceci et plus dans un évènement live. Mais tout commence avec l’achat d’un billet et malheureusement, cette étape est bien trop souvent synonyme de frustration pour le consommateur. Entre la cohue des mises en vente, les arnaques, le manque d’informations, ou encore le marché noir, il est bien souvent difficile de se procurer des places pour une manifestation culturelle dans de bonnes conditions.</p>
                    <p style="text-align: justify;">La recette est simple : une équipe de passionnés et un service client aux petits soins. Tous nos billets sont authentiques,ngarantis, et expédiés  en temps réel. Vous pouvez enfin assister aux évènements qui comptent pour vous, en toute sérénité.</p>

                    <h3>ORGANISATEURS D'ÉVÈNEMENTS</h3>
                    <p style="text-align: justify;">Vous souhaitez distribuer vos billets via un canal de distribution innovant, et assurer une expérience optimale à vos clients? Vous avez frappé à la bonne porte. Voir Foires aux questions en bas de page</p>
                

                    <h3>ACHETEURS</h3>
                    <p style="text-align: justify;"><b>Quand vous achetez vos billets sur Leguichet, vous profitez des avantages suivants :</b></p>
                    <ul>
                        <li>	La garantie 100% en cas d’annulation de l’évènement par l’organisateur</li>
                        <li>	Un paiement en ligne sécurisé</li>
                        <li>	Billet disponible sur votre boîte mail et sur votre compte leguichet.mg</li>
                        <li>	La possibilité de commander au dernier moment
                        </li>
                       
                    </ul>
                </div>
            </div>

            
        </div>
    </div>
@endsection