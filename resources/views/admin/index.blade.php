@extends('master')

@section('title')
    Manage
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')
<div class = "limit-center">
<h1>Manage Site</h1>
<h1>Welcome {{$user->username}}</h1>
<h4>Name: {{$user->firstname}} {{$user->lastname}}</h4>
<h4>Email: {{$user->email}}</h4>
</div>
@stop