@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="col-xs-12">
   @if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
   @endif
</div>
<style>
   #selectedFiles img {
      max-width: 100px;
      max-height: 100px;
      float: left;
      margin-bottom:10px;
   }
   .close {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
   }
   .close:hover {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
      color:#fff;
   }
</style>

<h3 class="page-title">
   Slider Details</small>
</h3>
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home"></i>
         <a href="{{URL::route('admin_dashboard')}}">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>

      <li>
         <a href="#">Slider Details</a>
      </li>
   </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <div class="portlet light">
         <div class="portlet-title">
            <h3>{{ $slider->heading }}</h3>
            <p style="margin: 0px; font-size: 12px;">Created At: {{ date('d-M-Y',strtotime($slider->created_at)) }}</p>
            <p style="margin-top: 10px;">{{ $slider->url }}</p>
            <p style="margin-top: 10px;">{{ $slider->paragraph }}</p>
            <embed src="{{ asset('slider_image/'.$slider->slider_image) }}" width="100%" height="100%" />
         </div>
      </div>
   </div>
</div>
</div>

<!-- END PAGE CONTENT-->

@stop
@section('scripts')
@stop
