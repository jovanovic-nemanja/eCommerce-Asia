@extends('fontend.master_dynamic')
@section('content')
<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="{{URL::to('/',null)}}" class="top-path-li-a" itemprop="url">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="{{URL::to('BuyerChannel/pages/meet_suppliers',13)  }}" class="top-path-li-a" itemprop="url">Meet Suppliers<i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="" class="top-path-li-a" itemprop="url">Buyer one stop service<i class="fa fa-angle-right top-path-icon"></i></a></li>
                        
                    </ul>
            </div>
    
  </div>
<div class="row padding_0" style="margin-bottom: 20px;">
			<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
				<div style="display:block; position:relative;">
				<h3 style="position: absolute;top: 15%; left: 3%; font-size: 32px; font-weight: 600; font-family: verdana; line-height: 45px;color: #255E98; float:left;text-transform: capitalize;">Enjoy your customized<br>One stop Sourcing Service Here</h3>
				  <img itemprop="image"  style="width: 100%;" src="{!! asset('assets/fontend/bdtdc-images/global-sourcing.jpg') !!}" alt="global sourcing" />
				 </div>
			</div>
		<div class="col-sm-12 col-md-12 col-lg-12 padding_0" style="background: #f6f6f6; border-bottom: 1px solid #ebebeb;">
						<div class="col-sm-3 col-md-3 col-lg-3">
								<span class="vip-text-span">Meet Pre-matched Suppliers</span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3" style="border-left: 1px solid #ebebeb;">
							<span class="vip-text-span" style="background-position: 0 -25px;">Prearrange Business Trip</span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3" style="border-left: 1px solid #ebebeb;">
							<span class="vip-text-span" style="background-position: 0 -50px;">Tour Factories</span>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3" style="border-left: 1px solid #ebebeb;">
							<span class="vip-text-span" style="background-position: 0 -75px;">Personal Trade Consultant</span>
						</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-12 padding_0" style="background: #fff;">
			<div style="padding: 5% 0; margin-left:0; margin-right:0; text-align:center">
            <a itemprop="url" href="{{URL::to('apply-sourceing-meeting',null)}}"><span class="btn btn-primary" style="padding-top:10px;border-radius: 5px !important; text-align:center;">Apply to meet suppliers</span></a>
        </div>
		</div>
	<div class="col-sm-12 col-md-12 col-lg-12 padding_0" style="background: #fff;">
				<div class="col-sm-6 col-md-6 col-lg-6" style="border-right:1px solid #999; border-right-width: 90%;">
					<div class="col-sm-12">
						 <img itemprop="image"  style="width:85%; display: block;" src="{!! asset('assets/fontend/bdtdc-images/consultant-team.jpg') !!}" alt="consultant team" />
					</div>
					<div class="col-sm-12 co-md-12">
						<ul class="vip-li" style="padding-bottom: 0;">
							<li class="vip-li-list"> Our team is a professionalized consultant team, aimed at providing worldwide buyers a complete ready sourcing service. </li>
							<li class="vip-li-list">We organize 20,000+ sourcing meeting each year to benefit buyers from around the world and help them match with the perfect supplier in Bangladesh.
</li>
							<li class="vip-li-list">Our sourcing service allows you to successfully find the right manufacturer and upgrade your list of suppliers.
</li>
						</ul>
						
					</div>
					
				</div>
				<div class="col-sm-6 col-md-6 col-lg-6">
						<div style="width: 100%; margin-left: 14%; display: block;">
						<div class="col-sm-12">
								<img itemprop="image"  style="width:85%; display: block;" src="{!! asset('assets/fontend/bdtdc-images/team-consulting.jpg') !!}" alt="team consulting" />
						</div>
						<div class="col-sm-12 co-md-12">
								<ul class="vip-li">
									<li class="vip-li-list">Upon receiving your request for sourcing service, we will immediately start the process by confirming your product requirement with GMC</li>
									<li class="vip-li-list">The manufacturers who can fulfill your demand will be presented to you during the sourcing meetings arranged depending on your schedule. </li>
								</ul>
						
					</div>
					</div>
				</div>
	</div>
	  <div  class="col-sm-12 col-md-12 col-lg-12 padding_0" style="background: #fff;">
	  				<div class="col-sm-12 col-md-12">
	  					<img itemprop="image"  style="width:98%; display: block; padding-left: 15px; padding-top: 35px;" src="{!! asset('assets/fontend/bdtdc-images/features-and-benefits.jpg') !!}" alt="features and benefits" />
	  					<div class="ldd-bgcolor3">
	  						Our Advantages
	  					</div>
	  					<div class="ldd-bgcolor2">
	  						Quick Feedback
	  					</div>
	  					<div class="ldd-bgcolor1">
	  						Accurate Matching
	  					</div>
	  					 <div class="ldd-bgcolor0">
	  						Customized Service
	  					</div> 
	  				</div>
						
					<div class="col-sm-12 col-md-12">
	  						<div class="col-sm-6 col-md-6">
	  							<h4 style="margin-top: 6%; font-size: 20px;color: #000; font-weight: 400;">Precise Matching
</h4>
	  								<ul class="vip-li" style="padding-top: 0px;">
	  									<li class="vip-li-list">Our team of professional souring consultants of various industries will send references of your products and their details to the GMC manufacturers.
</li>
	  									<li class="vip-li-list">We are expertise in organizing sourcing meetings and presenting sourcing information to global buyers.  </li>
	  								</ul>
	  						</div>
	  						<div class="col-sm-6 col-md-6">
	  								<h4 style="margin-top: 6%; font-size: 20px;color: #000; font-weight: 400;">Swift Feedback</h4>
	  								<ul class="vip-li"  style="padding-top: 0px; padding-top: 0;">
	  									<li class="vip-li-list">We can organize sourcing meetings within a week after applications have been received.</li>
	  									<li class="vip-li-list">You have the freedom to place orders, differentiate among the manufacturers capabilities, or look into quotations and catalogues during the meeting.
</li>
	  								</ul>
	  						</div>
	  				</div>
	  				<div class="col-sm-12 col-md-12 col-lg-12">
	  				<div style="padding: 0; padding-left: 30px;">
	  							<h4 style="font-size: 20px;color: #000; font-weight: 400;">Special Service</h4>
	  							<ul class="vip-li"  style="padding-top: 0px;">
	  								<li class="vip-li-list">We organize both off-spot and on-spot meetings to match various needs of global buyers</li>
	  								<li class="vip-li-list">The complete package of sourcing solutions containing sourcing meeting, online meeting, booth visit, factory tour etc. is made to fit your whole year’s sourcing plan.
</li>
	  							</ul>
	  				</div>
	  			</div>
	  </div>
				
</div>

@stop