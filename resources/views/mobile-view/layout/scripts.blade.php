
  <script type="text/javascript" src="{!! asset('assets/slider/jquery.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('assets/slider/jquery-migrate.min.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('assets/slider/jquery.themepunch.plugins.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('assets/slider/jquery.themepunch.revolution.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/bd.jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.cycle.all.js') !!}"></script>

 <!-- <script src="{!! asset('assets/fontend/jquery.min.js') !!}"></script> -->

<script type="text/javascript" src="{!! asset('assets/fontend/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.sticky.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/fontend/js/bubble-text.js') !!}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/captcha/jquery.plugin.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/captcha/jquery.realperson.js') }}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/main.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/responsiveslides.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/owl.carousel.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/topbar/js/bootstrap-dropdownhover.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/dashboard/js/jquery.scrollUp.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/dashboard/js/price-range.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/dashboard/js/jquery.prettyPhoto.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/dashboard/js/main.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/dashboard/js/front_custom.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('assets/dashboard/js/spectrum.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('assets/dashboard/js/jquery.simplePagination.js') !!}"></script>
 <!-- <script type="text/javascript" src="{!! asset('assets/fontend/js/jquery-ui-timepicker-addon.js') !!}"></script> -->

<script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.bxslider.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.easing.1.3.js') !!}"></script>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="{{URL::asset('assets/fontend/js/animatedModal.min.js')}}"></script>

<script src="{{ URL::asset('assets/fontend/js/sweetalert.min.js') }}"></script>

<script src="{{ URL::asset('assets/fontend/js/jquery-te-1.4.0.min.js') }}" charset="utf-8"></script>

<script type="text/javascript" src="{!! asset('assets/fontend/js/slick.min.js') !!}"></script>


<script type="text/javascript" src="{!! asset('assets/fontend/js/jquery.nicescroll.js') !!}"></script>



<script type="text/javascript" src="{!! asset('assets/custom.js') !!}"></script>

<script type="text/javascript" src="{!! asset('assets/helpcenter/jquery.etalage.min.js') !!}"></script>


<script type="text/javascript" src="{!! asset('assets/helpcenter/flipclock.js') !!}"></script>


  <script>

    // You can also use "$(window).load(function() {"

    $(function () {



      // Slideshow 1

      $(".rslides").responsiveSlides({

        auto: false,

        pager: true,

        nav: true,

        speed: 500,

        maxwidth: 875,

        namespace: "centered-btns"

      });



    });

  </script>

  <!-- Include js plugin -->

  <script type="text/javascript">

    $(document).ready(function() {

       $(".sup").show();

       $(".buy").hide();

       $(".both").hide();



       $("#buyr").click(function() {

       $(".buy").show();

       $(".sup").hide();

       $(".both").hide();

      });

      

       $("#supli").click(function() {

       $(".buy").hide();

       $(".both").hide();

       $(".sup").show();

       });

       

       $("#both").click(function() {

       $(".buy").hide();

       $(".sup").hide();

       $(".both").show();

       });

     });

  </script>

 

    <script type="text/javascript">

    $(document).ready(function() {

     

    $("#owl-demo").owlCarousel({

     

    autoPlay: 3000, //Set AutoPlay to 3 seconds

     

    items : 4,

    itemsDesktop : [1199,3],

    itemsDesktopSmall : [979,3]

     

    });

     

    });

  </script>

     <script>

    // $(window).load(function(){

    //   $(".logo_search_area").sticky({ topSpacing: 0 });

    // });

     </script>



<script type="text/javascript">

    $(".bazar-list li").on("mouseover click",function(t){if(!$(this).hasClass("all")){if($(this).hasClass("current")){$(this).attr("class","");

    var a=$(this).attr("data-id");

    $("#"+a).hide()}

    else{$(this).attr("class","current");

    var a=$(this).attr("data-id");

    $("#"+a).show()}

    }}),$(".bazar-list li").on("mouseout",function(){if(!$(this).hasClass("all")){$(this).attr("class","");var t=$(this).attr("data-id");$("#"+t).hide()}}),$(".cacostos").on("mouseover",function(){var t=$(this).attr("id");$('.bazar-list li[data-id="'+t+'"]').attr("class","current"),$(this).show()}),$(".cacostos").on("mouseout",function(){var t=$(this).attr("id");$('.bazar-list li[data-id="'+t+'"]').attr("class",""),$(this).hide()});

    </script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


    @section('scripts')

    {{--custom js goes here--}}

    @show