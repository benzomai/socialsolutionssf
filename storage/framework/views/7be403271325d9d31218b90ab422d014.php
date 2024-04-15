<?php $__env->startSection('content'); ?>
<section class="section login-section">
    <div class="row m-0 p-0 d-flex flex-lg-row flex-sm-column-reverse flex-column-reverse justify-content-center">
        <div class="col-lg-6 col-md-12  mt-lg-0 mt-sm-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-11 col-lg-8">
                    <div class="card p-4">
                        <h4>Login to SocialSolutions</h4>
        
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                
                                <div class="form-group">
                                    <label for="email" class="col-12 col-form-label"><?php echo e(__('Email Address')); ?></label>
        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
        
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group mt-4">
                                    <label for="password" class="col-md-12"><?php echo e(__('Password')); ?></label>
        
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">
        
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
        
                                <div class="form-group mt-3">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
            
                                                <label class="form-check-label" for="remember">
                                                    <?php echo e(__('Remember Me')); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <?php if(Route::has('password.request')): ?>
                                            <small><a class="btn btn-link text-right" style="font-size: 14px;" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('Forgot Your Password?')); ?>

                                            </a></small>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                </div>
        
                                <div class="form-group  mt-3">

                                        <button type="submit" class="btn btn-yellow col-12">
                                            <?php echo e(__('Login')); ?>

                                        </button>
    
                                     
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 login-right">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <a class="login-logo text-center" href="<?php echo e(route('login')); ?>"><img src="../assets/img/socsol-logo-white.png" /></a>
                    <h3 class="mt-3 text-light text-center">The Social Media Subscription That Powers Your Business</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\socialsols_github\socialsolutionssf\resources\views/auth/login.blade.php ENDPATH**/ ?>