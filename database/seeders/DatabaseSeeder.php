<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed User Contoh
        DB::table('users')->insert([
            'name' => 'Amelia',
            'email' => 'amelia@gmail.com',
            'password' => Hash::make('password123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Seed Brands
        $brands = [
            ['name' => 'Nike', 'logo_url' => 'nike_logo.png'],
            ['name' => 'Adidas', 'logo_url' => 'adidas_logo.png'],
            ['name' => 'Reebok', 'logo_url' => 'reebok_logo.png'],
            ['name' => 'Puma', 'logo_url' => 'puma_logo.png'],
        ];
        DB::table('brands')->insert($brands);

        // 3. Seed Categories
        $categories = [
            ['name' => 'All'],
            ['name' => 'Child'],
            ['name' => 'Man'],
            ['name' => 'Woman'],
            ['name' => 'Unisex']
        ];
        DB::table('categories')->insert($categories);

        // 4. Seed Products Contoh (Sesuai di UI FootFlare kalian)
        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1, // Nike
                'category_id' => 4, // Woman
                'name' => 'Swift Glide Sprinter Soles',
                'price' => 199,
                'description' => 'There are many variations of passages of Lorem Ipsum available.',
                'thumbnail_url' => 'swift_glide.png',
                'discount_percentage' => 30,
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'category_id' => 3, // Man
                'name' => 'Echo Vibe Urban Runners',
                'price' => 149,
                'description' => 'Comfortable urban active sneakers for daily running.',
                'thumbnail_url' => 'echo_vibe.png',
                'discount_percentage' => 0,
            ]
        ]);

        // 5. Seed Sizes untuk Produk
        DB::table('product_sizes')->insert([
            ['product_id' => 1, 'size' => '6.5'],
            ['product_id' => 1, 'size' => '7'],
            ['product_id' => 1, 'size' => '7.5'],
            ['product_id' => 2, 'size' => '8'],
            ['product_id' => 2, 'size' => '8.5'],
        ]);

        // 6. Seed FAQ Contoh
        DB::table('faqs')->insert([
            ['question' => 'What features does Footflare offer?', 'answer' => 'Footflare offers responsive design, customizable layouts, and comprehensive catalog pages.'],
            ['question' => 'Can I customize the template design?', 'answer' => 'Yes, it is highly customizable for developers.']
        ]);
    }
}