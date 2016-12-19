@extends('master')

@section('title')
    Create User
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')

    <div class = "limit-center">
        <h2>Create User</h2>
        @include('admin.userForm')
    </div>
@stop