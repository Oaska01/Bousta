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
        Schema::create('trip_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnDelete();

            $table->time('departure_time');

            $table->enum('day_of_week', [
            'everyday', 'monday', 'tuesday', 'wednesday',
            'thursday', 'friday', 'saturday', 'sunday'
            ])->default('everyday');

            $table->timestamps();
            // A route cannot have two templates with the same departure time and start stop
            $table->unique(
            ['route_id', 'day_of_week', 'departure_time'],
            'trip_template_unique_index'
        );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_templates');
    }
};
