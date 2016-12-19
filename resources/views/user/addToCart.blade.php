@extends('master')

@section('title')
    Add To Cart
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')
<div class = "limit-center">
<h3>Add to Cart</h3>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method = "POST" action = "{{url('/addToCart')}}" >
    {{ csrf_field() }}
    <h3>Product Name</h3> 
    <input type = "text" name = "product" value = "{{ $product->name or old('product') }}">
    <h3>Quantity</h3>
    <input type = "number" name = "qty" autofocus value = "{{ $product->qty or old('qty') }}">
   <button type = "submit">Add to Cart
    </button>
</form>
</div>
@stop