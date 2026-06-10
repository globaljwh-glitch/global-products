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
        Schema::create('safety_service_requests', function (Blueprint $table) {

            $table->id();

            $table->string('company_name');

            $table->string('business_type');

            $table->string('street_address');

            $table->string('city');

            $table->string('state');

            $table->string('zip_code');

            $table->string('name');

            $table->string('title');

            $table->string('phone');

            $table->string('email');

            $table->text('service_required');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_service_requests');
    }
};
