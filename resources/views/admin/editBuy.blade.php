@extends('master')

@section('title')
    Edit Transaction
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')

    <div>
        <h2>Edit Transaction</h2>
        @include('admin.buysForm', compact('buy'))
    </div>
@stop