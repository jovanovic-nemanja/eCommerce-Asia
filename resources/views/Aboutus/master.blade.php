<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="target-densitydpi=device-dpi, width=1000" />
        <title>About Bditdc</title>
        <link rel='shortcut icon' type='image/x-icon' href="{!!asset('assets/aboutus/favicon.ico')}}" />
        <link rel="stylesheet" type="text/css" href="{!!asset('assets/aboutus/css/jquery.fancybox.css')!!}">
        <link href="{!!asset('assets/aboutus/css/jquery.jscrollpane.css')!!}" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="{!!asset('assets/aboutus/css/owl.carousel.css')!!}">
        <link rel="stylesheet" type="text/css" href="{!!asset('assets/aboutus/css/owl.transitions.css')!!}">
        <link rel="stylesheet" type="text/css" href="{asset('assets/aboutus/css/jquery.powertip.min.css')!!}">
        <link href="{!! asset('assets/aboutus/css/base.css') !!}" rel="stylesheet" type="text/css" media="all" />
        <link href="{!!asset('assets/aboutus/css/content.css')!!}" rel="stylesheet" type="text/css" media="all" />
        <link href="{!!asset('assets/aboutus/css/responsive.css')!!}" rel="stylesheet" type="text/css" media="all" />
        <link href="{!!asset('assets/aboutus/css/style.css')!!}" rel="stylesheet" type="text/css" media="all" />
        
        
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script type="text/javascript" src="{!! asset('assets/aboutus/js/config.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/jquery-1.9.1.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/jquery-ui.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/modernizr.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jquery.transit.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/handlebars-v1.3.0.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/skrollr/src/skrollr.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/fancyBox/jquery.fancybox.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/imagesloaded.pkgd.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/managment.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jquery.jcarousel.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jquery.backgroundpos.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jscrollpane/jquery.mousewheel.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/powerTip/jquery.powertip.min.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/jquery.ba-throttle-debounce.min.js')}}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/vendor/OwlCarousel/owl-carousel/owl.carousel.min.js')!!}"></script>
        
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/gallery.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/tubePlayer.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/putJson.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/bg-video.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/loadMap.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/sections.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/functions.js')!!}"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/base.js')!!}"></script>
        
        
        <script src="{!!asset('assets/aboutus/js/dcs_tag.js')!!}" type="text/javascript"></script>
        <script src="{!!asset('assets/aboutus/js/webtrends_custom_tag.js')!!}" type="text/javascript"></script>
        <script type="text/javascript" src="{!!asset('assets/aboutus/js/webtrends_func.js')!!}"></script>
        
        
        <script type="text/javascript">
        
        //<![CDATA[
        var _tag=new WebTrends();
        _tag.dcsGetId();
        //]]>
        </script>
        <script type="text/javascript">
        		$(document).ready(function(){
        			$(".BLKvideo").css('height','870px');
        		});
    	</script>
    	<script type="text/javascript">
        //<![CDATA[
        _tag.dcsCustom=function(){
        // Add custom parameters here.
        //_tag.DCSext.param_name=param_value;
        
        var _wttag=new WT_QueryParameter();
        _wttag.dcsSetData();
        _tag.DCSext.cg_BDITDC_category=_wttag.category;
        _tag.DCSext.cg_section=_wttag.section;
        _tag.DCSext.cg_subsection=_wttag.subsection;
        _tag.DCSext.cg_language=_wttag.language; 
        _tag.DCSext.ssouid=_wttag.ssouid;
        }
        
        
        
        //_tag.dcsCollect();
        //]]>
        </script>
        
    </body>
</html>