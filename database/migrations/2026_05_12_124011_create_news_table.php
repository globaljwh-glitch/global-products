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
        Schema::create('news', function (Blueprint $table) {

            $table->id();

            // Optional relation to users table
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();

            $table->longText('description');

            $table->string('image')->nullable();

            $table->string('thumbnail')->nullable();

            $table->boolean('is_featured')
                ->default(false);

            $table->enum('status', [
                'draft',
                'published',
                'inactive'
            ])->default('draft');

            $table->integer('views')
                ->default(0);

            $table->timestamp('published_at')
                ->nullable();

            // SEO
            $table->string('meta_title')
                ->nullable();

            $table->text('meta_description')
                ->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};