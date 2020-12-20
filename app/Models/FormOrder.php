<?php

namespace App\Models;

use App\Http\Controllers\LayoutPickerController;
use App\Models\Product;
use App\Models\LayoutPicker;
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

    // Show the user's products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Show the user's layout picker
    public function layout_picker()
    {
        return $this->hasOne(LayoutPicker::class);
    }

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

    // Append new property
    protected $appends = [
        'storage_banner_toko_path',
        'storage_logo_toko_path',
    ];
}
