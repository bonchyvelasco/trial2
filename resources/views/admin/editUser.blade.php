@extends('master')

@section('title')
    Edit User
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')

    <div class = "limit-center">
        <h2>Edit User</h2>
        @include('admin.userForm', compact('user'))
    </div>
@stop