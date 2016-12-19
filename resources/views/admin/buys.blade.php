@extends('master')

@section('title')
    Manage Transactions
@stop


@section('navbar')
    @include('nav', ['contains'=> ['logout', 'users', 'products', 'transactions']])
@stop

@section('content')
    <div class = "limit-center">
    <h1>Manage Transactions</h1>
    <button><a href = "{{ url('/manage/buys/create')}}">New Transaction</a></button>
    @include('admin.buysTable', compact('buys'))
    </div>
@stop