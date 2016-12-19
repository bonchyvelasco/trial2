@extends('master')

@section('title')
    Edit Profile
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')

    <div class = "limit-center">
        <h2>Edit User</h2>
   @if (count($errors) > 0)
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
                
        <form method = "POST" action = "{{url('/user')}}" >
            @if (isset($user))
                {{ method_field('PATCH') }}
            @endif
            {{ csrf_field() }}
            <h3>Username</h3> 
            <input type = "text" name = "username" autofocus value = "{{ $user->username or '' }}">
            <h3>First Name</h3>
            <input type = "text" name = "firstname" value = "{{ $user->firstname or '' }}">
            <h3>Last Name</h3>
            <input type = "text" name = "lastname" value = "{{ $user->lastname or '' }}">
            <h3>Email</h3>
            <input type = "email" name = "email" value = "{{ $user->email or '' }}">
            <h3>Password</h3>
            <input type = "password" name = "password">
            <h3>Confirm Password</h3>
            <input type="password" name="password_confirmation">
            <button type = "submit">
                Update Profile
            </button>
        </form>
    </div>
@stop