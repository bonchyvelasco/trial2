<table>
    <tr>
        <th>Product</th>
        <th>Customer</th>
        <th>Quantity</th>
        <th>Date Added</th>
        <th>Status</th>
        <th>Date Paid</th>
    </tr>
@foreach ($buys as $buy)
    <tr>
        <td>{{ $buy->_product->name }}</td>
        <td>{{ $buy->user->username }}</td>
        <td>{{ $buy->qty }}</td>
        <td>{{ $buy->dateadded }}</td>
        <td>{{ $buy->status }}</td>
        <td>{{ $buy->datepaid }}</td>
        <td><button><a href = "/manage/buys/{{$buy->id}}/edit">Edit</a></button>
            <form action = "/manage/buys/{{$buy->id}}" method="POST" onsubmit = "return confirm('Do you really want to delete this transaction?');">
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