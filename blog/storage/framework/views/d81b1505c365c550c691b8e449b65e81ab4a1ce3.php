<?php $__env->startSection('userdash'); ?>

<div class="col-md-9">
    <div class="user-form-settings">
        <div class="breadcrumb-page-bar" aria-label="breadcrumb">
<ul class="page-breadcrumb">
<li class="">
<a href="http://localhost:8001"><i class="fa fa-home"></i> Home</a>
<i class="fa fa-angle-right"></i>
</li>
<li class=" active">
                Wishlist
        </li>
</ul>
<div class="bravo-more-menu-user">
<i class="icofont-settings"></i>
</div>
</div>
            <h2 class="title-bar">
WishList
</h2>
No Items
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('useradmin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>