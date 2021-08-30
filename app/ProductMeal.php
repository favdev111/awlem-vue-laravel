<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMeal extends Model
{
    protected $fillable = [
        'product_id',
        'meal_id',
    ];
}
