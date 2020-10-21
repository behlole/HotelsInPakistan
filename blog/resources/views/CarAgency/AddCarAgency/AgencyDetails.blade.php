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
          <li class="active"><a data-toggle="tab" href="#home">Details</a></li>
         
        
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('CarAgency.AddCarAgencyChunks.CarAgencyDetails')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        @include('CarAgency.AddCarAgencyChunks.RightSideBar')
      </div>
    </div>
  </div>
</div>
@endsection

@section('javabee')
@include('CarAgency.javascriptValidation.CkEditors')
@include('CarAgency.javascriptValidation.DetailsFormValidation')

@include('chunks.previuosButtonBreak')
@endsection