<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'reciever_id',
        'order_id',
        'notification_body'
    ];
}
