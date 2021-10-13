@extends('fontend.master3')
	@section('content')
<div class="row padding_0">
			<div class="col-lg-3" style="padding:0;padding-right: 10px; padding-top: 15px">
					<div>
						<p class="bdtdc-sme-p">General Information</p>
					</div>
					<div class="filter-body">
							<ul id="format-filterlist" class="filter-list">
								<li class="" id="Exhibition"><span class="hover">+</span>About SME Centere</li>
								<li class="" id="Conference &amp; Forum"><span class="hover">+</span>Layout plan</li>
								<li class=" filter-specified" id="Seminar &amp; Workshop"><span class="hover">x</span>Virtual tour</li>
								<li class="" id="Trade Mission"><span class="hover">+</span>Opening hours</li>
								<li class="" id="Hong Kong Pavilion"><span class="hover">+</span>User Regulations</li>
								<li class="" id="Others"><span class="hover">+</span>Contact us</li>				
							</ul>
				
					</div>
					<div>
						<p class="bdtdc-sme-p">Information Resources</p>
					</div>
					<div class="filter-body">
							<ul id="format-filterlist" class="filter-list">
								<li class="" id="Exhibition"><span class="hover">+</span>Electronic databases</li>
								<li class="" id="Conference &amp; Forum"><span class="hover">+</span>Digital Library</li>
								<li class=" filter-specified" id="Seminar &amp; Workshop"><span class="hover">x</span>Reference Collection</li>
								<li class="" id="Trade Mission"><span class="hover">+</span>BDTC Publication</li>
								<li class="" id="Hong Kong Pavilion"><span class="hover">+</span>Online Catelogue</li>
								<li class="" id="Others"><span class="hover">+</span>Contact us</li>				
							</ul>
				
					</div>
					<div>
						<p class="bdtdc-sme-p">Activities</p>
					</div>
					<div class="filter-body">
							<ul id="format-filterlist" class="filter-list">
								<li class="" id="Exhibition"><span class="hover">+</span>Business advisory service</li>
								<li class="" id="Conference &amp; Forum"><span class="hover">+</span>Centere activities</li>
										
							</ul>
				
					</div>

					<div class="bd-title" style="background: #cac7c2;"><h3 class="arrow-down">ORGANISER</h3></div>
					<div style="width: 100%; display: block; overflow: hidden;">
						 <ul style="padding: 0;">
								<li id="bdtdc" style="width: 50%; background-color:#706965; float: left;  cursor: pointer; "><span class="bdtdc-span">Facilities</span></li>
							<li class="" id="all" style="width: 50%; background-color:#DFD9D5; float: left; cursor: pointer; "><span class="bdtdc-span">Related Links</span></li>
						</ul>
			</div>


				
			</div>
	<div class="col-lg-9" style="padding:0;padding-top: 15px">
			<div class="col-sm-12 padding_0" style="padding-top: 30px;">
	        <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" style="border-radius:10px !important; border:0 none;"  class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;" ></li>
                <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;"></li>
                <li data-target="#myCarousel" data-slide-to="3" style="border-radius:10px !important; border:0 none;" ></li>
             </ol>
	         <div class="carousel-inner" role="listbox">
                <div class="item active">
                 <img style="max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('resources/assets/fontend/bdtdc-images/bangladesh-business1.JPG') !!}" alt="bangladesh means business">
				         <div class="carousel-caption" style="width: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1; margin-left: 38%;">
				          <h1 style="color: #fff;text-align: center;padding: 5px 0;background: rgba(58,53,50,0.8); font-weight: bold; font-size: 36px !important;">BuyerSeller Bangladesh International Diamond, Gem & Pearl Show</h1>
				        
				        </div>
                </div>

            
              <div class="item">
                  <img style="max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('resources/assets/fontend/bdtdc-images/bangladesh-business2.JPG') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				          <h1 style="color: #fff;text-align: center;padding: 5px 0;background: rgba(58,53,50,0.8); font-weight: bold; font-size: 36px !important;">BuyerSeller Bangladesh International Jewellery Show</h1>
				          
				        </div>
                </div>
            
                <div class="item">
                  <img style="max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('resources/assets/fontend/bdtdc-images/bangladesh-business3.JPG') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				          <h1 style="color: #fff;text-align: center;padding: 5px 0;background: rgba(58,53,50,0.8); font-weight: bold; font-size: 36px !important;">BuyerSeller Bangladesh International Lighting Fair (Spring Edition)</h1>
				         
				        </div>
                </div>
            
                <div class="item">
                  <img style="max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('resources/assets/fontend/bdtdc-images/bangladesh-business4.JPG') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				          <h1 style="color: #fff;text-align: center;padding: 5px 0;background: rgba(58,53,50,0.8); font-weight: bold;font-size: 36px !important;">BuyerSeller Bangladesh Electronics Fair (Spring Edition)</h1>
				        </div>
                </div> 
            </div>
             <!-- <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
               <!-- <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> -->
                <span class="sr-only">Previous</span>
            
           <!-- <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <!--  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> -->
                <span class="sr-only">Next</span>
            
            </div>
        </div>			
        			<div class="col-sm-12 padding_0">
        				<div style="padding-top: 15px;">
        					<img style="width: 100%; display: block; height: 40px;"  src="{!! asset('resources/assets/fontend/bdtdc-images/1285667269526_upcoming_main.jpg') !!}" alt="">
        				</div>
        			</div>
        			<div class="col-sm-12 padding_0">
        						<table class="table table-striped">
								    <thead>
								      <tr>
								        <th>Date</th>
								        <th>Topic</th>
								       
								      </tr>
								    </thead>
								    <tbody>
								 <tr>
							        <td>22 Mar 2016</td>
							<td><a href="#" class="table-sme-title">Tips on Starting and Running a Successful Online Business – Case Sharing</a></td>
							      
							      </tr>
							      <tr>
							        <td>23 Mar 2016</td>
							        <td><a href="#" class="table-sme-title">Driving Marketing Results with Big Data (in English)</a></td>
							      
							      </tr>
							      <tr>
							        <td>24 Mar 2016</td>
							        <td><a href="#" class="table-sme-title">Cyber Security & Safety Measures for Businesses</a></td>
							      
							      </tr>
							    </tbody>
							  </table>
        				
        			</div>
        			<div class="col-sm-12 padding_0">
        				<div style="padding: 20px 0;">
        					<img style="width: 100%; display: block; height: 40px;"  src="{!! asset('resources/assets/fontend/bdtdc-images/1289897437882_WhatNew_main.gif') !!}" alt="">
        				</div>
        				
        			</div>

						<div class="col-sm-12 padding_0" style="border-bottom: dotted #ddd; padding-bottom: 15px;" >
								<div class="col-sm-2" style="padding: 0;">
								<a href="#">
									<img  class="bd-busi-img" src="{!! asset('resources/assets/fontend/bdtdc-images/sme-center-video.jpg') !!}" alt="">
									</a>
								</div>
								<div class="col-sm-10">
											
											</a><h3 class="bdtdc-tit" style="padding-top: 15px; font-size: 17px; color: #999;">  Highlight of Entrepreneur Workshop - "Hong Kong Import and Export Procedures"</h3>
											
											
									
								</div>
							
						</div>
						<div class="col-sm-12 padding_0" style="border-bottom: dotted #ddd; padding-bottom: 15px;" >
								<div class="col-sm-2" style="padding: 0;">
								<a href="#">
									<img  class="bd-busi-img" src="{!! asset('resources/assets/fontend/bdtdc-images/sme-center-video.jpg') !!}" alt="">
									</a>
								</div>
								<div class="col-sm-10">
											
											<h3 class="bdtdc-tit" style="padding-top: 15px; font-size: 17px; color: #999;">Highlight of SME Management Workshop - "Skills in Risk Management"</h3>
											
											
									
								</div>
							
						</div>
						<div class="col-sm-12 padding_0" style="border-bottom: dotted #ddd; padding-bottom: 15px;" >
								<div class="col-sm-2" style="padding: 0;">
								<a href="#">
									<img  class="bd-busi-img" src="{!! asset('resources/assets/fontend/bdtdc-images/sme-center-video.jpg') !!}" alt="">
									</a>
								</div>
								<div class="col-sm-10">
											
											<h3 class="bdtdc-tit" style="padding-top: 15px; font-size: 17px; color: #999;">Highlight of SME Management Workshop -
  "Management by Ennea Psychology - Tips & Skills"</h3>
											
											
									
								</div>
							
						</div>
						
						<div class="col-sm-12 padding_0" style="border-bottom: dotted #ddd; padding-bottom: 15px;" >
								<div class="col-sm-2" style="padding: 0;">
								<a href="#">
									<img  class="bd-busi-img" src="{!! asset('resources/assets/fontend/bdtdc-images/sme-smeiner.jpg') !!}" alt="">
									</a>
								</div>
								<div class="col-sm-10">
											<h3 class="bdtdc-tit" style="padding-top: 15px; font-size: 17px; color: #999;">
Helping Asia Companies Grow: The BuyerSeller SME Centre</h3>
											<p style="font-size: 14px;color: #7c7c7c; padding-top: 20px; width: 100%; font-weight: bold;">The newly-renovated BuyerSeller SME Centre is a resource and service facility that provides practical information and free professional advice for business starters and small to medium-sized enterprises (SMEs). This helpful centre also offers comprehensive export-marketing services to businesses.</p>
									
								</div>
							
						</div>
						<div class="col-sm-12 padding_0" style="border-bottom: dotted #ddd; padding-bottom: 15px;" >
								<div class="col-sm-2" style="padding: 0;">
								<a href="#">
									<!-- <img  class="bd-busi-img" src="{!! asset('resources/assets/fontend/bdtdc-images/sme-smeiner.jpg" alt=""> -->
									</a>
								</div>
								<div class="col-sm-10">
											<h3 class="bdtdc-tit" style="padding-top: 15px; font-size: 17px; color: #999;">BuyerSeller SME Centre opens for business</h3>
											<p style="font-size: 14px;color: #7c7c7c; padding-top: 20px; width: 100%; font-weight: bold;">The SME Centre is a centralised resource and interactive service centre for SMEs, and is equipped with up-to-date trade information, electronic databases and business facilities for your use. Welcome to experience for yourself. </p>
									
								</div>
							
						</div>
						
				
			</div>

	
</div>




@stop
@section('scripts')
<script type="text/javascript">
		 

</script>
@stop