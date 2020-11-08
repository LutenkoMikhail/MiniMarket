<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'category_id', 'name', 'description', 'image',
        'price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function order()
    {
        return $this->belongsToMany(\App\Order::class, 'order_products');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }

    /**
     * @param $value
     */
    public function setImageAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['image'] =
                str_replace('public/storage/', '', $value);
        }
    }
}
