<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchPhoto extends Model
{
    protected $fillable = [
        'branch_id',
        'photo',
        'uuid'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id', 'id');
    }
}
