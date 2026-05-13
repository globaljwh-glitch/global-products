<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('image');

            $table->string('thumbnail')->nullable();

            $table->string('mobile_image')->nullable();

            // Where banner appears
            $table->string('page');

            // hero / sidebar / popup
            $table->string('position')->nullable();

            $table->enum('type', [
                'hero',
                'sidebar',
                'popup',
                'footer',
                'promo',
                'slider'
            ])->default('hero');

            $table->string('button_text')->nullable();

            $table->string('button_link')->nullable();

            $table->integer('order')
                ->default(0);

            $table->boolean('is_featured')
                ->default(false);

            $table->enum('status', [
                'active',
                'inactive'
            ])->default('active');

            $table->timestamp('starts_at')
                ->nullable();

            $table->timestamp('ends_at')
                ->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};