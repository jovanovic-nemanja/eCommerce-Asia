@extends('mobile-view.layout.master_m')
	@section('content')
<section>
<div class="container">
<div class="row">
    <div class="col-md-12 padding_0" style="padding-bottom: 1%;padding-top: 1%">
      <ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
      <li style="float: left;padding-top: 5px" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="{{ URL::to('/') }}" style="color: #000"> Home &nbsp;</a></li>
      <li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
        @if($country)
        <a itemprop="url" href="" style="color: #000"> <i class="fa fa-angle-right"></i> {{ $country->name ?? '' }}  <img itemprop="image" style=" float: none;height:;" src="@if($country->country_image_one)
          {{ asset('assets/global/img/flags/'.$country->country_image_one->slug) }}
          @else

          @endif
          " alt="bdtdc" ><i class="fa fa-angle-right"></i>
        </a>
        @endif
      </li></ul>
    </div>
  </div>
  <div class="row">

<div  class="col-sm-3 col-xs-12 mobo-categories hr-gap no-padding all-cate-pro">
            <h3><a itemprop="url" href="{{ URL::to('online-marketplace',null)}}"><i class="fa fa-list-ul"></i> CATEGORIES</a></h3>
            @if ($cat_products) 
           @foreach ($cat_products as $category)
            <ul  class="pull-left bazar-list" itemscope itemtype="http://data-vocabulary.org/Product">
                <li  data-id="market-<?php echo $category['parent_id']; ?>">
                    <a style="padding:0; padding-left:7px;" itemprop="url"  rel="category" href="{{ URL::to(preg_replace('/[^A-Za-z0-9\.-]/', '-',$category->pro_parent_cat->name).'/product/1',$category['parent_id']) }}">
                        <span itemprop="name" style="font-size:14px;">{{ $category->pro_parent_cat->name ?? '' }}</span> </a>
              
                </li>
            </ul>
            @endforeach

            @endif
            <div id="bazar-list" class="pull-left" style="padding-left: 1.3%;;padding-right: 8%;padding-top: 6%;font-weight: 600;">

                    <a itemprop="url" href="{{ URL::to('online-marketplace',null) }}">

                       All Categories </a>

                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>

            </div>

        </div>
      </div> 
  </div>
  </section>
<section>
<div class="container">
@if ($cat_products) 

            @foreach ($cat_products as $pro_category)

<div class="row" id="cat{{$pro_category->pro_parent_cat->id}}"  style="background-color: #f6f7fb; margin-top:20px;margin-bottom: 2%;padding-bottom: 3%; border-left:1px solid #ddd;border-bottom:1px solid #ddd;border-right:1px solid #ddd;">
  @if ($pro_category->selected_suppliers) 
        
      @foreach ($pro_category->selected_suppliers as $data) 
        <div class="product_view_sel padding_0  sup-head-col" style="height: 360px" itemscope itemtype="http://schema.org/Product">
          <div class="img-hilight  product-hover">
          @if($data->pro_name_string)
        <a itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->pro_name_string->name).'=232942253'.$data->product_id,null) }}" class="slidebox-item-list" style="box-shadow: none; border:0 none;">
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
              <div  class="brand-year17">
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
</div>
</section>
	@stop