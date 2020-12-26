<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the URL version of the photo
     * 
     * @param string $value
     * @return string
     */
    public function getFotoProdukPathAttribute($value)
    {
        // return Storage::url($value);
        return $value;
    }

    /**
     * Get the Storage version of the photo
     * 
     * @return string
     */
    public function getStorageFotoProdukPathAttribute()
    {
        return Storage::url($this->foto_produk_path);
    }

    /**
     * Format the harga_produk number to RP value
     * 
     * @return string
     */
    public function getFormattedHargaProdukAttribute()
    {
        return 'Rp ' . number_format($this->harga_produk, 0, '.', '.');
    }

    /**
     * Format the deskripsi_produk using nl2br function
     * 
     * @return string
     */
    public function getNl2brDeskripsiAttribute()
    {
        return nl2br($this->deskripsi_produk);
    }

    // Mass assignable columns
    protected $fillable = [
        'user_id',
        'foto_produk_path',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
    ];

    // Add new column to the model
    protected $appends = [
        'storage_foto_produk_path',
        'formatted_harga_produk',
        'nl2br_deskripsi',
    ];
}
