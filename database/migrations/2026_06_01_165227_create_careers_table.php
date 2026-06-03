<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('careers', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('location')->nullable();
            // Remote, On-site, Hybrid

            $table->string('job_type')->nullable();
            // Full-Time, Part-Time, Contract

            $table->date('posted_date')->nullable();

            $table->longText('overview')->nullable();

            $table->longText('responsibilities')->nullable();

            $table->longText('skills')->nullable();

            $table->longText('qualifications')->nullable();

            $table->longText('offer')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};