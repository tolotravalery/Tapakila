<footer class="footer">
    <div class="footer-top">
        <div class="container custom-container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <img class="footer-logo" alt="tapakila" src="{{ url('/') }}/public/img/logo.png">
                    <p class="small custom">
                        By leguichet.mg<br>
                        IIB 63 Mahamasina<br>
                        Antananarivo<br>
                        Madagascar<br>
                        +33 12 901432<br>
                        <a href="mailto:contact@tapakila.mg">contact@leguichet.mg</a>
                    </p>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <p class="titled"><strong>Acheter des tickets</strong></p>
                    <ul class="list-unstyled">
                        <li><a href="{{url('')}}/tapakila/shop">Comment acheter</a></li>
                        <li><a href="{{url('')}}/tapakila/faq">Foire aux questions</a></li>
                        <li><a href="{{url('')}}/tapakila/term">Terms of service</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <p class="titled"><strong>Organisateurs</strong></p>
                    <ul class="list-unstyled">
                        <li><a href="{{url('')}}/tapakila/shop/ticket">Pour les Organisateurs</a></li>
                        <li><a href="{{ url('/register') }}">S'enregistrer</a></li>
                        <li><a href="{{ url('/login') }}">Connexion</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 col-xs-6 ">

                    <a class="fb-link-icon" href="https://www.facebook.com/leguichet/" target="_blank"><i
                                class="fa fa-facebook-square facebookico" aria-hidden="true"></i></a>

                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="https://www.facebook.com/leguichet/" data-layout="button"
                         data-action="like" data-size="small" data-show-faces="false" data-colorscheme="dark"
                         data-share="false"></div>

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!-- footer -->
    <div class="footer-bottom">
        <div class="container small custom-container">
            <ul>
                <li><a href="{{url('')}}/tapakila/about">A propos de nous</a></li>
                |
                <li><a href="{{url('')}}/tapakila/contact">Contact</a></li>
                |
                <li><a href="{{url('/')}}/organisateur/event">Ajouter votre evenement</a></li>
                |
                <li><a href="#">Publicite</a></li>
                |
                <li><a href="{{url('')}}/tapakila/faq">FAQ</a></li>
                |
                <li><a href="#">Vie privee</a></li>
                |
            </ul>
            <p>Copyright &copy leguichet 2017</p>
        </div>
    </div>
</footer>