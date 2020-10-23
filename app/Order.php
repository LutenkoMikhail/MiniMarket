<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Order extends Model
{
    protected $fillable = [
        'id', 'status_id','name', 'surname','phone','email'
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
            'product_id')->withTimestamps();
    }
    public function user()
    {
        return $this->hasOne(\App\User::class);
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
}
