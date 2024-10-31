<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index(){
        $cart = session()->get('cart',[]);
        $subtotal = array_sum(array_column($cart, 'totalPrice'));
        return \view('users.ShoppingCart',compact('cart','subtotal'));
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = session()->get("cart",[]);
        if (!is_array($cart)) {
            $cart = [];
        }
        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            $cart[$id]['totalPrice'] =  $cart[$id]['qty'] * $product->price;
        }else{
            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price,
                'totalPrice' => $product->price,
                'image' => $product->image,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success', 'تمت إضافة المنتج إلى السلة بنجاح!');
    }

    public function updateQuantity($id, $action){
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            if ($action === 'increase') {
                $cart[$id]['qty']++;
                $cart[$id]['totalPrice'] =  $cart[$id]['qty'] * $cart[$id]['price'];
            } elseif ($action === 'decrease' && $cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
                $cart[$id]['totalPrice'] =  $cart[$id]['qty'] * $cart[$id]['price'];
            }
            // تحديث السلة في session
            session()->put('cart', $cart);
            $subtotal = array_sum(array_column($cart, 'totalPrice'));
            // إعادة التوجيه إلى صفحة السلة بعد التحديث
            return redirect()->back()->with('subtotal',$subtotal);
        }

        return redirect()->back()->with('error', 'حدث خطأ أثناء تحديث السلة.');
    }

    public function emptyCart(){
        session()->forget('cart');
        return redirect()->back()->with('success','Your Cart is Empty');
    }

    

    public function RemoveItem($id){
        $cart = session()->get('cart');
        if($cart[$id]){
            unset($cart[$id]);
        }
    }
}
