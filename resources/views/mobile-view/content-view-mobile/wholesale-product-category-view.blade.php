<?php
    use App\Model\BdtdcProductImage;
use App\Model\BdtdcProductImageNew;
 ?>
@extends('mobile-view.layout.master_m')
    @section('content')
<section>
<div class="container">
    <div class="row padding_0" style="margin-top:2%;margin-bottom:2%;">
          <div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:0px;padding-top:2%; ">
              <a href="{{URL::to('product/name')}}" style="text-decoration: none;cursor: context-menu;color: #666; display: block;">
                <div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
              </a>
    </div>
    <div class="col-sm-12 col-xs-12 padding_0">
       <button class="btn btn-default" onclick="window.history.back();" style="width:100%;text-align:center;color: #666;padding:10px;font-size: 20px;padding-top:17px;"><i class="fa fa-reply-all" style="font-size: 30px;" aria-hidden="true"></i></button>
    </div>

 @if($wholesale_product)
 @foreach($wholesale_product as $data)
	<div class="col-xs-12 padding_0" style="margin-bottom:2%;background: #fff;margin-top:2%;">
			<a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$data->category_product_name->name).'='.mt_rand(100000000, 999999999).$data->product_id,null) }}">
				<div class="cat_pro_list">
                    <?php
                        $pro_img = BdtdcProductImage::where('product_id',$data->product_id)->first();
                        $pro_img_new = BdtdcProductImageNew::where('product_id',$data->product_id)->first();
                    ?>

                    @if(count([$pro_img_new]) == 0)
                        <img class="cat_pro_list_img img-responsive" src="{{ URL::to((isset($pro_img->image)) ? $pro_img->image : 'no_image.jpg') }}" alt="" />
                    @else
                       
                        @if($data->pro_parent_cat && $data->bdtdcCategory)
                        <img class="cat_pro_list_img img-responsive" src="{{ URL::to((isset($pro_img_new->image)) ? $pro_img_new->image : 'no_image.jpg') }}" alt="" />
                        @else
                        <img class="cat_pro_list_img img-responsive" src="{{ URL::to('uploads/no-image.jpg') }}" alt="" />
                        @endif
                      
                   @endif

				</div>
		<div class="cat_pro_list_des">
    		<div style="width: 100%; display: block;position: relative;">
              <div class="det_list" style="font-size: 13px; line-height: 20px; padding-bottom: 10px; font-weight: normal; color: #666; padding-top: 15px; height: 58px; overflow: hidden;padding-right: 8px;">

             	 {{$data->category_product_name->name}}

    				</div>
                    @if($data->cat_pro_price && $data->bdtdcProduct)
    				<div class="det_list">

    						US $ {{$data->cat_pro_price->product_FOB}}
    				</div>
    				<div class="det_list">
    						MOQ: {{$data->cat_pro_price->product_MOQ}} {{$data->bdtdcProduct->product_unit->name}}
    				</div>
    				@else 
    				Undefined product
                    @endif
    		</div>
    		<div style="display: block;width: 100%; margin:0; padding: 0; clear: both; padding-top: 10px;">
    			<div>
    				<div class="pro_sur"><img style="height:18px;width:18px; float: left;" src="{!! asset('assets/images/Buyer-protection-home.png') !!}">
    				</div>
    				<div class="pro_sur_gld">


                        @if($data)
                            @if($data->supplier_info)
                                @if($data->supplier_info->membership_year)
                                    <span>
                                        <img style="height:25px;width:20px;" src="{!! asset('assets/helpcenter/Gold-membership.png') !!}" alt="" />
                                        <span style="color: #000;font-size:12px;margin-left:-3%;">
                                            {{ $data->supplier_info->membership_year ?? ''}}
                                        </span>
                                        <span style="color: #000;font-size:12px;">YR</span>

                                    </span>
                                @endif
                            @endif
                        @endif



    				</div>
    				
    				<div class="pro_sur_cnt" style="float: left;">

                    @if($data)
                        @if($data->supp_pro_company)
                            @if($data->supp_pro_company->location_of_reg_string)
                            <span style="width: 30px;">
                            <img style="height:16px;width:24px; display: block;clear: both;" src="{{ asset('assets/global/img/flags/'.strtolower($data->supp_pro_company->location_of_reg_string->iso_code_2).'.png')}}" alt="{{ $data->supp_pro_company->location_of_reg_string->name }}" >
                            </span>
                            @endif
                        @endif
                    @endif 
				    <span style="float:left;font-weight: bold;font-size: 11px; margin-left: 4px;">
                        @if($data->supp_pro_company)
                            @if($data->supp_pro_company->location_of_reg_string)
                            <a style="margin-top: 10px;" class="custom_click_search" data-id-type="country" href="{{ $data->supp_pro_company->location_of_reg_string->id }}">
                            {{ $data->supp_pro_company->location_of_reg_string->name }}
                            </a>
                            @else
                            Country not available
                            @endif
                        @else
                            Country not available
                        @endif
                    </span>
              
    				</div>

    			</div>
    		</div>
    	   <div style="clear: both;float: left; padding-top: 10px;">
                <div data-product_id="{{ $data->product_id ?? '' }}" data-supplier_id="{{ $data->bdtdcProduct->supplier_product->supplier_id ?? '' }}" class="btn btn-primary  contact_supplier" style="padding:0 6px;"><i class="fa fa-envelope-o"></i>Contact Supplier</div>    			
    		</div>
        </div>
</a>
	</div>
    @endforeach
     @endif
    <div class="col-sm-12" style="margin-bottom:2%;background-color:#fff !important;padding-top: 2%;">
        {!! $wholesale_product->render() !!}
    </div>
    
</div>
</div>
</section>
@stop

@section('scripts')
<script type="text/javascript">
 $(document).on({

                    click: function(e) {

                        e.preventDefault();

                        $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');

                        var base_url = window.location.origin;//$('[name="base_url"]').val();

                        var supplier_id = $(this).data('supplier_id');

                        var product_id = $(this).data('product_id');

                        var url = base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
                        window.location.href = url;

                       
                    }

                }, '.contact_supplier');
</script>
@stop