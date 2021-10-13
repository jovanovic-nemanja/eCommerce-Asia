@extends('fontend.master3')
	@section('content')
	
	<div id="row padding_0" style="margin-top:2%;">
		<div class="col-sm-12 padding_0">
			<div class="col-sm-3">
				<div class="col-sm-12">
					<button type="button" class="btn btn-default" id="mysource_buying_request" style="border-right: 1px solid #DDD;">
						Post Buying Request
					</button>
				</div>
				<div class="col-sm-12" style="margin-top:5%;">
					<p style="color: #999;font-size: 14px;">Quotes from <span style="font-weight: 700;color: #090;">29189</span> suppliers</p>
					<p style="color: #999;margin-top: -4%;font-size: 14px;"><span style="font-weight: 700;color: #090;">1</span> Minutes to your first quote</p>
				</div>
				<div class="col-sm-12" style="background-color: #3B495C;width: 86%;margin-left: 7%;">
						<p id="mysource_buying_request1">Bdsource</p>
				</div>
				<div class="col-sm-12" style="background-color:#DAE2ED;width: 86%;height: 627px;margin-left: 7%;">
					<p id="mysource_buying_request2">Bdsource</p>
					<p style="padding-bottom:10px;"><a href="#" style="color: #666;">Quotes Management</a></p>
					<p style="padding-bottom:10px;"><a href="#" style="color: #666;">Manage Sample requests</a></p>
					<p style="padding-bottom:10px;"><a href="#" style="color: #666;">My Quotations</a></p>
					<p style="border-bottom:1px solid #DDD;font-size: 14px;font-weight: bold;padding-bottom:10px;">Bdsource Buyers</p>
					<p><a href="#" style="color: #666;">My Buyers</a></p>
				</div>


			</div>
			<div class="col-sm-9">
				<div class="col-sm-12" style="background-color: #DCDCDC;border: 1px solid #F5F6F5;padding-top: 10px;">
					<div class="col-sm-6">
						<p style="font-weight: bold;"> View RFQ Details</p>
					</div>
					<div class="col-sm-6">
						<p style="text-align:right;">View More</p>
					</div>
					
				</div>
				<div class="col-sm-12" style="background-color: #DCDCDC;border: 1px solid #F5F6F5;padding-top: 10px;margin-top:2%;font-weight: bold;">
					<div class="col-sm-6">
						<p style="font-weight: bold;"> View Quotation Details</p>
					</div>
					<div class="col-sm-6">
						<p style="text-align:right;">View More</p>
					</div>
					
				</div>
				<div class="col-sm-12" style="margin-top:2%;">
					<p style="font-size: 22px;line-height: 22px;">Sample Request Form</p>
				</div>
				<div class="col-sm-12" style="background-color: #F5F6F5;border:2px solid #FEC;padding-top: 10px;margin-top:2%;font-weight: bold;">
					
						<p style="font-weight: bold;">Up to 90% off freight – tell your supplier to use bdtdc.com’s logistics service </p>
			
				</div>
				<div class="col-sm-12" style="border: 1px solid #DDD;margin-top:2%;padding-bottom:20px;">
					<p>Product Information</p>
						<div id="view_request" style="margin:0px;padding:0px;">
							<div class="col-sm-12" style="padding-left:20px;padding-right:10px;background-color:#DDD;">
								<div class="col-sm-12" style="margin-top:2%;">
									<div class="col-sm-3"><p style="padding-top:10px;padding-left: 14%;">Product Name:</p></div>
									<div class="col-sm-9" style="">
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;background-color:#999;" value="2015 high quality sports hoody mens outdoor 2 in 1 jacket">
										<!-- <p style="padding-top:10px;">2015 high quality sports hoody mens outdoor 2 in 1 jacket</p> -->
									</div>
								</div>

								<div class="col-sm-12" style="margin-top:2%;">
									<div class="col-sm-3"><p style="padding-top:10px;padding-left: 14%;">Product Photo:</p></div>
									<div class="col-sm-3" style="">
										<img style="height:120px;width:111px;" src="{!! asset('assets/helpcenter/images/shirt.jpg') !!}" alt="" />
										<p>pic name</p>
									</div>
									<div class="col-sm-6">
										<button type="button" class="btn btn-default" style="background-color: #DDD;">Browse</button>
										<p><button type="button" class="btn btn-default" style="background-color: #DDD;margin-left: 0%;margin-top: 2%;width: 80px;">Remove</button></p>
										<p style="font-size:10px;color:#666;">Image format: Jpeg, Jpg, or Gif. Size: Max 200k</p> 

									</div>
								</div>
								<div class="col-sm-12" style="margin-top:2%;padding-bottom:3%;">
									<div class="col-sm-3">
										<p style="padding-left: 14%;">Product Details:</p>
									</div>
									<div class="col-sm-9">
										<textarea class="form-control" rows="5">

										</textarea>
										<p style="font-size:10px;"><span style="color: #F60;">1319</span> Characters Remaining </p>
									</div>

								</div>
								<div class="col-sm-12" style="padding-bottom:3%;">
									<div class="col-sm-4" style="">
										<p style="margin-left:-18%;">Sample Quantity Required:</p>
									</div>
									<div class="col-sm-3" style="margin-left: -8%;">
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;" value="">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;" value="">
									</div>

								</div>


							</div>

				      </div>


				</div>
				<div class="col-sm-12">
						<div class="col-sm-6" style="margin-left: -3.7%;">
							<button type="button" class="btn btn-default add_more" style="background-color: #DDD;">
							<i class="fa fa-plus" aria-hidden="true"></i>Add More Item</button>
						</div>
						<div class="col-sm-6">
							<p style="margin-left: -65%;color: #888;font-size: 10px;">You can still add <span style="color: #F60;">9</span> more products. </p>
						</div>
						

				</div>




				<div class="col-sm-12" style="border: 1px solid #DDD;margin-top:2%;padding-bottom:20px;">
					<p>Shipment Information</p>
					<div class="col-sm-12" style="padding-left:20px;padding-right:10px;">
						<div class="col-sm-12" style="margin-top:2%;">
							<div class="col-sm-3"><p style="padding-top:10px;margin-left: -10%;">Expected Date of Arrival:</p></div>
							<div class="col-sm-9" style="padding-top: 1%;">								
								<p><input type="text" class="form-control" id="datepicker" style="border:1px solid #DDD;width: 50%;"></p>
							</div>
						</div>

						<div class="col-sm-12" style="margin-top:2%;">
							<div class="col-sm-3"><p style="padding-top:10px;padding-left: 14%;">Delivery Address:</p></div>
							<div class="col-sm-9" style="padding-top: 1%;">
								<input type="text"  class="form-control" name="" style="border:1px solid #DDD;width: 80%;"  id="">
							</div>
						</div>
						<div class="col-sm-12" style="margin-top:2%;padding-bottom:3%;">
							<input type="checkbox" name="" value="" checked> I would like to use bdtdc.com’s logistics service<i class="fa fa-question" aria-hidden="true" style="color:green;"></i>
						</div>
					</div>
				</div>

				<div class="col-sm-12" style="border: 1px solid #DDD;margin-top:2%;padding-bottom:20px;">
					<p>Message to Supplier</p>
					<div class="col-sm-12" style="padding-left:20px;padding-right:10px;">
						<div class="col-sm-12" style="margin-top:2%;">
							<div class="col-sm-3"><p style="padding-top:10px;margin-left: -10%;padding-left: 73%;">Message:</p></div>
							<div class="col-sm-9" style="padding-top: 1%;">								
								<textarea class="form-control" rows="5" style="width: 59%;height: 73px;">

								</textarea>
								<p style="font-size:10px;color:#666;"><span style="color: #F60;">2000</span> Characters Remaining</p> 
							</div>
						</div>
						
					</div>
				</div>
				



			</div>
		</div>



		





	</div>

 
	@stop
	@section('scripts')
		  <script>
		  //datepicker
			  $(function() {
			    $( "#datepicker" ).datepicker();
			  });
		   //datepicker

			  //append item
			  var add_item=1;
			  $('.add_more').click(function(e){
			  	e.preventDefault();
			  	if(add_item<10)
			  	{
			  		var template='<div class="col-sm-12" style="padding-left:20px;padding-right:10px;background-color:#DDD;">\
								<div class="col-sm-12" style="margin-top:2%;">\
									<div class="col-sm-3"><p style="padding-top:10px;padding-left: 14%;">Product Name:</p></div>\
									<div class="col-sm-9" style="">\
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;background-color:#999;" value="2015 high quality sports hoody mens outdoor 2 in 1 jacket">\
									</div>\
								</div>\
								<div class="col-sm-12" style="margin-top:2%;">\
									<div class="col-sm-3"><p style="padding-top:10px;padding-left: 14%;">Product Photo:</p></div>\
									<div class="col-sm-3" style="">\
										<p>pic name</p>\
									</div>\
									<div class="col-sm-6">\
										<button type="button" class="btn btn-default" style="background-color: #DDD;">Browse</button>\
										<p><button type="button" class="btn btn-default" style="background-color: #DDD;margin-left: 0%;margin-top: 2%;width: 80px;">Remove</button></p>\
										<p style="font-size:10px;color:#666;">Image format: Jpeg, Jpg, or Gif. Size: Max 200k</p>\
									</div>\
								</div>\
								<div class="col-sm-12" style="margin-top:2%;padding-bottom:3%;">\
									<div class="col-sm-3">\
										<p style="padding-left: 14%;">Product Details:</p>\
									</div>\
									<div class="col-sm-9">\
										<textarea class="form-control" rows="5">\
										</textarea>\
										<p style="font-size:10px;"><span style="color: #F60;">1319</span> Characters Remaining </p>\
									</div>\
								</div>\
								<div class="col-sm-12" style="padding-bottom:3%;">\
									<div class="col-sm-4" style="">\
										<p style="margin-left:-18%;">Sample Quantity Required:</p>\
									</div>\
									<div class="col-sm-3" style="margin-left: -8%;">\
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;" value="">\
									</div>\
									<div class="col-sm-4">\
										<input type="text" class="form-control" name="" style="border:1px solid #DDD;" value="">\
									</div>\
								</div>\
							</div>';


			  		$('#view_request').append(template);
			  	}
			  	else
			  	{
			  		alert("You can't add more than 10 items .");
			  	}
			  	
			  	add_item++;
			  });
		//append item

		  </script>
	@stop