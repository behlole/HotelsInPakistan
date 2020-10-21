<div class="_mob-h" >
 @include('home.UserChunks.ProgressBarSearch')
 <?php $adloop=0;?>
 @foreach($data as $d)
 @include('Ads.InListing')
 <div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
   <?php    $check=App\booking::check_home_booking($d->id);
   ?>
   <a class="theme-search-results-item-mask-link" href="{{ URL('home_details',$d->id) }}"></a>
   <div class="theme-search-results-item-preview">
    <a class="theme-search-results-item-bookmark theme-search-results-item-bookmark-top" href="#">
      <i class="fa fa-bookmark"></i>
      <span>Add Favorites</span>
    </a> 
    <div class="row" data-gutter="20">
      <div class="col-md-5 ">
        <?php  $varath = 'home_images/'.$d->foldername.'/'.$d->main_header;
        ?>
        <div class="theme-search-results-item-img-wrap">
          <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" style="height: 150px; <?php
          if($check=="booked"){
           echo '-webkit-filter: grayscale(100%);
           filter: grayscale(100%)';
         }
         ?>" alt="Image Alternative text" title="Image Title"/>
       </div>
     </div>
     <div class="col-md-5 ">
       
       <h5 class="theme-search-results-item-title _fw-b _mb-20 _fs theme-search-results-item-title-lg">{{$d->hotel_name }}</h5>
       <p style="margin-top: -10px;">{{$d->yourRole}}</p>
       <div class="theme-search-results-item-hotel-rating">
        

         @include('home.UserChunks.StarRattingText')             
         
         @include('home.UserChunks.StarRatting')
       </div>
       <p class="theme-search-results-item-location">
        <i class="fa fa-map-marker"></i>{{$d->city}}
        
        <br> <i class="fa fa-ticket"></i>Booked {{App\booking::check_home_booking_count($d->id)}} Times
      </p>
      <ul class="theme-search-results-item-hotel-features"></ul>
    </div>
    <div class="col-md-2 " style="">
     @if($d->premium_listing_checks>0)
     <span class="badge badge-info">Premium</span>
     @endif
     
     <div class="theme-search-results-item-book" style="margin-top: 30px;">
      <div class="theme-search-results-item-price">
        <p class="theme-search-results-item-price-tag">PKR {{$d->home_price}}</p>
        <p class="theme-search-results-item-price-sign">Per Night</p>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php $adloop++; ?>
@endforeach
{{$data->links()}}
</div>
<div class="_desk-h">
 @foreach($data as $d)
 <?php  $var = 'home_images/'.$d->foldername.'/'.$d->main_header;
 ?>
 <?php
 $check=App\booking::check_home_booking($d->id);
 ?>
 <div class="theme-search-results-item _br-3 _mb-20 _bsh-xl theme-search-results-item-grid">
   <a class="theme-search-results-item-mask-link" href="{{ URL('home_details',$d->id) }}"></a>
   <div class="banner _h-30vh banner-">
    <img class="banner-bg" src="<?php echo($var);  ?>" style=" <?php if($check=="booked"){
     echo '-webkit-filter: grayscale(100%);
     filter: grayscale(100%)';
   }  ?>
   ">
 </div>
 <div class="theme-search-results-item-grid-body">
  <div class="theme-search-results-item-grid-header">
    @include('home.UserChunks.StarRatting')
    <h5 class="theme-search-results-item-title _fs">{{$d->hotel_name }}</h5>
  </div>
  <div class="theme-search-results-item-grid-caption">
    <div class="row" data-gutter="10">
      <div class="col-xs-9 ">
        <div class="theme-search-results-item-hotel-rating">
         <p class="theme-search-results-item-price-tag">PKR {{$d->home_price}}</p>
         <p class="theme-search-results-item-price-sign">day</p>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
@endforeach
{{$data->links()}}
</div>
