@extends('master')

@section('title')
    Home
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')
<div class = "limit-center">
<h1>Welcome {{$user->username}}</h1>
<h4>Name: {{$user->firstname}} {{$user->lastname}}</h4>
<h4>Email: {{$user->email}}</h4>
</div>
@endsection