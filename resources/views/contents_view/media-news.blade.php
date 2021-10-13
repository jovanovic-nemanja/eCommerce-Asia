@extends('fontend.master_dynamic')
@section('page_css')
	<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/media-room-style.css') !!}" rel="stylesheet">
	<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/product-wholesale.css') !!}" rel="stylesheet">
@endsection
	@section('content')


<div class="row padding_0">
		<div class="col-sm-12" style="padding: 0; min-height: 60px; padding-top: 15px;">
				<ul class="nav nav-tab nav-pills trade-show-ul" style="background:none;border-bottom: 1px solid #dae2ed; margin-left: 0;" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
								<li style="padding-top: 11px;font-size: 15px;font-weight: 600;"><i class="fa fa-home home-icon industy" style="vertical-align: inherit;"></i></li>
								<li class="" style="margin-left: 10px;"><a itemprop="url" itemprop="url"  class="padding_0" href="{{URL::to('selected/supplier-products',null)}}" target="_blank" data-toggle="tab" aria-expanded="false" style="background-color: #f5f5f5;color: #5b9bd1;">Quality Suppliers</a></li>
								<li class=""><a itemprop="url" itemprop="url"  style="font-size: 13px;" class="padding_0" href="{{URL::to('tradeshow',null)}}" data-toggle="tab" aria-expanded="false">BuyerSeller Events</a></li>
							<li class=""><a itemprop="url" itemprop="url"   style="font-size: 13px;" class="padding_0" href="{!! URL::to('research',null) !!}" target="_blank">BuyerSeller Research</a></li>
								<li class=""><a itemprop="url" itemprop="url"  style="font-size: 13px;" class="padding_0" href="{!! URL::to('services',null) !!}"  target="_blank">Service Highlight</a></li>
								
							
								   
							</ul>
		</div>
	
</div>
<div class="row padding_0" style="background-color: #fff;">
    @include('contents_view.about-media-menu')
	<div class="col-sm-7" style="margin-top: 15px;">
				<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
						<img itemprop="image" style="height:350px;width:100%; width:100%;"  src="{!! asset('assets/daily.jpg') !!}" class="girl img-responsive" alt="">
				</div>
			<div class="col-sm-12 col-md-12 col-lg-12 padding_0">

								
							<p class="nation-h3" style="padding-top: 4%;font-size: 27px;">New B2B service on the block</p>
							<p class="nation-h3" style="text-align:justify;"><i>Start-up aims to generate $300m business for Bangladeshi manufacturers within a year</i></p>
							<p class="portal-content-p" style="text-align:justify;">
									<span style="color:#000; font-weight: bold;">DHAKA,The Daily Star, October 21, 2016 –</span> A start-up company is ready to take off, eyeing to rake in business well over $300 million for Bangladeshi manufacturers within a year. .
							</p>
							<p class="portal-content-p" style="text-align:justify;">Talking with The Daily Star, the global businessman has expected his business-to-business service, similar to Chinese billionaire Jack Ma's alibaba.com, to create quite a stir among manufacturers, mostly struggling to connect with right buyers abroad. </p>
			<p class="portal-content-p" style="text-align:justify;">
				Also known as e-commerce by netizens, B2B facilitates exchange of products, services or information among businesses, rather than between businesses and consumers.
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				At least about a dozen e-business firms, including a Bangladeshi version of alibaba.com, are already active in Bangladesh. Even the Ma's alibaba.com, which presently serves around 430 million annually, declares to capture Bangladesh market. With $34 billion already in his pocket, the Chinese tycoon plans to serve 2 billion consumers around the world, empower 10 million profitable businesses and create 100 million jobs in 20 years.  
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				Kazi, who with a simple innovation of rainbow paintbrush has sent kids across the globe on a colour-frenzy, sees prospect plentiful for his B2B service.
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				"I'm very confident. It's designed to click in a big way. Businesses in Bangladesh can count on my track record of doing business abroad for decades," he said, adding that his first venture in his homeland is going to open up jobs for at least 200 IT graduates initially.
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				The 50-year-old, who lives mostly in the US and Canada, indeed has a terrific business record. The 50 art products of the RainbowBrush (brand name of his products) are being sold in 27 countries through leading retailers like Walmart, Target, K-mart, Sears, Costco, Toys R Us and Carrefour, netting well over $20m in revenue a year. 
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				Though he has a good business going globally, Kazi has felt all along to help Bangladesh businesses bloom globally.  
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				"When I came back to Bangladesh (after 28 years) two years back, I realised a very crucial link was missing in manufacturing business. Manufacturers are not being able to connect with potential buyers, and middlemen are actually minting the money," he said. "My B2B service is going to give manufacturers the critical link."
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				Buyers will be able to connect with suppliers of their choices directly on his BDTDC platform, negotiate price and then get going with the business. His organisation will, however, screen both suppliers and customers before having them enlisted on the marketplace in order to cut down business risk.
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				Membership will be free for all, but like all other B2B services paid members will get the priority. The BDTDC will charge half of what alibaba is charging now ($1,000-$3,000 for membership for whole year).  "To start with, I'm going to focus on five main products -- garment, footwear, frozen food, software and indigenous handicrafts," said Kazi, who thrives on his global business network and experiences with RainbowBrush.
			</p>
			<p class="portal-content-p" style="text-align:justify;">
				"I'm in a position to bring in a lot of government software contracts from Japan and North America."
			</p>
			<p class="portal-content-p" style="float: initial; clear: both;text-align:justify;">
				Eldest son of poor parents in Comilla, Kazi grew up in extreme hardship and worked really hard to his way up in the west. He passed days without proper meals but stayed focused on rewriting his own fate that went through numerous twists and turns. As a child he worked.
			</p>
			<p class="portal-content-p" style="float: initial; clear: both;text-align:justify;">
				As a student he taught others. As a lodging teacher he earned meals. It was a long struggle, but it was a story of inspiration for many others like Kazi.
			</p>
			<p class="portal-content-p" style="float: initial; clear: both;text-align:justify;">
				Like all other self-made men, Kazi also hardly believes in luck. "I believe luck will be on my side only if I continue to work harder with BuyerSeller," said the man with multiple citizenships.
			</p>
			<p class="portal-content-p" style="float: initial;clear: both;text-align:justify;">
				Media Links: <a href="http://www.thedailystar.net/business/new-b2b-service-the-block-1302046">http://www.thedailystar.net/business/new-b2b-service-the-block-1302046</a>
				<br><br>

				<button type="button" class="btn btn-primary btn-md" style="border-radius:3px !important;"><a href="https://www.facebook.com/bdtdc/" target="_blank" style="color:#fff;">BuyerSeller Facebook</a></button>
				<button type="button" class="btn btn-primary btn-md" style="border-radius:3px !important;"><a href="https://twitter.com/bdtdc" target="_blank" style="color:#fff;">BuyerSeller Twitter</a></button>
				<button type="button" class="btn btn-primary btn-md" style="border-radius:3px !important;"><a href="http://www.bdtdc.com/" target="_blank" style="color:#fff;">BuyerSeller Website</a></button>
				<button type="button" class="btn btn-primary btn-md" style="border-radius:3px !important;"><a href="" target="_blank" style="color:#fff;">About BuyerSeller</a></button>

				<br>
				<br>

				Contact Information:<br>
				Phone:  880-175-168-1223<br>
				Email:  info@buyerseller.asia 

			</p>
			
		</div>
				
@include('contents_view.media-room-top-stories')
<!-- end slider -->	
		
	</div>
	<div class="col-sm-3">
		<div class="frMainTit">Events</div>
	</div>
</div>
<br>
<div id="understand-email"></div>
@stop
@section('scripts')
<script type="text/javascript"></script>
@stop