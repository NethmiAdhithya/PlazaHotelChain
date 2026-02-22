<?php

// database/migrations/YYYY_MM_DD_XXXXXX_add_total_price_to_make_new_reservations_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('make_new_reservations', function (Blueprint $table) {
            // Add total_price as a decimal or double, assuming it's a currency
            $table->decimal('total_price', 10, 2)->nullable()->after('total_guests'); // Or after any logical column
        });
    }

    public function down(): void
    {
        Schema::table('make_new_reservations', function (Blueprint $table) {
            $table->dropColumn('total_price');
        });
    }
};
