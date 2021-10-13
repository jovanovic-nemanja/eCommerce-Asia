@extends('mobile-view.layout.master_m')
@section('content')
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('/',null)}}" class="top-path-li-a"><span itemprop="name">Home</span> <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('BuyerChannel/pages/meet_suppliers',13)}}" class="top-path-li-a"><span itemprop="name">BuyerChannel</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
                        
                        
                    </ul>
            </div>
    
  </div>
  <div class="row padding_0" style="background-color: #fff; padding-bottom: 5%; margin-bottom: 20px;">
  			<div class="col-sm-12 col-md-12">
  						<div class="ui2-step bao-step">
							    <ul class="ui2-step-5">
							       			<li class="ui2-step-curr">
							       	<span> Place Order</span><i class="" aria-hidden="true" style="color: #255E98;font-size: 36px;position: absolute;top: 11px; left: 19%;"></i>
							       			</li>
							        		<li class="ui2-step-undone">
											<span>Supplier Confirmation </span>
											
											</li>
							        <li class="ui2-step-undone">
							        <span>Payment</span>
							        </li>
							        <li class="ui2-step-undone">
							           <span>Shipment</span>
							        </li>
							        <li class="ui2-step-undone last">
							        <span>Confirm and Review</span>
							        </li>
							    </ul>
							</div>	
  			</div>
  			<div class="col-sm-12 col-md-12">
  						<div class="trade-buy-box">
  									<h3 class="td-hed"><img itemprop="image"  style="height:30px;" src="{!! asset('resources/assets/gold/Buyer-protect.jpg') !!}" alt="buyer protect"> Buyer Protection - Get Full Protection for Your Order. <span style="font-size: 13px;padding-left:4%;font-weight: normal;cursor: pointer;"><a href="{{URL::to('BuyerChannel/pages/trade_assurance',5)}}">Learn More  ></a></span> <i class="fa fa-times" aria-hidden="true" id="trade-close" style=" font-size: 24px !important;font-weight: normal;color: #CCC;float: right;display: block; cursor: pointer;line-height: 24px;"></i></h3>
  									<ul style="padding:0;">
  										<li class="potection-list">
  													<span class="buyer-notice-sort" style=" border-radius: 12px !important; left: 4%; ">
  														1
  													</span> 
  									
  												<p class="bdr-leangth" style="width: 100%; font-size: 16px; float: left;text-align:left; padding-left: 6%; color: #000;"><i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 26px; color: #666;"></i><span style="padding-left: 10px;">Complete this form</span></p>
  											<p style="width: 100%; font-size: 13px; float: left;text-align:left; padding-left: 6%;">Complete the form below to start order first, and then confirm your order online with Buyer Protection.</p>
  										</li>
  										<li class="potection-list">
  												<span class="buyer-notice-sort" style=" border-radius: 12px !important; left: 4%; ">
  														2
  													</span> 
  										
  											<p style="width: 100%; font-size: 14px; float: left;text-align:left; padding-left: 6%; color: #000;"><i class="fa fa-usd" aria-hidden="true"  style="font-size: 26px; color: #666;"></i><span style="padding-left: 10px;">Make a payment</span></p>
  											<p style="width: 100%; font-size: 13px; float: left;text-align:left; padding-left: 6%;">Pay to the supplier’s Citibank account designated by Bdtdc.com with credit card or bank transfer.</p>
  										</li>
  										<li class="potection-list">
  												<span class="buyer-notice-sort" style=" border-radius: 12px !important; left: 4%; ">
  														3
  													</span> 
  										
  											<p style="width: 100%; font-size: 16px; float: left;text-align:left; padding-left: 6%; color: #000;"><img itemprop="image"  class="" style="height: 26px; width: 26px; float: left;" src="{!! asset('resources/assets/gold/get_protection.png') !!}" alt="get protection"><span style="padding-left: 10px;">Get full protection</span></p>
  											<p style="width: 100%; font-size: 13px; float: left;text-align:left; padding-left: 6%;">If there is any issue about the on-time shipment or product quality, Bdtdc.com will refund the covered amount of your payment .</p>
  										</li>
  										<li>
  											<p style="margin-top: 4%;"><a href="{{URL::to('BuyerChannel/pages/trade_assurance',5)}}" style="padding-left: 16px; color: #1686CC; padding-left: 5%; padding-top: 10px;">Buyer Protection ></a></p>
  										</li>
  									</ul>
  						</div>

  			</div>
  			<form data-role="form" method="post"   name="membership" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal product_info_form form-row-seperated">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
  			<div class="col-sm-12 col-md-12">
  						<p class="td-em-head">Please enter your supplier’s email address</p>
  						<div class="member-email-box" style="border:0 none;">
									<div class="email-box"> 
									
											<div class="form-group"  id="">
												<label style="display: block; float: left; margin-right: 10px;">
												<span style="color: red; font-size: 14px;">*</span>
												Supplier Email:
												</label>
												<div class="em-in">													 
												    <input type="email" name="supplier_email" class="form-control error_control" style="height: 30px;" id="email_check">
                            <p class="email_error show_error text-danger">Please enter the Supplier Email.</p>
                            <p class="email_check text-danger">Please enter a valid Email address.</p>
												 </div>
											</div>
									
									</div>  								
  						</div>
  			</div>
  			<div class="col-sm-12 col-md-12">
  						<p class="td-em-head">Upload your contract, quotation, proforma invoice (PI) or other attachments.</p>
  						<div class="member-email-box" style="height: 220px;">
									<p class="drag-p">Drag your document here or</p>

                  <div style="margin-left: 30%;">
                     <a itemprop="url" class="btn btn-primary btn-lg buyer_file" style="border-radius: 10px !important;">Upload your document from computer</a>
                    <input   type="file" class="btn btn-primary btn-lg file_buyer"  name="" style="display:none" value=""/> 
                    <span class="file_buyer" style="color:#333;font-size:15px;"></span>
                  </div>

									<p class="drag-p" style="font-size: 13px; padding-top: 23px;">If you are unsure which document type to upload, please see the example here.</p>
									
										<div class="form-group">

												<label style="display: block; float: left; margin-right: 10px; padding-left: 3%;">
												<span style="color: red; font-size: 14px;">*<!-- <i class="fa fa-star" aria-hidden="true" style="font-size: 13px; color: red; font-weight: normal;"></i> --></span>
												Product Name:

												</label>
												<div class="em-in" style="width: 75%;">													 
												    <input type="text" name="product_name" class="form-control error_control" style="height: 30px;"  placeholder="Please enter the English product name specified in your contract, please use ',' around each one." data-id="product-key">
                            <p class="show_error text-danger">Please enter the Product name.</p>
												</div>
									</div>							
  						</div>
  			</div>
  			<div class="col-sm-12 col-md-12">
  				<p class="td-em-head">Let the supplier know your preferred payment details for the order. <img itemprop="image"  height="30" src="{!! asset('resources/assets/gold/Buyer-protection-home.png') !!}" alt="Buyer protection home"></p>
  						<div class="member-email-box" style=" min-height:220px;max-height: 320px;">
  							<div class="col-sm-6 col-md-6 col-xs-12">
  									<div class="form-mmm">
  									<div class="form-group">

												<label style="display: block; float: left; margin-right: 10px; padding-left: 3%; width: 220px; text-align: right;">
												<span style="color: red; font-size: 14px;">*<!-- <i class="fa fa-star" aria-hidden="true" style="font-size: 13px; color: red; font-weight: normal;"></i> --></span>
												Total order amount : US <i class="fa fa-usd" aria-hidden="true"></i>

												</label>
												<div class="em-in" style="width: 45%;">													 
												    <input type="text" name="total_order" id="total_order" class="form-control error_control check_number" style="height: 30px;" data-id="product-key">
                            <p class="show_error text-danger">Please enter the order amount.</p>
												</div>
									</div>
  								</div>
  									<div class="form-mmm">
									<div class="form-group">

												<label style="display: block; float: left; margin-right: 10px;padding-left: 3%; width: 220px;  text-align: right;">
												<span style="color: red; font-size: 14px;">*<!-- <i class="fa fa-star" aria-hidden="true" style="font-size: 13px; color: red; font-weight: normal;"></i> --></span>
												Initial payment : US <i class="fa fa-usd" aria-hidden="true"></i>

												</label>
												<div class="em-in" style="width: 45%;">													 
												    <input type="text" name="initial_payment" id="initial_payment" class="form-control error_control check_number" style="height: 30px;" data-id="product-key">
                            <p class="show_error text-danger">Please enter the Initial payment.</p>
												 </div>
									</div>
								</div>
								<div class="form-mmm">	
								  <div class="form-group">

												<label style="display: block; float: left; margin-right: 10px; padding-left: 3%; width: 220px;  text-align: right;">
												<span style="color: red; font-size: 14px;"></span>
												Balance payment: US <i class="fa fa-usd" aria-hidden="true"></i>

												</label>
												<div class="em-in blance-bp" style="width: 45%;">													 
												   <!--  <input type="text" class="form-control" style="height: 30px;"  id="product-key"> -->
												   <span id="total_amount">0.00</span>
												 </div>
									</div>
								</div>
  								
  							</div>
  								<div class="col-sm-6 col-md-6 col-xs-12" style="background-color:#F7F7F7;margin-left: -2%;margin-top: 2.8%;">
  											<p class="last-ppp" style="padding-top: 3%;color: #999;font-size: 12px;line-height: 18px;padding-right: 10px;font-weight:bold;">
                          <span><i class="fa fa-smile-o" aria-hidden="true" style="color: #FC6;"></i></span>If you pay by T/T (bank transfer) , make sure you pay to the supplier’s Citibank account designated by Bdtdc.com. Otherwise, you will not be covered by Buyer Protection.</p>
  											<div class="pay-icon" style="padding-bottom: 7%;">
													<i class="pay-icon pay-icon-visa"></i>
													<i class="pay-icon1 pay-icon-mastercard"></i>
													<i class="pay-icon pay-icon-tt"></i>
													<i class="pay-icon pay-icon-e-checking"></i>
  											</div>
  								</div>

							</div>
  			</div>
  			<div class="col-sm-12 col-md-12">
  						<p class="td-em-head">Let the supplier know your preferred Buyer Protection coverage.</p>
  						<div class="member-email-box" style="min-height: 330px; max-height: 400px; ">
  						<p class="drag-p" style="color: #FC5E15; text-align: left;padding-left: 2%; padding-bottom: 0;">On-time shipment safeguard</p>
  						<p class="drag-p" style="text-align: left; font-size: 11px; color: #666; padding-left: 2%;">You will be protected for the covered amount of your order. If the supplier does not ship on time according to the standards set in your contract, you will be refunded.</p>
  						<p class="drag-p" style="color: #FC5E15; text-align: left;padding:0; margin:0;padding-left: 2%; padding-bottom: 1%;">Product quality safeguard</p>
  						<div class="col-sm-12 col-md-12 col-xs-24 padding_0">
  								<div class="col-sm-4">
        							<div class="checkbox">
         							 <label style="padding-left: 8%;"><input type="radio" value="pre_shipment" name="delivery_type"> Pre-shipment coverage</label>
        							</div>
        							<p class="btn-p">You will be protected for the covered amount of your initial payment. Please check the quality of your products before shipment.</p>
  						    </div>
  						<div class="col-sm-8">
        						<div class="checkbox">
         							 <label style="padding-left: 8%;"><input type="radio" value="post_delivery" name="delivery_type" checked> Post-delivery coverage</label>
        							</div>
        							<p class="btn-p">You will be protected for the covered amount of your total payment. Please check your product quality within 15 days of clearing customs.</p>
  						</div>
  							
  						</div>
  						<div class="col-sm-12 col-md-12 col-xs-24 padding_0">
  									<p class="drag-p" style="width: 90%; margin-left: 5%; padding-bottom: 3%; padding-top: 2%;"><span style="font-size: 18px;">Covered amount:</span> <span style="font-size: 24px;color: #ff7519;">US $ <span id="covered_amount">0.00</span></span> <span style="color: #ff7519;">(This amount must be confirmed by the supplier.)</span></p>
  						</div>
  						
  			</div>
  			</div>
  			<div class="col-sm-12 col-md-12">
  						<p class="drag-p" style="font-size: 15px;padding-left: 10%; text-align: left;"><label><input type="checkbox" class="checkbox_check" checked> I have read and agree to abide by the <a href=""> Buyer Protection</a></label><br>
                <span class="checkbox_error text-danger">Please enter the Ensure the terms of trading integrity.</span>
              </p>
  						<div style="margin-left: 45%;">
  							<input type="submit" style="background:#19446F;border-radius: 5px !important;"  name="submitButton" class="btn btn-primary btn-lg pull-left"  value="Submit">
  						</div>
  						
  						
  			</div>
  		</form>

  			<div id="succ-msg-box">
  					<h4 style="font-size: 13px; color:green;padding: 20px 5px;">Your Record submit is processing successfully</h4>
  		</div>
  </div>
 @stop
 @section('scripts')
 <script type="text/javascript">

  $('.show_error').hide();
  $('.checkbox_error').hide();
  $('.email_check').hide();

		 $(document).ready(function(){
       $("#trade-close").click(function(){
         $(".trade-buy-box").hide();
       });
	 });

/***file attachment***/

$(".buyer_file").click(function (e) {
  e.preventDefault();
  $(this).parent().children('.file_buyer').trigger('click');
});

$(document).on('change','.file_buyer',function(){
  var href = $(this).val().replace(/C:\\fakepath\\/i, '');
  $(this).parent().children('.file_buyer').html(href);
});
/***file attachment***/

$(document).on({blur:function(){
  if($.trim($(this).val()) == ''){
    $(this).parent().children('.show_error').show();
  }else{
    $(this).parent().children('.show_error').hide();
  }
}},'.error_control');

$(document).on({click:function(e){
    if ($('.checkbox_check').prop('checked') == true){
        $('.checkbox_error').hide();
    }else{
        $('.checkbox_check').focus();
        $('.checkbox_error').show();
    }
}},'.checkbox_check');

$(document).on({keyup:function(event){
    // Allow: backspace, delete, tab, escape, and enter
      if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
              // Allow: Ctrl+V
              (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||  
              // Allow: Ctrl+c
              (event.ctrlKey == true && (event.which == '99' || event.which == '67')) || 
              // Allow: Ctrl+A
          (event.keyCode == 65 && event.ctrlKey === true) || 
           // Allow: home, end, left, right
          (event.keyCode >= 35 && event.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }

  var currentEl = $(this);
  var value = $(currentEl).val();

  // remove letters...
  value = value.replace(/[^0-9.-]/g, "");

  var hasDecPlace = value.match(/\./);

  // separate integer from decimal places:
  var pieces = value.split('.');
  var integer = pieces[0].replace('-', '');
  var decPlaces = ""
  if (pieces.length > 1)
  {
    pieces.shift();
    decPlaces = pieces.join('').replace('-', '');
  }

  // handle numbers greater than 12.00... :
  if (parseInt(integer) > 100000 || parseInt(integer) === 100000 && parseInt(decPlaces) > 0)
  {
    integer = "100000";
    decPlaces = getZeroedDecPlaces(decPlaces);
    alert("number must be between 0.00 and 100000.00");
  } // ...and less than 0:
  else if (parseInt(integer) < 0)
  {
    integer = "0";
    decPlaces = getZeroedDecPlaces(decPlaces);
    alert("number must be between 0.00 and 100000.00");
  }

  // handle more than two decimal places:
  if (decPlaces.length > 2)
  {
    decPlaces = decPlaces.substr(0, 2);
    alert("number cannot have more than two decimal places");
  }

  var newVal = hasDecPlace ? integer + '.' + decPlaces : integer;

  $(currentEl).val(newVal);
}},'.check_number');

function getZeroedDecPlaces(decPlaces) {
  if (decPlaces === '') return '';
  else if (decPlaces.length === 1) return '0';
  else if (decPlaces.length >= 2) return '00';
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

$(document).on({blur:function(){
  if($.trim($(this).val()) != ''){
    if(validateEmail($(this).val())){
      $('.email_check').hide();
    }else{
      $('.email_check').show();
    }
  }else{
    $('.email_check').hide();
  }
}},'#email_check');

// $(document).on({
//     blur: function(e) {
//       var email=$(this).val();
//       alert(email);
//     }
// }, '.email_check');

// $( "#email_check" ).blur(function() {
//   alert( "Handler for .blur() called." );
// });

function myFunction(email)
 {
    // alert (email.value);
    $.post("biz-bdtdc/order-protect-post", function(email){
        alert(email);
    });
}
// function myFunction() {
//   alert(email);
//     // var email = document.getElementById("email_check");
//     // email.value = email.value();
// }
</script>
@stop 