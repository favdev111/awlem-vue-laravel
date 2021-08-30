<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBranch extends Model
{
    protected $fillable = [
        'branch_id',
        'product_id',
        'available',
    ];
}
