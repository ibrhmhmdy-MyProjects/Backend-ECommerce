<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrdersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    
    public function MakeOrder(){
        $user_id = Auth::user()->id;
        $cart = session()->get('cart',[]);
        $subtotal = array_sum(array_column($cart, 'totalPrice'));
        $order = Order::create([
            'user_id' => $user_id,
            'subtotal' => $subtotal,
            'shipping' => 20,
            'total' => $subtotal + 20,
        ]);
        foreach ($cart as $id => $product) {
            OrdersDetails::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'amount' => $product['qty'],
                'price' => $product['price'],
                'total' => $product['totalPrice'],
            ]);
        }
        session()->forget('cart');
        return \redirect()->route('Home')->with('success','تم إرسال طلبك بنجاح وجارى تجهيزه.');      
    }
}
