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
        Schema::create('delivery_zips', function (Blueprint $table) {
            $table->id();

            $table->string('zip_code')->unique();

            $table->integer('delivery_days')->default(1);

            $table->boolean('same_day_shipping')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_zips');
    }
};
