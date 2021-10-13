<div  class="row item_sha">

	<div class="col-md-3 padding_0">
		<div  class="col-xs-12 col-fixed-m-12 padding_0" style="padding: 5%">
			<div class="m-ws inner-offset-xs-6" data-spm="1998823020">

    <div class="m-ws-header">
        <div class="m-ws-header-top">
          <a itemprop="url"  title="Bdtdc Source:easy sourcing for buyer and suppllier" href="{{ URL::to('buyer/guide-bdsource') }}" target="_self" class="act">
           <img itemprop="image" style="height:32px;width: 32px;margin-bottom: 9px;" src="{{ asset('assets/bdsource/bdsource.png') }}" alt="bdsource"> <span class="title">BdSource</span>
          </a>
        </div>
    </div>

    <div class="m-ws-title" style="padding-top: 2%;padding-left: 2%">
    	<div style="padding-left:12px;padding-top: 8px;padding-bottom: 5%" class="summary">
				Want to save time & cost? 
			<br>Let us help you!
		</div>
      <!-- <a itemprop="url"  style="line-height: 20px;font-size: 17px;" href="{{ URL::to('Bdtdc/source') }}" target="_self" class="act">
        Want to save time & cost? 
		<br>Let us help you!
      </a> -->
    </div>

    <div class="m-ws-industry-list">
        
          
        
           
        
            <div class="m-ws-industry-item" data-color="#F78F25">
                <a itemprop="url"  href="{{ URL::route('sourcing.list')}}" target="_self" class="util-clearfix">
                    <div class="extra-bgforsupplier"></div>
                    <div class="m-ws-industry-item-name">BdSource for supplier</div>
                </a>
            </div>
        
          
        
            <div class="m-ws-industry-item" data-color="#ff6680">
                <a itemprop="url"  href="{{ URL::to('Popular-product-trends') }}" target="_self" class="util-clearfix">
                 <div class="extra-bgforbuyer"></div>
                
                    <div class="m-ws-industry-item-name">BdSource for buyer</div>
                </a>
            </div>
        
    </div>

    <div style="padding-top: 7%;" class="m-ws-action">
        <a itemprop="url"  class="more hidden-xs hidden-s" href="{{ URL::to('Bdtdc/source',null) }}" rel="nofollow">Learn More <span class="action-sign">&nbsp;›</span></a>
    </div>


</div>
		</div>
	</div>


	<div style="border-left:1px solid rgba(0,0,0,.1);padding-top: 0px;" class="col-md-9 padding_0">

		<!--recommended_items-->
	 <div class="col-sm-12 padding_0" style="padding-top:-10px">
	 <div id="jssor_3" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 809px; height: 340px; overflow: hidden; visibility: hidden;">
		        <!-- Loading Screen -->
		        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
		            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
		            <div style="position:absolute;display:block;background:url('assets/slider/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
		        </div>
		        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 809px; height: 340px; overflow: hidden;">

		        @foreach($source as $s)
		        <div style="display: none;">
		<div  class="" style="text-align:center;margin-left:auto; margin-right:auto">
						<a target="_blank" href="{{ URL::to('product-sourcing/view',$s->id )}}">
							
						
								
						<div class="product-image-wrapper" style="height:320px;">
							<div class="single-products">
								
								<div class="productinfo text-center"  itemscope itemtype="http://schema.org/Product">
							<?php $p_name = "Product Name Not Available"; ?>
							@if($s->bdtdc_product)
								@if($s->bdtdc_product->product_name)
								<?php $p_name = $s->bdtdc_product->product_name->name; ?>
								@endif
							@elseif(trim($s->inquery_title) != '')
								<?php $p_name = $s->inquery_title; ?>
							@endif
						@if($s->inq_products_images)
							@if($s->inq_products_category)
							<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:190px;border: none;box-shadow:none" class="img-thumbnail " src="{{ ImageManager::getImagePath('bdtdc-product-image/'.trim($s->inq_products_category->pro_parent_cat->name).'/'.trim($s->inq_products_category->bdtdcCategory->name).'/'.$s->inq_products_images->image, 190, 190, 'crop') }}" alt="{{ $p_name }}">

							
							@else
							<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:190px;border: none;box-shadow:none" alt="{{ $p_name }}" class="img-thumbnail " src="{{ URL::to('uploads/no_image.jpg') }}">
							@endif


						
						@elseif($s->inq_products_image)
							<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:190px;border: none;box-shadow:none" alt="{{ $p_name }}" class="img-thumbnail " src="{{ ImageManager::getImagePath('uploads/'.$s->inq_products_image->image, 190, 190, 'crop') }}">
							
						
						@elseif($s->inq_docs_one)
									
							<img itemprop="image" title="{{ $p_name }}" style="width:100%;height:190px;border: none;box-shadow:none" alt="{{ $p_name }}" class="img-thumbnail " src="{{ ImageManager::getImagePath('buying-request-docs/'.$s->inq_docs_one->docs, 190, 190, 'crop') }}">
								
						@else
							<img itemprop="image"  title="{{ $p_name }}" style="width:100%;height:190px;border: none;box-shadow:none" alt="{{ $p_name }}" class="img-thumbnail " src="{{ URL::to('uploads/no_image.jpg') }}">
						@endif	
							

									
						<p>
							<span itemprop="name" >{{substr($p_name,0,60)}}</span>
						</p>

						
							<div class="col-sm-2" style="margin-left:2%;">
							@if($s->sender_company)
								@if($s->sender_company->country)
									<img itemprop="image" style="height:18px;width:25px;" src="{{ asset('assets/global/img/flags/'.strtolower($s->sender_company->country->iso_code_2).'.png') }}" alt="$s->sender_company->country->name">
								@else
								<img itemprop="image" style="height:18px;width:25px;" src="{{ asset('uploads/no-image.jpg','') }}" alt="image">
								@endif
							@else
							<img itemprop="image" style="height:18px;width:25px;" src="{{ asset('uploads/no-image.jpg','') }}" alt="image">
							@endif
							</div>
							<div class="col-sm-1" style="margin-left: 3%;">
								<p style="color: #999;font-size:12px;">Requesting</p>
							</div>
							<div class="col-sm-9 padding_0">
								<p>
									<span style="padding-left: 24px;color: #1DC11D;font-weight: 700;font-size: 14px;">
										{{$s->quantity}}
									</span>
									<span style="color: #333;font-size: 15px;">
									@if($s->inq_unit_id)
										{{$s->inq_unit_id->name}}
									@else
										pieces
									@endif
									</span>
								</p>
							</div>
					
								</div>
							</div>
				</div>
				</a>
			</div>
			</div>
			@endforeach
		        
		        </div>
		        <!-- Bullet Navigator -->
		       
		        <!-- Arrow Navigator -->
		        <span data-u="arrowleft" class="recommended-item-control" style="top:50px;left:8px;width:35px;height:55px;cursor:pointer;" data-autocenter="4"><i class="fa fa-angle-left"></i></span>
		        <span data-u="arrowright" class="recommended-item-control" style="top:50px;right:8px;width:35px;height:55px;cursor:pointer;" data-autocenter="4"><i class="fa fa-angle-right"></i></span>
		        <!-- <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
		        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span> -->
		    </div>
	 

            </div>
		
	</div>
	<!--/recommended_items-->
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