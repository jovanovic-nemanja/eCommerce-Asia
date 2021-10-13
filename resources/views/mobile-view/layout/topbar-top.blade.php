<div class="row">
  <nav class="navbar navbar-default" style="margin-bottom: 0 !important;"> 
      <div class="navbar-header" style="padding: 10px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: #255E98">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <div>
          <a style="margin-left: 0; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
          <img alt="logo" style="margin-top:-5px" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" />
          </a>
      </div>
    <div style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px"   id="bang-trade">Bangladesh Trade <span>Development Council</span>
    </div> 
    </div> 
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
      <ul class="nav navbar-nav">

        <li class="">
        <a href="{{ URL::to('online-marketplace',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-home" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Home<span class="sr-only">(current)</span>
        </a>
        </li>
       <li>
       <a href="{{URL::to('Messanger',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Messanger</a>
       </li>
       <li>
          <a href="{{URL::to('messages',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Inquiries</a>
       </li>
       <li>
       <a href="{{URL::to('all-buying-request',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-leaf" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Buying Request</a>
       </li>
       <li>
        <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-bolt" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Quick Quotation</a>
        </li>
       <li>
          <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-star" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Favorites</a>
      </li>
       <li>
        <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-floppy-o" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Coupons</a>
        </li>
      <li>
        <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Feedback</a>
      </li>
      <li>
        <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-power-off" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Sign Out</a>
        </li>
       <li>
        <a href="{{URL::to('',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-download" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Bdtdc.com</a>
      </li>
     </ul> 
     <!-- Navbar start here-->
     <!-- Navbar end here  -->
     </div> 
 </nav>

</div>