<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    public function create() {
        return view('admin.createUser');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users,username|max:50',
            'password' => 'required|min:6|confirmed',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'email' => 'email|max:255|unique:users,email',
            'is_admin' => 'required',
        ]);

        $user = new User;
        
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->is_admin = $request->is_admin;

        $user->save();        

        return redirect('/manage/users'); 
    }

    public function edit(User $user) {
        return view('admin.editUser', compact('user'));
    }

    public function update(Request $request, User $user) {
        
        $this->validate($request, [
            'username' => 'required|unique:users,username,'.$user->id.'|max:50',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'password' => 'max:50|confirmed',
            'email' => 'email|max:255',
            'is_admin' => 'required',
        ]);

        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->is_admin = $request->is_admin;
        
        $user->save();

        return redirect('/manage/users');
    }

    public function delete(User $user) {
        $user->delete();
        return redirect('/manage/users');
    }
}
