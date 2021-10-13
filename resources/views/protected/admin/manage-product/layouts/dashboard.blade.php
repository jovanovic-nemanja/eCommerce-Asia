@extends('protected.admin.layouts.default')
@section('maincontent')
@include('protected.admin.layouts.notify')
<!-- BEGIN HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="test">
   <div class="page-container">
      @yield('dashboard_content')
      </div>
      <div class="page-footer">
         <div class="page-footer-inner">
            {{date('Y')}} &copy; BuyerSeller.Asia. <a href="http://www.buyerseller.asia" title="" target="_blank"></a>
         </div>
         <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
         </div>
      </div>
   
</div>
@stop