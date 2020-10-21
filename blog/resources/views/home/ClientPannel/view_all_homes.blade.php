
@extends('useradmin.master')



@section('userdash')
<div class="sb2-2">
        <!--== breadcrumbs ==-->
        <div class="sb2-2-2">
          <ul>
            <li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
            <li class="active-bre"><a href="#"> My Home</a> </li>
            <li class="page-back"><a href="{{ URL('/home_listing') }}"><i class="fa fa-hotel" aria-hidden="true"></i> Add New Home</a> </li>
          </ul>
        </div>
        <div class="tz-2 tz-2-admin">
          <div class="tz-2-com tz-2-main">
            
            <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp">
                  <div class="inn-title">
                    <h4>My Homes</h4>
                  
                    
                    <!-- Dropdown Structure -->
                  </div>
                  <div class="tab-inn">
            <div class="table-responsive table-desi">
                      <table class="table" border="1">
                        <thead>
                          <tr>
                            <th>Sr</th>
                            <th>Listing</th>
                             
                 <th>Name</th>
                 <th>Type</th>
                 <th>Contact</th>
               
                 <th>Status</th>
                 <th>Profile Checkup</th>
                 <th colspan="5">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($hotels as $h)
               <tr>
                 
                  <td>{{$loop->iteration}}</td>
                 <td><span class="list-img"><img src="{{ URL::asset('hotel_images/'.$h->foldername.'/'.$h->main_header) }}" alt=""></span> </td>
                            <td><a href="#"><span class="list-enq-name">{{$h->hotel_name}}</span><span class="list-enq-city">{{$h->city}}, {{$h->city}}</span></a> </td>
                            <td>{{$h->yourRole}}</td>
                            <td>{{$h->contact}}</td>

                 <?php  
                 if($h->hotel_status=="0"){
                  ?>
                 <td> <span class="label label-primary">Pending</span> </td>
                  <?php
                }
                if($h->hotel_status=="1"){
                  ?>
              
                   <td> <span class="label label-primary">Approved</span> </td>
                  <?php
                }
                
                if($h->hotel_status=="2"){
                  ?>
                  <td> <span class="label label-danger">Premium</span> </td>
                  <?php
                }
                ?>
                <?php 
                if($h->hotel_status=="4"){
                  ?>
                 
                   <td> <span class="label label-danger">Hide</span> </td>
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
                  echo "<p style='font-size:14px;color:green;'>".$str."</p>";
                }else{
                  $str=$str."<a style='margin-top:20px;font-size:12px;' class='label label-primary'  href=/CompleteHomeListing/$h->id>Click To Complete Profile</a><hr>";
                  echo "<p style='font-size:14px;color:red;'>".$str."</p>";
                }
                




                ?>
                  

                </td> 
                <td> <a href="{{url('/home_details/'.$h->id)}}""><i class="fa fa-eye"></i></a> </td>
                            
                           
                        
                            <td> <a href="{{url('/editHomeinfo/'.$h->id)}}"><i class="fa fa-edit"></i></a>Edit </td>
               

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