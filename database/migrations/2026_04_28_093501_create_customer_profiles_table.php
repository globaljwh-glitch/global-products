<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_profile_details', function (Blueprint $table) {

            $table->id();

          
            $table->foreignId('customer_id')
                ->unique()
                ->constrained('users')
                ->cascadeOnDelete();

            
            $table->string('profile_image')->nullable();
            $table->string('phone')->nullable();
            $table->string('alternate_phone')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();

           
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('landmark')->nullable();
            $table->string('pincode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->default('India')->nullable();
            $table->string('address_type')->nullable();

           
            $table->string('company_name')->nullable();
            $table->string('gst_number')->nullable();

            
            $table->boolean('newsletter')->default(1);
            $table->boolean('sms_updates')->default(1);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profile_details');
    }
};