<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $fillable = [
        'product_id',
        'required_options',
        'name',
        'choices_numbers',
        'allow_incriments',
        'serialized_options'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function productGroupOption()
    {
        return $this->hasMany('App\ProductGroupOption', 'product_group_id', 'id');
    }
}
