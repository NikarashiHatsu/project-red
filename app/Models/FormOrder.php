<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormOrder extends Model
{
    use HasFactory;

    // Set the casts
    protected $casts = [
        'confirmed' => 'boolean',
        'requested' => 'boolean',
    ];

    // Set the mass-assignable columns
    protected $fillable = [
        'nama_pemilik',
        'nama_toko',
        'logo_toko_path',
        'banner_toko_path',
        'nama_aplikasi',
        'deskripsi_aplikasi',
        'url_website_perusahaan',
        'alamat_perusahaan',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'youtube_link',
        'whatsapp_number',
        'confirmed',
        'requested',
    ];
}
