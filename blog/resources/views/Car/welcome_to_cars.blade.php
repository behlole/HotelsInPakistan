 @extends('layout.master')
 @section('content')
 @include('Car.UserChunks.headerSerach')
 <div class="theme-page-section _pb-0 theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title theme-page-section-title-sm">Premium  Cars For You</h5>
    </div>

    <div class="theme-inline-slider row" data-gutter="10">
      <div class="owl-carousel" data-items="5" data-loop="true" data-nav="true">
       @foreach($data as $d)
       <?php  $varath = 'caropr_image/'.$d->car_opr_folder.'/'.$d->ageny_logo;
       ?>
       <div class="theme-inline-slider-item">
        <div class="theme-search-results-item _br-2 theme-search-results-item-grid">
          <div class="banner _h-20vh _h-mob-30vh banner-">
            <img style="" class="img-responsive" src="<?php echo($varath);  ?>" alt="{{$d->caropr_name}}" title="Image Title"/>
          </div>
          <div class="theme-search-results-item-grid-body">
            <a class="theme-search-results-item-mask-link" href="{{ URL('all_car_by_agency',$d->id) }}"></a>
            <div class="theme-search-results-item-grid-header">
              <h5 class="theme-search-results-item-title _fw-n">{{$d->caropr_name}}</h5>
            </div>
            <div class="theme-search-results-item-grid-caption">
              <div class="row" data-gutter="10">
                <div class="col-xs-9 ">
                  <div class="theme-search-results-item-rating">
                    @include('Car.UserChunks.StarRattingText')
                    @include('Car.UserChunks.StarRatting')
                   <p class="theme-search-results-item-rating-title">{{$d->yourRole}}</p>
                   <p class="theme-search-results-item-rating-title">{{$d->city}}</p>
                 </div>
               </div>
               <div class="col-xs-3 ">
                <div class="theme-search-results-item-price">
                  <p class="theme-search-results-item-price-tag">PKR {{App\Models\Car\car_opr::price_find($d->id)}}</p>
                  <p class="theme-search-results-item-price-sign">Per Day</p>
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
