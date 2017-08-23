<?php $__env->startSection('template_title'); ?>
	<?php echo e($user->name); ?>'s Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">

						<?php echo e(trans('profile.showProfileTitle',['username' => $user->name])); ?>


					</div>
					<div class="panel-body">

    					<img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="user-avatar">

						<dl class="user-info">

							<dt>
								<?php echo e(trans('profile.showProfileUsername')); ?>

							</dt>
							<dd>
								<?php echo e($user->name); ?>

							</dd>

							<dt>
								<?php echo e(trans('profile.showProfileFirstName')); ?>

							</dt>
							<dd>
								<?php echo e($user->first_name); ?>

							</dd>

							<?php if($user->last_name): ?>
								<dt>
									<?php echo e(trans('profile.showProfileLastName')); ?>

								</dt>
								<dd>
									<?php echo e($user->last_name); ?>

								</dd>
							<?php endif; ?>

							<dt>
								<?php echo e(trans('profile.showProfileEmail')); ?>

							</dt>
							<dd>
								<?php echo e($user->email); ?>

							</dd>

							<?php if($user->profile): ?>

								<?php if($user->profile->theme_id): ?>
									<dt>
										<?php echo e(trans('profile.showProfileTheme')); ?>

									</dt>
									<dd>
										<?php echo e($currentTheme->name); ?>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->location): ?>
									<dt>
										<?php echo e(trans('profile.showProfileLocation')); ?>

									</dt>
									<dd>
										<?php echo e($user->profile->location); ?> <br />
										Latitude: <span id="latitude"></span> / Longitude: <span id="longitude"></span> <br />

										<div id="map-canvas"></div>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->bio): ?>
									<dt>
										<?php echo e(trans('profile.showProfileBio')); ?>

									</dt>
									<dd>
										<?php echo e($user->profile->bio); ?>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->twitter_username): ?>
									<dt>
										<?php echo e(trans('profile.showProfileTwitterUsername')); ?>

									</dt>
									<dd>
										<?php echo HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')); ?>

									</dd>
								<?php endif; ?>

								<?php if($user->profile->github_username): ?>
									<dt>
										<?php echo e(trans('profile.showProfileGitHubUsername')); ?>

									</dt>
									<dd>
										<?php echo HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')); ?>

									</dd>
								<?php endif; ?>
							<?php endif; ?>

						</dl>

						<?php if($user->profile): ?>
							<?php if(Auth::user()->id == $user->id): ?>

								<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-cog', trans('titles.editProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>


							<?php endif; ?>
						<?php else: ?>

							<p><?php echo e(trans('profile.noProfileYet')); ?></p>
							<?php echo HTML::icon_link(URL::to('/profile/'.Auth::user()->name.'/edit'), 'fa fa-fw fa-plus ', trans('titles.createProfile'), array('class' => 'btn btn-small btn-info btn-block')); ?>


						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

	<?php echo $__env->make('scripts.google-maps-geocode-and-map', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>