@extends('fontend.master2') @section('content')
<div class="row">
	<div class="col-sm-12">
		<div id="slider-carousel" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="item active">
					<div class="col-sm-6">
						<h1><span>{{ $company->company_name }}</span></h1>
						<br>
						<br>
						<h2>{{ $company->business_type_name }}</h2>
						<p><span>Main Product:</span> @foreach($main_products as $mp)
							<span class="badge">{{ $mp->product_name  }}</span> @endforeach
						</p>
						<br>
						<button type="button" class="btn btn-default get">Contact Supplier</button>
					</div>
					<div class="col-sm-6">
	
						{{--@if($supplier->package_name->name=='Free Membership')--}} {{--
						<img src="{!! asset('public/assets/fontend/images/Gold-Membership.png') !!}" width="150px" class="pricing" alt="" />--}} {{--@else--}} {{--
						<img src="{!! asset('public/assets/dashboard/images/home/pricing.png') !!}" class="pricing" alt="" />--}} {{--@endif--}}
					</div>
				</div>
			</div>
			<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
	
	
	</div>
</div>

<div class="row">
	<ul id="tabs">
		<li><a href="#" title="tab1">Home</a></li>
		<li><a href="#" title="tab2">Product Categories</a></li>
		<li><a href="#" title="tab3">Company Overview </a></li>
		<li><a href="#" title="tab4">Contact</a></li>
	</ul>

	<div id="content">
		<div id="tab1">
			<h2>ygjggghkjhhkjhhhkj</h2>
			<div>
				dgsdgd
			</div>
		</div>
		<div id="tab2">Two - content</div>
		<div id="tab3">Three - content</div>
		<div id="tab4">Four - content</div>
	</div>
</div>

<br>
<br>

<div class="row">
	<div class="col-sm-3">
		<div class="left-sidebar">
			<h2>Category</h2>
			<div class="panel-group category-products" id="accordian">
				<!--category-productsr-->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								Sportswear
							</a>
						</h4>
					</div>
					<div id="sportswear" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><a href="#">Nike </a></li>
								<li><a href="#">Under Armour </a></li>
								<li><a href="#">Adidas </a></li>
								<li><a href="#">Puma</a></li>
								<li><a href="#">ASICS </a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
					</div>
					<div id="mens" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><a href="#">Fendi</a></li>
								<li><a href="#">Guess</a></li>
								<li><a href="#">Valentino</a></li>
								<li><a href="#">Dior</a></li>
								<li><a href="#">Versace</a></li>
								<li><a href="#">Armani</a></li>
								<li><a href="#">Prada</a></li>
								<li><a href="#">Dolce and Gabbana</a></li>
								<li><a href="#">Chanel</a></li>
								<li><a href="#">Gucci</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
					</div>
					<div id="womens" class="panel-collapse collapse">
						<div class="panel-body">
							<ul>
								<li><a href="#">Fendi</a></li>
								<li><a href="#">Guess</a></li>
								<li><a href="#">Valentino</a></li>
								<li><a href="#">Dior</a></li>
								<li><a href="#">Versace</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Kids</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Fashion</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Households</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Interiors</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Clothing</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Bags</a></h4>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="#">Shoes</a></h4>
					</div>
				</div>
			</div>
			<!--/category-products-->

			<div class="brands_products">
				<!--brands_products-->
				<h2>Brands</h2>
				<div class="brands-name">
					<ul class="nav nav-pills nav-stacked">
						<li>
							<a href="#"> <span class="pull-right">(50)</span>Acne</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(27)</span>Albiro</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(32)</span>Ronhill</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(5)</span>Oddmolly</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(9)</span>Boudestijn</a>
						</li>
						<li>
							<a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a>
						</li>
					</ul>
				</div>
			</div>
			<!--/brands_products-->

			<div class="price-range">
				<!--price-range-->
				<h2>Price Range</h2>
				<div class="well text-center">
					<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2">
					<br />
					<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
				</div>
			</div>
			<!--/price-range-->

			<div class="shipping text-center">
				<!--shipping-->
				<img src="{!! asset('public/assets/dashboard/images/home/shipping.jpg') !!}" alt="" />
			</div>
			<!--/shipping-->

		</div>
	</div>

	<div class="col-sm-9 padding-right">
		<div class="features_items">
			<!--features_items-->
			<h2 class="title text-center">Current Product Of This Supplier</h2> @foreach($products as $product)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img height="250px" weight="100%" src="{!! URL::to('uploads',($product->image != '')? $product->image:'no-image.jpg' ) !!}" alt="" />
							<h2>${{ $product->price}}</h2>
							<p>{{ $product->product_name}}</p>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Inquery</a>
						</div>
						<div class="product-overlay">
							<div class="overlay-content">
								<h2>${{ $product->price}}</h2>
								<p>{{ $product->product_name}}</p>
								<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Inquery</a>
							</div>
						</div>
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach



		</div>
		<!--features_items-->


		<div class="category-tab">
			<!--category-tab-->
			<div class="col-sm-12">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
					<li><a href="#blazers" data-toggle="tab">Blazers</a></li>
					<li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
					<li><a href="#kids" data-toggle="tab">Kids</a></li>
					<li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="tshirt">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="blazers">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="sunglass">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="kids">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane fade" id="poloshirt">
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
									<h2>$56</h2>
									<p>Easy Polo Black Edition</p>
									<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/category-tab-->

		<div class="recommended_items">
			<!--recommended_items-->
			<h2 class="title text-center">recommended items</h2>

			<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="item active">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
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
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
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
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
										<h2>$56</h2>
										<p>Easy Polo Black Edition</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="item">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
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
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
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
										<img src="{!! asset('public/assets/dashboard/images/home/product1.jpg') !!}" alt="" />
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
		</div>
		<!--/recommended_items-->

		<!-- Bootstrap trigger to open modal -->





	</div>
</div>



<br> @stop @section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$("#content div").hide(); // Initially hide all content
		$("#tabs li:first").attr("id", "current"); // Activate first tab
		$("#content div:first").fadeIn(); // Show first tab content

		$('#tabs a').click(function(e) {
			e.preventDefault();
			$("#content div").hide(); //Hide all content
			$("#tabs li").attr("id", ""); //Reset id's
			$(this).parent().attr("id", "current"); // Activate this
			$('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
		});
	})();
</script>
@stop