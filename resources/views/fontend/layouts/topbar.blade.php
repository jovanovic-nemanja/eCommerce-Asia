</div>
<section style="background: #fff;box-shadow: 3px 3px 3px rgba(0,0,0,.1);">
<div class="container">
  <div class="row topbar_sha" style="padding-bottom:0;box-shadow:none">
  <div class="col-sm-9" style="padding: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" style="margin-right: 5%;" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-left">
      <ul class="nav navbar-nav collapse navbar-collapse pull-right" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <li><a target="_blank" itemprop="url" href="{{ URL::to('online-marketplace',null)}}">Shop by Category</a></li>
<!--         <li><a itemprop="url" href="{{URL::to('tradeshow',null)}}">Trade Shows</a></li>
 -->        

         <li class="dropdown" style="z-index: 999 !important;"><a href="#">For Buyers<i class="fa fa-angle-down"></i></a>
          <ul style="float: left" role="menu" class="sub-menu">
            <li class="sub-split" style=" background-color: #fff;   border-top: 1px solid #ddd;
    list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;">
                Sourcing
                
                
              </li>
            
              
            @foreach($pages as $page) 
              @if($page->prefix == 'BuyerChannel' )
              
            
                <li><a target="_blank" itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>

              @endif 
            @endforeach
          </ul>




        </li>
        <li class="dropdown" style="z-index: 999 !important;"><a href="#">For Suppliers<i class="fa fa-angle-down"></i></a>
          <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
            @foreach($pages as $page) 
              @if($page->prefix == 'SupplierChannel' )
              <li><a target="_blank" itemprop="url" href="{{ URL::to($page->prefix.'/pages/'.$page->sort_name,$page->id)}}" class="prefix_url">{{ $page->name }}</a></li>
              @endif 
            @endforeach
          </ul>
        </li>
        <li class="dropdown" style="z-index: 999 !important;"><a href="#">Customer Service<i class="fa fa-angle-down"></i></a>
          <ul role="menu" class="sub-menu" itemscope itemtype="http://schema.org/SiteNavigationElement">
           @foreach($pages as $page)
              @if($page->prefix == 'ServiceChannel' )
              <li><a target="_blank" itemprop="url" href="{{ URL::to($page->slug,null)}}" class="prefix_url">{{ $page->name }}</a></li>
              @endif
            @endforeach
          </ul>
        </li>
        <li><a target="_blank" style="margin-right:-1%" target="_blank" class="pull-right" href="{{ URL::to('about-us',null)}}">About BuyerSeller</a></li>
      
      </ul>
    </div>
  </div>
  <div class="col-sm-3 padding_0">
    <div aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="mainmenu pull-right padding_0">
      <ul class="nav navbar-nav collapse navbar-collapse padding_0" itemscope itemtype="http://schema.org/SiteNavigationElement">
        @if (Sentinel::check())
        <li ><a class="btn" href="{{ URL::to('logout',null) }}"> Logout </a> </li>
        @else
        <li style=""><a target="_blank" itemprop="url" href="{{ URL::to('login',null) }}" class="" data-toggle="">Sign In</a></li>
        <li style="margin-left: 0%;padding: 0px;border-left: 1px solid #cecece;height: 12px;top: 8px;"></li>
        <li style=" margin-left: 0%;"><a target="_blank" itemprop="url" href="{{ URL::to('join',null) }}" class="join_btn">Join Free</a></li>
        
        @endif

        @if (Sentinel::check())
            @php
              $role = App\Model\Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $dashboard_route = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
            @endphp
        @endif
        @if (Sentinel::check())
        <li class="dropdown" style="z-index: 999 !important;"><a target="_blank" itemprop="url" href="#">My BuyerSeller 
        @if (Sentinel::check())
        <span id="total_notification" title=""></span>
        @endif
        <i class="fa fa-angle-down"></i></a> 
          <ul role="menu" class="sub-menu submenu2" style="background-color: #fff" itemscope itemtype="http://schema.org/SiteNavigationElement">

          @if (Sentinel::check())
            <li><a target="_blank" itemprop="url" href="{{ URL::to($dashboard_route,null)}}">Dashboard</a></li>
          @endif

            <li title=""><a target="_blank" itemprop="url" href="{{ URL::to('default','message') }}">New Inquiry 
            </a></li>
            <li title="" style="margin-bottom: 10px"><a target="_blank" itemprop="url" href="{{ URL::to('Mybuying-Request',null) }}">New Quote 
            </a></li>
            <li class="sub-split" style=" background-color: #fff;   border-top: 1px solid #ddd;
    list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">
                For Buyer</li>
              <li><a target="_blank" itemprop="url" href="{{ URL::to('get-quotations',null)}}" target="_blank" class="" style="">Get Quotations Now</a>
              </li>
               <li class="navigation-menu-list-li"><a target="_blank" itemprop="url" href="{{ URL::to('Mybuying-Request',null) }}" class="navigation-menu-list-li-a">Manage Buying Requests</a></li>
               <li style="margin-bottom: 10px" class="navigation-menu-list-li"><a target="_blank" itemprop="url" href="{{ URL::to('list/view/requested/sample',null) }}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li>
               <li class="sub-split" style="background-color: #fff;   border-top: 1px solid #ddd;
               list-style: none outside none;padding-top: 5px;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;box-shadow: none">For Supplier</li>
               <li class="navigation-menu-list-li"><a target="_blank" itemprop="url" target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Display New Products</a></li>
               <li class="navigation-menu-list-li"><a target="_blank" itemprop="url" target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a></li>
               <li class="navigation-menu-list-li"><a target="_blank" itemprop="url" target="_blank" href="{{ URL::to('quotation/management',null) }}" class="navigation-menu-list-li-a">Quotes Management</a></li>
               @endif

          </ul>
        </li>
       
      </ul>
    </div>
  </div>
  </div>
  <!-- <p class="shadow" style="width:100% !important;margin:0;padding:0;"></p> -->
  <!-- <div>
    <p class="shadow" style="width:100% !important;"></p>
  </div> -->

  




<!--MODEL BOX FOR SIGN IN AND JOIN BUTTON;-->