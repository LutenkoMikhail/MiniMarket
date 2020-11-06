<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'category_id', 'name', 'description', 'image',
        'price'
    ];
    public function order()
    {
        return $this->belongsToMany(\App\Order::class,'order_products');
    }
    public function gallery()
    {
        return $this->belongsToMany(\App\ProductGallery::class,
            'product_galleries',
            'product_id',
            'image_path')->withTimestamps();
    }
    public function category()
    {
        return $this->belongsTo(\App\Category::class);
    }
    public function setImageAttribute($value)
    {
        if (is_string($value)) {
            $this->attributes['image'] =
                str_replace('public/storage/', '', $value);
        }
    }
}
