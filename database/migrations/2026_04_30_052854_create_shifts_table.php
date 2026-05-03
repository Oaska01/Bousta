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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('route_id')->constrained('routes')->cascadeOnDelete();
            $table->foreignId('driver_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bus_id')->constrained('buses')->cascadeOnDelete();

            $table->date('date');
            $table->timestamps();
            
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            // A driver cannot be assigned to two shifts on the same date
            $table->unique(['driver_id', 'date'], 'shift_driver_date_unique');
            // A bus cannot be assigned to two shifts on the same date
            $table->unique(['bus_id', 'date'], 'shift_bus_date_unique');
            // toquery shifts by date
            $table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifts');
    }
};
