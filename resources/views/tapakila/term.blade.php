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
                    <p style="text-align: justify;">En accédant et/ou en utilisant ce site Web, vous acceptez de vous conformer et d'être lié par les Conditions d'Utilisation figurant ci-dessous. Ces Conditions d'Utilisation peuvent faire 
                    l'objet de modifications et nous vous invitons dès lors à vérifier régulièrement leur contenu afin de prendre connaissance des modifications éventuelles. </p>
                    <p style="text-align: justify;"><b>Editeur du site Web.</b> Le présent site Web est édité par leguichet.mg, dont le siège social est à Mahamasina. </p>
                    <p style="text-align: justify;"><b>Contenu de ce site Web.</b>. Ce site Web fournit principalement des informations sur des sujets liés aux évènements se passant au coin du monde,
                        liés à la :</p><br>
                    <p style="text-align: justify;"><b>Conditions générales d'utilisation du site Web par les
                            utilisateurs.</b>L'utilisateur s'engage à ne pas utiliser ce site Web ou l'un des services associés dans un but commercial sans 
                            l'autorisation préalable et écrite de leguichet.mg. Egalement, il s'engage à ne pas collecter, ni recueillir des données à caractère personnel sur
                             tout autre utilisateur du site Web ou de tout service associé, telles que leurs adresses emails, sans avoir obtenu leur consentement préalable.
                              Par ailleurs, il est interdit de télécharger ou de réutiliser des parties substantielles du site Web, ou d'en télécharger ou d'en réutiliser 
                              systématiquement ou régulièrement des parties moins substantielles. Egalement, il est interdit de diffuser des
                             virus ou toute autre technologie susceptible de porter préjudice au bon fonctionnement de ce site Web ainsi qu'aux intérêts des autres utilisateurs. </p><br>
                    <p style="text-align: justify;"><b>Informations publiées par des utilisateurs. </b>
                    L’organisateur qui est également l'auteur d'un contenu qu'il a décidé de diffuser sur ce site Web dans la rubrique
                     " Ajouter un évènement " (que ce soit notamment sous forme de texte, de photographies et/ou de vidéos) (ci-après le " Contenu de Tiers ")
                      est seul responsable de ce qu'il décide de publier. Il s'engage à respecter strictement toutes les lois et réglementations applicables et, 
                      par conséquent, s'interdit de publier, de manière non exhaustive, des propos diffamatoires, injurieux, insultants, racistes, obscènes, 
                      ou tout autre contenu préjudiciable aux droits de tiers (en ce compris les droits de propriété intellectuelle s'il ne dispose pas des autorisations 
                      nécessaires des titulaires de droits correspondants), etc. 
                    Il s'engage, plus particulièrement, à ce que chaque personne représentée ait donné son accord pour l'utilisation et la diffusion de son image. </p><br>
                    <p style="text-align: justify;">Le Contenu de Tiers qui est ainsi publié sur ce site Web n'appartient qu'à son auteur et sa présence sur ce site Web n'implique en aucune façon une approbation ou une garantie de qualité de la part de legucihet.mg. Legucihet.mg n'acquiert donc aucun droit de propriété sur ce Contenu de Tiers mais les utilisateurs respectifs lui concèdent le droit non exclusif, cessible (y compris le droit de concéder des licences), à titre gratuit et pour le monde entier, d'utiliser, de reproduire, de distribuer, de représenter et d'exécuter ce Contenu de Tiers dans le cadre de ses activités et d'en créer des œuvres dérivées, y compris, et sans limitation, pour la promotion et la redistribution de tout ou partie du présent site Web, dans tout format et sur tout support. Tout utilisateur auteur du Contenu de Tiers est par ailleurs parfaitement informé que compte tenu des 
                    caractéristiques intrinsèques d'Internet, le contenu qu'il décide de diffuser n'est pas protégé contre les risques de détournement et/ou de piratage. </p><br>
                    <p style="text-align: justify;">En ce qui concerne plus particulièrement le Contenu de Tiers diffusé sur support vidéo, chaque utilisateur du site Web s'engage à ne le consulter qu'à des fins personnelles et non commerciales, et uniquement à des fins de streaming, c'est-à-dire de manière à ce que ce Contenu de Tiers soit visualisé en temps réel et non à être téléchargé, copié et/ou redistribué. </p>
                    <br>
                    <p style="text-align: justify;">
                    Enfin, leguichet.mg se réserve, à tout moment, le droit de publier ou non, le Contenu de Tiers, en tout ou en partie. En sa qualité d'hébergeur, leguichet.mg retirera tout contenu manifestement illicite dès que celui-ci aura été porté à sa connaissance et le compte de l'utilisateur correspondant pourra être désactivé, sans autres formalités préalables.
                     </p><br>
                    <p style="text-align: justify;"><b>Fonctionnement de ce site Web.</b> Leguichet.mg ne donne aucune garantie concernant la disponibilité et le bon fonctionnement de ce site Web et ne peut être tenue pour responsable de toute interruption de disponibilité ou défaut dans son fonctionnement, quelle qu'en soit la cause (par exemple en cas de virus ou de contamination informatique quelconque). Par ailleurs, à tout moment et sans aucune motivation, Leguichet.mg a le droit de cesser de mettre ce site Web à disposition, que ce soit de manière temporaire ou permanente.</p><br>
                    
                    <p style="text-align: justify;">En cas de contestation relative aux communications électroniques touchant à l'utilisation de ce site Web (telles que l'entrée en communication avec ce site Web, etc.) les données techniques de leguichet.mg auront une force probante supérieure.</p> <br>
                    <p style="text-align: justify;"><b>Droits de propriété intellectuelle.</b>Ce site Web et son contenu, en ce compris et de façon non limitative, les textes, graphiques, images, vidéos, sons, logos et icônes, sont protégés par le droit d'auteur et/ou d'autres droits de propriété intellectuelle (marques, bases de données, etc.) et ne peuvent pas être copiés, reproduits, distribués, utilisés, adaptés et/ou traduits, en tout ou en partie, sauf autorisation écrite et préalable de legucht.mg et/ou de l'auteur respectif en cas de Contenu de Tiers. et ce sans préjudice de la possibilité de télécharger et d'imprimer des éléments de ce site Web à des fins purement informatives, éducatives ou scientifiques et non commerciales, pour autant cependant que le contenu ne soit pas modifié et que les notices de droits d'auteur, marques et des autres droits de propriété intellectuelle soient conservées. Toute utilisation contraire à ces conditions est expressément interdite. </p>
                    <br>
                    <p style="text-align: justify;"><b>Hyperliens vers des sites web de tiers.</b> Les sites web vers lesquels des hyperliens peuvent avoir lieu depuis ce site Web ne sont pas contrôlés par leguichet.mg et leguichet.mg ne peut pas être tenue responsable du contenu illégal sur ces sites web ni des hyperliens renvoyant eux-mêmes vers d'autres sites web. La présence d'un hyperlien vers les sites web de tiers sur ce site Web n'implique en aucune façon une approbation ou une garantie de qualité de la part de leguichet.mg.<br>
                    <p style="text-align: justify;"><b>Droit applicable et juridictions compétentes.</b> Ce site Web, son exploitation et son usage sont régis par le droit malgache. Sauf disposition légale contraire impérative, les tribunaux de Tananarive sont seuls compétents pour toute dispute liée à l'accès et/ou à l'utilisation de ce site Web.</p><br>
                    <p style="text-align: justify;">Si vous avez des questions concernant nos Conditions d'Utilisation ou notre politique de protection de la Vie Privée, n'hésitez pas à nous contacter par e-mail à contact@leguichet.mg. </p><br>
                    <p style="text-align: justify;">Dernière mise à jour: Novembre 2017.</p>
                </div>
            </div>

            
        </div>
    </div>
@endsection