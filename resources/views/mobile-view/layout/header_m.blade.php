

			@include('fontend.layouts.topbar_m')

	

<div  class="row topbar_sha">

<div class="col-md-12 padding_0">
	<div class="col-xs-12 col-sm-2 bdtdc-logo" itemscope itemtype="http://schema.org/Organization" style="margin-top: 0px;">
		<a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('bdtdc-home')}}">
			<img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
		</a>
		<div >
			<a rel="home" itemprop="url" title="Manufacturers-Suppliers" class="bd-trade" href="{{ URL::to('bdtdc-home')}}" id="bang-trade" style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px">Bangladesh Trade<span> Development Council</span></a>
		</div>

	</div>
	<div class="col-xs-12 padding_0" style="padding-right:0px; padding-bottom:10px; padding-left: 15px;">
					<div id="search-inner" style="position: relative;"><i class="fa fa-search" aria-hidden="true" style="font-size: 20px;"></i>Search Products</div>
					<div id="srch_product" style="display: none;">

		            <div style="display: block; clear: both; position: relative;overflow: hidden;font-weight: normal;" itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction">
			        <div  >
			         <form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post"> 
					<div style="width: 80%; display: block;float: left;">
				     <input style="height: 45px;" itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
				      <input itemprop="query-input"  name="key" class="form-control" type="text" placeholder="What are you looking for..." required="required" />
				      </div>
				     <div style="width: 20%; display: block;float: left;">
				      <span class="input-group-btn">
						<input itemprop="query-input" type="submit"  class="btn btn-primary" value="Search" />
				      </span>
				     </div>	
				</form>
				</div>
			</div>
		
		</div>
	 </div> 
	</div>
	</div>
