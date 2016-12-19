<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Buy;    

class AdminBuyController extends Controller
{
    public function __create() {
        $this->middleware('admin');
    } 
    public function create() {
        return view('admin.createBuy');
    }

    public function store(Request $request) {  
        $this->validate($request, [
            'customer' => 'required|exists:users,username|max:50,',
            'product' => 'required|exists:products,name|max:50',
            'qty' => 'required|numeric|min:0|max:'.(string)Product::where('name',$request->product)->first()['qty'],
        ]);

        $buy = new Buy;

        $customer = User::where('username',$request->customer)->first();
        if ($customer->is_admin) {
            abort('403','An admin account cannot buy products.');
        }
        $buy->customer = $customer->id;
        

        $product = Product::where('name',$request->product)->first();
        $buy->product = $product->id;
        $product->qty = $product->qty - (int)$request->qty;
        $product->save();
        $buy->qty = $request->qty;

        $buy->status = 'not paid';
        $buy->dateadded = date("Y-m-d h:i:sa");
        
        $buy->save();        

        return redirect('/manage/buys'); 
    }

    public function edit(Buy $buy) {
        return view('admin.editBuy', compact('buy'));
    }

    public function update(Request $request, Buy $buy) {
       $this->validate($request, [
            'customer' => 'required|exists:users,username|max:50,',
            'product' => 'required|exists:products,name|max:50',
            'qty' => 'required|numeric|min:0|max:'.(string)(Product::where('name',$request->product)->first()['qty']+$buy->qty),
            'status' => 'required',
        ]);

        $customer = User::where('username',$request->customer)->first();
        if ($customer->is_admin) {
            abort('403','An admin account cannot buy products.');
        }
        $buy->customer = $customer->id;
        

        $product = Product::where('name',$request->product)->first();
        $buy->product = $product->id;
        $product->qty = $product->qty + $buy->qty;
        $product->qty = $product->qty - (int)$request->qty;
        $product->save();

        $buy->qty = $request->qty;

        $buy->status = $request->status;
        
        if ($request->status == 'paid') {
            $buy->datepaid = date("Y-m-d h:i:sa");
        }

        $buy->save();        

        return redirect('/manage/buys');  
    }

    public function delete(Buy $buy) {
        $product = Product::where('name',$buy->product)->first();
        if ($buy->status == 'not paid') {
            $product->qty = $product->qty + $buy->qty;
            $product->save();
        }
        $buy->delete();
        return redirect('/manage/buys');
    }   
}
