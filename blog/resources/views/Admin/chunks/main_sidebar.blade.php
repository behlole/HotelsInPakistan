<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ URL::asset('adminfiles/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->name}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active treeview">
        <a href="{{ URL('adminpannel') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Hotels</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Hotel_Pending') }}"><i class="fa fa-circle-o"></i>Hotel Pending</a></li>
          <li><a href="{{ URL('Hotel_Approved') }}"><i class="fa fa-circle-o"></i>Hotel Approved And Featured</a></li>
          <li><a href="{{ URL('Hotel_Premiume_Listing_By_City') }}"><i class="fa fa-circle-o"></i>Hotel Premiume Listing</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Homes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Home_Pending') }}"><i class="fa fa-circle-o"></i>Home Pending</a></li>
          <li><a href="{{ URL('Home_Approved') }}"><i class="fa fa-circle-o"></i>Home Approved And Featured</a></li>
          <li><a href="{{ URL('Home_Premiume_Listing_By_City') }}"><i class="fa fa-circle-o"></i>Home Premiume Listing</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Restaurants</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Restaurant_Pending') }}"><i class="fa fa-circle-o"></i>Restaurant Pending</a></li>
          <li><a href="{{ URL('Restaurant_Approved') }}"><i class="fa fa-circle-o"></i>Restaurant Approved And Featured</a></li>
          <li><a href="{{ URL('Restaurant_Premiume_Listing_By_City') }}"><i class="fa fa-circle-o"></i>Restaurant Premiume Listing</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Car Agency</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('CarAgency_Pending') }}"><i class="fa fa-circle-o"></i>Car Agency Pending</a></li>
          <li><a href="{{ URL('CarAgency_Approved') }}"><i class="fa fa-circle-o"></i>Car Agency Approved And Featured</a></li>
          <li><a href="{{ URL('CarAgency_Premiume_Listing_By_City') }}"><i class="fa fa-circle-o"></i>Car Agency Premiume Listing</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Ads Managemt</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Hotel_Ads') }}"><i class="fa fa-circle-o"></i>Hotel Ads</a></li>
          <li><a href="{{ URL('Home_Ads') }}"><i class="fa fa-circle-o"></i>Home Ads</a></li>
          <li><a href="{{ URL('Restaurant_Ads') }}"><i class="fa fa-circle-o"></i>Restaurants Ads</a></li>
          <li><a href="{{ URL('Car_Ads') }}"><i class="fa fa-circle-o"></i>Car Ads</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Top Destinations</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Top_Destination') }}"><i class="fa fa-circle-o"></i>Add Top Destination</a></li>



        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>User Review And Rattings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
         <!--  <li><a href="/room_options"><i class="fa fa-circle-o"></i>Hotel Review</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Home Review</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Restaurant Review</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Car Review</a></li> -->

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>User Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
         <!--  <li><a href="/room_options"><i class="fa fa-circle-o"></i>All Users</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Verfied Users</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Block Users</a></li>
          <li><a href="/room_options"><i class="fa fa-circle-o"></i>Master Admin/Admin</a></li> -->

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-th"></i>
          <span>Settings</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ URL('Add_Room_Options') }}"><i class="fa fa-circle-o"></i>Add Room Bed Options</a></li>
         <li><a href="{{ URL('Add_Room_Types') }}"><i class="fa fa-circle-o"></i>Add Room Types</a></li>
         <li><a href="{{ URL('Add_Features') }}"><i class="fa fa-circle-o"></i>Add Features</a></li>
         <li><a href="{{ URL('Add_Car_Brands') }}"><i class="fa fa-circle-o"></i>Add Cars Brands</a></li>
         <li><a href="{{ URL('Add_Car_types') }}"><i class="fa fa-circle-o"></i>Add Cars Type</a></li>
         <li ><a href="{{ URL('Add_Restaurant_types') }}"><i class="fa fa-circle-o"></i>Add Restaurants Type</a></li>

       </ul>
     </li>




   </ul>
 </section>
 <!-- /.sidebar --> 
</aside>