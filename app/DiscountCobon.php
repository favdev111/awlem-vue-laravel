<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCobon extends Model
{
    protected $fillable = [
        'code',
        'min_to_apply',
        'price',
        'dicount_percentage',
        'usage_limit',
        'active',
        'end_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users', 'cobon_id', 'user_id')->withTimestamps();
    }
}
