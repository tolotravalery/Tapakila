<?php $__env->startSection('content'); ?>
    <section id="reset-mail">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="initialize">Réinitialiser le mot de passe</h1>
                    <form class="form-horizontal" id="bg-reset" role="form" method="POST"
                          action="<?php echo e(route('password.request')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="token" value="<?php echo e($token); ?>">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-md-3 col-form-label">Adresse e-mail :</label>
                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control formlaire" name="email"
                                       value="<?php echo e(isset($email) ? $email : old('email')); ?>" required autofocus>
                                <?php if($errors->has('email')): ?>
                                    <span class="red">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 col-form-label">Nouveau mot de passe :</label>
                            <div class="col-md-9">
                                <input id="password" id="inputPassword3" type="password" class="form-control formlaire"
                                       name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="red">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-md-3 col-form-label">Confirmer mot de passe :</label>
                            <div class="col-md-9">
                                <input id="password-confirm" type="password" class="form-control formlaire"
                                       id="inputPassword4"
                                       name="password_confirmation" required>

                                <?php if($errors->has('password_confirmation')): ?>
                                    <span class="red">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <input name="resetpwd" id="resetpwd" tabindex="5" class="form-control btn-reset"
                                       value="Enregistrer" type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("template", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>