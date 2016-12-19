<table>
    <tr>
        <th>Name</th>
        <th>Owner</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Time Posted</th>
        <th>Status</th>
        <th>Description</th>
        <th>Actions</th>
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
        <td><button><a href = "/manage/products/{{$product->id}}/edit">Edit</a></button>
            <form action = "/manage/products/{{$product->id}}" method="POST" onsubmit = "return confirm('Do you really want to delete this product?');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit">
                    Delete
                </button>
            </form>
        </td>
    </tr>
@endforeach
</table>