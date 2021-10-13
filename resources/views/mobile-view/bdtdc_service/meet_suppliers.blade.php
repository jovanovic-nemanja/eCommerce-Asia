@extends('mobile-view.layout.master_m')
	@section('content')
<section>
<div class="container">
<div class="row">
	<div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:0px; ">
    	<a href="{{URL::to('product/name')}}" style="text-decoration: none;cursor: context-menu;color: #666; display: block;">
    	<div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
    	</a>
	</div>
    
    <div class="col-sm-12 padding_0">
      <button class="btn btn-default" onclick="window.history.back();" style="width:100%;text-align:center;color: #666;padding:10px;font-size: 20px;padding-top:17px;"><i class="fa fa-reply-all" style="font-size: 30px;" aria-hidden="true"></i></button>
    </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"> <a itemprop="url" href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="url" href="{{URL::to('BuyerChannel/pages/meet_suppliers',13)}}" class="top-path-li-a">Supplier<i class="fa fa-angle-right top-path-icon"></i></a></li>
                        
                    </ul>
            </div>
    
  </div>
	<div class ="row" style="background:#fff;">
    <div class="col-md-12 padding_0">
	    <img itemprop="image" style="width:100%;" class="img-responsive header_img_fix" src="{!!asset('assets/gold/sourcing-specialist.jpg')!!}" alt="sourcing specialis" />
        </div>
       
	   
	</div>
</div>
</section>
<section>
<div class="container">
	<div class="row">
	        <div  class="col-sm-4">
            
               
                    <h5 style="padding-bottom:5%;padding-top:5%; text-align:center; font-size: 13px;"><b>One-stop VIP buyer service</b></h5>
                    <p style="font-size:11px; text-align:left;">Be endowed with one-stop sourcing service comprising  factory visit, sourcing assistance, face-to-face meeting and so on when you are in Bangladesh.</p>
                   
                </div>
                    
            
                 <div  class="col-sm-4">
                    <h5 style="padding-bottom:5%;padding-top:5%;text-align:center; font-size: 13px;"><b>Buyer Seller Sourcing Event</b></h5>
                    <p style="font-size:11px; text-align:left;">Meet coordinated and pre-qualified suppliers assistance, arrange personal get together, visit factories etc. through the exchange fairs held by Buyer Seller.</p>      
              </div>
                <div  class="col-sm-4">
                    <h5 style="padding-bottom:5%;padding-top:5%;text-align:center; font-size: 13px;"><b>Dhaka Sourcing Season</b></h5>
                    <p style="font-size:11px; text-align:left;">Meet with the exact targeted suppliers and discover larger and wider business opportunities during the Dhaka fairs that take place in Dhaka, Bangladesh.</p>
                       
               </div>                        
	</div>
	<div class="row" style="background-color: #ffffff; margin-bottom: 3%;">
	    <div class="col-sm-12" style="padding-left:4px;">
	       <h5><b>Ways in which it work ?</b></h5>  
	    </div>
	   
	    <table class="table table-bordered" style="background:white;">
            <tr style="border-top:2px solid rgba(0,0,0,.2)!important;  border:1px solid rgba(0,0,0,.1)!important;">
                <td>
                   
                        <p style="padding-left:0px;padding-top:10px;margin: 0">
                            <span><i class="fa fa-check" aria-hidden="true"></i></span> Register with Buyer Seller to submit request
                        </p> 
                </td>
                <td  style="background:white;">
                   
                    <p style="padding-left:0px;padding-top:10px;margin: 0">
                      <span><i class="fa fa-check" aria-hidden="true"></i></span> Suppliers are sourced according to the requestWe
                    </p>
                   
                  
                        <img itemprop="image" style="height:1%;"  src="{!!asset('assets/helpcenter/images/bg-line.png')!!}" alt="contact us" />
                
               </td> 
                <td  style="background:white;">
                   
                    <p style="padding-left:0px;padding-top:10px;margin: 0">
                       <span><i class="fa fa-check" aria-hidden="true"></i></span> We find the best supplier match for you
                    </p>
                  
                    
                        <img itemprop="image" style="height:1%;"  src="{!!asset('assets/helpcenter/images/bg-line.png')!!}" alt="contact us" />
                          
                </td>
                <td  style="background:white;">
                    
                        <p style="padding-left:0px;margin: 0"><span><i class="fa fa-check" aria-hidden="true"></i></span>Face-to- Face approach with Pre-matched Suppliers</p>
                </td>
            </tr>
        </table>
        <br>
	    <br><br>
	</div>
	<div class="row" style="background-color: #ffffff;padding: 2%;">
	    <div class="col-sm-12" style="padding: 0 0 0 5px;margin: 0 0 30px;font-size: 18px;line-height: 40px;color: #222;font-weight: bold;
border-bottom: 2px solid #999;">
	    <h5><b>Buyer's Choice</b></h5>
	    </div>
	      <hr>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h2 class="supplier-h2" style="font-size: 16px; padding: 10px 0;">Determined channel for genuine purchasers</h2>
            <p style="font-size: 13px; text-align: left;font-weight: normal; padding:0; margin: 0;">We work with the world&#39;s most famous retailers and brands over broad areas of classified

products such as Design Adornments, Clothing, Endowments, Home Products, Software,

Hardware, Computer, auto parts, Accessories and Footwear, LED, Luggage, Leather Products,

Home Furniture and Decoration, Bags and Cases, Fresh Flowers items and Frozen Seafood.</p>
	   </div>
    <div class="col-sm-12 col-md-12 col-lg-12">
            <table style="width:100%;" class="mt20 logo-table">
                <tbody class="supp-tbody">
                        <tr class="supp-row">
                            <td style="width:25%;" class="brandTb-td"> 
                            <img itemprop="image"  class=""  style=" max-width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/kmart-tyre-and-auto-service-logo.jpg')!!}" alt="Kmart tyre and auto service logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td"> 
                                    <img itemprop="image"  class=""  style="max-width: 85%;" src="{!!asset('assets/fontend/bdtdc-images/tesco.jpg')!!}" alt="Tesco logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td"> 
                                    <img itemprop="image"  class=""  style=" max-width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/sears.jpg')!!}" alt="Sears logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td">
                                
                                <img itemprop="image"   style=" width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/target.png')!!}" alt="Target logo" />
                            </td>
                        </tr>
                         <tr class="supp-row">
                            <td style="width:25%;" class="brandTb-td">
                                <img itemprop="image"  class="" style="max-height: 125px; max-width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/logo_tjx_companies.gif')!!}" alt="The TJX companies logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td">
                                <img itemprop="image"   style=" max-height: 125px; max-width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/zara_logo.jpg')!!}" alt="Zara logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td">
                                <img itemprop="image"  class="" style="max-height: 125px; max-width: 85%;" src="{!!asset('assets/fontend/bdtdc-images/com-logo-picture27.jpg')!!}" alt="Walmart logo" />
                            </td>
                            <td style="width:25%;" class="brandTb-td">
                                <img itemprop="image"  class="" style="max-height: 125px; max-width: 85%;"  src="{!!asset('assets/fontend/bdtdc-images/com-logo-picture21.jpg')!!}" alt="Carrefour logo" />
                            </td>
                        </tr>
                </tbody>
            </table>
           
       </div>
    </div>
	<div class="row" style="background-color: #ffffff; padding: 3%; margin-top: 1%; border-bottom: 1px solid rgba(0,0,0,.1);">
	    <div class="col-sm-12" style="padding: 0 0 0 5px;margin: 0 0 30px;font-size: 18px;line-height: 40px;color: #222;font-weight: bold;
			border-bottom: 2px solid #999;">
	      	<h5><b>Review Previous Meetings</b></h5>
	    </div>
	    <hr>
	    <div class="col-sm-3 col-xs-6">
			<img itemprop="image" style="height:150px;width:100%; margin-bottom: 10px;" class="img-responsive header_img_fix" src="{!!asset('assets/fontend/bdtdc-images/Dubai-Convention.jpg')!!}" alt="Dubai Convention" />
        </div>
	    <div class="col-sm-3 col-xs-6">
	        <img itemprop="image" style="height:150px;width:100%;margin-bottom: 10px;" class="img-responsive header_img_fix" src="{!! asset('assets/fontend/bdtdc-images/Tokyo_Convention.jpg') !!}" alt="Tokyo Convention" />
	    </div>
	    <div class="col-sm-3 col-xs-6">
	        <img itemprop="image" style="height:150px;width:100%;margin-bottom: 10px;" class="img-responsive header_img_fix" src="{!! asset('assets/fontend/bdtdc-images/NY-Javits-Center.jpg') !!}" alt="NY Javits Center" />
	    </div>
	    <div class="col-sm-3 col-xs-6">
	        <img itemprop="image" style="height:150px;width:100%;margin-bottom: 10px;" class="img-responsive header_img_fix" src="{!! asset('assets/fontend/bdtdc-images/Messe_Frankfurt.jpg') !!}" alt="Messe Frankfurt" />
	    </div>
	</div>
</div>
</section>
	    

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
                });
            </script>
@stop