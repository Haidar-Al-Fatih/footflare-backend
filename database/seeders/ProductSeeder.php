<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'Nike SB Zoom Stefan Janoski',
            'brand' => 'Nike',
            'description' => 'Sepatu skateboard ikonik dengan kenyamanan maksimal dan desain klasik untuk penggunaan sehari-hari.',
            'price' => 1500000,
            'image_url' => 'assets/images/kaki-1.png', // Kita sesuaikan dengan asset lokal Flutter kamu dulu
            'category' => 'Unisex'
        ]);

        Product::create([
            'name' => 'Adidas Ultraboost 22',
            'brand' => 'Adidas',
            'description' => 'Sepatu lari performa tinggi dengan bantalan Boost yang responsif memberikan pengembalian energi terbaik.',
            'price' => 2300000,
            'image_url' => 'assets/images/kaki-1.png',
            'category' => 'Men'
        ]);

        Product::create([
            'name' => 'Puma Suede Classic',
            'brand' => 'Puma',
            'description' => 'Model Puma paling terkenal dan populer, sepatu olahraga berbahan suede ini mencerminkan gaya retro yang abadi.',
            'price' => 1200000,
            'image_url' => 'assets/images/kaki-1.png',
            'category' => 'Women'
        ]);
    }
}