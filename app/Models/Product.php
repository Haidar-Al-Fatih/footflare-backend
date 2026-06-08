<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'brand_id', 
        'category_id', 
        'price', 
        'discount_percentage', 
        'thumbnail_url', 
        'description'
    ];

    /**
     * Relasi ke tabel Brand (Satu produk memiliki satu Brand)
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Relasi ke tabel Category (Satu produk memiliki satu Category)
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}