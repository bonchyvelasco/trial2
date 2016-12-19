@extends('master')

@section('title')
    Payment History
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')
<div class = "limit-center">
<h1>
Cart
</h1>
<table>
    <tr>
        <th>Product</th>
        <th>Customer</th>
        <th>Quantity</th>
        <th>Date Added</th>
        <th>Date Paid</th>
    </tr>
@foreach ($cart['items'] as $item)
    <tr>
        <td>{{ $item->_product->name }}</td>
        <td>{{ $item->user->username }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->dateadded }}</td>
        <td>{{ $item->datepaid }}</td>
    </tr>
@endforeach
    <tr>
        <td><b>Total</b> </td>
        <td></td>
        <td><b>Amount:</b> {{$cart['count']}}</td>
        <td><b>Price:</b> {{$cart['total']}}</td>
    </tr>
</table>
</div>
@stop