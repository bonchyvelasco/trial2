@extends('master')

@section('title')
    Manage Products
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')
    <div class = "limit-center">
    <h1>Manage Products</h1>
    <button><a href = "{{ url('/manage/products/create')}}">New Product</a></button>
    @include('admin.productsTable', compact('products'))
    </div>
@stop