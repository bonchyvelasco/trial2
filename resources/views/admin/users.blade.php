@extends('master')

@section('title')
    Manage Users
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop
@section('content')
    <div class = "limit-center">
    <h1>Manage Users</h1>
    <button><a href = "{{ url('/manage/users/create')}}">New User</a></button>
    @include('admin.usersTable', compact('users'))
    </div>
@stop