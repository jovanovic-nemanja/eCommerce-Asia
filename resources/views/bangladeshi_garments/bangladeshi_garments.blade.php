@extends('fontend.master_dynamic')
 @section('page_css')
    <link property='stylesheet' href="{!! asset('css/footer-bottom/supplier-products.css') !!}" rel="stylesheet">
    <link property='stylesheet' href="{!! asset('css/help.css') !!}" rel="stylesheet">    
  @endsection
@section('content')
</div>
<div style="clear: both;"></div>
<div class="container-fluid" id="india_image">
<div class="container">
<div class="row" style="margin-top:1.5%;margin-bottom:1.5%;">
	<div class="col-sm-12" >
		<div  style="background-color: rgba(255, 255, 255, 0.84);margin-top: 4%;height: 368px;margin-left: 2%; margin:0 auto; max-width: 75%;">
			<p id="flow" style="margin-left: 0; text-align: center;">Source from Bangladesh</p>
			<p id="flow1" style="margin-left: 0; text-align: center;">The right place to find Bangladesh garments suppliers & products</p>
			<div class="col-xs-12 col-sm-11 padding_0" style="margin-left: 4%;">
				<div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" style="margin-left: -3%;" class="col-xs-12 padding_0">
			<div class="col-xs-12" style="padding-right:0px;border-radius:5px!important;">
				  <div class="col-lg-12" style="padding:0px">
						<form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post">
						<input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="input-group input-group-lg" style="border:0px solid #19446F;border-radius: 5px !important;">
						      <span class="input-group-btn hide_dropdown">
							        <select style="height:46px;width:270px;font-size: 13px;" class="form-control search_options_bangladesh" name="search_bangladesh">

										  <option value="suppliers" style="font-size: 12px;">Bangladesh Garments Suppliers</option>
										  <option value="1" style="font-size: 12px;">Bangladesh Garments Factories</option>
										  <option value="3" style="font-size: 12px;">Bangladesh Garments Traders</option>
										  <option value="quote" style="font-size: 12px;">Bangladesh Garments Quotation</option>

									</select>
							  </span>
						      <input itemprop="query-input" style="height:46px;border-radius: 0px!important;min-width: 100px; font-size: 13px; color: #333 !important;" name="key_bangladesh" class="form-control search_key_bangladesh" type="text" placeholder="What are you looking for from Bangladesh . . ." required="required" />
						      <span class="input-group-btn" style="width:13%;">
						        <input itemprop="query-input" type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 102%;" class="btn btn-primary btn-lg pull-left all_search_bangladesh" value="Search" />
						      </span>
					    	</div>

							
						</form>	
					</div>
				</div>
				</div>


				<div class="col-sm-12 padding_0" style="border-top: 1px dashed #B7B7B7;margin-top:6%;">
				<div class="col-sm-3">
					<p style="margin-top: 10%;font-size: 14px;color: #333;">Popular Bangladesh garments Category:</p>
					
				</div>
				<div class="col-sm-3 pplr-cate" style="margin-top: 2%;">
					<p ><a class="pplr-cate"  href="{{URL::to('Bangladesh-Garments-Accessories-products/18/25')}}" target="_blank">Garments Accessories</a></p>
					<p class="pplr-cate"><a  href="{{URL::to('Bangladesh-Jeans-products/18/254')}}"  target="_blank">Jeans</a></p>
				</div>
				<div class="col-sm-3 pplr-cate" style="margin-top: 2%;">
					<p  ><a href="{{URL::to('Bangladesh-Ladies-Clothing-products/18/247')}}" target="_blank" >Ladies Clothing</a></p>
					<p ><a target="_blank"  href="{{URL::to('Bangladesh-jackets/18/246')}}" >Jackets</a></p>
				</div>
				<div class="col-sm-3 pplr-cate" style="margin-top: 2%;">
					<p ><a class="pplr-cate" target="_blank" href="{{URL::to('Bangladesh-Weeding-Apparel-products/18/22')}}" >Wedding Apparel</a></p>
					<p class="pplr-cate"><a  target="_blank" href="{{URL::to('Bangladesh-Sweater-products/18/479')}}" >Sweater</a></p>
				</div>

			</div>
		</div>
	</div>		
</div>
</div>
</div>

</div>
<div class="container-fluid padding_0">
<div class="slideover" style="padding-top: 0%;">
	  <div class="count-trad-item" style="position: absolute;left: 47%;bottom: -55px;">
	    

	  </div>
</div>
</div>
<div class="container-fluid padding_0">
            <div style="min-height: 396px;background-color: #1686cc;display: block;">
            <div class="container">
                    <div class="row padding_0" >
                      <div class="col-sm-12 col-md-12 padding_0">
                              <h1 style="margin-top: 7%;margin-left: 14px;" class="country-trade-title">Effective sourcing from Bangladesh garments.</h1>
                      </div>
                       <div class="col-sm-12 col-md-12 padding_0">
                      
                          <div class="col-sm-4 col-md-4 col-lg-4">
                            <div>
                                    <div>
                              <div class="count-trad-item simple">
                                          <div class="sub-title">
                                            Simple
                                          </div>

                              </div>
                              <div class="trade-description">
                                        Post a Buying Request in just 1 minute
                                    </div>
                            </div>
                            </div>
                           
                          </div>
                          

                          <div class="col-sm-4 col-md-4 col-lg-4">
                              <div>
                                     <div>
                                  <div class="count-trad-item efficinet">
                                          <div class="sub-title">
                                            Efficient
                                          </div>
                                          
                              </div>
                              <div class="trade-description">
                                       Get multiple quotations within 24 hours

                              </div>
                                    </div>
                              </div>
                          
                          </div>
                          <div class="col-sm-4 col-md-4 col-lg-4">
                               <div>
                                     <div>
                                  <div class="count-trad-item allin">
                                          <div class="sub-title">
                                            All-In-One
                                          </div>      
                              </div>
                              <div class="trade-description">
                                        Comparison, samples and deals
                                    </div>
                                    </div>
                               </div>
                          </div>
                        </div>
                    </div>

                    <p class="text-center" style="padding-top: 3%;color: #f1f1f1;padding-bottom: 1%;">The garments industry in Bangladesh acts as the backbone of the economic system and a catalyst for the nation's development. Reliable Bangladesh garments suppliers brings you the finest quality of fashionable clothing. Hurry now to get quotations right away</p>

                    <div class="row" style="padding: 0;padding-left: 39%;">
                        <a itemprop="url" href="{{URL::to('get-quotations')}}" target="_blank"  class="btn btn-primary btn-join" style="height:47px;border-radius:5px;font-size:18px;color:#fff!important;padding-top: 4px; ">Get Quotations Now</a>
                    </div>
              
            </div>
        </div>
<div class="container">
<div class="row item_sha padding_0">

	<div class="col-md-3 padding_0">
		<div  class="col-xs-12 col-fixed-m-12 padding_0" style="padding: 5%">
			<div class="m-ws inner-offset-xs-6" data-spm="1998823020">

    <div class="m-ws-header">
        <div class="m-ws-header-top">
          <a itemprop="url"  title="BuyerSeller.Asia wholesaler:qualified suppliers" href="{{ URL::to('recommended-suppliers/products/bangladesh=75068610318') }}" target="_self" class="act">
           <img itemprop="image" title="BuyerSeller.Asia wholesaler: qualified suppliers" alt="Bdtdc wholesaler-qualified suppliers" style="height:32px;width: 32px;margin-bottom: 9px;" src="{{ asset('bdtdc-product-image/home-page/wholesale-home.png') }}"> <span class="title" style="font-size: 20px;">Garments Supplier</span>
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
			 $active_counter = 1;
			@endphp
				@foreach ($supplier as $wp_products) 
					@if ($wp_products->selected_copmany) 
						@php
						$wp_counter++
						@endphp
					@endif
				@endforeach
			
			@if($supplier)
				@foreach($supplier as $wp_products)
					@if($wp_products->selected_copmany)
						@if($wp_count % 4 == 0)
							@if($active_counter == 1)
								<div class="item active">
								@php
									$active_counter++
								@endphp
							@else
							<div class="item">
							@php
							$active_counter++
							@endphp
							@endif
							@php
							$breaker_count = 2
							@endphp
							@else
							@endif

					<div class="col-sm-3">
						<div class="product-image-wrapper"  itemscope itemtype="http://schema.org/Product">
							<div class="single-products">
								@if($wp_products->selected_copmany_name)
								<a target="_blank" style="text-align:justify" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$wp_products->selected_copmany_name->name))[0],$wp_products->company_id) }}">
								@else
								Unknown company
								@endif
									<div class="productinfo text-center">
									@if($wp_products)
							          

							          @if($wp_products->select_product_images)
							            <img itemprop="image" title="{{ $wp_products->selected_copmany_name->name ?? '' }}" style="height:200px;width:196px;" class="img-thumbnail" src="{!! asset($wp_products->select_product_images->image) !!}" alt="{{ $wp_products->selected_copmany_name->name ?? '' }}" />

							          @else
							            <img itemprop="image" style="height: 200px;width: 200px;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="BuyerSeller.Asia" />
							            @endif
									
									@endif

									@if($wp_products->selected_copmany_name)
										<span class="pro_name" style="text-align: center;" itemprop="name">
										{{ substr($wp_products->selected_copmany_name->name, 0, 50) }}..</span>
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

<div class="row padding_0">


				<div class="row"   style="background-color: #f6f7fb; margin-top:20px;margin-bottom: 2%;padding-bottom: 3%; margin-left: 0; margin-right: 0;">
		<div class="col-md-3 col-sm-3" style="padding:0;">
				<div class="cate-details" style="background-color: #fff3fc;">
						<div id="cat1" class="cate-d-title" style="border:none ;color: #fff">
							Garments products
						</div>
						<ul class="cate-ul-list" itemscope itemtype="http://data-vocabulary.org/Product">
						  @foreach ($cat_products as $cat)
								
									<li class="cat-li choice-cat"><a itemprop="url" rel="category" href="{{URL::to('bangladesh-'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$cat->category_name->name).'-product/18',$cat['cat_id']) }}"><?php echo $cat->category_name->name; ?></a></li>
									@endforeach

          							
								
						</ul>

				</div>
		</div>
<div class="col-md-9 col-sm-9" style="padding-left:30px;padding-right:0;">
  @if ($supplier) 
@foreach ($supplier as $data) 
	<div class="col-sm-3 col-xs-12 padding_0  sup-head-col" style="margin-bottom: 1%;height: 360px" itemscope itemtype="http://schema.org/Product">
	<div class="img-hilight  product-hover" style="padding: 7px;">
       @if($data->pro_name_string)
		<a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id) }}" title="Bangladesh {{ $data->pro_name_string->name }}" class="slidebox-item-list" style="box-shadow: none; border:0 none; background: 0;">
        	@endif

					@if($data->select_product_images)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height:200px;width:100%; padding: 0;" class="img-thumbnail" src="{!! asset($data->select_product_images->image) !!}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @else
            <img itemprop="image" style="height: 200px;width: 200px;padding: 0;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="BuyerSeller.Asia" />
          @endif
			
					<div class="product-head-cont">
					<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 30px;height:70px;">
							<div  class="brand-year16" style="text-decoration: none;">
              @if($data->pro_name_string)
							 <div itemprop="name" style="color: #333;">{{ substr($data->pro_name_string->name, 0, 30) }}..</div>
               @else
               Unknown Product
               @endif
					   </div>
					</div>
          @if($data->cat_pro_price)
					<p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3; height:32px;">
						<span class="doller-product-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer"><span itemprop="priceCurrency" content="USD">US $</span> <span itemprop="lowPrice">{{ $data->cat_pro_price->product_FOB}}
						</span> 
					</span>
					<span itemprop="name">{{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}
					</span>
					</p>
          @else
          <p class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3; height:32px;">
            Latest price
          </p>

          @endif

					<div class="brand-favorable" style="text-align:left;margin-left:10px; padding-top:0; padding-bottom:0;">
						MOQ: <span style="color:#333;">{{ $data->cat_pro_price->product_MOQ ?? ''}} {{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}</span> 
					</div>
				</div>
				</a>
				</div>	
				</div>
		@endforeach
  @endif
		
	</div>			
</div>
 </div>
<br><br>
 <div class="row item_sha padding_0">
 <div class="col-sm-12 padding_0">
 	<h1 class="title" style="margin: 40px 0 40px; padding-left: 10px;">Popular bangladesh garments products</h1>
 </div>
 	<div class="col-sm-12 padding_0 replace_area" style="background-color: #f6f7fb">
	
	@if($garment_products)	
	@foreach($garment_products as $data)				
						
		<div class="col-sm-3 col-xs-12 padding_0  sup-head-col" style="margin-bottom: 1%;height: auto" itemscope itemtype="http://schema.org/Product">
				<div class="img-hilight  product-hover" style="padding: 10px;">
          @if($data->pro_name_string)

		<a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;" title="{{ $data->pro_name_string->name ?? '' }}">
        

		@if($data->select_product_images)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height: 250px;width:100%;" class="img-thumbnail" src="{!! asset($data->select_product_images->image) !!}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @else
            <img itemprop="image" style="height: 250px;width: 100%;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="BuyerSeller.Asia" />
          @endif
			
					<div class="product-head-cont">
					<div class="brand-year" style="padding-left:0px;padding-right:10px;padding-top: 0px;">
							<div  class="brand-year16" style="text-decoration: none;">
              @if($data->pro_name_string)
							 <div title="Bangladesh  {{ $data->pro_name_string->name ?? '' }}" itemprop="name" style="color: #333;">Bangladesh  {{ substr($data->pro_name_string->name, 0, 50) }}..</div>
               @else
               Unknown Product
               @endif
               
               @if($data->selected_copmany_name)
						<div class="summary" style="padding-top: 2px; margin-left: -3px;" itemprop="name">
							 <span class="summ"  style="margin-left: -3px;"> {{ substr($data->selected_copmany_name->name, 0, 40) }}..</span>
							<!--  <a  class="summ"  style="margin-left: -3px;" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$data->selected_copmany_name->name))[0],$data->company_id) }}"> {{ substr($data->selected_copmany_name->name, 0, 40) }}..</a> -->
						</div>
               @else
               Unknown company
               @endif
					   </div>
					</div>
          @if($data->cat_pro_price)
					<p class="brand-favorable" style="text-align:left;padding-left:0px;padding-bottom:3; height:32px;">
						<span class="doller-product-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer"><span itemprop="priceCurrency" content="USD">US $</span> <span itemprop="lowPrice"><?php echo $data->cat_pro_price->product_FOB; ?></span> </span><span itemprop="name">{{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}</span>
					</p>
          @else
          <p class="brand-favorable" style="text-align:left;padding-left:0px;padding-bottom:3; height:32px;">
            Latest price
          </p>

          @endif

					<div class="brand-favorable" style="text-align:left; padding-top:0; padding-bottom:0;">
						MOQ: <span style="color:#333;">{{ $data->cat_pro_price->product_MOQ ?? ''}} {{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}</span> 
					</div>
				</div>
				</a>
			@endif
				</div>	
				</div>
				@endforeach
				{!! $garment_products->render() !!}
				@endif											
	</div>
 </div>
 <br><br>

<div class="row item_sha padding_0">
<div class="col-sm-12" style="margin-top:2%;margin-bottom:2%;background-color:#fff !important;padding-bottom;2%;padding-top: 2%;padding-bottom:2%;">
	<div class="col-sm-3" style="border-right:1px solid #DDD;">
		<div  class="col-xs-12 col-fixed-m-12 padding_0">
		<p style="font-size: 16px;font-weight: 600;height: 25px;">
			<a href="{{URL::to('tradeshow',null)}}" style="color: #333;">
			Trade shows & events
		</a></p>
		<p style="font-size: 12px;color: #999;margin-top: 2%;">Garments sourceing event.</p>
			
		</div>

		<div style="margin-bottom: 15%;" class="summary"  itemscope itemtype="http://schema.org/Recipe" >
						<a itemprop="url" href="{{ URL::to('Gold-supplier',null)}}" title="Gold Suppliers:pre-qualified suppliers" class="gs"><img itemprop="image"  src="{{ asset('bdtdc-product-image/home-page/Gold-membership.png') }}" alt="Gold membership"><span itemprop="name" style="display:none;">Gold membership</span></a>

						<a itemprop="url" title="Verified supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas). Click logo to learn more" href="{{ URL::to('SupplierChannel/pages/verified_supplier',32)}}" title="Verified supplier assessed by a world-leading inspection company (i.e SGS, Bureau Veritas). Click logo to learn more" class="gs"><img itemprop="image"  src="{{ asset('bdtdc-product-image/home-page/verified-supplier.png') }}" alt="verified-supplier"><span itemprop="name" style="display:none;">verified-supplier</span></a>

						<a itemprop="url" title="Buyer Protection: Ensures on-time shipment and pre-shipment product quality" href="{{ URL::to('BuyerChannel/pages/trade_assurance',5)}}" class="gs"><img itemprop="image"  src="{{ asset('bdtdc-product-image/home-page/Buyer-protection-home.png') }}" alt="Buyer protection"><span itemprop="name" style="display:none;">verified-supplier</span></a>

						<a itemprop="url" title="The supplier's company premises has been checked by BuyerSeller.Asia staff to ensure onsite operations exist there" href="{{ URL::to('SupplierChannel/pages/verified_supplier',32)}}"  class="gs"><img itemprop="image"  src="{{ asset('bdtdc-product-image/home-page/Verified-Suppliers-hand.png')}}" alt="Verified Suppliers hand"><span itemprop="name" style="display:none;">verified-supplier</span></a>
			</div>
	

	</div>

	
	<div class="col-sm-9">
		<div class="col-sm-12">
@foreach($tradeshow as $data)
	<div class="col-sm-6">
		<div class="col-sm-12 padding_0" >
			<div class="col-sm-5 padding_0">
				
				<img itemprop="image" style="width:100%;height:170px;border: none;box-shadow:none" src="{!! asset('uploads/'.$data->images) !!}" alt="" class="img-thumbnail ">
			
			</div>
			<div class="col-sm-7">
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
			<p style="padding-left: 84%;"><a href="{{URL::to('tradeshow',null)}}">View more</a></p>

			
		</div>
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
          // alert(search_options_bangladesh ) ;    
          var search_key_bangladesh = $('input[name="key_bangladesh"].search_key_bangladesh').val();
          if(search_options_bangladesh == 'suppliers'){
          	window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'; 
          }
          else if(search_options_bangladesh == 'quote')
          {
          	window.location.href = window.location.origin+'/Sourcing/Requests/info/category==0+..+country==18+..+key=='+search_key_bangladesh+'+..+order==0'; 
          }

          else
          {
          	window.location.href = window.location.origin+'/search-product/search==suppliers+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+search_options_bangladesh; 
          }
          // window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+''+'&traders='+'';       
        }},'input[value="Search"].all_search_bangladesh');       
      });  

</script>
<script>

     

 $('.carousel').carousel({
  interval: 2000
});
    
  </script>



    </script>
@stop
