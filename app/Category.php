<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'photo',
    ];

    public function restorant()
    {
        return $this->hasMany('App\Restorant', 'category_id', 'id');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'category_id', 'id');
    }
}
