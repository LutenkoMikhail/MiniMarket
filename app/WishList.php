<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\Pivot;

class WishList extends Pivot
{
    protected $fillable = [
        'id', 'product_id', 'user_id'];

    protected $table = 'wishlist';
}
