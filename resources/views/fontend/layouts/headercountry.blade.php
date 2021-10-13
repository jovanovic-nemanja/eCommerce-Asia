@include('fontend.layouts.topbar')
	

	
	
<div id="topbar_sha" class="row">
	<div title="Manufacturers-Suppliers" class="col-xs-12 col-sm-2">
		<a href="{{ URL::to('/',null)}}" class="logo_others"></a>
		<div id="bang-trade" onMouseOver="show_home()">BuyerSeller.Asia</div>
		<div><a href="{{ URL::to('/',null)}}" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div>

	</div>
	<div class="col-xs-12 col-sm-10 padding_0">
		<div style="" class="col-xs-12 padding_0">
			<form class="form" action="{!!URL::to('search_product',null)!!}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="col-xs-2 padding_0">
					<select style="height:44px;border-radius: 5px!important;" class="form-control" name="search">
					  <option value="products">On site</option>
					  <option value="suppliers">On BuyerSeller</option>
					  <option value="news">Quote</option>
					</select>
				</div>
				
				<div class="col-xs-6 padding_0">
					<input style="height:44px;border-radius: 5px!important;" name="key" class="form-control" type="text" placeholder="Enter English Keyword to Search . . ." required="required" />
				</div>
				<div class="col-xs-4 padding_0">
					<div class="col-md-5 col-sm-5 col-xs-5 padding_0" >
					<input type="submit" style="background:#19446F;border-radius: 5px !important;" class="btn btn-primary btn-lg pull-left" value="Search" />
					</div>
					</form>
					<div class="col-md-7 col-sm-7 col-xs-7"  style="padding:0.1%;border-radius: 5px !important;">
					<a title="get quote" href="{{URL::to('get_qutations',null)}}"><span style=""><img style="margin-left: 3px;margin-top: 0px;padding-right: 5px;margin-top: -3px;height: 49px" class="img-responsive" src="{!! asset('assets/gold/Get-Quotation-home.png') !!}" /></span></a>
					</div>
				</div>
			
		</div>
		
	</div>
</div>


<script type="text/javascript">
function show_home()
{

document.getElementById('bang-trade').setAttribute(
   "style", "display: none;");
document.getElementById('back-home').setAttribute(
   "style", "display: block;  transition: 2s");
}

function  hide_home()
{
document.getElementById('back-home').setAttribute(
   "style", "display: none; transition: 2s");
document.getElementById('bang-trade').setAttribute(
   "style", "display: block;");;

}


</script>

