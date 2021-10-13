@extends('fontend.master3')
	@section('content')
		</div>

<div class="body-container ">
	<div class="header-nav">
	    <div class="nav-wrap">
	        <div class="nav-container">
	                    <a href="#" class="item-menu my-active">Purchasing Agent</a>
	            <a href="" class="item-menu">Successful Transactions</a>
	                            <div class="help util-right">
	                <a href="#" target="_blank" class="ui2-button ui2-button-link link-secondary">
	                Know More about Purchasing Agent
	                    <i class="fa fa-angle-right" aria-hidden="true" style="width: 0;"></i>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<div class="container">
	<div class="row padding_0" style="background-color: #fff;">
	    <div class="col-sm-12 col-md-12 col-lg-12">
            <ul class="top-path" style="padding-bottom: 8px;">
                <li class="top-path-li"><a href="{{URL::to('/',null)}}" class="top-path-li-a">Bdtdc Source<i class="fa fa-angle-right top-path-icon"></i></a></li>
                <li class="top-path-li"><a href="{{URL::to('purchasing-agent')}}" class="top-path-li-a" target="_blank"> Purchasing Agent <i class="fa fa-angle-right top-path-icon"></i></a></li>
                <li class="top-path-li"><a href="{{URL::to('purchasing-agent/details')}}" class="top-path-li-a"> {{$users->user->first_name}} {{$users->user->last_name}}'s Profile<i class="fa fa-angle-right top-path-icon"></i></a></li>
            </ul>
	    </div>
	</div>
  <div class="row padding_0" style="background-color: #fff;">

  	
  		<div class="col-sm-8 col-md-8 col-lg-8 col-sx-30 main">
  				<div class="col-sm-12 col-md-12 attrs-wrapper">
  						<div class="col-sm-3 col-md-3">
  									<div class="pic" style="position: relative;border:none;">
  										
				<img src="{!! asset('assets/no_photo.gif') !!}" class="img-responsive avatar" alt="" style="width: 118px;height: 117px;">
		

  										<!-- <img style="display: block;max-width: 100%;height: auto;border-radius: 50% !important;position: absolute;left: 17px;top: 17px; width: 105px; height: 105px;" src="{!! asset('assets/fontend/bdtdc-images/purse-agent-2.jpg') !!}" class="img-responsive" alt=""> -->
  									</div>
  						</div>
  						<div class="col-sm-9 col-md-9 padding_0"> 
  								<div class="agent-name">
  									<a href="{{URL::to('purchasing-agent/details',$users->user->id)}}" class="agent-name">
  										{{$users->user->first_name}} {{$users->user->last_name}}</a></div>
  								<div class="as-field">{{$users->user->email}}</div>
  								<div class="as-field">{{$users->user->customers->telephone}}</div>
  								<div class="tags">
					                  <div class="ui2-tag ui2-tag-appraise" style="border-radius: 4px !important;">
					                    <div class="ui2-tag-body" data-role="tag-body">
					                        Better pricing
					                    </div>
					                </div>
					                 <div class="ui2-tag ui2-tag-appraise" style="border-radius: 4px !important;">
					                    
					                    <div class="ui2-tag-body" data-role="tag-body">
					                        24-hour service
					                    </div>
					                </div>
					                 <div class="ui2-tag ui2-tag-appraise" style="border-radius: 4px !important;">
					                    
					                    <div class="ui2-tag-body" data-role="tag-body">
					                        Quality assurances
					                    </div>
					                </div>
					                  <div class="ui2-tag ui2-tag-appraise" style="border-radius: 4px !important;">
					                    <div class="ui2-tag-body" data-role="tag-body">
					                        Trust-worthy and reliable suppliers
					                    </div>
					                </div>
					                  <div class="ui2-tag ui2-tag-appraise" style="border-radius: 4px !important;">
					                    <div class="ui2-tag-body" data-role="tag-body">
					                        Mass products from different suppliers available
					                    </div>
					                </div>
					            </div>
					           <div class="work-experience"><span class="name" style="color: #666;font-family: arial;">Work experience:</span><span class="value" style="display: inline;color: #1DC11D;font-family: arial;">13 Years</span></div>
					           <div class="other-info">
                                <div class="info-item industry"><span class="name" style="font-family: arial;">Industry:</span><span class="value" style="font-family: arial;">Furniture</span></div>
                                                <div class="info-item main-product"><span class="name" style="font-family: arial;">Main Product:</span><span class="value" style="font-family: arial;">{{$users->user->main_products->product_name_1}}, {{$users->user->main_products->product_name_2}}, {{$users->user->main_products->product_name_3}}</span></div>
                                                <div class="info-item language"><span class="name" style="font-family: arial;">Language:</span><span class="value" style="font-family: arial;">English</span></div>
        					            	@if($users)
								            @if($users->user)
								            @if($users->user->company)
								            @if($users->user->company->companymainmarket)
								            @if($users->user->company->companymainmarket->main_market)
                                                <div class="info-item markets"><span class="name" style="font-family: arial;">Markets:</span><span class="value" style="font-family: arial;">{{$users->user->company->companymainmarket->main_market->name}}</span></div>
                                            @endif
								            @endif
								            @endif
								            @endif
								            @endif

								            @if($users)
								            @if($users->user)
								            @if($users->user->main_products)
								            @if($users->user->main_products->business_port)
                                                <div class="info-item port"><span class="name" style="font-family: arial;">Port:</span><span class="value" style="font-family: arial;">{{$users->user->main_products->business_port->port}}</span></div>
                                            @endif
                                            @endif
                                            @endif
                                            @endif

                                            @if($users)
								            @if($users->user)
								            @if($users->user->main_products)
								            @if($users->user->main_products->payment_method)
                                                <div class="info-item payments-supported"><span class="name" style="font-family: arial;">Payment Terms:</span><span class="value" style="font-family: arial;">{{$users->user->main_products->payment_method->payment_method}}</span></div>
                                            @endif
                                            @endif
                                            @endif
                                            @endif
                            </div>
					  		<div class="action">
						  		<div class="buyer-action">
							            <a href="{{URL::to('contact_supplier', $users->user_id)}}" class="btn btn-primary" style="border-radius: 4px !important;">
							                <i class="fa fa-envelope-o" aria-hidden="true" style="padding-right: 5px; font-size: 16px;"></i>Contact Supplier
							            </a>
						          </div>
					  			<div class="action-sub">
					  					<span class="contact-info-bdtdc" style="font-family: arial;padding-left: 35px;padding-top: 16%;">You can view the contact details once your request is accepted.</span>
					  			</div>	
					  				
					  			
					  		</div>					
					  	</div>
  				</div>
  		</div>


  		<div class="col-sm-4 col-md-4 col-lg-4 col-sx-12">
  				<div class="company-detail">
  					<div class="company-name">Shanghai Union-Metal Hardware Industrial Co., Ltd.</div>
  					<div class="location"><span class="name">Location: </span><span class="value"></span>China(Mainland)</div>
  					<div id="company-detail-des" class="detail-des">We specialize in manufacture and trading consumer products in decorative hardware and we have twelve years experience for DIY decorative hardware. 80% of the products are exported to Europe and the rest are exported to Russia, North America, South America and Australia. <br>We pay high attention to quality of the products we supply to our customers. Every shipment is inspected and checked in our own laboratory in terms of safety properties of hardwares. <br>Our aim is to build Union-metal into a comprehensive international B2B and B2C company.</div>
  					<div class="view-more" id="view-more-container" style="display: block;"><a id="view-more"><span>View More</span></a></div>
  				</div>
  				
  		</div>
  	
  </div>
  <div class="row padding_0" style="background-color: #fff; padding-top: 60px;">
  		<div class="col-sm-8 col-md-8">
  			<h3 class="agnt-title">Products frequently purchased by Kidd Lu</h3>
  		</div>
  		<div class="col-sm-4 col-md-4">
  			<h3 style="font-size: 1.5em;line-height: 1;">Other Agents You Might Like</h3>
  		</div>
  	
  </div>
 <div class="row padding_0" style="background-color: #fff;">
  		<div class="col-sm-8 col-md-8 col-lg-8 col-sx-30 main" style="padding: 0;">
  				<div class="col-sm-12 col-md-12 attrs-wrapper">
  					<div class="category-tab"><!--category-tab-->
						
							<ul class="nav nav-tab nav-pills trade-show-ul " style="background:none;border-bottom: 1px solid #dae2ed;">
								<li style="padding-top: 11px;font-size: 15px;font-weight: 600;">Furniture</li>
								<li class="" style="margin-left: 9.5%;"><a class="padding_0" href="#forbuyer" data-toggle="tab" aria-expanded="false">Hot Brands</a></li>
								<li class=""><a style="font-size: 13px;" class="padding_0" href="#apparel" data-toggle="tab" aria-expanded="false">Apparel</a></li>
								<li class=""><a style="font-size: 13px;" class="padding_0" href="#electronic" data-toggle="tab" aria-expanded="false">Electronics</a></li>
								   
							</ul>
					</div>
					<div class="tab-content">
		<input type="hidden" name="section" value="">
		<div class="tab-pane fade" id="forbuyer">
			<div class="col-sm-12 padding_0">
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;" data-toggle="modal" data-target=".product-group">
					<img style="height:140px;width: 150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/images/TB1QFP5KXXXXXbDXpXXWvVY6XXX-226-260.png">
					<p style="color: #666; text-align: left;padding-left: 10px;">Wholesale zinc alloy Kitchen Cabinet Handles</p>
				</a>	
					
				</div>
				
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;" data-toggle="modal" data-target=".product-group2">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/images/TB1V.HUKXXXXXbxXFXXWvVY6XXX-226-260.png">
					<p style="color: #666; text-align: left;padding-left: 10px;">High quality zinc alloy furnituer cabinet kitchen </p>
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/images/TB1zjG0KFXXXXadXFXXgvtY6XXX-226-260.jpg">
					<p style="color: #666; text-align: left;padding-left: 10px;">Decorative Cartoon Design furniture knob</p>
					
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px; height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/images/TB1CurhKFXXXXauXXXXgvtY6XXX-226-260.jpg">
					<p style="color: #666; text-align: left;padding-left: 10px;">Crown shape crystal glass cabinet knobs</p>
					
					
				</a>	
				</div>
				
				
			
			</div>

   		</div>
   		<div class="tab-pane fade" id="apparel">
			<div class="col-sm-12 padding_0">
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://absolutelybest.bdtdc.com/assets/slider/TB1yXgDLXXXXXb0XpXXXXXXXXXX-226-260.jpg">
					
					
				</a>	
				</div>
				
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px;margin:17px; " class="img-responsive" src="http://absolutelybest.bdtdc.com/assets/slider/TB1wbY0LpXXXXX3XVXXXXXXXXXX-226-260.jpg">
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px;margin:17px; " class="img-responsive" src="http://absolutelybest.bdtdc.com/assets/slider/TB1UHtNLFXXXXX9XFXXXXXXXXXX-226-260.jpg">
					
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px;margin:17px; " class="img-responsive" src="http://absolutelybest.bdtdc.com/assets/slider/TB1VbOPKFXXXXXHaXXXXXXXXXXX-226-260.jpg">
				</a>	
				</div>
				
				
				
			
			</div>

   		</div>
   		<div class="tab-pane fade" id="electronic">
			<div class="col-sm-12 padding_0">
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/slider/TB1q.TDKXXXXXXvaXXXXXXXXXXX-225-260.png">
				</a>	
				</div>
				
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px;margin:17px;" class="img-responsive" src="http://bditdc.com/assets/slider/TB1bqbMKXXXXXXrXVXXXXXXXXXX-225-260.png">
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/slider/TB1qfvMKVXXXXcHaXXXXXXXXXXX-225-260.jpg">
				</a>	
				</div>
				<div class="col-sm-3 padding_0">
				<a href="#" class="slidebox-item" style="width: 190px;height: 230px;">
					<img style="height:140px;width:150px; margin:17px; " class="img-responsive" src="http://bditdc.com/assets/slider/TB1Cyi2KVXXXXc4XpXXrxTjYXXX-225-260.jpeg">
				</a>	
				</div>	
			</div>

   			</div>
		</div>
  	</div>
  </div>
  	<div class="col-sm-4 col-md-4">
  		<div class="agent-item">
  			<div class="pic-md">
  			<a href="#" class="avatar" style="margin-right: 20px;">
				<img src="{!! asset('assets/fontend/bdtdc-images/purse-agent-2.jpg') !!}" class="img-responsive" alt="">
			</a>
		</div>
		<div class="attrs">
                                <a class="agent-name" href="">Kevin Zheng</a>
                                   <div class="attr util-ellipsis"><span class="">Main Product:</span><span class="value" title="">Commercial Furniture</span>
                                   </div>
                                   <div class="attr util-ellipsis"><span class="">Industry:</span><span class="value" title="Furniture,Home &amp; Garden">Furniture,Home &amp; Garden</span>
                                   </div>
              </div>
            </div>
            <div class="agent-item">
  			<div class="pic-md">
  			<a href="#" class="avatar" style="margin-right: 20px;">
				<img src="{!! asset('assets/fontend/bdtdc-images/purse-agent-2.jpg') !!}" class="img-responsive" alt="">
			</a>
		</div>
		<div class="attrs">
                                <a class="agent-name" href="">Kevin Zheng</a>
                                   <div class="attr util-ellipsis"><span class="">Main Product:</span><span class="value" title="">Commercial Furniture</span>
                                   </div>
                                   <div class="attr util-ellipsis"><span class="">Industry:</span><span class="value" title="Furniture,Home &amp; Garden">Furniture,Home &amp; Garden</span>
                                   </div>
              </div>
            </div>
            <div class="agent-item">
  			<div class="pic-md">
  			<a href="#" class="avatar" style="margin-right: 20px;">
				<img src="{!! asset('assets/fontend/bdtdc-images/purse-agent-2.jpg') !!}" class="img-responsive" alt="">
			</a>
		</div>
		<div class="attrs">
                                <a class="agent-name" href="">Kevin Zheng</a>
                                   <div class="attr util-ellipsis"><span class="">Main Product:</span><span class="value" title="">Commercial Furniture</span>
                                   </div>
                                   <div class="attr util-ellipsis"><span class="">Industry:</span><span class="value" title="Furniture,Home &amp; Garden">Furniture,Home &amp; Garden</span>
                                   </div>
              </div>
            </div>

  	</div>
  </div>
   <div class="row padding_0" style="background-color: #fff; padding-top: 60px;">
  		<div class="col-sm-8 col-md-8">
  			<h3 class="agnt-title">Kidd Lu's Agent Experience</h3>
  		</div>
  		<div class="col-sm-4 col-md-4">
  			
  		</div>
  	
  </div>
 <div class="row padding_0" style="background-color: #fff;margin-bottom: 2%;">
  			<div class="col-sm-8 col-md-8 col-lg-8 col-sx-30 main">
  				<div class="col-sm-12 col-md-12 attrs-wrapper">
  						<div class="content-agent" style="margin-top: -5%;">
                                <div class="ui2-attr"><span class="ui2-name" style="font-family:arial;">Project Experience:</span><span class="ui2-value" style="line-height: 1.28571;color: #333;font-size: 14px;font-family:arial;">·12  years working experience in decorative hardware trading company.<br>·Know the Europe market style and request of European.<br>·Familiar with the products of hardware (decorative hardware and lamp)<br>·develop product (find good suppliers and products)<br>·deal with inquires from customer<br>·follow up order and inspection quality</span>
                                </div>
                                <div class="ui2-attr"><span class="ui2-name" style="font-family">Highest Education:</span><span class="ui2-value" style="font-family:arial;">College</span></div>
                                      <div class="ui2-attr"><span class="ui2-name" style="font-family:arial;">Participated Exhibitions:</span><span class="ui2-value" style="font-family:arial;">Canton Fair</span>
                                  </div>
                         </div>
  					
  				</div>
  		</div>
  		<div class="col-sm-4 col-md-4">
  			
  		</div>
 </div>
<div class="modal product-group" style="margin: 0 auto; max-width:983px; max-height:450px; background-color: #fff;">
			<div id="group-view modal-dialog">
					<div class="modal-header">
							<button class="close" data-dismiss="modal"><span>&times;</span>
								
							</button>
					</div>
					<div>
						<p style="padding-left: 25px;">Furniture > Furniture Hardware</p>
					</div>
				<div class="modal-body">
							<div id="only-product" class="agent-product" style="display:block;">
								<div style=" width: 33%; display: block;padding: 0;margin: 0; float: left;">
									<img style="width: 85%; left: 3%;" src="{!! asset('assets/images/TB1QFP5KXXXXXbDXpXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt="">
								</div>
							<div style=" width: 50%; display: block;padding: 0;margin: 0; float: left;">
										<div class="des-detail" data-role="form-subject">High quality zinc alloy furniturer cabinet kitchen cabinet bathroom cabinet knob</div>
										<form>
										<div class="ui2-form-item">
		                                <div class="ui2-form-control">
		                                    <textarea data-role="form-description" class="request-info" placeholder="Please input details of your request." data-widget-cid="widget-54"></textarea>
		                                </div>
		                            </div>
		                            <button class="btn btn-primary btn-sm " data-role="submit">Contact Agent</button>
		                            <div class="request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">Let bdtdc.com recommend another one purchasing agent if this agent does not respond me within 24 hours. </span>
		                                </label>
		                            </div>
		                            <div class="ui2-checkbox ui2-checkbox-customize request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">I agree to display my name card to the agent.</span>
		                                </label>
		                            </div>
		                            </form>
							</div>
						</div>
						<div id="only-product-second" class="agent-product" style="display:none;">
								<div style=" width: 33%; display: block;padding: 0;margin: 0; float: left;">
									<img style="width: 85%; left: 3%;" src="{!! asset('assets/images/TB1V.HUKXXXXXbxXFXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt="">
								</div>
							<div style=" width: 50%; display: block;padding: 0;margin: 0; float: left;">
										<div class="des-detail" data-role="form-subject">High quality zinc alloy furniture cabinet kitchen cabinet bathroom cabinet knob</div>
										<form>
										<div class="ui2-form-item">
		                                <div class="ui2-form-control">
		                                    <textarea data-role="form-description" class="request-info" placeholder="Please input details of your request." data-widget-cid="widget-54"></textarea>
		                                </div>
		                            </div>
		                            <button class="btn btn-primary btn-sm " data-role="submit">Contact Agent</button>
		                            <div class="request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">Let bdtdc.com recommend another one purchasing agent if this agent does not respond me within 24 hours. </span>
		                                </label>
		                            </div>
		                            <div class="ui2-checkbox ui2-checkbox-customize request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">I agree to display my name card to the agent.</span>
		                                </label>
		                            </div>
		                            </form>
							</div>
						</div>
						<div id="only-product-3rd" class="agent-product" style="display:none;">
								<div style=" width: 33%; display: block;padding: 0;margin: 0; float: left;">
									<img style="width: 85%; left: 3%;" src="{!! asset('assets/images/TB1zjG0KFXXXXadXFXXgvtY6XXX-226-260.jpg') !!}" class="img-responsive" alt="">
								</div>
							<div style=" width: 50%; display: block;padding: 0;margin: 0; float: left;">
										<div class="des-detail" data-role="form-subject">High quality zinc alloy furnituer cabinet kitchen cabinet bathroom cabinet knob</div>
										<form>
										<div class="ui2-form-item">
		                                <div class="ui2-form-control">
		                                    <textarea data-role="form-description" class="request-info" placeholder="Please input details of your request." data-widget-cid="widget-54"></textarea>
		                                </div>
		                            </div>
		                            <button class="btn btn-primary btn-sm " data-role="submit">Contact Agent</button>
		                            <div class="request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">Let recommend another one purchasing agent if this agent does not respond me within 24 hours. </span>
		                                </label>
		                            </div>
		                            <div class="ui2-checkbox ui2-checkbox-customize request-agree">
		                                <label class="">
		                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
		                                    <span class="">I agree to display my name card to the agent.</span>
		                                </label>
		                            </div>
		                            </form>
							</div>
						</div>
							<div style=" width: 15%; display: block;padding: 0;margin: 0; float: left;">
											<ul class="img-order">
												<li id="btn1" value="show-layer" onclick="setVisibility('only-product');"><img  class="img-wrapper" src="{!! asset('assets/images/TB1QFP5KXXXXXbDXpXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt=""></li>
												<li onclick="setVisibility('only-product-second');"><img  class="img-wrapper" src="{!! asset('assets/images/TB1V.HUKXXXXXbxXFXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt=""></li>
												<li onclick="setVisibility('only-product-3rd');"><img  class="img-wrapper" src="{!! asset('assets/images/TB1zjG0KFXXXXadXFXXgvtY6XXX-226-260.jpg') !!}" class="img-responsive" alt=""></li>
												<li><img  class="img-wrapper" src="{!! asset('assets/images/TB1CurhKFXXXXauXXXXgvtY6XXX-226-260.jpg') !!}" class="img-responsive" alt=""></li>
											</ul>
							</div >
				</div>
			</div>
		</div>
		<div class="modal product-group2" style="">
			<div id="group-view modal-dialog">
					<div class="modal-header">
							<button class="close" data-dismiss="modal"><span>&times;</span>
								
							</button>
					</div>
					<div>
						<p style="padding-left: 25px;">Furniture > Furniture Hardware</p>
					</div>
				<div class="modal-body">
					<div id="only-product2" style="display:block;">
							<div style=" width: 33%; display: block;padding: 0;margin: 0; float: left;">
								<img style="width: 85%; left: 3%;" src="{!! asset('resources/assets/images/TB1V.HUKXXXXXbxXFXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt="">
							</div>
						<div style=" width: 50%; display: block;padding: 0;margin: 0; float: left;">
								<div class="des-detail" data-role="form-subject">High quality zinc alloy furnituer cabinet kitchen cabinet bathroom cabinet knob</div>
								<form>
								<div class="ui2-form-item">
                                <div class="ui2-form-control">
                                    <textarea data-role="form-description" class="request-info" placeholder="Please input details of your request." data-widget-cid="widget-54"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm " data-role="submit">Contact Agent</button>
                            <div class="request-agree">
                                <label class="">
                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
                                    <span class="">Let bdtdc.com recommend another one purchasing agent if this agent does not respond me within 24 hours. </span>
                                </label>
                            </div>
                            <div class="ui2-checkbox ui2-checkbox-customize request-agree">
                                <label class="">
                                    <input class="" type="checkbox" checked="checked" disabled="disabled">
                                    <span class="">I agree to display my name card to the agent.</span>
                                </label>
                            </div>
                            </form>
							</div>
						</div>
							<div style=" width: 15%; display: block;padding: 0;margin: 0; float: left;">
											<ul class="img-order">
												<li><img  class="img-wrapper" src="{!! asset('resources/assets/images/TB1QFP5KXXXXXbDXpXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt=""></li>
												<li><img  class="img-wrapper" src="{!! asset('resources/assets/images/TB1V.HUKXXXXXbxXFXXWvVY6XXX-226-260.png') !!}" class="img-responsive" alt=""></li>
												<li><img  class="img-wrapper" src="{!! asset('resources/assets/images/TB1zjG0KFXXXXadXFXXgvtY6XXX-226-260.jpg') !!}" class="img-responsive" alt=""></li>
												<li><img  class="img-wrapper" src="{!! asset('resources/assets/images/TB1CurhKFXXXXauXXXXgvtY6XXX-226-260.jpg') !!}" class="img-responsive" alt=""></li>
											</ul>
							</div >
				</div>
			</div>
		</div>

			
@stop
@section('scripts')
<script type="text/javascript">
 function setVisibility(id) {
 if(document.getElementById(id).style.display = 'none'){
// var x = document.getElementsByClassName("agent-product");
//  	 for(i=0; i<x.length; i++) {
//       x[i].style.display ='none';
//     }

 document.getElementById(id).style.display = 'block';
 }else{
 document.getElementById(id).style.display = 'none';

}
 }

 // $(document).on({
 //                    click: function(e) {
 //                        e.preventDefault();
 //                        var url,base_url,supplier_id,product_id;
 //                        $('.modal-content').html('<span class="btn btn-block btn-lg"><i class="fa fa-spinner fa-pulse loading_icon text-primary"></i></span>');
 //                        base_url = window.location.origin;
 //                        supplier_id = $(this).data('supplier_id');
 //                        product_id = $(this).data('product_id');
 //                        // alert (product_id);
 //                        // alert (supplier_id);
                        
 //                        url = (product_id =="#") ? base_url+"/contact_supplier/"+supplier_id : base_url + "/byer/contact_supplier/" + supplier_id + "/" + product_id;
 //                        // $.get(url, function(r) {
 //                        //     $('.modal-content').html(r)
 //                        // })
 //                        window.location.href = url;
 //                    }
 //                }, '.contact_supplier');

		
</script>
@stop