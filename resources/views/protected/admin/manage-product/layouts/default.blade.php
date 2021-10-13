<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
   <head>
      <meta charset="utf-8"/>
      <title>BuyerSeller | Admin Dashboard</title>
      <meta name="_token" content="{!! csrf_token() !!}"/>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1" name="viewport"/>
      <meta content="" name="description"/>
      <meta content="" name="author"/>
      <!-- BEGIN GLOBAL MANDATORY STYLES -->
      <link rel="icon" type="image/png" href="{!! asset('favicon-32x32.png') !!}" sizes="32x32" />
      <link rel="icon" type="image/png" href="{!! asset('favicon-16x16.png') !!}" sizes="16x16" />
      <link rel="icon" type="image/png" href="{!! asset('favicon-8x8.png') !!}" sizes="16x16" />
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      @yield('page_css')
      @include('protected.admin.layouts.stylesheet')
   </head>
   <!-- END HEAD -->
   <!-- BEGIN BODY -->
   <!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
   <!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
   <!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
   <!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
   <!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
   <!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
   <!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
   <!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
   <!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
   <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo sidebar-icon-only">

      @yield('maincontent')
      @yield('page_js')
      @include('protected.admin.layouts.scripts')
      
      <!--[if lt IE 9]>
      <script src="../../assets/global/plugins/respond.min.js"></script>
      <script src="../../assets/global/plugins/excanvas.min.js"></script> 
      <![endif]-->
   <script>
      $(document).ready(function(){
      $(".menu-toggler").click(function(){
         $("body").toggleClass("sidebar-icon-only");
      });
      });
   </script>
   </body>
</html>
