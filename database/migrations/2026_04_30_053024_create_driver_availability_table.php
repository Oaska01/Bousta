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
        Schema::create('driver_availability', function (Blueprint $table) {
            $table->id();

            // Good use of foreignId linking to the users table
            $table->foreignId('driver_id')->constrained('users')->cascadeOnDelete();

            $table->date('date');

            // I suggest keeping the boolean if you want to track "Accepted" vs "Rejected" requests,
            // otherwise, just having the row exist can mean "Unavailable".
            $table->boolean('is_available')->default(false);

            $table->string('reason')->nullable();
            $table->timestamps();

            // This unique rule is perfect—no double records for one day.
            $table->unique(['driver_id', 'date'], 'driver_availability_unique');

            // Great for performance when the Admin checks the calendar.
            $table->index('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_availability');
    }
};
