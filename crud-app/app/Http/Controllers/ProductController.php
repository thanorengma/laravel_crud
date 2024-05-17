<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product; 

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',['products' => $products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(Request $request){
        #validate data------------------------
        $data = $request->validate([
            'name' => 'required',
            'qyt' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required'

        ]);
        #save data into database-------------------
        $newProduct = Product::create($data);
        return redirect(route('product.index'));

        #<-store data, dump 
        #dd($request->name);
    }
    #edit ------------------
    public function edit(Product $product){
        return view('products.edit',['product' => $product]);
        #Dump 
        #dd($product);

    }
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qyt' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'required'

        ]);
        $product->update($data);

        return redirect(route('product.index'))->with('success','product updated successfully');
    }
    public function destroy(product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success','product deleted successfully');
    }
}
