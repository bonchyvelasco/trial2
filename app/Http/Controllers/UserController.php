<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Query;
use Illuminate\Http\Request;
use App\Product;
use App\Buy;

class UserController extends Controller
{
    public function __create() {
        $this->middleware('auth');
    }

    public function edit(Request $request) {
        $user = $request->user();
        return view('user.editProfile', compact('user'));
    }

    public function update(Request $request) {
        $user = $request->user();
        
        $this->validate($request, [
            'username' => 'required|unique:users,username,'.$user->id.'|max:50',
            'firstname' => 'max:255',
            'lastname' => 'max:255',
            'password' => 'max:50|confirmed',
            'email' => 'email|max:255',
        ]);

        if ($request->password != '') {
            $user->password = bcrypt($request->password);
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;

        $user->save();

        return redirect('/');
    }

    public function shop(Request $request) {
        $products = Product::all();
        return view('user.shop', compact('products'));
    }
    
    public function showCartForm(Product $product) {

        if ($product->status == 'Out of Stock') {
            abort('Product is out of stock');
        }
        return view('user.addToCart', compact('product'));
    }

    public function showEditCartForm(Buy $buy) {

        return view('user.editCartItem', compact('buy'));
    }

    public function addToCart(Request $request) {
        $customer = $request->user();

        $this->validate($request, [
            'product' => 'required|exists:products,name|max:50',
            'qty' => 'required|numeric|min:1|max:'.(string)Product::where('name',$request->product)->first()['qty'],
        ]);

        $buy = new Buy;

        $buy->customer = $customer->id;

        $product = Product::where('name',$request->product)->first();
        $buy->product = $product->id;
        $product->qty = $product->qty - (int)$request->qty;
        $product->save();
        // return $product->id;

        $buy->qty = $request->qty;

        $buy->status = 'not paid';
        $buy->dateadded = date("Y-m-d h:i:sa");
        
        $buy->save();        

        return redirect('/shop');
    }

    public function cart(Request $request) {
        // return $request->user()->id;
        $seed = Buy::where([['customer', $request->user()->id],['status', 'not paid']]);
        $items = $seed->get();
        $num_items = $seed->count();
        $total = DB::table('buys')
            ->select(DB::raw('sum(products.price*buys.qty) as total'))
            ->join('products','products.id', '=' ,'buys.product')
            ->where([['customer', $request->user()->id],['buys.status', 'not paid']])
            ->value('total');
        $cart = [
            'items' => $items,
            'count' => $num_items,
            'total' => $total
        ];
        return view('user.cart', compact('cart'));
    }

    public function editCartItem(Request $request, Buy $buy) {
        $this->validate($request, [
            'qty' => 'required|numeric|min:1|max:'.(string)Product::where('name',$buy->_product->name)->first()['qty'],
        ]);

        $product = Product::where('id',$buy->product)->first();
        $product->qty = $product->qty + $buy->qty;
        $product->qty = $product->qty - (int)$request->qty;
        $product->save();
        // return $product->id;

        $buy->qty = $request->qty;

        $buy->save();        

        return redirect('/cart');
    }

    public function deleteFromCart(Buy $buy) {
        $product = Product::where('id',$buy->product)->first();
        if ($buy->status == 'not paid') {
            $product->qty = $product->qty + $buy->qty;
            $product->save();
        }
        $buy->delete();
        return redirect('/cart');
    }

    public function pay(Request $request) {
        $user = $request->user();

        $cart = Buy::where([['customer', $request->user()->id],['status', 'not paid']])->get();

        foreach ($cart as $item) {
            $item->status = 'paid';
            $item->datepaid = date("Y-m-d h:i:sa");
            $item->save();
        }

        return redirect('/shop');
    }

    public function history(Request $request) {
        // return $request->user()->id;
        $seed = Buy::where([['customer', $request->user()->id],['status', 'paid']]);
        $items = $seed->get();
        $num_items = $seed->count();
        $total = DB::table('buys')
            ->select(DB::raw('sum(products.price*buys.qty) as total'))
            ->join('products','products.id', '=' ,'buys.product')
            ->where([['customer', $request->user()->id],['buys.status', 'paid']])
            ->value('total');
        $cart = [
            'items' => $items,
            'count' => $num_items,
            'total' => $total
        ];
        return view('user.history', compact('cart'));
    }
}
