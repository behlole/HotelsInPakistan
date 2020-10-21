@extends('useradmin.master')



@section('userdash')
	<div class="sb2-2">
				<!--== breadcrumbs ==-->
				<div class="sb2-2-2">
					<ul>
						<li><a href="index-1.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a> </li>
						<li class="active-bre"><a href="#"> Dashboard</a> </li>
						<li class="page-back"><a href="#"><i class="fa fa-backward" aria-hidden="true"></i> Back</a> </li>
					</ul>
				</div>
				<div class="tz-2 tz-2-admin">
					<div class="tz-2-com tz-2-main">
						<h4>Manage Listing</h4> 
						<div class="tz-2-main-com bot-sp-20">
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"><i class="fa fa-hotel fa-5x" aria-hidden="true" ></i><br> <span>Hotel</span>
									<p>All Hotels Listed By User Either Pending Or Active</p>
									<h2>{{$Hotel}}</h2> </div>
							</div>
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"> <i class="fa fa-cutlery fa-5x" aria-hidden="true" ></i><br><span>Restaurants</span>
									<p>All Restaurant Listed By User Either Pending Or Active</p>
									<h2>{{$restlist}}</h2> </div>
							</div>
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"> <i class="fa fa-home fa-5x" aria-hidden="true" ></i><br><span>Homes</span>
									<p>All  Homes Listed By User Either Pending Or Active</p>
									<h2>{{$home}}</h2> </div>
							</div>
							<div class="tz-2-main-1 tz-2-main-admin">
								<div class="tz-2-main-2"> <i class="fa fa-car fa-5x" aria-hidden="true" ></i><br><span>Cars</span>
									<p>All the Cars Listed By User Either Pending Or Active</p>
									<h2>{{$car_opr}}</h2> </div>
							</div>
						</div>
						
					</div>
				</div>
			</div>





@endsection