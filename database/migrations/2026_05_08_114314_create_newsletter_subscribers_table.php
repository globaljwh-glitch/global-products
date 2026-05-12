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
        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();

            $table->string('email')->unique();

            $table->enum('status', [
                'active',
                'unsubscribed',
            ])->default('active');

            $table->string('token')->unique();

            $table->timestamp('subscribed_at')
                ->useCurrent();

            $table->timestamp('unsubscribed_at')
                ->nullable();

            $table->string('source')
                ->nullable(); // footer, popup, checkout, etc.

            $table->string('ip_address', 45)
                ->nullable();

            $table->text('user_agent')
                ->nullable();

            $table->timestamps();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
    }
};