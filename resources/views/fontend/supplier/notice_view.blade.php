@extends('fontend.master-dashboard')
@section('page_css')
<link property='stylesheet' href="{!! asset('css/dashboard.css') !!}" rel="stylesheet">
<link property='stylesheet' href="{!! asset('assets/dashboard/css/spectrum.css') !!}" rel="stylesheet">
<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/why-bdtdc.css') !!}" rel="stylesheet">
<link  rel="stylesheet" property='stylesheet' href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@endsection
@section('content')
<div id="ajax_status" class="hide_this text-center">
   <img itemprop="image" src="{{ URL::asset('uploads/ajax_loading.gif') }}" class="img-responsive" alt="" >
</div>
<div class="loader"></div>
<div class="container">
   <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12" style="margin-top: 15px;">
         <ul class="top-path" style="padding-bottom: 8px;padding-top: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('/',null)}}" class="top-path-li-a"><span itemprop="name">Home</span> <i class="fa fa-angle-right top-path-icon"></i></a></li>
            <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('company/dashboard',null)}}" class="top-path-li-a"><span itemprop="name">Dashboard</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
            <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="#" class="top-path-li-a"><span itemprop="name">Notice Details</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
         </ul>
      </div>
   </div>
</div>
<div class="container">
<div id="item_sha" class="row" style="margin-top: 1%;background-color: #eceef2">
   <!-- -------LOADING ANIMATION WHILE PAGE IS IS LOADING--------- -->
   <div class="col-sm-2 padding-right">
      @include('fontend.layouts.dashboard-aside')
   </div>
   <div class="col-sm-8 padding-right">
      <div class="col-sm-12 col-md-12 col-lg-12">
         <div style="margin-bottom:3%;" class="col-sm-12 col-md-12 col-lg-12 padding_0" >
            <div class="box" style="width: 100%;background-color:#fff; margin-bottom: 30px;z-index: inherit;">
               <div class="portlet light">
                  <div class="portlet-title">
                     <a itemprop="item" href="{{URL::to('company/dashboard',null)}}" class="top-path-li-a"><i class="fa fa-angle-left top-path-icon"></i><span itemprop="name">Back</span></a>
                     <h3>{{ $notice->title }}</h3>
                     <p style="margin: 0px; font-size: 12px;">Notice Type: @if($notice->notice_type == 1) General @elseif($notice->notice_type == 2) User Role | @elseif($notice->notice_type == 3) User | @endif 
                     @foreach($notice->notice_details as $rowdata)
                        @if($notice->notice_type == 2)
                        <span>{{$rowdata->get_user_role_info->name}} | </span>
                        @elseif($notice->notice_type == 3)
                        <span>{{$rowdata->get_user_info->first_name}} {{$rowdata->get_user_info->last_name}} | </span>
                        @endif
                     @endforeach
                     </p>
                     <p style="margin: 0px; font-size: 12px;">Created At: {{ date('d-M-Y',strtotime($notice->created_at)) }}</p>
                     <p style="margin-top: 10px;">{{ $notice->details }}</p>
                     <embed src="{{ asset('notice_docs/'.$notice->attachment) }}" width="100%" height="500" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br>
<br>
@stop
@section('scripts')
<script type="text/javascript">
   $('.loader').fadeOut('slow');
</script>
@stop