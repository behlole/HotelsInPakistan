 @extends('layout.master')
 @section('content')
 @include('home.UserChunks.SearchChunks')
 <div class="theme-page-section _pb-0 theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title theme-page-section-title-sm">Premium Homes Listings For You</h5>
    </div>
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
       @foreach($re_data as $d)
       <?php  $varath = 'home_images/'.$d->foldername.'/'.$d->main_header;
       $coming_soon='img/coming_soon.jpg';
       ?>
       <div class="theme-inline-slider-item">
        <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
          <div class="banner _h-20vh _h-mob-30vh banner-">
            <?php   if (file_exists($varath)) { ?>
              <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
            <?php } else{ ?>

              <div class="banner-bg" style="background-image:url(<?php echo($coming_soon);  ?>);"></div>
            <?php } ?>
          </div>
          <div class="theme-search-results-item-grid-body">
            <a class="theme-search-results-item-mask-link" href="{{ URL('home_details',$d->id) }}"></a>
            <div class="theme-search-results-item-grid-header">
              <h5 class="theme-search-results-item-title _fw-n">{{$d->hotel_name }}</h5>
            </div>
            <div class="theme-search-results-item-grid-caption">
              <div class="row" data-gutter="10">
                <div class="col-xs-8 ">
                  <div class="theme-search-results-item-rating">
                   
                   <!-- for printing stars -->
                    @include('home.UserChunks.StarRattingText')
                  @include('home.UserChunks.StarRatting')
                  <p class="theme-search-results-item-rating-title">{{$d->yourRole}}</p>
                   <p class="theme-search-results-item-rating-title">{{$d->city}}</p>
                 </div>
               </div>
               <div class="col-xs-4 ">
                <div class="theme-search-results-item-price">
                  <p class="theme-search-results-item-price-tag">PKR {{$d->home_price}}</p>
                  <p class="theme-search-results-item-price-sign" style="font-size: 9px;

                  text-align: right;">Per Night </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
</div>
<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title theme-page-section-title-sm">Recommended  Homes for You</h5>
    </div> 
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
        @foreach($hot_data as $d)
        <?php  $varath = 'home_images/'.$d->foldername.'/'.$d->main_header;
        ?>
        <div class="theme-inline-slider-item">
          <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
            <div class="banner _h-20vh _h-mob-30vh banner-">
              <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
            </div>
            <div class="theme-search-results-item-grid-body">
              <a class="theme-search-results-item-mask-link" href="{{ URL('home_details',$d->id) }}"></a>
              <div class="theme-search-results-item-grid-header">
                <h5 class="theme-search-results-item-title _fw-n">{{$d->hotel_name }}</h5>
              </div>
              <div class="theme-search-results-item-grid-caption">
                <div class="row" data-gutter="10">
                  <div class="col-xs-8 ">
                    <div class="theme-search-results-item-rating">
                     <?php
                     $rate=0;
                     if($d->reviews_count){
                      $rate=$d->reviews_stars/$d->reviews_count;
                    }
                    ?>
                    <!-- for printing stars -->
                     @include('home.UserChunks.StarRatting')
                   
                     <p class="theme-search-results-item-rating-title">{{$d->yourRole}}</p>
                     <p class="theme-search-results-item-rating-title">{{$d->city}}</p>
                   </div>
                 </div>
                 <div class="col-xs-4">
                  <div class="theme-search-results-item-price">
                    <p class="theme-search-results-item-price-tag">PKR {{$d->home_price}}</p>
                    <p class="theme-search-results-item-price-sign" style="font-size: 9px;
                         text-align: right;">Per Night</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
@endsection