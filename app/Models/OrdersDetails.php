<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetails extends Model
{
  
  protected $fillable = ['order_id','product_id','amount','price','total'];

  public function Products(){
    return $this->belongsToMany(Product::class);
  }
  public function Orders(){
    return $this->belongsTo(Order::class);
  }
}
