    <table>
        <tr>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Admin?</th>
            <th>Actions</th>
        </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>@if ($user['is_admin'])
                    {{'yes'}}
                @else
                    {{'no'}}
                @endif
            </td>
            <td><button><a href = "/manage/users/{{$user->id}}/edit">Edit</a> </button>
                <form action = "/manage/users/{{$user->id}}" method="POST" onsubmit = "return confirm('Do you really want to delete this user?');">
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