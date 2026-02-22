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
        // Add the 'price_per_night' column to the 'rooms' table.
        // It's a decimal type to store currency values accurately, with a default of 0.00.
        Schema::table('rooms', function (Blueprint $table) {
            if (!Schema::hasColumn('rooms', 'price_per_night')) {
                $table->decimal('price_per_night', 10, 2)->after('status')->default(0.00);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'price_per_night' column if the migration is rolled back.
        Schema::table('rooms', function (Blueprint $table) {
            if (Schema::hasColumn('rooms', 'price_per_night')) {
                $table->dropColumn('price_per_night');
            }
        });
    }
};
