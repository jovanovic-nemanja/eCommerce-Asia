@extends('fontend.master3')
@section('content')
<div class="secure">Register form</div>
{!! Form::open(array('url'=>'form/store','method'=>'POST')) !!}
<div class="control-group">
  <div class="controls">
  {!! Form::text('name','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Name')) !!}
  @if ($errors->has('name'))<p style="color:red;">{!!$errors->first('name')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Please Enter your Email')) !!}
  @if ($errors->has('email'))<p style="color:red;">{!!$errors->first('email')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  AGE : - {!! Form::select('age', array('' => 'Click to select', '20' => '20 years'),array('class'=>'form-control span6')) !!}
  @if ($errors->has('age'))<p style="color:red;">{!!$errors->first('age')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
  @if ($errors->has('password'))<p style="color:red;">{!!$errors->first('password')!!}</p>@endif
  </div>
</div>
<div class="control-group">
  <div class="controls">
  {!! Form::password('cpassword',array('class'=>'form-control span6', 'placeholder' => 'Confirm your Password')) !!}
  @if ($errors->has('cpassword'))<p style="color:red;">{!!$errors->first('cpassword')!!}</p>@endif
  </div>
</div>
<div id="success"> </div>
{!! Form::submit('Register', array('class'=>'')) !!}
<br />
{!! Form::close() !!}
</div>


@stop