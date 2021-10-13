@extends('fontend.master3')
@section('content')

	<div style="clear:both"></div>
			<div id="item_sha" class="row">
	                <div class="category-tab"><!--category-tab-->
                    	<ul class="nav nav-tabs details_tab" style="background:none;border: none;">
							<li style="margin-left: 33.5%;"><a class="padding_0" href="#forbuyer" data-toggle="tab">Help center for buyers</a></li>
							<li><a class="padding_0" href="#forsupplier" data-toggle="tab">Help center for suppliers</a></li>
						</ul>
					</div>	
					
<div class="tab-content">
	<div class="tab-pane fade" id="forbuyer" >

    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($tab_menus as $tab)
                    <li class=""><a href="#<?php echo $tab['id']; ?>" data-toggle="tab">{{ $tab->tab_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="50">

                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2 style="padding-right:114px;">Help Section</h2>
                        <div class="panel-group category-products" id="accordian">
                            <?php if ($page_content_categorys) { ?>
                            <?php foreach ($page_content_categorys as $page_content_category) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#market-<?php echo $page_content_category['content_id']; ?>">
                                            <span class="badge pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                                            <a href="#"><?php echo $page_content_category['name']; ?> </a>
                                        </a>
                                    </h4>
                                </div>
                                <?php if ($page_content_category['content_childrens']) { ?>
                                <?php foreach (array_chunk($page_content_category['content_childrens'], ceil(count($page_content_category['content_childrens']))) as $content_childrens) { ?>
                                <div id="market-<?php echo $page_content_category['content_id']; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <?php foreach ($content_childrens as $content_children) { ?>
                                            <li> <a href="{{URL::to('content/show',$content_children['child_id']) }}" class="content_show"><?php echo $content_children['child_name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php } ?>

                        </div>


                    </div>
                    <!--/brands_products-->


                </div>
                <div class="col-sm-9 padding-right">


                        <div class="input-group">
                          <input style="height:50px"type="text" class="form-control" placeholder="Enter a complete question in English.Example : How do i make payment?" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2" style="background:#003366;color:#FFFFFF;">Search Help</span>
                        </div>
                        <br>
                        
                        <div class="" style="padding-left:0px;padding-bottom:0px;padding-top:20px;">
                            <p style="font-size:22px;font-weight:500;">buyerseller.asia - How it works?</p></div>
                         <br>
                        <div class="">
                           
                            <table class="table table-bordered" style="padding-left:40px;">
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:26px;padding-left:0px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                               <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Quick buyer guide.ico') !!}" alt="" />
                                                Quick Buyer Guide
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:18px;padding-left:18px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/contact suppliers.png') !!}" alt="" />
                                                Contact Suppliers
                                            </h4>
                                        </a>
                                    </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:17px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Trade Assurance User Guide.png') !!}" alt="" />
                                                Trade Assurance
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:25px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Payment.png') !!}" alt="" />
                                                Payment, Inspection
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:21px;padding-left:21px;">
                                        <a href="#">
                                            <h4 style="padding-left:0px; font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/account.png') !!}" alt="" />
                                                Your Account
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:19px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/safety and security.png') !!}" alt="" />
                                                Safety & Security
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                            </table>
                        </div>
                        
                        <br>
                         <div class="" style="padding-left:0px;padding-bottom:0px;">
                             <h2 style="font-size:22px;font-weight:500;">Key Products & Services</h2></div>
                         <br>
                        <div class="">
                           
                            <table class="table table-bordered">
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:0px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="padding-left:0px; font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/protect your account.png') !!}" alt="" />
                                                Protect Account
                                            </h4>
                                                <p style="padding-left:57px;">Learn more about phishing</p>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:0px;padding-left:22px;">
                                        <a href="#">
                                            <h4 style="padding-left:0px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/wholesale.png') !!}" alt="" />
                                                Wholesale
                                            </h4>
                                                <p style="padding-left:59px;">Purchase in small quantities</p>
                                        </a>
                                    </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:1px;padding-left:23px;">
                                        <a href="#">
                                            <h4 style="padding-left:0px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Trade Assurance User Guide.png') !!}" alt="" />
                                                Trade Assurance
                                            </h4>
                                                <p style="padding-left:59px;">Avaiable for wholesale orders</p>
                                        </a>
                                    </td>
                                  </tr>
                            </table>
                        </div>
                        	<div style="clear:both"></div>
    
                        <div class="content_descriptions">
                                <div class="col-md-7" style="background-color:white;padding-left:13px;padding-top:10px;">
                                    <p style="font-size:22px;font-weight:500;margin-left: -16px;">What other buyers are looking for?</p>
                                    <p>
                                       <li>
                                           <a>What the difference between buyerseller.asia & bdtdc express?</a>
                                        </li>
                                        <li>
                                            <a>If I don't have a business, can I still buy from a supplier?</a>
                                        </li>
                                        <li>
                                            <a>How do I pay with my credit card for Wholesale order?</a> 
                                        </li>
                                        <li>
                                            <a>How do I complete the Trade Assurance order form?</a>
                                        </li>
                                        <li>
                                            <a>What is Trade Alert?</a>
                                        </li>
                                        <li>
                                            <a>What is Secure Payment?</a>
                                        </li>
                                    </p>
                                    
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4" style="padding-left:20px;padding-top:10px;">
                                    <p style="font-size:22px;font-weight:500;margin-left: -16px;">Self-service</p>
                                    <p>
                                        <li>
                                            <a>Submit a complaint</a>
                                           
                                        </li>
                                        <li>
                                            <a>Report IPR Infringement</a>
                                        </li>
                                        <li>
                                            <a>Retrieve Password</a>
                                        </li>
                                        <li>
                                            <a>Unsubscribe from Emails</a>
                                        </li>
                                        <li>
                                            <a>Cancel Membership</a>
                                        </li>
                                        <li>
                                            <a>Change Email Address</a>
                                        </li>
                                    </p>
                                </div>
                
                        </div>
                       	<div style="clear:both"></div>
                   <br>
                        <div class="col-sm-10" style="padding-bottom:80px;">
                            <p style="font-size:22px;font-weight:500;margin-left: -16px;">More Help</p>
                            
                            <p>
                                <li>
                                    <a>Ask in forums</a>
                                </li>
                                <li>
                                    <a>Trade answers</a>
                                </li>
                                <li>
                                    <a>Policies & rules</a>
                                </li>
                                <li>
                                    <a>Trade Intelligence</a>
                                </li>
                            </p>
                            
                            
                        </div>
                    


                     

                    <!--/category-tab-->
                    <br><br>


                    <!-- Bootstrap trigger to open modal -->


              

                </div>
                

            </div>

            <div class="tab-pane fade" id="57">
                <div class="" style="padding-left:0px;padding-bottom:0px;padding-top:20px;">
                            <p style="font-size:22px;font-weight:500;padding-left:20px;padding-top:30px;">Quick guides to buyerseller.asia services</p></div>
                         <br>
                        <div class="col-sm-12" style="padding-bottom:50px;padding-left:20px;padding-right:20px;">
                           
                            <table class="table table-bordered" style="padding-left:40px;">
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:26px;padding-left:0px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                               <img style="height:60px;width:70px;" src="{!! asset('assets/service/s1.png') !!}" alt="" />
                                                buyerseller.asia Introducton
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:18px;padding-left:18px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s2.png') !!}" alt="" />
                                                Account Information
                                            </h4>
                                        </a>
                                    </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:17px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s3.png') !!}" alt="" />
                                                Finding Products
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:26px;padding-left:0px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                               <img style="height:60px;width:70px;" src="{!! asset('assets/service/s4.png') !!}" alt="" />
                                                Suppliers
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:18px;padding-left:18px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s5.png') !!}" alt="" />
                                                Ordering
                                            </h4>
                                        </a>
                                    </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:17px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s6.png') !!}" alt="" />
                                                Payment
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:26px;padding-left:0px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                               <img style="height:60px;width:70px;" src="{!! asset('assets/service/s7.png') !!}" alt="" />
                                                Inspection & logistics
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:18px;padding-left:18px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s8.png') !!}" alt="" />
                                                Safety & Security
                                            </h4>
                                        </a>
                                    </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:17px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s9.png') !!}" alt="" />
                                                Secure Payment
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:25px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s10.png') !!}" alt="" />
                                                Wholesaler
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:21px;padding-left:21px;">
                                        <a href="#">
                                            <h4 style="padding-left:0px; font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s11.png') !!}" alt="" />
                                                Trade Assurance
                                            </h4>
                                        </a>
                                    </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:19px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="font-size:15px;">
                                                <img style="height:60px;width:70px;" src="{!! asset('assets/service/s12.png') !!}" alt="" />
                                                e-Credit Line
                                            </h4>
                                        </a>
                                    </td>
                                  </tr>
                            </table>
                        </div>
            </div>
            
            

            <div class="tab-pane fade" id="58">

                <div class="col-sm-8">
                    <div class="col-sm-12" style="border: 1px solid #e7e7e7;padding-left:0px;padding-right:20px;margin-bottom:10%;">
                            <div class="col-sm-12" style="padding-left:0px;">
                            <div class="col-sm-6"style="border-right: 1px solid #e7e7e7;padding-top:5%;padding-left:0px;">
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <img style="height:60px;width:60px;" src="{!! asset('assets/service/robot.png') !!}" alt="" />
                                </div>
                                <div class="col-sm-9"style="padding-top:6%;">
                                    <button type="button" class="btn btn-default">Intelligent Robot</button>
                                </div>
                                <div class="col-sm-12" style="padding-top:10px;">
                                    <p>Smart and quick response within 24 hours</p>
                                    <p>Service : 24 hours/7 days in a week</p>
                                </div>
                            </div>
                        </div>
                         <div class="col-sm-6" style="padding-top:5%;">
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <img style="height:60px;width:60px;" src="{!! asset('assets/service/girl.png') !!}" alt="" />
                                </div>
                                <div class="col-sm-9" style="padding-top:6%;">
                                    <button type="button" class="btn btn-default">Live Chat</button>
                                </div>
                                <div class="col-sm-12" style="padding-top:10px;padding-left:0px;">
                                    <p>Sign in, then type your full query in the space provided. Please include
                                    your order number if applicable</p>
                                    <p>Service : 24 hours/7 days in a week</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-12" style="border-top: 1px solid #e7e7e7;padding-top:5%;padding-bottom:5%;">
                        <div class="col-sm-2">
                            <img style="height:60px;width:60px;" src="{!! asset('assets/service/dispute.png') !!}" alt="" />
                        </div>
                        <div class="col-sm-10" style="padding-bottom:6%;">
                            <button type="button" class="btn btn-default">Submit a Dispute</button>
                        </div>
                        <div class="col-sm-10" style="padding-left:0px;paddinng-top:10px;">
                            <p style="padding-left:15px;">If you want to submit a dispute or report suspicious behavior, please click here</p>
                        </div>
                        
                    </div>
                </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-12" style="border-top: 1px solid #e7e7e7;border: 1px solid #e7e7e7;padding-left:20px;padding-right:20px;padding-bottom:5%;">
                        <div class="col-sm-3" style="padding-top:5%;padding-bottom:5%;">
                            <img style="height:60px;width:60px;" src="{!! asset('assets/service/contact.png') !!}" alt="" />
                        </div>
                        <div class="col-sm-9" style="padding-top:6%;padding-bottom:5%;">
                            <button type="button" class="btn btn-default">Contact Us</button>
                        </div>
                        <div class="col-sm-12" style="padding-top:10px;">
                        <p>If you have any issues regarding AliExpress, please contact us here.</p>
                        <p>Service : 24 hours/7 days in a week .</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        
    </div>
    
    <div class="tab-pane fade" id="forsupplier" >

    <div class="category-tab">
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                @foreach($tab_menus as $tab)
                    <li class=""><a href="#answer" data-toggle="tab">{{ $tab->tab_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="answer">

                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2 style="padding-right:114px;">Help Section</h2>
                        <div class="panel-group category-products" id="accordian">
                            <?php if ($page_content_categorys) { ?>
                            <?php foreach ($page_content_categorys as $page_content_category) { ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#market-<?php echo $page_content_category['content_id']; ?>">
                                            <span class="badge pull-right"><i class="fa fa-arrow-circle-down"></i></span>
                                            <a href="#"><?php echo $page_content_category['name']; ?> </a>
                                        </a>
                                    </h4>
                                </div>
                                <?php if ($page_content_category['content_childrens']) { ?>
                                <?php foreach (array_chunk($page_content_category['content_childrens'], ceil(count($page_content_category['content_childrens']))) as $content_childrens) { ?>
                                <div id="market-<?php echo $page_content_category['content_id']; ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <?php foreach ($content_childrens as $content_children) { ?>
                                            <li> <a href="{{URL::to('content/show',$content_children['child_id']) }}" class="content_show"><?php echo $content_children['child_name']; ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php } ?>

                        </div>


                    </div>
                    <!--/brands_products-->


                </div>
                <div class="col-sm-9 padding-right">


                        <div class="input-group">
                          <input style="height:50px"type="text" class="form-control" placeholder="Enter a complete question in English.Example : How do i make payment?" aria-describedby="basic-addon2">
                          <span class="input-group-addon" id="basic-addon2" style="background:#003366;font-color:#FFFFFF;">Search Help</span>
                        </div>
                        <br>
                        
                        <div class="" style="padding-left:0px;padding-bottom:0px;padding-top:20px;">
                            <p style="font-size:22px;font-weight:500">buyerseller.asia - How it works?</p></div>
                         <br>
                        <div class="">
                           
                            <table class="table table-bordered" style="padding-left:40px;">
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:9px;padding-left:0px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                               <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Create and Maintain your Minisite.png') !!}" alt="" />
                                                Create And Maintain Your Ministe
                                                </h4>
                                                </a>
                                                </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:18px;padding-left:18px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Achive Higher Ranking.png') !!}" alt="" />
                                                Achieve Higher ranking
                                                </h4>
                                                </a>
                                                </td> 
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:17px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Gain more Exposure.png') !!}" alt="" />
                                               gain More Exposure
                                                </h4>
                                                </a>
                                                </td>
                                  </tr>
                                  <tr>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:25px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Quote buyer request.png') !!}" alt="" />
                                                Quote Buying Requests
                                                </h4>
                                                </a>
                                                </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:21px;padding-left:21px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/feedback.png') !!}" alt="" />
                                                Get Better Feedback
                                                </h4>
                                                </a>
                                                </td>
                                    <td class="col-md-4" style="border:1px solid rgba(0,0,0,.1)!important;padding-bottom:19px;padding-left:20px;">
                                        <a href="#">
                                            <h4 style="padding-left:20px;font-size:15px;">
                                                <img style="height:40px;width:50px;" src="{!! asset('assets/helpcenter/images/Get top trading idea.png') !!}" alt="" />
                                               Get Top trading Tips
                                                </h4>
                                                </a>
                                                </td>
                                  </tr>
                            </table>
                        </div>
                        
                        <br>
                     
                        	<div style="clear:both"></div>
    
                        <div class="content_descriptions">
                                <div class="col-md-7" style="background-color:white;padding-left:13px;padding-top:10px;">
                                    <p style="font-size:22px;font-weight:500;margin-left: -16px;">What other buyers are looking for?</p>
                                    <p>
                                       <li>
                                           <a>Protect Your Account from Phishing </a>
                                        </li>
                                        <li>
                                            <a>How can I create a sub-account? </a>
                                        </li>
                                        <li>
                                            <a>How do I search for buyers? </a> 
                                        </li>
                                        <li>
                                            <a>Why can’t I display my product(s) on buyerseller.asia? </a>
                                        </li>
                                        <li>
                                            <a>How can I tell if an email/message is fake or real? </a>
                                        </li>
                                        <li>
                                            <a>How do I see my complaints? </a>
                                        </li>
                                    </p>
                                    
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4" style="padding-left:20px;padding-top:10px;">
                                    <p style="font-size:22px;font-weight:500;margin-left: -16px;">Self-service</p>
                                    <p>
                                        <li>
                                            <a>Submit a complaint</a>
                                           
                                        </li>
                                        <li>
                                            <a>Download TradeManager</a>
                                        </li>
                                        <li>
                                            <a>Retrieve Password</a>
                                        </li>
                                        <li>
                                            <a>Change Email Address </a>
                                        </li>
                                        <li>
                                            <a>Unsubscribe from Emails </a>
                                        </li>
                                        <li>
                                            <a>Cancel Membershi </a>
                                        </li>
                                    </p>
                                </div>
                
                        </div>
                       	<div style="clear:both"></div>
                       	<hr>
                   <br>
                        <div class="col-sm-12" style="padding-bottom:80px;">
                            <p style="font-size:22px;font-weight:500;margin-left: 0px;">More Help</p>
                            <div class="col-sm-4">
                                <p>
                                <li>
                                    <a>Online training</a>
                                </li>
                                <li>
                                    <a>Hot T-shirt Products</a>
                                </li>
                                <li>
                                    <a>Industry Hubs</a>
                                </li>
                                
                            </p>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                <li>
                                    <a>Third-party Services</a>
                                </li>
                                <li>
                                    <a>Report IPR Infringement </a>
                                </li>
                               
                            </p>
                            </div>
                            <div class="col-sm-4">
                                <p>
                                <li>
                                    <a>Hot Southeast Asian Products </a>
                                </li>
                                <li>
                                    <a>Submit a Complaint </a>
                                </li>
                            </p>
                            </div>
                           
                            
                            
                            
                            
                        </div>
                    


                     

                    <!--/category-tab-->
                    <br><br>


                    <!-- Bootstrap trigger to open modal -->


              

                </div>
                

            </div>

            <div class="tab-pane fade" id="service">
                Service
                <div class="col-sm-12">
                    sgudgyugyedgediegdedgduygtygdyigigi
                </div>
            </div>
            
            

            <div class="tab-pane fade" id="contact">   Contact
            </div>


        </div>
        </div>
        
    </div>
        
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
                });
            </script>
@stop