@extends('mobile-view.layout.master_m')

@section('title', 'Password Reset Email')

@section('content')
<section>
        <div class="container">
        <div class="row" style="padding-bottom: 10%;">
            <div class="col-xs-12">
                <div class="panel panel-default" style="border: 0 none; background-color: #F5F5F5; height: auto;">
                    <div class="panel-body" style="margin-top:30px; height: auto !important; overflow: hidden; ">
                    <div style="width: 350px; height: 20px; display: block;">
                        <div class="veri" style="width: 150px; display: block; float: left; position: relative;">
                            <div class="verify-circle" style=" border-radius: 50% !important; border:0 none; float: left; position: absolute;top: -8px;"><span style="color: #fff; text-align: center; padding-left: 5px;">1</span>
                            </div>
                            <span style="position: absolute; top: 20px; color: #666; padding: 0; margin: 0; color: #FF4400;">Verify</span>
                        </div>
                        <div class="veri" style="width: 150px; display: block; float: left;position: relative;">
                        <div class="verify-circle" style=" border-radius: 50% !important; background-color:#C3C3C1; border:0 none;position: absolute;top: -8px;"><span style="color: #fff; text-align: center; padding-left: 5px;">2</span>
                        </div>
                        <span style="position: absolute; top: 20px; color: #666; padding: 0; margin: 0;">Reset Password</span>
                        </div>
                        <div style="display: block; float: left; position: relative;">
                        <div class="verify-circle" style=" border-radius: 50% !important; background-color:#C3C3C1;position: absolute;top: -8px; "><span style="color: #fff; text-align: center; padding-left: 5px;">3</span>
                        </div>
                        <span style="position: absolute; top: 20px; color: #666; padding: 0; margin: 0;">Finish</span>
                        </div>
                   </div>
                    
                        {!! Form::open(['action' => 'Auth\PasswordController@postEmail']) !!}
                        <fieldset style="margin-top: 15%;">

                            @if (session()->has('flash_message'))
                                <div class="alert alert-success">
                                    {{ session()->get('flash_message') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <p style=" vertical-align: baseline;font-size: 100%;"><span><i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #68B5E2;font-size: 100%;padding-right: 10px;"></i></span>If you would like to verify your account by email verification, please follow these step.</p>

                            <!-- Email field -->
                            <div style=" display: block; height: auto; padding: 20px 5px;">
                            <div style="clear: both;">
                                <label for="usr" style="width: 160px;display: inline-block;text-align: left;">Your email address :</label>
                            </div>
                                <div class="form-group" style="max-width: 250px; clear: both;" >
                                <select class="form-control" id="sel1">
                                    @foreach($user_email as $data)
                                            <option>{{ $data }}</option>
                                            @endforeach       
                                  </select>
                                    <!-- {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!} -->
                                </div>
                                <div style="clear: both;"></div>
                                <button type="button" class="btn btn-default btn-lg" style="float: left; height: 35px; padding-top: 5px; font-size: 13px; color: #666; background-color: #F3F3F3;">Click here to receive your verification code</button>
                                <div style="clear: both;"></div>
                            </div>
                            <div style="height: auto;">
                                <p style="font-size: 12px; color: #666; "><span><i class="fa fa-check-circle" aria-hidden="true" style="color: #B5DE70;padding-right: 10px;"></i></span>A verification code has been sent to your email address and remains valid for 15 minutes enter valid, please do not share this code to others</p>
                            </div>
                            <div style="clear: both;"></div>
                           
                            <div style="display: block; height: auto; padding: 20px 5px;">

                                 <label for="usr" style="width: 160px;float: left;display: inline-block; text-align:left;">Verification code :</label>
                                <div class="form-group" style="width: 100px; float: left;">
                                           {!! Form::text('email', null, ['placeholder' => '6 digit', 'class' => 'form-control', 'required' => 'required'])!!}
                                </div>
                               
                            </div>
                            
                            <div style="clear: both;"></div>

                            <!-- Submit field -->
                         <div style="display: block; height: auto; padding: 5px;">
                                <div style="float: left;color: #CF8059; padding-top: 5px; font-size: 12px;padding-bottom: 10px; display: block;clear: both;">
                                    Choose another verification method
                                </div>
                            <div class="form-group" style="padding-top:20px;">
                                <div style="width: 100px; border-radius: 5px !important; float: left; padding-right: 15px;">
                                     {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                               
                            </div>
                        </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                    <div style="min-height: 200px; margin-top: 8%; background-color: #FFFCED; display: block; vertical-align: baseline;padding: 0; margin: 0; clear: both;">
                        <div style="padding: 10px 20px;">
                             <p style="font-size: 14px; color: #666; width: 100%; float: left; line-height: 30px;">Did not receive email verification code?</p>
                            <ul style="padding: 0; display: block;width: 100%; line-height: 24px; font-size: 12px;">
                                <li>1. This may have to with temporary network problem. Please apply for new code or try again letter</li>
                                <li>2. Please make sure you can receive email, do not forget to check your spam folder</li>
                                <li>3. If you don't have access your email, Please select another verification method</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection