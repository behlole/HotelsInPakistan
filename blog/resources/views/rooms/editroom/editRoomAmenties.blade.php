@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection
<style type="text/css">
  .errors_txs_room{
    display: block;
  }
</style>
@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <ul class="nav nav-tabs">
            @include('rooms.roomEditChunks.listingUrl')
        </ul>
        
        <div class="tab-content" >
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('rooms.roomEditChunks.room_edit_ementies_form')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('rooms.roomchunks.rightsidebarroom')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('java')
@include('chunks.previuosButtonBreak')
@include('rooms.javascriptValidation.FeaturesRoomValidation')
@endsection
