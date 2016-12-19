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
@if (isset($user))
    {{'/manage/users/'.$user->id.''}}
@else
    {{'/manage/users/create'}}
@endif
" >
    @if (isset($user))
        {{ method_field('PATCH') }}
    @endif
    {{ csrf_field() }}
    <h3>Username</h3> 
    <input type = "text" name = "username" autofocus value = "{{ $user->username or '' }}">
    <h3>First Name</h3>
    <input type = "text" name = "firstname" value = "{{ $user->firstname or '' }}">
    <h3>Last Name</h3>
    <input type = "text" name = "lastname" value = "{{ $user->lastname or '' }}">
    <h3>Email</h3>
    <input type = "email" name = "email" value = "{{ $user->email or '' }}">
    <h3>Password</h3>
    <input type = "password" name = "password">
    <h3>Confirm Password</h3>
    <input type="password" name="password_confirmation">
    <h3>Admin?</h3>
    <input type = "radio" name = "is_admin" value = "true"
    @if (isset($user))
        @if ($user->is_admin)
            {{'checked'}}
        @endif
    @endif
    > Yes
    <input type = "radio" name = "is_admin" value = "false"
    @if (isset($user))
        @unless ($user->is_admin)
            {{'checked'}}
        @endunless
    @else
        {{'checked'}}
    @endif
    > No <br>
    <button type = "submit">
        @if (isset($user))
            {{'Update User'}}
        @else
            {{'Create User'}}
        @endif
    </button>
</form>