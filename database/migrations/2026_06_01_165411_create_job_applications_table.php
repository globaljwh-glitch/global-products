<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('career_id')
                ->constrained('careers')
                ->cascadeOnDelete();

            $table->string('full_name');

            $table->string('email');

            $table->string('phone_number')->nullable();

            $table->string('resume');

            $table->longText('cover_letter')->nullable();

            $table->enum('status', [
                'pending',
                'reviewed',
                'shortlisted',
                'rejected',
                'hired'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};