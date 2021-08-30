<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_offer',
        'offer_discount',
        'quantity',
        'price',
        'serialized_optios',
        'custom_requires'
    ];

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function Product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
