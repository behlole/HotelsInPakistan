@include('Admin.chunks.header')

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		@include('Admin.chunks.main_header')
		@include('Admin.chunks.main_sidebar')
		<div class="content-wrapper">
			@yield('AdminDash')
		</div>


		@include('Admin.chunks.footer')