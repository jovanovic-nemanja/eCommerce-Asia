@extends('fontend.master_dynamic')
    @section('page_css')
    <link property='stylesheet' href="{!! asset('css/policies-rules.css') !!}" rel="stylesheet">
    @endsection
  @section('content')
  <div class="row">

  		<div class="col-sm-12 col-md-12 col-lg-12">
		            <ul class="top-path" itemscope itemtype="http://schema.org/BreadcrumbList">
		              <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('/',null)}}" class="top-path-li-a"><span itemprop="name">Home </span><i class="fa fa-angle-right top-path-icon"></i></a></li>
		              <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('FooterPage/pages/Rules_center',22)}}" class="top-path-li-a"><span itemprop="name">Rules Center</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
		              <li class="top-path-li" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="{{URL::to('Policies_Rules')}}" class="top-path-li-a"><span itemprop="name">Privacy Policy</span><i class="fa fa-angle-right top-path-icon"></i></a></li>
		              
		            </ul>
        </div>

        
  	
  </div>
@include('fontend.footerpage.rules_sidebar')


	      <div class="col-sm-9 padding_0" style="padding-left:6%;padding-top:20px;">
	            <!-- <div class="col-sm-12 padding_0">
	            <div class="col-xs-10 col-md-10 padding_0">
					<i class="fa fa-search" style="font-size: 20px; color: #999; position: absolute;top:40%; left: 20px;">
					</i><input style="height:44px;border-radius: 5px!important; padding-left: 10%;" name="key" 
					class="form-control" type="text" placeholder="What are you looking for. . ." required="required">
				</div>
	               <div class="col-md-2 col-sm-2 col-xs-2 padding_0">
					<input type="submit" style="background:#19446F;border-radius:0 5px 5px 0 !important; position: absolute;top: 0px;" class="btn btn-primary btn-lg pull-left" value="Search">
					</div>
	            </div> -->
	            
	            <div class="col-sm-12" style="margin-top:20px;padding-bottom:2%;padding-left:0px;">
	      			<!-- <p style="padding-top: 2%;"><a href="#" style="color:#06C;font-size: 13px;font-weight: bold;"> Back to list</a></p> -->
	      			<p style="padding-top: 3%;font-size: 20px;font-weight: bold;text-align:center;">
	      				Our Privacy Policy
	      			</p>  
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					
					<p style="padding-top: 20px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						The BuyerSeller takes special care of individual private policy, the statement below explains our practices
						 and policies very evidently.
					</p>
					<p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						We promise and respect the privacy of our clients:
					</p>
					<ul>
						<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">For the purpose to safeguard the confidential reports and personal data which are collected; 
						we implement physical, computer and procedural safety measures.</li>
						<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">Limitations are implemented to the least possible on the accumulation of personal data, so as to
						 provide all the services which are required by the client.</li>
						<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">Only the most authorized and accredited employees are allowed to access the personal data.</li>
						<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">The personal information or data is not allowed to be disclosed to any third party without the 
						consent and approval of the client. The client will be informed through legal legislation and then
						 the procedure will begin.</li>
					</ul>
					

				</div>
	      		<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 18px;">The Collection of Data and Info</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						To facilitate our clients in the best way possible and provide most efficient services in order to
						 meet the requirement of our client, the personal data collection is done (fractional or full) which 
						 include the personal contact number, company’s address, e-mail address, fax number, website, details 
						 regarding their business such as the nature of the business and products or services provided by them, 
						 etc. These are the required information by our company for your security and safety through which you 
						 access to our website and then register us. In some special cases, we may ask for the private proof of 
						 identity including Identity card, date of birth, passport and nationality, etc. for the purpose of 
						 verification and security. In this way one can use our services, connect with us at any time and most 
						 importantly they can attend our most informative and enlightening events. 
					</p>
					<p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						Our most highest and premier priority is to flourish and facilitate Bangladesh in the arena of trade, 
						collecting the databank of Bangladesh and information of global market and overseas companies is a major 
						task which is performed by us. The information of the individuals working in a particular company are also
						 a part of our data collection process. Each and every individual of the company is scrutinized for the 
						 purpose of information and data collection.
				    </p>
				    <p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
				    	The required personal data and information by our company needs to be fulfilled, as it is a necessary
				    	 prerequisite of the data assemblage procedure.  In case, if someone is unable to provide us with the
				    	  requested information, we will not be able to provide the required services.
				    </p>
				    <p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
				    	The information is maintained for only a period of time until the whole procedure is completely utilized. 
				    </p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 18px;text-align:left;"> Apt Application of Info </p>
					<p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						The information and data collected by our company may be used for the following purposes:
					</p>
					<ul>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						For the processing and doling out of applications.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						To facilitate with paramount services to Bangladesh trade with the global bazaar.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						For the purpose to provide enquiries with information regarding business and contact.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						To incorporate with our database, research, auditing and analysis.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The notifying and acquainting of the events held by BuyerSeller and by our business partners, such as 
						the promotional events and trade fair in Bangladesh and across the globe as well.  
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The distribution of research material and publication under BCTDC and by our business partners. 
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The marketing of goods/products and services by BuyerSeller and our business partners who are 
						engaged with activities such as conferencing, sourcing and business matching etc.  
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						To act in accordance with Bangladesh’s and international law and to meet their terms.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The collection of tardy and unsettled aggregate through legal proceedings.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						For the purpose of other activities which are related to the above mentioned requirement.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						To protect and secure the events and business fair held by BuyerSeller from crime.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						It is necessary to verify you’re identity in order to enter any of our events.
					</li>
					</ul>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						All the information and data which you will provide us, will be used for the above mentioned purposes
						 only. (Point ‘x’ for Nationality and date of birth & passport, identity card number, picture for ‘x’,
						  ‘xi’) 
					</p>
					<p style="padding-top: 5%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						Direct marketing might be conducted through the means of direct mailing, faxing, telephone, e-mailing,
						 or may be through e-newsletter. In case, if you don’t want to receive any of our promotional material, all you need to do is to inform us, and we will be conclude it. And without any charges.
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Disclosure</p>
					<p style="padding-top: 10px;font-size: 13px;color: #000;text-align:left;padding-right: 20%;">
						At BuyerSeller, we make sure that your personal data is kept highly confidential, whereby some of the
						 general information is provided, which includes:  
					</p>
					<ul>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						In association and connection with our services, the service providers, financial institutions,
						 contractor, auditor, advisor, agents and personnel.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						Our promotional events, overseas offices, trade fair co-organizers, affiliates and business partners. 
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The enquiries of companies in Bangladesh. 
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						The individual who is performing a confidential job.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						In Bangladesh or in a foreign country, this is to the individual who is requested to make a 
						discloser under an applicable law.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						Proposed or actual participant or transferees of the services provided by us.
					</li>
					</ul>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						To detect any fraudulent act and to prevent from it, safeguarding and protecting the company and our 
						trade fair and events, on the lawful request, we may provide your information which may include, the
						 personal identification data, date of birth, nationality, passport etc. to the Bangladesh’s police 
						 force and law enforcement agencies, custom, immigration department and Excise department.
					</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						Moreover, we may also provide the personal information and data like, identity card number and
						 passport to the contractor, auditor, agents, service providers and personals. Who are in connection 
						 with our organization, or to a person who is working confidentially for us, or with who is required 
						 for disclosure under applicable law, whether inside Bangladesh or outside.
					</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						Direct marketing might be conducted through the means of direct mailing, faxing, telephone, e-mailing,
						 or may be through e-newsletter. In case, if you don’t want to receive any of our promotional material, all you need to do is to inform us, and we will be conclude it. And without any charges.
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Cookies</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						A piece of data which is stored in your computer are known as cookies, which is commonly used for the
						purpose to facilitate broadcasting and transmission. To know more about our website and the other 
						useful feature, this tool is used to know more about the preferences of our users, so as to improve
						the quality of our work and enhance our services. It is possible that we may share with the 
						advertisers the summarized traffic data. We note time spent, pages visited and traffic. For your 
						convenience of our valued clients, we store the wish list and stopping cart which you might use later,
						if required. You will not be identified. If in case you agree to get yourself registered with us, the 
						information may be linked with you by us, in this way you will be informed about the recent updates made,
						which are off course of your interest. 
					</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						The individual may reject the cookies sent by going to the settings, or may tell us if the cookies are being sent.
					</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						To work on the websites, few of the features of cookies are necessary. For instance, in some cases, if the cookies are not accepted then the continuousness and permanence of the browser session will not be able to sustain properly.
					</p>
					<ul>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						If an individual has contracted to receive the cookies, then we use our marketing company or 
						e-mail delivery so as to send e-mails. At our website, cookies and pixel tags are used in e-mails
						 which helps us in measuring about how the users are utilizing our website and the efficacy and
						  efficiency of the advertisement.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						 When you use our website, we use a third party advertising company so as to serve our ads. The following information may be used by this third party/company including telephone number, e-mail address, address and name most importantly) so to provide you with unlimited information regarding the goods and services which are of your interest. It is possible that our third party (advertiser) may recognize or place a ‘cookie’ on your browser, in course to advertise in the site. If you don’t want to know more about the practices, information and choices of this company, you may please refer to the company’s cookie policy directly.
					</li>
					</ul>
					
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Hyperlinks</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						For the convenience of our clients, we provide hyperlinks to other websites, as you may leave our website whenever you want to, as we have no control over it at all. And the privacy policy of our organization does not apply on any other website.  
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Security</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						The security of data is one of our top priority, and so the personal data of an individual is kept in high security, which are password-protected and electronically stored. At our secured and protected web areas, the data is stored under the Encryption technology. In circumscribed and constrained places, the computer system is placed. The personal data of our clients and members is only permitted to the authorized employees only, who have given privacy policy training and are highly skilled experts of their field.
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Transfer of Data</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						We may transfer the personal data to overseas offices but generally, we keep it on our server, we hold the information and data of our clients in Bangladesh or abroad. 
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Changes</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						If we attempt to change any of our privacy policy, we will make an update at our BuyerSeller website. 
					</p>
				</div>
				<div class="col-sm-12 padding_0" style="padding-bottom:50px;">
					<p style="font-weight:bold;font-size: 15px;">Your Rights and Consents</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						By visiting our website, making an application, or by using our services, you are agreeing and consenting on the use and collection of your information and activities which are outlined in the above statement. In other case, your consent will be required by the law.
					</p>
					<p style="margin-top: 3%;font-size: 13px;color: #000;text-align:left;padding-right:20%;">
						Under the Bangladesh Personal Data (Privacy) Ordinance, You have the right to:
					</p>
					<ul>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						Check the personal data that we hold about you and you also have the right to access such data.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						Correct the incorrect data and may require us.
					</li>
					<li class="policy-list" style="margin-bottom: 3px; font-size: 13px">
						Also ascertain if necessary to our practices and policies to personal data, the data which is held by us.
					</li>
					</ul>
					<p style="font-size: 13px;margin-top: 3%;color: #000;text-align:left;padding-right:20%;">
						If there is any query, send us request so as to correct the date, access or cease the communiqués or any complaint regarding our services. 
					</p>

					<p style="font-size: 13px;margin-top: 3%;color: #000;text-align:left;padding-right:20%;">
							Data Privacy Officer<br>
							BuyerSeller.Asia<br>
							125 Colson Drive<br>
							Summerland key   Florida 33042   USA<br>
							Tel: 305.684.7893    Toll Free: 1.800.453.3909<br>
							E-mail: web@buyerseller.asia<br><br>
							 
							We may charge a reasonable fee for processing a data access request.
							 
							<br>
							 
							(Last updated on 16-03-2016)
					</p>
				</div>
		 </div>
	</div>

   @stop