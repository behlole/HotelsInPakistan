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
           @include('hotel.edithotelchunks.listingurl')
          </ul>
          <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('hotel.edithotelchunks.editHotelPaymentForm')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        @include('hotel.hotelchunks.rightsidebarhotel')
      </div>
    </div>
  </div>
</div>
@endsection
@section('javabee')
@include('hotel.javascriptValidation.HotelPayments')
@endsection