@extends('layout.master')

@section('content')

<section class="header header-bg-3">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="header-content">
          <div class="header-content-inner">
            <h1>Listing Menu</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
            standard dummy text ever since </p>
            <div class="ui breadcrumb">
              <a href="index.html" class="section">Home</a>
              <div class="divider"> / </div>
              <div class="active section">Blog Details</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<main class="destination_details">
  <section id="experience">
    <div class="container">
      <div class="row">
        
        <div class="col-md-offset-2 col-md-8">
          <div class="section-title text-center">
            <i class="flaticon-experiment-results"></i>
            
         @foreach($hotels as $h)
            <h2>All Rooms Listed By {{$h->hotel_name}} </h2><br>
            <a href="{{ URL('room_listings',$h->id) }}"  class="btn btn-info">Add Rooms in {{$h->hotel_name}}</a>
          </div>
        </div>
        @break;
        @endforeach
        <div class="col-sm-12">
         @if (session('status'))
         <div class="alert alert-success">
           {{ session('status') }}
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
         <div class="col-sm-12">
           <table class="table table-bordered table-responsive table-hover" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <thead style="background-color: #509aff;color: white;font-weight: 600;">
               <tr><th>Sr</th>
                 <th>Room Name</th>
                 <th>No Of Room</th> 
                 <th>Guest Capacity</th>
                 <th>Price Per Night</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               @foreach($rooms as $h)
               <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$h->roomname}}</td>
                 <td>{{$h->no_of_rooms}}</td>
                 <td>{{$h->total_people}}</td>
                 <td>{{$h->room_price_night}}</td>
                 <?php  
                 if($h->room_status=="0"){
                  ?>
                  <td>NOT APPROVED</td>
                  <?php
                }
                if($h->room_status=="1"){
                  ?>
                  <td>APPROVED AND LISTED</td>
                  <?php
                }
                
                if($h->room_status=="2"){
                  ?>
                  <td>APPROVED,RECOMMENDED,LISTED</td>
                  <?php
                }
                ?>
                <?php 
                if($h->room_status=="4"){
                  ?>
                  <td>Listing is Hide</td>
                  <?php
                }
                ?>
                
                <td><a style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" href="{{url('/addroomsfeatures/'.$h->id)}}" class="btn btn-success">Add Or Edit Features</a></td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <br>
          <a  style="float: left;" href="/hotel"  class="btn btn-info">Back</a>
          <br>




        </div>
      </section>
      
  

</main>   

@endsection