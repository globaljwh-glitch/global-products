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
        Schema::create('offers', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique()->nullable();

            $table->text('description')->nullable();

            $table->string('offer_code')->nullable();

            $table->enum('discount_type', ['percentage', 'fixed'])->nullable();

            $table->decimal('discount_value', 10, 2)->nullable();

            $table->dateTime('offer_start')->nullable();

            $table->dateTime('offer_end')->nullable();

            $table->string('image')->nullable();

            $table->string('button_text')->nullable();

            $table->string('button_url')->nullable();

            $table->boolean('is_featured')->default(false);

            $table->boolean('status')->default(true);

            $table->integer('display_order')->default(0);

            $table->timestamps();

            $table->softDeletes();

            // Indexes
            $table->index('status');
            $table->index('offer_start');
            $table->index('offer_end');
            $table->index('display_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};