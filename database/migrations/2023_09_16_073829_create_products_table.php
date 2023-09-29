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
            $table->string('product_name');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->integer('price');
            $table->string('category_name');
            $table->string('category_id');
            $table->string('subcategory_name');
            $table->bigInteger('subcategory_id');
            $table->bigInteger('total_product');
            $table->string('product_image');
            $table->string('slug');
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
