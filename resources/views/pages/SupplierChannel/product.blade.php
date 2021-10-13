@extends('fontend.master2')
	@section('content')
		@include('fontend.layouts.aside')

				
				<div class="col-sm-9 padding-right">


					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>

		
												
			@if(isset($products)>0)			
	@foreach($products as $product)
		<div class="row hole_product">
			<div class="col-md-2 col-sm-3 col-xs-12">
				<img class="img-responsive"  src="{{ asset('assets/product/550907efd603e-ghk-electrolux-ew30if60is-range-mdn.jpg') }}" alt="" />
			</div>
			<div class="col-md-5 ">
					<h3><a href="#">{{ $product->bdtdcProduct->product_name->name }}</a></h2>
					<h5><span>US ${{ $product->bdtdcProduct->price }}/</span></h4>
					<h5><span>500 Pieces</span>(Min. Order)</h4>
				<div class="row mid_row_padding">
					<div class="col-md-6 product_details">
						<ul>
							<li>Product Type:<span>T-Shirts</span></li>
							<li>Age Group:<span>Adults</span></li>
							<li>Feature:<span>Anti-Pilling;Anti-Shrink;Anti-Wri...</span></li>
						</ul>
					</div>
					<div class="col-md-6 product_details">
						<ul>
							<li>Supply Type:<span>OEM Service</span></li>
							<li>Place of Origin:<span>CN;FUJ</span></li>
							<li>Brand Name:<span>OEM</span></li>
						</ul>
					</div>
				</div>

			</div>
			<div id="cat_right" class="col-md-4 col-sm-4 col-xs-12">
				<div class="last_row">
					<ul>
						<li><img src="{{ asset('assets/fontend/img/gs_icon_03.png')}}">
							<a href="{{ URL::route('company.profile',$product->bdtdcProduct->supplier_product->supplier_id) }}">{{ $product->bdtdcProduct->supplier_product->suppliers->company }}
							</a>
						</li>
						<li><img src="{{ asset('assets/fontend/img/supplier-capability.png')}}"><a href="#">Trade Assurance</a></li>
						<li><i class="fa fa-reply response_rate_font"></i><a href="#">54.5% Response Rate</a></li>
						<li><a href="#">1 Transaction for US $3,000+</a></li>
						<li><a href="#">>72h Average Response Time</a></li>

					</ul>
				</div>
				<div class="row margin_button_section">
					<div class="col-md-6">
						<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-envelope-o"></i>
Contact Supplier</button>
					</div>
					<div class="col-md-6 last_last_row">
						<i class="fa fa-weixin"></i><a href="#">Leave Messages</a>
					</div>
				</div>
			</div>
		</div>
@endforeach
@else
<h2>Products not found</h2>
@endif

						
					</div>
					
					<br><br>
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend1.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend2.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend3.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend1.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend2.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('assets/dashboard/images/home/recommend3.jpg') }}" alt="">
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

					<!-- Bootstrap trigger to open modal --> 
 <a data-toggle="modal" href="#rating-modal">Write a Review</a> 
 
 
 <div class="hide fade modal" id="rating-modal"> 
   <div class="modal-header"> 
     <button type="button" class="close" data-dismiss="modal">×</button> 
     <h2>Your Review</h2> 
   </div> 
 
 
   <div class="modal-body"> 
     <!-- The async form to send and replace the modals content with its response --> 
     <form class="form-horizontal well" data-async="" data-target="#rating-modal" action="/some-endpoint" method="POST"> 
       <fieldset> 
         <!-- form content --> jhgjghjdsfgfsafs
      </fieldset> 
    </form> 
   </div> 
 
 
   <div class="modal-footer"> 
     <a href="#" class="btn" data-dismiss="modal">Cancel</a> 
   </div> 
 </div> 

					
				</div>
			</div>



	</div>



@stop
@section('script')
<script type="text/javascript">
            $(function() {
				/**
				* the element
				*/
				var $ui 		= $('#ui_element');
				
				/**
				* on focus and on click display the dropdown, 
				* and change the arrow image
				*/
				$ui.find('.sb_input').bind('focus click',function(){
					$ui.find('.sb_down')
					   .addClass('sb_up')
					   .removeClass('sb_down')
					   .andSelf()
					   .find('.sb_dropdown')
					   .show();
				});
				
				/**
				* on mouse leave hide the dropdown, 
				* and change the arrow image
				*/
				$ui.bind('mouseleave',function(){
					$ui.find('.sb_up')
					   .addClass('sb_down')
					   .removeClass('sb_up')
					   .andSelf()
					   .find('.sb_dropdown')
					   .hide();
				});
				
				/**
				* selecting all checkboxes
				*/
				$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
					$(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
				});
            });
        </script>	
@stop