@extends('fontend.layouts.dashboard-home')
	@section('dashboard_content')
@if (Sentinel::check())
	@include('fontend.layouts.header-dashboard')
@else
	@include('fontend.layouts.header-home')
@endif
	@yield('content')
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/f9789200ea56c64f14d8e8db4d860d9eeee15c16/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
@stop