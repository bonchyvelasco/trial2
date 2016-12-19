<div class = 'nav'>

    <div class = 'limit-center'>
    <h1 class = 'title'><a href = "{{url('/home')}}">AniMall</a></h1>
    <ul class = 'navlist'>
        @if (in_array('logout', $contains))
            <form action="{{ url('/logout') }}" method="POST" style = "display: inline-block;">
                {{ csrf_field() }}
                <button type = "submit" class = "nav_items" style = "background: none; width: auto;"><a>Log Out</a></button>
            </form>
        @endif
        @if (in_array('users', $contains))
            <li class = "nav_items"><a href = "{{url('/manage/users')}}">Users</a></li>
        @endif
        @if (in_array('users', $contains))
            <li class = "nav_items"><a href = "{{url('/manage/products')}}">Products</a></li>
        @endif
        @if (in_array('users', $contains))
            <li  class = "nav_items"><a href = "{{url('/manage/buys')}}">Transactions</a></li>
        @endif
        @if (in_array('login', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/login').'>Log In</a></li>'!!}
        @endif
        @if (in_array('register', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/register').'>Register</a></li>'!!}
        @endif
        @if (in_array('cart', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/cart').'>Cart</a></li>'!!}
        @endif
        @if (in_array('shop', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/shop').'>Shop</a></li>'!!}
        @endif
        @if (in_array('history', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/history').'>History</a></li>'!!}
        @endif
        @if (in_array('editprofile', $contains))
            {!!'<li class = "nav_items"><a href = '.url('/user/edit').'>Edit Profile</a></li>'!!}
        @endif
    </ul>
    </div>
</div>