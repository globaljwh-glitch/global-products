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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('order_number')->unique();

            $table->decimal('subtotal', 10, 2)->default(0);

            $table->decimal('tax', 10, 2)->default(0);

            $table->decimal('shipping_charge', 10, 2)->default(0);

            $table->decimal('discount', 10, 2)->default(0);

            $table->decimal('grand_total', 10, 2)->default(0);

            $table->string('payment_method')->nullable();

            $table->string('payment_status')->default('pending');
            // pending, paid, failed

            $table->string('order_status')->default('pending');
            // pending, processing, shipped, delivered, cancelled

            $table->string('coupon_code')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
