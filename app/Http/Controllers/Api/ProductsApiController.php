<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getProduct = Product::all();
        $products = ProductResource::collection($getProduct);
        return $products;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'desc' => 'required|string|min:10|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        if($validate->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ],300);
        }

        $image = Storage::putFile('/upload/products',$request->image);

        $product = Product::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $image,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product Created Successfully',
            'data' => $product,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if($product){
            return new ProductResource($product);
        }
        return response()->json([
            'status' => 'Empty',
            'data' => 'Data Not Found'
        ],404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'desc' => 'required|string|min:10|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
                
        $product = Product::find($id);
        if($product){
            if($request->hasFile('image')){
                Storage::delete($product->image);
                $image = Storage::putFile('/upload/products',$request->image);
            }
            $product->update([
                'name' => $request->name,
                'desc' => $request->desc,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'image' => $image,
            ]);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Product Updated Successfully',
                'data' => $product,
            ],200);
        }else{
            return response()->json([
                'status' => 'Empty',
                'message' => 'Product Not Found',
            ],404);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'Product Deleted Successfully',
        ]);
    }
}
