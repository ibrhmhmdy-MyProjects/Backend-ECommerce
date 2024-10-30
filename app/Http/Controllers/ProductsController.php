<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return \view('admin.Products.index',compact('products'));
    }
    public function SingleProduct($id){
        $product = Product::findOrFail($id);
        return \view('users.SingleProduct',['product'=>$product]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|min:10|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);    

        if($request->hasFile('image')){
            $product['image'] = Storage::putFile('upload/products',$request->image);
        }
        Product::create($product);
        // session()->flash('success','Product Created Successfully');
        return \redirect('admin/products/index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return \view('admin.products.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return \view('admin.products.edit',\compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'desc' => 'required|string|min:10|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);    
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $data['image'] = Storage::putFile('upload/products',$request->image);
        }

        $product->update($data);
        return \redirect('admin/products/index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return \redirect('admin/products/index');
    }
}
