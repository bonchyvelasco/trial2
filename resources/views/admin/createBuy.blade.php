@extends('master')


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('title')
    Create Transaction
@stop

@section('content')

    <div class = "limit-center">
        <h2>Create Transaction</h2>
        @include('admin.buysForm')
    </div>
@stop