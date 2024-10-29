<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
  public function Products(){
    return $this->belongsToMany(Product::class);
  }
  public function Orders(){
    return $this->belongsTo(Order::class);
  }
}
