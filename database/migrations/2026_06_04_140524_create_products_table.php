<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Ini otomatis menjadi primary key 'id'
            
            // Kolom Relasi (Foreign Key) sesuai data seeder kamu
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            
            $table->string('name');
            $table->text('description');
            $table->integer('price');
            $table->integer('discount_percentage')->default(0); // Sesuai data seeder kamu
            $table->string('thumbnail_url'); // Sesuai data seeder kamu
            
            $table->timestamps();

            // Opsional: Jika ingin mengunci relasi ke tabel brands & categories agar aman
            // $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};