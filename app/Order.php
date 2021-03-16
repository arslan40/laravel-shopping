<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('Product', 'order_items', 'products_id', 'oders_id');
    }
}
