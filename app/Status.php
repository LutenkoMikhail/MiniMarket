<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'id',  'name'
    ];

    public function order()
    {
        return $this->hasMany(\App\Order::class);
    }
}
