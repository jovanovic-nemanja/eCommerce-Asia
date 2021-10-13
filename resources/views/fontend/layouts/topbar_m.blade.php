<section>
<div class="container">
<div class="row" style="margin-top: 28px;">
  <nav class="navbar navbar-default">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" style="padding: 10px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: #255E98">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a style="margin-left: 0; background-image: none; height: auto; display: block;width: 100%; " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
      <img alt="logo" style=" width: 91%; height: auto" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
     
    </a>
    <!-- <div style="padding-right: 10px;padding-top: 0px; width: 100%; text-align: center;margin-left: 0%;"><a itemprop="url" href="{{ URL::to('/',null)}}" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse m-nevbar" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="{{ URL::to('online-marketplace',null)}}">Shop by category<span class="sr-only">(current)</span></a></li>
        <li><a href="{{URL::to('tradeshow',null)}}">Trade Shows</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">For Buyers <span class="caret"></span></a>

          <ul class="dropdown-menu">

            @foreach($pages as $page) 
              @if($page->prefix == 'BuyerChannel' )
              
            
                <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>

              @endif 
            @endforeach
          
            
          </ul>
        </li>
      </ul>
    <!--  <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>  -->

      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">For Suppliers <span class="caret"></span></a>

          <ul class="dropdown-menu">
            @foreach($pages as $page)
              @if($page->prefix == 'SupplierChannel' )
              <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
              @endif 
            @endforeach
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">

          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customer Service <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @foreach($pages as $page)
              @if($page->prefix == 'ServiceChannel' )
              <li><a itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
              @endif
            @endforeach
           
          </ul>
        </li>
      </ul>

      @if (Sentinel::check())
            <?php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
              $single_quotation = App\Model\BdtdcSupplierInquery::where('product_owner_id',Sentinel::getUser()->id)->where('views',0)->get();
              $single_quotation_view = App\Model\BdtdcSupplierInquery::where('product_owner_id',Sentinel::getUser()->id)->with(['inq_message'])->whereHas('inq_message',function($subQuery){
                  $subQuery->where('is_view',0);
              })->get();
              $single_quotation_mes_no = 0;
              foreach ($single_quotation_view as $Supplier_inquiry) {
                foreach ($Supplier_inquiry->inq_message as $inqu_mess) {
                  if($inqu_mess->is_view == 0){
                    $single_quotation_mes_no++;
                  }
                }
              }
              // dd($single_quotation_mes_no);
              $join_quotation = App\Model\BdtdcJoinQuotation::where('product_owner_id',Sentinel::getUser()->id)->where('views',0)->get();
              // $join_quotation = App\Model\BdtdcJoinQuotation::with('inq_message')->get();
              /*$join_quotation_view = App\Model\BdtdcJoinQuotation::where('product_owner_id',Sentinel::getUser()->id)->with(['inq_message'])->whereHas('inq_message',function($subQuery){
                  $subQuery->where('is_view',0);
              })->get();
              $join_quotation_mes_no = 0;
              foreach ($join_quotation_view as $Supplier_inquiry) {
                foreach ($Supplier_inquiry->inq_message as $inqu_mess) {
                  if($inqu_mess->is_view == 0){
                    $join_quotation_mes_no++;
                  }
                }
              }*/
              // echo count($join_quotation);
              // dd($join_quotation);
            ?>
        @endif


      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My BuyerSeller<span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Sentinel::check())
            <li><a itemprop="url" href="{{ URL::to($dashboard_route,null)}}">Dash Board</a></li>
            @endif
            
            <li><a itemprop="url" href="{{ URL::to('default','message') }}">New Inquiry</a></li>
            
            <li style="margin-bottom: 10px"><a itemprop="url" href="{{ URL::to('dashboard','company_site') }}">New Quote</a></li>            
            <!-- <li><a href="#">Dash Board</a></li>
            <li><a href="#">New Inquiry</a></li>
            <li><a href="#">New Quote</a></li> -->

            <li role="separator" class="divider"></li>
            <li style="padding-top: 5px;padding-left: 6%;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;">For Buyer</li>
            <li><a itemprop="url" href="{{ URL::to('get-quotations')}}" target="_blank" class="" style="">Get Quotations Now</a>
            </li>
            <li class="navigation-menu-list-li"><a itemprop="url" href="{{ URL::to('Mybuying-Request') }}" class="navigation-menu-list-li-a">Manage Buying Requests</a></li>
            <li style="margin-bottom: 10px" class="navigation-menu-list-li"><a itemprop="url" href="{{ URL::to('list/view/requested/sample',null,) }}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li>

            <!-- <li><a href="#">Manage Buying Requests</a></li>
            <li><a href="#">Manage Sample Requests</a></li>
            <li><a href="#">Manage Sample Requests</a></li> -->

            <li role="separator" class="divider"></li>
            <li style="padding-top: 5px;padding-left: 6%;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;">For Supplier</li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Display New Products</a></li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a></li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('quotation/management',null) }}" class="navigation-menu-list-li-a">Quotes Management</a></li>
           <!--  <li><a href="#">Display New Products</a></li>
            <li><a href="#">Company & Site</a></li>
            <li><a href="#">Quotes Management</a></li> -->
           
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="{{ URL::('about-us',null) }}">About BuyerSeller</a></li>
         <li><a href="{{ URL::to('login',null) }}">Sign in</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
</nav>
</div>
</div>
</section>
<script type="text/javascript">
function show_home()
{

document.getElementById('bang-trade').setAttribute(
   "style", "display: none;padding-top:0px;padding-right:0px;width:100%");
document.getElementById('back-home').setAttribute(
   "style", "display: block; padding-top:0px;padding-right:10px; transition: 2s;width:156px");
}

function  hide_home()
{
document.getElementById('back-home').setAttribute(
   "style", "display: none; padding-top:0px;padding-right:10px;transition: 2s;width:100%");
document.getElementById('bang-trade').setAttribute(
   "style", "display: block;padding-top:0px;padding-right:10px;width:156px");;

}


</script>