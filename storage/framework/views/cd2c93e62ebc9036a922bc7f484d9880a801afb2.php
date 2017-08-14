<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Tapakila</title>
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/mediaqueries.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/animate.css">
    <link rel="stylesheet" href="<?php echo e(url('/')); ?>/css/font-awesome.css">
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo e(url('/')); ?>/js/bootstrap.min.js"></script>


    <?php if(Auth::User() && (Auth::User()->profile) && $theme->link != null && $theme->link != 'null'): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e($theme->link); ?>">
    <?php endif; ?>



</head>
<body>
<div id="app">

    <?php echo $__env->make('partials.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="container">

        <?php echo $__env->make('partials.form-status', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <?php echo $__env->yieldContent('content'); ?>

</div>


<script src="<?php echo e(mix('/js/app.js')); ?>"></script>
<?php echo HTML::script('//maps.googleapis.com/maps/api/js?key='.env("GOOGLEMAPS_API_KEY").'&libraries=places&dummy=.js', array('type' => 'text/javascript')); ?>


<?php echo $__env->yieldContent('footer_scripts'); ?>

</body>
</html>