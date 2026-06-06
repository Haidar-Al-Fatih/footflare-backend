<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $col) {
            $col->id();
            $col->string('name');
            $col->string('brand'); // Nike, Adidas, Puma, Vans, dll
            $col->text('description');
            $col->integer('price');
            $col->string('image_url');
            $col->string('category'); // Men, Women, Unisex, Child
            $col->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};