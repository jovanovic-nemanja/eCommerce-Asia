@include('fontend.layouts.topbar')
	


	
<div class="row topbar_sha">
	<div  title="Manufacturers Suppliers" class="col-xs-12 col-sm-2 bdtdc-logo" itemscope itemtype="http://schema.org/Organization">
		<a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
			<img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('resources/assets/logo.png') }}" />
		</a>
		<div   id="bang-trade" onMouseOver="show_home()" style="font-size: 11px;">Bangladesh Trade Development Council</div>
		<div style="padding-right: 10px;padding-top: 0px; width: 100%; text-align: center;margin-left: -6%;"><a itemprop="url" href="{{ URL::to('/',null)}}" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div>

	</div>
	<div class="col-xs-12 col-sm-10 padding_0">

		<div itemprop="potentialAction" itemscope itemtype="http://schema.org/SearchAction" style="" class="col-xs-12 padding_0">
			<div class="col-xs-9" style="padding-right:0px;">
				  <div class="col-lg-12" style="padding:0px">
			<form  class="form form-horizontal" itemprop="target"  action="{!!URL::to('search-product',null)!!}" method="post">
				<input itemprop="url" type="hidden" name="_token" value="{{ csrf_token() }}">
				
				    <div class="input-group input-group-lg" style="border:2px solid #19446F;border-radius: 0px !important;">
				      <span class="input-group-btn hide_dropdown">
				        <select style="height:46px;width:114px;" class="form-control all_search_options" name="search">

						  <option value="products">Products</option>

						  <option value="suppliers">Suppliers</option>

						  <option value="news">Quote</option>

						</select>
				      </span>
				      <input itemprop="query-input" style="height:46px;border-radius: 0px!important;min-width: 100px;" name="key" class="form-control search_key" type="text" placeholder="What are you looking for..." required="required" />
				      <span class="input-group-btn" style="width:13%;">
				        <input itemprop="query-input" type="submit" style="background:#19446F;border-radius: 0px !important;min-width: 102%;" class="btn btn-primary btn-lg pull-left all_search" value="Search" />
				      </span>
				    </div>
				  

					<!-- <select style="height:44px;border-radius: 5px!important;" class="form-control all_search_options" name="search">

					  <option value="products">Products</option>

					  <option value="suppliers">Suppliers</option>

					  <option value="news">Quote</option>

					</select>

					<input itemprop="query-input" style="height:44px;border-radius: 5px!important;" name="key" class="form-control search_key" type="text" placeholder="Enter English Keyword to Search . . ." required="required" />

					<input itemprop="query-input" type="submit" style="background:#19446F;border-radius: 5px !important;" class="btn btn-primary btn-lg pull-left all_search" value="Search" /> -->

				
				</form>
				</div>
				</div>

				<div class="col-xs-3 padding_0 quet">
		
					<div class="col-xs-12 col-md-12 col-sm-12"  style="padding:0.1%;border-radius: 5px !important;">

					<a itemprop="url" title="get quote" href="{{URL::to('get-quotations',null)}}"><span style=""><img itemprop="image"  class="img-responsive bd-delop" src="{!! asset('resources/assets/gold/Get-Quotation-home.png') !!}"  alt="Get Quotation home" /></span></a>

					</div>

				</div>
				
			

		</div>

		

	</div>
</div>


<script type="text/javascript">
function show_home()
{

document.getElementById('bang-trade').setAttribute(
   "style", "display: none;padding-top:0px;padding-right:10px;width:100%");
document.getElementById('back-home').setAttribute(
   "style", "display: block; padding-top:0px;padding-right:10px; transition: 2s;width:100%");
}

function  hide_home()
{
document.getElementById('back-home').setAttribute(
   "style", "display: none; padding-top:0px;padding-right:10px;transition: 2s;width:100%");
document.getElementById('bang-trade').setAttribute(
   "style", "display: block;padding-top:0px;padding-right:10px;width:100%");;

}


</script>

	<script type="text/javascript">       
      $(document).ready(function(){       
        $(document).on({click:function(e){        
          e.preventDefault();       
          var search_options = $('select[name="search"].all_search_options').val();       
          var search_key = $('input[name="key"].search_key').val();       
          window.location.href = window.location.origin+'/search-product/search=='+search_options+'+..+key=='+search_key+'+..+country==0+..+buyer_protection==false+..+gold_supplier==false+..+assessed_supplier==false+..+filter_by_main_market==0+..+filter_by_total_revanue==0+..+filter_by_employe==0';       
        }},'input[value="Search"].all_search');       
      });       
    </script>