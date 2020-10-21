
@extends('useradmin.master')



@section('userdash')
<div class="sb2-2">
        <!--== breadcrumbs ==-->
        <div class="sb2-2-2">
          <ul>
            <li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
            <li class="active-bre"><a href="#">ALL CAR RENTAL Listing By {{Auth::user()->name}}</a> </li>
            <li class="page-back"><a href="{{ URL('/caropr_listings') }}"><i class="fa fa-car" aria-hidden="true"></i> Add New Car Agency</a> </li>
          </ul>
        </div>
        <div class="tz-2 tz-2-admin">
          <div class="tz-2-com tz-2-main">
            
            <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp">
                  <div class="inn-title">
                    <h4>My Car Agency</h4>
                  
                    
                    <!-- Dropdown Structure -->
                  </div>
                  @if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
     </div>
 @endif
                  <div class="tab-inn">
                    <div class="table-responsive table-desi">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Sr</th>
                            <th>Listing</th>
                             
                     <th>Name</th>
                       <th>Contacts</th>
                    
                       <th>Status</th>
                       <th colspan="2">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $h)
               <tr>
                 
                  <td>{{$loop->iteration}}</td>
                 <td><span class="list-img"><img src="{{ URL::asset('caropr_image/'.$h->car_opr_folder.'/'.$h->uploadHeaderPhoto) }}" alt=""></span> </td>
                            <td><a href="#"><span class="list-enq-name">{{$h->caropr_name}}</span><span class="list-enq-city">{{$h->city}}</span></a> </td>
                          
                            <td>{{$h->contact}}</td>

                 <?php  
                 if($h->car_opr_status=="0"){
                  ?>
                 <td> <span class="label label-primary">Pending</span> </td>
                  <?php
                }
                if($h->car_opr_status=="1"){
                  ?>
              
                   <td> <span class="label label-primary">Approved</span> </td>
                  <?php
                }
                
                if($h->car_opr_status=="2"){
                  ?>
                  <td> <span class="label label-danger">Premium</span> </td>
                  <?php
                }
                ?>
                <?php 
                if($h->car_opr_status=="4"){
                  ?>
                 
                   <td> <span class="label label-danger">Hide</span> </td>
                  <?php
                }
                ?>
             
              

                

                
                <td> <a style="" href="{{url('/car_details/'.$h->id)}}""><i  style="background-color:#ffffff;font-size:20px;color:rgb(146, 146, 146);" class="fa fa-eye"></i></a> </td>
                            
                            <td> 
                              <a style="" href="{{url('/caropr_edit/'.$h->id)}}"><i style="background-color:#ffffff;font-size:20px;color:rgb(146, 146, 146);" class="fa fa-pencil"></i> Edit Car Agency Data </a>

                              <a style="" href="{{ URL('carlisting/'.$h->id) }}"><i style="background-color:#ffffff;font-size:20px;color:rgb(146, 146, 146);" class="fa fa-pencil"></i> Add Cars </a></td>
                           
               

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