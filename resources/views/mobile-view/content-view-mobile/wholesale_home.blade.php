@extends('mobile-view.layout.master_m')
@section('content')
<section>
<div class="container">
<div class="row padding_0">
			<div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:0px; ">
                    <a href="{{URL::to('product/name')}}" style="text-decoration: none;cursor: context-menu;color: #666; display: block;">
                    <div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
                    </a>
    </div>
</div>
      @if ($product_categorys)

            @foreach ($product_categorys as $product_category)

            
      <div class="row" style="padding-bottom: 5px">
        	<ul class="" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<li style="padding-left: 0%" class="sale-cat-heading-tit"> <i style="width: 2.85em;top: 7px;" class="icon-p {{ $product_category->pro_parent_cat->image ?? '' }}"></i>{{ $product_category->pro_parent_cat->name ?? '' }}<span>  <i class="fa fa-angle-right"></i></span></li>	
			</ul>
      </div>
	 <div id="item_sha" class="row" style="padding-top: 0px;">
	

		<div class="col-md-12 padding_0" style="padding-left:5px;">
			<div class="col-md-3" style="padding-left:0; padding-right:15px;">
				<div id="bd_myCarousel" class="carousel slide" data-ride="carousel">
			 		<div class="sale-ppp-title">
	 			 		<ul class="sale-title-menu" itemscope itemtype="http://data-vocabulary.org/Product">
	 			 		@if ($product_category->most_view_category)
							@foreach ($product_category->most_view_category as $cat)
		 			 			<li class="sale-title-menu-li choice-cat" rel="sub category" itemprop="url">
			 			 			  <a itemprop="url"  class="sale-title-menu-li-a" href="{{URL::to('wholesale/category/product',$cat->category_id) }}"><span itemprop="name">{{ $cat->cat_name->name }}</span>
			 			 			</a>
		 			 			</li>
		 			 		@endforeach
	 			 		@endif
	 			 		</ul>
	 			 	</div>	
	 			</div>					
 			</div>	
        
		  @if ($product_category->selected_suppliers) 
        
			@foreach ($product_category->selected_suppliers as $data) 
			<div class="col-sm-2 col-xs-6 padding_0  sup-head-col" style="margin-bottom: 1%;padding-right: 2%;">
				<div class="img-hilight  product-hover">
	        		<a itemprop="url"  target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;">

				    @if($data->select_product_image)
		            <img itemprop="image"   style="" class="img-responsive  col-sup-img" src="{{ URL::to('uploads',$data->select_product_image->image) }}" alt="{{$data->pro_name_string->name ?? ''}}" />
		            @elseif($data->select_product_images)
		            <img itemprop="image"   style="" class="img-responsive  col-sup-img" src="{{ URL::to('bdtdc-product-image/'.trim($data->parent_cat->name).'/'.trim($data->pro_to_cat->bdtdcCategory->name),(isset($data->select_product_images)) ? $data->select_product_images->image : 'no_image.jpg') }}" alt="{{$data->pro_name_string->name ?? ''}}"/>
		            @else
		            <img itemprop="image"   style="" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="{{$data->pro_name_string->name ?? ''}}" />
		          
		            @endif
					
					<div style="height: 120px;" class="product-head-cont">
						<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 0px;height:43px;">
	              			@if($data->pro_name_string)
								 {{ substr($data->pro_name_string->name, 0, 20) }}..
	               			@else
	               			Unknown Product
	               			@endif
						 
						</div>

						<div itemprop="name"  class="brand-favorable" style="text-align:left;padding-left:10px;padding-bottom:3px; height:32px;">
							<span class="doller-product-price">US $ 800 /</span>Box
						</div>
					</a>
					</div>
			</div>	
		@endforeach
  @endif
					
	</div>
</a>
</div>
</div>
</div>
</div>
</div>
</section>							

@endforeach

{!! $product_categorys->render() !!}
@endif
@stop

@section('scripts')

		<script type="text/javascript">
	(function(){

		$('.product-image-wrapper-next').css('margin-bottom','0');
			
		$(window).load(function(){
			$('a[href="#forbuyer"]').click()	
		})
		    var section = $('[name="section"]').val();
		    (section !="") ? $('.nav-tabs li a[href="#'+section+'"]').click() : false;
			    
	}
	);
</script>
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
@stop