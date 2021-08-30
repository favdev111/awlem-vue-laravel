<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'photo',
    ];

    public function restorants()
    {
        return $this->belongsToMany(Restorant::class, 'type_restorants');
    }
}
