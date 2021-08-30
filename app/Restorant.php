<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restorant extends Model
{
    protected $fillable =[
        'featured',
        'featured_meals',
        'name',
        'photo',
        'category_id',
        'user_id',
        'accepted',
        'priority',
    ];

    public function RestorantRating()
    {
        return $this->hasMany('App\RestorantRating', 'restorant_id', 'id');
    }
    public function meal()
    {
        return $this->hasMany('App\Meal', 'restorant_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'restorant_id', 'id');
    }
    public function productMeal()
    {
        return $this->product()->with('meals');
    }
    public function types()
    {
        return $this->belongsToMany(Type::class, 'type_restorants');
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'area_restorants');
    }

    public function branch()
    {
        return $this->hasMany('App\Branch', 'restorant_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
