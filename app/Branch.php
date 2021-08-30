<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'user_id',
        'area_id',
        'restorant_id',
        'busy',
        'name',
        'location_name',
        'location_lat',
        'location_lon',
        'open_from',
        'open_to',
        'open_dayes',
        'description',
        'eat_in_branch',
        'delever_to_car'
    ];



    public function order()
    {
        return $this->hasMany('App\Order', 'branch_id', 'id');
    }

    public function branchPhoto()
    {
        return $this->hasMany('App\BranchPhoto', 'branch_id', 'id');
    }

    public function Products()
    {
        return $this->belongsToMany(Product::class, 'product_branches')->withPivot('available')->withTimestamps();
    }

    public function Offers()
    {
        return $this->belongsToMany(Product::class, 'branch_offers')->withPivot('offer_end_date', 'active', 'percent', 'amount', 'user_id')->withTimestamps();
    }

    public function productMeal()
    {
        return $this->Products()->with('meals');
    }

    public function restorant()
    {
        return $this->belongsTo('App\Restorant', 'restorant_id', 'id');
    }

    public function restorantUserandMeals()
    {
        return $this->restorant()->with('user', 'meal');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id', 'id');
    }
}
