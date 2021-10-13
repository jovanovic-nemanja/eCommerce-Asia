

@extends('fontend.layouts.dashboard_daynamic')
@section('dashboard_content')
	@if(isset($fluid))
	</div>
	<div class="container-fluid" style="background-color: #fff;">
	<div class="container">
	@include('fontend.layouts.header_dynamic')
	</div>
	</div>
	<div class="container">
	@else
	@include('fontend.layouts.header_dynamic')
	@endif
		
	@yield('content')
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5edb28009e5f6944229000b7/1epifpi1i';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
@stop

