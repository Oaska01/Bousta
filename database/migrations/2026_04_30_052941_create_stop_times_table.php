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
        Schema::create('stop_times', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trip_id')->constrained('trips')->cascadeOnDelete();
            $table->foreignId('stop_id')->constrained('stops')->cascadeOnDelete();
            
            $table->timestamp('actual_arrival');
            $table->timestamps();

            // A trip cannot have two records for the same stop
            $table->unique(['trip_id', 'stop_id'], 'stop_time_trip_stop_unique');

            $table->index('actual_arrival');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stop_times');
    }
};
