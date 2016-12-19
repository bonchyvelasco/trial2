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
@if (isset($product))
    {{'/manage/products/'.$product->id.''}}
@else
    {{'/manage/products/create'}}
@endif
" >
    @if (isset($product))
        {{ method_field('PATCH') }}
    @endif
    {{ csrf_field() }}
    <h3>Product Name</h3> 
    <input type = "text" name = "name" autofocus value = "{{ $product->name or old('name') }}">
    {{-- <h3>Owner</h3>
    <input type = "hidden" name = "owner" value = "{{ $product->owner or old('owner') }}"> --}}
    <h3>Price</h3>
    <input type = "text" name = "price" value = "{{ $product->price or old('price') }}">
    <h3>Quantity</h3>
    <input type = "number" name = "qty" value = "{{ $product->qty or old('qty') }}">
    
    @if (isset($product))
    
    {!!'<h3>Status</h3><input type = "text" name = "status" value = "'!!}{{$product->status or old("status")}}{!!'">'!!}
    @endif

    <h3>Description</h3>
    <textarea name = "description">{{$product->description or old('description')}}</textarea>
    <button type = "submit">
        @if (isset($product))
            {{'Update Product'}}
        @else
            {{'Create Product'}}
        @endif
    </button>
</form>
