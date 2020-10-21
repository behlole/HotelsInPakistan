   
@include('UserPannel.Chunks.top')

<div id="content">

	@include('UserPannel.Chunks.nav')

	@yield('users')

</div>

@include('UserPannel.Chunks.bottom')