<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Spatie\Permission\Traits\HasRoles;

use Spatie\Permission\Models\Role;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'accepted',
        'websit_link',
        'email',
        'password',
        'npassword',
        'hasAdminAccess',
        'phone',
        'address',
        'activity_id',
        'photo',
        'token',
        'device_token',
        'active',
        'virification_code',
        'parent_restorant',
        'lang',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
    public function restorant()
    {
        return $this->hasMany('App\Restorant', 'user_id', 'id');
    }

    public function branch()
    {
        return $this->hasMany('App\Branch', 'user_id', 'id');
    }

    public function order()
    {
        return $this->hasMany('App\Order', 'user_id', 'id');
    }

    public function complaint()
    {
        return $this->hasMany('App\Complaint', 'user_id', 'id');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating', 'user_id', 'id');
    }

    public function restorantRating()
    {
        return $this->hasMany('App\RestorantRating', 'user_id', 'id');
    }

    public function orderRating()
    {
        return $this->hasMany('App\OrderRating', 'user_id', 'id');
    }

    public function cobons()
    {
        return $this->belongsToMany(DiscountCobon::class, 'cobon_users', 'user_id', 'cobon_id')->withTimestamps();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
