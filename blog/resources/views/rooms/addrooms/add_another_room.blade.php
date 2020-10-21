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
    <div class="row row-col-static" id="sticky-parent" data-gutter="100">
      <div class="col-md-8">
            <div class="theme-payment-page-sections">
              <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title"> <i class="fa fa-plus" aria-hidden="true"></i><a href="{{url('/addrooms/'.$hotel_id)}}" >Add New Room</a></h6>
              <div class="theme-payment-page-sections-item">
                <div class="theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="100">
                     @foreach($rooms as $room_loop)
                     <div class="row" style="border: 1px solid grey;padding: 10px;margin-bottom:5px; ">
                    <div class="col-md-9 ">
                      <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title">{{$room_loop->roomname}}/<span>{{$room_loop->custom_name}}</span></h6>
                      <ul class="theme-search-results-item-room-feature-list">
                        <li>
                          <i class="fa fa-user theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">{{$room_loop->total_people}} People Space</span>
                        </li>
                        <li>
                          <i class="fa fa-usd theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">PKR {{$room_loop->room_price_night}} Per Night</span>
                        </li>
                       
                        <li>
                          <i class="fa fa-area-chart theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">{{$room_loop->room_size}},{{$room_loop->room_unit}}</span>
                        </li>
                      </ul>
                      <p class="theme-search-results-item-location">
                        <i class="fa fa-map-marker"></i>No Of room Of this type total&nbsp;= &nbsp;{{$room_loop->no_of_rooms}}
                      </p>
                       <p class="theme-search-results-item-location">
                         <i style="color: red;" class="fa fa-pencil "></i>
                         <!-- <a style="color: red;" href="#">Delete &nbsp; &nbsp;</a>
                        <i class="fa fa-pencil "></i> -->
                        <a  href="{{url('/room_update/'.$room_loop->id)}}">Edit Room&nbsp;&nbsp;</a>
                      </p>
                    </div>
                   
                    <div class="col-md-3 ">
                      <div class="theme-search-results-item-img-wrap">

                        <img class="theme-search-results-item-img" src="{{ URL::asset('roomiamges/'.$room_loop->foldername.'/'.$room_loop->main_header) }}" alt="Image Alternative text" title="Image Title">
                       
                        
                      </div>
                    </div>
                  </div>
                     @endforeach
                  </div>
                </div>
              </div>
             
            </div>
          
      </div>
      <div class="col-md-4">
        <div class="sticky-col">
           @include('rooms.roomchunks.rightsidebarroom')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
