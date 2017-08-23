<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tapakila</title>
    <link rel="stylesheet" href="<?php echo e(URL::asset('tapakila_assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('tapakila_assets/css/mediaquery.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('tapakila_assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(URL::asset('tapakila_assets/css/font_awesome.min.css')); ?>">
    <script type="text/javascript" src="<?php echo e(URL::asset('tapakila_assets/js/javascripts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('tapakila_assets/js/js1.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('tapakila_assets/js/js2.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('tapakila_assets/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('tapakila_assets/js/bootstrap.min.js')); ?>"></script>

</head>
<body>
<header>
    <div id="site-header">
        <div class="site-advertisement">
            <div class="containers">
                <div class="col-sm-3">
                    <p class="site-logo ">
                        <a href="index.html">
                            <img src="<?php echo e(URL::asset('tapakila_assets/img/logo.png')); ?>">
                        </a>
                    </p>
                </div>
                <div class="col-sm-6">
                    <div class="header-search-box">
                        <form action="./page/recherche.html" method="get">
                            <input type="text" name="query" placeholder="Search..." autocomplete="off">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div id="tapakila-menu">


                        <ul>
                            <div class="col-sm-6 col-xs-6 oo">
                                <li><a href="#">
                                <li><br/><a href="#"><img class="compte"
                                                          src="<?php echo e(URL::asset('tapakila_assets/img/moncompte.png')); ?>"></a>
                                </li>
                                <div class="mot">Connexion/<br>
                                    inscritpion
                                </div>
                                </a></li>
                            </div>
                            <div class="col-sm-2 col-xs-6 o">
                                <li><a href="./page/indexcartvide.html">
                                <li><br/><a href="#"><img class="compte"
                                                          src="<?php echo e(URL::asset('tapakila_assets/img/panier.png')); ?>"></a>
                                </li>
                                <div class="mot">Panier</div>
                                </a></li>
                            </div>
                            <div class="col-sm-10">
                                <li class="mot"><a href="page/Add-events.html">
                                        <div class="bouton"><span class="ico"><img class="compte"
                                                                                   src="<?php echo e(URL::asset('tapakila_assets/img/add-event.png')); ?>"></span><span
                                                    class="">AJOUTER VOTRE EVENEMENT</span></div>
                                    </a></li>
                            </div>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <header>

            <div class="containers">
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <p class="reinitialise">Connexion</p>
                    <div class="white">
                        <div class="champs2">
                            <p><strong>Mail</strong></p>
                            <input id="email" type="placeholde" placeholder="name@domaine.com" class="form-control"
                                   name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                            <?php if($errors->has('email')): ?>
                                <span class="red">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                            <p class="mdpt"><strong>Mots de passe</strong></p>
                            <input id="password" type="password" class="placeholde" name="password"
                                   placeholder="********" required>

                            <?php if($errors->has('password')): ?>
                                <span class="red">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="customcolor">
                        <div class="row divider">
                            <div class="col-md-6 col-xs-12">
                                <input class="sinscrire input-submit" type="submit" name="s'inscrire'"
                                       value="Se Connecter" style="margin-left: 80px;width: 180px;height: 56px;">
                            </div>
                            <div class="col-md-6 col-xs-12">

                                <a href="<?php echo e(url('/register')); ?>"><p class="red4">S'inscrire</p></a>
                                <a href="<?php echo e(url('/password/reset')); ?>"><p class="red3">Réinitialiser mots de passe</p></a>

                            </div>
                        </div>
                    </div>
                    <div class="spacerwhite"></div>
                    <div class="white2">
                        <p class="fbk"><strong>vous êtes vous connecté avec votre compte facebook?</strong></p>
                        <a class="btn btn-block btn-social btn-fb"
                           href="<?php echo e(route('social.redirect',['provider' => 'facebook'])); ?>">
                            <span class="fa fa-facebook"></span> Connexion avec Facebook</a>

                    </div>
                </form>
            </div>
        </header>
    </div>
</header>

</body>
</html>