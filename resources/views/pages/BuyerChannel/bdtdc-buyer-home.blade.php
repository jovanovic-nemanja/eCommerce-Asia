@extends('fontend.master3')
	@section('content')
	
</div>
	<div class="container-fluid">
					<div class="row padding_0" style="margin-top: 38px;">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" style="border-radius:10px !important; border:0 none;" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1" style="border-radius:10px !important; border:0 none;" ></li>
                <li data-target="#myCarousel" data-slide-to="2" style="border-radius:10px !important; border:0 none;" ></li>
                <li data-target="#myCarousel" data-slide-to="3" style="border-radius:10px !important; border:0 none;" ></li>
             </ol>
	         <div class="carousel-inner" role="listbox">
                <div class="item active">
                 <img style="height:350px;max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/buyer-po-banner1.jpg') !!}" alt="bangladesh means business">
				         <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1; margin-left: 38%;">
				         
				        
				        </div>
                </div>

            
              <div class="item">
                  <img style="height:350px;max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/buyer-po-banner2.jpg') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				        
				          
				        </div>
                </div>
            
                <div class="item">
                  <img style="height:350px;max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/buyer-po-banner3.jpg') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 24%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				          
				         
				        </div>
                </div>
            
                <div class="item">
                  <img style="height:350px;max-height:350px;width:100%;margin-left: -1px;" src="{!! asset('assets/fontend/bdtdc-images/buyer-po-banner4.jpg') !!}" alt="bangladesh means business">
                   <div class="carousel-caption" style="width: 24%;margin-top: 117%;left: 44%;padding: 10px 18px;top: 8.2%;right: 0 !important;bottom: inherit;zoom: 1;margin-left: 38%;">
				          
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
	</div>
<div class="container">
		<div class="row padding_0" style="background-color: #fff; margin-bottom: 25px; padding-bottom: 3%;">
				<div class="col-sm-12 col-md-12 col-lg-12" style=" border-bottom: 1px solid #ccc;">
							<h4 class="glbao-h4">How to trade on Bdtdc.com?</h4>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					 <ul class="step-ul" style="padding-top: 4%; padding-bottom: 4%;">
					 		<li class="step-ul-li" style="background: #F2F2F2;">
					 			<span class="step-span">Step 1</span>
					 			<div style="width: 100%; display: block;padding: 0;margin: 0;">
					 				<img class="prot-img" src="{!! asset('assets/fontend/bdtdc-images/protect-1.jpg') !!}" alt="buyer-order">
					 			</div>
					 			<div class="buyer-cont">
					 				Buyer Places Order
					 			</div>
					 			<i class="fa fa-play flow"></i>
					 		</li>
					 		<li class="step-ul-li" style="background: #EFF6FE;">
					 			<span class="step-span">Step 2</span>
					 			<div style="width: 100%; display: block;padding: 0;margin: 0;">
					 				<img class="prot-img" src="{!! asset('assets/fontend/bdtdc-images/protect-2.jpg') !!}" alt="buyer-order">
					 			</div>
					 			<div class="buyer-cont">
					 				Buyer pays to Bdtdc
					 			</div>
					 			<i class="fa fa-play flow"></i>
					 		</li>
					 		<li class="step-ul-li" style="background: #F2F2F2;">
					 			<span class="step-span">Step 3</span>
					 			<div style="width: 100%; display: block;padding: 0;margin: 0;">
					 				<img  class="prot-img" src="{!! asset('assets/fontend/bdtdc-images/protect-1.jpg') !!}" alt="buyer-order">
					 			</div>
					 			<div class="buyer-cont">
					 				Manufacturer Fulfill Order
					 			</div>
					 			<i class="fa fa-play flow"></i>
					 		</li>
					 		<li class="step-ul-li" style="background: #F2F2F2;">
					 			<span class="step-span">Step 4</span>
					 			<div style="width: 100%; display: block;padding: 0;margin: 0;">
					 				<img class="prot-img" src="{!! asset('assets/fontend/bdtdc-images/protect-1.jpg') !!}" alt="buyer-order">
					 			</div>
					 			<div class="buyer-cont">
					 				Buyer Receives Order
					 			</div>
					 			<i class="fa fa-play flow"></i>
					 		</li>
					 		<li class="step-ul-li" style="background: #EFF6FE;">
					 			<span class="step-span">Step 5</span>
					 			<div style="width: 100%; display: block;padding: 0;margin: 0;">
					 				<img class="prot-img" src="{!! asset('assets/fontend/bdtdc-images/protect-2.jpg') !!}" alt="buyer-order">
					 			</div>
					 			<div class="buyer-cont">
					 				Bdtdc Pays to Manufacturer 
					 			</div>
					 			<i class="fa fa-play flow" style="display: none;"></i>

					 		</li>
					 </ul>
					 <p class="payment"><span style="background: #EFF6FE;padding: 10px 20px; border-radius: 5px !important;"><img style="padding-right: 7%;margin: 0;"  src="{!! asset('assets/fontend/bdtdc-images/dolll.jpg') !!}" alt="buyer-order">Bdtdc.com holds payment until buyer confirms order</span></p>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="col-sm-1 col-md-1 col-lg-1">
						
					</div>
					<div class="col-sm-11 col-md-11 col-lg-11">
					<p class="how-trade-p">Buyer who would like to trade with Bdtdc manufacturers can directly place order on Bdtdc.com. Highly secured payment methods, such as Paypal, will be provided to buyers to pay safely after order are placed. Neither does buyer's payment nor bank account information will be given to manufacturers. Bdtdc.com will hold the payment until buyer confirms receipt online. Buyer can easily track the latest order status online while manufacturers are fulfilling orders.</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12"  style=" border-bottom: 1px solid #ccc;">
							<h4 class="glbao-h4">Triple Guarantees</h4>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12" style="    border-bottom: 1px solid #ccc;">
						<div class="col-sm-1 col-md-1 col-lg-1">
							<img class="step-img" style="padding-top: 30%;" src="{!! asset('assets/fontend/bdtdc-images/t1.jpg') !!}" alt="bangladesh means business">
						</div>
						<div class="col-sm-1 col-md-1 col-lg-11">
							<h4 class="glbao-h4" style="border:0 none; padding-left: 14px; padding-bottom: 0;">Escrow Payment</h4>
							<p class="how-trade-p">Buyer can use the third-party payment method to pay for the order. The payment and bank account information won't go to the manufacturer.</p>
							
						</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12" style="    border-bottom: 1px solid #ccc;">
						<div class="col-sm-1 col-md-1 col-lg-1">
							<img class="step-img" style="padding-top: 30%;" src="{!! asset('assets/fontend/bdtdc-images/t2.jpg') !!}" alt="bangladesh means business">
						</div>
						<div class="col-sm-1 col-md-1 col-lg-11">
							<h4 class="glbao-h4" style="border:0 none; padding-left: 14px; padding-bottom: 0;">Redeem on not receiving orders</h4>
							<p class="how-trade-p">If the manufacturer fail to dispatch the goods on time, buyer can get USD20 as compensation.</p>
							
						</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12" style="    border-bottom: 1px solid #ccc;">
						<div class="col-sm-1 col-md-1 col-lg-1">
							<img class="step-img" style="padding-top: 30%;" src="{!! asset('assets/fontend/bdtdc-images/t3.jpg') !!}" alt="bangladesh means business">
						</div>
						<div class="col-sm-1 col-md-1 col-lg-11">
							<h4 class="glbao-h4" style="border:0 none; padding-left: 14px; padding-bottom: 0;">Overall Protection Policy</h4>
							<p class="how-trade-p">During the Dispatch Period (manufacturer committed time) and Logistics Protection Period (90 days by Air/120 days by Ship), buyer has option to apply for Full or Partial Refund for different reasons.</p>
							
						</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12"  style=" border-bottom: 1px solid #ccc;">
							<h4 class="glbao-h4">How to protect buyer?</h4>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12" style="padding-left: 10px; padding-right: 18px;">
								<div class="col-sm-4 col-md-4 col-lg-4 padding_0">
										<div class="protect-buyer-list">
											<div class="protect-Buyer-figure">
												<img  width="90" height="60" src="{!! asset('assets/fontend/bdtdc-images/b1.png') !!}" alt="bangladesh means business">
											</div>
											<p>
												<strong style="font-weight: 700; font-size: 22px; display: block;">Swift Dispatch</strong>
												<span class="protect-Buyer-span">
													If manufacturer doesn't dispatch products within committed time after the order was placed, buyer has option to submit application for Full Refund.
												</span>
												<cite class="protect-Buyer-cite">
													<a href="#">Learn More ►</a>
												</cite>
											</p>
											
										</div>
									
								</div>
								<div class="col-sm-4 col-md-4 col-lg-4">
								<div class="protect-buyer-list">
								   <div class="protect-Buyer-figure">
											<img width="90" height="60"  src="{!! asset('assets/fontend/bdtdc-images/b2.png') !!}" alt="bangladesh means business">
										</div>
										<p>
												<strong style="font-weight: 700; font-size: 22px;display: block;">On-time Delivery</strong>
												<span class="protect-Buyer-span">
													During the Dispatch Period (manufacturer committed time) and Logistics Protection Period (90 days by Air/120 days by Ship), buyer has option to apply for Full or Partial Refund for different reasons.
												</span>
												<cite class="protect-Buyer-cite">
													<a href="#">Learn More ►</a>
												</cite>
											</p>
									</div>
									
								</div>
								<div class="col-sm-4 col-md-4 col-lg-4" style="padding-left: 25px;">
								<div class="protect-buyer-list">
											<div class="protect-Buyer-figure">
											<img width="90" height="60" src="{!! asset('assets/fontend/bdtdc-images/b3.png') !!}" alt="bangladesh means business">
											</div>
											<p>
												<strong style="font-weight: 700;font-size: 22px;display: block;">Double-Check Protection</strong>
													<span class="protect-Buyer-span">
														If buyers receives products but finds that they have serious quality problems or don’t matchthe products description after signing for the waybill, he has option to submit application for Return & Refund before confirming receipt online.
													</span>
													<cite class="protect-Buyer-cite">
													<a href="#">Learn More ►</a>
												</cite>
											</p>
										</div>
									
								</div>

				</div>
				<div class="co-sm-12">
						<div class="button-line"><a href="{{URL::to('/',null)}}" class="large-button22 " target="_blank" style="border-radius: 5px !important;">Start My Sourcing Now</a></div>
				</div>
			
		</div>

@stop