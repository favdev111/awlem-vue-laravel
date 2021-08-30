<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = [
        'name'
    ];

    public function area()
    {
        return $this->hasMany('App\Area', 'region_id', 'id');
    }
}
