@extends('fontend.master-login')
@section('page_css')
    <link rel="stylesheet" property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/source-view.css') !!}" media="all"  hreflang="en" type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title', 'Password Reset Email')

@section('content')

        <div class="container">
        <div class="row padding_0" style="padding-bottom: 10%;">
            <div class="col-sm-2 col-md-2">
                
            </div>
            <div class="col-md-6 padding_0;">
                <div class="panel panel-default" style="border: 0 none; background-color: #F5F5F5;">
                    <div class="panel-body" style="margin-top: 20%;">
                    <div style="width: 600px; height: 20px; display: block;">
                        <div class="veri" style="width: 300px; display: block; float: left; position: relative;">
                            <div class="verify-circle" style=" border-radius: 50% !important; border:0 none; float: left; position: absolute;top: -8px;"><span style="color: #fff; text-align: center; padding-left: 5px;">1</span>
                            </div>
                            <span style="position: absolute; top: 20px; color: #666; padding: 0; margin: 0; color: #FF4400;">Verify</span>
                        </div>
                        <div class="veri" style="width: 300px; display: block; float: left;position: relative;">
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
                    
                        {!! Form::open(array('url'=>'reset_password','method'=>'get')) !!}

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

                            <p style=" width: 120%; vertical-align: baseline;font-size: 100%;"><span><i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #68B5E2;font-size: 100%;padding-right: 10px;"></i></span>If you would like to verify your account by email verification, please follow this step.</p>

                            <!-- Email field -->
                            <div style="max-width: 530px; display: block; height: auto; padding: 20px 5px;">

                                <label for="usr" style="width: 160px; float: left;display: inline-block;text-align: right;">Your email address :</label>
                                <div class="form-group" style="max-width: 350px; float: left; padding-left: 15px;" >
                                <!-- <select class="form-control" id="sel1">
                                    @foreach($user_email as $data)
                                            <option>{{ $data }}</option>
                                            @endforeach       
                                  </select> -->
                                  

                                     <!-- <label for="usr" style="width: 160px;float: left;display: inline-block; text-align: right;">Verification code :</label> -->
                                    <div class="form-group" style="width: 340px; float: left;  padding-left: 5px;">
                                             {!! Form::text('email', $data, ['placeholder' => 'Email', 'class' => 'form-control email_resend', 'required' => 'required'])!!}

                                              <!-- <input type="email" name="email_validate" value="{{ $data }}"> -->
                                   
                                </div>
                                    <!-- {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!} -->
                                </div>
                                <div style="clear: both;"></div>
                                <button type="button" id="content" class="btn btn-default btn-lg" style="width: 754px; float: left; height: 35px; padding-top: 5px; font-size: 13px; color: #666; background-color: #F3F3F3;">Please click here to receive your verification code!</button>
                                <div style="clear: both;"></div>
                                <div class="alert alert-primary" role="alert" id="send_alert" style="background: rgb(193 212 214); width: 448px; padding-left: 17px;position: relative;left: 153px;">
                                  <b>We have sent a verification email to given address.</b>
                                </div>
                            </div>
                            <div style="width: 630px; height: auto; margin-left: 160px;">
                                <p style="font-size: 12px; color: #666; "><span><i class="fa fa-check-circle" aria-hidden="true" style="color: #B5DE70;padding-right: 10px;"></i></span>A verification code has been sent to your email address and remains valid for 15 minutes. Enter valid verification code, please do not share this code with others.</p>
                            </div>
                            <div style="clear: both;"></div>
                           
                            <div style="max-width: 530px; display: block; height: auto; padding: 20px 5px;">

                                 <label for="usr" style="width: 160px;float: left;display: inline-block; text-align: right;">Verification code :</label>
                                <div class="form-group" style="width: 340px; float: left;  padding-left: 15px;">
                                           {!! Form::text('token', null, ['placeholder' => '10 digit', 'class' => 'form-control', 'required' => 'required'])!!}
                                </div>
                               
                            </div>
                            
                            <div style="clear: both;"></div>

                            <!-- Submit field -->
                         <div style="max-width: 530px; display: block; height: auto; padding: 10px 5px;">
                            <div class="form-group" style="padding-left: 35%; padding-top: 2%;">
                                <div style="width: 325px; border-radius: 5px !important; float: left; padding-right: 15px;">
                                     {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                                <!-- <div style="float: right;color: #CF8059; padding-top: 5px; font-size: 12px;">
                                    Choose another verification method
                                </div> -->
                            </div>
                        </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                    <div style="max-width: 700px; height: 200px; margin-top: 8%; background-color: #FFFCED; display: block; vertical-align: baseline;padding: 0; margin: 0; clear: both;">
                        <div style="padding: 10px 20px;">
                             <p style="font-size: 14px; color: #666; width: 100%; float: left; line-height: 30px;">Did not receive email verification code?</p>
                            <ul style="padding: 0; display: block;width: 100%; line-height: 24px; font-size: 12px;">
                                <li>1. It could be a temporary network problem. Please check your internet connection.</li>
                                <li>2. Please make sure you received the email, do not forget to check your spam folder.</li>
                                <li>3. If you don't have access to your email, Please contact our Support click here
(click here should be hyperlinked to support@buyerseller.asia)</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-md-4">
                
            </div>
        </div>
    <script>
        $('#send_alert').hide();
        $('#content').click(function(e) {
            e.preventDefault();
            $('#send_alert').show()
            // var menuId = $('#sel1').find(":selected").text();
            var menuId = $('.email_resend').val();
            // alert(menuId);
            var request = $.ajax({
              url: "{{URL::to('/forgot_password')}}",
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
              type: "POST",
              data: {email : menuId},
              dataType: "html"
            });

            request.done(function(msg) {
                setTimeout(function(){ 
                   $('#send_alert').hide();
                }, 2500);
            });

            request.fail(function(jqXHR, textStatus) {
              alert( "Request failed: " + textStatus );
            });
        });
    </script>
@stop