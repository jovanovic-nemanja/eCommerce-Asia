@extends('fontend.master_dynamic')
	@section('page_css')
    <link property='stylesheet' href="{!! asset('css/for-buyers/sustainable-manufacturing.css') !!}" rel="stylesheet">
    
  	@endsection
	@section('content')
	
	<div class="row sus-wrapper" style="margin-top: 38px;">
		<div class="col-md-3">
				<div class="coll">
						<div class="sidebar">
							<img class="sidebar-img" src="{!! asset('assets/fontend/bdtdc-images/manufac1.jpg') !!}" alt="trade answer">
						</div>
						<div class="mm" style="border-bottom:10%;">
						<div class="contact">
							<a href="{{ URL::to('contact') }}">
									<p class="contact-p">Question ? Comments?<br> we want to your feedback !</p>
									<h3 class="contact-h3">Contacts</h3>
							</a>
						
						</div>
						<div class="cont-mess">
								<i class="fa fa-envelope-o" style="margin-top:70%;font-size:30px; margin-left:22%; color:#fff;font-weight:bolder; text-align:center;"></i>
						</div>
					</div>
						<div class="sus-business">
							<a href="javascript:void(0)">
								<p class="sus-busi-p">Business Case for
						 		 <br style="margin-left:10%;">	Sustainable Manufacturing<br>
							Presentation</p>
							</a>
						</div>
				</div>
		</div>
		<div class="col-md-9">
				<div class="middle-cont">
						<h1 class="middle-cont-h1">Business Case for Sustainable Manufacturing</h1>
						<p class="cont-p">A growing number of companies are treating “sustainability” as an important objective in their strategy and operations to increase growth and global competitiveness. This trend has reached well beyond the small niche of those who traditionally positioned themselves as “green,” and now includes many prominent businesses across many different industry sectors. In many cases, these efforts are having significant results.</p>
						<p class="cont-p1" style="border-bottom:0 none;">Sustainable manufacturing helps companies to save money, enhance competitiveness, and reduce environmental, health, and safety impacts. According to a recent survey, two-thirds of nearly 3,000 company officials surveyed responded that “sustainability was critically important to being competitive in today’s marketplace."[ 1 ] In addition, as an indication of company sustainability initiatives and stakeholder interest, 93 of the S&P 100 companies reported sustainability information on their websites in 2008.[ 2 ]</p>
						<div class="cont-list-tb">
							<div class="sus-left">
								<p class="cont-p1" style="border-bottom:0 none;">There a number of reasons why companies are pursuing sustainability:</p>
								<ul class="mid-list">
									<li style=" list-style:square inside !important;">Increase operational efficiency by reducing costs and waste</li>
									<li>Respond to or reach new customers and increase competitive advantage</li>
									<li>Protect and strengthen brand and reputation and build public trust</li>
									<li>Build long-term business viability and success</li>
									<li>Respond to regulatory constraints and opportunities</li>
								</ul>
								<p class="cont-p1" style="border-bottom:0 none;">To learn more about the business case for sustainable manufacturing, view the Department of Commerce’s detailed presentation on the Business Case for Sustainable Manufacturing. This presentation describes the benefits of sustainable manufacturing as well as some of the challenges, and provides numerous examples.</p>
							</div>
							<div class="sus-right" style="background-color:#fece4d">
									<h3 class="sus-right-h3" style="position: inherit;">KEY BENEFITS FROM SUSTAINABLE MANUFACTURING</h3>
									<ul class="list-item">
										<li style="list-style:square inside;">Lower Resource and Production Costs</li>
										<li style="list-style:square inside;">Lower Regulatory Compliance Costs</li>
										<li style="list-style:square inside;">Improved Sales and Brand Recognition</li>
										<li style="list-style:square inside;">Greater Access to Financing and Capital</li>
										<li style="list-style:square inside; padding-bottom:10%;">Easier Employee Hiring and Retention</li>
									</ul>
							</div>
							
						</div>
						<di class="sus-bottom">
							<ul class="mid-list">
									<li>Address sustainability in a coordinated, integrated, and formal manner, rather than in an ad hoc, unconnected, and informal manner</li>
									<li>Focus on increased competitiveness and revenues rather than primarily focusing on cost-cutting, risk reduction, and improved efficiency</li>
									<li>Use innovation, scenario planning, and strategic analysis to go beyond compliance</li>
									<li>Integrate sustainability across business functions</li>
									<li>Focus more on the longer-term</li>
									<li>Work collaboratively with external stakeholders</li>
								</ul>
								<p class="cont-p1" style="padding-bottom:5%; border-bottom:0 none;">To learn more about the business case for sustainable manufacturing, view the Department of Commerce’s detailed presentation on the Business Case for Sustainable Manufacturing. This presentation describes the benefits of sustainable manufacturing as well as some of the challenges, and provides numerous examples.</p>
						</di>
				</div>
			
		</div>
		
	</div>
	
	@stop