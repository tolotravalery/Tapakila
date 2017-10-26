<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Leguichets</title>
    <link rel="stylesheet" href="{{ url('/') }}/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/mediaqueries.css">
    @yield('specificCss')
    <link rel="stylesheet" href="{{ url('/') }}/public/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/public/css/font-awesome.css">
    <link href="{{ url('/') }}/public/css/datepicker.css" rel="stylesheet">
    <link href="{{ url('/') }}/public/css/clockpiker.css" rel="stylesheet">
    <script type="text/javascript" src="{{ url('/') }}/public/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/public/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/public/js/datepicker.js"></script>
    <script src="{{ url('/') }}/public/js/clockpicker.js"></script>

</head>
<body>
<!-- header start -->
<nav id="background" class="navbar navbar-default navbar-static-top ">
    <div class="container custom-container ">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ url('/') }}/public/img/logo.png" title="leguichet">
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            @if (Auth::guest())
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-left: 10px;">
                        <div class="panier-header"><a href="{{url('/')}}/organisateur/event"
                                                      class="btn btn-success event"
                                                      role="button"><span class="ico"></span><span
                                        class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></a></div>
                    </li>
                    <li>
                        <a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                                ({{ Cart::instance('default')->count(false) }}) @endif</a>
                    </li>

                    <li role="presentation" class="dropdown connexion">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"> Connexion
                            <span class="caret"></span> </a>
                        <ul class="dropdown-menu " id="menu3" aria-labelledby="drop6">
                            <a href="{{ url('/login') }}">
                                <li class="conexion">Se connecter</li>
                            </a>
                            <a href="{{ url('/register') }}">
                                <li class="conexion">S'inscrire</li>
                            </a>
                        </ul>
                    </li>
                </ul>
				
                <div class="row">
                    <div class="col-md-6">
                        <div id="custom-search-input">
							<form action="{{url('/')}}/find/q" method="get" class="input-group searchbox">
								<input type="text" class="form-control input-lg" name="query"
									   placeholder="Rechercher..." autocomplete="off" style="font-size:16px;">
								<span class="input-group-btn">
									<button class="btn btn-info1 btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</form>
                        </div>
                    </div>
                </div>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-left: 10px;">
                        <div class="panier-header"><a href="{{url('/')}}/organisateur/event"
                                                      class="btn btn-success event"
                                                      role="button"><span class="ico"></span><span
                                        class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></a></div>
                    </li>
                    <li>
                        <a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                                ({{ Cart::instance('default')->count(false) }}) @endif</a>
                    </li>
                    <li role="presentation" class="dropdown connexion">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">

                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}"
                                     class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif

                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu " id="menu3" aria-labelledby="drop6">
                            {{--<li {{ Request::is('profile/'.Auth::user()->id, 'profile/'.Auth::user()->id . '/edit') ?  : null }}>
                            {!! HTML::link(url('/profile/'.Auth::user()->id.'/edit'), trans('titles.profile')) !!}
                            <!--{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->id.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
                            {{ trans('profile.editAccountTitle') }}-->
                            </li>--}}
                            <li>
                                <a href="{{url('/home')}}">Profile</a>
                            </li>
                            @role('organisateur')
                            <li><a href="{{url('/')}}/organisateur/event">Events</a></li>
                            @endrole
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    {!! trans('titles.logout') !!}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
                <div class="row">
                    <div class="col-md-5">
                        <div id="custom-search-input">
							<form action="{{url('/')}}/find/q" method="get" class="input-group searchbox">
								<input type="text" class="form-control input-lg" name="query"
									   placeholder="Rechercher..." autocomplete="off" style="font-size:16px;">
								<span class="input-group-btn">
									<button class="btn btn-info1 btn-lg" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
<!-- header end -->
@yield('content')

@yield('specificScript')
<!-- footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container custom-container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <img class="footer-logo" alt="Leguichet" src="{{ url('/') }}/public/img/logo.png">
                    <p class="small custom">
                        By Leguichet.mg<br>
                        IIB 63 Mahamasina<br>
                        Antananarivo<br>
                        Madagascar<br>
                        +33 12 901432<br>
                        <a href="mailto:contact@Leguichet.mg">contact@Leguichet.mg</a>
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

                    <a class="fb-link-icon" href="https://www.facebook.com/Leguichet/" target="_blank"><i
                                class="fa fa-facebook-square facebookico" aria-hidden="true"></i></a>

                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="https://www.facebook.com/Leguichet/" data-layout="button"
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
            <p>Copyright &copy Leguichet 2017</p>
        </div>
    </div>
</footer>
<script>
    $(function () {
        var pull = $('#pull');
        menu = $('#sectioncategorie ul');
        menuHeight = menu.height();

        $(pull).on('click', function (e) {
            e.preventDefault();
            menu.slideToggle();
        });

        $(window).resize(function () {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    });
</script>