@extends('fontend.master_dynamic')
@section('content')
<br>
	<div class="row">
		<div class="col-lg-12 col-md-12 padding_0">
			<ul  style="margin-left: -2%;float: left;"><li style="float: left">
			<a itemprop="url" href="{{ URL::to('/',null) }}" style="color: #000">
			Home  &nbsp;</a>
			<i class="fa fa-angle-right"></i>
			
			<a itemprop="url" href="{{ URL::to('sitemap',null) }}" style="color: #000">
			 &nbsp;Sitemap</a></li></ul>
			
		</div>
	</div>
	
<div class="row" style="margin-bottom:2%;background-color:#fff !important;">
	
	<div class="col-sm-12" style="margin-top:2%;margin-bottom: 3px;border-bottom:1px solid #DDD;padding-bottom:14px;">
		@foreach($sitemap as $data)
		<div class="col-sm-6" style="">
			<p style="color: #333;font-size: 14px;font-weight: 700;margin-left:-2.6%;">				
					{{$data->name}}				
			</p>
			
            @foreach($data->sub_category as $s)
				<ul>
					<li style="margin-left: -11%;font-size: 12px;font-family: Arial;line-height: 18px;">
						<a href="{{$s->slug}}" style="color: #06C;">{{$s->name}}</a>
					</li>

				</ul>
			@endforeach
		</div>
		@endforeach
		
	</div>

	<div class="col-sm-12">
		<p style="color: #333;font-size: 14px;font-weight: 700;margin-top: 2%;">Popular search Products</p>
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('selected-suppliers/bangladesh-products/18')}}" style="color: #039;">Bangladesh products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-products/pages?c=18')}}" style="color: #039;">Bangladesh export products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">Bangladesh clothing manufacturers</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">Bangladesh clothes</a>
			</p>
		</div>
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh garment products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh garments exporters</a></p>
		</div>
		
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh apparel manufacturers</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="" style="color: #039;">Bangladesh woven clothing</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Garment-Accessories-products/18/25')}}" style="color: #039;">Bangladesh knitwear</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh Readymade garments manufacturers</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Agriculture---Food/18/6')}}" style="color: #039;">Bangladesh baby food</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh T shirts</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">apparel manufacturers in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">apparel manufacturer in bangladesh</a>
			</p>
		</div>
	
</div><div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-footwear') }}" style="color: #039;">Bangladesh footwear</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-shoe-manufacturers') }}" style="color: #039;">Bangladesh shoe manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-wholesale-clothing') }}" style="color: #039;">Bangladesh wholesale clothing</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-wholesale-products') }}" style="color: #039;">Bangladesh wholesale products</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh shirts</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Work-Wear-products/18/491')}}" style="color: #039;">Bangladesh woven clothing</a>
			</p>
		</div>
		
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Seafood-products/18/83')}}" style="color: #039;">Bangladesh seafood</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-jeans/18/254')}}" style="color: #039;">Bangladesh jeans</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-animal-feed/18/70')}}" style="color: #039;">Bangladesh animal feed</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-sweater/18/479')}}" style="color: #039;">Bangladesh sweater</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('underwear-bangladesh/18/21')}}" style="color: #039;">Bangladesh underwear</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-maternity-clothing/18/248')}}" style="color: #039;">Bangladesh maternity clothing</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-home-appliance/18/490')}}" style="color: #039;">Bangladesh home appliance</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh womens apparel</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh women fashion</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-fabric" style="color: #039;">Bangladesh fabric</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-cooking-tools" style="color: #039;">Bangladesh cooking tools</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-wholesale" style="color: #039;">Bangladesh wholesale</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-fruit-products" style="color: #039;">Bangladesh fruit products</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh wholesale apparel</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-home-appliance/18/490')}}" style="color: #039;">Bangladesh home-textile</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-fiber" style="color: #039;">Bangladesh fiber</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-paper-products/18/499')}}" style="color: #039;">Bangladesh paper products</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Handbags-products/18/228')}}" style="color: #039;">Bangladesh handbag</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Meat---Poultry--products/18/81')}}" style="color: #039;">Bangladesh meat</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Fresh-Vegetables--products/18/69')}}" style="color: #039;">Bangladesh vegetable</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Health-Care-Supplements-products/18/104')}}" style="color: #039;">Bangladesh health care suppliments</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Pharmaceutical-products/18/113')}}" style="color: #039;">Bangladesh pharmaceutical products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Skin-Care-products/18/357')}}" style="color: #039;">Bangladesh skin care products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Jewellery-products/18/493')}}" style="color: #039;">Bangladesh jewelry</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-yarn" style="color: #039;">Bangladesh yarn</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-socks" style="color: #039;">Bangladesh socks</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-leggings" style="color: #039;">Bangladesh leggings</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Ethnic-Clothing-/18/244')}}" style="color: #039;">Bangldesh ethnic clothing</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-textile-machinery-suppliers" style="color: #039;">Bangldesh textile machinery suppliers</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-handicrafts" style="color: #039;">Bangladesh handicrafts</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-leather-belt" style="color: #039;">Bangladesh leather belt</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-frozen-food" style="color: #039;">Bangladesh frozen food</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-textile-machinery-suppliers" style="color: #039;">Bangladesh sportswear</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-socks" style="color: #039;">Handbag manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Garment-Accessories/18/25')}}" style="color: #039;">Bangladesh garment accessories</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Women---s-Clothing-products/18/16')}}" style="color: #039;">Bangladesh women dress</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Children---s-Clothing-products/18/14')}}" style="color: #039;">Bangladesh kids wear</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Baby---s-Clothing--products/18/19')}}" style="color: #039;">Bangladesh baby clothing</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Bangladesh leather products </a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Bangladesh leather</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Leather goods in Bangladesh</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Leather products in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Leather in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Leather-Products/18/2')}}" style="color: #039;">Leather in Bangladesh</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Bag-products/18/26')}}" style="color: #039;">Bangladesh leather bags</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Tea---Coffee-products/18/85')}}" style="color: #039;">Bangladesh tea</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Tea---Coffee-products/18/85')}}" style="color: #039;">Tea in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Fish-products/18/494')}}" style="color: #039;">Bangladesh fish</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Fish-products/18/494')}}" style="color: #039;">Bangladesh river fish</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Furniture---Decoration/18/7')}}" style="color: #039;">Bangladesh furniture</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Furniture---Decoration/18/7')}}" style="color: #039;">Furniture in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Furniture---Decoration/18/7')}}" style="color: #039;">Best furniture brands in Bangladesh</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Bamboo-Furniture--products/18/333')}}" style="color: #039;">Bangladesh bamboo furniture</a>
			</p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Agriculture---Food/18/6')}}" style="color: #039;">Bangladesh jute</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Agriculture---Food/18/6')}}" style="color: #039;">Bangladesh jute products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-Agriculture---Food/18/6')}}" style="color: #039;">Bangladesh food</a>
			</p>
		</div>
		
</div>





	<div class="col-sm-12">
		<p style="color: #333;font-size: 14px;font-weight: 700;margin-top: 2%;">Popular search suppliers</p>
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-suppliers')}}" style="color: #039;">Bangladesh suppliers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-exporters/pages?c=18')}}" style="color: #039;">Bangladesh exporters</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-manufactuers/pages?c=18')}}" style="color: #039;">Bangladesh manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-products/pages?c=18')}}" style="color: #039;">Bangladesh products suppliers</a></p>
		</div>
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-exporters/pages?c=18')}}" style="color: #039;">Bangladesh clothing suppliers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh garments</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Garments in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh garments suppliers</a></p>
		</div>
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh garments manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-exporters/pages?c=18')}}" style="color: #039;">Bangladeshi exporters</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">Bangladesh clothing manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">Bangladesh clothes</a></p>
		</div>
		

	</div>
	

<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Bangladesh RMG</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://buyerseller.asia/bangladesh-textile-products" style="color: #039;">Bangladesh textile products</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">clothes from Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">Garment exporters in Bangladesh</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-garments')}}" style="color: #039;">garment manufacturers in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-clothing/18/1')}}" style="color: #039;">clothing manufacturers in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-trade')}}" style="color: #039;">Bangladesh trade</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-trade')}}" style="color: #039;">Trade in Bangladesh</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-shoe-manufacturers') }}" style="color: #039;">Bangladesh shoe manufacturers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-wholesale-clothing')}}" style="color: #039;">Bangladesh wholesale clothing</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh shirts suppliers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-apparel/18/1')}}" style="color: #039;">Bangladesh shirts manufacturers</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('bangladesh-jeans/18/254')}}" style="color: #039;">Bangladesh jeans</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('Fresh-Vegetables--products/18/69')}}" style="color: #039;">Bangladesh vegetable suppliers</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-frozen-food')}}" style="color: #039;">Bangladesh frozen food suppliers</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-clothing')}}" style="color: #039;">leather goods suppliers</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('')}}" style="color: #039;">shoe manufacturers in Bangladesh</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="" style="color: #039;">Bangladesh leather goods suppliers</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-frozen-food')}}" style="color: #039;">Bangladesh leather</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-clothing')}}" style="color: #039;">tea in Bangladesh</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-jeans')}}" style="color: #039;">Bangladesh fish</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="" style="color: #039;">Bangladesh furniture</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-frozen-food')}}" style="color: #039;">Bangladesh bamboo furniture</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-clothing')}}" style="color: #039;">Bangladesh jute</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-jeans')}}" style="color: #039;">Bangladesh food</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="" style="color: #039;">Bangladesh baby food</a>
			</p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-frozen-food')}}" style="color: #039;">Bangladesh seafood</a></p>
		</div>
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-clothing')}}" style="color: #039;">Bangladesh shrimp</a></p>
		</div>
</div>
<div class="col-sm-12" style="margin-top:1.5%;border-bottom:1px solid #DDD;">
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('bangladesh-jeans')}}" style="color: #039;">Bangladesh knitwear</a></p>
		</div>
		
		
</div>









	<div class="col-sm-12">
		<p style="color: #333;font-size: 14px;font-weight: 700;margin-top: 2%;">Showroom:</p>
		<p style="color: #000;font-size: 14px;">Browse Alphabetically:</p>
		
			
				<script type="text/javascript">
					var btns = "";
					var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					var letterArray = letters.split("");
					for(var i = 0; i < 26; i++){
					    var letter = letterArray.shift();
					    btns += '<button class="mybtns" onclick="showroom(\''+letter+'\');">'+letter+'</button>';
					}
					function showroom(let){

					    window.location = "sitemap/showroom/"+let;
					}
				</script>
				
					<script> document.write(btns); </script>
				
		
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		@foreach($po as $p)
		
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('showroom/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$p))[0]) }}" style="color: #039;">{{$p}}</a></p>
		</div>


		@endforeach
	</div>
		
	
	<div class="col-sm-12" style="margin-top:2%;">
		<p style="color: #333;font-size: 14px;font-weight: 700;margin-top: 1.5%;">Suppliers:</p>
		<p style="color: #000;font-size: 14px;">Browse Alphabetically:</p>
		
				<script type="text/javascript">
					var btns = "";
					var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					var letterArray = letters.split("");
					for(var i = 0; i < 26; i++){
					    var letter = letterArray.shift();
					    btns += '<button class="mybtns" onclick="supplier(\''+letter+'\');">'+letter+'</button>';
					}
					function supplier(let){

					    window.location = "sitemap/supplier/"+let;
					}
				</script>
				
					<script> document.write(btns); </script>
				
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;">
		
		@foreach($main as $m)
		
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{ URL::to('/')}}/search-product/search==suppliers+..+key=={{$m}}+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0" style="color: #039;">{{substr($m,0,20)}}</a></p>
					<!-- <p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="http://absolutelybest.bdtdc.com/search-product/search==suppliers+..+key=={{$m}}+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0" style="color: #039;">{{substr($m,0,20)}}<a></p> -->
		</div>


		@endforeach
	</div>
	<div class="col-sm-12" style="margin-top:2%;padding-bottom:1%;">
		<p style="color: #333;font-size: 14px;font-weight: 700;margin-top: 1.5%;">Wholesalers:</p>
		<p style="color: #000;font-size: 14px;">Browse Alphabetically:</p>
		
				<script type="text/javascript">
					var btns = "";
					var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					var letterArray = letters.split("");
					for(var i = 0; i < 26; i++){
					    var letter = letterArray.shift();
					    btns += '<button class="mybtns" onclick="wholesale(\''+letter+'\');">'+letter+'</button>';
					}
					function wholesale(let){

					    window.location = "sitemap/wholesale/"+let;
					}
				</script>
				
					<script> document.write(btns); </script>
				
	</div>
	<div class="col-sm-12" style="margin-top:1.5%;padding-bottom:2%;">
		@foreach($wholesale as $w)
		
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('wholesale/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$w->name))[0]) }}" style="color: #039;">{{$w->name}}</a></p>
		</div>


		@endforeach
	</div>


</div>


@stop


@section('scripts')
<script type="text/javascript">


 
</script>

@stop