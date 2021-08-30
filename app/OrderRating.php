<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderRating extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'rate',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
