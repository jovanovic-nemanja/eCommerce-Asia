@extends('mobile-view.layout.master_m')
	@section('content')
    <section>
    <div class="container">
	<div class="row padding_0" style="background: #fff;">
				<div style="width: 100%;padding-top: 15px;box-shadow: 0px 5px 5px #efefef;">
					 <ul class="nav nav-tabs" style="border-bottom: 0 none;">
					    <li class="active" style="width: 50%;"><a data-toggle="tab" href="#signbdtdc" style="text-align: center;">Sign In</a></li>
					   
					  </ul>
				</div>
		 <div class="tab-content">
			<div id="sign_bdtdc" class="tab-pane fade in active">
				<div style="padding: 60px 0;width: 100%;overflow: hidden;background: #fff; height: 500px;">
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
					     
					      <input style="border:0 none; border-bottom: 2px solid #255E98;" type="email" name="email" class="form-control" id="" placeholder="Enter login email">
					    </div>
					    <div class="form-group reg-frm-bd" style="border:0 none;">
					        <input style="border:0 none; border-bottom: 2px solid #255E98;" type="password" name="password" class="form-control" id="pwd" placeholder="Enter login password">
					    </div>
                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn btn-lg btn-primary btn-block" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button>
					    <!-- <button type="submit" class="btn btn-default" style="width: 100%; background:#255E98;"><span style="color: #fff; font-size: 14px;">SIGN IN</span></button> -->
					    <button type="submit" class="btn btn-default" style="width: 100%; margin-top: 30px;background: #FF6A00;"><span style="color: #fff; font-size: 14px;"><a itemprop="url" href="{{ URL::to('forgot_password',null)}}" id="forget-password" style="color:#fff !important;">FORGOT PASSWORD ?</a></span></button>
				   {!! Form::close() !!}
				</div>
		  </div>

			</div>
	</div>
</div>
</section>
@stop