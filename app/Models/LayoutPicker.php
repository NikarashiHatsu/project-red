<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutPicker extends Model
{
    use HasFactory;

    // Mass assignable
    protected $fillable = [
        'layout_id_used', 'color_scheme_used'
    ];
}
