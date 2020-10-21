@extends('layout.master2')

@section('content')
@foreach($hotels as $d)
<form  action="{{url('booking/'.$d->id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">

<input type="hidden" name="booking_check" value="home">
<input type="hidden" name="booking_check_id" value="{{$d->id}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                      <h5 class="theme-search-results-item-title theme-search-results-item-title-lg">{{$d->hotel_name}} &nbsp;PKR {{$d->home_price}}   <span> Per Day</span></h5>
                       <input type="number" id="room_price_night" name="price_single" value="{{$d->home_price}}" style="display: none;">
                        <input type="number" name="days" style="display: none;" id="db_nights" value="<?php echo Session::get('nights'); ?>">

                   
                   
                    </div>
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
    
      
     
      
        
        
      
      
<?php
      }

    }
    
}
}
?>
                    <div class="col-md-3 ">
                      <div class="theme-search-results-item-img-wrap">
                        <img class="theme-search-results-item-img" src="{{ URL::asset($var) }}" alt="Image Alternative text" title="Image Title"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
             

              @include('chunks.booking')
                <div class="theme-payment-page-sections-item">
                <div class="theme-payment-page-booking">
                  <div class="theme-payment-page-booking-header">
                    <h3 class="theme-payment-page-booking-title">Total Price for {{Session::get('nights')}} days</h3>
                    <p class="theme-payment-page-booking-subtitle">By clicking book now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p>
                    <p class="theme-payment-page-booking-price">PKR <?php echo $d->home_price*Session::get('nights'); ?>  </p>
                  </div>
                 
                  
                   <button type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block">BOOK NOW</button>

                </div>
              </div>
             
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
                  <li><?php echo Session::get('guests'); ?> guest, <?php echo Session::get('nights'); ?> nights</li>
              <?php    }

?>
<?php if (Session::has('chech_in')) {
 
?>
                  <li>Check-IN: {{\Carbon\Carbon::parse(Session::get('chech_in'))->format('d F Y')}}</li>
                  <li>Check-out:  {{\Carbon\Carbon::parse(Session::get('check_out'))->format('d F Y')}}</li>

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
                      <p class="theme-sidebar-section-charges-item-subtitle">{{Session::get('nights')}} nights</p>
                      <p class="theme-sidebar-section-charges-item-price">{{$d->home_price}}</p>
                    </li>
                   
                                     </ul>
                  <p class="theme-sidebar-section-charges-total">Total
                   <span id="last_total"><?php echo $d->home_price*Session::get('nights'); ?></span>
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