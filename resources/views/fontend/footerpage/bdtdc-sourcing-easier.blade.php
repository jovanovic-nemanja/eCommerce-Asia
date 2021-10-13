@extends('fontend.master_dynamic')
    @section('page_css')
    <link property='stylesheet' href="{!! asset('css/sourcing-easier.css') !!}" rel="stylesheet">    
    @endsection
	@section('content')
</div>
<div class="container">
    <div class="row">
    <div class="col-md-12 padding_0" style=" margin-top: 20px;">
      <ul style="float:left;margin-left: -2%" itemscope="" itemtype="http://schema.org/BreadcrumbList">
      <li style="float: left" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('/',null)}}" style="color: #000"> Home <i class="fa fa-angle-right"></i></a></li>
              <li style="float: left" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('ServiceChannel/pages/for_buyer',35)}}" style="color: #000"> Help Center <i class="fa fa-angle-right"></i></a></li>
              <li style="float: left" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('services')}}" style="color: #000">  Service <i class="fa fa-angle-right"></i></a></li>
              <li style="float: left" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a itemprop="item" href="" style="color: #000"><strong> Finding Products</strong> <i class="fa fa-angle-right"></i></a></li>
             

      </ul>
      
    </div>
  </div>
</div>


<div class="container-fluid padding_0" style="background: #fff;">
        <div class="soure-easier-banner">
                   <div class="source-easy-title">
                                <div class="s-ttitl">SOURCING HAS NEVER BEEN EASIER</div>  
                   </div> 
        </div>
<div class="container">
	<div class="row padding_0" style="background-color: #fff;">
			<div class="col-sm-12 col-lg-12" style="padding-bottom: 30px;">
				<h3 class="sorcce-h3" style="padding: 4% 0">How to Find Products & Suppliers
</h3>
			</div>
			<div  class="col-sm-12 col-lg-12" style="padding-bottom: 25px;">
					<table    style="padding-left: 15px;">
            <tbody><tr>
                            <td class="right-40" style="width: 50%; padding-left: 0;">
                    <h3>1.Search:</h3>
                    <div class="easy-text">• Start typing in the search bar. The search function is intuitive and will automatically suggest options for products, suppliers or quotes.</div>
                    <div class="easy-text">• Browse our Categories until you see something that appeals to you.</div>
                    <!-- <div class="easy-text"><a target="_blank" class="easy-more" href="http://www.BuyerSeller.asia/">Try ›</a></div> -->

                                    
                                </td>
                 <td style="width: 50%; padding-left: 0;">
                    <img style="height:324px;width:100%;"  src="{!! asset('assets/fontend/bdtdc-images/Screenshot_1.png') !!}" alt="bangladesh means business" />
                </td>
                        </tr>
        			</tbody>

        			</table>
			</div>
		
	</div>
</div>
</div>
<div class="container-fluid">
    <div class="container">
	<div class="row padding_0" style="background:#f1f1f1;">
		<div class="tb-module common-img-text" >
	
    	<div class="source-wrapper">
        	<table>
           		 <tbody><tr>
                            <td class="right-40" style="width: 50%;">
                   <img style="height:324px;width:100%; padding-right: 20px;"  src="{!! asset('assets/fontend/bdtdc-images/bdtdc-source.png') !!}" alt="bangladesh means business" />
                </td>
                <td style="width: 50%; text-align: left;">
                                    <h3>2. Try BdSource:</h3>
                                <div class="easy-text">• Post a buying request telling us exactly what you are looking for and receive quotes from suppliers within 24 hours.</div>
                                <div class="easy-text">• Get one on one personal assistance by Professional Purchasing Agents.</div>
                                <!-- <div class="easy-text"> <a target="_blank" class="easy-more" href="#">Try ›</a></div> -->
                               
                </td>
                        </tr>
             </tbody></table>
            </div>
             </div>
        </div>
    </div> 
 </div>  
<div class="container-fluid" style="background-color: #fff;">
<div class="container">
<div class="row padding_0">
	<div class="tb-module common-img-text" style="background:#fff;">
    <div class="source-wrapper">
        <table>
            <tbody><tr>
                     <td class="right-40" style="width: 50%;">
                    <h3>3.Use Wholesaler:</h3>
                    <div class="easy-text">Use BuyerSeller.Asia's Wholesaler option to find products that are available in low minimum-order-quantities (MOQs), get instant price quotes and place secure online orders. Plus, every Wholesale transaction is protected by BuyerSeller.Asia's Secure Payment Service.</div>
                    <div class="easy-text"></div>
                    <!-- <div class="easy-text"> <a target="_blank" class="easy-more" href="http://wholesaler.BuyerSeller.asia/?spm=a2700.7848340.1998823020.8.GSAW3i">Try ›</a></div> -->

                                   
                                </td>
                            <td style="width: 50%; padding-left: 0;">
                    <img style="height:324px;width:100%"  src="{!! asset('assets/fontend/bdtdc-images/whole-sale.png') !!}" alt="bangladesh means business" />
                </td>
                        </tr>
        </tbody></table>
    </div>
</div>
</div>
<div class="row padding_0" style="background-color: #fff; padding-bottom: 5%;border-bottom: 1px solid rgba(0,0,0,.2); margin-bottom: 20px;">
	<!-- <div class="tb-module common-img-text" style="background:#fff; padding: 10px 5px;">
   				<h3 class="sorcce-h3" style="font-size: 26px;">FAQs</h3>
</div> -->
<!-- <div class="" data-name="common-faq" data-skin="default" data-guid="14557884412010" id="guid-14557884412010" data-version="1" data-type="3" style="background:#fff; padding-left: 3%;">
<div class="module" data-spm="2508361"><div class="tb-module common-faq">
    <div class="source-wrapper">
        <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>            <td>
                •                <a target="_blank" href="#" class="source-a">How do I buy on BuyerSeller.asia?</a>
            </td>
                    <td>
                •                <a target="_blank" href="#" class="source-a">What is BdSource?</a>
            </td>
        </tr><tr>            <td>
                •                <a target="_blank" href="#" class="source-a">Can I make purchases of a single item on BuyerSeller.asia?</a>
            </td>
                    <td>
                •                <a target="_blank" href="#" class="source-a">What are the services I can expect from Purchasing Agents?</a>
            </td>
        </tr><tr>            <td>
                •                <a target="_blank" href="#" class="source-a">How to start using the Purchasing Agent?</a>
            </td>
                    <td>
                •                <a target="_blank" href="#" class="source-a">What is My Favorites?</a>
            </td>
        </tr>        </tbody>
        </table>
    </div>
	</div>
	</div>
	</div> -->
	<div class="tb-module common-img-text" style="background:#fff; padding: 10px 5px;">
	   				<h3 class="sorcce-h3" style="font-size: 26px;">Success Stories</h3>
	</div>
	<div class="" style="background:#fff;">
                    <div class="col-sm-4 col-md-4 col-lg-4" style="border-right: 1px solid #ddd;">

                        <img class="sourc-img" src="{{URL::to('assets/fontend/bdtdc-images/hero1.jpg')}}" alt="contact-byuer">
                        <h2 style="font-size: 20px;font-weight: normal;overflow: hidden;width: 100%;">Md Forhad Ahmmed Russel</h2>
                        <h5><a href="{{URL::to('Home/Green-Field',1559)}}" target="_blank">CEO of Green Field </a></h5>
                        <p class="source-p">BuyerSeller.Asia is the latest trend of B2B platform in Bangladesh providing support for the import and export side of my business.</p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4" style="border-right: 1px solid #ddd;">
                        <img class="sourc-img" src="{{URL::to('assets/fontend/bdtdc-images/hero2.jpg')}}" alt="contact-gold-member">
                        <h2 style="font-size: 20px;font-weight: normal;overflow: hidden;width: 100%;"> MIR MD. ALIMUZZAMAN</h2>
                        <h5><a href="{{URL::to('Home/Raid-International',1379)}}" target="_blank">CEO Raid International</a></h5>
                        <p class="source-p">BuyerSeller.Asia is an outstanding brand in online trading giving our clients the trust to buy and the chance to sell our products globally on this platform.</p>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4" style="border-right: 0 none;">
                        <img class="sourc-img" src="{{URL::to('assets/fontend/bdtdc-images/hero3.jpg')}}" alt="contact-gold-member">
                        <h2 style="font-size: 20px;font-weight: normal;overflow: hidden;width: 100%;">Mr. Mahfuz Haque</h2>
                        <h5><a href="{{URL::to('Home/Supplyhouse',1461)}}" target="_blank">CEO OF SUPPLY HOUSE</a></h5>
                        <p class="source-p">Our standing on BuyerSeller.Asia increased by having this Trade Assurance certificate. We now get higher exposure within the platform. </p>
                    </div>
                    </div>



</div>
</div>
</div>
<div class="container">


	


	
@stop