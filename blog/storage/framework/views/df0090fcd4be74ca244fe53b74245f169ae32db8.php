<?php $__env->startSection('content'); ?>
<div class="theme-hero-area theme-hero-area-primary">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action" style="background-image:url(./img/mainback.jpg);" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow theme-hero-area-inner-shadow-light"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="_pt-250 _pb-200 _pv-mob-50">
      <div class="container">
        <div class="theme-search-area-tabs">
          <div class="theme-search-area-tabs-header _c-w _ta-mob-c">
            <p style="font-weight: bolder;" class="theme-search-area-tabs-title">Start Your Journey</p>
            <h1 class="theme-search-area-tabs-subtitle">Hotels In Pakistan</h1>
            <p class="theme-search-area-tabs-subtitle">Your Destination Partner</p>
          </div>
          <div class="tabbable">
            <ul class="nav nav-tabs nav-line nav-white nav-lg nav-mob-inline" role="tablist">
              <li class="active" role="presentation">
                <a aria-controls="SearchAreaTabs-1" role="tab" data-toggle="tab" href="#SearchAreaTabs-1">Hotels</a>
              </li>
              <li role="presentation">
                <a aria-controls="SearchAreaTabs-2" role="tab" data-toggle="tab" href="#SearchAreaTabs-2">Restaurants</a>
              </li>
              <li role="presentation">
                <a aria-controls="SearchAreaTabs-3" role="tab" data-toggle="tab" href="#SearchAreaTabs-3">Homes</a>
              </li>
              <li role="presentation">
                <a aria-controls="SearchAreaTabs-4" role="tab" data-toggle="tab" href="#SearchAreaTabs-4">Cars</a>
              </li>


            </ul>
            <div class="tab-content _pt-20">
              <div class="tab-pane active" id="SearchAreaTabs-1" role="tab-panel">
                <div class="theme-search-area theme-search-area-stacked">
                  <div class="theme-search-area-form">
                    <div class="row" data-gutter="none">
                     <?php echo $__env->make('hotel.UserChunks.hotelsearchform
                     ', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                   </div>
                 </div>

               </div>
             </div>
             <div class="tab-pane" id="SearchAreaTabs-2" role="tab-panel">
              <div class="theme-search-area theme-search-area-stacked">
                <div class="theme-search-area-form" style="margin-left: 40px;">
                  <?php echo $__env->make('resturants.UserChunks.SearchChunks', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

              </div>
            </div>
            <div class="tab-pane" id="SearchAreaTabs-3" role="tab-panel">
             <div class="theme-search-area theme-search-area-stacked">
              <div class="theme-search-area-form">
                <div class="row" data-gutter="none">
                 <form  action="<?php echo e(url('searchome')); ?>" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data" style="color:black;">
                  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                  <div class="theme-search-area-form _bsh-xxl _bsh-light" id="hero-search-form">
                    <div class="row" data-gutter="none">
                      <div class="col-md-3 ">
                        <div class="theme-search-area-section first theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                         <div class="theme-search-area-section-inner">
                          <i class="theme-search-area-section-icon lin lin-location-pin"></i>
                          <select class="theme-search-area-section-input itemName form-control"  name="city" style="width: 100%;color: black;" ></select>
                        </div>

                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="row" data-gutter="none">
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerStart _mob-h" value="Wed 06/27" type="text" name="date" placeholder="Check-in"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                            </div>

                          </div>
                        </div>
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerEnd _mob-h" value="Mon 07/02" type="text" placeholder="Check-out"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="row" data-gutter="none">

                        <div class="col-md-12 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr quantity-selector" data-increment="Guests">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-people"></i>
                              <input class="theme-search-area-section-input" value="2 Guests" type="text" name="guest" />
                              <div class="quantity-selector-box" id="HotelSearchGuests">
                                <div class="quantity-selector-inner">
                                  <p class="quantity-selector-title">Guests</p>
                                  <ul class="quantity-selector-controls">
                                    <li class="quantity-selector-decrement">
                                      <a href="#">&#45;</a>
                                    </li>
                                    <li class="quantity-selector-current">1</li>
                                    <li class="quantity-selector-increment">
                                      <a href="#">&#43;</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 ">
                      <button class="theme-search-area-submit _mt-0 theme-search-area-submit-curved theme-search-area-submit-sm theme-search-area-submit-no-border">Search</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>



          </div>

        </div>
      </div>
      <div class="tab-pane" id="SearchAreaTabs-4" role="tab-panel">
        <div class="theme-search-area theme-search-area-stacked">
          <div class="theme-search-area-form">
           <?php echo $__env->make('Car.UserChunks.SearchChunks', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         </div>

       </div>
     </div>
     <div class="tab-pane" id="SearchAreaTabs-5" role="tab-panel">
      <div class="theme-search-area theme-search-area-stacked">
        <div class="theme-search-area-form">
          <div class="row" data-gutter="none">
            <div class="col-md-4 ">
              <div class="theme-search-area-section first theme-search-area-section-curved theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                <div class="theme-search-area-section-inner">
                  <i class="theme-search-area-section-icon lin lin-location-pin"></i>
                  <input class="theme-search-area-section-input typeahead" type="text" placeholder="Destination" data-provide="typeahead"/>
                </div>
              </div>
            </div>
            <div class="col-md-7 ">
              <div class="row" data-gutter="none">
                <div class="col-md-4 ">
                  <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                    <div class="theme-search-area-section-inner">
                      <i class="theme-search-area-section-icon lin lin-calendar"></i>
                      <input class="theme-search-area-section-input datePickerStart _mob-h" value="Wed 06/27" type="text" placeholder="Check-in"/>
                      <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                    <div class="theme-search-area-section-inner">
                      <i class="theme-search-area-section-icon lin lin-calendar"></i>
                      <input class="theme-search-area-section-input datePickerEnd _mob-h" value="Mon 07/02" type="text" placeholder="Check-out"/>
                      <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"/>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 ">
                  <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr quantity-selector" data-increment="Guests">
                    <div class="theme-search-area-section-inner">
                      <i class="theme-search-area-section-icon lin lin-people"></i>
                      <input class="theme-search-area-section-input" value="2 Guests" type="text"/>
                      <div class="quantity-selector-box" id="ExpSearchGuests">
                        <div class="quantity-selector-inner">
                          <p class="quantity-selector-title">Guests</p>
                          <ul class="quantity-selector-controls">
                            <li class="quantity-selector-decrement">
                              <a href="#">&#45;</a>
                            </li>
                            <li class="quantity-selector-current">1</li>
                            <li class="quantity-selector-increment">
                              <a href="#">&#43;</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1 ">
              <button class="theme-search-area-submit _mt-0 theme-search-area-submit-no-border theme-search-area-submit-curved">Search</button>
            </div>
          </div>
        </div>
        <div class="theme-search-area-options _mob-h theme-search-area-options-white theme-search-area-options-dot-primary-inverse clearfix">
          <div class="btn-group theme-search-area-options-list" data-toggle="buttons">
            <label class="btn btn-primary active">
              <input type="radio" name="exp-options" id="exp-option-1" checked/>Any
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="exp-options" id="exp-option-2"/>Experiences
            </label>
            <label class="btn btn-primary">
              <input type="radio" name="exp-options" id="exp-option-3"/>Immersions
            </label>
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
</div>

   <!--  <div class="row row-col-border-white" data-gutter="0">
      <div class="col-md-3 ">
        <div class="banner banner-">
          <img class="banner-img" src="./img/600x413.png" alt="Image Alternative text" title="Image Title"/>
          <a class="banner-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="banner banner-">
          <img class="banner-img" src="./img/600x413.png" alt="Image Alternative text" title="Image Title"/>
          <a class="banner-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="banner banner-">
          <img class="banner-img" src="./img/600x413.png" alt="Image Alternative text" title="Image Title"/>
          <a class="banner-link" href="#"></a>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="banner banner-">
          <img class="banner-img" src="./img/600x413.png" alt="Image Alternative text" title="Image Title"/>
          <a class="banner-link" href="#"></a>
        </div>
      </div>
    </div> -->
    <div class="theme-hero-area">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg-pattern theme-hero-area-bg-pattern-ultra-light" style="background-image:url(img/patterns/travel/2.png);"></div>
        <div class="theme-hero-area-grad-mask"></div>
        <div class="theme-hero-area-inner-shadow theme-hero-area-inner-shadow-light"></div>
      </div>
    <!--   <div class="theme-hero-area-body">
        <div class="theme-page-section theme-page-section-xxl">
          <div class="container">
            <div class="theme-page-section-header theme-page-section-header-white">
              <h5 class="theme-page-section-title">Cities to Travel</h5>
              <p class="theme-page-section-subtitle">The most searched cities in March</p>
            </div>
            <div class="theme-inline-slider row" data-gutter="10">
              <div class="owl-carousel owl-carousel-nav-white" data-items="5" data-loop="true" data-nav="true">
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">Bangkok</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Amet malesuada placerat</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">San Francisco</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Vehicula volutpat porta</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">Paris</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Commodo mattis id</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">London</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Adipiscing metus quis</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">New York</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Donec nam placerat</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">Dubai</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Curabitur habitasse porttitor</p>
                    </div>
                  </div>
                </div>
                <div class="theme-inline-slider-item">
                  <div class="banner _h-40vh _br-3 _bsh-xs banner-animate banner-animate-mask-in banner-animate-slow">
                    <div class="banner-bg" style="background-image:url(./img/400x500.png);"></div>
                    <div class="banner-mask"></div>
                    <a class="banner-link" href="#"></a>
                    <div class="banner-caption _p-20 _bg-w banner-caption-bottom banner-caption-dark">
                      <h5 class="banner-title _fs _fw-b">Tokyo</h5>
                      <p class="banner-subtitle _fw-n _mt-5">Feugiat lobortis tortor</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>


    <div class="theme-page-section theme-page-section-xxl">
      <div class="container">
        <div class="theme-page-section-header">
          <h5 class="theme-page-section-title">Top Destinations</h5>
          <p class="theme-page-section-subtitle">The most searched countries in March</p>
        </div>
        <div class="row row-col-gap" data-gutter="10">
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $des): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($loop->iteration==1){ ?>    
            <div class="col-md-4 ">


            <?php  } 
            elseif($loop->iteration==2){ ?> 
              <div class="col-md-8 ">


              <?php  } else { ?>
                <div class="col-md-3 ">


                <?php } ?>
                <div class="banner _h-33vh _br-3 banner-animate banner-animate-mask-in banner-animate-very-slow banner-animate-zoom-in">
                  <div class="banner-bg" style="background-image:url(<?php echo e('destination/'.$des->des_folder.'/'.$des->des_pic); ?>);"></div>
                  <form  action="<?php echo e(URL('destination_show')); ?>" id="formId<?php echo e($des->city_id); ?>" method="post" id="upload" enctype="multipart/form-data">
                    <div class="banner-mask"></div>

                    <a class="banner-link" onClick='submitDetailsForm(<?php echo e($des->city_id); ?>)'></a>


                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <input type="hidden" name="city" value="<?php echo e($des->city_id); ?>">
                    <input type="hidden" name="des_session" value="<?php echo e($des->city_id); ?>">


                  </form>
                  <div class="banner-caption _pt-100 banner-caption-bottom banner-caption-grad">
                    <h5 class="banner-title"><?php echo e($des->city); ?></h5>
                    <p class="banner-subtitle"><?php echo e($des->title); ?></p>
                  </div>
                </div>
              </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
          </div>
        </div>
        <div class="theme-hero-area">
          <div class="theme-hero-area-bg-wrap">
            <div class="theme-hero-area-bg" style="background-image:url(./img/backphone.jpg);"></div>
            <div class="theme-hero-area-inner-shadow theme-hero-area-inner-shadow-light"></div>
          </div>
          <div class="theme-hero-area-body">
            <div class="container">
              <div class="theme-page-section _p-0">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                    <div class="theme-mobile-app">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="theme-mobile-app-section">
                            <div class="theme-mobile-app-body">
                              <div class="theme-mobile-app-header">
                                <h2 class="theme-mobile-app-title">Download our app</h2>
                                <p class="theme-mobile-app-subtitle">Book and manage your trips on the go. Be notified of our hot deals and offers.</p>
                              </div>
                              <ul class="theme-mobile-app-btn-list">
                                <li>
                                  <a class="btn btn-dark theme-mobile-app-btn" href="#">
                                    <i class="theme-mobile-app-logo">
                                      <img src="img/brands/apple.png" alt="Image Alternative text" title="Image Title"/>
                                    </i>
                                    <span>Coming Soon
                                      <br/>
                                      <span>App Store</span>
                                    </span>
                                  </a>
                                </li>
                                <li>
                                  <a class="btn btn-dark theme-mobile-app-btn" href="#">
                                    <i class="theme-mobile-app-logo">
                                      <img src="img/brands/play-market.png" alt="Image Alternative text" title="Image Title"/>
                                    </i>
                                    <span>Coming Soon
                                      <br/>
                                      <span>Play Store</span>
                                    </span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="theme-mobile-app-section"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script language="javascript" type="text/javascript">
          function submitDetailsForm(str) {
            $('#formId'+str).submit();

          }
        </script>

        <script type="text/javascript">


          var today = new Date();
          var dd = today.getDate();

          var mm = today.getMonth()+1; 
          var yyyy = today.getFullYear();



          var date = new Date();

          var day = date.getDate(),
          month = date.getMonth() + 1,
          year = date.getFullYear();


          var today = year + "-" + day + "-" + month;
          document.getElementById('d7').value = today; 
          document.getElementById('d8').value = today;      

          document.getElementById("d8").min=document.getElementById('d7').value;
          $('#d7').change(function(){



            document.getElementById("d8").min=document.getElementById('d7').value;




          });
          document.getElementById('d3').value = today; 
          document.getElementById('d4').value = today;      

          document.getElementById("d4").min=document.getElementById('d3').value;
          $('#d3').change(function(){



            document.getElementById("d4").min=document.getElementById('d3').value;




          });
          document.getElementById('d5').value = today; 
          document.getElementById('d6').value = today;      

          document.getElementById("d6").min=document.getElementById('d5').value;
          $('#d5').change(function(){



            document.getElementById("d6").min=document.getElementById('d5').value;




          });
        </script>
        <?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>