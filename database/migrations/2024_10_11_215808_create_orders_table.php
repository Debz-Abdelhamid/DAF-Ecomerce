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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('inovice_id');
            $table->foreignId('user_id')->constrained('users','id')->cascadeOnDelete();
            $table->bigInteger('subtotal');
            $table->bigInteger('amount');
            $table->bigInteger('total_variants');
            $table->string('user_amount');
            $table->integer('duree');
            $table->string('total_facility');
            $table->string('currency_name');
            $table->string('currency_icon');
            $table->integer('product_qty');
            $table->text('order_address');
            $table->enum('order_status',['pending','deliverd','destribution','canceled'])->default('pending');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
