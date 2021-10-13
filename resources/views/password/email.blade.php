@extends('fontend.master_dynamic')

@section('title', 'Password Reset Email')

@section('content')

        <div class="container">
        <div class="row padding_0" style="padding-bottom: 10%;">
            <div class="col-sm-4">
                
            </div>
            <div class="col-md-6 padding_0">
                <div class="panel panel-default" style="border: 0 none; background-color: #F5F5F5;">
                    <div class="panel-body" style="margin-top: 20%;">
                        {!! Form::open(array('url'=>'forgot_password','method'=>'POST')) !!}
                        <fieldset>

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

                            <p style="position: absolute; top: 20%; left: -10%; vertical-align: baseline;font-size: 100%;"><span><i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #68B5E2;font-size: 100%;padding-right: 10px;"></i></span>Please enter Email of the account to retrieve your password.</p>

                            <!-- Email field -->
                            <div style="max-width: 530px; display: block; height: auto; padding: 20px 5px;">

                                 <label for="usr" style="width: 75px; float: left;display: inline-block;">Email:</label>
                                <div class="form-group" style="width: 364px;float: left;">

                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!}
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                           
                          
                            
                            <div style="clear: both;"></div>
                            <!-- Submit field -->
                            <div class="form-group" style="padding-left: 15%; padding-top: 4%;">
                                <div style="width: 100px; border-radius: 5px !important;">
                                     {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                                </div>
                               
                            </div>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="col-sm-4 col-md-4">
                
            </div>
        </div>
    </div>

@endsection