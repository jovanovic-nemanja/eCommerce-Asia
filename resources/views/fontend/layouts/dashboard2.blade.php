



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
          <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
          <link rel="alternate" href="http://www.buyerseller.asia" hreflang="en-us">
          <title>{{ $title }} </title>
<meta name="title" content="BuyerSeller is a leading B2B media company and a primary facilitator of trade within Bangladesh and South Asia" />
<meta name="keywords" content="bangladesh b2b marketplace,bangladesh b2b site,Bangladesh Clothing exporters importers, Garment Industry, Bangladesh Textile, Readymade Garments, Garment Manufacturers, RMC sector in Bangladesh, Readymade shirts, Ready made dress, Garments exporters, Readymade Cloths, RMG industry, Garment production, frozen fish exporters, shrimp export, fruits and vegetables, Jute products rug bags in Bangladesh, Tannery Leather manufacturers, shoes, footwear, Tea garden, Organic teas, China suppliers exporters importers, Chinese products manufacturers, Indian suppliers exporters importers, Indian products manufacturers, Vietnam suppliers exporters importers, Vietnam products manufacturers" />

<meta name="description" content="bangladesh b2b marketplace,bangladesh b2b site,Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh and South Asia International Trade Site. Import &amp; Export on BuyerSeller"/>

<meta property="og:title" content="bangladesh b2b marketplace,bangladesh b2b site,Find quality Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh and South Asia International Trade Site. Import &amp; Export on BuyerSeller"/>
   
<script type="text/javascript">
var elastislide_defaults = {
  imageW: "100%",
  border    : 0,
  margin      : 0,
  preventDefaultEvents: false,
  infinite : true,
  slideshowSpeed : 100
};
</script>

  <script type="text/javascript" src="{!! asset('resources/assets/slider/jquery.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('resources/assets/slider/jquery-migrate.min.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('resources/assets/slider/jquery.themepunch.plugins.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('resources/assets/slider/jquery.themepunch.revolution.min.js') !!}"></script>
          @include('fontend.layouts.stylesheet')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="container">

  @yield('dashboard_content')
  
  @include('fontend.layouts.footer')
    </div>
      <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
  @include('fontend.layouts.scripts')

    </body>
</html>