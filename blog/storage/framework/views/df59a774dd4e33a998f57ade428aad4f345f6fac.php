
<style type="text/css">
  i.fa {
  display: inline-block;
  border-radius: 60px;
  box-shadow: 0px 0px 2px #888;
  padding: 0.5em 0.6em;

}
.btn-primary {
    background: #ff6c2d !important;
    border-color: #ff6c2d !important;
}
</style>
<?php $__env->startSection('content'); ?>
<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url(./img/car.jpg);background-size: cover;"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body" style="margin-top: -90px;">
    <div class="container">
      <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
        <h2 class="theme-page-header-title" style="font-family: GoogleSansBold, Helvetica, Arial, sans-serif;
              
              font-weight: 700;">Welcome To HotelsInPakistan</h2>
        <p class="theme-page-header-subtitle">Explore Free Listing,Select Categories From Following You Want on our Website</p>
      </div>

    </div>
  </div>
</div>
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-12 " >
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
           <?php if(session('status')): ?>
           <div class="alert alert-success">
             <?php echo e(session('status')); ?>

           </div>
           <?php endif; ?>
           <h3 class="theme-payment-page-sections-item-title">Choose Your Listing Types</h3>
           <p >
            Hotels In Pakistan is a leading platform in Pakistan which provides online hotels & Holiday Homes search & reservation, Nationwide search of restaurants and online Car Rental search and booking in Pakistan.
            Come and Join us and become part of Hotels In Pakistan Family. 
            Get your listing on Hotels In Pakistan ABSOULATELY FREE & enjoy unlimited benefits

          </p>
          <div class="row">
            <div class="col-sm-6" style="border-left: 1px solid grey;">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><span><i style="color: #ff6c2d" class="fa fa-hotel" aria-hidden="true"></i></span>&nbsp;Hotels</h3>


                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="<?php echo e(URL('/hotel_listings')); ?>" style="background-color: #ff6c2d" class="btn btn-primary ">Go For Listing</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6" style="border-left: 1px solid grey;">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title"><span><i style="color: #ff6c2d" class="fa fa-cutlery" aria-hidden="true"></i></span>&nbsp;Restaurants</h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="<?php echo e(URL('/add_new_restaurant')); ?>" style="background-color: #ff6c2d" class="btn btn-primary ">Go For Listing</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6" style="border-left: 1px solid grey;">
              <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><span><i style="color: #ff6c2d" class="fa fa-home" aria-hidden="true"></i></span>&nbsp;Homes</h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="<?php echo e(URL('/home_listing')); ?>" style="background-color: #ff6c2d" class="btn btn-primary ">Go For Listing</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6" style="border-left: 1px solid grey;">
              <div class="card">
                <div class="card-body">
                   <h3 class="card-title"><span><i style="color: #ff6c2d" class="fa fa-car" aria-hidden="true"></i></span>&nbsp;Cars Rentals</h3>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="<?php echo e(URL('/new_agency_listing')); ?>" style="background-color: #ff6c2d" class="btn btn-primary ">Go For Listing</a>
                </div>
              </div>
            </div>
          </div>
         
        </div>   

      </div>
    </div>

  </div>
</div>
</div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>