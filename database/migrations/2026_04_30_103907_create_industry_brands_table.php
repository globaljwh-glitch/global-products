<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('industry_brands', function (Blueprint $table) {
            $table->id();

            $table->foreignId('industry_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('brand_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['industry_id', 'brand_id']); // prevent duplicate mappings
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industry_brands');
    }
};