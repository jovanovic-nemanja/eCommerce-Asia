<section>
<div class="container">
<div class="row">
  <nav class="navbar navbar-default" aria-label="Navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" style="margin-bottom: 0 !important;">
    <div class="navbar-header" style="padding: 10px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="background: #255E98">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="margin-left: 10px; background-image: none " rel="home" itemprop="url" title="Manufacturers-Suppliers"  href="{{ URL::to('/',null)}}">
        <img style="width:100px; margin-top: 10px;" src="{!! asset('assets/logo.png') !!}" alt="bdtdc">
     <!--  <img style="width: 90px; margin: 0 auto;" alt="logo" style="" itemprop="logo" class="loggg" src="{{ asset('assets/logo.png') }}" /> -->

      </a>
   <!--  <div style="line-height: 14px;word-spacing: 0px;margin-top:0px;padding-top:0px; width: 140px; text-align: center; font-size: 10px;text-align:center; margin-left: -10px; "   id="bang-trade" onMouseOver="">Bangladesh Trade <span>Development Council</span></div> -->
    </div>

  <div class="collapse navbar-collapse m-nevbar" id="bs-example-navbar-collapse-1" style="padding-right: 0;">
      <div class="user-login-m">
          <div class="unregister" style="position: relative;">
                  <div class="avatar">
                        <div><a itemprop="url" href="" class="avatar-span"></a></div>                        
                  </div>
                  <div style="position: absolute;bottom: 18px;left: 15px;display: block;overflow: hidden; bottom: 5px;">
                         @if (Sentinel::check())
                        <a itemprop="url" class="sng btn btn-info btn-lg" href="{{URL::to('/logout')}}" style=" background: 0 none; color: #fff !important;">Logout</a>
                    @else
                       <span class="sng btn btn-info btn-lg si_active" style=" background: 0 none; color: #fff !important;"> Sign In</span> <span class="sng" style="width: 20px; float: left; color:#fff;">|</span>
                       <span class="sng btn btn-info btn-lg jn_active" style="background: 0 none;color: #fff !important;">Join Free</span>
                        
                     @endif
                </div>
          </div>
      </div>
    <ul class="nav navbar-nav" style="margin: 0;">
        <li class=""><a itemprop="url" href="{{ URL::to('/',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-home" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Home<span class="sr-only">(current)</span></a></li>
       <li><a itemprop="url" href="{{URL::to('default/chat/default',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Messanger</a></li>
       <li><a itemprop="url" href="{{URL::to('default/message',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 13px;"><i class="fa fa-envelope" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span>Inquiries
       </a></li>
       <li><a itemprop="url" href="{{URL::to('Mybuying-Request',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-leaf" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Buying Request</a></li>
       <li><a itemprop="url" href="{{URL::to('get-quotations',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-bolt" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Quick Quotation</a></li>
       <li><a itemprop="url" href="{{URL::to('my-favorite',null)}}" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-star" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> My Favorites</a></li>
      <li><a itemprop="url" href="http://support.bdtdc.com/" style="font-size: 16px; color:#666;"><span style="padding-right: 12px;"><i class="fa fa-comment" aria-hidden="true" style="font-size: 22px;color:#666;"></i></span> Feedback</a></li>
     


     </ul> 
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
      <div id="sign_bdtdc" class="tab-pane fade in active">
        <div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff; height: 450px;">
          {!! Form::open(['route' => 'sessions.store']) !!}
                       
              <div class="form-group reg-frm-bd" style="border:0 none;">

                          
               
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
                <select class="select_count_m" name="country" style="position: absolute;top: 10px;right: 30px;">
                  @foreach($country as $data)
                  <option value="{{$data->id}}" name="country">{{$data->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group" style="position: relative;">
                   <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"  type="text" name="first_name" class="form-control" id="" placeholder="First Name" required>
              </div>
               <div class="form-group" style="position: relative;">
                  <span class="user-reg-bd"><i class="fa fa-user" aria-hidden="true" style="font-size: 20px; color:#666;"></i>
                  </span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"  type="text" name="last_name" class="form-control" id="" placeholder="Last Name" required>
              </div>
                <div class="form-group" style="position: relative;">
                    <span class="user-reg-bd"><i class="fa fa-building" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                    <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="text" name="company_name" class="form-control" id="" placeholder="Company Name" required>
                </div>

                <div class="form-group" style="position: relative;">
                    <span class="user-reg-bd"><i class="fa fa-envelope-o" aria-hidden="true" style="font-size: 20px; color:#666;">
                    </i></span>
                    <!-- <input type="hidden" name="check_email" value="member already existed"> -->

                    <input style="border: 0 none;border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;" type="email" name="email" class="form-control" id="repeat_mail" placeholder="Email" required>
                    <div class="login_link" style="margin-left: 8%;">
                    <p class="" style="font-size: 10px;color: #ff0000;">This user already exists</p>
                    <a href="{!! URL::to('ServiceLogin') !!}" class="btn btn-primary login_link_btn" style="    font-size: 10px;
    padding-left: 1%;
    height: 23px;
    padding-top: 1%;
    width: 31%;">Click here to login</a>
                    </div>

                </div>
        
                                
                     

                <div class="form-group" style="position: relative;">
                <span class="user-reg-bd"><i class="fa fa-key" aria-hidden="true" style="font-size: 20px; color:#666;"></i></span>
                <input style="border: 0 none; border-bottom: 1px solid #dcdee3;height: 48px;margin-top: 0px;padding-left: 50px;"   type="password" name="password" class="form-control" id="" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-default check_email" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SUBMIT</span></button>
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
</div>
</section>
@section('topbar_m_script')
<script type="text/javascript">
$(document).ready(function(){
$('.login_link').hide();
 });
    $(document).on({'input paste keyup':function(){
    
    var base_url="{{URL::to('/')}}";
    var check_email = $(this).val();
    // alert(check_email);
    // var email_check= $('.check_email').val();
    // $('input[name="check_email"]').val(email_check);
    
   // var url=base_url+'/Bdtdc/check_email?check_email='+check_email;
   
    // window.location.href=url;
   url = base_url+"/check_existing_user/"+check_email;

        $.get(url,function(r){
            if(typeof r.id !== typeof undefined){
                $('.login_link').show();
            }else{
                $('.login_link').hide();
            }
        });
}},'#repeat_mail');
   
/*
   $(document).on({click:function(e){
    e.preventDefault();
    var base_url="{{URL::to('/')}}";
    var check_email = $('input[name="email"]').val();
   
    window.location.href=url;

}},'.check_email');*/
</script>
@stop