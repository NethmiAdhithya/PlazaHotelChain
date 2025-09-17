<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('make_new_reservations', function (Blueprint $table) {
            // 1. Drop the existing foreign key constraint that references 'registers'
            //    The constraint name is from your error: `make_new_reservations_user_id_foreign`
            $table->dropForeign('make_new_reservations_user_id_foreign');

            // 2. Add a new foreign key constraint that references the 'logins' table
            //    Ensure 'user_id' column type matches 'logins.id' (e.g., unsignedBigInteger)
            $table->foreign('user_id')
                  ->references('id')
                  ->on('logins') // <--- IMPORTANT: Changed to 'logins'
                  ->onDelete('set null'); // Keep your desired onDelete behavior
        });
    }

    public function down(): void
    {
        Schema::table('make_new_reservations', function (Blueprint $table) {
            // If rolling back, first drop the 'logins' FK
            $table->dropForeign('make_new_reservations_user_id_foreign'); // This will drop the one referencing 'logins'

            // Then re-add the original 'registers' FK (if you truly want to revert)
            $table->foreign('user_id')
                  ->references('id')
                  ->on('registers')
                  ->onDelete('set null');
        });
    }
};