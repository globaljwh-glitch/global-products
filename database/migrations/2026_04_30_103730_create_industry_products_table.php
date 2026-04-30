<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industry_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('industry_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('product_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['industry_id', 'product_id']); // prevent duplicate entries
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_products');
    }
};