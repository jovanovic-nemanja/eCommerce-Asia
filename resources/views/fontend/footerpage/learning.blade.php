@extends('fontend.master_dynamic')
    @section('page_css')
      <link property='stylesheet' href="{!! asset('css/for-suppliers/learning-center.css') !!}" rel="stylesheet">
      <link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/learning-center.css') !!}" rel="stylesheet">
    @endsection
@section('content')
<div class="row" style="margin-bottom: 8px">
      <ul class="top-path" style="padding-bottom: 8px;">
                        <li class="top-path-li"><a itemprop="url"  href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a itemprop="url" href="{{URL::to('ServiceChannel/pages/for_buyer',35)}}" class="top-path-li-a">Help Center <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a itemprop="url"  href="{{URL::to('SupplierChannel/pages/learning_center',33)}}" class="top-path-li-a">Learning Center<i class="fa fa-angle-right top-path-icon"></i></a></li>
                       
          </ul>
</div>
<div class="row" style="background-color: #fff; margin-top: 1px; padding-top: 5px;">
       <ul class="nav nav-tabs" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
          <li class=""><a itemprop="url"  href="{!! URL::to('SupplierChannel/pages/seller_channel',40) !!}">Seller Channel</a></li>
          <li><a itemprop="url"  href="{!!URL::to('SupplierChannel/pages/suppliers_memebership/30')!!}">Seller Memberships</a></li>
          <li><a itemprop="url"   href="{!! URL::to('SupplierChannel/pages/training_center',32) !!}">Training</a></li>
          <li class="active"><a itemprop="url"  href="{!! URL::to('FooterPage/pages/Learning_Center',32) !!}">Learning Center</a></li>
          <li ><a itemprop="url"  style="" href="{!! URL::to('success/stories') !!}">Success Stories</a></li>
       </ul>
</div>

<!-- first content start -->
<div class="row learn-head-row">
        <p class="head-start"><a itemprop="url"  href="{{ URL::to('join') }}" >
Quick Start</a>The basic steps you should start with,while you newly join Gold Suppliers.</p>
    </div>
    <div class="row learn-cont-row" style="padding-bottom:40px;">
        <div class="col-sm-12 col-md-12">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image1.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="width: 100%;"><a itemprop="url"  href="{{route('buyer.guide-bdsource')}}" target="_blank">How to use BdSource <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/l-new.gif') !!}" alt=""></a><br>
            How to source manufacturers and suppliers at BuyerSeller
            at BuyerSeller. We connect wholesale buyers and sellers of all manufacturing products and commodities around the world.
            Post a RFQ (Request for Quotation), you are searching to thousands of manufacturers and suppliers at BuyerSeller.

            </p>
             <div class="videoclick" data-video_id="uq7thJX_bKE"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
            
        </div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image3.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{route('get.qutations')}}" target="_blank">How to Send RFQ</a><br></p>
           <p class="cont-right">
            Tell us more about your buying requirement with product name, sourcing type, quantity, port of delivery, payment terms and any special instructions for the suppliers.
            Please see the zip file which has 9 pages. Please improve and create our current “http://buyerseller.asia/get-quotations" page similar to https://www.go4worldbusiness.com/buylead/new
            With verification.
           </p>
            <div class="videoclick" data-video_id="nua9YhBMlyA"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
            
</div>
  </div>            
</div> 
  <div class="row learn-cont-row" style="padding-bottom:40px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/images/how-to-buy-product-bdtdc.jpg') !!}" alt="how to buy product bdtdc">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn"><a itemprop="url"  href="{{URL::to('how-to-buy')}}" target="_blank">How to buy product from BuyerSeller <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/l-new.gif') !!}" alt=""></a><br>
            What are Multi-language sites</p>
             <div class="videoclick" data-video_id="L8ye44GKnp0"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
           
         </div>
        <div class="col-sm-2 col-xs-4">
            <div class="learn-image">
                    <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/user-join-bdtdc.jpg') !!}" alt="">
            </div>
        </div>
        <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('how-to-join')}}" target="_blank">How to join BuyerSeller</a><br></p>
           <p class="cont-right">
                1. Simply go to buyerseller.asia and click on “Join Free”. <br/>
                2: Enter your Email address and verify that you own it. <br/>
                3: Fill out your basic information. <br/>
                4. Password, location, first name, last name, and telephone number<br/>
                5. Confirm your personal information and complete the opening of your new BuyerSeller account.<br/>

           </p>
        <div class="videoclick" data-video_id="RrOLf58R2lA"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
           
</div>
            
        </div> 
        
<div class="row learn-cont-row2" style="padding-bottom:40px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image2.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('Company/profile')}}" target="_blank">Create a Company Profile on BuyerSeller.Asia</a><br>
            our Company Profile tells potential customers your business type, products/services you offer, and other background information. </p>
             <div class="videoclick" data-video_id="S3iRfT3bcUs"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
           
        </div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image4.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('buying-request')}}">How to Send Inquiry </a><br></p>
           <p class="cont-right">
           There are three ways to contact every supplier on BuyerSeller. You can click “Contact Supplier,” “Contact us,” or “Chat Now.” Choosing “Contact Supplier” is a quick and easy option, also you can chat with “BuyerSeller” or “Suppliers”.
           </p>
            
            <div class="videoclick" data-video_id="6qajiu4Ezpc"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
            
        </div> 

<!-- first content end -->
<!-- second content start -->
<div class="row learn-head-row" style="margin-top:28px">
        <p class="head-start"><a itemprop="url"  href="#" >
Advanced Tips</a> Learn ways to search for buyers and promote products,etc.,on BuyerSeller.Asia</p>
    </div>
        <div class="row learn-cont-row" style="padding-bottom:40px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image5.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn"><a itemprop="url"  href="{{URL::to('Training-course')}}" target="_blank">Learn about Dashboard <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/l-new.gif') !!}" alt=""></a><br>
            Buyers like the quotations with high quality. It is important to reply RFQs better to get buyers' response quickly. </p>
            <div class="videoclick" data-video_id="h2DoU7rOLfw"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image6.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('Business/trend-in-Bangladesh')}}" target="_blank">Overall Information of BuyerSeller.Asia <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/hot.jpg') !!}" alt="hot"></a><br></p>
           <p class="cont-right">Product information quality is one of the factors influencing product ranking. Making high quality products can help you get more exposure from potential buyers.</p>
              <div class="videoclick" data-video_id="h2DoU7rOLfw"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
      </div>
            
        </div> 
        
<div class="row learn-cont-row2" style="padding-bottom:40px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image7.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('Buyer/Training')}}" target="_blank">How to Quote against RFQ</a><br>
           Keep up with the buyers' purchase behaviors and expectations so that you can maximize your business opportunities.  </p>
            
             <div class="videoclick" data-video_id="S0ReAf9RtLQ"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image8.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <div class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('How-to-respond-buyer-inquiries')}}" target="_blank">How to Respond to Buyer Inquiries </a><br></div>
           <p class="cont-right">In case you receive many inquiries but not knowing who to reply first, let's see how we can screen and classify the inquiries so that we can set different.. </p>
            <div class="videoclick" data-video_id="l7CAqlqpIF4"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
            
        </div> 
<!-- second content end -->
<!-- Third content start -->
<div class="row learn-head-row" style="margin-top:28px;">
        <p class="head-start"><a itemprop="url"  href="#" >
Safe Trading Tips</a>  Key information about account security,our posting policies and guidelines.
  </p>
    </div>
    <div class="row learn-cont-row2" style="padding-bottom:35px;margin-bottom:28px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image9.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-8">
            <p class="p-learn"><a itemprop="url"  href="{{URL::to('how-to-deal')}}" target="_blank">As a Buyer, what are the services I can expect to receive from Buyer Seller</a><br>
           Phishing messages are usually sent by email or by instant messenger. How to Recognize and Deal with Phishing Emails? Here are some guidelines for you.  </p>
           
            <div class="videoclick" data-video_id="lUMGwjfNJdk"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image10.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('complaint-letter')}}" target="_blank">How to Create E-store
</a><br></p>
           <p class="cont-right">How to report suspected transaction disputes, product information in violation of our policies on Complaint Center. </p>
             <div class="videoclick" data-video_id="015lBgPeEJE"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
</div>
            
        </div> 
  <div class="row learn-head-row" style="margin-top:28px;">
        <p class="head-start"><a itemprop="url"  href="#" >
Safe Trading Tips</a>  Key information about account security,our posting policies and guidelines.
  </p>
    </div>
        <div class="row learn-cont-row2" style="padding-bottom:35px;margin-bottom:28px;">
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image9.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-8">
            <p class="p-learn"><a itemprop="url"  href="{{URL::to('how-to-deal')}}" target="_blank"> Why should I upgrade to a Gold Membership Package</a><br>
           Phishing messages are usually sent by email or by instant messenger. How to Recognize and Deal with Phishing Emails? Here are some guidelines for you.  </p>
         <div class="videoclick" data-video_id="BXORe17mFzU"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
            <!-- <h4 class="p-video-second"><a itemprop="url"  href="https://www.youtube.com/watch?v=BXORe17mFzU">Video</a></h4> -->
        </div>
                <div class="col-sm-2 col-xs-4">
                    <div class="learn-image">
                     <img itemprop="image" src="{!! asset('assets/fontend/bdtdc-images/learn-image10.jpg') !!}" alt="">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-6">
            <p class="p-learn" style="text-align:left;"><a itemprop="url"  href="{{URL::to('complaint-letter')}}" target="_blank">How to upgrade to a Gold Membership Package</a><br></p>
           <p class="cont-right">How to report suspected transaction disputes, product information in violation of our policies on Complaint Center. </p>
           <div class="videoclick" data-video_id="015lBgPeEJE"><img style="cursor: pointer;" itemprop="image" src="{!! asset('assets/fontend/aboutus-images/Video-ICON.png') !!}" alt=""><span><i class="fa fa-play" style="font-size: 14px;color: #fff; padding-left: 6px;"></i></span></div>
            <!-- <h4 class="p-video-second"><a itemprop="url"  href="https://www.youtube.com/watch?v=015lBgPeEJE">Video</a></h4> -->
</div>
            
        </div>
<div id="video-gallery" style="display: none;">
  <iframe style="width:100%; height:315px;" src="https://www.youtube.com/embed/BXORe17mFzU" ></iframe>
 <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/SP-UANM_moo" frameborder="0" allowfullscreen></iframe> -->
</div> 
        
<!-- third content end -->
@stop
@section('scripts')
<script type="text/javascript">
     $(function() {
    $( "#video-gallery" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
 
    $( ".videoclick" ).click(function() {
      var myvideo=$(this).attr('data-video_id');
      var videolink="https://www.youtube.com/embed/";
      $('#video-gallery iframe').attr("src",videolink+myvideo);
      $( "#video-gallery" ).dialog( "open" );
    });
  });
</script>
@stop