@extends('layout.master')

@section('content')


@include('layout.hotelcss')
<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" ></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  
  @include('hotel.creathotel.mainheading')
</div> 
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div id="booking" class="section">
     <div class="booking-form">
      <div class="wizard">
        <div class="wizard-inner">

          <ul class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active" >
              <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1"><span class="round-tab">
                <i style="" class="fa fa-pencil" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step2" data-toggle="tab"   aria-controls="step2" role="tab" title="Step 2">
              <span class="round-tab">
                <i style="" class="fa fa-bars" aria-hidden="true"></i>
              </span>
            </a>
          </li>
          <li role="presentation" class="disabled">
            <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
              <span class="round-tab">
               <i style="" class="fa fa-cogs" aria-hidden="true"></i>
             </span>
           </a>
         </li>

         <li role="presentation" class="disabled">
          <a href="#poloicies" data-toggle="tab"  aria-controls="poloicies" role="tab" title="poloicies">
            <span class="round-tab">
             <i style="" class="  fa fa-check-square-o" aria-hidden="true"></i>
           </span>
         </a>
       </li>
       <li role="presentation" class="disabled">
        <a href="#pictures" data-toggle="tab" aria-controls="step4" role="tab" title="">
          <span class="round-tab">
           <i style="" class="fa fa-photo" aria-hidden="true"></i>
         </span>
       </a>
     </li>
     <li role="presentation" class="disabled">
      <a href="#payments" data-toggle="tab"  aria-controls="payments" role="tab" title="payments">
        <span class="round-tab">
         <i style="" class="fa fa-credit-card" aria-hidden="true"></i>
       </span>
     </a>
   </li>
 </ul>
</div>

<div class="tab-content">

  <div class="tab-pane active"  role="tabpanel" id="step1">
    @include('hotel.creathotel.hotelchunks.hotel_intro')
  </div>

</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@section('javabee')
<script type="text/javascript">
  var elmnt = document.getElementById("booking");
  elmnt.scrollIntoView();
  
</script>
@include('chunks.googlejs')
@endsection