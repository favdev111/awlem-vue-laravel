<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqAdmin extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'active',
    ];

    public function faqRating()
    {
        return $this->hasMany('App\FaqRating', 'faq_id', 'id');
    }
}
