<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'address_ara',
        'address_eng',
        'email',
        'rasheed_site',
        'rasheed_telephon',
        'phone',
        'fax',
        'facebook',
        'twitter',
        'instgram',
        'whatsapp',
        'appstore_link',
        'google_play_link',
        'main_vedio_link',
        'products',
        'location',
        'title',
        'description',
        'email_contact_us_1',
        'email_contact_us_2',
        'phone_contact_us_1',
        'phone_contact_us_2',
        'olum_decription',
        'olum_card_1_photo',
        'olum_card_1_title',
        'olum_card_1_description',
        'olum_card_2_photo',
        'olum_card_2_title',
        'olum_card_2_description',
        'olum_card_3_photo',
        'olum_card_3_title',
        'olum_card_3_description',
        'olum_price',
        'olum_percentage',
        'vat_price',
        'vat_percentage',
        'tax_number',
    ];
}
