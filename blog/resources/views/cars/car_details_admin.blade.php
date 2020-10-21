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
    <div class="theme-hero-area-inner-shadow">
      
    </div>
  </div>
  
  <div class="theme-hero-area-body">

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
      <img  width="150" height="100" class="img-rounded" src="{{ URL::asset('caropr_image/'.$d->car_opr_folder.'/'.$d->uploadHeaderPhoto) }}" alt="Image Alternative text" title="Image Title"/>

      <h1 class="theme-item-page-header-title">{{$d->caropr_name}}</h1>


       <h1 class="theme-item-page-header-title">FOR ONLY AGANCY APPROVAL: ADMIN</h1>
       

     

    
     <div class="theme-item-page-header-price">
                <p class="theme-item-page-header-price-body">
                  <span>from</span>
                  <b>PKR {{$car_price}}</b><br>
                  <span>per Day</span>
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
      <div class="col-md-9 ">

        <div class="fotorama _mb-30" data-nav="thumbs" data-minwidth="100%" data-arrows="always" data-allowfullscreen="native">

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
              <a class="_ph-30" aria-controls="HotelPageTabs-5" role="tab" data-toggle="tab" href="#HotelPageTabs-5">Reviews</a>
            </li>
            <li role="presentation">
              <a class="_ph-30" aria-controls="HotelPageTabs-6" role="tab" data-toggle="tab" href="#HotelPageTabs-6">Contact</a>
            </li>
            <li>

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

      <div class="theme-reviews-list">
        @foreach($agency_rv as $rv)


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
                   <div class="ratting">
                    <i class="fa fa-star"></i>

                  </div>

                  <?php 
                }

                ?>
                <?php  if($rv->rattings==2)  {

                 ?>
                 <div class="ratting">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>

                </div>

                <?php 
              }

              ?>
              <?php  if($rv->rattings==3)  {

               ?>
               <div class="ratting">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>


              </div>

              <?php 
            }

            ?>
            <?php  if($rv->rattings==4)  {

             ?>
             <div class="ratting">
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
           <div class="ratting">
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
      <p class="theme-sidebar-section-features-list-body"> {{$d->email}}</p>
  </li>
  <li>
    <h5 class="theme-sidebar-section-features-list-title">
     Address
   </h5>
   <p class="theme-sidebar-section-features-list-body">
  
    
     {{$d->street}} <br>
     {{$d->city}} <br>


   </p>
 </li>
</ul>
</div>


</div>
</div>
</div>
            <div id="booking-scroll">
              <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white">
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
                                <div class="theme-search-area-section-inner">
                                   <input type='date' class="form-control datechange" id="d1" name="datefrom"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3 ">
                              <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                                <div class="theme-search-area-section-inner">
                                  <input type='date' class="form-control datechange" id="d2" name="dateto"/>
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
              </div>
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
                           
                            <span>{{$c->brand}}</span>
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
                    <!--   <p class="theme-item-page-rooms-table-price-note">* Discounts already
                        <br/>included in price.
                      </p> -->
                    </td>
                    <td>
                    
                      
                    
                    <?php  
                                   if($c->car_status=="0"){
                                    ?>
                                  
                                      <a class="btn btn-primary-inverse btn-block" href="{{ URL('car_approvel',$c->id) }}">Appove now</a>
                                      <p class="theme-item-page-rooms-table-booking-note">By Approving It Will Live 
                        
                      </p>

                                    <?php
                                }

                                ?>
                                <?php  
                                   if($c->car_status=="1"){
                                    ?>
                                    
                                      <a class="btn btn-primary-inverse btn-block" href="{{ URL('car_approvel_stop',$c->id) }}">Stop now</a>
                                       <p class="theme-item-page-rooms-table-booking-note">By Stoping It Will Hide 
                        
                      </p>

                                    <?php
                                }

                                ?>
                                </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white" style="color: black;">
              <div class="row">
                
                <form action="{{url('insertcarreview/'.$d->caropr_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
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
                
                    
                    
                     
                        @foreach($cars_opr as $h)
                                 
                                   <?php  
                                   if($h->car_opr_status=="0"){
                                    ?>
                                    <li style="margin-top:20px;" ><a  href="{{ URL('car_approvel_agancy',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Approve Listing</a>
                                     <p style="font-size:12px;color:black;font-weight:400;">By Approving It Will Be live To Users</p></li>

                                    <?php
                                }

                                if($h->car_opr_status=="1"||$h->car_opr_status=="2"){
                                    ?>
                                   
                                    <li style="margin-top:20px;" ><a  href="{{ URL('caragancy_stop_listing',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Listing</a>
                                     <p style="font-size:12px;color:black;font-weight:400;" >Listing Is Live Now,By Click On "Stop listing" It will No Remain Recommending OR Premiume Listing </p></li>
                                    <?php
                                }
                                
                                 



                                if($h->car_opr_status=="1"){
                                    ?>
                                  
                                    <li style="margin-top:20px;" ><a  href="{{ URL('car_approvel_agancy_rcmnd',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Recommending  listing</a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Recommending  It Will Become Recommended Catogory</p></li>

                                 <?php   }
                                      
                              
                              
                                if($h->car_opr_status=="2"){
                                    ?>
                                  
                                    <li style="margin-top:20px;" ><a  href="{{ URL('car_approvel_agancy_rcmnd_stop',$h->id) }}" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Stop Recommended Listing </a>
                                      <p style="font-size:12px;color:black;font-weight:400;" >By Stoping It Will Remain live but not Recommended Catogory</p></li>

                                 <?php   }
                                      
                              
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
      </div>
    </div>
    
    @endsection
  