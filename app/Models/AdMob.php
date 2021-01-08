<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdMob extends Model
{
    use HasFactory;

    /**
     * Set the mass-assignable columns
     * 
     * @var array $fillable
     */
    protected $fillable = [
        'user_id', 'application_id', 'ad_unit_id',
    ];
}
