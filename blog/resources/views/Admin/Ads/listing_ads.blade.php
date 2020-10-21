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
	<form  action="{{url('add_ads_db/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="page_request" value="{{$page_id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">{{$page_name}}</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-3">
								
							 <input class="form-control" type="file"  name="ad_image" accept="image/png,image/jpg,image/jpeg,image/gif" required="">
							</div>
							<div class="col-xs-2">
								<input class="form-control" type="text" name="ads_name" placeholder="Ads Name" required="">
								
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="text"  name="ads_company" placeholder="Company Name" required="">
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="text"  name="ads_url" placeholder="Url" required="">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-3">
								<select class="form-control" name="ad_page">
									<option value="1">All Pages</option>
									<option value="2">Single</option>
									<option value="3">Result</option>
									<option value="4">In Listing</option>
								</select>
							</div>
							<div class="col-xs-3">
								<select class="form-control" name="allign">
									<option value="Left">Left</option>
									<option value="Right">Right</option>
									<option value="All">All</option>
								</select>
							</div>
							<div class="col-xs-2">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Insert</button>
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
					<h3 class="box-title">{{$page_name}}</h3>

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
								<th scope="col">URL</th>
								<th scope="col">Company</th>
								<th scope="col">Image</th>
								<th scope="col">Allignment</th>
								<th scope="col">Page Show</th>
								<th scope="col">Status</th>
							
								<th scope="col">Action</th>
							</tr>

							<form  action="{{url('perform_multiple_ads')}}" method="post" id="upload" enctype="multipart/form-data" style="margin:0px;padding: 0px; ">

								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								@foreach($data as $h)
								<tr>
									<td><input type="checkbox" value="{{$h->id}}"  id="customCheck1" name="check_list[]"></td>
									
									
									<td>{{$h->ads_name}}</td>
									<td>{{$h->ads_url}}</td>
									<td>{{$h->ads_company}}</td>
									<td><img src="{{ URL::asset('Ads/'.$h->ads_folder.'/'.$h->ads_pic) }}" alt="" style="width:25px;height: 50px; "></td>
									<td>{{$h->allign}}</td>
									
									<td>
										<?php 
                                        if($h->single==1){?>

                                        	<span class="badge bg-green">Single Pages</span>
                                         <?php  }
										?>
										<?php 
                                        if($h->result==1){?>

                                        	<span class="badge bg-red">Result Pages</span>
                                          <?php }
										?>
										<?php 
                                        if($h->all==1){?>

                                        	<span class="badge bg-green">All Pages</span>
                                         <?php  }
										?>
										<?php 
                                        if($h->inlisting==1){?>

                                        	<span class="badge bg-green">Only In Listing</span>
                                         <?php  }
										?>
									</td>
									<td>{{\Carbon\Carbon::parse($h->created_at)->format('d F Y')}}</td>
									<td>
										<?php 
                                        if($h->ads_status==0){?>

                                        	<span class="badge bg-red">De Active</span>
                                         <?php  }
										?>
										<?php 
                                        if($h->ads_status==1){?>

                                        	<span class="badge bg-green">Active</span>
                                         <?php  }
										?>
									</td>

									<td>
										<a target=”_blank” href="{{ URL('Update_ads',$h->id) }}" class="btn btn-block btn-xs btn-success btn-flat">Update Ads</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<div class="form-group">
							<label>
								<input type="radio" name="PerformThis" value="1">Perform this
							</label>
							<label>
								
								<select class="form-control" name="ad_page">
									<option value="1">All Pages</option>
									<option value="2">Single</option>
									<option value="3">Result</option>
									<option value="4">InListing</option>
								</select>
							</label>
							<label>
								<select class="form-control" name="allign">
									<option value="Left">Left</option>
									<option value="Right">Right</option>
									<option value="All">All</option>
								</select>
								
							</label>
							<br>
							<input type="radio" name="PerformThis" value="2">Perform this
							<input type="hidden" name="page_request" value="{{$page_id}}">
							<label>
								<input type="checkbox" name="delete" value="delete">Delete
								
								
							</label>

							<label style="color: red"><input type="text" name="answer"  >To Delete Please give secret code </label>
							<br>
							<input type="radio" name="PerformThis" value="3">Perform this
							<label>
								<input type="radio" name="ads_status" value="1">Active
								<input type="radio" name="ads_status" value="0">De Active
								
								
							</label><br>
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
	function toggle(source) {
		checkboxes = document.getElementsByName('check_list[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>
@endsection