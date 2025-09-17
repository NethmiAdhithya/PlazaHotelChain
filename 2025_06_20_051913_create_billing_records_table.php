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
        Schema::create('billing_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')
      ->constrained('make_new_reservations') // <-- Change this line
      ->onDelete('cascade');
            $table->decimal('amount', 8, 2); // e.g., 999999.99
            $table->timestamp('billed_at')->useCurrent(); // Or ->nullable() and set from app
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_records');
    }
};