

@extends('fontend.layouts.dashboard')
	@section('dashboard_content')
		@include('fontend.layouts.header')
		
			@include('fontend.layouts.sidebar2')
                    @yield('content')
                   	@stop






