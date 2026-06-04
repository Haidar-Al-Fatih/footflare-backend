<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->integer('total_price');
            $table->string('payment_method');
            $table->string('status')->default('Placed'); // Placed, Processed, Ready to Ship, Completed
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('orders'); }
};