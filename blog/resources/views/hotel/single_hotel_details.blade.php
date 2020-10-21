@extends('layout.master')
@section('content')
@foreach($data as $d)
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action"style="background-image: url('{{ URL::asset('hotel_images/'.$d->foldername.'/'.$d->main_header) }}'); !important;" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body" style="height: auto;">
    <div class="container">
      <div class="theme-item-page-header _pt-150 _pb-50 theme-item-page-header-white">
        <div class="theme-item-page-header-body">
         @include('hotel.UserChunks.StarRattingForDeatil')
         <h1 class="theme-item-page-header-title">{{$d->hotel_name}}</h1><div class="theme-item-page-header-price">
          <p class="theme-item-page-header-price-body">
            <span>from</span>
            <b>PKR {{$d->room_price_night}}</b><br>
            <span>Per Night</span>
          </p>
          <a class="btn _tt-uc btn-primary-inverse" data-scroll href="#booking-scroll">Show Rooms</a>
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
          $dir_path = 'hotel_images/'.$d->foldername;
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
                  <img src="{{ URL::asset($var) }}" alt="Los Angeles"  data-fit="cover">
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
              <li></li>
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
                      <?php if($f->parking_opt=="Paid"){
                        ?>
                        Range:{{$f->range}}<br>
                        Type:{{$f->internet_type}}<br>
                        Charges:{{$f->internet_charges}}<br>
                      <?php   } ?>
                      <?php if($f->parking_opt=="No"){

                        echo "Internet Is Not Available";
                      }
                      ?>
                    </p>
                  </div>
                </div>
                @endforeach
                <?php $i=0;$name=""; ?>
                @foreach($hotel_sel_features as $f)
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
            <div class="theme-reviews-list">
              @foreach($hotel_reviews as $rv)
              <article class="theme-reviews-item">
                <div class="row" data-gutter="10">
                  <div class="col-md-3 ">
                    <div class="theme-reviews-item-info">
                      <img class="theme-reviews-item-avatar" src="/img/70x70.png" alt="Image Alternative text" title="Image Title"/>
                      <p class="theme-reviews-item-date">{{\Carbon\Carbon::parse($rv->created_at)->format('d F Y')}}</p>
                      <p class="theme-reviews-item-author">{{$rv->name}}</p>
                    </div>
                  </div>
                  <div class="col-md-9 ">
                    <div class="theme-reviews-rating">
                      <div class="theme-reviews-rating-header">
                        @include('hotel.UserChunks.hotel_reviews_div')
                      </div>
                      <div class="theme-reviews-item-body">
                        <p class="theme-reviews-item-text">{{$rv->coments}}</p>
                      </div>
                    </div>
                  </div>
                </article>
                @endforeach
                <div class="row">
                  <div class="col-md-9 col-md-offset-3">
                    <a class="theme-reviews-more" href="#">&#x2b; More Reviews</a>
                  </div>
                </div>
              </div>
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
@include('hotel.UserChunks.RoomDiv')
<div class="theme-item-page-rooms-table _p-30 _bg-w _mb-mob-30" style="margin-top: 20px;">
  @include('hotel.UserChunks.hotel_review')
</div>
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
<script type="text/javascript">
  $(document).ready(function() {
    gallery_attach();
    function gallery_attach(){
      $('.room_pictures').each(function(index , value){
        var gallery = $(this);

        var galleryImages = $(this).data('items').split(',');
        var items = [];
        for(var i=0;i<galleryImages.length; i++){
          items.push({
            src:galleryImages[i],
            title:''
          });
        }
        gallery.magnificPopup({
          mainClass: 'mfp-fade',
          items:items,
          gallery:{
            enabled:true,
            tPrev: $(this).data('prev-text'),
            tNext: $(this).data('next-text')
          },
          type: 'image'
        });
      });
    }
    $('#search_room_button').on('click',function (){
      $('#room_find_button').hide();
      $('#his_loading').show();
      document.getElementById("his_loading").src="{{ URL::asset('img/5.gif') }}";
      $check_in=$("input[name=Check_in]").val();
      $check_out=$("input[name=Check_out]").val();
      $no_of_rooms=$("input[name=no_of_rooms]").val();
      $no_of_guest=$("input[name=no_of_guest]").val();
      $hotel_id=$("input[name=hotel_id]").val();
      $.ajax({
       url: "{{url('search_for_hotel_room')}}/"+$check_in+ '/' +  $check_out+ '/' + $no_of_rooms+ '/' + $no_of_guest + '/' +$hotel_id,
       type: "get",
       success: function(data) {
        $('#room_find_button').show();
        $('#his_loading').hide();
        $('#room_table_body').empty();
        $('#room_table_body').html(data);
        gallery_attach();

      }
    });
    });
  });
</script>
@include('chunks.googlejs')
@endsection