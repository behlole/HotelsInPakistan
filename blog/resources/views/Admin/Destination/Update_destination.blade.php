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
	<form  action="{{url('Update_Destination_db/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="des_id" value="{{$db->id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Update Destination</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-xs-3">
								
							 <input class="form-control" type="file"  name="des_image" accept="image/png,image/jpg,image/jpeg,image/gif" >
							</div>
								<div class="col-xs-3">
								
								<select class="theme-search-area-section-input itemName form-control"  name="city" style="width: 100%;color: black;" >
									 <?php
          if($db->city_id&&!old('city')){
            ?>
            <option value="{{$db->city_id}}">{{App\city_name::city_name_find($db->city_id)}}</option>
            <?php
          }
          else{
           ?>
           <option value="{{old('city')}}">{{App\city_name::city_name_find(old('city'))}}</option>
           <?php
         }
         ?>
								</select>
							</div>
							<div class="col-xs-3">
								<input class="form-control" type="title"  name="title" value="{{$db->title}}" placeholder="Title Of Destination">
								
							</div>
							<div class="col-xs-3">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Update Destination</button>
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
		<img style="width:70%;
        height: 50%;
        position: relative;" id="blah" src="{{ URL::asset('destination/'.$db->des_folder.'/'.$db->des_pic) }}" alt="your image" class="img-responsive center-block" />
	</div>
</div>
@endforeach
</section>
@endsection

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