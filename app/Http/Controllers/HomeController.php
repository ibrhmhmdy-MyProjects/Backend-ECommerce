<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $cart = session()->get('cart', []);
        $productCount = array_sum(array_column($cart, 'qty'));
        return view('users.index',\compact('products'));
    }
    public function SingleProduct($id){
        
        $product = Product::findOrFail($id);
        return \view('users.SingleProduct',['product'=>$product]);
    }

    
}
