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
        return Storage::url($value);
    }

    /**
     * Format the harga_produk number to RP value
     * 
     * @param int $value
     * @return string
     */
    public function getHargaProdukAttribute($value)
    {
        return 'Rp ' . number_format($value, 0, '.', '.');
    }

    // Mass assignable columns
    protected $fillable = [
        'user_id',
        'foto_produk_path',
        'nama_produk',
        'harga_produk',
        'deskripsi_produk',
    ];
}
