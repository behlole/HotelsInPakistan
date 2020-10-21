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
          <li><a>Introduction</a></li>
          <li><a>Details</a></li>
          <li><a>Features</a></li>
          <li><a>Policies</a></li>
          <li><a>Photo</a></li>
          <li class="active" ><a data-toggle="tab" href="#menu2">Payment</a></li>
        </ul>
        <div class="tab-content" >
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('home.homechunks.add_home_payment_Form')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('home.homechunks.rightsidebarhome')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('java')
@include('chunks.previuosButtonBreak')
@include('home.javascriptValidation.HomePayments')
@endsection
