<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'id', 'order_id', 'product_id', 'product_count', 'product_price'
    ];
    protected $pivotColumns = ['order_id', 'product_id', 'product_count', 'product_price'];
}
