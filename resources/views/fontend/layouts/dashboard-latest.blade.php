<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="language" content="english"> 
     <meta charset="utf-8">
    <meta name="googlebot" content="index, follow">
    <meta name="robots" content="index, follow" />
    <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">         
          <link rel="icon" type="image/png" href="{!! asset('favicon-32x32.png') !!}" sizes="32x32" />
          <link rel="icon" type="image/png" href="{!! asset('favicon-16x16.png') !!}" sizes="16x16" />
          <link rel="icon" type="image/png" href="{!! asset('favicon-8x8.png') !!}" sizes="16x16" />
          <?php
            $canonical_dynamic = 'http'.(isset($_SERVER['HTTPS']) ? 's' : '').'://'."{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
          ?>
          <link rel="canonical" href="{{ $canonical_dynamic ?? ''}}"/>
          <link rel="alternate" href="http://buyerseller.asia" hreflang="en-us">
          <title>@if(isset($title))
          {{ ucwords($title) }}
                  @else
                  Buyer Seller | Buyerseller.asia
                  @endif</title>
@if(isset($title))
<meta name="title" content="{{ ucwords($title)}}" />
@else
<meta name="title" content="" />
@endif
<meta name="keywords" content="{{ $keyword ?? 'Bangladesh B2B Marketplace,Bangladesh B2B online marketplace, B2B online marketplace in Bangladesh, B2B platform in Bangladesh, Bangladesh B2B online platform, B2B Suppliers in Bangladesh, Global b2b marketplace, B2B online marketplace, B2B online platform, b2b ecommerce platform'}}" />

<meta name="description" content="{{ $description ?? 'Find out the best Manufacturers, Suppliers, Exporters, Wholesalers & Products on BuyerSeller, the largest b2b marketplace in South Asia'}}"/>

<meta property="og:title" content="{{ $title ?? 'Bangladesh B2B marketplace for Suppliers, Manufacturers & Exporters'}}"/>
<meta name="Subject" content="{{ $keyword ?? 'b2b marketplace, B2B portal, Online marketplace, b2b online marketplace, Bangladesh B2B marketplace, B2B online Marketplace in Bangladesh'}}" />
<meta name="page-topic" content="{{ $description ?? 'Find out the best Manufacturers, Suppliers, Exporters, Wholesalers Products on BuyerSeller, the largest b2b marketplace in South Asia.'}}" />
<meta name="copyright" content="Copyright © Bangladesh Trade Development Council" />
<meta name="owner" content="Bangladesh Trade Development Council. (BuyerSeller)" />
<meta name="author" content="Name: Kazi Ahmed, Mobile: +8801751681223, Address: Baitush Shafqah, House: 818, Road: 12, Avinue: 06, Mirpur DOHS, Dhaka 1216, Bangladesh, E-mail: info@BuyerSeller.asia, Website: http://www.BuyerSeller.asia" />
<meta content="https://plus.google.com/+Bdtdc" name="author">
          @include('fontend.layouts.stylesheet-home')
          @yield('page_css')
          @yield('own_styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>  
<body itemscope itemtype="http://schema.org/WebPage">
 <meta itemprop="accessibilityControl" content="fullKeyboardControl">
 <meta itemprop="accessibilityControl" content="fullMouseControl">
 <meta itemprop="accessibilityHazard" content="noFlashing">
 <meta itemprop="accessibilityHazard" content="noMotionSimulation">
 <meta itemprop="accessibilityHazard" content="noSound">
 <meta itemprop="accessibilityAPI" content="ARIA">
 <a href="https://plus.google.com/104450985808854201025" rel="publisher"></a>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
@if(isset($homepage))
<div class="container-home">
@else
<div class="container-home">
@endif
@if(Sentinel::check())
<input type="hidden" id="user_id" value="{{Sentinel::getUser()->id}}">
@endif
  @yield('dashboard_content')
  
  @include('fontend.layouts.footer')


</div>
      <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
  @include('fontend.layouts.scripts-home')
  @include('fontend.layouts.scripts-notification')

     <script type="text/javascript">  
         
      $(document).ready(function(){

        $(document).on({click:function(e){    

          e.preventDefault();      
          var url= location.origin;
          var search_options = $('select[name="search"].all_search_options').val();
          var search_key = $('input[name="key"].search_key').val();
          // window.location.href = window.location.origin+'/search-product/search=='+search_options+'+..+key=='+search_key+'+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0';
 
          if(search_key == ''){
            var query_str = '';
            
            alert("You must enter keyword");
            return false;
          }else{
            var query_str = search_key.split(' ').join('-');
            var query_str = query_str.split('/').join('-');
          }
          window.location.href = url+'/'+query_str+'/search?t='+search_options;
        }},'input[value="Search"].all_search');

      });
       function goBack() {
    window.history.back();
      }

    </script>
    </body>
</html>