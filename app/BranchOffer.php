<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchOffer extends Model
{
    protected $fillable = [
        'product_id',
        'branch_id',
        'offer_end_date',
        'active',
        'percent',
        'amount',
        'user_id',
    ];
}
