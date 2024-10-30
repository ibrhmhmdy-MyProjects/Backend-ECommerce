<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::findOrFail($id);
        // Add Product to Session[cart]
        $cart = session()->get("cart",[]);
        if (!is_array($cart)) {
            $cart = [];
        }
        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            $cart[$id]['total'] =  $cart[$id]['qty'] * $product->price;
        }else{
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'total' => $product->price,
                'image' => $product->image,
            ];
        }
        
        
        session()->put('cart',$cart);
        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى السلة بنجاح!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart');
        // \dd($cart);
        return \view('users.ShoppingCart',compact('cart'));
    }
    public function emptyCart(){
        session()->forget('cart');
        return redirect()->back()->with('success','Your Cart is Empty');
    }

    public function updateQuantity($id, $action)
    {
        $cart = session()->get('cart', []);

        // التحقق من وجود المنتج في السلة
        if (isset($cart[$id])) {
            if ($action === 'increase') {
                $cart[$id]['qty']++;
            } elseif ($action === 'decrease' && $cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
            }
            
            // تحديث السلة في session
            session()->put('cart', $cart);
        }
        $cart = session()->get('cart',[]);
        $subtotal = array_sum(array_column($cart, 'total'));
        return redirect()->back()->with('subtotal',$subtotal);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
