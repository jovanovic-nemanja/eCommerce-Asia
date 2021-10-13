@extends('fontend.master_dynamic')
@section('content')
</div>
<div class="container-fluid" id="india_image">
<div class="container">
<div class="row" style="margin-top:1.5%;margin-bottom:1.5%;">
	<div class="col-sm-12" >
		<div class="col-sm-9" style="background-color:#fff;margin-top: 4%;height: 368px;margin-left: 2%;opacity: 0.8;">
			<p id="flow">Source from Bangladesh</p>
			<p id="flow1">The right place to find verified Bangladeshi garments suppliers</p>
			<div class="col-xs-12 col-sm-11 padding_0" style="margin-left: 4%;">
				<div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" style="margin-left: -3%;" class="col-xs-12 padding_0">
			<div class="col-xs-12" style="padding-right:0px;border-radius:5px!important;">
				  <div class="col-lg-12" style="padding:0px">
					<form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post">
					<input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="input-group input-group-lg" style="border:0px solid #19446F;border-radius: 5px !important;">
			      <span class="input-group-btn hide_dropdown">
				        <select style="height:46px;width:200px;" class="form-control search_options_bangladesh" name="search_bangladesh">

							  <option value="suppliers" style="font-size: 12px;">Garments Suppliers</option>
							  <option value="1" style="font-size: 12px;">Garments Factories</option>
							  <option value="3" style="font-size: 12px;">Garments Traders</option>
							  <option value="products" style="font-size: 12px;">Garments Samples</option>

						</select>
				  </span>
				      <input itemprop="query-input" style="height:46px;border-radius: 0px!important;min-width: 100px;" name="key_bangladesh" class="form-control search_key_bangladesh" type="text" placeholder="What are you looking for from Bangladesh . . ." required="required" />
				      <span class="input-group-btn" style="width:13%;">
				        <input itemprop="query-input" type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 102%;" class="btn btn-primary btn-lg pull-left all_search_bangladesh" value="Search" />
				      </span>
				    </div>

						</div> 
					</form>	
					</div>
				</div>
				</div>


				<div class="col-sm-12 padding_0" style="border-top: 1px dashed #B7B7B7;margin-top:6%;">
				<div class="col-sm-3">
					<p style="margin-top: 10%;font-size: 14px;color: #333;">Popular Category:</p>
					
				</div>
				<div class="col-sm-3" style="margin-top: 2%;">
					<p><a href="{{URL::to('Bangladesh/product/18/25')}}" style="color:#333 !important;">Garments Accessories</a></p>
					<p><a href="{{URL::to('Bangladesh/product/18/254')}}" style="color:#333 !important;">Jeans</a></p>
				</div>
				<div class="col-sm-3" style="margin-top: 2%;">
					<p style="color:#333 !important;"><a href="{{URL::to('Bangladesh/product/18/247')}}" style="color:#333 !important;">Ladies Clothing</a></p>
					<p><a href="{{URL::to('Bangladesh/product/18/246')}}" style="color:#333 !important;">Jackets</a></p>
				</div>
				<div class="col-sm-3" style="margin-top: 2%;">
					<p style="color:#333 !important;"><a href="{{URL::to('Bangladesh/product/18/22')}}" style="color:#333 !important;">Weeding Apparel</a></p>
					<p><a href="{{URL::to('/Bangladesh/product/18/479')}}" style="color:#333 !important;">Sweater</a></p>
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

</div>

<div class="slideover" style="padding-top: 0%;">
	  <div class="count-trad-item" style="position: absolute;left: 47%;bottom: -55px;">
	  </div>
</div>
<div style="min-height: 396px;background-color: #1686cc;display: block;">
            <div class="container">
                    <div class="row padding_0" >
                      <div class="col-sm-12 col-md-12 padding_0">
                              <h2 style="margin-top: 7%;margin-left: 14px;" class="country-trade-title">Effective sourcing from Bangladesh.</h2>
                      </div>
                       <div class="col-sm-12 col-md-12 padding_0">
                      
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div>
                                    <a itemprop="url" href="{{ URL::to('Popular-product-trends') }}">
                              <div class="count-trad-item simple">
                                          <div class="sub-title">
                                            Simple
                                          </div>

                              </div>
                              <div class="trade-description">
                                        Post a Buying Request in just 1 minute
                                    </div>
                            </a>
                            </div>
                           
                          </div>
                          

                          <div class="col-sm-4 col-md-4 col-lg-4">
                              <div>
                                     <a itemprop="url" href="{{ URL::to('Popular-product-trends') }}">
                                  <div class="count-trad-item efficinet">
                                          <div class="sub-title">
                                            Efficient
                                          </div>
                                          
                              </div>
                              <div class="trade-description">
                                       Get multiple quotations within 24 hours

                              </div>
                                    </a>
                              </div>
                          
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                               <div>
                                     <a itemprop="url" href="{{ URL::to('Sourcing/Requests/info') }}">
                                  <div class="count-trad-item allin">
                                          <div class="sub-title">
                                            All-In-One
                                          </div>      
                              </div>
                              <div class="trade-description">
                                        Comparison, samples and deals
                                    </div>
                                    </a>
                               </div>
                          </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 0;padding-left: 39%;padding-top: 3%;">
                        <a itemprop="url" href="{{ URL::to('get-quotations') }}" target="_blank" type="button" class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px; background-color: #FF771C">Get Quotations Now</a>
                    </div>
              
            </div>
        </div>
</div>
</div>
</div>
<div class="container">
	<div class="row padding_0">
	
</div>


<div style="clear:both"></div>

<div class="row item_sha">

	<div class="col-md-3 padding_0">
		<div  class="col-xs-12 col-fixed-m-12 padding_0" style="padding: 5%">
			<div class="m-ws inner-offset-xs-6" data-spm="1998823020">

    <div class="m-ws-header">
        <div class="m-ws-header-top">
          <a itemprop="url"  title="Bdtdc wholesaler:qualified suppliers" href="{{ URL::to('recommended-suppliers/products/bangladesh=75068610318') }}" target="_self" class="act">
           <img itemprop="image" title="Bdtdc wholesaler: qualified suppliers" alt="Bdtdc wholesaler-qualified suppliers" style="height:32px;width: 32px;margin-bottom: 9px;" src="{{ asset('bdtdc-product-image/home-page/wholesale-home.png') }}"> <span class="title" style="font-size: 20px;">Garments Supplier</span>
          </a>
        </div>
    </div>

    <div class="m-ws-title" style="padding-top: 2%;padding-left: 2%">
    	<div style="padding-left:12px;padding-top: 8px;padding-bottom: 5%" class="summary">
				Bangladeshi Selected Garments Supplier
		</div>
    </div>


</div>
		</div>
	</div>
	<div style="overflow:visible;border-left:1px solid rgba(0,0,0,.1);padding-top: 30px;" class="recommended_items product_slide_area col-md-9">
		<!--recommended_items-->
	
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			@php 
			$wp_count = 0;
			 $breaker_count = 1;
			 $wp_counter = 0;
			 $active_counter = 1
			 @endphp
				@foreach ($supplier as $wp_products) {
					@if ($wp_products->images) {
						@php 
						$wp_counter++
						@endphp
					@endif
				@endforeach
			
			@if($supplier)
				@foreach($supplier as $wp_products)
					@if($wp_products->images)
						<?php if(($wp_count % 4) == 0){
							if($active_counter == 1){
								echo '<div class="item active">';
								$active_counter++;
							}else{
								echo '<div class="item">';$active_counter++;
							}
							$breaker_count = 2;}else{} ?>

					<div class="col-sm-3">
						<div class="product-image-wrapper"  itemscope itemtype="http://schema.org/Product">
							<div class="single-products">
								@if($wp_products->images)
								<a target="_blank" style="text-align:justify" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$wp_products->supp_pro_company_name->name))[0],$wp_products->company_id) }}">
								@else
								<a target="_blank" style="text-align:justify" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/', '-','product name not available').'='.mt_rand(100000000, 999999999).$wp_products->company_id) }}">
								@endif
									<div class="productinfo text-center">
									@if($wp_products)
										@if($wp_products->supp_pro_company_name->name)
										<img itemprop="image" title="{{ substr($wp_products->supp_pro_company_name->name, 0, 50) }}" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ URL::to('uploads',$wp_products->images->image,null) }}" alt="{{ substr($wp_products->supp_pro_company_name->name, 0, 50) }}" class="img-thumbnail ">
										
										@else
										<img itemprop="image" title="Product name not available" style="width:100%;height:170px;margin-left:0;border: none;box-shadow:none" src="{{ URL::to('uploads/no-image.jpg',null) }}" alt="Product name not available" class="img-thumbnail ">
										@endif
									
									@endif

									@if($wp_products->supp_pro_company_name->name)
										<span class="pro_name" style="text-align: center;" itemprop="name">
										{{ substr($wp_products->supp_pro_company_name->name, 0, 50) }}..</span>
									@else
										<span class="pro_name" style="text-align: center;" itemprop="name">
										{{ substr('Product name not available', 0, 50) }}..</span>
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
	<!--/recommended_items-->
</div>



<!-- verified supplier -->

<div class="row padding_0"
<div class="col-sm-12" style="margin-top:2%;margin-bottom:2%;background-color:#fff !important;padding-bottom;2%;padding-top: 2%;padding-bottom:2%;">
	<div class="col-sm-3" style="border-right:1px solid #DDD;">
		<div  class="col-xs-12 col-fixed-m-12 padding_0">
		<p style="font-size: 21px;font-weight: 700;height: 32px;">
			<a href="{{URL::to('tradeshow')}}" style="color: #333;">
			Trade shows & events
		</a></p>
		<p style="font-size: 12px;color: #999;margin-top: 2%;">Check out the tradeshows and events conducted by local.</p>
			
		</div>

		<div style="padding-left:10px;margin-bottom: 15%;" class="summary" >
						<a itemprop="url" href="{{ URL::to('Gold-supplier',null)}}" title="Gold Suppliers:pre-qualified suppliers" class="gs"><img itemprop="image" style="height:35px;width: 35px" src="{{ asset('bdtdc-product-image/home-page/Gold-membership.png') }}" alt="Gold membership"><span itemprop="name" style="display:none;">Gold membership</span></a>

						<a itemprop="url" title="Verified supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas). Click logo to learn more" href="{{ URL::to('SupplierChannel/pages/verified_supplier',32)}}" title="Verified supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas). Click logo to learn more" class="gs"><img itemprop="image" style="height:35px;width:35px" src="{{ asset('bdtdc-product-image/home-page/verified-supplier.png') }}" alt="verified-supplier"><span itemprop="name" style="display:none;">verified-supplier</span></a>

						<a itemprop="url" title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" href="{{ URL::to('BuyerChannel/pages/trade_assurance',5)}}" class="gs"><img itemprop="image" style="height:35px;width:35px" src="{{ asset('bdtdc-product-image/home-page/Buyer-protection-home.png') }}" alt="Buyer protection"><span itemprop="name" style="display:none;">verified-supplier</span></a>

						<a itemprop="url" title="The supplier's company premises has been checked by Bdtdc.com staff to ensure onsite operations exist there" href="{{ URL::to('SupplierChannel/pages/verified_supplier',32)}}"  class="gs"><img itemprop="image" style="height:35px" src="{{ asset('bdtdc-product-image/home-page/Hand-Shake-Icon.png')}}" alt="Hand Shake Icon"><span itemprop="name" style="display:none;">verified-supplier</span></a>
			</div>
	

	</div>
	
	<div class="col-sm-9">
		<div class="col-sm-12">
@foreach($tradeshow as $data)
	<div class="col-sm-6">
		<div class="col-sm-12">
			<div class="col-sm-4">
				
				sa
				<img itemprop="image" style="width:100%;height:170px;border: none;box-shadow:none" src="{{ asset('images/Trade.jpg') }}" alt="" class="img-thumbnail ">
				

			</div>
			<div class="col-sm-8">
				<p><a href="{{URL::to('tradeshow/info-details',$data->id)}}" style="color: #337AB7;font-size: 16px;">
					{{$data->description->title}}
					</a></p>
				<p>Date:{{$data->date}}</p>
				<p>Duration:{{$data->duration}}</p>
				<p>Location :{{$data->venue}} {{$data->location}}</p>
				
			</div>
		</div>


	</div>
@endforeach
			<p style="padding-left: 84%;"><a href="{{URL::to('tradeshow')}}">View more</a></p>

			
		</div>
	</div>
	

</div>
<br>
 <br> 
<div style="clear:both"></div>

@stop

@section('scripts')
<script type="text/javascript">       
      $(document).ready(function(){       
        $(document).on({click:function(e){        
          e.preventDefault();       
          var search_options_bangladesh = $('select[name="search_bangladesh"]').val();  
          //alert(search_options_bangladesh ) ;    
          var search_key_bangladesh = $('input[name="key_bangladesh"].search_key_bangladesh').val();
          if(search_options_bangladesh == 'suppliers'){
          	window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'; 
          }
          else if(search_options_bangladesh == 'products')
          {
          	window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'; 
          }
          else
          {
          	window.location.href = window.location.origin+'/search-product/search==suppliers+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+search_options_bangladesh; 
          }
          //window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+''+'&traders='+'';       
        }},'input[value="Search"].all_search_bangladesh');       
      });  


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


    };

 }
    }


 $('.carousel').carousel({
  interval: 2000
});
    
  </script>



    </script>
@stop
