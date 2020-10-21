@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection
@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <div class="theme-payment-page-sections">
          <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title"> <i class="fa fa-plus" aria-hidden="true"></i><a href="{{url('add_new_restaurant')}}" >Add New Restaurant</a></h6>
          <div class="theme-payment-page-sections-item">
            <div class="theme-search-results-item theme-payment-page-item-thumb">
              <div class="row" data-gutter="20">
                @foreach($res_data as $res)
                <div class="row" style="border: 1px solid grey;padding: 10px;margin-bottom:5px; ">
                  <div class="col-md-9 ">
                    <h6 style="font-size: 16px;" class="theme-item-page-overview-rate-title">{{$res->restaurant_name}}</h6>
                    <ul class="theme-search-results-item-room-feature-list">
                      <li>
                        <i class="fa fa-location-arrow theme-search-results-item-room-feature-list-icon"></i>
                        <span class="theme-search-results-item-room-feature-list-title">{{$res->city}}</span>
                      </li>
                      <li>
                        <i class="fa fa-map theme-search-results-item-room-feature-list-icon"></i>
                        <span class="theme-search-results-item-room-feature-list-title">{{$res->google_map_address}}</span>
                      </li>
                        <li>
                        <i class="fa fa-phone theme-search-results-item-room-feature-list-icon"></i>
                        <span class="theme-search-results-item-room-feature-list-title">{{$res->contact}}</span>
                      </li>
                        <li>
                        <i class="fa fa-phone theme-search-results-item-room-feature-list-icon"></i>
                        <span class="theme-search-results-item-room-feature-list-title">{{$res->landline}}</span>
                      </li>
                       <i class="fa fa-envelope theme-search-results-item-room-feature-list-icon"></i>
                        <span class="theme-search-results-item-room-feature-list-title">{{$res->restaurant_email}}</span>
                      </li>
                    </ul>
                    <p style="display: inline;"><a href="{{url('restuarants_edit/'.$restaurant_id)}}" class="btn btn-info btn-xs" role="button">Edit</a>
                     <a href="#" class="btn btn-default btn-xs" role="button">Preview</a></p>
                   </div>

                   <div class="col-md-3 ">
                    <div class="theme-search-results-item-img-wrap">

                      <img class="theme-search-results-item-img" src="{{ URL::asset('resimg/'.$res->pic.'/'.$res->main_pic) }}" alt="Image Alternative text" title="Image Title">


                    </div>
                  </div>

                </div>
                <img style="display: block;
                margin-left: auto;
                margin-right: auto;margin-top: 20px;
                " src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="" width="50" height="50">
                <h5 style="margin-top:40px;text-align: center;font-size: 24px;" class="theme-sidebar-section-features-list-title">Thank You Very Much,For Listing Your Property,Your Listing is Complete And Will Be Live After Approval</h5><hr>
                <h5 style="text-align: center;font-size: 18px;" class="theme-sidebar-section-features-list-title">An Email Has Been Sent on your Email {{Auth::user()->email}}, Our Team Will Review Your Property After Review ,It Will Be Live and You Will Bn Property Section</h5><hr>
                @endforeach
              </div>
            </div>
          </div>

        </div>


      </div>
      <div class="col-md-4">
        @include('resturants.addResChunks.rightsidebar')
      </div>
    </div>
  </div>
</div>
@endsection