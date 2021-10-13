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
         <!-- <li class="start active ">
            <a href="{{URL::route('admin_dashboard')}}">
               <i class="icon-home"></i>
               <span class="title">Dashboard</span>
               <span class="selected"></span>
            </a>
         </li> -->

         @foreach($modules as $module)
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
         @endforeach
         <li>
            <a href="{{URL::route('admin.notice_list')}}">
               <i class="fa fa-newspaper-o" aria-hidden="true"></i>
               <span class="title">Notice Board</span>
               <span class="arrow "></span>
            </a>
         </li>
         <li>
            <a href="{{URL::route('admin.slider_setting')}}">
               <i class="fa fa-file-image-o" aria-hidden="true"></i>
               <span class="title">Slider Setting</span>
               <span class="arrow "></span>
            </a>
         </li>
      </ul>
      <!-- END SIDEBAR MENU -->
   </div>
</div>
        <!-- END SIDEBAR -->