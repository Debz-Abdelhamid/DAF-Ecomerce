<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flash_sell_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flash_sell_id')->constrained('flash_sells','id')->cascadeOnDelete();
            $table->foreignId('product_id')->unique()->constrained('products','id')->cascadeOnDelete();
            $table->boolean('show_at_home');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flash_sell_items');
    }
};
