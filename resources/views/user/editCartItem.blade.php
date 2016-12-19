@extends('master')

@section('title')
    Edit Cart Item
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')
<div class = "limit-center">
<h1>Edit Cart Item</h1>
@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method = "POST" action = "{{url('/cart/'.$buy->id.'/edit')}}" >
    {{ csrf_field() }}
    {{ method_field('PATCH')}}
    <h3>Product Name</h3> 
    <input type = "text" name = "product" value = "{{ $buy->_product->name or old('product') }}" disabled = "disabled">
    <h3>Quantity</h3>
    <input type = "number" name = "qty" autofocus value = "{{ $buy->qty or old('qty') }}">
   <button type = "submit">Update Cart
    </button>
</form>
</div>
@stop