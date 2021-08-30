<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestorantRating extends Model
{
    protected $fillable = [
        'user_id',
        'restorant_id',
        'rate',
        'review'
    ];

    public function restorant()
    {
        return $this->belongsTo('App\Restorant', 'restorant_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
