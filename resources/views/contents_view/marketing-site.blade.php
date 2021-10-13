@extends('fontend.master_dynamic')
    @section('page_css')
      <link property='stylesheet' href="{!! asset('css/for-suppliers/marketing-website.css') !!}" rel="stylesheet">
    @endsection
	@section('content')
  <!-- padding_0 -->
  <div class="row" style="margin-bottom: 8px">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li class="top-path-li" itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('/',null)}}" class="top-path-li-a" ><span itemprop="name">Home</span> <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li" itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('ServiceChannel/pages/for_buyer',35)}}" class="top-path-li-a"><span itemprop="name">Help Center</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
      <li class="top-path-li" itemprop="itemListElement" itemscope
      itemtype="http://schema.org/ListItem"><a itemprop="item" href="#" class="top-path-li-a"><span itemprop="name">Marketing Website</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
                    </ul>
            </div>
    
  </div>
	<div class="row " style="background:#ffffff; margin-bottom:28px;border-bottom: 1px solid rgba(0,0,0,.1);padding-bottom:5%;">
            <div class="col-sm-12 padding_0" style="/*background:#91431E;*/">
                     <img itemprop="image" style="width:100%; max-height:400px;" src="{!!asset('assets/fontend/images/marketing-site.jpg')!!}" alt="marketing banner" />
            </div>
            <div class="col-sm-12" style="/*background:#F5B041;background: #B03A2E;*/ background: #249BD8; padding-bottom:20px;padding-top:15px;">
                        <div class="row">
                            <div class="col-sm-4 ">
                               <h3 class="market-title-h1" >Supplier Services</h3>
                                  <ul class="market-ul">
                                      <li class="market-ul-li">
                                           <a itemprop="url" href="{{URL::to('SupplierChannel/pages/list_exhibit_sell',23)}}">List, Exhibit and sell</a>
                                      </li>
                                      <li class="market-ul-li">
                                          <a itemprop="url" href="{{URL::to('SupplierChannel/pages/marketing_website',24)}}">Marketing Website</a>
                                      </li>
                                      <li class="market-ul-li">
                                          <a itemprop="url" href="{{URL::to('SupplierChannel/pages/suppliers_memebership',30)}}">Suppliers Membership</a>
                                      </li>
                                      <li class="market-ul-li">
                                          <a itemprop="url" href="{{URL::to('SupplierChannel/pages/verified_supplier',32)}}">Verified Supplier</a>
                                      </li>
                                      <li class="market-ul-li">
                                          <a itemprop="url" href="{{URL::to('SupplierChannel/pages/learning_center',33)}}">Learning Center</a>
                                      </li>
                                      <li class="market-ul-li">
                                          <a itemprop="url" href="{{URL::to('SupplierChannel/pages/training_center',34)}}">Training Center</a>
                                      </li>
                                  </ul>     
                            </div>
                            <div class="col-sm-8">
                                    <h3 class="market-title-h1"> Access to Buyers</h3>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <ul class="market-ul">
                                               <li class="market-ul-li">
                                                     <a itemprop="url" href="{{URL::to('BuyerChannel/pages/why_bdtdc',6)}}">Why BuyerSeller</a>
                                                </li>
                                                <li class="market-ul-li">
                                                    <a itemprop="url" href="{{URL::to('BuyerChannel/pages/sustainable_manufacturing',7)}}">Sustainable Manufacturing</a>
                                                </li>
                                                <li class="market-ul-li">
                                                    <a itemprop="url" href="{{URL::to('BuyerChannel/pages/meet_suppliers',13)}}"> Meet Suppliers</a>
                                                </li>
                                               
                                                <li class="market-ul-li">
                                                    <a itemprop="url" href="{{URL::to('BuyerChannel/pages/accredited_suppliers',16)}}">Accredited Suppliers</a>
                                                </li>
                                                <li class="market-ul-li">
                                                    <a itemprop="url" href="{{URL::to('BuyerChannel/pages/business_identity',17)}}">Business Identity</a>
                                                </li>
                                             </ul>
                                 </div>
                                  <div class="col-sm-6">
                                       <ul class="market-ul">
                                             
                                                  <li class="market-ul-li">
                                                      <a itemprop="url" href="{{URL::to('BuyerChannel/pages/inspection_service',19)}}">Inspection Service</a>
                                                  </li>
                                                
                                                  <li class="market-ul-li">
                                                      <a itemprop="url" href="{{URL::to('BuyerChannel/pages/trade_answers',22)}}">Trade Answers</a>
                                                   </li>
                                          </ul>
                                  </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-12" style="margin-top:28px;">
                          <div class="row" style="margin: 0">
                            <div class="col-sm-8">

                                <h3 class="m-h3" style="padding-bottom:10px;">BuyerSeller Marketing Website</h3>
                                <h2 class="m-h2" style="padding-bottom:1%;">Grow your deals on the planet&#39;s biggest group of more than a million of buyers</h2>
                                 <p class="market-p" style="text-align:left;">Your Marketing Website is your professional worldwide promoting channel. It showcases your advantages by giving purchasers overall access to your complete item and organization data. Get in touch with us for more information.</p>
                                 <h4 class="m-h2" style="padding-bottom:2%;">What will you gain?</h4>
                                <p class="market-p" style="margin-bottom:10px;">Upgrade all of your competitive advantages-</p>
                          </div>
                         </div>
                    <div class="col-sm-4">            
                       <div class="row">
                                  <div class="col-sm-12" style="margin-bottom:6%;">
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/images/marketing-2.jpg')!!}" alt="marketing banner" />
                                            </div>
                                            <div class="col-sm-8">
                                               <p class="market-pp" >Grasp buyers faster-</p>
                                               <p class="mark-right">Once your products go online, buyers receive an alert e-mail </p>
                                            </div>
                                          </div>
                                  </div>
                                   
                                  <div class="col-sm-12" style="margin-bottom:6%;">
                                        <div class="row">
                                          <div class="col-sm-4">
                                                <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/images/marketing-3.jpg')!!}" alt="marketing banner" />
                                            </div>
                                            <div class="col-sm-8">
                                               <p class="market-pp" >Prioritized ranking-</p>
                                               <p class="mark-right">Products are ranked on search result priority basis </p>
                                            </div>
                                        </div>
                                  </div>
                                  <div class="col-sm-12" style="margin-bottom:6%;">
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/images/marketing-6.jpg')!!}" alt="marketing banner" />
                                            </div>
                                            <div class="col-sm-8">
                                               <p class="market-pp" >Reduce your time to market-</p>
                                               <p class="mark-right">Your latest products are promoted faster to wider range of buyers </p>
                                            </div>
                                          </div>
                                  </div>
                                   
                                  <div class="col-sm-12" style="margin-bottom:6%;">
                                          <div class="row">
                                              <div class="col-sm-4">
                                                <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/images/marketing-4.jpg')!!}" alt="marketing banner" />
                                            </div>
                                            <div class="col-sm-8" style="margin-bottom:6%;">
                                               <p class="market-pp" >Spare your money and time-</p>
                                               <p class="mark-right">Professionals at BuyerSeller Client Service Center are 24/7 available to help you</p>
                                            </div>
                                          </div>

                                  </div>
                                  <div class="col-sm-12" style="margin-bottom:6%;">
                                         <div class="row">
                                            <div class="col-sm-4">
                                                <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/images/marketing-5.jpg')!!}" alt="marketing banner" />
                                            </div>
                                            <div class="col-sm-8">
                                               <p class="market-pp" >Get benefitted over other competitors-</p>
                                               <p class="mark-right">Venture a high quality and professional picture to more than a million of purchasers around theworld</p>
                                            </div>
                                         </div>

                                  </div>
                            </div>       
                      </div>              
                    <div class="col-sm-5">
                             
                        <div class="">
                                            <h4 class="m-h4" style="padding-bottom:10px; padding-top:0;">Features</h4>
                                   <p class="market-p" style="padding-top:7%;font-weight:500;line-height:25px;">Home Page — your company, the services and products are introduced to the customers </p>
                                   <p class="market-p" style="font-weight:500;line-height:25px;">Company Profile — overviews of the basic company data are supplied </p>
                                   <p class="market-p" style="font-weight:500;line-height:25px;">Products — exhibits a complete information about your products; an e-mail link enables buyers to send inquiries about the product directly to you</p>
                                   <p class="market-p" style="font-weight:500;line-height:25px;">Quality Control — QC standards are displayed to build trust in your services and products. </p>
                                   <p class="market-p" style="font-weight:500;line-height:25px;">OEM — provides information on your OEM capabilities along with the customers and brands you handle</p>
                                   <p class="market-p" style="font-weight:500;line-height:25px;">Additional: Management, Factory Tour, Trade Shows, Newsroom, Trading services, Trade shows etc.</p>
                                   
                            </div>
                    </div>
                    <div class="col-sm-3">
                        <img itemprop="image" style="width:100%;" src="{!!asset('assets/fontend/img/marketing-team.jpg')!!}" alt="marketing banner" />
                        <p class="market-p" style="font-size: 12px; padding-left: 5%;">We'd like to hear from you.</p>
                      
                    
                        <div class="right1" style="margin-top: 15px;">
                         <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/Bangladesh',18)}}"> Bangladesh suppliers</a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;">
                        <a href="{{ URL::to('selected-suppliers/China',44)}}"> China suppliers</a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/Taiwan',206)}}"> Taiwan suppliers</a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/India',99)}}"> India </a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/South Korea',113)}}"> South Korea</a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/Japan',107)}}"> Japan </a></p>
                        <p class="cont-tit" style="padding: 0 12px; line-height: 20px;"><a href="{{ URL::to('selected-suppliers/Thailand',209)}}"> Thailand </a></p>
                        <ul class="contact-ul">
                            
                        </ul>
                        
                        <p class="cont-tit">Suppliers in other countries/regions</p>
                       
                        </div>
                    </div>
    </div>
</div>
@stop