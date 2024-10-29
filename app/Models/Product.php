<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','desc','quantity','price','image'
    ];

    public function OrderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

}
