<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Order extends Model
{
    protected $fillable = [
        'id', 'status_id', 'name', 'surname', 'phone', 'email'
    ];

    public function status()
    {
        return $this->hasOne(\App\Status::class);
    }

    public function product()
    {
        return $this->belongsToMany(\App\Product::class,
            'order_products',
            'order_id',
            'product_id')
            ->withPivot('order_id', 'product_id', 'product_count', 'product_price')
            ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * @return mixed
     */
    public function InProcess()
    {
        $InProcess = \App\Status::where(
            'name',
            '=',
            Config::get('constants.db.order_statuses')[0]
        )->first();
        return $InProcess->id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        $statusOrder = \App\Status::where('id', $this->status_id)->get(['name']);
        return $statusOrder[0]['name'];
    }

    public function totalPrice()
    {
        $result = 0;
        foreach ($this->product as $product) {
            $result +=($product->pivot->product_price * $product->pivot->product_count);
        }
        return $result;
    }
}
