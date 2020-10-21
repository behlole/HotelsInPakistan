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
      <div class="col-md-8">
            <div class="theme-payment-page-sections">
              <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title"> <i class="fa fa-plus" aria-hidden="true"></i><a href="{{url('/add_cars_loop/'.$car_operator_id)}}" >Add New Car</a></h6>
              <div class="theme-payment-page-sections-item">
                <div class="theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">
                     @foreach($car_data as $car)
                     <div class="row" style="border: 1px solid grey;padding: 10px;margin-bottom:5px; ">
                    <div class="col-md-9 ">
                      <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title">{{$car->vehicle_type_name}}/<span>{{$car->car_title}}</span></h6>

                      <ul class="theme-search-results-item-room-feature-list">
                        <li>
                          <i class="fa fa-user theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">Brand: {{$car->brand_type_name}}</span>
                        </li>
                        <li>
                          <i class=" theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">PKR {{$car->car_price}} Per Day</span>
                        </li>
                        <li>
                          <i class="fa fa-user theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">Vehicle Type: {{$car->vehicle_type_name}}</span>
                        </li>
                        <li>
                          <i class=" theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">Fuel:{{$car->fuel}}</span>
                        </li>
                         <li>
                          <i class=" theme-search-results-item-room-feature-list-icon"></i>
                          <span class="theme-search-results-item-room-feature-list-title">No of Cars In A Fleet:{{$car->no_of_cars}}</span>
                        </li>
                      </ul>
                      <p class="theme-search-results-item-location">
                        <i class="fa fa-map-marker"></i>PickUp Points &nbsp;{{$car->details}}
                      </p>
                       <p class="theme-search-results-item-location">
                         <i style="color: red;" class="fa fa-trash "></i>
                         <a style="color: red;" href="#">Delete &nbsp; &nbsp;</a>
                        <i class="fa fa-pencil "></i>
                        <a  href="{{url('/car_update/'.$car->id)}}">Edit Car&nbsp;&nbsp;</a>
                      </p>
                    </div>
                   
                    <div class="col-md-3 ">
                      <div class="theme-search-results-item-img-wrap">

                        <img class="theme-search-results-item-img" src="{{ URL::asset('cars_image/'.$car->car_folder.'/'.$car->car_pic) }}" alt="Image Alternative text" title="Image Title">
                        <ul class="theme-search-results-item-car-feature-list">
                          <li>
                            <i class="fa fa-male"></i>
                            <span>{{$car->passengers}}</span>
                          </li>
                          <li>
                            <i class="fa fa-suitcase"></i>
                            <span>{{$car->bags}}</span>
                          </li>
                          <li>
                            <i class="fa fa-cog"></i>
                            <span>{{$car->transmission_type}}</span>
                          </li>
                          <li>
                            <i class="fa fa-snowflake-o"></i>
                            <span>{{$car->ac}}</span>
                          </li>
                        </ul>
                       
                        
                      </div>
                    </div>
                  </div>
                     @endforeach
                  </div>
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
