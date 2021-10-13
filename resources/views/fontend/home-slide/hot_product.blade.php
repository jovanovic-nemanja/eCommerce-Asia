<div  class="row item_sha" style="padding-bottom: 1%">
	<div class="col-sm-12">
		<h2 style="float: left;font-size: 21px" class="title text-left padding_0"  itemprop="name"><a style="color: #000" href="{{ URL::to('selected/supplier-products') }}"> Hot Products</a></h2>

		<p style="float:right; ">
			<a itemprop="url" href="{{ URL::to('selected/supplier-products') }}">View more
		</a></p>
	</div>


  



  <div style="border-left:1px solid rgba(0,0,0,.1);padding-top: 30px;" class="recommended_items product_slide_area">
		<!--recommended_items-->
	
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<?php $wp_count = 0; $breaker_count = 1;$wp_counter = 0;
				foreach ($product_homes as $wp_products) {
					if ($wp_products->bdtdcProduct) {
						$wp_counter++;
					}
				}
			?>
			@if($product_homes)
				@foreach($product_homes as $wp_products)
					@if($wp_products->bdtdcProduct)
						<?php if(($wp_count % 4) == 0){echo '<div class="item">';$breaker_count = 2;}else{} ?>

					<div class="col-sm-3">
						<div class="product-image-wrapper"  itemscope itemtype="http://schema.org/Product">
						<?php $p_name = "Product Name Not Available"; ?>
						@if($wp_products->bdtdcProduct)
							@if($wp_products->bdtdcProduct->product_name)
							<?php $p_name = $wp_products->bdtdcProduct->product_name->name; ?>
							@endif
						@endif
							<div class="single-products">
								
								<a target="_blank" style="text-align:justify" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$p_name).'='.mt_rand(100000000, 999999999).$wp_products->product_id) }}">
								
									<div class="productinfo text-center">
									@if($wp_products->bdtdcProduct->product_image_new)
										@if($wp_products->bdtdcProduct->bdtdcProductToCategory)
										<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ ImageManager::getImagePath('bdtdc-product-image/'.trim($wp_products->bdtdcProduct->bdtdcProductToCategory->pro_parent_cat->name).'/'.trim($wp_products->bdtdcProduct->bdtdcProductToCategory->bdtdcCategory->name).'/'.$wp_products->bdtdcProduct->product_image_new->image, 170, 170, 'crop') }}" alt="{{ substr($p_name, 0, 50) }}" class="img-thumbnail">
										
										@else
										<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ URL::to('uploads/no-image.jpg') }}" alt="{{ substr($p_name, 0, 50) }}" class="img-thumbnail ">
										@endif
									
									@elseif($wp_products->bdtdcProduct->product_image)
										<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ ImageManager::getImagePath('uploads/'.$wp_products->bdtdcProduct->product_image->image, 170, 170, 'crop') }}" class="img-thumbnail ">
									@else
										<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ URL::to('uploads/no-image.jpg') }}" alt="{{ substr($p_name, 0, 50) }}" class="img-thumbnail ">
									@endif
									
									<span class="pro_name" style="text-align: center;" itemprop="name">
										{{ substr($p_name, 0, 50) }}..</span>
									

									@if($wp_products->bdtdcProduct)
									@if($wp_products->bdtdcProduct->product_prices)
									@if(trim($wp_products->bdtdcProduct->product_prices->product_FOB) != '' && trim($wp_products->bdtdcProduct->product_prices->product_FOB) != '0' && $wp_products->bdtdcProduct->product_prices->product_FOB != null)
										<p style="font-size:13px;color:#2192D9"><?php if($wp_products->bdtdcProduct->product_prices){
											if(trim($wp_products->bdtdcProduct->product_prices->currency) != ''){echo $wp_products->bdtdcProduct->product_prices->currency;}else{
												echo 'US';}
												}else{echo 'US';} ?> $ <?php if($wp_products->bdtdcProduct->product_prices){echo $wp_products->bdtdcProduct->product_prices->product_FOB;}else{echo "Price Not Available";} ?> / <?php if($wp_products->bdtdcProduct->ProductUnit){echo $wp_products->bdtdcProduct->ProductUnit->name;}else{echo "pieces";} ?></p>
									@endif
									@endif
									@endif
									</div>
								</a>
							</div>
						</div>
					</div>

						<?php if(($wp_count % 4) == 3){echo '</div>'; $breaker_count = 1;} ?>
						<?php if(($wp_count == $wp_counter-1) && $breaker_count == 2){echo '</div>';} ?>
						<?php $wp_count++; ?>
					@endif
				@endforeach
			@endif


			</div>
			<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	</div>
	</div>
	<script type="text/javascript">
		/*var clock;
		
		$(document).ready(function() {
			var clock;

			clock = $('.clock').FlipClock({
		        clockFace: 'DailyCounter',
		        autoStart: false,
		        callbacks: {
		        	stop: function() {
		        		$('.message').html('The clock has stopped!')
		        	}
		        }
		    });
				    
		    clock.setTime(220880);
		    clock.setCountdown(true);
		    clock.start();

		});*/

/*function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

function updateClock() {
var t = getTimeRemaining(endtime);

daysSpan.innerHTML = t.days;
hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

if (t.total <= 0) {
  clearInterval(timeinterval);
}
}

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}


var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
// alert (deadline.getTime());
//alert (deadline);
initializeClock('clockdiv', deadline);*/
</script>

<script type="text/javascript">
	(function() {
		$('.product_slide_area .item:eq(0)').addClass('active');
	    if($('.parent .chield').length>1){
	    	
	    }
	    setInterval(function(){
	    	$(".parent .chield:first").slideUp(200, function () {
	            $(this).appendTo($(".parent")).slideDown();
	        });
	    },2000);
	    
		
	})()
</script>


<script type='text/javascript' src='{!! asset('assets/slider/jquery.flexslider-min.js') !!}'></script>

<script type='text/javascript' src='{!! asset('assets/slider/jquery.elastislide.js') !!}'></script>

<script type='text/javascript' src='{!! asset('assets/slider/vanilla-slider.js') !!}'></script>

<script type='text/javascript' src='{!! asset('assets/slider/jssor.slider.mini.js') !!}'></script>

<script>

	$('.slidervip').bxSlider({
		mode: 'vertical',
		auto:true,
		responsive:true,
		minSlides: 2,
		slideHeight: 100,
		moveSlides: 1,
		controls:false,
		touchEnabled:true,
		oneToOneTouch:true,
		pager:false,
		ticker:false,
		tickerHover:true,
		autoHover:true,
		adaptiveHeight:true,
		slideMargin: 10
	});

    /*var slider = new Slider('.slider1', {
      visibles: 5,
      controlNext: '.nexthot',
      controlPrev: '.prevhot',
	  justify: true,
	  steps: 5,
    });

    var slider2 = new Slider2('.slider2', {
      visibles: 4,
      controlNext: '.next2',
      controlPrev: '.prev2',
	  justify: true,
	  steps: 4,
    });
	
	var slider3 = new Slider3('.slider3', {
      visibles: 4,
      controlNext: '.next3',
      controlPrev: '.prev3',
	  justify: true,
	  steps: 4,
    });*/

	var jssor_1_options = {
      $AutoPlay: false,
      $AutoPlaySteps: 5,
      $SlideDuration: 300,
      $SlideWidth: 192,
      $SlideSpacing: 20,
      $Cols: 5,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$,
        $Steps: 5
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 1,
        $SpacingY: 1
      }
    };

    var jssor_2_options = {
      $AutoPlay: false,
      $AutoPlaySteps: 4,
      $SlideDuration: 160,
      $SlideWidth: 192,
      $SlideSpacing: 12,
      $Cols: 4,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$,
        $Steps: 4
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 1,
        $SpacingY: 1
      }
    };

    var jssor_3_options = {
      $AutoPlay: false,
      $AutoPlaySteps: 4,
      $SlideDuration: 160,
      $SlideWidth: 192,
      $SlideSpacing: 12,
      $Cols: 4,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$,
        $Steps: 4
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 1,
        $SpacingY: 1
      }
    };

    /*var jssor_4_options = {
      $AutoPlay: false,
      $AutoPlaySteps: 4,
      $SlideDuration: 160,
      $SlideWidth: 192,
      $SlideSpacing: 12,
      $Cols: 4,
      $ArrowNavigatorOptions: {
        $Class: $JssorArrowNavigator$,
        $Steps: 4
      },
      $BulletNavigatorOptions: {
        $Class: $JssorBulletNavigator$,
        $SpacingX: 1,
        $SpacingY: 1
      }
    };*/
    
    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
    var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_2_options);
    var jssor_3_slider = new $JssorSlider$("jssor_3", jssor_3_options);
    // var jssor_4_slider = new $JssorSlider$("jssor_4", jssor_4_options);
    
    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizing
    function ScaleSlider1() {
        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 1050);
            jssor_1_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider1, 50);
        }
    }
    ScaleSlider1();
    $(window).bind("load", ScaleSlider1);
    $(window).bind("resize", ScaleSlider1);
    $(window).bind("orientationchange", ScaleSlider1);

    function ScaleSlider2() {
        var refSize = jssor_2_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 809);
            jssor_2_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider2, 50);
        }
    }
    ScaleSlider2();
    $(window).bind("load", ScaleSlider2);
    $(window).bind("resize", ScaleSlider2);
    $(window).bind("orientationchange", ScaleSlider2);

    function ScaleSlider3() {
        var refSize = jssor_3_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 809);
            jssor_3_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider3, 50);
        }
    }
    ScaleSlider3();
    $(window).bind("load", ScaleSlider3);
    $(window).bind("resize", ScaleSlider3);
    $(window).bind("orientationchange", ScaleSlider3);

    /*function ScaleSlider4() {
        var refSize = jssor_4_slider.$Elmt.parentNode.clientWidth;
        if (refSize) {
            refSize = Math.min(refSize, 809);
            jssor_4_slider.$ScaleWidth(refSize);
        }
        else {
            window.setTimeout(ScaleSlider4, 50);
        }
    }
    ScaleSlider4();
    $(window).bind("load", ScaleSlider4);
    $(window).bind("resize", ScaleSlider4);
    $(window).bind("orientationchange", ScaleSlider4);*/
    //responsive code end

    $(document).on({focus:function(){
    	$('.hide_dropdown').hide(500);
    }},'.search_key');

    $(document).on({blur:function(){
    	$('.hide_dropdown').show(500);
    }},'.search_key');

    
  </script>