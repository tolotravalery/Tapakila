<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tapakila</title>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/mediaqueries.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/font-awesome.css">
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="#">
                <img src="<?php echo e(url('/')); ?>/img/logo.png" title="tapakila">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <button type="" class="btn btn-success event"><span class="ico"></span><span
                                class="descr">AJOUTER<br/> VOTRE EVENEMENT</span></button>
                </li>
                <li><a href="#">Panier</a></li>
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
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"><?php echo trans('titles.login'); ?></a></li>
                <?php else: ?>
                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" id="drop6" data-toggle="dropdown" role="button"
                           aria-haspopup="true" aria-expanded="false">

                            <?php if((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1): ?>
                                <img src="<?php echo e(Auth::user()->profile->avatar); ?>" alt="<?php echo e(Auth::user()->name); ?>"
                                     class="user-avatar-nav">
                            <?php else: ?>
                                <div class="user-avatar-nav"></div>
                            <?php endif; ?>

                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu search" id="menu3" aria-labelledby="drop6">
                            <li <?php echo e(Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ?  : null); ?>>
                            <?php echo HTML::link(url('/profile/'.Auth::user()->name.'/edit'), trans('titles.profile')); ?>

                            <!--<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>

                            <?php echo e(trans('profile.editAccountTitle')); ?>-->
                            </li>
                            <li><a href="<?php echo e(url('/')); ?>/category">Categories</a></li>
                            <li><a href="<?php echo e(url('/')); ?>/event">Events</a></li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <?php echo trans('titles.logout'); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                      style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- header end -->

<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->yieldContent('specificScript'); ?>

<!-- footer -->
<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-6">
                    <img class="footer-logo" alt="tapakila" src="<?php echo e(url('/')); ?>/img/logo.png">
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
                                class="fa fa-facebook-square" aria-hidden="true"></i></a>
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
