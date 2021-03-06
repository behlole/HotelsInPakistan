<div class="container">
  <div class="navbar-inner nav">
    <div class="navbar-header">
      <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse" type="button" area-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL('/') }}">
        <img src="{{ URL::asset('img/logopakistan.png') }}" alt="Image Alternative text" title="Image Title"/ >
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-main">
      <ul class="nav navbar-nav">

       <li class="dropdown">
        <a   href="{{ URL('welcome_to_hotel') }}" >Hotels</a>

      </li>
      <li class="dropdown">
        <a   href="{{ URL('welcome_to_restaurant') }}" >Restaurants</a>

      </li>
      <li class="dropdown">
        <a   href="{{ URL('welcome_to_home') }}" >Homes</a>

      </li>
      <li class="dropdown">
        <a   href="{{ URL('welcome_to_cars') }}" >Car Rentals</a>

      </li>
      <li class="dropdown">
        <a target="_blank"  href="https://blog.hotelsinpakistan.pk" >Blog</a>

      </li>
      </ul>
    <ul class="nav navbar-nav navbar-right">
      @if (Route::has('login'))
      @auth
      <li><a style="font-weight: bolder;color: white;" href="{{ URL('/welcome_to_listing') }}"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add Listing</a></li>
      <li class="navbar-nav-item-user dropdown">
        <a class="dropdown-toggle" href="account.html" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <img style="width: 20px;height: 20px;" class="img-circle"  src="{{URL::asset('profile_image/'.Auth::user()->foldername.'/'.Auth::user()->main_pic) }}" alt="" />
          {{Auth::user()->name}}
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ URL('/all_listing_by_users') }}">My Listing</a>
          </li>
          <li>
            <a href="{{ URL('/my_profile') }}">My Profile</a>
          </li>
          <li>
            <a href="{{ URL('/my_profile_password') }}">Password Change</a>
          </li>
          <li>
            <a href="{{ route('logout') }}">Logout</a>
          </li>
        </ul>
      </li>
      @else
      <li><a href="{{ route('login') }}">Add Listing</a></li>
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
      @endauth
    @endif
  </ul>
  </div>
</div>
</div>