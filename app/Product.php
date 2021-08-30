<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'photo',
        'restorant_id',
        'name',
        'description',
        'price',
        'ready_in',
        'ready_to',
        'max_additional_options',
    ];

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct', 'product_id', 'id');
    }

    public function productGroup()
    {
        return $this->hasMany('App\ProductGroup', 'product_id', 'id');
    }

    public function groupOptions()
    {
        return $this->productGroup()->with('productGroupOption');
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'product_meals');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'product_branches')->withPivot('available')->withTimestamps();
    }

    public function Offers()
    {
        return $this->belongsToMany(Branch::class, 'branch_offers')->withPivot('offer_end_date', 'active', 'percent', 'amount', 'user_id')->withTimestamps();
    }

    public function restorant()
    {
        return $this->belongsTo('App\Restorant', 'restorant_id', 'id');
    }
}
