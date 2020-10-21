@extends('layout.master')

@section('content')
@foreach($data as $d)
<div class="theme-hero-area">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action"style="background-image: url('{{ URL::asset('hotel_images/'.$d->foldername.'/'.$d->main_header) }}'); !important;" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body" style="height: 60%;">
    <div class="container">
      <div class="theme-item-page-header _pt-150 _pb-50 theme-item-page-header-white">
        <div class="theme-item-page-header-body">
         <?php
         $rate=0;
         if($d->reviews_count){
          $rate=$d->reviews_stars/$d->reviews_count;
        }



        ?>
        <div class="rating" style="color: white;font-size: 16px;font-weight: 600;">
         <div class="ratting">


          <?php 
          if($rate!=0){

            if($rate>=1&&$rate<1){



              ?>
              <i class="fa fa-star"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>
              <i class="fa fa-star-o"></i>


              <?php  

            }
            ?>
            <?php 

            if($rate>=1&&$rate<2){



              ?>
              <i class="fa fa-star"></i>
              <?php if($rate<1.5){ ?>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
              <?php }
              if($rate>=1.5){ ?>
                <i class="fa fa-star"></i>

                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>


              <?php } ?>

              <?php  

            }
            ?>

            <?php 

            if($rate>=2&&$rate<3){



              ?>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <?php if($rate<2.5){ ?>

                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></
                 <i class="fa fa-star-o"></i>
                 <i class="fa fa-star-o"></i>
               <?php }
               if($rate>=2.5){ ?>
                <i class="fa fa-star"></i>

                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>


              <?php } ?>

              <?php  

            }
            ?>     
            <?php 

            if($rate>=3&&$rate<4){



              ?>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <?php if($rate<3.5){ ?>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
              <?php }
              if($rate>=3.5){  ?>
                <i class="fa fa-star"></i>

                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>


              <?php } ?>


              <?php  

            }
            ?>    
            <?php 

            if($rate>=4&&$rate<=5){



              ?>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <?php if($rate<4.5){ ?>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
              <?php }
              if($rate>=4.5){ ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>

              <?php } ?>

              <?php  

            }
            ?>         




            <span class="review-no">{{$d->reviews_count}}&nbsp;reviews</span>
          <?php }else { ?>
            <span class="review-no">No Rattings Available</span>

            <?php

          } 

          ?>
        </div>


      </div>
      <h1 class="theme-item-page-header-title">{{$d->hotel_name}}</h1>
      <div class="theme-item-page-header-price">


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

        <div class="fotorama _mb-30" data-nav="thumbs" data-minwidth="100%" data-arrows="always" data-allowfullscreen="native">

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



                <img src="{{ URL::asset($var) }}" alt="Los Angeles" style="width:auto;height: 300px;">




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
            <li>

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


          @foreach($features2 as $f)




          <div class="col-md-3 ">
            <div class="theme-item-page-facilities-item">
              <i class="{{$f->fa_main}}"></i>
              <h5 class="theme-item-page-facilities-item-title"><?php echo $f->facilities_type; ?></h5>
              <p class="theme-item-page-facilities-item-body">





               <?php echo htmlspecialchars_decode($f->selected_options);
               ?>


             </p>

           </div>
         </div>
         <?php $i++; 


         if($i==4){
          ?>
        </div>
        <div class="row">
         <?php 
         $i=0;
       }  

       ?>

       @endforeach



       <?php

       if($i>0){
        ?>
      </div>

      <?php
    }  

    ?>






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
                 <?php  if($rv->rattings==1)  {

                   ?>
                   <div class="review_rating">
                    <i class="fa fa-star"></i>

                  </div>

                  <?php 
                }

                ?>
                <?php  if($rv->rattings==2)  {

                 ?>
                 <div class="review_rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>

                </div>

                <?php 
              }

              ?>
              <?php  if($rv->rattings==3)  {

               ?>
               <div class="review_rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>


              </div>

              <?php 
            }

            ?>
            <?php  if($rv->rattings==4)  {

             ?>
             <div class="review_rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>

            </div>

            <?php 
          }

          ?>
          <?php  if($rv->rattings==5)  {

           ?>
           <div class="review_rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i><i class="fa fa-star"></i>
            <i class="fa fa-star"></i><i class="fa fa-star"></i>


          </div>

          <?php 
        }

        ?>

      </div>

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
 <ul class="theme-sidebar-section-features-list">
  <li>
    <h5 class="theme-sidebar-section-features-list-title">Contact</h5>
    <p class="theme-sidebar-section-features-list-body"> {{$d->landline}}</p>
  </li>
  <li>
    <h5 class="theme-sidebar-section-features-list-title">
     Address
   </h5>
   <p class="theme-sidebar-section-features-list-body">
     {{$d->addr_1}} <br>
     {{$d->addr_2}} <br>
     {{$d->street}} <br>
     {{$d->city}} <br>


   </p>
 </li>
</ul>
</div>


</div>
</div>
</div>
          <!--   <div id="booking-scroll">
              <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white">
                <div class="row">
                  <div class="col-md-3 ">
                    <div class="theme-search-area-header theme-search-area-header-sm">
                      <h1 class="theme-search-area-title">Choose Your Room</h1>
                      <p class="theme-search-area-subtitle">best prices guaranteed</p>
                    </div>
                  </div>
                  <div class="col-md-9 ">
                    <div class="theme-search-area-form">
                      <div class="row" data-gutter="10">
                        <div class="col-md-11 ">
                          <div class="row" data-gutter="10">
                            <div class="col-md-3 ">
                              <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                                <div class="theme-search-area-section-inner">
                                  <i class="theme-search-area-section-icon lin lin-calendar"></i>
                                  <input class="theme-search-area-section-input datePickerStart _mob-h" value="Wed 06/27" type="text" placeholder="Check-in"/>
                                  <input class="theme-search-area-section-input _desk-h mobile-picker" value="2018-06-27" type="date"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 ">
                              <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                                <div class="theme-search-area-section-inner">
                                  <i class="theme-search-area-section-icon lin lin-calendar"></i>
                                  <input class="theme-search-area-section-input datePickerEnd _mob-h" value="Mon 07/02" type="text" placeholder="Check-out"/>
                                  <input class="theme-search-area-section-input _desk-h mobile-picker" value="2018-07-02" type="date"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 ">
                              <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="Rooms">
                                <div class="theme-search-area-section-inner">
                                  <i class="theme-search-area-section-icon lin lin-tag"></i>
                                  <input class="theme-search-area-section-input" value="1 Room" type="text"/>
                                  <div class="quantity-selector-box" id="HotelSearchRooms">
                                    <div class="quantity-selector-inner">
                                      <p class="quantity-selector-title">Rooms</p>
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
                              <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="Guests">
                                <div class="theme-search-area-section-inner">
                                  <i class="theme-search-area-section-icon lin lin-people"></i>
                                  <input class="theme-search-area-section-input" value="2 Guests" type="text"/>
                                  <div class="quantity-selector-box" id="HotelSearchGuests">
                                    <div class="quantity-selector-inner">
                                      <p class="quantity-selector-title">Guests</p>
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
                          <button class="theme-search-area-submit _mt-0 theme-search-area-submit-sm theme-search-area-submit-no-border theme-search-area-submit-curved">
                            <i class="theme-search-area-submit-icon fa fa-pencil"></i>
                            <span class="_desk-h">Search</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="theme-item-page-rooms-table _p-30 _bg-w _mb-mob-30">
              <table class="table">
                <thead>
                  <tr>
                    <th>Room type</th>
                    <th>Max</th>
                    <th>Options</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($hotel_room as $room)
                  <tr>

                    <td class="theme-item-page-rooms-table-type">
                      <h5 class="theme-item-page-rooms-table-type-title">{{$room->roomname}}</h5>
                      <img class="theme-item-page-rooms-table-type-img" src="{{ URL::asset('roomiamges/'.$room->foldername.'/'.$room->main_header) }}" alt="Image Alternative text" title="Image Title"/>
                      <ul class="theme-item-page-rooms-table-type-feature-list">

                        <li>
                          <i class="fa fa-arrows-h theme-item-page-rooms-table-type-feature-list-icon"></i>{{$room->room_size}} {{$room->room_unit}}
                        </li>
                       <!--  <li>
                          <i class="fa fa-shower theme-item-page-rooms-table-type-feature-list-icon"></i>Private bathroom
                        </li>
                        <li>
                          <i class="fa fa-wifi theme-item-page-rooms-table-type-feature-list-icon"></i>Free Wifi
                        </li> -->
                      </ul>
                    </td>
                    <td>
                      <ul class="theme-item-page-rooms-table-guests-count">
                        <li>
                          <i class="fa fa-male"></i>
                        </li>
                        <li>
                          <i class="fa fa-male"></i>
                        </li>
                      </ul>
                    </td>
                    <td>


                      <ul class="theme-item-page-rooms-table-options-list">
                        <li>{{$room->smookin_policy}}</li>
                        <li>No Of Room {{$room->no_of_rooms}}

                        </li>

                      </ul>
                    </td>
                    <td class="theme-item-page-rooms-table-price">
                      <div>
                        <div class="theme-item-page-rooms-table-price-night">
                          <p class="theme-item-page-rooms-table-price-sign">Per night</p>
                          <p class="theme-item-page-rooms-table-price-night-amount">{{$room->room_price_night}} </p>
                        </div>
                        <div class="theme-item-page-rooms-table-price-total">
                          <p class="theme-item-page-rooms-table-price-sign">Total price
                            <br/>For {{$room->total_people}} Guests
                          </p>

                        </div>
                      </div>
                      <p class="theme-item-page-rooms-table-price-note">* Discounts already
                        <br/>included in price.
                      </p>
                    </td>
                    <td>
                      <a class="btn btn-primary-inverse btn-block">Book now</a>
                      <p class="theme-item-page-rooms-table-booking-note">No booking or
                        <br/>credit card fees!
                      </p>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white" style="color: black;">
              <div class="row">
                <form action="{{url('inserethotelrev/'.$d->id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="col-md-6" >
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
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Name*" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile No" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="email2" name="email" placeholder="Your Email*" required>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="form-group">
                          <div class="select-filters">
                            <select name="rattings" id="sort-price">
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
                      <div class="col-sm-12">
                        <div class="form-group">
                          <textarea class="form-control" id="message" name="comments" placeholder="Your Comment*" rows="5"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="verify_booking2" name="verify" placeholder="Are you human? 5 + 1 =">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                         <p>*Your Mobile No And Email Will Not Be Share with Anyone</p>
                       </div>
                     </div>

                     <div class="col-sm-12">
                      <button type="submit" name="submit" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>

          </div>
        </div>


      </div>
      <div class="col-md-3 ">
            <div class="sticky-col">
             
             
             <!--   <div class="theme-sidebar-section _mb-10">
               
              </div> -->
              <div class="theme-sidebar-section _mb-10">
                <ul  style="list-style-type: none;">
                
                    
                    
                     
                        @foreach($data as $h)
                                 
                                   <?php  
                                   if($h->hotel_status=="0"){
                                    ?>
                                    <li style="margin-top:20px;" ><a  href="{{ URL('hotel_approvel',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Approve Listing</a>
                                     <p style="font-size:12px;color:black;font-weight:400;">By Approving It Will Be live To Users</p></li>

                                    <?php
                                }

                                if($h->hotel_status=="1"||$h->hotel_status=="2"){
                                    ?>
                                   
                                    <li style="margin-top:20px;" ><a  href="{{ URL('hotel_stop_listing',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Listing</a>
                                     <p style="font-size:12px;color:black;font-weight:400;" >Listing Is Live Now,By Click On "Stop listing" It will No Remain Recommending OR Premiume Listing </p></li>
                                    <?php
                                }
                                
                                 if($h->hotel_status=="4"){
                                    ?>
                                   <li style="margin-top:20px;" ><a  href="{{ URL('hotel_approvel',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Show Listing</a></li>
                                    <?php
                                }
                                



                                if($h->hotel_status=="1"){
                                    ?>
                                  
                                    <li style="margin-top:20px;" ><a  href="{{ URL('hotel_recmnd_listing',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Recommending  listing</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Recommending  It Will Become Recommended Catogory</p></li>
                                      <?php  
                                        if($h->hot_listing=="NO"){
                                    ?>    
                                        <li style="margin-top:20px;" ><a  href="{{ URL('hotel_premiume_listing',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Make It Premiume</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Recommending  It Will Become Premiume Catogory</p></li>

                                    <?php
                                  }
                                   if($h->hot_listing=="YES"){
                                    ?>   

                                      <li style="margin-top:20px;" ><a  href="{{ URL('hotel_premiume_listing_Stop',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Premiume</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Stoping  It Will Remove From Premiume Catogory</p></li>

                              <?php } 

                                }
                                if($h->hotel_status=="2"){
                                    ?>
                                    
                                    <li style="margin-top:20px;" ><a  href="{{ URL('hotel_recmnd_listing_stop',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Recomend</a></li>
                                    <?php  
                                        if($h->hot_listing=="NO"){
                                    ?>    
                                        <li style="margin-top:20px;" ><a  href="{{ URL('hotel_premiume_listing',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Make It Premiume</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Recommending  It Will Become Premiume Catogory</p></li>

                                    <?php
                                  }
                                   if($h->hot_listing=="YES"){
                                    ?>   

                                      <li style="margin-top:20px;" ><a  href="{{ URL('hotel_premiume_listing_Stop',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Premiume</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Stoping  It Will Remove From Premiume Catogory</p></li>

                              <?php } 
                                    
                                }
                                ?>


                                
                                





                           


                      

                    

                   @endforeach
                  
                  <li>
                   
                   
                  </li>
                </ul>
              </div>
              <div class="theme-ad">
                <a class="theme-ad-link" href="#"></a>
                <p class="theme-ad-sign">Advertisement</p>
                <img class="theme-ad-img" src="/img/300x600.png" alt="Image Alternative text" title="Image Title"/>
              </div>
            </div>
          </div>
    </div>
    @endsection
    @section('javabee')
@include('chunks.googlejs')
@endsection