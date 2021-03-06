<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tapakila-reinitialiser</title>
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
                <?php echo Form::open(['route' => 'register', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST'] ); ?>

                <?php echo e(csrf_field()); ?>

                <p class="inscript"><strong>Inscription</strong></p>
                <div class="white5">
                    <div class="col-md-6 col-xs-6">
                        <div class="champs">
                            <p><strong>Nom</strong></p>
                            <?php echo Form::text('name', null, ['class' => 'placehold', 'placeholder' => 'Nom', 'id' => 'name', 'required', 'autofocus']); ?>

                            <?php if($errors->has('name')): ?>
                                <span class="red">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <p class="element"><strong>Prénoms</strong></p>
                            <?php echo Form::text('first_name', null, ['class' => 'placehold', 'placeholder' => 'Prénoms', 'id' => 'first_name']); ?>

                            <?php if($errors->has('first_name')): ?>
                                <span class="red">
                                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <p class="element"><strong>E-mail</strong></p>
                            <?php echo Form::email('email', null, ['class' => 'placehold', 'id' => 'email', 'placeholder' => 'E-Mail', 'required']); ?>

                            <?php if($errors->has('email')): ?>
                                <span class="red">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <p class="element"><strong>Mots de passe</strong></p>
                            <?php echo Form::password('password', ['class' => 'placehold', 'id' => 'password', 'placeholder' => '*******', 'required']); ?>

                            <?php if($errors->has('password')): ?>
                                <span class="red">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <p class="element"><strong></strong></p>
                            <?php echo Form::password('password_confirmation', ['class' => 'placehold', 'id' => 'password-confirm', 'placeholder' => '*******', 'required']); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="inscripto input-submit" type="submit" name="s'inscrire'" value="S'inscrire">
                        </div>
                        <div class="col-md-6 descript">
                            <p><strong>Déjà inscrit ?</strong> <a href="<?php echo e(url('/login')); ?>" class="siginyou">connecter vous </a>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </header>
    </div>
</header>
</body>
</html>