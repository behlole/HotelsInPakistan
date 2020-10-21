
@extends('useradmin.master')



@section('userdash')
<div class="sb2-2">
  <!--== breadcrumbs ==-->
  <div class="sb2-2-2">
    <ul>
       @foreach($cars_opr as $d)
       <?php $opr=$d->caropr_name; ?>
      <li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
      <li class="active-bre"><a href="#">ALL CARS Listed BY {{$d->caropr_name}} Owned By {{Auth::user()->name}}</a> </li>
      <li class="page-back"><a href="{{ URL('carlisting/'.$d->id) }}"><i class="fa fa-car" aria-hidden="true"></i> Add New Car</a> </li>
       @endforeach
    </ul>
  </div>
  <div class="tz-2 tz-2-admin">
    <div class="tz-2-com tz-2-main">

      <div class="split-row">
        <div class="col-md-12">
          <div class="box-inn-sp">
            <div class="inn-title">
              <h4>{{$opr}}</h4>


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
                    <th colspan="2">CAR TITLE</th>


                    <th>NO of Cars in Fleet</th>
                    
                    <th>Fuel</th>
                    <th>PKR PER DAY</th>
                    <th>Passengers</th>
                    <th>AC</th>
                    <th>BAGS</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cars as $h)
                  <tr>

                    <td>{{$loop->iteration}}</td>
                    <td><span class="list-img"><img src="{{ URL::asset('cars_image/'.$h->car_folder.'/'.$h->car_pic) }}" alt=""></span> </td>
                    <td><a href="#"><span class="list-enq-name">{{$h->car_title}}</span><span class="list-enq-city">{{$h->brand}} {{$h->vehicle_type}} {{$h->transmission_type}}</span></a> </td>

                    <td>{{$h->no_of_cars}}</td>
                   
                    <td>{{$h->fuel}}</td>
                    <td>{{$h->car_price}}</td>
                    <td>{{$h->passengers}}</td>
                    <td>{{$h->ac}}</td>
                    <td>{{$h->bags}}</td>

                    <?php  
                    if($h->car_status=="0"){
                      ?>
                      <td> <span class="label label-primary">Pending</span> </td>
                      <?php
                    }
                    if($h->car_status=="1"){
                      ?>

                      <td> <span class="label label-primary">Approved</span> </td>
                      <?php
                    }

                    if($h->car_status=="2"){
                      ?>
                      <td> <span class="label label-danger">Premium</span> </td>
                      <?php
                    }
                    ?>
                    <?php 
                    if($h->car_status=="4"){
                      ?>

                      <td> <span class="label label-danger">Hide</span> </td>
                      <?php
                    }
                    ?>






                    

                    <td colspan="2"> 
                      <a style="" href="{{url('/car_edit/'.$h->id)}}"><i style="background-color:#ffffff;font-size:20px;color:rgb(146, 146, 146);" class="fa fa-pencil"></i><br> Edit Car </a>


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

    </div>
  </div>
</div>




@endsection