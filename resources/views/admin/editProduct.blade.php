@extends('master')

@section('title')
    Edit Product
@stop



@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop
@section('content')

    <div class = "limit-center">
        <h2>Edit Product</h2>
        @include('admin.productsForm', compact('product'))
    </div>
@stop