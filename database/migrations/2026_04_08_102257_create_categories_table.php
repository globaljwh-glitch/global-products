<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('name');
            $table->string('slug')->unique();

            // Hierarchy
            $table->foreignId('parent_id')
                  ->nullable()
                  ->constrained('categories')
                  ->nullOnDelete();

            // Content
            $table->text('description')->nullable();

            // Media
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('icon')->nullable(); // small icon for UI

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Control
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('display_order')->default(0);

            $table->timestamps();

            // Indexes
            $table->index('parent_id');
            $table->index('display_order');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};