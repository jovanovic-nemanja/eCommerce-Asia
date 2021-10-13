<div class="row padding_0">
  <nav class="navbar navbar-default" style="margin-bottom: 0 !important;">
    <div class="navbar-header" style="padding: 10px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: #255E98">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
      <img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
      </a>
    <div style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px"   id="bang-trade" onMouseOver="">Bangladesh Trade <span>Development Council</span></div>
    <!-- <div style="padding-right: 10px;padding-top: 0px; width: 100%; text-align: center;margin-left: 0%;"><a itemprop="url" href="{{ URL::to('/',null)}}" id="back-home" onMouseOut="hide_home()">Back to Homepage</a></div> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse m-nevbar" id="bs-example-navbar-collapse-1">
      <div class="user-login-m">
          <div class="unregister" style="position: relative;">
                  <div class="avatar">
                        <div><a href="" class="avatar-span"></a></div>                        
                  </div>
                  <div style="position: absolute;bottom: 18px;left: 15px;display: block;overflow: hidden;">
                         @if (Sentinel::check())
                        <a class="sng btn btn-info btn-lg" href="{{URL::to('/logout')}}" style=" background: 0 none; color: #fff !important;">Logout</a>
                    @else
                       <span class="sng btn btn-info btn-lg si_active" style=" background: 0 none; color: #fff !important;"> Sign In</span> <span class="sng" style="width: 20px; float: left; color:#fff;">|</span>
                       <span class="sng btn btn-info btn-lg jn_active" style="background: 0 none;color: #fff !important;">Join Free</span>
                        
                     @endif
                </div>
          </div>
      </div>
    <!--  <ul class="nav navbar-nav">
        <li class=""><a href="{{ URL::to('online-marketplace',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-home" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Home<span class="sr-only">(current)</span></a></li>
       <li><a href="{{URL::to('Messanger',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Messanger</a></li>
       <li><a href="{{URL::to('messages',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Inquiries
       </a></li>
       <li><a href="{{URL::to('all-buying-request',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-leaf" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Buying Request</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-bolt" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Quick Quotation</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-star" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Favorites</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-floppy-o" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Coupons</a></li>
      <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Feedback</a></li>
      <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-power-off" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Sign Out</a></li>
       <li><a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-download" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Bdtdc.com</a></li>


     </ul>  -->
     <!-- Navbar start here-->
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
             
            ?>
        @endif


      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Bdtdc<span class="caret"></span></a>
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
            <li style="margin-bottom: 10px" class="navigation-menu-list-li"><a itemprop="url" href="{{ URL::to('list/view/requested/sample') }}" class="navigation-menu-list-li-a">Manage Sample Requests</a></li>

            <!-- <li><a href="#">Manage Buying Requests</a></li>
            <li><a href="#">Manage Sample Requests</a></li>
            <li><a href="#">Manage Sample Requests</a></li> -->

            <li role="separator" class="divider"></li>
            <li style="padding-top: 5px;padding-left: 6%;line-height: 22px;color: #333;font-weight: 700;white-space: nowrap;">For Supplier</li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','product') }}" class="navigation-menu-list-li-a">Display New Products</a></li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('dashboard','company_site') }}" class="navigation-menu-list-li-a">Company & Site</a></li>
            <li class="navigation-menu-list-li"><a itemprop="url" target="_blank" href="{{ URL::to('quotation/management') }}" class="navigation-menu-list-li-a">Quotes Management</a></li>
           <!--  <li><a href="#">Display New Products</a></li>
            <li><a href="#">Company & Site</a></li>
            <li><a href="#">Quotes Management</a></li> -->
           
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li><a href="http://aboutus.bdtdc.com/en">About BDTDC</a></li>
        <!--  <li><a href="{{ URL::to('login',null) }}">Sign in</a></li> -->
      </ul>
     <!-- Navbar end here  -->
    </div>
</nav>

</div>
<div class="row">
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="height: 35px;">&times;</button>
      </div>
      <div class="modal-body">
          <div style="width: 100%;padding-top: 15px;box-shadow: 0px 5px 5px #efefef;">
           <ul class="nav nav-tabs" style="border-bottom: 0 none;">
              <li style="width: 50%;"><a class="si_make_active" data-toggle="tab" href="#sign_bdtdc" style="text-align: center;">Sign In</a></li>
             <li style="width: 50%;"><a class="jn_make_active" data-toggle="tab" href="#join_bdtdc" style="text-align: center;">Join Free</a></li>
            </ul>
        </div>
      <div class="tab-content">
      <div id="sign_bdtdc" class="tab-pane fade">
        <div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff; height: 450px;">
          {!! Form::open(['route' => 'sessions.store']) !!}
                        @if (session()->has('flash_message'))
                            <div class="alert alert-success">
                                {{ session()->get('flash_message') }}
                            </div>
                        @endif
        
                        @if (session()->has('error_message'))
                            <div class="alert alert-danger">
                                {{ session()->get('error_message') }}
                            </div>
                        @endif

              <div class="form-group reg-frm-bd" style="border:0 none;">

                            <!-- {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!} -->
                            <!-- {!! errors_for('email', $errors) !!} -->
               
                <input style="border:0 none; border-bottom: 2px solid #255E98;" type="email" name="email" class="form-control" id="" placeholder="Enter login email">
              </div>
              <div class="form-group reg-frm-bd" style="border:0 none;">



                  <input style="border:0 none; border-bottom: 2px solid #255E98;" type="password" name="password" class="form-control" id="pwd" placeholder="Enter login password">
              </div>
                        <div class="form-group">
                        <!-- <a class="btn btn btn-lg btn-primary btn-block" href="">Sign in</a> -->
                        <!-- {!! Form::submit('Sign In', ['class' => 'btn btn btn-lg btn-primary btn-block','style'=>'padding-bottom: 26px;border-radius: 5px!important;']) !!} -->
                        </div>
                        <button type="submit" class="btn btn btn-lg btn-primary btn-block" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button>
              <!-- <button type="submit" class="btn btn-default" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button> -->
              <button type="submit" class="btn btn-default" style="width: 100%; margin-top: 30px;background: #FF6A00;"><span style="color: #fff; font-size: 14px;"><a itemprop="url" href="{{ URL::to('forgot_password',null)}}" id="forget-password" style="color:#fff !important;">FORGOT PASSWORD ?</a></span></button>
           {!! Form::close() !!}
     
        </div>
      </div>
      <div id="join_bdtdc" class="tab-pane fade"> 
        <div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff;">
            @if (count($errors) > 0)
                    <div class="alert alert-danger" style="margin-top:10px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <form action="{{ URL::to('mobile-registration/store',null) }}" method="post" class="form-horizontal form-row-seperated user_registration_form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group" style="position: relative;">
                 <span class="user-reg-bd"><i class="fa fa-globe" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                 </span>
                <input  style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px; padding-left: 50px;"   type="text" class="form-control" id="" placeholder="Country/Region">
                <!-- <img src="{!! asset('assets/images/bd.gif') !!}" id="countryFlagImg" hasloadnophoto="false" style=""> -->
                <?php 
                 $country=DB::table('bdtdc_country')->get();
                ?>
                <select class="select_count_m" name="country" style="position: absolute;top: 10px;right: 0;">
                  @foreach($country as $data)
                  <option value="{{$data->id}}" name="country">{{$data->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group" style="position: relative;">
                   <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"  type="text" name="first_name" class="form-control" id="" placeholder="First Name">
              </div>
               <div class="form-group" style="position: relative;">
                  <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"  type="text" name="last_name" class="form-control" id="" placeholder="Last Name">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-building" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="text" name="company_name" class="form-control" id="" placeholder="Company Name">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="email" name="email" class="form-control" id="" placeholder="Email">
              </div>
               <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-key" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="password" name="password" class="form-control" id="" placeholder="Password">
              </div>
             <!--  <div class="form-group" style="position: relative;">
                  <span class="user-reg-bd"><i class="fa fa-check-circle-o" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                  <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="" name="" class="form-control" id="" placeholder="Enter the code shown">
              </div> -->
              <button type="submit" class="btn btn-default" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SUBMIT</span></button>
          </form>
        </div>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>