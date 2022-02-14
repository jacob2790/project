<?php $__env->startSection('content'); ?>
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid  kt-error-v1"
             style="background-image: url(<?php echo e(URL::asset('resources/assets/backend/media/error/bg1.jpg')); ?>);">
            <div class="kt-error-v1__container">
                <h1 class="kt-error-v1__text"><?php echo e(\Config::get('app.site_title')); ?></h1>
                <p class="kt-error-v1__desc">
                    Welcome to <?php echo e(\Config::get('app.site_title')); ?>!
                    <br>
                    We're working hard on something really interesting.
                    <br>
                    Please come back later.
                </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\project\resources\views/frontend/home/welcome.blade.php ENDPATH**/ ?>