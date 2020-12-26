<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FormOrder extends Model
{
    use HasFactory;

    // Get the storage's banner toko path
    public function getStorageBannerTokoPathAttribute()
    {
        return Storage::url($this->banner_toko_path);
    }

    // Get the storage's logo toko path
    public function getStorageLogoTokoPathAttribute()
    {
        return Storage::url($this->logo_toko_path);
    }

    // Get the nl2br version of alamat_perusahaan
    public function getNl2brAlamatPerusahaanAttribute()
    {
        return nl2br($this->alamat_perusahaan);
    }

    // Set the casts
    protected $casts = [
        'confirmed' => 'boolean',
        'requested' => 'boolean',
    ];

    // Set the mass-assignable columns
    protected $fillable = [
        'user_id',
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
        'pricing_id',
    ];

    // Append new property
    protected $appends = [
        'storage_banner_toko_path',
        'storage_logo_toko_path',
        'nl2br_alamat_perusahaan',
    ];
}
