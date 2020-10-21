 <div class="_mob-h">
    @include('Car.UserChunks.ProgressBarSearch')
  @foreach($cars as $d)
  <?php  $varath = 'cars_image/'.$d->car_folder.'/'.$d->car_pic;
  $varath2 = 'caropr_image/'.$d->car_opr_folder.'/'.$d->ageny_logo;
  ?>
  <div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
    <div class="theme-search-results-item-preview">
      <a class="theme-search-results-item-mask-link" href="{{ URL('all_car_by_agency',$d->caropr_id) }}"></a>
      <div class="row" data-gutter="20">
        <div class="col-md-4 ">
          <div class="theme-search-results-item-img-wrap">
            <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" alt="Image Alternative text" title="Image Title"/>
          </div>
          <ul class="theme-search-results-item-car-feature-list">
            <li>
              <i class="fa fa-male"></i>
              <span>{{$d->passengers}}</span>
            </li>
            <li>
              <i class="fa fa-suitcase"></i>
              <span>{{$d->bags}}</span>
            </li>
            <li>
              <i class="fa fa-cog"></i>
              <span>{{$d->transmission_type}}</span>
            </li>
            <li>
              <i class="fa fa-snowflake-o"></i>
              <span>{{$d->ac}}</span>
            </li>
          </ul>
        </div>
        <div class="col-md-5 ">
          <h5 class="theme-search-results-item-title _fw-b _mb-20 _fs theme-search-results-item-title-lg">{{$d->car_title}}</h5>
          <div class="theme-search-results-item-car-location">
            <i class="fa fa-plane theme-search-results-item-car-location-icon"></i>
            <div class="theme-search-results-item-car-location-body">
              <p class="theme-search-results-item-car-location-title">{{$d->details}}</p>
              <p class="theme-search-results-item-car-location-subtitle">{{$d->city}}</p>
            </div>
          </div>
          <ul class="theme-search-results-item-car-list">
            <li>
              <i class="fa fa-check"></i>{{$d->model}}
            </li>
            <li>
              <i class="fa fa-check"></i>{{$d->brand_type_name}}
            </li>
            <li>
              <i class="fa fa-check"></i>{{$d->fuel}}
            </li>
             <li>
              <i class="fa fa-check"></i>{{$d->vehicle_type_name}}
            </li>
          </ul>
        </div>
        <div class="col-md-3 ">
          <div class="theme-search-results-item-book">
            <div class="theme-search-results-item-price">
              <p class="theme-search-results-item-price-tag">PKR {{$d->car_price}}</p>
              <p class="theme-search-results-item-price-sign">Per Day</p>
            </div>
          </div>
          <div class="theme-search-results-item-book">
           <img style="display: block;
           margin-left: auto;
           margin-right: auto;" class="img-responsive" width="150" height="150" src="<?php echo($varath2);  ?>" alt="{{$d->caropr_name}}" title="Image Title"/>
           <div style="margin-left: 3px;margin-top:2px; ">
           @include('Car.UserChunks.StarRattingText')             

           @include('Car.UserChunks.StarRatting')
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 @endforeach
 {{$cars->links()}}
</div>
<div class="_desk-h">
 @foreach($cars as $d)
 <?php  $varath = 'cars_image/'.$d->car_folder.'/'.$d->car_pic;
 $varath2 = 'caropr_image/'.$d->car_opr_folder.'/'.$d->ageny_logo;
 ?>
 <div class="theme-search-results-item _br-3 _mb-20 _bsh-xl theme-search-results-item-grid">
  <div class="_h-30vh theme-search-results-item-img-wrap-inner">
    <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" alt="Image Alternative text" title="Image Title"/>
  </div>
  <div class="theme-search-results-item-grid-body _pt-0">
    <a class="theme-search-results-item-mask-link" href="{{ URL('all_car_by_agency',$d->caropr_id) }}"></a>
    <div class="theme-search-results-item-grid-header">
      <h5 class="theme-search-results-item-title _fs">{{$d->car_title}}</h5>
    </div>
    <div class="theme-search-results-item-grid-caption">
      <div class="row" data-gutter="10">
        <div class="col-xs-9 ">
          <div class="theme-search-results-item-car-location">
            <i class="fa fa-plane theme-search-results-item-car-location-icon"></i>
            <div class="theme-search-results-item-car-location-body">
              <p class="theme-search-results-item-car-location-title">{{$d->details}}</p>
              <p class="theme-search-results-item-car-location-subtitle">{{$d->city}}</p>
              <p class="theme-search-results-item-car-location-subtitle">{{$d->caropr_name}}</p>
            </div>
          </div>
        </div>
        <div class="col-xs-3 ">
          <div class="theme-search-results-item-price">
            <p class="theme-search-results-item-price-tag">PKR {{$d->car_price}}</p>
            <p class="theme-search-results-item-price-sign">Per Day</p>
          </div>
          <img style="float: right;" class="theme-search-results-item-img" src="<?php echo($varath2);  ?>" alt="Image Alternative text" title="Image Title"/>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
{{$cars->links()}}
</div>