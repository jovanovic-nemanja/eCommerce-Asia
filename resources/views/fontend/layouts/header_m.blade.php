@include('fontend.layouts.topbar_m')

<div  class="row topbar_sha">

	<div class="col-md-12 padding_0">
		<div class="col-xs-12 col-sm-2 bdtdc-logo" itemscope itemtype="http://schema.org/Organization" style="margin-top: 0px;">
			<a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
				<img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
			</a>
			<div >
				<a rel="home" itemprop="url" title="Manufacturers-Suppliers" class="bd-trade" href="{{ URL::to('/',null)}}" id="bang-trade" style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px">Bangladesh Trade<span> Development Council</span></a>
			</div>

		</div>

		<div class="col-xs-12 col-sm-10 padding_0">

			<div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" style="" class="col-xs-12 padding_0">
				<!-- <div class="col-xs-9" style="padding-right:0px; padding-bottom:10px;">
				  	<div class="col-lg-12" style="padding:0px">
						<form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post">
							<input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
							
							    <div class="input-group input-group-lg" style="border:2px solid #19446F;border-radius: 0px !important;">
								    <span class="input-group-btn hide_dropdown">
								        <select  class="form-control all_search_options inp-ch" name="search">

										  <option value="products">Products</option>

										  <option value="suppliers">Suppliers</option>

										  <option value="news">Quote</option>

										</select>
								    </span>
								    <input itemprop="query-input"  name="key" class="form-control search_key inp-value" type="text" placeholder="What are you looking for..." required="required" />

								    <span class="input-group-btn" style="width:13%;">
										<input itemprop="query-input" type="submit"  class="btn btn-primary btn-lg pull-left all_search inp-search" value="Search" />
								    </span>
							    </div>
						</form>
					</div>
				</div> -->

				<div class="col-xs-9" style="padding-right:0px;">
	
				  <div class="col-lg-12" style="padding:0px">
					<form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post">
						<input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
						
						    <div class="input-group input-group-lg serch-inpt">
						      <span class="input-group-btn hide_dropdown">
						        <select class="form-control all_search pro-sel" name="search">

								  <option value="products">Products</option>

								  <option value="suppliers">Suppliers</option>

								  <option value="news">Quote</option>

								</select>
						      </span>
						      <input itemprop="query-input"  name="key" class="form-control key" style="font-size: 12px !important;" type="text" placeholder="What are you looking for..." required="required" />
						      <span class="input-group-btn" style="width:13%;">
						        <input itemprop="query-input" type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 102%; font-size: 14px;" class="btn btn-primary btn-lg pull-left search" value="Search" />
						      </span>
						    </div>

						
					</form>
				   </div>
			</div>

				<div class="col-xs-3 padding_0" style="margin-top: 3px;min-width: 200px;">

					<div class="col-xs-12 col-md-12 col-sm-12"  style="padding:0.1%;border-radius: 5px !important;">

						<a itemprop="url" title="get quote" href="{{URL::to('get-quotations',null)}}">
							<span style=""><img itemprop="image" style="padding-left: 7%;padding-right: 5px;margin-top: -5px;height: 52px" class="img-responsive" src="{!! asset('assets/gold/Get-Quotation-home.png') !!}"  alt="Get Quotation home" /></span>
						</a>

					</div>

				</div>
			</div>

			<div class="col-md-12 col-sm-12 col-xs-12 margin-top1">
				<div style="position:relative; float:left;min-width:120px;"><span style="font-size:1em;font-weight:600;">Hot Products:</span></div>
					<ul class="list-inline" itemscope itemtype="http://schema.org/SiteNavigationElement">
					</ul>

			</div>

		</div>
	</div>
</div>


