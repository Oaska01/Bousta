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
        Schema::create('route_stops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_id')->constrained('routes')->cascadeOnDelete();
            $table->foreignId('stop_id')->constrained('stops')->cascadeOnDelete();
            $table->integer('order');
            $table->integer('offset_minutes');
            //  to prevent bad data
            // A route cannot have two stops at the same position
            $table->unique(['route_id', 'order']);
            // 2. A stop cannot be added to the same route more than once
            $table->unique(['route_id', 'stop_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_stops');
    }
};
