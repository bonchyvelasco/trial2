<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminProductController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }
    public function create() {
        return view('admin.createProduct');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|unique:products,name|max:50',
            'price' => 'required|numeric|min:0',
            'qty' => 'required|numeric|min:1',
            'description' => 'required',
        ]);

        $product = new Product;
        $product->owner = $request->user()->id;
        $product->name = $request->name;
        $product->price = (float)$request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->status = 'In Stock';
        $product->dateadded = date("Y-m-d h:i:sa");
        
        $product->save();        

        return redirect('/manage/products'); 
    }

    public function edit(Product $product) {
        return view('admin.editProduct', compact('product'));
    }

    public function update(Request $request, Product $product) {
        
        $this->validate($request, [
            'name' => 'required|unique:products,name,'.$product->id.'|max:50',
            'price' => 'required|numeric|min:0',
            'status' => 'required|max:50',
            'qty' => 'required|numeric|min:'.$product->qty,
            'description' => 'required',
        ]);

        // $product->owner = $request->user()->id;
        $product->name = $request->name;
        $product->price = (float)$request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->status = $request->status;
        // $product->dateAdded = time();
        
        $product->save();        

        return redirect('/manage/products');   
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect('/manage/products');
    }
}
