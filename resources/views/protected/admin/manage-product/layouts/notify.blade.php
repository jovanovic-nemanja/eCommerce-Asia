<style type="text/css">
    .notification-icon:after {
        position: relative;
        margin-left: 0px;
    }
</style>
<div class="page-header navbar navbar-fixed-top col-lg-12 col-12 p-0 flex-row">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner navbar-menu-wrapper bg-white d-flex align-center justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-flex align-center flex-row">
            <li class="nav-item nav-toggler-item">
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler">
                </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
            </li>
            <li class="nav-item nav-search d-none d-lg-flex">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <form class="search-form search-form-expanded" action="" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="query">
                        <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
                <!-- END HEADER SEARCH BOX -->
            </li>
        </ul>
        
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ URL::to('/',null)}}">
            <img src="{!! asset('assets/logo.png') !!}" height="50px"  alt="logo" class="logo-default"/>
            </a>

            {{-- <div class="menu-toggler sidebar-toggler"> --}}
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            {{-- </div> --}}
        </div>
        <!-- END LOGO -->
        
        <!-- BEGIN PAGE ACTIONS -->
        <!-- DOC: Remove "hide" class to enable the page header actions -->
        @if (Sentinel::check())
        <div class="page-actions hide">
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-tag"></i> New Comment </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-share"></i> Share </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-circle green-haze dropdown-toggle" data-toggle="dropdown">
                <i class="icon-bell"></i>&nbsp;<span class="hidden-sm hidden-xs">Post&nbsp;</span>&nbsp;<i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="javascript:;">
                        <i class="icon-docs"></i> New Post </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-tag"></i> New Comment </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-share"></i> Share </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-flag"></i> Comments <span class="badge badge-success">4</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <i class="icon-users"></i> Feedbacks <span class="badge badge-danger">2</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right flex-row">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    {{-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        <span class="badge badge-default">
                        7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3><span class="bold">12 pending</span> notifications</h3>
                                <a href="extra_profile.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">just now</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-success">
                                        <i class="fa fa-plus"></i>
                                        </span>
                                        New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">3 mins</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">10 mins</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">14 hrs</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">2 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">3 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">4 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-warning">
                                        <i class="fa fa-bell-o"></i>
                                        </span>
                                        Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">5 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-info">
                                        <i class="fa fa-bullhorn"></i>
                                        </span>
                                        System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="time">9 days</span>
                                        <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                        <i class="fa fa-bolt"></i>
                                        </span>
                                        Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    {{-- <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-envelope-open"></i>
                        <span class="badge badge-default">
                        4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have <span class="bold">7 New</span> Messages</h3>
                                <a href="page_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="{{ asset('assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Lisa Wong </span>
                                        <span class="time">Just Now </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="{{ asset('assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Richard Doe </span>
                                        <span class="time">16 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="{{ asset('assets/admin/layout3/img/avatar1.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Bob Nilson </span>
                                        <span class="time">2 hrs </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="{{ asset('assets/admin/layout3/img/avatar2.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Lisa Wong </span>
                                        <span class="time">40 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html?a=view">
                                        <span class="photo">
                                        <img src="{{ asset('assets/admin/layout3/img/avatar3.jpg') }}" class="img-circle" alt="">
                                        </span>
                                        <span class="subject">
                                        <span class="from">
                                        Richard Doe </span>
                                        <span class="time">46 mins </span>
                                        </span>
                                        <span class="message">
                                        Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    {{--  <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-calendar"></i>
                        <span class="badge badge-default">
                        3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>You have <span class="bold">12 pending</span> tasks</h3>
                                <a href="page_todo.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">New release v1.2 </span>
                                        <span class="percent">30%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">40% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Application deployment</span>
                                        <span class="percent">65%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">65% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Mobile app release</span>
                                        <span class="percent">98%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">98% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Database migration</span>
                                        <span class="percent">10%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">10% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Web server upgrade</span>
                                        <span class="percent">58%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">58% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">Mobile development</span>
                                        <span class="percent">85%</span>
                                        </span>
                                        <span class="progress">
                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">85% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                        <span class="task">
                                        <span class="desc">New UI release</span>
                                        <span class="percent">38%</span>
                                        </span>
                                        <span class="progress progress-striped">
                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"><span class="sr-only">38% Complete</span></span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    @if (Sentinel::check())
                    @php
                        $notifications = getAdminNotification();
                        $all_notifications = $notifications['all_notifications'];
                        $inquiry_notifications = $notifications['inquiry_notifications'];
                        $quote_notifications = $notifications['quote_notifications'];
                        $order_notifications = $notifications['order_notifications'];
                        $new_user_notifications = $notifications['new_user_notifications'];
                    @endphp
                    <div class="page-actions ">
                        <div class="btn-group">
                            <button type="button" class="btn btn-circle dropdown-toggle" data-toggle="dropdown">
                            <span id="all_notification"><i class="fa fa-globe" aria-hidden="true"></i><i data-count="{{$all_notifications}}" class="glyphicon notification-icon"></i></span>&nbsp;<i class="fa fa-angle-down"></i>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li id="pusher_notification_4">
                                    <a href="{{ URL::to('admin/profiles',null) }}">
                                        <i class="icon-user"></i> New User <span><i data-count="{{$new_user_notifications}}" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_1">
                                    <a href="{{ URL::to('admin/manage-inquiry',null)}}">
                                    <i class="icon-present"></i> New Inquery <span><i data-count="{{$inquiry_notifications}}" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_2">
                                    <a href="javascript:;">
                                        <i class="icon-basket"></i> New Quote <span><i data-count="{{$quote_notifications}}" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                                <li id="pusher_notification_3">
                                    <a href="javascript:;">
                                        <i class="icon-basket"></i> New order <span><i data-count="{{$order_notifications}}" class="glyphicon notification-icon"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
  
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="{{ asset('assets/admin/profile/',Sentinel::getUser()->profile_pic) }}"/>
                        <span class="username username-hide-on-mobile">
                         {{ Sentinel::getUser()->first_name }}</span>
                        <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                             <li>
                                <a href="{{ URL::to('admin/profiles',Sentinel::getUser()->id )}}">
                                <i class="icon-user"></i> My Profile </a>
                            </li>
                        {{--
                            <li>
                                <a href="page_calendar.html">
                                <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="inbox.html">
                                <i class="icon-envelope-open"></i> My Inbox <span class="badge badge-danger">
                                3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="page_todo.html">
                                <i class="icon-rocket"></i> My Tasks <span class="badge badge-success">
                                7 </span>
                                </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="extra_lock.html">
                                <i class="icon-lock"></i> Lock Screen </a>
                            </li> --}}
                            <li>
                                <a href="{{ URL::to('logout')}}">
                                <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                   {{--  <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="icon-logout"></i>
                    </li> --}}
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>

@if(Sentinel::check())
<input type="hidden" id="user_id" value="admin">
@endif