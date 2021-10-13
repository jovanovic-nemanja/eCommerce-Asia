@extends('fontend.layouts.default')

@section('maincontent')

  <!-- BEGIN HEADER -->


<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="container">


    @yield('dashboard_content')
  
  @include('fontend.layouts.footer')
    </div>
@stop