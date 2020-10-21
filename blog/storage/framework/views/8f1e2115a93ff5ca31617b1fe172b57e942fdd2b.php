<?php $__env->startSection('userdash'); ?>
<div class="col-md-9">
    <div class="user-form-settings">
        <div class="breadcrumb-page-bar" aria-label="breadcrumb">
            <ul class="page-breadcrumb">
                <li class="">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class=" active">
                    Booking History
                </li>
            </ul>
            <div class="bravo-more-menu-user">
                <i class="icofont-settings"></i>
            </div>
        </div>
        <h2 class="title-bar no-border-bottom">
            Booking History
        </h2>
        <div class="booking-history-manager">
            <div class="tabbable">
                <ul class="nav nav-tabs ht-nav-tabs">
                    
                    <?php if(URL::current()==url('/').'/booking_history'): ?>
                    <li class=" active ">
                        <a href="/booking_history">All Booking</a>
                    </li>
                    <?php else: ?>
                    <li class="">
                        <a href="/booking_history">All Booking</a>
                    </li>
                    <?php endif; ?>
                    <?php if(URL::current()==url('/').'/booking_history/completed'): ?>

                    <li class="active">

                        <a href="/booking_history/completed">Completed</a>
                    </li>
                    <?php else: ?>
                    <li class="">

                        <a href="/booking_history/completed">Completed</a>
                    </li>

                    <?php endif; ?>
                    <?php if(URL::current()==url('/').'/booking_history/processing'): ?>
                    
                    <li class="active">
                        <a href="/booking_history/processing">Processing</a>
                    </li>
                    <?php else: ?>
                    <li class="">
                        <a href="/booking_history/processing">Processing</a>
                    </li>
                    <?php endif; ?>


                    <?php if(URL::current()==url('/').'/booking_history/confirmed'): ?>

                    <li class="active">
                        <a href="/booking_history/confirmed">Confirmed</a>
                    </li>
                    <?php else: ?>
                    <li class="">
                        <a href="/booking_history/confirmed">Confirmed</a>
                    </li>
                    <?php endif; ?>

                    <?php if(URL::current()==url('/').'/booking_history/cancelled'): ?>
                    <li class="active">
                        <a href="/booking_history/cancelled">Cancelled</a>
                    </li>
                    <?php else: ?>

                    <li class="">
                        <a href="/booking_history/cancelled">Cancelled</a>
                    </li>

                    <?php endif; ?>


                    <?php if(URL::current()==url('/').'/booking_history/paid'): ?>
                    
                    <li class="active">
                        <a href="/booking_history/paid">Paid</a>
                    </li>
                    <?php else: ?>

                    <li class="">
                        <a href="/booking_history/paid">Paid</a>
                    </li>
                    <?php endif; ?>
                    <?php if(URL::current()==url('/').'/booking_history/unpaid'): ?>

                    <li class="active">
                        <a href="/booking_history/unpaid">Unpaid</a>
                    </li>
                    <?php else: ?>
                    <li class="">
                        <a href="/booking_history/unpaid">Unpaid</a>
                    </li>
                    <?php endif; ?>

                    <?php if(URL::current()==url('/').'/booking_history/partial_payment'): ?>

                    <li class="active">
                        <a href="/booking_history/partial_payment">Partial Payment</a>
                    </li>
                    <?php else: ?>

                    <li class="">
                        <a href="/booking_history/partial_payment">Partial Payment</a>
                    </li>
                    <?php endif; ?>
                </ul>
                No Booking History
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('useradmin.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>