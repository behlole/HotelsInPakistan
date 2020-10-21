@extends('layout.master2')

@section('content')
 <div class="theme-hero-area theme-hero-area-half">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg" style="background-image:url(./img/hotel.jpg);"></div>
        <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
        <div class="theme-hero-area-inner-shadow"></div>
      </div>
      <div class="theme-hero-area-body">
        <div class="container">
          <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
           <h1 class="theme-page-header-title">Welcome To Hotels In Pakistan</h1>
        <p class="theme-page-header-subtitle">You Can List Your Hotel Here and Get Unlimited Benefits</p>
          </div>
        </div>
      </div>
    </div>
  <div class="theme-page-section theme-page-section-lg">
      <div class="container">
        <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
          <div class="col-sm-12 col-md-12 col-lg-12 " style="border: 2px solid #509aff;" >
            <div class="theme-payment-page-sections">
              <div class="theme-payment-page-sections-item">
                  <h3 class="theme-payment-page-sections-item-title" style="text-align: center;">All Hotels Listing By {{Auth::user()->name}}</h3>
                  <div class="col-md-7 offset-md-5 ">
                   <a href="{{ URL('/hotel_listings') }}"  class="btn btn-info" style="float: right;"> Add Hotel</a>
                 </div>
                                    <br>

                    <br>
                <div class="table-responsive">
 
                               @if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
     </div>
 @endif
         
           <table class="table table-bordered  table-hover" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
             <thead style="background-color: #509aff;color: white;font-weight: 600;">
               <tr><th>Sr</th>
                 <th>Name</th>
                 <th>Type</th>
                 <th>Contact</th>
                 <th>City</th>
                 <th>Status</th>
                 <th>Profile Checkup</th>
                 <th colspan="2">Action</th>
               </tr>
             </thead>
             <tbody>
               @foreach($hotels as $h)
               <tr>
                 <td>{{$loop->iteration}}</td>
                 <td>{{$h->hotel_name}}</td>
                 <td>{{$h->yourRole}}</td>
                 <td>{{$h->contact}}</td>
                 <td>{{$h->city}}</td>

                 <?php  
                 if($h->hotel_status=="0"){
                  ?>
                  <td>Not Approved</td>
                  <?php
                }
                if($h->hotel_status=="1"){
                  ?>
                  <td>Approved and listed</td>
                  <?php
                }
                
                if($h->hotel_status=="2"){
                  ?>
                  <td>Approved,Recommended</td>
                  <?php
                }
                ?>
                <?php 
                if($h->hotel_status=="4"){
                  ?>
                  <td>Listing is Hide</td>
                  <?php
                }
                ?>
             
                <td>

                  <?php
                     $str="";
                      if(!$h->features){
                  $str=$str."Features Are Not Added<br>";
                }
                 
                 if(!$h->policies){
                  $str=$str."Policies  Are Not Added<br>";
                }
                 if(!$h->photos){
                  $str=$str."Photos  Are Not Added<br>";
                }
                 if(!$h->payments){
                  $str=$str."Payments Are Not Added<br>";
                }
                if($str==""){
                  $str="Your Profile Is 100% complete";
                }
                echo "<p style='font-size:10px;'>".$str."</p>";




                ?>
                  

                </td>
                <td><a style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" href="{{url('/addrooms/'.$h->id)}}" class="btn btn-success btn-sm">Add Rooms</a></td>
                 <td><a style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" href="{{url('/addhotelfeatures/'.$h->id)}}" class="btn btn-success btn-sm">Add/Edit Features</a><br>
                   <a style="margin-top:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" href="{{url('/updatehotelinfo/'.$h->id)}}" class="btn btn-success btn-sm">Edit Intro</a></td>

              </tr>
              @endforeach
            </tbody>
          </table>

          <br>
          <a  style="float: left;" href="/hotel"  class="btn btn-info">Back</a>
          <br>




</div>

</div>
</div>
</div>
</div>
</div>
</div>

            
     

 
  
@endsection