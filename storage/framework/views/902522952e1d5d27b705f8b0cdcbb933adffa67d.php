<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <?php echo $__env->make('panels.welcome-panel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>