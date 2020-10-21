@extends('layout.master')
@section('content')
@foreach($data as $d)
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action"style="background-image: url('{{ URL::asset('home_images/'.$d->foldername.'/'.$d->main_header) }}'); !important;" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body" >
    <div class="container">
      <div class="theme-item-page-header _pt-150 _pb-50 theme-item-page-header-white">
        <div class="theme-item-page-header-body">

          @include('home.UserChunks.StarRattingForDeatil')

          <h1 class="theme-item-page-header-title">{{$d->hotel_name}} </h1>
          <div class="theme-item-page-header-price">
            <p class="theme-item-page-header-price-body">
              <span>from</span>
              <b>PKR {{$d->home_price}}</b>
            </p>

            <?php
            $check=App\booking::check_home_booking($d->id);
            if($check!="booked"){
              ?>
              <!-- <a class="btn _tt-uc btn-primary-inverse" href="{{url('bookings_home/'.$d->id)}}">Book Home</a> -->
                <a class="btn _tt-uc btn-primary-inverse" href="#">Book Home</a>

            <?php } else { ?>
              <a class="btn _tt-uc btn-primary-inverse" >Booked</a>
            <?php } ?>
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
        <div class="fotorama _mb-30" data-nav="thumbs" data-minwidth="100%" data-arrows="always"  data-height="70%" data-allowfullscreen="native" data-fit="cover">
          <?php
          $dir_path = 'home_images/'.$d->foldername;
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
                <a class="_ph-30" aria-controls="HotelPageTabs-3" role="tab" data-toggle="tab" href="#HotelPageTabs-3">Facilities</a>
              </li>
              <li role="presentation">
                <a class="_ph-30" aria-controls="HotelPageTabs-5" role="tab" data-toggle="tab" href="#HotelPageTabs-7">Policies</a>
              </li>

              <li role="presentation">
                <a class="_ph-30" aria-controls="HotelPageTabs-5" role="tab" data-toggle="tab" href="#HotelPageTabs-5">Reviews</a>
              </li>
              <li role="presentation">
                <a class="_ph-30" aria-controls="HotelPageTabs-6" role="tab" data-toggle="tab" href="#HotelPageTabs-6">Contact</a>
              </li>
            </ul>
            <div class="tab-content _p-30 _bg-w">
              <div class="tab-pane" id="HotelPageTabs-7" role="tab-panel">
                <div class="theme-item-page-desc">
                  @foreach($hotel_policy as $p)
                  <div class="row">
                    <div class="col-md-3 ">
                      <h5 class="theme-item-page-details-section-title">Rules</h5>
                    </div>
                    <div class="col-md-9 ">
                      <ul class="theme-item-page-details-list _mb-20">
                       <?php if($p->allow_pets=="NO"){ ?>
                        <li>Pets Are Not Allowed</li>
                      <?php } ?>
                      <?php if($p->allow_pets=="YES"){ ?>
                        <li>Pets Are Allowed</li>
                      <?php } ?>
                      <?php if($p->accommodate_children=="NO"){ ?>
                        <li>Accomadate Child Is  Not Allowed</li>
                      <?php }  ?>
                      <?php if($p->accommodate_children=="YES"){ ?>
                        <li>Accomadate Child Is  Allowed</li>
                      <?php }  ?>

                      <li>Check in time is {{$p->check_inForm}} to {{$p->chkinto}}</li>
                      <li>Check out time is {{$p->check_OutForm}} to  {{$p->check_OutTo}}</li>
                    </ul>
                    <p class="theme-item-page-details-text"><h5>Cancellation Policy</h5>
                     {{$p->c_text}}</p>
                   </div>
                 </div>
                 @endforeach
               </div>
             </div>
             <div class="tab-pane active" id="HotelPageTabs-1" role="tab-panel">
              <div class="theme-item-page-desc">
                <div class="row">

                  <?php echo htmlspecialchars_decode($d->details);
                  ?>
                  
                </div>
              </div>
            </div>
            <div class="tab-pane" id="HotelPageTabs-2" role="tab-panel">
              <div class="theme-item-page-map google-map" id="MyMapLOC"></div>
              <input type="hidden" id="lat" name="lat"   class="form-control" readonly="" value="{{$d->lat}}" >
              <input type="hidden" id="long" name="long"  class="form-control"  readonly="" value="{{$d->long}}">
              <input type="text" class="form-control" id="location_name" readonly="" placeholder="">
            </div>
            <div class="tab-pane " id="HotelPageTabs-3" role="tab-panel">
              <?php $i=2;
              if($i==2){
                ?>
                <div class="row">
                <?php }
                ?>
                @foreach($features as $f)
                <div class="col-md-3 ">
                  <div class="theme-item-page-facilities-item">
                    <i class="fa fa-car theme-item-page-facilities-item-icon"></i>
                    <h5 class="theme-item-page-facilities-item-title">Parking</h5>
                    <p class="theme-item-page-facilities-item-body">
                      <?php if($f->parking_opt=="Free"){
                        ?>
                        Parking:{{$f->parking_opt}}<br>
                        Parking Type:{{$f->parking_type}}<br>
                        Parking Site:{{$f->parking_site}}<br>
                      <?php  }
                      ?>
                      <?php if($f->parking_opt=="Paid"){
                        ?>
                        Parking:{{$f->parking_opt}}<br>
                        Parking Type:{{$f->parking_type}}<br>
                        Parking Site:{{$f->parking_site}}<br>
                        Charges:{{$f->parking_charges}}<br>
                      <?php   } ?>
                      <?php if($f->parking_opt=="No"){
                        echo "Parking Is Not Available";
                      }
                      ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <div class="theme-item-page-facilities-item">
                    <i class="fa fa-wifi theme-item-page-facilities-item-icon"></i>
                    <h5 class="theme-item-page-facilities-item-title">Internet</h5>
                    <p class="theme-item-page-facilities-item-body">
                      <?php if($f->net_options=="Free"){
                        ?>
                        INTERNET is FREE<br>
                        Range:{{$f->range}}<br>
                        Type:{{$f->internet_type}}<br>
                      <?php  }
                      ?>
                      <?php if($f->net_options=="Paid"){
                        ?>
                        Range:{{$f->range}}<br>
                        Type:{{$f->internet_type}}<br>
                        Charges:{{$f->internet_charges}}<br>
                      <?php   } ?>
                      <?php if($f->net_options=="No"){
                        echo "Internet Is Not Available";
                      }
                      ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-3 ">
                  <div class="theme-item-page-facilities-item">
                    <i class="fa fa-wifi theme-item-page-facilities-item-icon"></i>
                    <h5 class="theme-item-page-facilities-item-title">Spoken Languages</h5>
                    <p class="theme-item-page-facilities-item-body">
                      @foreach(unserialize($f->language) as $lng)
                      {{$lng}}<br>
                      @endforeach
                    </p>
                  </div>
                </div>
                @endforeach
                <?php $i=0;$name=""; ?>
                @foreach($home_sel_features as $f)
                <?php if($i==0){
                  $name=$f->facilities_type;
                  $i++;
                  ?> 
                  <div class="col-md-3">
                   <i class="{{$f->fa_main}}"></i>
                   <h5 class="theme-item-page-facilities-item-title"><?php echo $f->facilities_type; ?></h5>
                   <p class="theme-item-page-facilities-item-body">{{$f->name}}
                     <br>
                   <?php }
                   else{
                    if($name==$f->facilities_type){
                      ?>{{$f->name}}
                      <br>
                      <?php
                    }
                    else{
                      $name=$f->facilities_type;
                      $i=0;
                      ?>
                    </p>
                  </div>
                  <?php
                }
              }
              ?>
              @endforeach
              <?php if($i>0){
               echo "</div>";
             }
             ?>
           </div>
         </div>
         <div class="tab-pane" id="HotelPageTabs-5" role="tab-panel">
          <div class="theme-reviews">
            @include('home.UserChunks.SingleDetailsReviews')
            
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
              <?php if($d->facebookPage){ ?>
               <li>
                <i class="fa fa-facebook theme-item-page-rooms-table-type-feature-list-icon"></i>
                <a target="_blank" href="{{$d->facebookPage}}">{{$d->facebookPage}}</a>
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
<div class="theme-payment-page-sections-item" style="background-color: white;padding: 20px;">
  
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
   <form action="{{url('add_hotel_review/'.$d->id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-12" >
     @if (session('status_err'))
     <div class="alert alert-danger">
      {{ session('status_err') }}
    </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="comment-form">
      <h3>Leave a Review</h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Name*" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile No" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <input type="text" class="form-control" id="email2" name="email" placeholder="Your Email*" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="select-filters">
              <select name="rattings" class="form-control"  id="sort-price">
                <option value="" selected="">Rating</option>
                <option value="1">1 *</option>
                <option value="2">2 **</option>
                <option value="3">3 ***</option>
                <option value="4">4 ****</option>
                <option value="5">5 *****(Excelent)</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <textarea class="form-control" id="message" name="comments" placeholder="Your Comment*" rows="5"></textarea>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <input type="text" class="form-control" id="verify_booking2" name="verify" placeholder="Are you human? 5 + 1 =">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
           <p>*Your Mobile No And Email Will Not Be Share with Anyone</p>
         </div>
       </div>
       <div class="col-sm-12">
        <button type="submit" name="submit" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Submit Review</button>
      </div>
    </div>
  </div>
</div>
</form>
</div>
</div>
</div>


</div>
<div class="col-md-3">
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
