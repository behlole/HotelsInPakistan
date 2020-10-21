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
	<form  action="{{url('Add_Destination/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Add Destination</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-3">
								
							 <input class="form-control" type="file"  name="des_image" accept="image/png,image/jpg,image/jpeg,image/gif" required="">
							</div>
								<div class="col-xs-3">
								
								<select class="theme-search-area-section-input itemName form-control"  name="city" style="width: 100%;color: black;" ></select>
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="title"  name="title" placeholder="Title Of Destination">
								
							</div>
							<div class="col-xs-3">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Add Destination</button>
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
					<h3 class="box-title">All Destination Lists</h3>

					<div class="box-tools">
						
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th scope="col"><input type="checkbox" onClick="toggle(this)" /> Select All<br/></th>
								<th scope="col">Title</th>
								<th scope="col">Destination Image</th>
								<th scope="col">City</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>

							<form  action="{{url('perform_multiple_destination_opertions')}}" method="post" id="upload" enctype="multipart/form-data" style="margin:0px;padding: 0px; ">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								@foreach($data as $h)
								<tr>
									<td><input type="checkbox" value="{{$h->id}}"  id="customCheck1" name="check_list[]"></td>
									
									
									<td>{{$h->title}}</td>
									<td><img src="{{ URL::asset('destination/'.$h->des_folder.'/'.$h->des_pic) }}" alt="" style="width:auto;display:flex;height: 150px; "></td>
									<td>{{$h->city}}</td>
									
									<td>
										<?php 
                                        if($h->des_status==1){?>

                                        	<span class="badge bg-green">Active</span>
                                         <?php  }
										?>
										<?php 
                                        if($h->des_status==0){?>

                                        	<span class="badge bg-red">Hide</span>
                                          <?php }
										?>
										
									</td>
									<td>{{\Carbon\Carbon::parse($h->created_at)->format('d F Y')}}</td>

									<td>
										<a target=”_blank” href="{{ URL('Update_destination',$h->id) }}" class="btn btn-block btn-xs btn-success btn-flat">Update Destination</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="form-group">
							<label>
								<select class="form-control" name="des_status">
									<option value="1">Active</option>
									<option value="0">Hide</option>
								</select>
							</label>
							
							<label>
								<input type="checkbox" name="delete" value="delete">Delete
								
								
							</label>
							<label style="color: red"><input type="text" name="answer"  >To Delete Please give secret code </label>
							<button type="submit" name="submit" class="btn btn-primary btn-sm">Perform Multiple Action</button>
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
		function toggle(source) {
		checkboxes = document.getElementsByName('check_list[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>
@endsection