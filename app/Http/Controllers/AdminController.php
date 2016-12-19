<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Buy;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    public function index(Request $request) {
        $user = $request->user();
        return view('admin.index', compact('user'));
    }

    public function users(User $user) {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function products() {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function buys() {
        $buys = Buy::all();
        return view('admin.buys', compact('buys'));
    }
}

