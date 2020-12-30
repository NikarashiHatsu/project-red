<?php

namespace App\Models;

use App\Models\FormOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    // Retrieve the form order
    public function form_order()
    {
        return $this->hasOne(FormOrder::class, 'id', 'form_order_id');
    }
    
    // Set the casts
    protected $casts = [
        'is_apk_created' => 'boolean',
        'is_published_on_google_play' => 'boolean',
    ];

    // Mass assignable property
    protected $fillable = [
        'form_order_id',
        'is_apk_created',
        'is_published_on_google_play',
        'google_play_url',
    ];
}
