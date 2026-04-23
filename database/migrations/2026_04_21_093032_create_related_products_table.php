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
        Schema::create('related_products', function (Blueprint $table) {
            $table->id();

            // Main product
            $table->foreignId('product_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Related product
            $table->foreignId('related_product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            // Optional flags
            $table->boolean('is_featured')->default(false);

            // For ordering in UI
            $table->integer('display_order')->default(0);

            $table->timestamps();

            // Prevent duplicate relations
            $table->unique(['product_id', 'related_product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_products');
    }
};