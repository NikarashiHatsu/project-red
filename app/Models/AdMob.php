<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AdMob extends Model
{
    use HasFactory;

    /**
     * Set new AppId attribute
     * 
     * @return DecryptException|string
     */
    public function getAppIdAttribute()
    {
        if(!$this->application_id) {
            return ''; 
        }
        
        try {
            $decrypted = Crypt::decryptString($this->application_id);
        } catch (DecryptException $e) {
            return $e;
        }

        if(Auth::user()->role == 'admin') {
            return $decrypted;
        }

        $arr = explode('~', $decrypted);
        $hidden = str_repeat("*", strlen($arr[0]) + 1);

        return $hidden . $arr[1];
    }

    /**
     * Set AdId attribute
     * 
     * @return DecryptException|string
     */
    public function getAdIdAttribute()
    {
        if(!$this->ad_unit_id) {
            return ''; 
        }

        try {
            $decrypted = Crypt::decryptString($this->ad_unit_id);
        } catch (DecryptException $e) {
            return $e;
        }

        if(Auth::user()->role == 'admin') {
            return $decrypted;
        }

        $arr = explode('/', $decrypted);
        $hidden = str_repeat("*", strlen($arr[0]) + 1);

        return $hidden . $arr[1];
    }

    /**
     * Set the mass-assignable columns
     * 
     * @var array $fillable
     */
    protected $fillable = [
        'user_id', 'application_id', 'ad_unit_id',
    ];

    /**
     * Hide the encrypted columns
     * 
     * @var array $hidden
     */
    protected $hidden = [
        'application_id', 'ad_unit_id'
    ];

    /**
     * Append some additional columns
     * 
     * @var array $appends
     */
    protected $appends = [
        'app_id',
        'ad_id',
    ];
}
