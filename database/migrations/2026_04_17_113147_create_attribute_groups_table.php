<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attribute_groups', function (Blueprint $table) {
            $table->id();

            // Group Name (Specifications, Product Details, etc.)
            $table->string('name');

            // URL friendly slug (optional but useful later)
            $table->string('slug')->unique();

            // Sorting in UI
            $table->integer('display_order')->default(0);

            // Optional toggle
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attribute_groups');
    }
};