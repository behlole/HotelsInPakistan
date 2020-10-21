@extends('useradmin.master')
@section('userdash')
<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
      
                      
       
					<ul>
       @foreach($hotels as $h) 
						<li><a href="/view_hotels"><i class="fa fa-home" aria-hidden="true"></i> Hotel</a> </li>
						<li class="active-bre"><a href="#">All Rooms Listed By {{$h->hotel_name}}</a> </li>
						<li class="page-back"><a href="{{ URL('room_listings',$h->id) }}"><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-hotel" aria-hidden="true"></i>Add Rooms</a> </li>
					</ul>
          @break;
        @endforeach
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						
						<div class="split-row">
                <div class="col-md-12">
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
							<div class="col-md-12">
								<div class="box-inn-sp">
									<div class="inn-title">
										<h4>My Rooms</h4>
									
										
										<!-- Dropdown Structure -->
									</div>
									<div class="tab-inn">
										<div class="table-responsive table-desi">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Sr</th>
														<th>Listing</th>
														 
                 <th>Room Name</th>
                 <th>No Of Room</th> 
                 <th>Guest Capacity</th>
                 <th>Price Per Night</th>
                 <th>Status</th>
                <th>Profile Progress</th>
                 <th colspan="2">Action</th>
													</tr>
												</thead>
												<tbody>
													  @foreach($rooms as $h)
               <tr>
                 
                  <td>{{$loop->iteration}}</td>
                 <td><span class="list-img"><img src="{{ URL::asset('roomiamges/'.$h->foldername.'/'.$h->main_header) }}" alt=""></span> </td>
														<td><a href="#"><span class="list-enq-name">{{$h->roomname}}</span><span class="list-enq-city">{{$h->custom_name}}, {{$h->room_size}},{{$h->room_unit}}</span></a> </td>
													     <td>{{$h->no_of_rooms}}</td>
                 <td>{{$h->total_people}}</td>
                 <td>{{$h->room_price_night}}</td>

                 <?php  
                 if($h->room_status=="0"){
                  ?>
                 <td> <span class="label label-primary">Pending</span> </td>
                  <?php
                }
                if($h->room_status=="1"){
                  ?>
              
                   <td> <span class="label label-primary">Approved</span> </td>
                  <?php
                }
                
                if($h->room_status=="2"){
                  ?>
                  <td> <span class="label label-danger">Premium</span> </td>
                  <?php
                }
                ?>
                <?php 
                if($h->room_status=="4"){
                  ?>
                 
                   <td> <span class="label label-danger">Hide</span> </td>
                  <?php
                }
                ?>
             
                 <td>
                <?php
                     $str="";
                    
                 if(!$h->ammenties){
                  $str=$str."Room Amenities Are Not Added<br>";
                }
                
                 if(!$h->photos){
                  $str=$str."Photos  Are Not Added<br>";
                }
                
                if($str==""){
                  $str="Room Information Is 100% complete";
                }
                echo $str;
                ?>
                </td>
              
														
														
														<td> <a href="{{url('/addroomsfeatures/'.$h->id)}}"><i class="fa fa-pencil"></i>Edit Amenities/Pics</a></td>
                            <td> <a href="{{url('/room_update/'.$h->id)}}"><i class="fa fa-pencil"></i>Edit Room, Price/Status</a> </td>
														
               

              </tr>
              @endforeach
													
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>




@endsection