@extends('mobile-view.layout.master_m')
	@section('content')
<div class="row padding_0" style="background: #fff;">
		<div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:0px; ">
                    <a href="{{URL::to('product/name')}}" style="text-decoration: none;cursor: context-menu;color: #666; display: block;">
                    <div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
                    </a>
    </div>
    <div class="cat-pr-list">All Category</span></div>
</div>

@if ($cat_products) 
            @foreach ($cat_products as $pro_category)

<div class="row padding_0" id="cat{{$pro_category->pro_parent_cat->id}}"  style="background-color: #f6f7fb; margin-top:20px;margin-bottom: 2%;padding-bottom: 3%; border-left:1px solid #ddd;border-bottom:1px solid #ddd;border-right:1px solid #ddd; border-top: 1px solid #ddd;">
			

  @if ($pro_category->selected_suppliers) 
        
			@foreach ($pro_category->selected_suppliers as $data) 
				<div class="product_view_sel padding_0  sup-head-col" style="margin-bottom: 1%;height: 360px" itemscope itemtype="http://schema.org/Product">
					<div class="img-hilight  product-hover">
          @if($data->pro_name_string)
				<a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;">
        @endif
          <div>
					@if($data->select_product_image)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height: 200px;width: 200px;" class="img-responsive  col-sup-img" src="{{ URL::to('uploads',$data->select_product_image->image) }}" alt="{{ $data->pro_name_string->name ?? '' }}" />

          @elseif($data->select_product_images)
            <img itemprop="image" title="{{ $data->pro_name_string->name ?? '' }}" style="height:200px;width:100%;" class="img-thumbnail" src="{{ URL::to('bdtdc-product-image/'.trim($data->parent_cat->name).'/'.trim($data->pro_to_cat->bdtdcCategory->name),(isset($data->select_product_images)) ? $data->select_product_images->image : 'no_image.jpg') }}" alt="{{ $data->pro_name_string->name ?? '' }}" />
          @else
            <img itemprop="image" style="height: 200px;width: 200px;" title="No image" class="img-responsive  col-sup-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="bdtdc" />
          @endif
			   </div>
					<div class="product-head-cont">
					<div class="brand-year" style="padding-left:10px;padding-right:10px;padding-top: 30px;height:70px;">
							<div  class="brand-year16">
              @if($data->pro_name_string)
							 <div itemprop="name" class="pp-title" title="{{ $data->pro_name_string->name ?? '' }}">{{ substr($data->pro_name_string->name, 0, 30) }}..</div>
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
@endforeach
@endif
	@stop