@extends('master')

@section('title')
    Cart
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
    </tr>
@foreach ($cart['items'] as $item)
    <tr>
        <td>{{ $item->_product->name }}</td>
        <td>{{ $item->user->username }}</td>
        <td>{{ $item->qty }}</td>
        <td>{{ $item->dateadded }}</td>
        <td><button><a href = "/cart/{{$item->id}}/edit">Edit</a></button>
            <form action = "/cart/delete/{{$item->id}}" method="POST" onsubmit = "return confirm('Do you really want to delete this transaction?');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@endforeach
    <tr>
        <td>Total: </td>
        <td></td>
        <td>Amount: {{$cart['count']}}</td>
        <td>Price: {{$cart['total']}}</td>
    </tr>
</table>
<div>
    <form action = '/cart/pay' method = "POST" onsubmit = "return confirm('Are you sure?')">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <button type="submit">
                Pay
            </button>
        </form>
    </form>
</div>
</div>
@stop