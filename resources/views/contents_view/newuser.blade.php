@extends('fontend.master_dynamic')
    @section('page_css')
    <link property='stylesheet' href="{!! asset('css/customer-service/for-new-user.css') !!}" rel="stylesheet">
    @endsection
@section('content')
<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;">
                        <li class="top-path-li"><a href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a href="{{URL::to('FooterPage/pages/Help_Center',19)}}" class="top-path-li-a">Help Center<i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a href="{{URL::to('ServiceChannel/pages/for_new_user',38)}}" class="top-path-li-a">New User<i class="fa fa-angle-right top-path-icon"></i></a></li>
                    </ul>
            </div>
    
  </div>
<div id="item_sha" class="row">
    
      <div class="col-sm-12">
        <ul class="nav nav-pills nav-justified">
          <li><a href="#new_user_1"><b>Introduction</b></a></li>
          <li><a href="#new_user_2" id="how"><b>How to Source</b></a></li> 
          <li><a href="#new_user_3"><b>Our Services</b></a></li>
          <li><a href="#new_user_4"><b>Buyer Stories</b></a></li>
          <li class="active" ><a href="{{URL::to('/',null)}}"><b>Get Started</b></a></li>
        </ul>
          
      </div>  
    
</div>

<div  id="image" class="row">
  <div  class="col-sm-12" id=" new_user_1">
   
      <p style="font-size: 52px;line-height: 60px;font-weight: 700;color: #255E98;height: 60px;margin: 100px 0 0;padding-left:390px;">
             BuyerSeller.Asia
      </p>
      <p style="font-size: 35px;line-height: 46px;color: #255E98;height: 46px;margin: 0 0 32px;padding-left: 26%;">
            Trade Safely With The World
      </p>
      <p style="font-size: 24px;line-height: 26px;color: #333;font-weight: 500;padding-left: 32%;">
             <img style="height:30px;width:30px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />Check Out Our New Service:
      </p>
      <p style="font-size: 24px;color: #333;font-weight: 500;padding-left: 34.5%;padding-top:0px;">
             Buyer Protection
      </p>
      <p style="display: inline-block;font-size: 12px;color: #666;padding-left:35%;">
             On-time shipment and pre-shipment product quality safeguards
      </p>
      <br>
      <p style="display: inline-block;font-size: 12px;color: #666;padding-left:35%;">
            Refund up to the covered amount agreed with your supplier
      </p>
      <ul>
           <li class="active" style="display: block;font-size: 16px;line-height: 22px;color: #1686cc;height: 22px;margin: 0 0 100px;padding-left: 32.5%;"><a href="#">
                 <b>Learn More > </b></a></li>
      </ul>
  </div>
       
  
</div>

<div  id="item_sha" class="row"style="padding-top:20px;">
    <div class="col-md-3"></div>
    <center>
    <div class="col-md-6" id="new_user_2" style="padding-bottom:30px;">
      <p style="color: #333;font-size:38px;padding-left:3px;line-height: 46px;padding-top:40px;">2 ways to find your products</p><br>
      
      <div class="col-md-4" style="font-size: 14px;line-height: 26px;padding: 0 20px;display: inline-block;none;">
            42<p>Product Categories</p></div>
      <div class="col-md-4"style="font-size: 14px;line-height: 26px;padding-right: 0px 20px;border-left: 1px solid #dae2ed;display: inline-block;float: none;">
            240<p>Countries & Regions</p></div>
      <div class="col-md-4" style="font-size: 14px;line-height: 26px;padding-right: 0px 20px;border-left: 1px solid #dae2ed;display: inline-block;">
            Millions<p>Buyers & Suppliers</p></div>
     
     
    </div>
     </center>
    <div class="col-md-3"></div>
</div>
<br>
<div  class="row">
    
    <div class="col-sm-6 padding_0" style="background:#fff!important;border-radius:5px!important;padding-right:0px;">
          <div class="col-sm-12;background:white;">
                <p style="background:white;margin-left:20px;margin-right:20px;font-size:20px;font-weight:700;text-indent: 40px;text-align: left;display: table-cell;vertical-align: middle;color:#1D4772;padding-bottom:30px;padding-top:20px;">
              Find Suppliers
        </p>
          </div>
        
         <div  id="footer-shadow" class="col-sm-6" style="background:#1D4772;padding-bottom:15px;color:white;">
          <p style="padding-top:15px;font-weight:700;font-size:15px;color:#499ED3;">
          <a href="#" style="color:#fff!important;">
               <img style="height:1%;" src="{!! asset('assets/helpcenter/images/icon-search.png') !!}" alt="" />
               Search</a>
               </p>
         </div>
         <div  id="footer-shadow" class="col-sm-6" style="background:#1D4772;padding-bottom:15px;color:white;">
            <p style="padding-top:15px;font-weight:700;font-size:15px;color:#499ED3;">
              <a href="{{URL::to('Marketplace')}}" style="color:#fff!important;">
                  <img style="height:1%;" src="{!! asset('assets/helpcenter/images/icon-browse.png') !!}" alt="" />
                  Browse categories</a></p>
         </div>
         
    </div>
   
    <div class="col-sm-6 padding_0" style=";margin:0px;border-radius:5px!important;padding-left:10px;">
        <div id="col-sm-12 padding_0" style="background:#fff!important;padding-bottom:30px;"> 
            <p style="font-size:20px;font-weight:700;text-indent: 40px;text-align: left;display: table-cell;vertical-align: middle;color:#1D4772;padding-top:20px; ">
                  Or Let Suppliers Find You
            </p>
        </div>
        <div id="col-sm-12 padding_0" style="margin-bottom:0px;background:#007FCB;padding-bottom: 10px;padding-top:10px;">
              
                    <a href="#" style="color:#fff!important;" >
                    <p style="padding-bottom:11px;padding-left:40px;font-weight:700;font-size:15px;">
                      <a href="{{URL::to('get_qutations')}}" style="color:#fff! important;">
                        Get Quotations Now 
                      </a>
        <img style="height:2%;padding-left:270px;" src="{!! asset('assets/helpcenter/images/icon-arrow-right.png') !!}" alt="" />
        </a>
        </p>
        </div>
        
    </div>
    
</div>
<br>
<!-- <div class="row" style="margin-top:10px;">
    <div class="col-sm-3 "></div>
    <div id="item_sha" class="col-sm-6" style="padding: 10px;border-right: 1px solid #d9d9d9;font-size: 14px;color: #666;border-radius:5px!important;">
        <div  id="footer-shadow" class="col-sm-5"><p>Identify the suppliers with these badges</p></div>
        <div class="col-sm-7">
           <img style="height:60px;width:60px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />
           <img style="height:60px;width:60px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />
           <img style="height:60px;width:60px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />
           <img style="height:60px;width:60px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />
        </div>
    </div>
    <div class="col-sm-3 "></div>
</div>
<br> -->
<div  id="new_user_3" class="row" style="margin-top:30px;background-color:#fff!important;">
    <center><p style="color: #333;font-size:37px;padding-left:3px;line-height: 46px;font-weight: 500;padding-bottom:45px;padding-top:20px;">
      Services to make your trading easier</p></center>
    <div id="col-sm-12">
          <center>
    <div class="col-sm-4">
     <img style="height:160px;width:160px;" src="{!! asset('assets/helpcenter/images/Trade_Assurance_Socks.png') !!}" alt="" />
        <p style="font-size: 20px;font-weight: 500;line-height: 45px;color: #333;clear: left;">Trade Assurance</p>
        <p style="width: 85%;color: #999;font-size: 14px;line-height: 22px;padding-bottom:15px;"><a href="{{URL::to('FooterPage/pages/Trade_Assurance/36')}}">On-time shipment and pre-shipment</a>
         product quality safeguards. Refund up to the covered amount agreed with your supplier
        </p>
    </div>
    <div class="col-sm-4">
       <img style="height:160px;width:160px;" src="{!! asset('assets/helpcenter/images/Business Identity.png') !!}" alt="" />
        <p style="font-size: 20px;font-weight: 500;line-height: 45px;color: #333;clear: left;">Inspection Service</p>
        <p style="width: 85%;color: #999;font-size: 14px;line-height: 22px;padding-bottom:15px;"><a href="{{URL::to('FooterPage/pages/Inspection_Service/39')}}">Have your order inspected</a>
        at factory or port by independent companies, approved by BuyerSeller.Asia
        </p>
    </div>
    <div class="col-sm-4">
       <img style="height:160px;width:160px;" src="{!! asset('assets/helpcenter/images/trade service.png') !!}" alt="" />
        <p style="font-size: 20px;font-weight: 500;line-height: 45px;color: #333;clear: left;">e-Credit Line</p>
        <p style="width: 85%;color: #999;font-size: 14px;line-height: 22px;padding-bottom:15px;"><a href="{{URL::to('FooterPage/pages/Secure_Payment/37')}}">Boost your purchasing power</a>
        with up to US $2,000,000 credit on 120-day Open Account terms
        </p> 
    </div>
    </center>
</div>
</div>

<div  id="new_user_4" class="row" style="padding-top:60px;">
    <div id="item_sha" class="col-sm-3" style="border:0 none;padding-bottom:12px;">
          <img style="height:260px;width:100%;border: 1px solid #ddd;;" src="{!! asset('assets/helpcenter/images/1.jpg') !!}" alt="" />
    </div>
    <div id="item_sha" class="col-sm-3" style="border:0 none; padding-bottom:12px">
          <img style="height:260px;width:100%;border: 1px solid #ddd; ;" src="{!! asset('assets/helpcenter/images/2.jpg') !!}" alt="" />
    </div>
    <div id="item_sha" class="col-sm-3" style="border:0 none; padding-bottom:12px;">
          <img style="height:260px;width:100%;border: 1px solid #ddd; " src="{!! asset('assets/helpcenter/images/4.jpg') !!}" alt="" />
     </div>
    <div id="item_sha" class="col-sm-3" style="border:0 none; padding-bottom:12px;">
          <img style="height:260px;width:100%;border: 1px solid #ddd; " src="{!! asset('assets/helpcenter/images/3.jpg') !!}" alt="" />
    </div>
    
</div>
<br>
<div class="row" style="padding-top:40px;padding-bottom:30px; background-color: #fff;">
      <div class="col-sm-4">
            <q style="font-size: 15px;line-height: 20px;padding: 9px 0;color: #999; padding-top:30px;">
                  We were so excited about the product that we didn't want to tell anyone
            </q>     
      </div>
      <div class="col-sm-4">
           <q style="font-size: 15px;line-height: 20px;padding: 9px 0;color: #999;padding-top:30px;">
                 Straight to the factory,to the farms...we don't have to go through middle men!
                 </q> 
      </div>
      <div class="col-sm-4">
          <q style="font-size: 15px;line-height: 20px;padding: 9px 0;color: #999;padding-top:30px;">
                We worked closely with our BuyerSeller.Asia suppliers throughout the years</q>  
      </div>
</div>
<div class="row  padding_0"  style="background-color: #fff; padding-bottom: 5%;">
    <div class="col-sm-3"></div>
    <div class="col-sm-9" style="padding-left: 9%;">
        
    <a href="{{URL::to('/')}}" style="color:#fff! important;">
    <button class="btn btn-warning" type="button" style="border-radius:5px!important;width: 395px;height: 50px;margin-right:0px;background: #1D4772;font-size: 20px;line-height: 50px;padding-bottom:56px;">
          
                <p style="padding-bottom:10px;color:#fff!important;">
                  Start Now</p>
    </button>
    </a>
    <!-- <button class="btn btn-default" type="button" style="border-radius:5px!important;width: 186px;height: 48px;border: 1px solid #c6cad1;font-size: 18px;line-height: 48px;color: #333;padding-bottom:56px;">
          <a href="#">
                <p style="padding-bottom:10px;color:#1D4772;">Learn More</p>
          </a> -->
    </div>
    
</div>

<br>
@stop
@section('scripts')
<script type="text/javascript">
$(function() {
/**
 * the element
 */
var $ui 		= $('#ui_element');

/**
 * on focus and on click display the dropdown,
 * and change the arrow image
 */
$ui.find('.sb_input').bind('focus click',function(){
    $ui.find('.sb_down')
            .addClass('sb_up')
            .removeClass('sb_down')
            .andSelf()
            .find('.sb_dropdown')
            .show();
});

/**
 * on mouse leave hide the dropdown,
 * and change the arrow imagek
 */
$ui.bind('mouseleave',function(){
    $ui.find('.sb_up')
            .addClass('sb_down')
            .removeClass('sb_up')
            .andSelf()
            .find('.sb_dropdown')
            .hide();
});

/**
 * selecting all checkboxes
 */
$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
    $(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
});

//smooth scrolling
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

});
</script>
@stop