<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function Users(){
    return $this->belongsTo(User::class);
  }
  public function OrderDetails(){
    return $this->hasMany(OrderDetails::class);
  }
}
