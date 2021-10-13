@extends('mobile-view.layout.master_m')
	@section('content')
	<div class="row" style="background: #fff; margin-bottom: 28px; padding-bottom: 3%;">
			 <div class="header-wrap-mess"><p class="cat-pr-list">Messanger</p></div>
			 <div id="atm-title">
			   <p style="font-size: 16px; line-height: 20px;">Recent</p>
			 </div>
			 <div id="atm-list">
			 		<div class="atm-item">
			 			<div class="atm-item-img ">
			 				<div class="avatar">
			 					
			 				</div>
			 			</div>
			 		    <div class="item-txt-msg">
			 		    		<p style="font-size: 15px; line-height: 20px; padding-top: 18px;">What is your best price for Original Xia...</p>
			 		    </div>
			 		</div>
			 </div>
			 <div id="atm-list">
			 		<div class="atm-item">
			 			<div class="atm-item-img ">
			 				<div class="avatar">
			 					
			 				</div>
			 			</div>
			 		    <div class="item-txt-msg">
			 		    		<p style="font-size: 15px; line-height: 20px; padding-top: 18px;">factory hot 1.54inch bluetooth smart wat...</p>
			 		    </div>
			 		</div>
			 </div>
			 <div id="atm-title">
			   <p style="font-size: 16px; line-height: 20px; text-align: center;">See More</p>
			 </div>
			 <div>
			 		<div>
			 			<img src="{!!asset('resources/assets/images/message-not-found.png')!!}">
			 		</div>
			 </div>
	</div>
@stop