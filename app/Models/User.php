<?php

namespace App\Models;

use App\Models\FormOrder;
use App\Models\Product;
use App\Models\LayoutPicker;
use App\Models\AdMob;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * Get the FormOrder
     */
    public function form_order()
    {
        return $this->hasOne(FormOrder::class);
    }

    /**
     * Get the LayoutPicker
     */
    public function layout_picker()
    {
        return $this->hasOne(LayoutPicker::class);
    }

    /**
     * Get the Products
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the AdMob value
     */
    public function admob()
    {
        return $this->hasOne(AdMob::class);
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
