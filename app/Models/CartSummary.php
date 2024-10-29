<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartSummary extends Model
{
    public function Carts(){
        return $this->hasMany(Cart::class);
    }
}
