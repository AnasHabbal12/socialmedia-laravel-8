<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/img/freecode.jpg" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-item-baseline">
                <h1><?php echo e($user->username); ?></h1>
                <a href="#">Add New Post</a>
            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>135</strong> Posts</div>
                <div class="pr-5"><strong>23k</strong> folowers</div>
                <div class="pr-5"><strong>231</strong> folowing</div>
            </div>
            <div class="pt-4 font-weight-bold"><?php echo e($user->profile->title); ?></div>
            <div><?php echo e($user->profile->description); ?></div>
                <div><a href="#"><?php echo e($user->profile->url ?? 'N/A'); ?></a></div>
        </div>
    </div>
    <div class="row pt-5 ">
        <div class="col-4"><img src="/img/1.jpg" class="w-100"></div>
        <div class="col-4"><img src="/img/2.jpg" class="w-100"></div>
        <div class="col-4"><img src="/img/3.jpg" class="w-100"></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blog\resources\views/home.blade.php ENDPATH**/ ?>