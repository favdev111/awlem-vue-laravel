<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'serial_num',
        'user_id',
        'branch_id',
        'local',
        'travel_type',
        'families_Individuals',
        'Individuals_num',
        'arrival_time',
        'car_type',
        'car_color',
        'car_palet',
        'discount',
        'copon_id',
        'total_price',
        'tax_price',
        'order_vat',
        'app_vat',
        'pay_type',
        'ready_time',
        'order_date',
        'status',
        'is_rated',
    ];

    public function orderRating()
    {
        return $this->hasMany('App\OrderRating', 'order_id', 'id');
    }

    public function orderProduct()
    {
        return $this->hasMany('App\OrderProduct', 'order_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function DiscountCobon()
    {
        return $this->belongsTo('App\DiscountCobon', 'copon_id', 'id');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }
}
