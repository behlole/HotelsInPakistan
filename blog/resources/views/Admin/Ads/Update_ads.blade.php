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
	@foreach($data as $db)
	<form  action="{{url('update_ads_db/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="ad_id" value="{{$db->id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Hotel Ads</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-3">
								<label for="exampleInputPassword1">Image File</label>
								<input class="form-control" type="file"   name="ad_image" accept="image/png,image/jpg,image/jpeg,image/gif"   id="imgInp">

							</div>
							<div class="col-xs-2">
								<label for="exampleInputPassword1">Ad Name</label>
								<input class="form-control" type="text" name="ads_name" placeholder="Ads Name" required="" value="{{$db->ads_name}}">
								
							</div>
							<div class="col-xs-3">
								<label for="exampleInputPassword1">Company Name</label>
								<input class="form-control" type="text"  name="ads_company" placeholder="Company Name" required="" value="{{$db->ads_company}}">
							</div>
							<div class="col-xs-3">
								<label for="exampleInputPassword1">Ad Url</label>
								<input class="form-control" type="text"  name="ads_url" placeholder="Url" required="" value="{{$db->ads_url}}">
							</div>
						</div>



						<br>
						<div class="row">
							<div class="col-xs-3">
								<label for="exampleInputPassword1">Ad Page Show</label>
								<select class="form-control" name="ad_page">
									<?php if($db->all==1&&$db->result==1&&$db->single==1&&$db->inlisting==0&&!old(
										'ad_page')){
											?>
											<option value="1" selected="">All Pages</option>
											<option value="2">Single Page</option>
											<option value="3">Result</option>
											<option value="4">In Listing</option>
										<?php } ?>
										<?php if($db->all==0&&$db->result==0&&$db->single==1&&$db->inlisting==0&&!old(
											'ad_page')){
												?>
												<option value="1">All Pages</option>
												<option value="2" selected="">Single Page</option>
												<option value="3">Result Page</option>
												<option value="4" >In Listing</option>
											<?php } ?>
											<?php if($db->all==0&&$db->result==1&&$db->single==0&&$db->inlisting==0&&!old(
												'ad_page')){
													?>
													<option value="1">All Pages</option>
													<option value="2">Single Page</option>
													<option value="3" selected="">Result Page</option>
													<option value="4" >In Listing</option>
												<?php } ?>
												<?php if($db->all==0&&$db->result==0&&$db->single==0&&$db->inlisting==1&&!old(
													'ad_page')){
														?>
														<option value="1">All Pages</option>
														<option value="2">Single Page</option>
														<option value="3">Result Page</option>
														<option value="4" selected="">In Listing</option>
													<?php } ?>

													<?php
													if(old('ad_page')){?>
														<option value="1" @if(old('ad_page')==1)selected @endif>All Pages</option>
														<option value="2" @if(old('ad_page')==2)selected @endif>Single Page</option>
														<option value="3" @if(old('ad_page')==3)selected @endif>Result Page</option>
														<option value="4" @if(old('ad_page')==4)selected @endif>In Listing</option>

													<?php }
													?>

												</select>
											</div>
											<div class="col-xs-3">
												<label for="exampleInputPassword1">Allign</label>
												<select class="form-control" name="allign">
													<?php
													$mypage = array("Left", "Right", "All");
													?>
													@foreach($mypage as $allign)
													<?php
													if($db->allign==$allign&&!old('allign')){ ?>
														<option selected value="{{$allign}}">{{$allign}}</option>
													<?php }
													else if(old('allign')==$allign){ ?>
														<option selected value="{{$allign}}">{{$allign}}</option>
													<?php }
													else{ ?>
														<option value="{{$allign}}">{{$allign}}</option>
													<?php }
													?>
													@endforeach

												</select>
											</div>
											<div class="col-xs-2">
												<label for="exampleInputPassword1">Update Button</label>
												<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Update</button>
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
						<div class="col-md-12">
							<label>for previous picture don't upload new one...uploading new one will remove old</label>
							<img style="width:40%;
							height: 20%;
							position: relative;" id="blah" src="{{ URL::asset('Ads/'.$db->ads_folder.'/'.$db->ads_pic) }}" alt="your image" class="img-responsive center-block" />
						</div>
					</div>
				</section>
				@endforeach
				@endsection
				@section('javabee')
				<script type="text/javascript">
					function readURL(input) {

						if (input.files && input.files[0]) {
							var reader = new FileReader();

							reader.onload = function(e) {
								$('#blah').attr('src', e.target.result);
							}

							reader.readAsDataURL(input.files[0]);
						}
					}

					$("#imgInp").change(function() {
						readURL(this);
					});

				</script>
				@endsection

















				