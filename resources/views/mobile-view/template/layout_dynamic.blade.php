<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
          <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
          <link rel="alternate" href="http://www.bdtdc.com" hreflang="en-us">
          <title>{{ $title ?? 'BDTDC'}}  </title>
<meta name="title" content="{{ $title ?? ''}}" />
<meta name="keywords" content="Find the Latest Reliable Apparel, Textiles &amp; Accessories Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh" />

<meta name="description" content="{{ $description}}"/>

<meta property="og:title" content="bangladesh b2b marketplace,bangladesh b2b site,Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh and South Asia International Trade Site. Import &amp; Export on bdtdc.com"/>
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


</head>
<body style="background-color: #fff !important">
    
    <!---HEADER SECTION -->
    <div class="container">
        <input type="hidden" name="profile_id" value="{{ Route::current()->parameters()['profile_id'] }}" />
        <div class="row" style="background-color: #fff">
            <div class="col-md-1 hidden-sm hidden-xs visible-md visible-lg hidden_collum"></div>
            <div style="margin-top:2%" class="col-md-10 col-sm-12 padding_0">
                <div class="col-sm-6 padding_0" style="margin-left: -8px;padding-top: 1%">
                    
                                              
                            <div class="navbar-header">
                                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                  </button>
                                </div>
                                <div class="mainmenu pull-left" style="width: 100%;">
                                  <ul class="nav navbar-nav collapse navbar-collapse pull-right" style="width: 100%;">
                                    <li style="width:120px;padding:0%;margin-left: 1%"><a href="{{ URL::to('/',null) }}">
                                    <img style="height: 30px;" src="{{ URL::asset('assets/logo.png') }}" class="img-responsive logo_icon"></img> 
                                    </a> 
                                    </li>
                                    @if (Sentinel::check())
                                    <li class="dropdown" style="z-index: 999 !important;"><a href="#">My Bdtdc<i class="fa fa-angle-down"></i></a>
                                      <ul role="menu" class="sub-menu">
                                        <?php
                                          $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
                                          $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
                                        ?>
                                        <li><a href="{{ URL::to($dashboard_route,null)}}">Dash Board</a></li>
                                        
                                        <li><a href="{{ URL::to('dashboard','product') }}">Manage Products</a></li>
                                        <li><a href="{{ URL::to('dashboard','message') }}">Manage Inquery</a></li>
                                        <li><a href="{{ URL::to('dashboard','company_site') }}">Company & Site</a></li>
                                        <li><a href="{{ URL::to('dashboard','account') }}">Account</a></li>
                                      </ul>
                                    </li>
                                    <li><a class="btn" href="{{ URL::to('logout',null) }}"> Logout </a> </li>
                                    @else
                                    <li style="padding-right: 7px;margin-left: 2%"><a href="{{ URL::to('login',null) }}" class="" data-toggle="">Sign In</a></li>
        <li style="margin-left: 0%;padding: 0px;border-left: 2px solid #cecece;height: 12px;margin-top: 4px;"></li>
        <li style=" margin-left: 0%;padding-left: 7px; "><a href="{{ URL::to('join',null) }}" class="active join_btn">Join Free</a></li>
                                    @endif
                                  </ul>
                                </div>
                                 
                  
                </div>
                <div style="margin-top:.5%" class="col-sm-6 form-inline padding_0 text-right">
                    <form class="form" method="post" action="{{ URL::to('search-product',null) }}">
                    {!! csrf_field() !!}
                        <!-- <div class="input-group">
                            <div class="btn-group">
                                <select class="form-control" id="search_about" name="search" style="width: 99%;padding:0%;height: 33px;margin-top:1%">
                                    <option value="products">On Bdtdc</option>
                                    <option value="1">This Company</option>
                                </select>
                            </div>
                        </div> -->
                        
                        <!-- <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search item" name="key">
                            <span class="input-group-btn search_from_template">
                                <button class="btn btn-primary" type="button"><i class="fa fa-search-plus"></i></button>
                            </span>
                        </div> -->
                        
                        <!-- <div class="input-group pull-right">
                            <div style="margin-left:4%" class="btn-group">
                                <a href="{{ URL::to('get-quotations',null) }}" class="btn btn-info btn-sm" style="height: 33px" >Get Quotation</a>
                                <ul class="dropdown-menu">
                                </ul>
                            </div>
                        </div> -->
                    </form>
                    
                </div>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs visible-md visible-lg hidden_collum"></div>
        </div>
        <div class="row">
            <div class="col-md-1 hidden-sm hidden-xs visible-md visible-lg hidden_collum"></div>
            <div class="col-sm-10 padding_0">
                <div class="col-md-8 padding_0">
                    <ul class="list-inline" style="margin-top: 2%;">
                        <li style="padding:1%!important;background:#E4E4E4;border-radius: 5px"><a style="font-size:12px" class="btn padding_0" href=""><span class="header_user_name"></span> | <span class="header_company_name"></span></a> </li>
                    </ul>
                </div>
                <div style="margin-top:.5%" class="col-md-4 form-inline padding_0">
                    <a href="" class="btn btn-link pull-right padding_0"><i class="fa fa-check-square text-success"></i>&nbsp;Onsite-check</a>
                </div>
            </div>
            <div class="col-md-1 hidden_collum"></div>
        </div>

        </div>


    </div>


    @include('fontend.template.header_information')
    
    
    
    @yield('content')
    
    <!--FOOTER SECTION-->
    </div>
  <div class="container-flouid" style="background-color: #f5f5f5">
    <div class="container">
      <div class="row" style="padding-top: 2%;margin-top: 1.0%">
      <div class="col-md-1"></div>
      <div class="col-md-10" style="padding: 0px;border-top: 1px solid rgba(0,0,0,0.1);">
      <div class="col-md-12" style="padding: 0px">
      <div class="col-md-4">Free App
         <img style="width:93px;height:30px;opacity:1;" src="{!! asset('assets/helpcenter/android-app2.png') !!}" />
         <img style="width:103px;height:30px;opacity:1" src="{!! asset('assets/helpcenter/apple-app.png') !!}" />
      </div>
    
      <div class="col-md-5" style="padding-left:0px;">
            <div class="col-md-12">
            <div class="col-sm-4 padding_0" style="padding-top: 8px;">Follow Us on</div>
      <div class="col-sm-7" style="padding-top: 3px;">
         <a style="line-height: 3;" href="https://www.facebook.com/bdtdc/" target="_blank"> <i style="font-size: 32px;" class="fa fa-facebook-square"></i></a>
           <a style="line-height: 3;" href="https://twitter.com/bdtdc_world" target="_blank"><i style="font-size: 32px;" class="fa fa-twitter-square"></i></a>
          <a style="line-height: 3;" href="https://www.youtube.com/watch?v=mtmkHh9Vnlo" target="_blank"><i style="font-size: 32px;" class="fa fa-youtube-square"></i></a>
         
        </div>
        </div>
      </div>
      <div class="col-md-3" style="margin-left: 0px;">
         <div class="input-group">
            <input type="text" class="form-control" placeholder="Input keywords" aria-describedby="basic-addon2">
            <span class="input-group-addon" id="basic-addon2">Subscribe</span>
         </div>
      </div>
     
</div>
    <div class="col-sm-12">
          <ul style="padding-left: 10%;padding-bottom: 2%;">
                <li  style="float:left;padding: 1%;">
                <a target="_blank" style="color:#000" href="{{ URL::to('limited/offers') }}">Limited Offers</a>
                </li>
                <li style="float:left;padding: 1%;">
                <a target="_blank" style="color:#000" style="color:#000" href="{{ URL::to('wholesale',null)}}">Wholesaler</a>
                </li>
                <li style="float:left;padding: 1%;">
                <a target="_blank" style="color:#000" href="{{ URL::to('recommended_suppliers/products',18)}}">Bangladesh Products</a>
                </li>
                <li style="float:left;padding: 1%;">
                <a target="_blank" style="color:#000" href="{{ URL::to('suppliers/find',null)}}">Bangladesh Suppliers</a>
                </li>
              
                <li style="float:left;padding: 1%;">
                <a target="_blank" style="color:#000" href="{{ URL::to('Marketplace',null)}}">Shop by Category</a>
                </li>
            </ul>
      </div>
      <br><br>
    <div style="padding-bottom:50px;color: #000" class="row">
      <center> <a style="color:#000" href="{{ URL::to('FooterPage/pages/Contact_Us',20)}}"> Contact Us </a>
              - <a target="_blank" style="color:#000" href="{{ URL::to('FooterPage/pages/Policies_Rules',22) }}">Product Listing Policy</a> 
              -<a target="_blank" style="color:#000" href="{{ URL::to('FooterPage/pages/Policies_Rules',22) }}"> Intellectual Property Policy and Infringement Claims</a>
               - <a target="_blank" style="color:#000" href="{{ URL::to('FooterPage/pages/Policies_Rules',22) }}">Privacy Policy</a> 
               - <a target="_blank" style="color:#000" href="{{ URL::to('FooterPage/pages/Policies_Rules',22) }}">Terms of Use</a> </center>
      <center>&copy;2018 buyerseller.asia. All rights reserved. </center>
    </div>
    </div>
    <div class="col-md-1"></div>
    
    </div>
   
   <!-- Contact Supplier Modal -->
    <!-- <div id="animatedModal">
        <div class="close-animatedModal text-center">
            <a class="btn btn-primary btn-md close_portfolio_model" href=""><i class="fa fa-times fa-3x"></i></a>
        </div>
        <div class="container">
            <div class="row">
                <div style="padding:2%" class="modal-content col-xs-10 col-xs-offset-1"> -->
                    
                    <!---DATA WILL BE LOADED VIA AJAX
                </div>
            </div>
    
        </div>
    </div> -->
    
    
    
  <!--  <script src="{!! asset('assets/fontend/jquery.min.js') !!}"></script>  -->
   <script type="text/javascript" src="{!! asset('assets/fontend/js/bd.jquery.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.cycle.all.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/bootstrap.min.js') !!}"></script>
    <!--ANIMATED POP UP SCRIPT-->
    <script src="{{URL::asset('assets/fontend/js/animatedModal.min.js')}}"></script>
    <!--SWEET ALERT POP-UP SCRIPT-->
    <script src="{{ URL::asset('assets/fontend/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{!! asset('assets/ga.js') !!}"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script src="{{ URL::asset('assets/fontend/js/jquery-te-1.4.0.min.js') }}" charset="utf-8"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/slick.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/fontend/js/smallworld.jquery.min.js') !!}"></script>
    
    <!--CUSTOM JS FOR THIS TEMPLATE-->
    <script type="text/javascript" src="{!! asset('assets/fontend/js/template_custom.js') !!}"></script>
      
    <script type="text/javascript">
        (function(){
            var route_arr,company_id,url;
            route_arr = window.location.href.split('/');
            company_id = $('[name="profile_id"]').val();
            url = window.location.origin + "/template/get_header_info/"+company_id;
            $.get(url, function(r) {
                var img_name = (r.company_header_info == null || r.company_header_info.company_logo == null || r.company_header_info.company_logo == "") ? "no_image.jpg" : r.company_header_info.company_logo;
                $('.header_user_name').html(r.company_header_info.user_name);
                $('.header_company_name').html(r.company_header_info.company_name);
                $('.header_logo_img').attr('src', window.location.origin + '/uploads/' + img_name);
                $('[data-supplier_id]').attr('data-supplier_id',r.company_header_info.user_id);
                $('[data-target-id]').attr('data-target-id',r.company_header_info.user_id+'548569572');
                $('.header_first_name').html(r.company_header_info.user_name);
                $('.header_last_name').html(r.company_header_info.last_name);
            })
        })()

        $(document).on({click:function(e){
          e.preventDefault();
          var target_id = $(this).attr('data-target-id');
          window.open("{!!URL::to('default/chat/"+target_id+"')!!}", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=450,width=500,height=500");
        }},'.chat_single');

        $(document).ready(function(){
            var nav_color = $('.color_changer').attr('color_changer');
            
            <?php $product_groups_json = json_encode($product_groups); ?>
            var nav_url = window.location.href;
            var nav_url_array = nav_url.split("/");
            if(nav_url_array[3] == 'Home'){
                $('.color_changer>ul li:nth-child(1)').css('background','white');
                $('.color_changer>ul li:nth-child(1) a').css('color','black');
            }
            // alert (nav_url_array[3]);

            //animated modal script
            /*$('.contact_supplier').animatedModal({
                    color: "rgba(102, 102, 100, .9)",
                    animatedIn: "lightSpeedIn",
                });*/

            $(document).on({
                    click: function(e) {
                        e.preventDefault();
                        var url,base_url,supplier_id,product_id;
                        $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
                        base_url = window.location.origin;
                        supplier_id = $(this).data('supplier_id');
                        product_id = $(this).data('product_id');
                        // alert (product_id);
                        // alert (supplier_id);
                        
                        url = (product_id =="#") ? base_url+"/contact_supplier/"+supplier_id : base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
                        // $.get(url, function(r) {
                        //     $('.modal-content').html(r)
                        // })
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
</body>
</html>