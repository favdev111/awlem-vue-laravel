<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeRestorant extends Model
{
    protected $fillable = [
        'type_id',
        'restorant_id',
    ];
}
