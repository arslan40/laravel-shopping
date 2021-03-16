<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model

{

    public function orders()
    {
        return $this->belongsToMany('Order', 'order_items', 'products_id', 'oders_id');
    }
}
