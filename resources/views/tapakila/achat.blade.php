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
    <div class="container custom-container">
        <div class="row performe">
            <div class="col-md-12">
                <div class="about-bg">
                    <!-- QU'EST-CE QU'UN E-TICKET ? -->
                    <h4><strong>Qu'est-ce qu'un billet électronique ?</strong></h4>
                    <p> Un billet éléctronique (ou numerique) est un billet consultable via un ordinateur ou un smartphone.
                        Il contient un QRCode(image codée) unique et ce dernier ne peut être scanné qu'avec un appareil ou un lecteur spécial.
                        Vous pouvez imprimer le billet sur un papier blanc vierge ou le laisser dans votre email et le présenter au guichet via votre smartphone le moment venu.</p><br>
                    <img src="{{url('/')}}/public/img/guide.png"><br>

                    <!-- QUEL EST L'AVANTAGE PRINCIPAL DU E-TICKET ? -->
                    <h4><strong>Quel est l'avantage principal du billet électronique?</strong></h4>
                    <p>Vous pouvez achetter vos billets n'importe où,  il vous faut juste un smartphone et connexion et faire quelques clics. Vous recevez vos billets quelques secondes après validation de votre achat.</p>
                    <br>



                    <!-- PUIS-JE IMPRIMER AUTANT DE CHOIX QUE JE VEUX MES E-TICKET ? -->
                    <h4><strong>Puis-je imprimer autant de fois que je veux mon billet électronique ?</strong></h4>
                    <p>Oui. Sachez toutefois que seule la première copie de votre billet électronique présentée au
                        lecteur de QRCode  donnera accès à la salle.</p>
                    <br>

                    <!-- DOIS-JE AVOIR UNE IMPRIMANTE COULEUR ? -->
                    <h4><strong>Dois-je avoir une imprimante couleur ?</strong></h4>
                    <p>Vous pouvez imprimer votre billet électronique sur une imprimante couleur ou noir et blanc.
                     </p>
                    <br>

                    <!-- COMMENT S'EFFECTUE LE CONTRÔLE A L'ENTRÉE DE LA SALLE ? -->
                    <h4><strong>Comment s'effectue le contrôlle à l'entrée de la salle ?</strong></h4>
                    <p>Chaque billet possède un QRCode unique qui sera scanné par un contrôleur à l'entrée de la salle afin de vérifié s'il est valide ou non. </p>
                    <p> Seule la première copie de votre billet.</p>
                    
                    <br>





                    <!-- QUELLES SONT LES CONDITIONS D'IMPRESSION ET DE VALIDITÉ DU E-TICKET ? -->
                    <h4><strong>Quelles sont les conditions d'impression et de validité du billet électronique?</strong></h4>
                    <p>
                        Le billet doit être imprimé sur papier blanc et vierge pour que le QrCode soit bien visible et lisible par le lecteur de QrCode.
                    </p>
                    <br>

                    <!--  GUIDE -->

                

                  
                    <!-- Pourquoi choisir le e-billet ? -->
                    <!-- <h5><strong>Pourquoi choisir le e-billet ?</strong></h5>
                    <img src="{{url('/')}}/public/img/ebillet.png"> -->

                </div>
            </div>


        </div>
    </div>
@endsection