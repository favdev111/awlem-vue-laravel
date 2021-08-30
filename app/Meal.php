<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = [
        'name',
        'restorant_id'
    ];

    public function restorant()
    {
        return $this->belongsTo('App\Branch', 'restorant_id', 'id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_meals');
    }
    

    public function branchProduct()
    {
        return $this->product()->with('branches');
    }
}
