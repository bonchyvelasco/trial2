@extends('master')

@section('title')
    Create Product
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')

    <div class = "limit-center">
        <h2>Create Product</h2>
        @include('admin.productsForm')
    </div>
@stop