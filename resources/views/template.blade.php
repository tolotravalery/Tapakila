<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tapakila</title>
    <link rel="stylesheet" href="{{ url('/') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/mediaqueries_sample.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/font-awesome.css">
    <link href="{{ url('/') }}/css/datepicker.css" rel="stylesheet">
    <link href="{{ url('/') }}/css/clockpiker.css" rel="stylesheet">
    <script type="text/javascript" src="{{ url('/') }}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/js/datepicker.js"></script>
    <script src="{{ url('/') }}/js/clockpicker.js"></script>

</head>
<body>
<!-- header start -->
<nav id="background" class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{ url('/') }}/img/logo.png" title="tapakila">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="" class="btn btn-success event"
                            onclick="javascript:location.href='{{url('/')}}/organisateur/event'"><span
                                class="ico"></span><span
                                class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button>
                </li>
                <li><a href="{{ url('/shopping/cart') }}">Panier @if (!Auth::guest())
                            ({{ Cart::instance('default')->count(false) }}) @endif</a>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> Rechercher
                        <span class="caret"></span> </a>
                    <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                        <li>
                            <form action="./page/recherche.html" method="get">
                                <input type="text" name="query" placeholder="Search..." autocomplete="off">
                                <input type="submit" value="Search">
                            </form>
                        </li>
                    </ul>
                </li>

            @if (Auth::guest())
                <!--<li><a href="{{ route('login') }}">{!! trans('titles.login') !!}</a></li>-->
                    <li>
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false"> Connexion <span class="caret"></span></a>
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                            @if (Route::has('login'))
                                @if (Auth::check())
                                    <li><a href="{{ url('/home') }}">Home</a></li>
                                @else
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('/register') }}">Register</a></li>
                                @endif
                            @endif
                        </ul>
                    </li>
                @else
                    <li role="presentation" class="dropdown">
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
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">

                            @role('admin')
                            <li {{ Request::is('users', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'class=active' : null }}>{!! HTML::link(url('/admin/users'), Lang::get('titles.adminUserList')) !!}</li>
                            <li {{ Request::is('users/create') ? 'class=active' : null }}>{!! HTML::link(url('/admin/users/create'), Lang::get('titles.adminNewUser')) !!}</li>
                            <li><a href="{{url('/')}}/admin/menu">Menus</a></li>
                            <li><a href="{{url('/')}}/admin/sousmenu">Sous menus</a></li>
                            <li><a href="{{url('/')}}/admin/listevent">List events</a></li>
                            @endrole
                            <li {{ Request::is('profile/'.Auth::user()->id, 'profile/'.Auth::user()->id . '/edit') ?  : null }}>
                            {!! HTML::link(url('/profile/'.Auth::user()->id.'/edit'), trans('titles.profile')) !!}
                            <!--{!! HTML::icon_link(URL::to('/profile/'.Auth::user()->id.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')) !!}
                            {{ trans('profile.editAccountTitle') }}-->
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
                @endif
            </ul>
        </div>
    </div>
</nav>

<!-- header end -->

@yield('content')

@yield('specificScript')

<!-- footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <img class="footer-logo" alt="tapakila" src="{{ url('/') }}/img/logo.png">
                    <p class="small custom">
                        By Tapakila.mg<br>
                        IIB 63 Mahamasina<br>
                        Antananarivo<br>
                        Madagascar<br>
                        +33 12 901432<br>
                        <a href="mailto:contact@tapakila.mg">contact@tapakila.mg</a>
                    </p>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <p class="titled"><strong>Acheter des tickets</strong></p>
                    <ul class="list-unstyled">
                        <li><a href="#">Comment acheter</a></li>
                        <li><a href="#">Foire aux questions</a></li>
                        <li><a href="#">Terms of service</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 col-xs-6">
                    <p class="titled"><strong>Organisateurs</strong></p>
                    <ul class="list-unstyled">
                        <li><a href="#">Pour les Organisateurs</a></li>
                        <li><a href="#">S'enregistrer</a></li>
                        <li><a href="#">Connexion</a></li>
                    </ul>
                </div>
                <div class="col-sm-2 col-xs-6 ">

                    <a class="fb-link-icon" href="https://www.facebook.com/tapakila/" target="_blank"><i
                                class="fa fa-facebook-square facebookico" aria-hidden="true"></i></a>

                    <div id="fb-root"></div>
                    <div class="fb-like" data-href="https://www.facebook.com/tapakila/" data-layout="button"
                         data-action="like" data-size="small" data-show-faces="false" data-colorscheme="dark"
                         data-share="false"></div>

                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!-- footer -->
    <div class="footer-bottom">
        <div class="container small">
            <ul>
                <li><a href="#">A propos de nous</a></li>
                |
                <li><a href="#">Contact</a></li>
                |
                <li><a href="#">Ajouter votre evenement</a></li>
                |
                <li><a href="#">Publicite</a></li>
                |
                <li><a href="#">FAQ</a></li>
                |
                <li><a href="#">Vie privee</a></li>
                |
            </ul>
            <p>Copyright &copy Tapakila 2017</p>
        </div>
    </div>
</footer>
