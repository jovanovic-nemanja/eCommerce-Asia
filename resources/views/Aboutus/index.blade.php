@extends('fontend.about-us-topbar')
	@section('content')
</div>
<section>
	<div class="desktop">
		@include('Aboutus.bdtdc-about-us-header')
	</div>
	<div class="mobil-phone">

	@include('Aboutus.about-us-top-m-menu')
	</div>
</section>
<section>
<div class="container-fluid abt-top-bg">
	<div class="container">
	<div class="abtus-container">
	<div id="content-slider">
    	<div id="abt-slider">
        	<div id="mask">
            <ul style="padding: 0;">
           	<li id="abt-first" class="firstanimation">
            <a href="#">
            	<h1 class="abut-headline">yyyy MANUFACTURING - CONNECT GLOBALLY</h1>
            <!-- <img src="{!! asset('assets/fontend/images/about-us-top-slider-1.png') !!}" alt="Cougar"/> -->
            </a>
            
            </li>

            <li id="abt-second" class="secondanimation">
            <a href="#">
            <h1 class="abut-headline">ENVIRONMENTAL FRIENDLY MANUFACTURING</h1>
           <!--  <img src="{!! asset('assets/fontend/images/about-us-top-slider-3.jpg') !!}" alt="Lions"/> -->
            </a>
            
            </li>
            
            <li id="abt-third" class="thirdanimation">
            <a href="#">
            <h1 class="abut-headline" style="padding-left: 26px;">EMPOWERING ENTREPRENEURS - ENHANCING BUSINESSES</h1>
            <!-- <img src="{!! asset('assets/fontend/images/about-us-top-slider-4.jpg') !!}" alt="Snowalker"/> -->
            </a>
           
            </li>
                        
            <li id="abt-fourth" class="fourthanimation">
            <a href="#">
            <h1 class="abut-headline">Complete online Business platform</h1>
            <!-- <img src="{!! asset('assets/fontend/images/about-us-bg.jpg') !!}" alt="Howling"/> -->
            </a>
          
            </li>
                        
            <li id="abt-fifth" class="fifthanimation">
            <a href="#">
             <h1 class="abut-headline">Over 3,500+ happy suppliers and counting</h1>
            <!-- <img src="{!! asset('assets/fontend/images/about-us-top-slider-2.jpg') !!}" alt="Sunbathing"/> -->
            </a>
           
            </li>
            </ul>
            </div>
            <div class="progress-bar"></div>
        </div>
    </div>
  </div>
  </div>
  </div>
</section>
<!-- <section>
	<div id="captioned-gallery">
	<figure class="slider">
		<figure>
			<img src="{!! asset('assets/fontend/images/about-us-top-slider-1.png') !!}" alt="greenfacade">
			<figcaption>Dhaka Bangladesh</figcaption>
		</figure>
		<figure>
			<img src="{!! asset('assets/fontend/images/about-us-top-slider-2.jpg') !!}" alt="green-side">
			<figcaption>Florida America</figcaption>
		</figure>
		<figure>
			<img src="{!! asset('assets/fontend/images/about-us-top-slider-3.jpg') !!}" alt="research-team">
			<figcaption>Maple Ridge, Canada</figcaption>
		</figure>
		<figure>
			<img src="{!! asset('assets/fontend/images/about-us-top-slider-4.jpg') !!}" alt="green-side">
			<figcaption>Bonham Strand West Hong Kong</figcaption>
		</figure>
		<figure>
			<img src="{!! asset('assets/fontend/images/about-us-top-slider-5.jpg') !!}" alt="green-side">
			<figcaption>Business Bangladesh</figcaption>
		</figure>
	</figure>
</div>
</section> -->
<section>
<div class="container-fluid padding_0" style="background:#FFFFFF;">
  <div class="row padding_0 abt-top">
  		<div class="col-md-7 col-lg-7 col-sm-7 padding_0 sust-manufct">
  			<div class="screen">
  				<section class="main-slider">
			  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
			    <div class="carousel-inner">
			      <div class="item active">
			        <img class="img-responsive" style="padding:30px;width: 100%;" src="{!! asset('assets/fontend/images/greenfacade.jpg') !!}" alt="">
			        <div class="carousel-caption">
			         
			        </div><!-- /.carousel-caption -->
			      </div><!-- /Slide1 -->

			      <!-- Slide 2 -->
			      <div class="item ">
			        <img class="img-responsive" style="padding:30px;width: 100%;" src="{!! asset('assets/fontend/images/green-factory.jpg') !!}" alt="">
			        <div class="carousel-caption">
			          
			        </div><!-- /.carousel-caption -->
			      </div><!-- /Slide2 -->

			      <!-- Slide 3 -->
			      <div class="item ">
			        <img class="img-responsive" style="padding:30px; width: 100%;" src="{!! asset('assets/fontend/images/green-planing.jpg') !!}" alt="">
			        <div class="carousel-caption">
			         
			        </div><!-- /.carousel-caption -->
			      </div><!-- /Slide3 -->

			      <!-- Slide 4 -->
			      <div class="item ">
			        <img class="img-responsive" style="padding:30px; width: 100%;" src="{!! asset('assets/fontend/images/green-side.jpg') !!}" alt="">
			        <div class="carousel-caption">
			          
			        </div><!-- /.carousel-caption -->
			      </div><!-- /Slide4 -->
			       <!-- Slide 5 -->
			      <div class="item ">
			        <img class="img-responsive" style="padding:30px; width: 100%;" src="{!! asset('assets/fontend/images/research-team.jpg') !!}" alt="">
			        <div class="carousel-caption">
			         
			        </div><!-- /.carousel-caption -->
			      </div><!-- /Slide5 -->
			      

			    </div><!-- /.carousel-inner -->


			    <!-- Controls -->
			    <!-- /.control-box -->


			  </div><!-- /#myCarousel -->
			</section><!-- /.main-slider -->
  			</div>
  		</div>
  		<div class="col-md-5 col-lg-5 col-sm-5 padding_0 sust-row ">
  				<div>
  					<h1 class="abt-h1" style="padding-left: 26px;">SUSTAINABLE MANUFACTURING - CONNECT GLOBALLY</h1>
  				</div>
  				<ul class="feature-list">
  					<li><a href="{!!URL::to('BuyerChannel/pages/sustainable_manufacturing',7)!!}">
  					We Promote Sustainable Manufacturing</a></li>
  					<li><a href="{!!URL::to('tradeshow')!!}">Exhibitions and Conferences</a></li>
  					<li><a href="{!!URL::to('promoting/bangladesh')!!}">Promoting Bangladesh Services</a></li>
  					<li><a href="{!!URL::to('promoting/bangladesh/product')!!}">Promoting Bangladesh Products</a></li>
  					<li><a href="{!!URL::to('business/matching')!!}">Business Matching </a></li>
  					<li><a href="{!!URL::to('marketing/bangladesh')!!}">Marketing Bangladesh Brands to the World  </a></li>
  					<li><a href="{!!URL::to('global/partnership')!!}">BDTDC’s Global Partnerships </a></li>
  				</ul>
  		</div>
 </div>
</div>
</section>
<section>
<div class="container-fluid padding_0 abt-top" style="background:#FFFAFA">
<div class="container padding_0">
   <div class="row padding_0 ">
 		<div class="col-md-5 col-lg-5 " style="padding-bottom: 40px;">
 		  <div style="width: 100%; display: flex;">
 			 <div>
 				<div style="padding-left: 20px;">
 				 <h1 class="abt-h1">ENVIRONMENTAL FRIENDLY MANUFACTURING</h1>
 				 <img style="width: 50%; margin-top: 70px;" src="{!! asset('assets/fontend/images/think-asia-bangladeshg.jpg') !!}"  alt="think asia bangladeshg">
 				</div>
 				 <ul class="feature-list">
  					<li><a href="{!!URL::to('BuyerChannel/pages/sustainable_manufacturing,7')!!}">
  					Eco-minded Business Practice </a></li>
  					<li><a href="{!!URL::to('how-to/business-bangladesh')!!}">How to Do Businesses in Bangladesh </a></li>
  					<li><a href="{!!URL::to('promoting/bangladesh')!!}">Bangladesh Services  </a></li>
  					<li><a href="{!!URL::to('bangladesh/advantage')!!}">Bangladesh Advantages  </a></li>
  				</ul>
 				</div>
 				</div>
 		</div>
 		<div class="col-md-7 col-lg-7 ">
 				<div class="row padding_0">
 				  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/21-february.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>21 February</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/National-memorial.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>National Memorial</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/sundorbon.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>National Mangrove Forest</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				</div>
				<div class="row padding_0">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/Saint_Martin_Island.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Saint_Martin Island</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/beach.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Cox's Bazar Sea Beach</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/Chimbuk hill Bangladesh.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Chimbuk hill Bangladesh</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
			</div>
			<div class="row padding_0">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/tea-garden_3803.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Srimongal-Sylhet,Bangladesh</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/Pohela-Boishakh.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Culture of Bangladesh</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 padding_0">
                      <div class="hovereffect">
			           <img class="img-responsive" src="{!! asset('assets/fontend/aboutus-images/Dhaka-University.jpg') !!}" alt="">
			           <div class="overlay">
			           <h2>Dhaka University</h2>
			           <a class="info" href="#">link here</a>
			           </div>
			    	</div>
				</div>
				</div>
 		</div>
 </div>
</div>
</div>
</section>
 <section>
 	<div class="container-fluid padding_0" style="background: #F5FFFA;">
 		<div class="row padding_0 abt-top">
 			<div class="col-md-6 padding_0 emp-busine">
 				<div style="padding: 0; margin: 0; display: block;">
            			<div class="img-box-gallery" style="padding: 0; width:100%; padding-left: 30px;">
                            <style type="text/css">
                            .my-indicators li.active {
                             }
                                .carousel.fade {
                                          opacity: 1;
                                        }
                                        .carousel.fade .item {
                                          transition: opacity ease-out .7s;
                                          left: 0;
                                          opacity: 0; /* hide all slides */
                                          top: 0;
                                          position: absolute;
                                          width: 100%;
                                          display: block;
                                        }
                                        .carousel.fade .item:first-child {
                                          top: auto;
                                          opacity: 1; /* show first slide */
                                          position: relative;
                                        }
                                        .carousel.fade .item.active {
                                          opacity: 1;
                                         
                                        }
                     </style>
         <div id="my_carousel" class="carousel fade" data-ride="carousel">
                                  
                  <div class="carousel-inner">
                  <!--  <div class="item active">
                           <div style="min-height: 600px; background: #3399ff; padding: 30px 20px;">
                           <div class="h2-head-title" style="font-size: 23px;">THE COUNCIL</div>
                           	    <p class="head-ppp">We are governed by a 7-member Council of Bangladesh business leader, Sr. Business Executives and University professors from USA and Canada. It plans and supervises BDTDC's global operations, services and promotional activities.</p>
                           	    <p class="head-ppp">Mr Kazi Ahmed, a Canadian, by born in Bangladesh is the first bdtdc Chairman since the Council's establishment in 2015. He assumed the Chairmanship of the Bangladesh Trade Development Council (bdtdc) on 1 February 2015. The Managing Director, Mr. Richard Schaffer, who heads the Executive, is responsible to council for bdtdc's worldwide operations.</p>
                           	    <p class="head-ppp">The Council is made up of the following members:</p>

                      <table style="width: 100%;">
					      <tbody>
					          <tr style="border-bottom: 1px solid #fff !important; height: 60px;">
					             <td><a data-toggle="modal" data-target="#myModal_kazi" href="#" class="overview" style="float: left;color: #fff; font-weight: normal;">Kazi Ahmed</a></td>
					              <td><a  href="#" style="color: #fff; text-decoration: none; cursor: pointer;">Chairman</a></td>
					           </tr>
					          <tr style="border-bottom: 1px solid #fff; height: 60px;border-bottom: 1px solid #fff !important;">
					                  <td><a href="" class="overview" style="float: left;color: #fff !important; font-weight: normal;">Richard Schaffer</a></td>
					                    <td style="color: #fff; text-decoration: none; cursor: pointer;">Managing Director</td>
					                   </tr>
					                  <tr style="border-bottom: 1px solid #fff; height: 60px;border-bottom: 1px solid #fff !important;">
					                        <td><a href="" class="overview"  style="float: left;color: #fff !important; font-weight: normal;">Lou Ferries</a> </td>
					                         <td style="color: #fff; text-decoration: none; cursor: pointer;">Executive Director</td>
					                    </tr>
					             </tbody>
           				     </table>
                         </div>
                        </div> -->
                          <div class="item">
                           <div style="min-height: 600px; background: #3399ff; padding: 30px 20px;">
                           <div class="h2-head-title" style="font-size: 23px;">OUR MISSION</div>
                           	    <p class="head-ppp">Empowering Green Sustainable Manufacturing Globally</p>
                           	    <p class="head-ppp">Bangladesh Trade Development Council (BDTDC) is a leading Eco-minded b2b marketplace and a primary facilitator of trade within Greater Bangladesh and south Asia. Explore new markets and create global business opportunities for Bangladesh SMEs.</p>
                           	    <p class="head-ppp">The core business facilitates trade between Bangladesh, South Asia and the world using technologies such as online marketplace, print and digital magazines, sourcing research reports, sourcing private events, and trade shows.</p>
                           	    <p class="head-ppp">Find the latest products from reliable suppliers & manufacturers on BDTDC. It is the leading b2b platform connecting Bangladeshi suppliers & manufacturers to global retailers, for those who pay attention to corporate social responsibility and the brands that patronizes by taking care of the planet.</p>
                           	    <p class="head-ppp">BDTDC’s mission is to create opportunities for Bangladesh companies. We focus on delivering value by promoting trade leads in goods and services, while connecting the world’s small and medium-sized enterprises (SMEs) through Bangladesh’s online business platform.</p>
                           	    <p>
  								<a target="_blank" href="#" style="color: #fff;">bdtdc Service Pledge</a></p>
                             </div>
                           </div>
                                 
                         </div>
                            
                        </div> 
            	</div>
        						

        		</div>
 			</div>
 			<div class="col-md-6 padding_0">
 				<div class="emp-busi">
	  				<div>
	  					<h1 class="abt-h1" style="padding-left: 26px;">EMPOWERING ENTREPRENEURS - ENHANCING BUSINESSES</h1>
	  				</div>
	  				<ul class="feature-list">
	  					<li><a href="{!!URL::to('research')!!}">Bdtdc Research
	  					</a></li>
	  					<li><a href="{!!URL::to('start/programe')!!}">Start-Up Programme </a></li>
	  					<li><a href="{!!URL::to('world-sme/expo')!!}">World SME Expo </a></li>
	  					<li><a href="{!!URL::to('entrepreneur/day')!!}">Entrepreneur Day </a></li>
	  					<li><a href="{!!URL::to('portal/support-program')!!}">SME/ Start-up Portal</a></li>
	  					<li><a href="{!!URL::to('bdtdc/sme-center')!!}">BDTDC SME Center</a></li>
	  					<li><a href="{!!URL::to('business/advisory')!!}">Business Advisory </a></li>
	  				<li><a href="{!!URL::to('tradeshow')!!}">Seminars & Workshop </a></li>
	  					<li><a href="{!!URL::to('bdtdc/database-listing')!!}">BDTDC Databank Listings </a></li>
	  				</ul>
 				</div>
 			</div>
 		</div>
 	</div>
 </section>
 <section>
 		<div class="container-fluid padding_0 abt-top"  style="background:#F8F8FF;">
 				<div class="row padding_0">
 				<div class="header-content" style="padding-bottom: 60px;">
 						<h2>Complete online Business platform</h2>
 						<p>Enhance your business connect with Bangladesh Trade Development Councill.</p>
 				</div>
 			</div>
 		<div class="container">
 			<div class="row padding_0">
 				<div class="">
                         <div style="background: #081f29; padding: 30px 20px; margin-bottom: 10%;">
                           <div class="h2-head-title" style="font-size: 23px;">THE COUNCIL</div>
                           	    <p class="head-ppp">We are governed by a 7-member Council of Bangladesh business leader, Sr. Business Executives and University professors from USA and Canada. It plans and supervises BDTDC's global operations, services and promotional activities.</p>
                           	    <p class="head-ppp">Mr Kazi Ahmed, a Canadian, by born in Bangladesh is the first bdtdc Chairman since the Council's establishment in 2015. He assumed the Chairmanship of the Bangladesh Trade Development Council (bdtdc) on 1 February 2015. The Managing Director, Mr. Richard Schaffer, who heads the Executive, is responsible to council for bdtdc's worldwide operations.</p>
                           	    <p class="head-ppp">The Council is made up of the following members:</p>

                      <table style="width: 100%;">
					      <tbody>
					          <tr style="border-bottom: 1px solid #fff !important; height: 60px;">
					             <td><a data-toggle="modal" data-target="#myModal_kazi" href="#" class="overview" style="float: left;color: #fff; font-weight: normal;">Kazi Ahmed</a></td>
					              <td><a data-toggle="modal" data-target="#myModal_kazi"  href="#" style="color: #fff; text-decoration: none; cursor: pointer;">Chairman</a></td>
					           </tr>
					          <tr style="border-bottom: 1px solid #fff; height: 60px;border-bottom: 1px solid #fff !important;">
					                  <td><a href="" class="overview" style="float: left;color: #fff !important; font-weight: normal;">Richard Schaffer</a></td>
					                    <td style="color: #fff; text-decoration: none; cursor: pointer;">Managing Director</td>
					                   </tr>
					                  <tr style="border-bottom: 1px solid #fff; height: 60px;border-bottom: 1px solid #fff !important;">
					                        <td><a href="" class="overview"  style="float: left;color: #fff !important; font-weight: normal;">Lou Ferries</a> </td>
					                         <td style="color: #fff; text-decoration: none; cursor: pointer;">Executive Director</td>
					                    </tr>
					             </tbody>
           				     </table>
                         </div>
                        </div>
 			</div>
 		</div>
 <div class="row  padding_0">
 						<div class="col-md-6" style="padding: 0 5rem 0 0;">
 								<div class="promo-bt">
 									<h2 style="text-align: center;">The Management</h2>
 								</div>
 								<div class="jcarousel_mng">
 								  <div class="corporate-mng-box">
 								  	<div  data-toggle="modal" data-target="#myModal_kazi">
 									<img style="height: 164px; width: 164px; margin-top: 10px;" class="img-circle" src="{!! asset('assets/fontend/aboutus-images/kazi-ahammed.png') !!}">
 									<div class="degint-ttle">
 									<span class="mang-name"> Kazi Ahmed </span>
 									<span class="mng-title">Chairman</span>
 									</div>
 								</div>
 
 								</div>
 								<div class="richrd">
	 								 <div class="mang-cor">
	 									<img class="img-circle" style="height: 164px; width: 164px;" src="{!! asset('assets/fontend/aboutus-images/reshard.png') !!}">
	 									<div class="degint-ttle">
		 									<span class="mang-name">  Richard Schaffer</span>
		 									<span class="mng-title">Managing Director</span>
		 									</div>
	 								</div>
	 								<div class="mang-cor" style="margin-top: 10px;">
	 									<img class="img-circle" src="{!! asset('assets/fontend/aboutus-images/Ferries.jpg') !!}">
	 									<div class="degint-ttle">
			 									<span class="mang-name"> Lou Ferries</span>
			 									<span class="mng-title">Executive Director</span>
			 									</div>
	 								</div>
 								</div>
 							</div>
 						</div>
 						<div class="col-md-6">
 								<video class="intro-video" autoplay>
								<source src="{!! asset('assets/fontend/images/bdtdc-about.mp4') !!}" type="video/webm">
								</video>
 						</div>
 				</div>
 		</div>
 </section>
<section>
<div class="container-fluid padding_0 abt-top" style="background: #fff;">
		<div class="container padding_0">
		<div class="row">
	        <div class="header-content">
 						<h2>Corporate Structure</h2>
 			</div>
 		</div>
 	<div class="row abr-margin">
 	<div style="text-align: center; margin: 0 auto;">
 				
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('tradeshow') !!}" class="corporate-title-"> Exhibitions</a></span>
 		</div>
 	<div class="link-circle"><span class="frame"><a href="{!! URL::to('') !!}" class="corporate-title-">Bangladesh & International Relations</a></span>
 	</div>
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('promoting/bangladesh') !!}" class="corporate-title-">Product Promotion</a></span>
 		</div>
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('') !!}" class="corporate-title-">Publications and E-Commerce</a></span>
 		</div>
 	</div>
 	</div>
 <div class="row abr-margin">
 	<div style="text-align: center; margin: 0 auto;">
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('promoting/bangladesh') !!}" class="corporate-title-">Service Promotion</a></span></div>
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('') !!}" class="corporate-title-">Communication and Public Affairs</a></span></div>
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('marketing/bangladesh') !!}" class="corporate-title-">Marketing and Customer Service</a></span></div>
 		<div class="link-circle"><span class="frame"><a href="{!! URL::to('research') !!}" class="corporate-title-">Research</a></span></div>
 	</div>
	</div>
	</div>
</div>
</section>
<section>
<div class="container-fluid padding_0 abt-top" style="background: #F5F5F5;">
			<div class="container padding_0">
				<div class="header-content" style="padding: 20px 0px;">
 						<h2>Career Openings here</h2>
 			    </div>
				<div id="container">
					  <ul class="showcase">
					    <li class="thumb1"> <a href="{!! URL::to('web-developer/laravel') !!}"><img src="{!! asset('assets/fontend/aboutus-images/laravel-developer.jpg') !!}" width="500" height="374" alt="web3canvas">
					      <h3>Andriod Developers<i>+</i></h3>
					      <p>Are you enthusiastic about Android, gadgets and constructing great products? If so, we want to hear from you! This may be your dream job..</p>
					      </a> </li>
					    <li class="thumb2"> <a href="{!! URL::to('executive') !!}" target="_blank"><img src="{!! asset('assets/fontend/aboutus-images/business-handshake.png') !!}" width="500" height="374" alt="web3canvas">
					      <h3>Marketing Executive<i>+</i></h3>
					      <p>Make this your dream job as you build-up and deal activities and materials to back sales as well as utilize marketing automation tools and strategies..</p>
					      </a> </li>
					    <li class="thumb3"> <a href="{!! URL::to('content/writer') !!}"><img src="{!! asset('assets/fontend/aboutus-images/content-writing-service.jpg') !!}" width="500" height="374" alt="web3canvas">
					      <h3>Contents Writer<i>+</i></h3>
					      <p>Grab this exciting opportunity to create engaging, targeted ghostwritten content on behalf of BDTDC's clients across all mediums and channels...</p>
					      </a> </li>
					  </ul>
					</div>
			</div>
</div>
</section>
<section>
<div class="container-fluid abt-top" style="padding-left: 0;padding-right: 0;">
<div class="get_response">
<div class="container">

<div class="row padding_0">
		<div class="col-sm-12" style=" margin-top:1%;margin-bottom:3%;">
			<p  class="get_1">Over 3,500+ happy suppliers and counting</p>
            <p class="get_2">Don’t take our word for it — see what all the buzz is about!</p>
       </div>
</div>
<div class="row padding_0" style="background: #fff;">
		<div class="col-sm-5 col-md-5 padding_0">
			<div>
			<img style="width: 100%;" src="{!! asset('assets/fontend/aboutus-images/b2b_service.jpg') !!}">
			</div>
		</div>
		<div class="col-sm-7 col-md-7">
				<div>
					<h2 style="color: #000;padding: 0px 15px 15px;">New B2B service on the block</h2>
					<p class="nws-cont">Start-up aims to generate $300m business for Bangladeshi manufacturers within a year</p>
					<p class="ntr">Syed Ashfaqul Haque</p>
					<p>A start-up company is ready to take off, eyeing to rake in business well over $300 million for Bangladeshi manufacturers within a year. 	</p>
					<p>Kazi Ahmed, owner of the world's first patented markers for making perfect rainbows without gaps between colours,</p>
					<span><a href="http://www.thedailystar.net/business/new-b2b-service-the-block-1302046" target="_blank" style="text-decoration: none;cursor: pointer;padding: 5px 10px;"> More details</a></span>
				</div>
		</div>
</div>
   <div class="row padding_0">
		<p class="get_1">Companies that trust BDTDC</p>
	</div>
	<div class="row padding_0" style="background: #fff;">
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/FreeTek-International.png') !!}" alt="FreeTek International">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Metro-Goldwyn-Mayer.png') !!}" alt="Metro Goldwyn Mayer">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Yinsaviny.png') !!}" alt="Yinsaviny">
		</div>
		<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Guangzhou-Sincere.png') !!}" alt="Guangzhou Sincere">
		</div>
	</div>
	<div class="row padding_0" style="background: #fff;">
	 <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/ORICO-Technology.png') !!}" alt="ORICO Technology">
		</div>
	 <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Shenzhen-Yoobao-Technology.png') !!}" alt="Shenzhen Yoobao Technology">
		</div>
	<div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Weihai-Noeby-Fishing.png') !!}" alt="Weihai Noeby Fishing">
		</div>
	    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6">
			<img class="buyer-lst-bd" itemprop="image"  src="{!! asset('assets/fontend/images/Shenzhen-Shenhuo.png') !!}" alt="Shenzhen Shenhuo">
		</div>
			</div>
	     </div>
	</div>
	</div>
</section>
<section>
<div class="container-fluid padding_0 abt-top">
 <div class="fullwidth-user" id="signup-user">
        <div class="container padding_0">
        	<div class="row padding_0">
        	<div class="col-sm-8 col-md-8 col-lg-8">
            <h3 class="signup-h3" style="width: 100%; padding-right: 20px; padding-bottom: 30px; padding-left: 20px;">Join our giant marketplace to outstand the crowd and win over others in the competition. See

			what happens next!</h3>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4" style="margin-top: 30px;">
				<div class="signup-h3" style="width: 100%; position: relative;font-size: 1em;">
            	<a   href="{{ URL::to('join') }}" class=" strt-btn" style="border-radius: 5px !important">Get started for free</a>
            	</div>
            </div>
        </div>
        </div>
    
   </div> 
  </div>    
  </section>
<section>
<div class="container-fluid abt-top" style="padding-bottom: 0;background: #081f29;padding-right: 0;padding-left: 0;">
	<div class="follow-us bx visible" style="padding-left: 0; padding-right: 0;">
	<div class="container">
		<h2>Follow us for the latest Business news!</h2>
	</div>
	<div class="container">
				<div class="col-sm-8 col-md-8 col-lg-8">
						<div class="table-responsive" style="border:0 none !important;">          
						  <table class="table address-td">
						    <tbody class="address-td">
						      <tr>
						        <th>By phone:</th><td>880.170.888.4440</td>
						        </tr>
						        <tr>
						        <th>By email:</th><td>info@bdtdc.com</td>
						        </tr>
						        <tr>
						        <th valign="top">In person</th><td>Bangladesh Trade Development Council<br>
									House 818, Floor 02, Road 12,<br>
									Avenue 06, Mirpur DOHS, Dhaka 1216<br>
									Sat. - Thur. 09:00 am - 6:00 pm<br>
									Closed on Friday and Public Holidays
								</td>
								</tr>
								<tr>
						         <th>USA:</th><td>
						        	Ph: 1.305.684.7893<br>
						        	PO Box 420676,<br>
									Summerland Key, Florida,<br>
									33042, USA
						        </td>
						        </tr>
						        <tr>
						        <th>CANADA:</th>
							        <td>
							        PO Box 32107<br>
									Westgate PO, Maple Ridge,<br>
									BC, V2X 0G9
									</td>
								</tr>
								<tr>
							        <th>Singapore  :</th>
							        <td>10 Marina Blvd Marina Bay <br>Financial Centre Tower 2 Level 39,<br> Singapore 018983
									</td>
						      </tr>
						    </tbody>
						  </table>
						 </div>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 padding_0">
					<div>
				        <h5 style="padding: 20px 0; font-size: 20px; color:#fff;padding-left: 10px; clear: both; width: 100%;">Follow Us</h5>
				        <ul class="social-bdtdc" style="padding: 0; min-height: 80px;">

				          <li>
				            <a  href="https://www.youtube.com/c/Bdtdc" target="_blank"><i class="fa fa-youtube" aria-hidden="true" style="font-size: 40px; color:#fff;"></i></a>
				          </li>
				          <li><a href="https://www.facebook.com/bdtdc/" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true" style="font-size: 40px; color:#fff;"></i></a></li>
				          <li><a  href="https://plus.google.com/+Bdtdc" target="_blank" ><i class="fa fa-google-plus" aria-hidden="true" style="font-size: 40px; color:#fff;"></i></a></li>
				          <li><a  href="https://www.linkedin.com/company/bdtdc" target="_blank"><i class="fa fa-linkedin" aria-hidden="true" style="font-size: 40px; color:#fff;"></i></a></li>
				          <li><a  href="https://twitter.com/bdtdc" target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="font-size: 40px; color:#fff;"></i></a></li>
				          
				        </ul>
				        <div class="logoShow" style="margin-top:28%;">
				          <img style="width: 160px;background: #fff; padding: 10px;opacity: .5;" class="carOrg" src="{!! asset('images/logo-white.png') !!}" alt="Bangladesh Trade Development Council"> 
				        </div>
				      </div>
				</div>
			</div>
			</div>	
	</div>
</section>
<div class="modal fade" id="myModal_kazi" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         	<div class="row">
         			<div class="col-sm-3">
         				<img src="{!! asset('assets/fontend/aboutus-images/kazi-ahammed.png') !!}" alt="kazi-ahammed">
         			</div>
         			<div class="col--sm-9">
         					<div class="scrollbar-abt">
                                   <p class="designation-p"> Born in his native Bangladesh, Ahmed Kazi, a polyglot speaks Bengali, Chinese, Spanish, Arabic, Japanese and English languages. He completed his secondary andhigher education from Comilla  Gouripur in 1984, He gained admission to study Physics at the University of Dhaka which stimulated and spurred his desire for innovation and invention. He holds a Bachelor of an  Associate of Arts and Sciences (A.A.S.) from Institute for the Study of International Development (ISID) McGill University, Canada in 1991.</p>

<p class="designation-p">His life story is summed in his own words "I usually don't believe in luck. I believe luck will be on my side only if I continue to work harder,".Born into a poor family with many siblings, his parents could barely afford the basic necessities of life, including  food, clothing, shelter and school fees. Living from hand to mouth, he learned the stoic fortitude early in life by engaging in numerous child labour activities as well as embarking in teaching his classmates and others to raise stipends which enabled him beat the poverty cycle. Steep reminiscences of his mothers strangulating toils in the rice fields and his father's mere meager stipends from various factories in order to eke out a living for the household still send chills down his spines; and a constant re-minder of his very humble and diminishing background.</p>

<p class="designation-p">In 1986, by sheer dint of fate, he traveled to the Kingdom of Saudi Arabia where he began training and working as a telex operator which was unfortunately short- lived by the introduction of facsimile that swept the technological era at the time. Determined to pursue his golden fleece, he took up the job of gardening for sustenance and livelihood. This singular act propelled his innate and inexhaustible creative mind as he collected myriads of tools, equipment and machines from junk-fields. His extraordinary ideas blossomed to the innovation of an oven that saves over 40% in energy in cooking. This was to become springboard to his attendant future as he became a household name in Saudi media who promoted his distinct skills.</p>
<p class="designation-p">It was no wonder that in the winter of 1989, Kazi , who was gaining fame was invited by the National Research Council of Canada, the prime technological research body to come and demonstrate this new invention in Canada. His arrival in Vancouver, British Columbia did not yield the jolting results that accompanied the initial euphoria and in stead he ended up as a street entertainer in Vancouver; toiling and tantalizing his audience while making ends meet.</p>
<p class="designation-p">
  Ahmed Kazi's indomitable spirit and zeal engineered his creativity and he turned his artistic flair for colours into very enterprising prospects; he started painting in his rainbow colours and dreamed of a harnessing future for young children who would magnify their dreams through ex-traordinary painting with brilliant ease through the invention, manufacturing and publishing of the world's first patented color blend RainbowBrush® markers and books series.
</p>
<p class="designation-p">
RainbowBrush® with 7 product proprietorship patented worldwide with incredible 3D rainbow effects has successfully reached the world in about 27 countries, now trusted and sought-after brand of hands-on educational arts and crafts product line for children, at home and school. It is noteworthy to emphasize that these products are top on the selling shelves at the Toys R Us in-Hong Kong and China with Li &amp; Fung  , Walmart, airport kiosks, shopping malls  and other ma-jor departmental stores. These novelty products are very popular with children on account of its distinctive features of allowing painting different colours from one brush without using several at the same time.
</p>
<p class="designation-p">
  http://www.youtube.com/watch?v=mtmkHh9Vnlo<br>
http://www.youtube.com/watch?v=w-FUq05wWaw and<br>
http://www.youtube.com/watch?v=RtzoazKZ4Bc<br>

</p>
<p class="designation-p">
Ahmed Kazi is a dogged defender of the environment. Believing that the earth is like a safe egg that has to be treated with the utmost of care, passion and love, and by so doing make it a better place for all and the yet unborn. This desire has engaged his intervention through the establish-ment of the Bangladesh Trade and Development Council (BDTDC) which is at the forefront of ensuring the preservation, prevention and mitigation of the environment and strongly believes that the world will be a better place for all inhabitants if we all become vigilant. Serving as a platform to creating a One-Stop-Shop for investors (Bangladesh manufacturers and suppliers) to participate fully in the production, manufacturing and transaction process and ensure compliance with strict environmental standards in the factors of production.
</p>
<p class="designation-p">
  Ahmed Kazi is committed to propelling, promoting and pursuing an environmentally friendly situation through education and empowerment of all to entrench the dictates of the UN goals for sustainable development and in the production of goods for international consumption. That in-deed is the point of departure from old endangering habits to new and enduring sustainability for Bangladesh. His intended long lasting wish is to bring the highest profitable orders from USA, Canada and EU to Bangladesh manufactures who are willing to comply and participate in envi-ronmentally friendly practices, that hitherto benefited mostly China and Vietnam. It is hoped that with these intervention policies, Bangladesh will become more competitive, and perhaps gain comparative advantages in the production of garments, shoes, frozen shrimps, software, leather, tea and jute products.
</p>
<p class="designation-p">
Ahmed kazi is married with children and makes Miami, Florida, USA and Vancouver, BC, Canada his homes.
</p>
                        </div>
         			</div>
         	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


@stop
@section('scripts')
<script type="text/javascript">


	 Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });
  $(document).ready(function() {

            $('div').hover(
				
               function () {
                  $(this).css({"background-color":"red"});
               }, 
				
               function () {
                  $(this).css({"background-color":"blue"});
               }
            );
				
         });
	 $('#myModal_kazi').on('hide.bs.modal', function(e) {
		$(this).removeData('bs.modal');
	});
</script>
@stop