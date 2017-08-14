<?php $__env->startSection('content'); ?>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="initialize">Réinitialiser le mot de passe</h2>
                    <form class="form-horizontal" role="form" method="POST" id="bg-custom"
                          action="<?php echo e(route('password.email')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <label for="email"><strong>Votre addresse email :</strong></label>
                            <input id="email" type="email" class="form-control e-mailR" name="email"
                                   value="<?php echo e(old('email')); ?>" placeholder="Adresse e-mail" required>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                            <?php endif; ?>
                            <?php if(session('status')): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-info information">
                                            Nous vous envérons un lien de réinitialisation de mot de passe par
                                            <strong>e-mail.</strong>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <input type="submit" name="send-submit" id="send-submit" tabindex="4"
                                           class="form-control btn-send" value="Envoyer">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>