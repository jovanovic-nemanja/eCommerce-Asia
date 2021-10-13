@extends('mobile-view.layout.master_m')
@section('content')
<section>
<div class="container">
<div class="row item_sha padding_0">
	<div style="display: none;">
			 @foreach ($cat_products as $cat)
								
									<li class="cat-li choice-cat"><a itemprop="url" rel="category" href="{{URL::to('bangladesh-'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$cat->category_name->name).'-product/18',$cat['cat_id']) }}"><?php echo $cat->category_name->name; ?></a></li>
									@endforeach

	</div>
	<div style="overflow:visible;border-left:1px solid rgba(0,0,0,.1);padding-top: 30px;" class="recommended_items product_slide_area col-md-12">
	
		<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<?php $wp_count = 0; $breaker_count = 1;$wp_counter = 0;$active_counter = 1;
				foreach ($supplier as $wp_products) {
					if ($wp_products->selected_copmany) {
						$wp_counter++;
					}
				}
			?>
			@if($supplier)
				@foreach($supplier as $wp_products)
				<?php //echo "<pre>";  print_r($wp_products); echo "</pre>"; ?>
					@if($wp_products->selected_copmany)
						<?php if(($wp_count % 4) == 0){
							if($active_counter == 1){
								echo '<div class="item active">';
								$active_counter++;
							}else{
								echo '<div class="item">';$active_counter++;
							}
							$breaker_count = 2;}else{} ?>

					<div class="col-sm-3 col-xs-6">
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
							            <img itemprop="image" title="{{ $wp_products->selected_copmany_name->name ?? '' }}" style="height:200px;width:200px; margin: 0 auto;" class="img-thumbnail" src="{!! asset($wp_products->select_product_images->image) !!}" alt="{{ $wp_products->selected_copmany_name->name ?? '' }}" />
							          @else
							            <img itemprop="image" style="height: 200px;width: 200px; margin: auto;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg',null) }}" alt="bdtdc" />
							            @endif
									
									@endif

									@if($wp_products->selected_copmany_name->name)
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
</div>
</div>
</section>
<section>
<div class="container">
<div class="row" style="background-color: #fff;">
		<div class="col-md-12 col-sm-12" style="padding: 0 6.5%; background: #fff;">
		<div style=" margin-top:20px;margin-bottom: 2%;padding-bottom: 3%; margin-left: 0; margin-right: 0; border:0 none;">
  @if ($supplier) 
        
			@foreach ($supplier as $data) 
				<div class="padding_0  sup-head-col" style="margin-bottom: 1%; border:0 none; padding: 0;" itemscope itemtype="http://schema.org/Product">
					<div class="img-hilight  product-hover" style="padding: 7px; width: 230px; float: left; margin-bottom: 20px;">
          	@if($data->pro_name_string)
				<a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null) }}" title="Bangladesh {{ $data->pro_name_string->name }}" class="slidebox-item-list" style="box-shadow: none; border:0 none; background: 0;">
        	@endif

          @if($data->select_product_images)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height: 200px;width: 200px;padding: 0;margin:0 auto;" class="img-thumbnail" src="{!! asset($data->select_product_images->image) !!}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @else
            <img itemprop="image" style="height: 200px;width: 200px;padding: 0;margin:0 auto; float: left;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="bdtdc" />
          @endif
			
					<div class="product-head-cont" style="height: 120px;">
					<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 20px;height:55px;">
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
						<span class="doller-product-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer"><span itemprop="priceCurrency" content="USD">US $</span> <span itemprop="lowPrice"><?php echo $data->cat_pro_price->product_FOB; ?></span> </span><span itemprop="name">{{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}</span>
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
</div>
</section>
<section>
<div class="container">
 <div class="row" style="background: #fff;">
 <div class="col-sm-12 padding_0">
 	<h1 class="title" style="margin: 40px 0 40px; padding-left: 10px;">Popular bangladesh garments products</h1>
 </div>
 	<div class="col-sm-12" style="background-color: #fff; padding: 0 5%;">
	
	@if($garment_products)	
	@foreach($garment_products as $data)				
						
		<div class="padding_0  sup-head-col" style="margin-bottom: 1%;height: auto; border:0 none;" itemscope itemtype="http://schema.org/Product">
					<div class="img-hilight  product-hover" style="padding: 10px; width: 230px;margin:0 auto; float: left;">
          @if($data->pro_name_string)

				<a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;" alt="{{ $data->pro_name_string->name ?? '' }}">

          @if($data->select_product_images)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height: 200px;width: 200px;padding: 0;margin:0 auto; " class="img-thumbnail" src="{!! asset($data->select_product_images->image) !!}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @else
            <img itemprop="image" style="height: 200px;width: 200px;padding: 0;margin:0 auto;float: left;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg',null) }}" alt="bdtdc" />
          @endif
			
					<div class="product-head-cont" style="text-align: center;">
					<div class="brand-year" style="padding-left:0px;padding-right:10px;padding-top: 0px;">
							<div  class="brand-year16" style="text-decoration: none; padding-top: 10px;">
              @if($data->pro_name_string)
							 <div title="Bangladesh  {{ $data->pro_name_string->name ?? '' }}" itemprop="name" style="color: #333;">Bangladesh  {{ substr($data->pro_name_string->name, 0, 50) }}..</div>
               @else
               Unknown Product
               @endif
               
               @if($data->selected_copmany_name)
							 <div class="summary" style="padding-top: 2px; margin-left: -3px;" itemprop="name"><a class="summ"  style="margin-left: -3px;" href="{{ URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$data->selected_copmany_name->name))[0],$data->company_id) }}"> {{ substr($data->selected_copmany_name->name, 0, 40) }}..</a></div>
               @else
               Unknown company
               @endif
					   </div>
					</div>
          @if($data->cat_pro_price)
					<p class="brand-favorable" style="text-align:center;padding-left:0px;padding-bottom:3; height:32px;">
						<span class="doller-product-price" itemprop="offers" itemscope itemtype="http://schema.org/AggregateOffer"><span itemprop="priceCurrency" content="USD">US $</span> <span itemprop="lowPrice"><?php echo $data->cat_pro_price->product_FOB; ?></span> </span><span itemprop="name">{{ $data->BdtdcSelectedSupplier_products->ProductUnit->name ?? '' }}</span>
					</p>
          @else
          <p class="brand-favorable" style="text-align:center;padding-left:0px;padding-bottom:3; height:32px;">
            Latest price
          </p>

          @endif

					<div class="brand-favorable" style="text-align:center; padding-top:0; padding-bottom:0;">
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
</div>
</section>

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
          	window.location.href = window.location.origin+key/search?c=18&bp=true&gs=&as=&fm=&ftr=&fe=&bt=
          	// window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'; 
          }
          else if(search_options_bangladesh == 'products')
          {
          	window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'; 
          }
          else
          {
          	window.location.href = window.location.origin+key/search?c=18&bp=true&gs=&as=&fm=&ftr=&fe=&bt=
          	/*window.location.href = window.location.origin+'/search-product/search==suppliers+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+search_options_bangladesh;*/ 
          }
          // window.location.href = window.location.origin+'/search-product/search=='+search_options_bangladesh+'+..+key=='+search_key_bangladesh+'+..+country==18+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0'+'?business_type='+''+'&traders='+'';       
        }},'input[value="Search"].all_search_bangladesh');       
      });  

</script>


	<script type='text/javascript' src='{!! asset('resources/assets/slider/jquery.flexslider-min.js') !!}'></script>

<script type='text/javascript' src='{!! asset('resources/assets/slider/jquery.elastislide.js') !!}'></script>

<script type='text/javascript' src='{!! asset('resources/assets/slider/vanilla-slider.js') !!}'></script>

<script type='text/javascript' src='{!! asset('resources/assets/slider/jssor.slider.mini.js') !!}'></script>

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
