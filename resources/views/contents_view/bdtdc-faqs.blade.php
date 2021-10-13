@extends('fontend.master_dynamic')
		@section('page_css')
	<link property='stylesheet' href="{!! asset('css/about-page.css') !!}" rel="stylesheet">
	<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/new-user-guide-style.css') !!}" rel="stylesheet">
	@endsection
	@section('content')
	</div>
	@include('Aboutus.bdtdc-about-us-header')
<div class="container">
  <div class="row">
		<div class="col-md-10 padding_0" style="padding-bottom: 1%;margin-top: 1%;">
			<ul style="margin-left: -2%" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li style="float: left" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{ URL::to('/',null) }}" style="color: #000"><span itemprop="name">Home &nbsp;</span> </a></li><li style="float: left"><a itemprop="item" href="{{URL::to('about-us',null)}}" style="color: #000"> <i class="fa fa-angle-right"></i><span itemprop="name">About Us </span> <i class="fa fa-angle-right"></i></a></li>
			<li style="float: left"><a itemprop="item" href="#" style="color: #000"><span itemprop="name">FAQ</span> <i class="fa fa-angle-right"></i></a></li></ul>
		</div>
	</div>
	<div class="row padding_0" id="faqs" style="padding-top: 0">
			<div class="col-sm-12 col-md-12 padding_0">
				<h1 class="faq-title">FREQUENTLY ASKED QUESTIONS</h1>
			</div>
			<div class="col-sm-12 col-lg-12 col-md-12 padding_0">
						<div>
							<div>
								<h2 class="hd-cl hide-cont-coporate" id="coporate">Corporate Information</h2>
						   </div>
						   <div class="faq-title-section">
						   		<div>
						   			 <h2 class="groupTitle">What is BuyerSeller Group's mission?</h2>

									<div class="group_Content">
											Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
									</div>
						   		</div>
						    <div>
								<h2 class="groupTitle">What is BuyerSeller Group's mission?</h2>
							
								<div class="group_Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
							</div>
							<div>
								<h2 class="groupTitle">Who are BuyerSeller Group's customers?</h2>
								<div class="group_Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
							</div>
							<div>
								<h2 class="groupTitle">What do you mean when you refer to the "BuyerSeller ecosystem"?</h2>
								<div class="group_Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							     </div>
							  </div>
							  <div>
								<h2 class="groupTitle">How does BuyerSeller Group make money?</h2>
								<div class="group_Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						      </div>
						      </div>
						</div>
					<div>
							<div>
						
								<h2 class="hd-cl-nd hide-cont-operate" id="busi-oper">Business Operations</h2>
						   </div>
						   <div class="faq-title-section">
						   <div>
							  <h2 class="business-Title">What is BuyerSeller Group's core business?</h2>
						
							 <div class="business-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						    </div>
						    <div>
								<h2 class="business-Title">Who are BuyerSeller Group's customers?</h2>
							
								<div class="business-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						  </div>
						  <div>
								<h2 class="business-Title">What do you mean when you refer to the "BuyerSeller ecosystem"?</h2>
								<div class="business-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						</div>
						<div>
								<h2 class="business-Title">How does BuyerSeller Group make money?</h2>
								<div class="business-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							     </div>
						</div>
						<div>
								<h2 class="business-Title">How does BuyerSeller Group grow its business?</h2>
								<div class="business-Content">
								Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
				 			 </div>
			      			</div>
			    		 </div>
				   </div>
				<div>
							<div>
						
								<h2 class="hd-cl-rd hide-cont-invest" id="invest-info">Investor Information</h2>
						   </div>
						   <div class="faq-title-section">
						   <div>
							  <h2 class="invest-Title">When was BuyerSeller Group's initial public offering (IPO)?</h2>
						
							 <div class="invest-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						    </div>
						    <div>
								<h2 class="invest-Title">Where is BuyerSeller Group traded and what is the ticker symbol?</h2>
							
								<div class="invest-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						  </div>
						  <div>
								<h2 class="invest-Title">When is your next annual shareholder meeting?</h2>
								<div class="invest-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						</div>
						<div>
								<h2 class="invest-Title">What is the dividend policy of BuyerSeller Group?</h2>
								<div class="invest-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							     </div>
						</div>
						<div>
								<h2 class="invest-Title">How can I receive updates on investor news concerning BuyerSeller Group?</h2>
								<div class="invest-Content">
								Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
				 			 </div>
			      			</div>
			    		 </div>
				</div> 
				 <div>
							<div>
						
								<h2 class="hd-cl-4th hide-cont-finance" id="finan-report">Financial Reporting</h2>
						   </div>
						   <div class="faq-title-section">
						   <div>
							  <h2 class="finance-Title">How can I get a copy of the annual report of BuyerSeller Group?</h2>
						
							 <div class="finance-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						    </div>
						    <div>
								<h2 class="finance-Title">How do I know when BuyerSeller Group releases its next financial results?</h2>
							
								<div class="finance-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						  </div>
						 
						
						<div>
								<h2 class="finance-Title">When is the fiscal year end of BuyerSeller Group?</h2>
								<div class="finance-Content">
								Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
				 			 </div>
			      			</div>
			    		 </div>
				</div> 
				<div>
							<div>
						
								<h2 class="hd-cl-fifth hide-cont-governc" id="corporate">Corporate Governance</h2>
						   </div>
						   <div class="faq-title-section">
						   <div>
							  <h2 class="corporate-Title">Who sits on BuyerSeller Group's board of directors?</h2>
						
							 <div class="corporate-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						    </div>
						    <div>
								<h2 class="corporate-Title">What is the BuyerSeller Partnership? Who are the partners of the BuyerSeller Partnership?</h2>
							
								<div class="corporate-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						  </div>
						 
						
						<div>
								<h2 class="corporate-Title">Who is on BuyerSeller Group's management team?</h2>
								<div class="corporate-Content">
								Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
				 			 </div>
			      			</div>
			    		 </div>
				</div>
				 <div>
							<div>
						
								<h2 class="hd-cl-6th hide-cont-info" id="contact-info">Contact Information</h2>
						   </div>
						   <div class="faq-title-section">
						   <div>
							  <h2 class="contact-Title">Who can I contact about investor-related issues?</h2>
						
							 <div class="contact-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							 </div>
						    </div>
						    <div>
								<h2 class="contact-Title">How do I contact your customer service team?</h2>
							
								<div class="contact-Content">
									Our mission is "to make it easy to do business anywhere." Our founders started our company to champion small businesses, in the belief that the Internet would level the playing field by enabling small enterprises to leverage innovation and technology to grow and compete more effectively in the domestic and global economies.
							   </div>
						  </div>

			    		 </div>
				</div> 
		</div>
					
	</div>
			
@stop
@section('extra_scripts')
<script type="text/javascript">

	$(document).ready(function(){
		$("#coporate").click(function(){

			 $(".hd-cl").toggleClass("hd-clmini");
   			 $(".groupTitle").toggle("slow");
   		 });
			$( ".groupTitle" ).click(function() {
					 $(this).parent().children('div.group_Content').toggle("slow");
			});
			 $(".hide-cont-coporate").click(function(){
			 	$('.group_Content').css({display:'none'});
 
            });

   });
	$(document).ready(function(){
		$("#busi-oper").click(function(){
			 $(".hd-cl-nd").toggleClass("hd-clmini-nd");
   			 $(".business-Title").toggle("slow");
   		 });
			$( ".business-Title" ).click(function() {
					 $(this).parent().children('div.business-Content').toggle("slow");
			});
			$(".hide-cont-operate").click(function(){
			 	$('.business-Content').css({display:'none'});
 
            });
	});
	$(document).ready(function(){
		$("#invest-info").click(function(){
			 $(".hd-cl-rd").toggleClass("hd-clmini-rd");
   			 $(".invest-Title").toggle("slow");
   		 });
			$( ".invest-Title" ).click(function() {
					 $(this).parent().children('div.invest-Content').toggle("slow");
			});
			$(".hide-cont-invest").click(function(){
			 	$('.invest-Content').css({display:'none'});
 
            });
	});
	$(document).ready(function(){
		$("#finan-report").click(function(){
			 $(".hd-cl-4th").toggleClass("hd-clmini-4th");
   			 $(".finance-Title").toggle("slow");
   		 });
			$( ".finance-Title" ).click(function() {
					 $(this).parent().children('div.finance-Content').toggle("slow");
			});
			$(".hide-cont-finance").click(function(){
			 	$('.finance-Content').css({display:'none'});
 
            });
	});
	$(document).ready(function(){
		$("#corporate").click(function(){
			 $(".hd-cl-fifth").toggleClass("hd-clmini-fifth");
   			 $(".corporate-Title").toggle("slow");
   		 });
			$( ".corporate-Title" ).click(function() {
					 $(this).parent().children('div.corporate-Content').toggle("slow");
			});
			$(".hide-cont-governc").click(function(){
			 	$('.corporate-Content').css({display:'none'});
 
            });
	});
	$(document).ready(function(){
		$("#contact-info").click(function(){
			 $(".hd-cl-6th").toggleClass("hd-clmini-6th");
   			 $(".contact-Title").toggle("slow");
   		 });
			$( ".contact-Title" ).click(function() {
					 $(this).parent().children('div.contact-Content').toggle("slow");
			});
			$(".hide-cont-info").click(function(){
			 	$('.contact-Content').css({display:'none'});
 
            });
	});



</script>
@stop