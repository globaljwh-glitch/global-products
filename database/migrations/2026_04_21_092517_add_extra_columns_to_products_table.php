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
        Schema::table('products', function (Blueprint $table) {
            
            $table->text('other')->nullable()->after('description');

            $table->string('external_url')->nullable()->after('other');
            $table->string('external_url_label')->nullable()->after('external_url');

            $table->boolean('is_featured')->default(false)->after('external_url_label');
            $table->boolean('is_exclusive')->default(false)->after('is_featured');

            $table->string('model_number')->nullable()->after('is_exclusive');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'other',
                'external_url',
                'external_url_label',
                'is_featured',
                'is_exclusive',
                'model_number'
            ]);
        });
    }
};