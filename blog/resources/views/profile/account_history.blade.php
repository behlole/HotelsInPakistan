 @extends('layout.master2')

@section('content')
  <div class="theme-page-section theme-page-section-gray theme-page-section-lg" >
      <div class="container" style="margin-bottom: 400px;">
        <div class="row">
           @include('profile.profilenav')
          <div class="col-md-9-5 ">
            <h1 class="theme-account-page-title">Booking History</h1>
            <div class="theme-account-history">
              <table class="table">
                <thead>
                  <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($homebooking as $h)
                  <tr>

                    <td class="theme-account-history-type">
                      <i class="fa fa-home theme-account-history-type-icon"></i>
                    </td>
                    <td>
                      <p class="theme-account-history-type-title">{{$h->hotel_name}}</p>
                      <a class="theme-account-history-item-name" href="#">{{$h->city_name_prop}}</a>
                    </td>
                    <td>
                      <a href="#">{{$h->city_name_prop}}</a>
                    </td>
                    <td class="theme-account-history-tr-date">
                      <p class="theme-account-history-date">{{\Carbon\Carbon::parse($h->check_in)->format('d F Y')}} &#8212; {{\Carbon\Carbon::parse($h->check_out)->format('d F Y')}}</p>
                    </td>
                    <td>
                      <p class="theme-account-history-item-price">PKR {{$h->total_price}}</p>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection