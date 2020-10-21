@extends('layout.master2')

@section('content')
@foreach($cars as $d)
 <div class="theme-page-section theme-page-section-lg" style="padding: 50px;">
      <div class="container">
        <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
          <div class="col-md-8 ">
          
            <div class="theme-payment-page-sections">

             
                   @if (Route::has('login'))

                  
                    @auth
                    @else
                    <div class="theme-payment-page-sections-item">
                <div class="theme-payment-page-signin">
                  <i class="theme-payment-page-signin-icon fa fa-user-circle-o"></i>
                  <div class="theme-payment-page-signin-body">
                    <h4 class="theme-payment-page-signin-title">Sign in if you have an account</h4>
                    <p class="theme-payment-page-signin-subtitle">We will retrieve saved travelers and credit cards for faster checkout</p>
                  </div>
                  <a class="btn theme-payment-page-signin-btn btn-primary" href="#">Sign in</a>
                </div>
              </div>
                    @endauth
                  
                
            @endif

              <div class="theme-payment-page-sections-item">
                <div class="theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                    <div class="col-md-9 ">
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">{{$d->car_title}} &nbsp;PKR {{$d->model}}   <span>PKR {{$d->car_price}}</span></h5>
                      
                      <ul class="theme-search-results-item-car-feature-list" style="float: left;">
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
                       <input type="number" id="room_price_night" value="{{$d->car_price}}" style="display: none;">
                        <input type="number" name="nights" style="display: none;" id="db_nights" value="<?php echo Session::get('nights'); ?>">
                   
                   
                    </div>
                    

                    <div class="col-md-3 ">
                      <div class="theme-search-results-item-img-wrap">
                        <img class="theme-search-results-item-img" src="{{ URL::asset('cars_image/'.$d->car_folder.'/'.$d->car_pic) }}" alt="Image Alternative text" title="Image Title"/>
                         <ul class="theme-search-results-item-car-feature-list">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               <form  action="{{url('confirmed_booking_go_for_paymant/'.$d->id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
             

                 @include('chunks.booking')

           
            </form>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="sticky-col">
              <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">Booking Summary</h5>
                <ul class="theme-sidebar-section-summary-list">
                 <?php if (Session::has('nights')) {
 
?>
                  <li><?php echo Session::get('guests'); ?>  <?php echo Session::get('nights'); ?> DAYS</li>
              <?php    }

?>
<?php if (Session::has('chech_in')) {
 
?>
                  <li>PICK UP: {{\Carbon\Carbon::parse(Session::get('chech_in'))->format('d F Y')}}</li>
                  <li>END DATE:  {{\Carbon\Carbon::parse(Session::get('check_out'))->format('d F Y')}}</li>

                  <?php    }

?>
                </ul>
              </div>
              <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">Charges</h5>
                <div class="theme-sidebar-section-charges">
                  <ul class="theme-sidebar-section-charges-list">
                    <li class="theme-sidebar-section-charges-item">
                      <h5 class="theme-sidebar-section-charges-item-title">{{Session::get('guests')}}</h5>
                      <p class="theme-sidebar-section-charges-item-subtitle">{{Session::get('nights')}} DAYS</p>
                      <p class="theme-sidebar-section-charges-item-price">{{$d->car_price}}</p>
                    </li>
                   
                                     </ul>
                  <p class="theme-sidebar-section-charges-total">Total
                   <span id="last_total"><?php echo $d->car_price*Session::get('nights'); ?></span>
                  </p>
                </div>
              </div>
              <div class="theme-sidebar-section _mb-10">
                <ul class="theme-sidebar-section-features-list">
                  <li>
                    <h5 class="theme-sidebar-section-features-list-title">Manage your bookings!</h5>
                    <p class="theme-sidebar-section-features-list-body">You're in control of your booking - no registration required.</p>
                  </li>
                  <li>
                    <h5 class="theme-sidebar-section-features-list-title">Customer support available 24/7 worldwide!</h5>
                    <p class="theme-sidebar-section-features-list-body">Website and customer support in English and 41 other languages.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        @endforeach
        
     @endsection



@section('javabee')
<script type="text/javascript">
          var room_price_night=$('#room_price_night').val();
          var diff=$('#db_nights').val();

var total=room_price_night*diff;

        
('#last_total').text(total);
        </script>
@endsection