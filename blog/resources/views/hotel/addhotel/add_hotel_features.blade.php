@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection
@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <ul class="nav nav-tabs">
          <li ><a>Introduction</a></li>
          <li  ><a>Details</a></li>
          <li class="active"><a data-toggle="tab"  href="#menu1">Features</a></li>
          <li ><a>Policies</a></li>
          <li><a>Photo</a></li>
          <li><a>Payment</a></li>
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @foreach($hotel as $h)
              @include('hotel.hotelchunks.add_hotel_features_Form')
              @break;
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('hotel.hotelchunks.rightsidebarhotel')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javabee')
@include('hotel.javascriptValidation.HotelFeatures')
@include('chunks.previuosButtonBreak')

@endsection
