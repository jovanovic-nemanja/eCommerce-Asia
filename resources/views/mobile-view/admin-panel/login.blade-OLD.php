<?php
ini_set('allow_url_fopen',1);
?>
@extends('mobile-view.layout.master_m')

@section('title', 'Login')
@section('page_content_title','Login')

@section('content')
<?php
 use App\Helper\Ip;
 $ip=Ip::get();
?>
<section>
<div class="container">
<div class="row" style="background: #fff!important;">
    <div class="col-xs-12 box" style="margin: 0px; padding: 0;">
            <div  style="margin-top:5%;padding-bottom: 5.2%; border:0 none; box-shadow: none !important;" id="shodow">
                {!! Form::open(['route' => 'sessions.store']) !!}
                    @if (session()->has('flash_message'))
                        <div class="alert alert-success" style="text-align: center;">
                            {{ session()->get('flash_message') }}
                        </div>
                    @endif
    
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <div id="login_field" class="col-md-11">
                    <div class="form-group">
                    <label>Account</label>
                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!}
                        {!! errors_for('email', $errors) !!}
                    </div>

               <div style="text-align:right;" class="form-group">

          <a itemprop="url" href="{{ URL::to('forgot_password',null)}}" id="forget-password">
        Forgot password? </a>              
              
                        {!! Form::password('password', ['placeholder' => 'Password','class' => 'form-control', 'required' => 'required'])!!}
                        {!! errors_for('password', $errors) !!}
                    </div>

                    <div class="checkbox">
                        <div class="form-group">
                            <label>
                                {!! Form::hidden('remember', 'remember') !!} 
                                @if(isset($return_url))
                                {!! Form::hidden('return_url', $return_url) !!}
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                    
                        {!! Form::submit('Sign In', ['class' => 'btn btn btn-lg btn-primary btn-block','style'=>'padding-bottom: 26px;border-radius: 5px!important;']) !!}
                    </div>
                    <div style="padding:10px 0px 5px 2px; text-align:right;">
                    <a itemprop="url" href="{{ URL::to('join')}}"><b>Join Free</b></a>
                    </div>
                   
                        <div style="padding-left: 4%; padding-bottom: 30px;" class="social-icons pull-left">
							<ul class="nav navbar-nav">
                            Your Ip Address: {{ $ip }}<br>	
							</ul>
						</div>
                 </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
 </div>
 </section>
   

@endsection
@section('scripts')
    <script>
    $.ajax({
        url: "https://geoip-db.com/jsonp",
        jsonpCallback: "callback",
        dataType: "jsonp",
        success: function( location ) {
            $('#country').html(location.country_name);
            $('#state').html(location.state);
            $('#city').html(location.city);
            $('#latitude').html(location.latitude);
            $('#longitude').html(location.longitude);
            $('#ip').html(location.IPv4);  
        }
    });     
    </script>
@stop