@extends('fontend.master3')
	@section('content')
		<div class="row padding_0" style="background: #fff; padding-bottom: 5%; margin-bottom: 2%;margin-top:2%;border:1px solid #DDD;">
			<div class="col-sm-12 col-lg-12 padding_0" style="">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="col-sm-12" style="padding-top:5%;">
						<div class="col-sm-4">
							<p style="font-weight: 700;color: #999;font-size: 12px;border-bottom:1px solid #DDD;padding-bottom:10px;">Personal Information</p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="{{URL::to('my-profile')}}"style="color: #333;">My Profile</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="{{URL::to('member-profile')}}"style="color: #333;">Member Profile</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="{{URL::to('upload-photo')}}"style="color: #333;">Upload My Photo</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href=""style="color: #333;">Privacy Setting</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href=""style="color: #333;">Email Services</a></p>
						</div>
						<div class="col-sm-4">
							<p style="font-weight: 700;color: #999;font-size: 12px;border-bottom:1px solid #DDD;padding-bottom:10px;">Account Security </p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="{{URL::to('subscript/change-email')}}"style="color: #333;">Change Email Address</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="{{URL::to('forgot_password')}}"style="color: #333;">Change Password</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href=""style="color: #333;">Set Security Question</a></p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href=""style="color: #333;">Manage Verification Phones</a></p>
						</div>
						<div class="col-sm-4">
							<p style="font-weight: 700;color: #999;font-size: 12px;border-bottom:1px solid #DDD;padding-bottom:10px;">Payment Account</p>
							<p style="width: auto;font-weight: 400;font-size: 12px;line-height: 18px;"><a href="" style="color: #333;">Bank Account</a></p>
						</div>
					</div>
				</div>
				<div class="col-sm-2"></div>			

			</div>

		
		
		</div>
@stop
@section('scripts')
<script type="text/javascript">


</script>

@stop