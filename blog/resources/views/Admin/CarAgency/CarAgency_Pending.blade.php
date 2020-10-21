@extends('Admin.master')
@section('AdminDash')
<style type="text/css">

.select2-container--default .select2-selection--single {


	display: block !important;
	width: 100% !important;
	height: 34px !important;
	padding: 6px 12px !important;
	font-size: 14px !important;
	line-height: 1.42857143 !important;
	color: #555 !important;
	background-color: #fff !important;
	background-image: none !important;
	border: 1px solid #ccc !important;
	border-radius: 4px !important;;

}
</style>
<section class="content">
	<form  action="{{url('search_CarAgency_by_pending/')}}" method="get" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Seacrh By City</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-3">
								
								<select class="theme-search-area-section-input itemName form-control"  name="city" style="width: 100%;color: black;" ></select>
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="date"  id="d1" id="d1" name="from">
								
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="date"  id="d2" name="to">
							</div>
							<div class="col-xs-2">
								<select class="form-control" name="profile_check">
									<option value="1">100% Profile</option>
									<option value="0">50% Profile</option>
								</select>
							</div>
							<div class="col-xs-1">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Search</button>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
			@if (count($errors) > 0 || session('status_ok'))
			<div class="col-md-12" style="font-size: 18px;">
				@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
				<p class="text-red">
					{{ $error }}<br>
				</p>
				@endforeach
				@endif
				@if (session('status_ok'))
				<p class="text-green">
					{{ session('status_ok') }}
				</p>
				@endif
			</div>
			@endif
		</div>
	</form>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">CarAgency Pending </h3>

					<div class="box-tools">
						
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th scope="col"><input type="checkbox" onClick="toggle(this)" /> Select All<br/></th>
								<th scope="col">Name</th>
								<th scope="col">Phno</th>
								<th scope="col">City</th>
								<th scope="col">No Of Cars</th>
								<th scope="col">Min Price</th>
								<th scope="col">Status</th>
								<th scope="col">Profile</th>
								<th scope="col">Date</th>
								<th scope="col">Action</th>
							</tr>

							<form  action="{{url('CarAgency_Pending_Approval')}}" method="post" id="upload" enctype="multipart/form-data" style="margin:0px;padding: 0px; ">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								@foreach($data as $h)
								<tr>
									<td><input type="checkbox" value="{{$h->id}}"  id="customCheck1" name="check_list[]"></td>
									
									
									<td>{{$h->caropr_name}}</td>
									<td>{{$h->contact}}</td>
									<td>{{$h->city}}</td>
									<td>{{$h->total_cars}}</td>
									<td>{{$h->car_price}}</td>
									<?php  
									if($h->car_opr_status==0){
										?>
										<td>NOT APPROVED</td>
										<?php
									}
									?>
									<?php 
									if($h->details==NULL){
										?>
										<td>
											<span class="badge bg-green">50%</span>

										</td>

									<?php  }else{
										?>

										<td>
											<span class="badge bg-green">100%</span>
											
										</td>
										<?php

									}

									?>
									<td>{{\Carbon\Carbon::parse($h->created_at)->format('d F Y')}}</td>

									<td>
										<a target=”_blank” href="{{ URL('admin_hotel_details_approvel',$h->id) }}" class="btn btn-block btn-xs btn-success btn-flat">View Approve And Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="form-group">
							<label>
								<input type="checkbox" class="minimal" checked>
								Approved
							</label>
							<br>
							<button type="submit" class="btn btn-primary btn-sm">Perform Multiple Action</button>


						</div>
						

					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
</section>
@endsection
@section('javabee')
<script type="text/javascript">
	

	jQuery(document).ready(function($){
		

		var date = new Date();

		var day = date.getDate(),
		month = date.getMonth() + 1,
		year = date.getFullYear();


		var today = year + "-" + month + "-" + day;
		

		document.getElementById('d1').value = today; 
		document.getElementById('d2').value = today;      

		document.getElementById("d2").min=document.getElementById('d1').value;


		$('#d1').change(function(){

			

			document.getElementById("d2").min=document.getElementById('d1').value;
			



		});
	});

</script>
<script type="text/javascript">
	function toggle(source) {
		checkboxes = document.getElementsByName('check_list[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>
<script type="text/javascript">
	
	jQuery(document).ready(function($){

		$('.itemName').select2({

			placeholder: 'Select City Name',

			ajax: {

				url: '/select2-autocomplete-ajax',

				dataType: 'json',

				delay: 250,

				processResults: function (data) {

					return {

						results:  $.map(data, function (item) {

							return {

								text: item.city_name,

								id: item.id

							}

						})

					};

				},

				cache: true

			}

		});
	});
</script>
@endsection