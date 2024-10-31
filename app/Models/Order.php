<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'user_id','subtotal','shipping','total'
  ];
  public function Users(){
    return $this->belongsTo(User::class);
  }
  public function OrderDetails(){
    return $this->hasMany(OrderDetails::class);
  }
}
