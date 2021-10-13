

@extends('fontend.layouts.dashboard_daynamic')
	@section('dashboard_content')
		@if(isset($fluid))
		</div>
		<div class="container-fluid" style="background-color: #fff ">
		<div class="container">
		@include('fontend.layouts.header_dynamic')
		</div>
		</div>
		<div class="container">
		@else
		@include('fontend.layouts.header_dynamic')
		@endif



		
			
                    @yield('content')
                   	@stop






