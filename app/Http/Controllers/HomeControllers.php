<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeControllers extends Controller
{
    public function index(){
        $products = Product::all();
        return view('users.index',\compact('products'));
    }
}
