 @extends('layout.master')
 @section('content')
 @include('resturants.UserChunks.headerSerach')
 <div class="theme-page-section _pb-0 theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title theme-page-section-title-sm">Premium Restaurants  For You</h5>
    </div>
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
        @foreach($re_data as $d)
        <?php  $varath = 'resimg/'.$d->pic.'/'.$d->main_pic;
        ?>
        <div class="theme-inline-slider-item">
          <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
            <div class="banner _h-20vh _h-mob-30vh banner-">
              <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
            </div>
            <div class="theme-search-results-item-grid-body">
              <a class="theme-search-results-item-mask-link" href="{{ URL('resturants_single_details',$d->id) }}"></a>
              <div class="theme-search-results-item-grid-header">
               <h5 class="theme-search-results-item-title _fw-n" style="height: 20px;">{{$d->restaurant_name }}</h5>
               <span style="">{{$d->city}}</span>
             </div>
              <p class="theme-search-results-item-location">
                   <i  class="fa fa-cutlery"></i>
          <?php $mytypes = App\Models\Restaurant\restaurant_type_name::selected_types_name($d->id);  ?>
          @foreach($mytypes as $types_name )
          {{$types_name->restaurant_type_names}}&nbsp;
          @endforeach
        </p>
             <div class="theme-search-results-item-grid-caption">
              <div class="row" data-gutter="10">
                <div class="col-xs-9 ">
                  <div class="theme-search-results-item-rating">
                    @include('resturants.UserChunks.StarRattingText')
                    @include('resturants.UserChunks.StarRatting')
                    <p class="theme-search-results-item-rating-title">{{$d->restaurant_type}}</p>
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
      <h5 class="theme-page-section-title theme-page-section-title-sm">Recommended  Restaurants  for You</h5>
    </div>
    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
        @foreach($hot_data as $d)
        <?php  $varath = 'resimg/'.$d->pic.'/'.$d->main_pic;
        ?>
        <div class="theme-inline-slider-item">
          <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
            <div class="banner _h-20vh _h-mob-30vh banner-">
              <div class="banner-bg" style="background-image:url(<?php echo($varath);  ?>);"></div>
            </div>
            <div class="theme-search-results-item-grid-body">
              <a class="theme-search-results-item-mask-link" href="{{ URL('resturants_single_details',$d->id) }}"></a>
              <div class="theme-search-results-item-grid-header">
                <h5 class="theme-search-results-item-title _fw-n" style="height: 20px;">{{$d->restaurant_name }}</h5>
                <span style="">{{$d->city}}</span>

              </div>
               <p class="theme-search-results-item-location">
                   <i  class="fa fa-cutlery"></i>
          <?php $mytypes = App\Models\Restaurant\restaurant_type_name::selected_types_name($d->id);  ?>
          @foreach($mytypes as $types_name )
          {{$types_name->restaurant_type_names}}&nbsp;
          @endforeach
        </p>
              <div class="theme-search-results-item-grid-caption">
                <div class="row" data-gutter="10">
                  <div class="col-xs-9 ">
                    <div class="theme-search-results-item-rating">
                      @include('resturants.UserChunks.StarRattingText')
                      @include('resturants.UserChunks.StarRatting')
                      <p class="theme-search-results-item-rating-title"></p>
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