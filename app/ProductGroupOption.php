<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroupOption extends Model
{
    protected $fillable = [
        'product_group_id',
        'title',
        'price',
    ];

    public function productGroup()
    {
        return $this->belongsTo('App\ProductGroup', 'product_group_id', 'id');
    }
}
