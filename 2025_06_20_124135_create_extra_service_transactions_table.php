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
        // Create the 'extra_service_transactions' table.
        Schema::create('extra_service_transactions', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            // Foreign key to 'check_ins' table, nullable if an extra service might not be tied to a specific check-in
            $table->foreignId('check_in_id')->nullable()->constrained('check_ins')->onDelete('set null');
            $table->string('service_name'); // Name of the service (e.g., 'Restaurant', 'Laundry')
            $table->decimal('amount', 10, 2); // Revenue amount from this service
            $table->date('transaction_date'); // Date when the transaction occurred
            $table->string('hotel_branch')->nullable(); // Hotel branch where the service was provided
            $table->text('description')->nullable(); // Optional description for the transaction
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the 'extra_service_transactions' table if the migration is rolled back.
        Schema::dropIfExists('extra_service_transactions');
    }
};
