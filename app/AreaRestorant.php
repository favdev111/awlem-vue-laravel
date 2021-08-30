<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaRestorant extends Model
{
    protected $fillable = [
        'area_id',
        'restorant_id',
    ];
}
