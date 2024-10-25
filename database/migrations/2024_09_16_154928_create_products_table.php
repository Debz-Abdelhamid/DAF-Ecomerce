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
        Schema::create('products', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('user_id')->constrained('users','id')->restrictOnDelete();
            $table->foreignId('brand_id')->constrained('brands', 'id')->restrictOnDelete();
            $table->foreignId('category_id')->constrained('categories', 'id')->restrictOnDelete(); 
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories', 'id')->nullOnDelete(); 
            $table->foreignId('childcategory_id')->nullable()->constrained('child_categories', 'id')->nullOnDelete(); 
            $table->string('name');
            $table->string('slug');
            $table->text('thumb_image');
            $table->integer('qty');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('video_link')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('price_12');
            $table->bigInteger('price_24');
            $table->bigInteger('price_36');
            $table->bigInteger('price_48');   
            $table->bigInteger('price_60');  
            $table->integer('offer_price')->nullable();
            $table->date('offer_start_date')->nullable();
            $table->date('offer_end_date')->nullable();
            $table->enum('type',['تقسيط'])->nullable();
            $table->integer('is_approved')->default(0);
            $table->boolean('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
