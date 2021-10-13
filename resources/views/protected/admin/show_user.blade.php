@extends('protected.admin.master')

@section('title', 'View Profile')

@section('content')
<div class="card user-prof">
    <h3>{{ $user->first_name }}'s Profile</h3>
        <table class="profile-table" style="width:100%">
            <tr>
                <td>Account Type:</td>
                <td>{{ $user_role }}</td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td>{{ $user->last_name }}</td>
            </tr>           
            <tr>
                <td>Contact:</td>
                <td>{{ $user_details->customers?$user_details->customers->telephone:'' }}</td>
            </tr>
            <tr>
                <td>Owner email:</td>
                <td>{{ $user_details->companies?$user_details->companies->owner_email:'' }}</td>
            </tr>
            <tr>
                <td>Owner Contact:</td>
                <td>{{ $user_details->companies?$user_details->companies->owner_contact:'' }}</td>
            </tr>
        </table>
        

    @if(Sentinel::check())
        <div class="edit-btn">
            <a href='{{ $user->id }}/edit' class='btn btn-primary'>Edit Profile</a>
        </div>
        </div>
    @endif

@endsection