@extends('Admin.master')
@section('AdminDash')
<section class="content">
	<form  action="{{url('Add_bed_options/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Add Bed Options</h3>
					</div>
					<div class="box-body">
						<div class="row">
							
							<div class="col-xs-4">
								
								<input class="form-control" type="text" placeholder="i.e Single Room" id="example-date-input" name="roomtypes">

							</div>
							<div class="col-xs-6">
								<select  name="bed_size_option" class="form-control" name="bed_size_option">

									<option value="0">No,Don't have Bed Options</option>
									<option value="1">Yes,They have BEd Option</option>

								</select>
								
							</div>
							<div class="col-xs-2">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Add Bed Options</button>
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
					<h3 class="box-title">All Bed Options Lists</h3>

					<div class="box-tools">
						
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th scope="col">Sr</th>
								<th scope="col"> Type NAME</th>
								<th scope="col">Room Size Show</th>
								<th scope="col">Created At</th>
							</tr>
							@foreach($data as $h)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$h->roomtypes}}</td>
								<td><?php
								if($h->bed_size_option==1){
									echo "Bed Size Will Be Shown";

								}else{
									echo "Bed Size Will No Be Shown";
								}?>
							</td>
							<td>{{\Carbon\Carbon::parse($h->created_at)->format('d F Y')}}</td>
							<td><a target=”_blank” href="{{ URL('Add_Room_Name',$h->id) }}"  class="btn btn-block btn-primary btn-flat"  >Add Room Name</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>


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