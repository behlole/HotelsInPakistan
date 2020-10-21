@extends('layout.master2')

@section('content')

@foreach($cars as $d)
  <div class="container">
      <div class="theme-item-page-header">
       
        <div class="row">

          <div class="col-md-10 col-md-offset-1">
            <div class="theme-item-page-header-body">
             
              <h1 class="theme-item-page-header-title _ff-d _fw-200">{{$d->car_title}} &nbsp; {{$d->model}}</h1>

              <div class="theme-item-page-header-price theme-item-page-header-price-lg">
                <p class="theme-item-page-header-price-body">
                  <b >PKR {{$d->car_price}} </b>
                  <input type="number" id="room_price_night" value="{{$d->car_price}}" style="display: none;">
                  <input type="number" id="car_passenger" value="{{($d->passengers)-1}}" style="display: none;">
                  <span>Per Day</span>
                </p>
              </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="theme-page-section" >
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="row row-col-static" id="sticky-parent">
              <div class="col-md-7 " >
                <div class="theme-item-page-tabs _mb-mob-30">
                  <div class="tabbable">
                    <ul class="nav nav-tabs nav-default nav-sqr nav-mob-inline" role="tablist">
                      <li class="active" role="presentation">
                        <a class="_ph-20" aria-controls="HotelPageTabs-1" role="tab" data-toggle="tab" href="#HotelPageTabs-1">Images</a>
                      </li>
                      <li role="presentation">
                        <a class="_ph-20" aria-controls="HotelPageTabs-2" role="tab" data-toggle="tab" href="#HotelPageTabs-2">Features</a>
                      </li>
                     
                    
                    </ul>
                    <div class="tab-content _pt-20">
                      <div class="tab-pane active" id="HotelPageTabs-1" role="tab-panel">
                       
                  <div class="fotorama _mb-30" data-nav="thumbs" data-minwidth="100%" data-arrows="always" data-allowfullscreen="native">
             
               
      
     
        <img src="{{ URL::asset('cars_image/'.$d->car_folder.'/'.$d->car_pic) }}" alt="Los Angeles" style="width:auto;height: 300px;">
        
        
      
  
              

              
            </div>
                      </div>
                      <div class="tab-pane" id="HotelPageTabs-2" role="tab-panel">
                         <ul class="theme-search-results-item-car-feature-list" style="color:#008fcc;">
                          <li>
                            <i class="fa fa-male"></i>
                            <span>{{($d->passengers)}}</span>
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
                        <ul class="theme-search-results-item-car-feature-list" style="color:#008fcc;">
                          <li>
                            
                            <span>{{$d->model}}</span>
                          </li>
                          <li>
                           
                            <span>{{$d->brand}}</span>
                          </li>
                          <li>
                            
                            <span>{{$d->fuel}}</span>
                          </li>
                         
                        </ul>

                       <br><br><br>
                          <p style="text-align: center;">{{$d->details}}</p>
                        </div>
                        
                      
                     
                    </div>
                  </div>
                </div>
              </div>
          <form  action="{{url('car_booking_confirmed/'.$d->id)}}" method="get" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="col-md-5 " style="border: 1px dotted blue;">
                <div class="sticky-col _mt-60">
                  <div class="theme-search-area _mb-20 _p-20 _b _bc-dw theme-search-area-vert">
                    <div class="theme-search-area-header _mb-20 theme-search-area-header-sm">
                      <h1 class="theme-search-area-title">Car Booking </h1>
                      <p class="theme-search-area-subtitle">Please</p>
                    </div>
                    <div class="theme-search-area-form">
                      <div class="row" data-gutter="10">
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-curved">
                             <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerStart _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 ">
                         <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-curved">
                             <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerEnd _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-curved quantity-selector" data-increment="Guests">
                        <div class="theme-search-area-section-inner">
                          <i class="theme-search-area-section-icon lin lin-people"></i>
                          <input class="theme-search-area-section-input" value="2 Guests" type="text"/ id="guest_me" value="guest_total" name="guests">
                          <div class="quantity-selector-box" id="RoomSearchGuests">
                            <div class="quantity-selector-inner">
                              <p class="quantity-selector-title">Guests</p>
                              <ul class="quantity-selector-controls">
                                <li class="quantity-selector-decrement">
                                  <a id="g1" href="#">&#45;</a>
                                </li>
                                <li class="quantity-selector-current">1</li>
                                <li class="quantity-selector-increment">
                                  <a id="g2" href="#">&#43;</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="theme-item-page-summary-price _mb-20">
                        <a class="theme-item-page-summary-price-link" href="#summaryPriceCollapse" data-toggle="collapse" aria-expanded="false" aria-controls="summaryPriceCollapse">Show summary</a>
                        <div class="collapse" id="summaryPriceCollapse">
                          <ul class="theme-item-page-summary-price-list" style="display: none;" id="pricediv">
                            <li class="theme-item-page-summary-price-item">
                              <h5 class="theme-item-page-summary-price-item-title" id="total_nights">5 nights</h5>
                              <input type="number" name="days" style="display: none;" id="db_nights">
                             
                              <p class="theme-item-page-summary-price-item-price" id="total_price">PKR $325.00</p>
                            </li>
                           
                          
                          </ul>
                        </div>
                        <p class="theme-item-page-summary-price-total">Total Stay
                          <span id="last_total">PKR $464.00</span>
                        </p>
                      </div>
                      <button class="theme-search-area-submit _mt-0 _tt-uc theme-search-area-submit-curved"  id="book_now" disabled="">Book Now</button>

                    </div>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
     @endforeach
    
    
     @endsection


     @section('javabee')
       <script type="text/javascript">


var date = new Date();

var day = date.getDate(),
    month = date.getMonth() + 1,
    year = date.getFullYear();


var today = year + "-" + month + "-" + day;
  

document.getElementById('d1').value = today; 
document.getElementById('d2').value = today;      

document.getElementById("d2").min=document.getElementById('d1').value;

$('#last_total').text($('#room_price_night').val());
 $('#d1').change(function(){

  

document.getElementById("d2").min=document.getElementById('d1').value;
  
abc();


  });

 $('#d2').change(function(){

  
  
abc();

  });

 function abc() {
  $('#pricediv').show();
   var start =$('#d1').val();
  var end = $('#d2').val();


var diff = Date.parse(end) - Date.parse(start);

var diff=Math.floor(diff / 86400000);

var room_price_night=$('#room_price_night').val();


var total=room_price_night*diff;

if(diff>0){
$('#book_now').prop('disabled',false);
}
else{
  $('#book_now').prop('disabled',true);
}
$('#total_price').text(total);
$('#total_nights').text(diff+" DAYS");
$('#last_total').text(total);
$('#db_nights').val(diff);


 }
 $("#guest_me").on('click',function () {


check();





  });
 $("#g1").on('click',function () {


check();





  });
 $("#g2").on('click',function () {


check();





  });

 function check() {
   // body...
 
   var data=$("#guest_me").val();
var arr = data.split('Guests');

$("#car_passenger").val(); // 8

 if(arr[0]<=$("#car_passenger").val()){
  $("#g2").css("pointer-events", "auto");
  
 }
 else{
   $("#g2").css("pointer-events", "none");
 }
 }
 

      </script>
     @endsection