@extends('fontend.layouts.dashboard')
	@section('dashboard_content')
		@include('fontend.layouts.header')
		
		<!---------HEADER INFORMATION-------------->
		@include('fontend.template.header_information')
            <!---------MENU BAR-------------->
            @include('fontend.template.menubar')
            <div class="information_viewer">
                  @yield('content')
            </div>
      @stop
      