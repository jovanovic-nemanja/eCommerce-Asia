@extends('protected.admin.layouts.dashboard')
@section('dashboard_content')
@include('protected.admin.layouts.sidebar')
<div class="page-content-wrapper">
   <div class="page-content">
      	@include('protected.admin.layouts.breadcrumb')
      	@yield('content')
   </div>
</div>
@stop






