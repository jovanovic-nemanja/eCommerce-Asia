<?php
//$file1 = basename(URL::current()); 
//$file_name = urldecode($file1);
$data = Session::all();
$file_name = Session::get('content');
//print_r($data);
//echo $value;
?>
<style>
     li a.active{
        background: #369bff;
        color: white;
    }
</style>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
   <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
   <div class="page-sidebar navbar-collapse collapse" style="width: 195px">
      <!-- BEGIN SIDEBAR MENU -->
      <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
      <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
      <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
      <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
      <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
      <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
      <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
         <!-- <li class="start active">
            <a href="{{URL::route('admin_dashboard')}}">
               <i class="icon-home" aria-hidden="true"></i>
               <span class="title">Dashboard</span>
               <span class="selected"></span>
            </a>
         </li> -->
         <li>
            <a <?php if($file_name=='User Management' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/User Management')}}">
               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="title">User Management</span>
               <span class="selected "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Content Management' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Content Management')}}">
               <i class="fa fa-file-text-o" aria-hidden="true"></i>
               <span class="title">Content Management</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Classifieds (B2b)' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Classifieds (B2b)')}}">
               <i class="icon-home" aria-hidden="true"></i>
               <span class="title">Classifieds (B2b)</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='My B2B' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/My B2B')}}">
               <i class="icon-tag" aria-hidden="true"></i>
               <span class="title">My B2B</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Add Users' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Add Users')}}">
               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="title">Add Users</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Modules' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Modules')}}">
               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
               <span class="title">Modules</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='Menu' ){ echo 'class="active"'; } ?> href="{{URL('admin/dashboard/Menu')}}">
               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
               <span class="title">Menu</span>
               <span class="arrow "></span>
            </a>
         </li>

         <!-- @foreach($modules as $module)
         <li>
            <a href="javascript:;">
               {!! $module->icon1 !!}
               <span class="title">{{ $module->name }}</span>
               <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
               @foreach($module->childrens as $children)   
                  <li>
                     <a href="{{URL::to($children->slug)}}">
                     {!! $children->icon2 !!}
                     {{ $children->name }}</a>
                  </li>
               @endforeach
            </ul>
         </li>
         @endforeach -->
         <li>
            <a <?php if($file_name=='noticeList' ){ echo 'class="active"'; } ?> href="{{URL::route('admin.notice_list')}}">
               <i class="fa fa-newspaper-o" aria-hidden="true"></i>
               <span class="title">Notice Board</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='sliderSetting' ){ echo 'class="active"'; } ?> href="{{URL::route('admin.slider_setting')}}">
               <i class="fa fa-file-image-o" aria-hidden="true"></i>
               <span class="title">Slider Setting</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a <?php if($file_name=='listarchiveuser' ){ echo 'class="active"'; } ?> href="{{URL('admin/profiles/listarchiveuser')}}">
               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="title">Archive User</span>
               <span class="selected "></span>
            </a>
         </li>
      </ul>
      <!-- END SIDEBAR MENU -->
   </div>
</div>
        <!-- END SIDEBAR -->