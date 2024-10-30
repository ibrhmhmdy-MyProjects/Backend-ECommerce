<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('users.index',\compact('products'));
    }

    public function ProductDetails($id){
        $product = Product::findOrFails($id);
        return \view('users.products.details',\compact('product'));
    }

    public function addToCart(){
        return \view('users.orders.carts');
    }
}
