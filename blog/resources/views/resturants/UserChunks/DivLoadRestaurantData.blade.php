 <div class="_mob-h" >
  @include('resturants.UserChunks.ProgressBarSearch')
   <?php $adloop=0; ?>
  @foreach($data as $d)
 
   @include('Ads.InListing')
  <div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
    <a class="theme-search-results-item-mask-link" href="{{ URL('resturants_single_details',$d->id) }}"></a>
    <div class="theme-search-results-item-preview">
      <a class="theme-search-results-item-bookmark theme-search-results-item-bookmark-top" href="#">
        <i class="fa fa-bookmark"></i>
        <span>Add Favorites </span>
      </a>
      <div class="row" data-gutter="20">
        <div class="col-md-5 ">
          <?php  $varath = 'resimg/'.$d->pic.'/'.$d->main_pic;
          ?>
          <div class="theme-search-results-item-img-wrap">
            <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" style="height: 150px" alt="Image Alternative text" title="Image Title"/>
          </div>
        </div>
        <div class="col-md-5 ">
         <br>
         <h5 class="theme-search-results-item-title _fw-b  _fs theme-search-results-item-title-lg">{{$d->restaurant_name }}</h5>
         <div class="theme-search-results-item-hotel-rating">
          @include('resturants.UserChunks.StarRattingText')
          @include('resturants.UserChunks.StarRatting')
        </div>
        <p class="theme-search-results-item-location">
          <i  class="fa fa-map-marker"></i>{{$d->city}}<br>
          <i  class="fa fa-cutlery"></i>
          <?php $mytypes = App\Models\Restaurant\restaurant_type_name::selected_types_name($d->id);  ?>
          @foreach($mytypes as $types_name )
          {{$types_name->restaurant_type_names}}&nbsp;
          @endforeach
        </p>
      </div>
      <div class="col-md-2 " style="margin-top: 20px;">
           @if($d->premium_listing_checks>0)
        <span class="badge badge-info">Premium</span>
        @endif
        <div class="theme-search-results-item-book">
          <div class="theme-search-results-item-price">
            <p class="theme-search-results-item-price-sign">Since {{\Carbon\Carbon::parse($d->creation_date)->format('d F Y')}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $adloop=$adloop+1; ?>
@endforeach
{{$data->links()}}
</div>
<div class="_desk-h">
  @foreach($data as $d)
  <?php
  $dir_path = 'resimg/'.$d->pic;
  $extensions_array = array('jpg','png','jpeg');
  $var="";
  $checked=0;
  if(is_dir($dir_path))
  {
    $files = scandir($dir_path);

    for($i = 0; $i < count($files); $i++)
    {
      if($files[$i] !='.' && $files[$i] !='..')
      {

        $file = pathinfo($files[$i]);
        $extension = $file['extension'];

        if(in_array($extension, $extensions_array))
        {
            // show image
          $var=$dir_path.'/'.$files[$i];
          $checked++;
        }
      }
      if($checked!=0){
       $i=count($files);
     }
   }
 }
 ?>
 <div class="theme-search-results-item _br-3 _mb-20 _bsh-xl theme-search-results-item-grid">
  <a class="theme-search-results-item-mask-link" href="{{ URL('resturants_single_details',$d->id) }}"></a>
  <div class="banner _h-30vh banner-">
    <img class="banner-bg" src="<?php echo($var);  ?>">
  </div>
  <div class="theme-search-results-item-grid-body">
    <div class="theme-search-results-item-grid-header">
      <div class="ratting">
       @include('resturants.UserChunks.StarRattingText')
       @include('resturants.UserChunks.StarRatting')
     </div>
     <h5 class="theme-search-results-item-title _fs">{{$d->restaurant_name }}</h5>
   </div>
   <div class="theme-search-results-item-grid-caption">
    <div class="row" data-gutter="10">
      <div class="col-xs-9 ">
        <div class="theme-search-results-item-hotel-rating">
          <p class="theme-search-results-item-hotel-rating-title">
            <b>{{$d->restaurant_type}}</b>
            <br/>{{$d->city}}
          </p>
        </div>
      </div>
      <div class="col-xs-3 ">
        <div class="theme-search-results-item-price">
          <a class="btn btn-primary-inverse btn-block theme-search-results-item-price-btn" href="{{ URL('resturants_single_details',$d->id) }}">Details</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endforeach
{{$data->links()}}
</div>