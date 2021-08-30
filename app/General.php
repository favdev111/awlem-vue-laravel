<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    protected $fillable = [
        'main_heading_ar',
        'main_paragraph_ar',
        'main_heading_en',
        'main_paragraph_en',
        'main_vedio'
    ];
}
