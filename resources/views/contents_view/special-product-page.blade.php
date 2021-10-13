@extends('fontend.master_dynamic')
@section('page_css')
<link rel="stylesheet" type="text/css" href="{!! asset('assets\fontend\bdtdccss\trade-assurance.css')!!}">

@endsection
@section('content')
</div>

<div class="container-fluid padding_0">
			<div class="stock-banner">
			<div class="container">
			<div class="row"> 
			<div class="col-md-3"></div>
			<div class="col-md-6" style="text-align: center">
				<h1 style="width: 480px;
    background: 0 0;
    font-size: 65px;
    font-size: 4.0625rem;
    margin-right: 30px;
    padding: 0;
    text-shadow: 0 0 20px rgba(0,0,0,.3);
    vertical-align: middle;font-family: norwesterregular,Arial,Helvetica,sans-serif;
    font-weight: 400;font-size: 3.8rem;color: #003c54;margin: 0;margin-top: 130px;text-align: center;">Kids Fashion</h1>
			</div>
			<div col-md-3>
				
			</div>
				
			</div>
				
			</div>
				
			</div>
</div>
 <nav  id="nav_bar" class=" cates util-clearfix navbar navbar-fixed-top">
  <div class="container-fluid">
    <div class="container">
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        @if($specials)
           @foreach($specials as $cat_name)
           @if($cat_name->bdtdcCategory)
          	<li class="cate-item util-left"><a href="#sp{{ $cat_name->bdtdcCategory->id }}">{{ $cat_name->bdtdcCategory->name }}</a></li>
          	@else

          	@endif
        
           @endforeach
         @endif
        </ul>
      </div>
    </div>
  </div>
</nav>  

@if($specials)
           @foreach($specials as $data)
           	@if($cat_name->bdtdcCategory)

<div class="container padding_0" id="sp{{ $data->bdtdcCategory->id ?? '' }}">
				<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
							<div class="module"><div class="tb-module sc-whosale-1111-title module-baby">
		                 <div   style="position:relative;top:;">

						</div>
						    <h2 class="title">{{ $data->bdtdcCategory->name ?? '' }}</h2>
						</div>
						</div>
				</div>
			<div class="col-sm-12 col-md-12 padding_0 product-col-4">

					@foreach($data->cat_product as $pro)
						<div class="col-sm-3 col-md-3 col-lg-3 padding_0">
									<div class="product-item util-left  " data-role="product-item" data-id="60376866355">
							           
							               <div style="z-index: 999999; margin-left: 15px;" class="item-market profit f-sp-flag-profit">
                                							<div class="item-market-value"></div>
                            							</div>
							            
							    		<div class="product-img" data-domdot="">
							    		@if($pro->select_product_images)
            <img itemprop="image" title="{{ $pro->pro_name_string->name ?? '' }}" style="visibility: visible;height: 220px" class="img-thumbnail product-bd-img" src="{{ URL::to((isset($pro->select_product_images)) ? $pro->select_product_images->image : 'no_image.jpg') }}" alt="{{ $pro->pro_name_string->name ?? '' }}" />

			@elseif($pro->select_product_image)
            <img itemprop="image" title="{{ $pro->pro_name_string->name ?? '' }}" style="visibility: visible;height: 220px" class="img-responsive  product-bd-img" src="{{ URL::to('uploads',$pro->select_product_image->image) }}" alt="{{ $pro->pro_name_string->name ?? '' }}" />

            
            @else
            <img itemprop="image" style="visibility: visible;height: 220px" title="No image" class="img-responsive  product-bd-img" src="{{ URL::to('uploads/no_image.jpg') }}" alt="bdtdc" />
            @endif
							    				<!-- <img class="product-bd-img " src="{!! asset('resources/assets/fontend/bdtdc-images/product-chair-1.jpg') !!}" style="visibility: visible;"> -->
							    			
							    		</div>
							    		<div>
							    			 <h3 class="product-name-stock">{{ $pro->pro_name_string->name ?? ''}}</h3>
							    		</div>
							               
							            <div class="sellingpoints">
							                <p class="product-points ellipsis" style="color: ;">
							                    MOQ:1 Piece
							                </p>
							                <p class="product-points  ellipsis" style="color: Green;"> 
							                </p>
							            
							            </div>

							    		<p class="product-price-st">US ${{ $pro->cat_pro_price->FOB ?? ''}}</p>
							    		@if($pro->pro_name_string)
							    		<a href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-',$pro->pro_name_string->name).'=232942253'.$pro->product_id) }}" class="product-button" style="border-radius: 3px !important;">
							    		  Shop Now
							    		</a>
							    		@else
							    		Not avalable
							    		@endif
							    	</div>
						</div>
					@endforeach

						
					
			</div>
	</div>

		@else
	@endif

@endforeach
@endif


	
<div class="container">
	
@stop
 @section('scripts')
        <script type="text/javascript">
        			$(document).ready(function() {
					  $(window).scroll(function () {
					      console.log($(window).scrollTop())
					    if ($(window).scrollTop() > 400) {
					      $('#nav_bar').addClass('navbar-fixed-top');
					    }
					    if ($(window).scrollTop() < 401) {
					      $('#nav_bar').removeClass('navbar-fixed-top');
					    }
					  });
					});

        			$(document).ready(function(){

                $('body').scrollspy({target: ".navbar", offset: 50});   

  				$("#myNavbar a").on('click', function(event) {
   				 if (this.hash !== "") {
      				event.preventDefault();
      				var hash = this.hash;
      				$('html, body').animate({
       				 scrollTop: $(hash).offset().top
      				}, 800, function(){
      		  window.location.hash = hash;
		      });
		    }  
		  });
		});
		// $(document).ready(function(){
		//     $(".cate-item a").hover(function(){
		//         $(this).css("background-color", "#b1563b");
		//         }, function(){
		//         $(this).css("background-color", "#000");
		//     });
		// });	
</script>
					
   @stop