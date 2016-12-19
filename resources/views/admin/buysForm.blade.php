@if (count($errors) > 0)
<div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method = "POST" action = "
@if (isset($buy))
    {{'/manage/buys/'.$buy->id.''}}
@else
    {{'/manage/buys/create'}}
@endif
" >
    @if (isset($buy))
        {{ method_field('PATCH') }}
    @endif
    {{ csrf_field() }}
    <h3>Product Name</h3> 
    <input type = "text" name = "product" autofocus value = "{{ $buy->_product->name or old('product') }}">
    <h3>Customer Username</h3>
    <input type = "text" name = "customer" value = "{{ $buy->user->username or old('customer') }}">
    <h3>Quantity</h3>
    <input type = "number" name = "qty" value = "{{ $buy->qty or old('qty') }}">
    
    @if (isset($buy))
    
    {!!'
    
    <h3>Status</h3>
    <select name = "status">
        <option value = "paid"
    '!!}
        @if ($buy->status == 'paid')
            {{'selected'}}
        @endif
    {!!'
    >paid</option>
        <option value = "not paid"
    '!!}
        @unless ($buy->status == 'paid')
            {{'selected'}}
        @endif
    {!!'
    >not paid</option>
    </select>
    '!!}
    @endif

   <button type = "submit">
        @if (isset($buy))
            {{'Update Transaction'}}
        @else
            {{'Create Transaction'}}
        @endif
    </button>
</form>
