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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            // foreign_id
        $table->foreignId('shift_id')->constrained('shifts')->cascadeOnDelete();
        $table->foreignId('route_id')->constrained('routes')->cascadeOnDelete();
        $table->foreignId('trip_template_id')->nullable()->constrained('trip_templates')->nullOnDelete();

        $table->time('departure_time');
        $table->integer('sequence');
        $table->enum('status', ['scheduled', 'active', 'completed', 'cancelled'])->default('scheduled');
        $table->timestamps();

        // A shift cannot have two trips at the same departure time
        $table->unique(['shift_id', 'departure_time'], 'trip_shift_departure_unique');

        // A shift cannot have two trips with the same sequence number
        $table->unique(['shift_id', 'sequence'], 'trip_shift_sequence_unique');

        $table->index('departure_time');
        $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
