 @extends('layout.master')
 @section('content')
 @include('hotel.UserChunks.SearchChunks')
 <div class="theme-page-section _pb-0 theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title theme-page-section-title-sm">Premium Hotels For You</h5>
    </div>
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
       @foreach($re_data as $d)
       <?php  $varath = 'hotel_images/'.$d->foldername.'/'.$d->main_header;
       ?>
       <div class="theme-inline-slider-item">
         <a class="theme-search-results-item-mask-link" href="{{ URL('hotel_details',$d->id) }}"></a>
         <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
          <div class="banner _h-20vh _h-mob-30vh banner-">
            <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
          </div>
          <div class="theme-search-results-item-grid-body">
            <a class="theme-search-results-item-mask-link" href="{{ URL('hotel_details',$d->id) }}"></a>
            <div class="theme-search-results-item-grid-header">
              <h5 class="theme-search-results-item-title _fw-n">{{$d->hotel_name }}</h5>
            </div>
            <div class="theme-search-results-item-grid-caption">
              <div class="row" data-gutter="10">
                <div class="col-xs-9 ">
                  <div class="theme-search-results-item-rating">
                   @include('hotel.UserChunks.StarRattingText')
                   @include('hotel.UserChunks.StarRatting')
                   <p class="theme-search-results-item-rating-title">{{$d->yourRole}}</p>
                   <p class="theme-search-results-item-rating-title">{{$d->city}}</p>
                   </div>
                 </div>
               <div class="col-xs-3 ">
                <div class="theme-search-results-item-price">
                  <p class="theme-search-results-item-price-tag" >PKR &nbsp;{{$d->room_price_night}}</p>
                  <p class="theme-search-results-item-price-sign">Per Night</p>
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
      <h5 class="theme-page-section-title theme-page-section-title-sm">Recommended Hotels for You</h5>
    </div> 
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
        @foreach($hot_data as $d)
        <?php  $varath = 'hotel_images/'.$d->foldername.'/'.$d->main_header;
        ?>
        <div class="theme-inline-slider-item">
          <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
            <div class="banner _h-20vh _h-mob-30vh banner-">
              <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
            </div>
            <div class="theme-search-results-item-grid-body">
              <a class="theme-search-results-item-mask-link" href="{{ URL('hotel_details',$d->id) }}"></a>
              <div class="theme-search-results-item-grid-header">
                <h5 class="theme-search-results-item-title _fw-n">{{$d->hotel_name }}</h5>
              </div>
              <div class="theme-search-results-item-grid-caption">
                <div class="row" data-gutter="10">
                  <div class="col-xs-9 ">
                    <div class="theme-search-results-item-rating">
                     @include('hotel.UserChunks.StarRattingText')
                     @include('hotel.UserChunks.StarRatting')
                     <p class="theme-search-results-item-rating-title">{{$d->yourRole}}</p>
                     <p class="theme-search-results-item-rating-title">{{$d->city}}</p>
                   </div>
                 </div>
                 <div class="col-xs-3 ">
                  <div class="theme-search-results-item-price">
                    <p class="theme-search-results-item-price-tag">PKR &nbsp;{{$d->room_price_night}}</p>
                    <p class="theme-search-results-item-price-sign">Per Night</p>
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