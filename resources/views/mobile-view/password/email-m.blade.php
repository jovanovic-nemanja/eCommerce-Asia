@extends('mobile-view.layout.master_m')

@section('title', 'Password Reset Email')

@section('content')
<section>
        <div class="container">
        <div class="row" style="padding-bottom:30px;">
            <div class="col-md-6">
                <div class="panel panel-default" style="border: 0 none; background-color: #F5F5F5;">
                    <div class="panel-body">
                        {!! Form::open(['action' => 'Auth\PasswordController@postEmail']) !!}
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
            <div>
                <p><span><i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #68B5E2;font-size: 100%;padding-right: 10px;"></i></span>Please enter username of the account to retrive your password.</p>
            </div>
            <div style="max-width: 530px; display: block; height: auto; padding: 20px 5px;">
                        <div style="display: block;">
                          <label for="usr" style="width: 75px; float: left;display: inline-block;">Login ID:</label>
                                <div class="form-group" style="width: 200px; float: left;">

                                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'])!!}
                                </div>
                               
                           </div>
                           <!-- <div style="display: block; float: left; clear: both;">
                                 <label for="usr" style="width: 75px; float: left;">Validate</label>
                                 <div style="height: 30px; border:1px solid #e5e5e5; background-color: #fff; width: 40px; float: left; position: relative; display: inline-block;">
                                     <i class="fa fa-angle-double-right" aria-hidden="true" style="position: absolute; top: 7px; left: 10px; color: #666; font-size: 24px;"></i>
                                 </div>
                                <div class="form-group" style="width: 200px; float: left; background-color: #E8E8E8; height: 30px; text-align: center;padding-top: 4px; color: #666; font-size: 100%; display: block;">
                                            Please slide to verify
                                </div>
                            </div> -->
                            </div>
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
        </div>
    </div>
</section>
@endsection