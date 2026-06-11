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
        Schema::create('product_variants', function (Blueprint $table) {

            $table->id();

            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // Display name
            $table->string('variant_name');

            // Optional SKU per variant
            $table->string('sku')->nullable();

            // Minimum order quantity
            $table->integer('minimum_quantity')
                ->default(1);

            // Available stock
            $table->integer('stock')
                ->default(0);

            // Selling price
            $table->decimal('price', 12, 2);

            // Optional compare price
            $table->decimal('compare_price', 12, 2)
                ->nullable();

            // Weight for shipping
            $table->decimal('weight', 10, 2)
                ->nullable();

            // Sort order
            $table->integer('display_order')
                ->default(0);

            // Active / Inactive
            $table->boolean('status')
                ->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
