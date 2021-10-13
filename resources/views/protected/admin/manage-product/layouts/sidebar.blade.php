<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
   <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
   <div class="page-sidebar navbar-collapse">
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
            <a href="{{URL('admin/dashboard/User Management')}}" class="tooltip">
               <i class="fa fa-user" aria-hidden="true"></i>
               <span class="title">User Management</span>
               <span class="tooltiptext">User Management</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/Content Management')}}" class="tooltip">
               <i class="fa fa-file-text-o" aria-hidden="true"></i>
               <span class="title">Content Management</span>
               <span class="tooltiptext">Content Management</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/Classifieds (B2b)')}}" class="tooltip">
               <i class="fa fa-newspaper-o" aria-hidden="true"></i>
               <span class="title">Classifieds (B2b)</span>
               <span class="tooltiptext">Classifieds (B2b)</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/My B2B')}}" class="tooltip">
               <i class="fa fa-retweet" aria-hidden="true"></i>
               <span class="title">My B2B</span>
               <span class="tooltiptext">My B2B</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/Add Users')}}" class="tooltip">
               <i class="fa fa-user-plus" aria-hidden="true"></i>
               <span class="title">Add Users</span>
               <span class="tooltiptext">Add Users</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/Modules')}}" class="tooltip">
               <i class="fa fa-cubes" aria-hidden="true"></i>
               <span class="title">Modules</span>
               <span class="tooltiptext">Modules</span>
            </a>
         </li>
         <li>
            <a href="{{URL('admin/dashboard/Menu')}}" class="tooltip">
               <i class="fa fa-bars" aria-hidden="true"></i>
               <span class="title">Menu</span>
               <span class="tooltiptext">Menu</span>
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
            <a href="{{URL::route('admin.notice_list')}}" class="tooltip">
               <i class="fa fa-sticky-note" aria-hidden="true"></i>
               <span class="title">Notice Board</span>
               <span class="tooltiptext">Notice Board</span>
            </a>
         </li>
         <li>
            <a href="{{URL::route('admin.slider_setting')}}" class="tooltip">
               <i class="fa fa-sliders" aria-hidden="true"></i>
               <span class="title">Slider Setting</span>
               <span class="tooltiptext">Slider Setting</span>
            </a>
         </li>
      </ul>
      <!-- END SIDEBAR MENU -->
   </div>
</div>
        <!-- END SIDEBAR -->