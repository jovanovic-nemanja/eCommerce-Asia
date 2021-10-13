<!doctype html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="_token" content="{!! csrf_token() !!}"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" href="{!! asset('favicon-32x32.png') !!}" sizes="32x32" />
      <link rel="icon" type="image/png" href="{!! asset('favicon-16x16.png') !!}" sizes="16x16" />
      <link rel="icon" type="image/png" href="{!! asset('favicon-8x8.png') !!}" sizes="16x16" />
      <link rel="alternate" href="http://www.buyerseller.asia" hreflang="en-us">
      <title>{{ $title ?? 'BuyerSeller'}}  </title>
      <meta name="title" content="{{ $title ?? ''}}" />
      <meta name="keywords" content="Find the Latest Reliable Apparel, Textiles &amp; Accessories Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh" />
      <meta name="description" content="{{ $description ?? ''}}"/>
      <meta property="og:title" content="bangladesh b2b marketplace,bangladesh b2b site,Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh and South Asia International Trade Site. Import &amp; Export on buyerseller.asia"/>
      <!-- // -->
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://skywalkapps.github.io/bootstrap-notifications/stylesheets/bootstrap-notifications.css">
      <!-- // -->
      <link href="{!! asset('assets/fontend/bootstrap.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="{!! asset('assets/fontend/bootstrap-theme.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
      <!-- ANIMATE CSS -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fontend/css/animate.css') }}" media="screen" data-name="skins">
      <!-- HOVER CSS -->
      <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/fontend/css/hover-min.css') }}" media="screen" data-name="skins">
      <!--SWEET ALERT -->
      <link rel="stylesheet" href="{{ URL::asset('assets/fontend/css/sweetalert.css') }}" type='text/css'/>
      <link href="{!! asset('assets/fontend/topbar/css/bootstrap-dropdownhover.min.css') !!}" media="all" rel="stylesheet" type="text/css" />
      <!--TEXT EDITOR CSS -->
      <link rel="stylesheet" href="{{ URL::asset('assets/fontend/css/jquery-te-1.4.0.css') }}" type='text/css'/>
      <!--SLICK CSS -->
      <link href="{!! asset('assets/fontend/css/slick.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/fontend/css/slick-theme.css') !!}" rel="stylesheet">
      <!---CUSTOM STYLE FOR THIS SITE;-->
      <link href="{!! asset('assets/fontend/css/custom_template_style.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/dashboard/css/main.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/fontend/bdtdccss/company-template-design.css') !!}" rel="stylesheet">
      <link href="{!! asset('assets/fontend/bdtdccss/trade-template.css') !!}" rel="stylesheet">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
      @yield('own_styles')
   </head>
   <body style="background-color: #fff !important">
      <!---HEADER SECTION -->
      <div class="container">
         <input type="hidden" name="profile_id" value="{{ Route::current()->parameters()['profile_id'] }}" />
         <div class="row" style="background-color: #fff;padding-bottom: 1%">
            <div class="col-md-12 padding_0">
               <div class="bdtdc-logo col-sm-2" itemscope itemtype="http://schema.org/Organization" style="margin-top: 5px;  float: left;">
                  <a style="margin-left: 0; background-image: none; height: auto; display: block;width: 100%; " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
                  <img alt="logo" style=" width: 100%; height: auto;margin-top: 32px;" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
                  </a>
               </div>
               <div class="col-md-7 m-nvr">
                  <div class="col-sm-12" style="padding: 0">
                     <div class="navbar-header">
                        <button type="button" class="navbar-toggle" style="margin-right: 5%;" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                     </div>
                     <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse pull-right m-nvr-inn" itemscope itemtype="http://schema.org/SiteNavigationElement">
                           <li><a style="padding-left: 0px;" itemprop="url" href="{{ URL::to('online-marketplace',null)}}">Shop by Category</a></li>
                           <li class="dropdown" style="z-index: 999 !important;">
                              <a href="#">For Buyers<i class="fa fa-angle-down"></i></a>
                              <ul style="float: left" role="menu" class="sub-menu">
                                 <li class="sub-split" style=" background-color: #fff;   border-top: 1px solid #ddd;
                                    list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;">
                                    Sourcing
                                 </li>
                                 @foreach($pages as $page) 
                                 @if($page->prefix == 'BuyerChannel' )
                                 <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
                                 @endif 
                                 @endforeach
                              </ul>
                           </li>
                           <li class="dropdown" style="z-index: 999 !important;">
                              <a href="#">For Suppliers<i class="fa fa-angle-down"></i></a>
                              <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                 @foreach($pages as $page) 
                                 @if($page->prefix == 'SupplierChannel' )
                                 <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
                                 @endif 
                                 @endforeach
                              </ul>
                           </li>
                           <li class="dropdown" style="z-index: 999 !important;">
                              <a href="#">Customer Service<i class="fa fa-angle-down"></i></a>
                              <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
                                 @foreach($pages as $page)
                                 @if($page->prefix == 'ServiceChannel' )
                                 <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
                                 @endif
                                 @endforeach
                              </ul>
                           </li>
                           <li><a style="margin-right:-1%" target="_blank" class="pull-right" href="{{ URL::to('about-us',null)}}">About BuyerSeller</a></li>
                        </ul>
                     </div>
                  </div>
                  @if (Sentinel::check())
                  <div class="col-xs-12 col-sm-12 padding_0">
                     <div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" style="" class="col-xs-12 padding_0">
                        <div class="col-xs-12" style="padding-right:0px;padding-left: 0px; padding-bottom:10px;">
                           <div class="col-lg-12" style="padding:0px">
                              <form class="form" method="post" action="{!!URL::to('search-product',null)!!}">
                                 {!! csrf_field() !!}
                                 <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <div class="input-group input-group-lg" style="border: 1px solid #255E98;border-radius: 0px !important;">
                                    <span class="input-group-btn hide_dropdown" style="    width: 130px;
                                       border: 0;
                                       border: 1px solid #255E98;
                                       border-right: 0;">
                                       <select class="form-control" id="search_about" name="search" style="width: 100%;padding:9%;height: auto;margin-top:0">
                                          <option value="1">This Company</option>
                                          <option value="products">On BuyerSeller</option>
                                       </select>
                                    </span>
                                    <input   name="key" class="form-control search_key inp-value" type="text" placeholder="What are you looking for..." required="required" />
                                    <span class="input-group-btn search_from_template" style="/*width:13%;*/">
                                    <input  type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 100%; font-size: 14px; width: 100px;" class="btn btn-primary btn-lg pull-left all_search " value="Search" />
                                    </span>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @else
                  <div class="col-xs-12 col-sm-12 padding_0">
                     <div  itemscope itemtype="http://schema.org/SearchAction" style="" class="col-xs-12 padding_0">
                        <div class="col-xs-12" style="padding-right:0px;padding-left: 0px; padding-bottom:10px;">
                           <div class="col-lg-12" style="padding:0px">
                              <form class="form" method="post" action="{!!URL::to('search-product',null)!!}">
                                 {!! csrf_field() !!}
                                 <input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
                                 <div class="input-group input-group-lg" style="border: 1px solid #255E98;border-radius: 0px !important;">
                                    <span class="input-group-btn hide_dropdown" style="    width: 130px;
                                       border: 0;
                                       border: 1px solid #255E98;
                                       border-right: 0;">
                                       <select class="form-control" id="search_about" name="search" style="width: 100%;padding:9%;height: auto;margin-top:0">
                                          <option value="products">On BuyerSeller</option>
                                          <option value="1">This Company</option>
                                       </select>
                                    </span>
                                    <input   name="key" class="form-control search_key inp-value" type="text" placeholder="What are you looking for..." required="required" />
                                    <span class="input-group-btn search_from_template" >
                                    <input  type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 100%; font-size: 14px; width: 100px;" class="btn btn-primary btn-lg pull-left all_search" value="Search" />
                                    </span>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               </div>
               <div class="col-md-3 col-sm-3 col-xs-3 padding_0" style="float: right;">
                  <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-right padding_0">
                     <ul style="float: right; text-align:right;margin: 0px" class="nav navbar-nav collapse navbar-collapse padding_0" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <li class="dropdown" style="z-index: 999 !important;">
                           <a href="#">Help Center<i class="fa fa-angle-down"></i></a>
                           <ul role="menu" class="sub-menu submenu2" itemscope itemtype="http://schema.org/SiteNavigationElement">
                              @foreach($pages as $page)
                              @if($page->prefix == 'ServiceChannel' )
                              <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
                              @endif
                              @endforeach
                              <li ><a class="btn" href="{{ URL::to("help-center")}}"> Contact for any query </a> </li>
                           </ul>
                        </li>
                        <li class="dropdown" style="z-index: 999 !important;    padding-right: 0px;"><a target="_blank" href="tel:+8801708884440"> <i class="fa fa-phone" aria-hidden="true"></i> +880 17088 84440</a></li>
                        @if (Sentinel::check())
                        @php
                           $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
                           $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
                        @endphp
                        @endif
                     </ul>
                     <ul style="float: right; text-align:right;margin: 0px" class="nav navbar-nav collapse navbar-collapse padding_0" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        @if (Sentinel::check())
                        @php
                           $notifications = getNotification();
                           $all_notifications = $notifications['all_notifications'];
                           $inquiry_notifications = $notifications['inquiry_notifications'];
                           $quote_notifications = $notifications['quote_notifications'];
                           $order_notifications = $notifications['order_notifications'];
                        @endphp
                        <li class="dropdown" style="z-index: 999 !important;">
                           <a style="text-align: right;padding-right: 16px" itemprop="url" href="#">Welcome back<br><span id="total_notification" title=""></span> {{ Sentinel::getUser()->first_name }} <span id="all_notification" style="margin-left: 5px;"><i data-count="{{$all_notifications}}" class="glyphicon notification-icon"></i></span>
                           <i style=" padding: 0px;margin-right: -5px;" class="fa fa-angle-down"></i></a> 
                           <ul role="menu" class="sub-menu submenu2" style="background-color: #fff;top: 100%" itemscope itemtype="http://schema.org/SiteNavigationElement">
                              @if (Sentinel::check())
                              <li><a itemprop="url" href="{{ URL::to($dashboard_route,null)}}">Dashboard</a></li>
                              @endif
                              <li title="" class="pusher_notification_1"><a itemprop="url" href="{{ URL::to('default','message') }}">New Inquiry <span style="margin-left: 5px;"><i data-count="{{$inquiry_notifications}}" class="glyphicon notification-icon"></i></span>
                                 @if (Sentinel::check())
                                 <span title="" id="total_new_inquiry"></span>
                                 @endif
                                 </a>
                              </li>
                              <li title="" class="pusher_notification_2"><a itemprop="url" href="{{ URL::to('Mybuying-Request') }}">New Quote <span style="margin-left: 5px;"><i data-count="{{$quote_notifications}}" class="glyphicon notification-icon"></i></span>
                                 @if (Sentinel::check())
                                 @endif
                                 </a>
                              </li>
                              <li style=" margin-left: 0%;" class="pusher_notification_3"><a itemprop="url" href="{{ URL::to('order-list',null) }}" class="join_btn"><i class="fa fa-users" aria-hidden="true"></i> Order <span style="margin-left: 5px;"><i data-count="{{$order_notifications}}" class="glyphicon notification-icon"></i></span>
                                 <span class="total_new_order" title=""></span></a>
                              </li>
                              <li class="sub-split" style=" background-color: #fff;   border-top: 1px solid #ddd;
                                 list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">
                                 For Buyer
                              </li>
                              <li><a itemprop="url" href="{{ URL::to('get-quotations',null)}}" target="_blank" class="" style="">Get Quotations Now</a>
                              </li>
                              <li class="navigation-menu-list-li"><a itemprop="url" href="{{ URL::to('Mybuying-Request',null) }}" class="navigation-menu-list-li-a">Manage Buying Requests</a></li>
                              <li style="margin-bottom: 10px" class="navigation-menu-list-li"><a itemprop="url" href="{{ URL::to('list/view/requested/sample') }}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li>
                              <li class="sub-split" style="background-color: #fff;   border-top: 1px solid #ddd;
                                 list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">For Supplier</li>
                              <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Display New Products</a></li>
                              <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a></li>
                              <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('quotation/management',null) }}" class="navigation-menu-list-li-a">Quotes Management</a></li>
                              @if (Sentinel::check())
                              <li style="margin-left: 0%;padding: 0px;border-left: 1px solid #cecece;height: 12px;top: 8px;"></li>
                              <li style="background-color: #fff;   border-top: 1px solid #ddd;
                                 list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none" ><a style="background-color: #fff; 
                                 list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none" class="btn" href="{{ URL::to('logout',null) }}"> Logout </a> </li>
                              @endif
                              @else
                              <li style=""><a itemprop="url" href="{{ URL::to('login',null) }}" class="" data-toggle="">Sign In</a></li>
                              <li style="margin-left: 0%;padding: 0px;border-left: 1px solid #cecece;height: 12px;top: 8px;"></li>
                              <li style=" margin-left: 0%;"><a itemprop="url" href="{{ URL::to('join',null) }}" class="join_btn">Join Free</a></li>
                              @endif
                           </ul>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-sm-3" style="float:left;padding-left:0">
               @include('fontend.layouts.all-category-list')
            </div>
         </div>
      </div>
      </div>
      @include('fontend.template.header_information')
      @yield('content')
      <br><br>
      <!--FOOTER SECTION-->
      </div>
      <div class="container-fluid" style="background-color: #f5f5f5">
         <div class="container">
            <div class="row" style="padding-top: 2%;margin-top: 1.0%">
               <div class="col-md-1"></div>
               <div class="col-md-10" style="padding: 0px;border-top: 1px solid rgba(0,0,0,0.1);">
                  <div class="col-md-12" style="padding: 0px">
                     <div class="col-sm-5" style="margin-top: 3px;padding: 0">Free App
                        <img style="width:93px;height:30px;opacity:1; margin-left: 10px;" src="{!! asset('assets/helpcenter/android-app2.png') !!}" alt="android-app2" />
                        <img style="width:103px;height:30px;opacity:1" src="{!! asset('assets/helpcenter/apple-app.png') !!}" alt="apple-app" />
                     </div>
                     <div class="col-sm-4" style="padding-left:0px;">
                        <span style="display: inline-block; position: relative; bottom: 5px;">Follow Us on</span>
                        <a style="line-height: 3;" href="https://www.facebook.com/bdtdc/" target="_blank"> <i style="font-size: 32px;" class="fa fa-facebook-square"></i></a>
                        <a style="line-height: 3;" href="https://twitter.com/bdtdc" target="_blank"><i style="font-size: 32px;" class="fa fa-twitter-square"></i></a>
                        <a style="line-height: 3;" href="https://www.youtube.com/bdtdc" target="_blank"><i style="font-size: 32px;" class="fa fa-youtube-square"></i></a>
                     </div>
                     <div class="col-md-3" style="padding: 0;">
                        <form action="{!!URL::to('subscript/change-email')!!}">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="input-group subsc" style="margin-top: 3px;">
                              <input name="prev_email"  type="email" class="form-control" placeholder="Give your E-mail" aria-describedby="basic-addon2" required>
                              <span class="input-group-addon" id="basic-addon2" style="padding:0px"><button style="border:0 none; background:#255E98; height: 32px; color: #fff;">Subscribe</button> </span> 
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <ul style="padding-bottom: 2%;">
                        <li  style="float:left;padding: 1%;">
                           <a target="_blank" style="color:#000" href="{{URL::to('Popular-product-trends',null)}}">BdSource</a>
                        </li>
                        <li style="float:left;padding: 1%;">
                           <a target="_blank" style="color:#000"  href="{{ URL::to('wholesale',null)}}">Wholesaler</a>
                        </li>
                        <li style="float:left;padding: 1%;">
                           <a target="_blank" style="color:#000" href="{{URL::to('bangladesh-garments',null)}}">Bangladesh Garments</a>
                        </li>
                        <li style="float:left;padding: 1%;">
                           <a target="_blank" style="color:#000" href="{{URL::to('bangladesh-suppliers',null)}}">Bangladesh Suppliers</a>
                        </li>
                        <li style="float:left;padding: 1%;">
                           <a target="_blank" style="color:#000" href="{{URL::to('online-marketplace',null)}}">Shop by Category</a>
                        </li>
                     </ul>
                  </div>
                  <br><br>
                  <div style="padding-bottom:8%;color: #696763;" class="row">
                     <div style="text-align:center;margin-left:auto; margin-right:auto;"> 
                        <a style="color:#696763" href="{{URL::to('contact')}}"> Contact Us </a>
                        <a target="_blank" style="color:#696763" href="{{URL::to('product_listing_policy',null)}}">Product Listing Policy</a> 
                        <a target="_blank" style="color:#696763" href="{{URL::to('Intellectual',null)}}"> Intellectual Property Policy and Infringement Claims</a>
                        <a target="_blank" style="color:#696763" href="{{URL::to('Policies_Rules',null)}}">Privacy Policy</a> 
                        <a target="_blank" style="color:#696763" href="{{URL::to('terms_use',null)}}">Terms of Use</a>
                     </div>
                     <div style="text-align:center;margin-left:auto; margin-right:auto;">Copyright© 2015-<?php echo date("Y"); ?>, BuyerSeller. All Rights Reserved.
                     </div>
                  </div>
               </div>
               <div class="col-md-1"></div>
               @if(Sentinel::check())
               <input type="hidden" id="user_id" value="{{Sentinel::getUser()->id}}">
               @endif
            </div>
         </div>
      </div>
  
      <script type="text/javascript" src="{!! asset('assets/fontend/js/bd.jquery.min.js') !!}"></script>
      <script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.cycle.all.js') !!}"></script>
      <script type="text/javascript" src="{!! asset('assets/fontend/bootstrap.min.js') !!}"></script>
      <!--ANIMATED POP UP SCRIPT-->
      <script src="{{URL::asset('assets/fontend/js/animatedModal.min.js')}}"></script>
      <!--SWEET ALERT POP-UP SCRIPT-->
      <script src="{{ URL::asset('assets/fontend/js/sweetalert.min.js') }}"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script src="{{ URL::asset('assets/fontend/js/jquery-te-1.4.0.min.js') }}" charset="utf-8"></script>
      <script type="text/javascript" src="{!! asset('assets/fontend/js/slick.min.js') !!}"></script>
      <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.min.js') !!}"></script>
      <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.jquery.min.js') !!}"></script>
      <!--CUSTOM JS FOR THIS TEMPLATE-->
      <script type="text/javascript" src="{!! asset('assets/fontend/js/template_custom.js') !!}"></script>
      @include('fontend.layouts.scripts-notification')
      @include('fontend.layouts.script-dynamic')
      <script type="text/javascript">       
         (function(){
            var route_arr,company_id,url;
            route_arr = window.location.href.split('/');
            company_id = $('[name="profile_id"]').val();
            url = window.location.origin + "/template/get_header_info/"+company_id;
            $.get(url, function(r) {
               var img_name = (r.company_header_info == null || r.company_header_info.company_logo == null || r.company_header_info.company_logo == "") ? "no_image.jpg" : r.company_header_info.company_logo;
               $('.header_user_name').html(r.company_header_info.user_name+' '+r.company_header_info.last_name);
               $('.header_company_name').html(r.company_header_info.company_name);
               $('.header_logo_img').attr('src', window.location.origin + '/uploads/' + img_name);
               $('[data-supplier_id]').attr('data-supplier_id',r.company_header_info.user_id);
               $('[data-target-id]').attr('data-target-id',r.company_header_info.user_id+'548569572');
               $('.header_first_name').html(r.company_header_info.user_name);
               $('.header_last_name').html(r.company_header_info.last_name);
            })
         })()

         $(document).ready(function(){
            var nav_color = $('.color_changer').attr('data-color_changer');
                  
            <?php $product_groups_json = json_encode($product_groups); ?>

            $(document).on({
               click: function(e) {
                  e.preventDefault();
                  var url,base_url,supplier_id,product_id;
                  $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
                  base_url = window.location.origin;
                  supplier_id = $(this).data('supplier_id');
                  product_id = $(this).data('product_id');
                  url = (product_id =="#") ? base_url+"/contact_supplier/"+supplier_id : base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
                     window.location.href = url;
               }
            }, '.contact_supplier');
         });
         $(function() {
            $('#categoryBanner').cycle({
               fx:     'fade',
               speed:  'slow',
               timeout: 5000,
               pager:  '#bannerPagination',
               pagerAnchorBuilder: function(idx, slide) {
                  // return sel string for existing anchor
                  return '#bannerPagination li:eq(' + (idx) + ') a';
               }
            });
         });
      </script>
      @yield('scripts')
   </body>
</html>