<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo e(Lang::get('titles.activation')); ?></div>
					<div class="panel-body">
						<p><?php echo e(Lang::get('auth.regThanks')); ?></p>
						<p><?php echo e(Lang::get('auth.anEmailWasSent',['email' => $email, 'date' => $date ] )); ?></p>
						<p><?php echo e(Lang::get('auth.clickInEmail')); ?></p>
						<p><a href='<?php echo e(url('/')); ?>/activation' class="btn btn-primary"><?php echo e(Lang::get('auth.clickHereResend')); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>