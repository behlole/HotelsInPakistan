@extends('Admin.master')
@section('AdminDash')
<section class="content">
	<form  action="{{url('Add_Sub_Options/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="facility_id" value="{{$facility_id}}">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Add Sub Option Name</h3>
					</div>
					<div class="box-body">
						<div class="row">
							
							<div class="col-xs-3">
								
								<input class="form-control" type="text" placeholder="Sub Option Name" id="example-date-input" name="name_opt">

							</div>
							<div class="col-xs-2">
								<input class="form-control" type="text" placeholder="fa fa-area-chart" id="example-date-input" name="icon_awsome">
							</div>
							
							<div class="col-xs-2">
								<button type="submit" name="submit" class="btn btn-block btn-primary btn-flat">Add Sub Option</button>
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
					<h3 class="box-title">All Sub Option Name</h3>

					<div class="box-tools">
						
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body table-responsive no-padding">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th scope="col">Sr</th>
								<th scope="col">Sub Name</th>
								<th scope="col">Icon</th>
								<th scope="col">Created At</th>
								<th scope="col" colspan="2">Action</th>
							</tr>
							@foreach($data as $h)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$h->name}}</td>
								<td>{{$h->sub_icon}}</td>
								<td>{{\Carbon\Carbon::parse($h->created_at)->format('d F Y')}}</td>

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