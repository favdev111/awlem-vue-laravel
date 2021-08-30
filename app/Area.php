<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'region_id',
        'name',
    ];

    public function region()
    {
        return $this->belongsTo('App\Region', 'region_id', 'id');
    }

    public function restorants()
    {
        return $this->belongsToMany(Restorant::class, 'area_restorants');
    }
}
