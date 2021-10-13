@extends('protected.admin.master')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>

    @if (session()->has('flash_message'))
        <div class="alert alert-success">{{ session()->get('flash_message') }}</div>
    @endif

    {!! Form::model($user, ['method' => 'POST', 'route' => ['admin.profiles.update', $user->id]]) !!}
        <input type="hidden" name="id" value="{{ $user->id}}">
        <div class="form-group">
            <select   class="form-control" name ="account_type">
                @foreach($roles_value as $element)
                    <option value="{{$element['id']}}"  {{$element['name'] == $user_role? 'selected' : '' }}>{{$element['name']}}</option>
                @endforeach 
            </select> 
        </div>

        <!-- email Field -->
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
            {{-- {!! errors_for('email', $errors) !!} --}}
        </div>


        <!-- first_name Field -->
        <div class="form-group">
            {!! Form::label('first_name', 'First Name:') !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            {{-- {!! errors_for('first_name', $errors) !!} --}}
        </div>

        <!-- last_name Field -->
        <div class="form-group">
            {!! Form::label('last_name', 'Last Name:') !!}
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            {{-- {!! errors_for('last_name', $errors) !!} --}}

        </div>

        <!-- Password field -->
        <!-- <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
            <p class="help-block">Leave password blank to NOT edit the password.</p>
            {{-- {!! errors_for('password', $errors) !!} --}}
        </div> -->

        <!-- Password Confirmation field -->
        <!-- <div class="form-group">
            {!! Form::label('password_confirmation', 'Repeat Password:') !!}
            {!! Form::password('password_confirmation', ['class' => 'form-control'] )!!}
        </div> -->


        <!-- Update Profile Field -->
        <div class="form-group">
            {!! Form::submit('Update Profile', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

@endsection