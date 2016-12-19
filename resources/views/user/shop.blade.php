@extends('master')

@section('title')
    Shop
@stop

@section('navbar')
    @include('nav', ['contains'=> ['logout', 'cart', 'shop', 'history', 'editprofile']])
@stop

@section('content')
<div class = "limit-center">
<h1>
Shop
</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Owner</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Time Posted</th>
        <th>Status</th>
        <th>Description</th>
    </tr>
@foreach ($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>{{ $product->user->username}}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->qty }}</td>
        <td>{{ $product->dateadded }}</td>
        <td>{{ $product->status }}</td>
        <td>{{ $product->description }}</td>
        <td><form action = "/addToCart/{{$product->id}}" method="GET">
                {{-- <input type = "hidden" value = "{{$product->id}}" name = "id"> --}}
                <button type="submit"
                        @if ($product->qty == 0)
                        {!!'
                            disabled = "disabled"
                        '!!}
                        @endif
                >
                    Add to Cart
                </button>
            </form>
        </td>
    </tr>
@endforeach
</table>
</div>
@stop