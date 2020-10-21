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
          <li><a>Introduction</a></li>
          <li ><a>Amenties</a></li>
          <li class="active"><a data-toggle="tab">Pictures</a></li>
        </ul>
          @if (session('status_err'))
              <div class="alert alert-success">
                {{ session('status_err') }}
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
        <div class="tab-content" >
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections">
              @include('rooms.roomchunks.add_room_Pics_Form')
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
 @include('chunks.dropzoneforroom')
@endsection
