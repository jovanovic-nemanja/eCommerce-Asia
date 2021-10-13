

@extends('fontend.layouts.dashboard-fluid')
	@section('dashboard_content')
		@include('fontend.layouts.header_dynamic')
		
			@include('fontend.layouts.sidebar2')
                    @yield('content')
                   	@stop






