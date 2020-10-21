@extends('layout.master')
@section('content')
@foreach($cars_opr as $d)
<?php
$caropr_id=$d->id;
?>
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action"style="background-image: url('{{ URL::asset('img/main.png') }}'); !important;" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-item-page-header _pt-150 _pb-50 theme-item-page-header-white">
        <div class="theme-item-page-header-body">
         @include('Car.UserChunks.StarRattingForDeatil')
         <img  width="150" height="100" class="img-rounded" src="{{ URL::asset('caropr_image/'.$d->car_opr_folder.'/'.$d->uploadHeaderPhoto) }}" alt="Image Alternative text" title="Image Title"/>
         <h1 class="theme-item-page-header-title">{{$d->caropr_name}}</h1>
         <div class="theme-item-page-header-price">
          <p class="theme-item-page-header-price-body">
            <span>from</span>
            <b>PKR {{$d->car_price}}</b><br>
            <span>Per Day</span>
          </p>
          <a class="btn _tt-uc btn-primary-inverse" data-scroll href="#booking-scroll">Show Cars</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="theme-page-section theme-page-section-gray">
  <div class="container">
    <div class="row row-col-static" id="sticky-parent">
      <div class="col-md-9">
        <div class="fotorama _mb-30" data-nav="thumbs" data-minwidth="100%" data-arrows="always" data-height="70%" data-fit="cover" data-allowfullscreen="native">
          <?php
          $dir_path = 'caropr_image/'.$d->car_opr_folder;
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
                 if($d->uploadHeaderPhoto!=$files[$i]){
                  $var=$dir_path.'/'.$files[$i];
                  $checked++;
                }
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
              <a class="_ph-30" aria-controls="HotelPageTabs-5" role="tab" data-toggle="tab" href="#HotelPageTabs-5">Reviews</a>
            </li>
            <li role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-6" role="tab" data-toggle="tab" href="#HotelPageTabs-6">Contact</a>
            </li>
          </ul>
          <div class="tab-content _p-30 _bg-w">
            <div class="tab-pane active" id="HotelPageTabs-1" role="tab-panel">
              <div class="theme-item-page-desc">
                <?php echo htmlspecialchars_decode($d->details);
                ?>
              </div>
            </div>
            <div class="tab-pane" id="HotelPageTabs-5" role="tab-panel">
              <div class="theme-reviews">
                @include('Car.UserChunks.UsersReviews')

              </div>
            </div>
            <div class="tab-pane" id="HotelPageTabs-6" role="tab-panel">
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
                <i class="fa fa-envelope theme-item-page-rooms-table-type-feature-list-icon"></i>{{$d->email}}</li>
                <li>
                  <?php if($d->website){ ?>
                    <i class="fa fa-globe theme-item-page-rooms-table-type-feature-list-icon"></i>
                    <a target="_blank" href="{{$d->website}}">{{$d->website}}</a>
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
            
            </ul>

          </div>
        </div>
      </div>
    </div>
    <div id="booking-scroll">
     <!--  <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white">
        <div class="row">
          <div class="col-md-3 ">
            <div class="theme-search-area-header theme-search-area-header-sm">
              <h1 class="theme-search-area-title">Choose Your Car</h1>
              <p class="theme-search-area-subtitle">best prices guaranteed</p>
            </div>
          </div>
          <form  action="{{url('search_cars_agency')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data" style="color:black;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="agency_id" value="{{$d->caropr_id}}">
            <div class="col-md-9 ">
              <div class="theme-search-area-form">
                <div class="row" data-gutter="10">
                  <div class="col-md-11 ">
                    <div class="row" data-gutter="10">
                      <div class="col-md-3 ">
                        <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                          <div class="theme-search-area-section-inner" style="color:white;">
                           <i class="theme-search-area-section-icon lin lin-calendar"></i>
                           <input class="theme-search-area-section-input datePickerStart _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                           <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                         </div>
                       </div>
                     </div>
                     <div class="col-md-3 ">
                      <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                        <div class="theme-search-area-section-inner" style="color:white;">
                         <i class="theme-search-area-section-icon lin lin-calendar"></i>
                         <input class="theme-search-area-section-input datePickerEnd _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                         <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                       </div>
                     </div>
                   </div>
                   <div class="col-md-3 ">
                    <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="BAGS">
                     <div class="theme-search-area-section-inner" style="color: white;" >
                      <i class="theme-search-area-section-icon lin lin-people"></i>
                      <input class="theme-search-area-section-input" value="2 BAGS" type="text" name="bags" style="color: white;" />
                      <div class="quantity-selector-box" id="HotelSearchGuests">
                        <div class="quantity-selector-inner">
                          <p class="quantity-selector-title">BAGS</p>
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
                <div class="col-md-3 ">
                  <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="Passengers">
                    <div class="theme-search-area-section-inner" style="color: white;" >
                      <i class="theme-search-area-section-icon lin lin-people"></i>
                      <input style="font-size: 12px;color: white;" class="theme-search-area-section-input" value="2 Passengers" type="text"/ name="passengers">
                      <div class="quantity-selector-box" id="HotelSearchGuests">
                        <div class="quantity-selector-inner">
                          <p class="quantity-selector-title">TOTAL</p>
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
              <button class="theme-search-area-submit _mt-0 theme-search-area-submit-sm theme-search-area-submit-no-border theme-search-area-submit-curved" type="submit">
                <i class="theme-search-area-submit-icon fa fa-search"></i>
                <span class="_desk-h">Search</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div> -->
</div>

<div class="theme-item-page-rooms-table _p-30 _bg-w _mb-mob-30">
  <table class="table">
    <thead>
      <tr>
        <th>Car type</th>
        <th>Options</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cars as $c)
      <tr>
        <td class="theme-item-page-rooms-table-type">
          <h5 class="theme-item-page-rooms-table-type-title">{{$c->car_title}}</h5>
          <img class="theme-item-page-rooms-table-type-img" src="{{ URL::asset('cars_image/'.$c->car_folder.'/'.$c->car_pic) }}" alt="Image Alternative text" title="Image Title"/>
          <ul class="theme-search-results-item-car-feature-list">
            <li>

              <span>{{$c->model}}</span>
            </li>
            <li>

              <span>{{$c->brand_type_name}}</span>
            </li>
            <li>

              <span>{{$c->fuel}}</span>
            </li>

          </ul>
        </td>


        <td>

         <ul class="theme-search-results-item-car-feature-list">
          <li>
            <i class="fa fa-male"></i>
            <span>{{$c->passengers}}</span>
          </li>
          <li>
            <i class="fa fa-suitcase"></i>
            <span>{{$c->bags}}</span>
          </li>
          <li>
            <i class="fa fa-cog"></i>
            <span>{{$c->transmission_type}}</span>
          </li>
          <li>
            <i class="fa fa-snowflake-o"></i>
            <span>{{$c->ac}}</span>
          </li>
        </ul>
        <br>
        <p style="font-size: 16px;" class="theme-item-page-rooms-table-price-sign">PickUp Points </p>

        <p style="font-size: 12px;" class="theme-item-page-rooms-table">{{$c->details}} </p>
      </td>
      <td class="theme-item-page-rooms-table-price">
        <div>
          <div class="theme-item-page-rooms-table-price-night">
            <p style="font-size: 16px;" class="theme-item-page-rooms-table-price-sign">PKR </p>
            <p class="theme-item-page-rooms-table-price-night-amount">{{$c->car_price}}</p>
            <p class="theme-item-page-rooms-table-price-sign">Per Day </p>
          </div>
          <div class="theme-item-page-rooms-table-price-total">
            <p class="theme-item-page-rooms-table-price-sign">Left Cars
              <br/>{{$c->no_of_cars}}
            </p>

          </div>
        </div>
      </td>
      <td>
        <a class="btn btn-primary-inverse btn-block" href="#">Book now</a>
        <p class="theme-item-page-rooms-table-booking-note">No booking or
          <br/>credit card fees!
        </p>
      </td>
    </tr>
    @endforeach

  </tbody>
</table>
</div>
<div class="theme-item-page-rooms-table _p-30 _bg-w _mb-mob-30" style="margin-top: 20px;">
  @include('Car.UserChunks.CarAgencyReviewDiv')
</div>
</div>
<div class="col-md-3 ">
  <div class="sticky-col">
    @foreach($ads as $img) 

   <div class="theme-ad">
    <a class="theme-ad-link" href="#"></a>
    <p class="theme-ad-sign">{{$img->ads_name}}</p>
    <img class="theme-ad-img" src="{{ URL::asset('resads/'.$img->ads_folder.'/'.$img->ads_pic) }}" alt="Image Alternative text" title="Image Title"/>
  </div>

  @endforeach
</div>
</div>
</div>
</div>
</div>
@endsection
