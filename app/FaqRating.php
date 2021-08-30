<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FaqRating extends Model
{
    protected $fillable = [
        'faq_id',
        'helpfull'
    ];

    public function faqAdmin()
    {
        return $this->belongsTo('App\FaqAdmin', 'faq_id', 'id');
    }
}
