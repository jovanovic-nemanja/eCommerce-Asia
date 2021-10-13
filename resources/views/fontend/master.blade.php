@extends('fontend.layouts.dashboard')
	@section('dashboard_content')

	@if (Sentinel::check())
		@include('fontend.layouts.header-dashboard')
	@else
		@include('fontend.layouts.header')
	@endif

	@include('fontend.layouts.sidebar') 

    @yield('content')

@stop






