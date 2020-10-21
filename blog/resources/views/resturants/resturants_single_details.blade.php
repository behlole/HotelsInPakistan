@extends('layout.master')

@section('content')
@foreach($data as $d)
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action"style="background-image: url('{{ URL::asset('resimg/'.$d->pic.'/'.$d->main_pic) }}'); !important;" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-item-page-header _pt-150 _pb-50 theme-item-page-header-white">
        <div class="theme-item-page-header-body">
          <div class="rating">
           @include('resturants.UserChunks.StarRattingForDeatil')
           <h1 class="theme-item-page-header-title">{{$d->restaurant_name}}</h1>
           <div class="theme-item-page-header-price" style="color: white;">

            @foreach($restaurant_types as $types_name )
            <b>{{$types_name->restaurant_type_names}}</b>
            &nbsp;
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="theme-page-section theme-page-section-gray">
  <div class="container">
    <div class="row row-col-static" id="sticky-parent">

     <div class="col-md-9 ">
      <div class="fotorama  _mb-30" data-nav="thumbs"  data-click="true" data-minwidth="100%" data-arrows="always" data-height="90%" data-allowfullscreen="native" data-fit="cover" data-autoplay="false">
       
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
                ?>
                <img src="{{ URL::asset($var) }}" alt="Los Angeles" data-fit="cover">

                <?php
              }
            }
          }
        }
        ?>
        @endforeach
      </div>
      <div class="theme-item-page-tabs _mb-30">
        <div class="tabbable">
          <ul class="nav nav-tabs nav-default nav-no-br nav-sqr nav-mob-inline" role="tablist">
            <li class="active" role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-1" role="tab" data-toggle="tab" href="#HotelPageTabs-1">Details</a>
            </li>
            <li role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-2" role="tab" data-toggle="tab" href="#HotelPageTabs-2">Map</a>
            </li>
            <li role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-3" role="tab" data-toggle="tab" href="#HotelPageTabs-3">Reviews</a>
            </li>
            <li role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-3" role="tab" data-toggle="tab" href="#HotelPageTabs-4">Contact</a>
            </li>

          </ul>
          <div class="tab-content _p-30 _bg-w">
            <div class="tab-pane active" id="HotelPageTabs-1" role="tab-panel">
              <div class="theme-item-page-desc">
                <?php echo htmlspecialchars_decode($d->details);
                ?>
              </div>
            </div>
            <div class="tab-pane" id="HotelPageTabs-2" role="tab-panel">
              <div class="theme-item-page-map google-map" id="MyMapLOC"></div>
              <input type="hidden" id="lat" name="lat"   class="form-control" readonly="" value="{{$d->lat}}" >
              <input type="hidden" id="long" name="long"  class="form-control"  readonly="" value="{{$d->long}}">
              <input type="text" class="form-control" id="location_name" readonly="" placeholder="">
            </div>
            <div class="tab-pane" id="HotelPageTabs-3" role="tab-panel">
              <div class="theme-reviews">
                @include('resturants.UserChunks.UsersReviews')

              </div>
            </div>
            <div class="tab-pane" id="HotelPageTabs-4" role="tab-panel">
             <ul class="theme-item-page-rooms-table-type-feature-list" style="font-size: 14px;">
              <li>
                <i class="fa fa-mobile theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->contact}} , {{$d->altcontact}}
              </li>

              <?php if($d->landline){ ?>
                <li>
                  <i class="fa fa-phone  theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->landline}}
                </li>
              <?php } ?>

              <li>
                <i class="fa fa-envelope theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->restaurant_email}}</li>
                <li>
                  <?php if($d->restaurant_website){ ?>
                    <i class="fa fa-globe theme-item-page-rooms-table-type-feature-list-icon"></i>
                    <a target="_blank" href="{{$d->restaurant_website}}">{{$d->restaurant_website}}</a>
                  </li>

                <?php } ?>
                <?php if($d->fb_page){ ?>
                 <li>
                  <i class="fa fa-facebook theme-item-page-rooms-table-type-feature-list-icon"></i>
                  <a target="_blank" href="{{$d->fb_page}}">{{$d->fb_page}}</a>
                </li>
              <?php } ?>
              <?php if($d->address){ ?>
                <li>
                  <i class="fa fa-address-card-o theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->address}}
                </li>
              <?php } ?>

              <?php if($d->google_map_addrs){ ?>
               <li>
                <i class="fa fa-map-marker theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->google_map_addrs}}
              </li>
            <?php } ?>
            <li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    @auth
    @include('Review.review')
    @endauth
  </div>
  <div class="col-md-3 ">
    <div class="sticky-col">
     @include('Ads.Ads_Single_Page')
   </div>
 </div>
</div>
</div>
</div>
@endsection
@section('javabee')
@include('chunks.googlejs')
@endsection