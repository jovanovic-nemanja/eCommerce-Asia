<?php 
    use App\Model\BdtdcCountry;
    use App\Model\BdtdcProductImage;
    use App\Model\BdtdcProductImageNew;
?>
@foreach($products as $product)
	<div id="list_product" class="col-xs-12">
		<div class="col-xs-7 col-md-2 col-sm-4 padding_0">
			<?php
			$pro_img = BdtdcProductImage::where('product_id',$product->id)->first();
			$pro_img_new = BdtdcProductImageNew::where('product_id',$product->id)->first();
			?>
			@if(count($pro_img_new) > 0)
			<img style="height:150px;width:100%" class="img-thumbnail" src="{{ URL::to('bdtdc-product-image/'.trim($product->parent_name).'/'.trim($product->cattegory_name),(isset($pro_img_new->image)) ? $pro_img_new->image : 'no_image.jpg') }}" alt="" />
			@elseif(count($pro_img) > 0)
			<img style="height:150px;width:100%" class="img-thumbnail" src="{{ URL::to('uploads',(isset($pro_img->image)) ? $pro_img->image : 'no_image.jpg') }}" alt="" />
			@else
			<img style="height:150px;width:100%" class="img-thumbnail" src="{{ URL::to('uploads/no_image.jpg') }}" alt="" />
			@endif
		</div>
		<div class="col-xs-6 col-md-6 col-sm-8">
			<div class="col-xs-12 padding_0">
				<p><a style="font-size:18px" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\. -]/', ' ',$product->product_name).'='.mt_rand(100000000, 999999999).$product->id) }}">{{ $product->product_name }}</a></p>
				<div class="col-md-6 col-xs-12 padding_0">
					<p>
						<strong>	US $</strong>{{ $prices->product_FOB or '' }}/{{ $product->unit_name or '' }}
					</p>
				</div>
				<div class="col-md-6 col-xs-12 padding_0">
					<p>
						<span>{{ $prices->product_MOQ or '' }} {{ $product->unit_name or '' }}</span>(Min. Order)
					</p>
				</div>

			</div>

			<div class="col-xs-12 padding_0">
				<div class="col-sm-6 col-xs-12 padding_0">
					<p style="margin:0 0 0px;display:block;width:83%" class="summary_pro">Product Type:</p>
					<p>{{ $product->cattegory_name }}</p>
				</div>
				<div class="col-sm-6 col-xs-12 padding_0">
					<ul class="padding_0">
						<li class="summary_pro">Supply Type:<span>OEM Service</span></li>
						<li class="summary_pro">Place of Origin:<span>CN;FUJ</span></li>
						<li class="summary_pro">Brand Name:<span>OEM</span></li>
					</ul>
				</div>
			</div>

		</div>
		<div class="col-xs-5 col-md-4 col-sm-12 padding_0">

			<div id="left_sh" style="padding-left: 15px;" style="" class="col-xs-12 padding_0">
				<div class="col-sm-10 padding_0">
					<p class="heading_sup">
						<a target="_blank" href="{{ URL::to('profile/template_',$product->company_id) }}">
							{{ $product->company_name }}
						</a>
					</p>
					<p class="summary">{{ $product->country_name}} |
						<a href="{{ URL::to('FooterPage/pages/Trade_Assurance',36) }}" target="_blank">
							<i class="fa fa-pie-chart"></i> Trade Assurance
						</a>
					</p>
					<p class="summary">
						Experiance :
						<br> Established {{ date('Y', strtotime($product->establish_date)) }} , 10 years OEM
					</p>


				</div>
				<div class="col-sm-2">
					<img style="height:50px;" src="{{ asset('assets/helpcenter/su_year.png') }}" />
				</div>




			</div>

		</div>
		<div class="col-sm-12 padding_0">
			<div class="col-sm-5 choose padding_0">
				<ul class="nav nav-pills nav-justified padding_0">
					<li><a style="float: left;" href="{{ URL::to('login') }}"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
					<li><a style="float: left;" href="{{ URL::to('login') }}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
				</ul>
			</div>

			<div style="float:right;padding-right:1%" class="col-sm-5 padding_0">
				<ul style="float:right" class="list-inline">
					<!-- <li><a href="#animatedModal" data-product_id="{{ $product->id }}" data-supplier_id="{{ $product->supplier_id }}" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</a></li> -->

					<!-- <li><button type="button" data-toggle="modal" data-target="#filter_product_edit_modal" data-product_id="{{ $product->id }}" data-supplier_id="{{ $product->supplier_id }}" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</button></li> -->

					<li><button type="button" data-product_id="{{ $product->id }}" data-supplier_id="{{ $product->supplier_id }}" class="btn btn-primary btn-sm contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</button></li>
					<!-- <li><button type="button" data-toggle="modal" data-target="#filter_product_edit_modal" data-product_id="{{ $product->id }}" data-supplier_id="{{ $product->supplier_id }}" class="btn btn-primary btn-sm filter_product_contact_supplier"><i class="fa fa-envelope-o"></i>Contact Supplier</button></li> -->
					<li><i class="fa fa-weixin"></i><a href="{{ URL::to('login') }}">Talk to me</a></li>
				</ul>
			</div>
		</div>

	</div>
	
@endforeach

<!-- <div id="filter_product_edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="background-color: #fff;padding: 2%;position: relative;">
	    <button type="button" class="btn btn-primary close" data-dismiss="modal" style="position: absolute;top: 47px;    right: 6%;z-index: 1000"></button>
	<div class="modal-content">

      
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

  </div>
</div> -->