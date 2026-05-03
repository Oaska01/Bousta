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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table -> string('name') -> unique();
            $table -> string('description') -> nullable();

            $table->foreignId('start_stop_id')->constrained('stops')->cascadeOnDelete();
            $table->foreignId('end_stop_id')->constrained('stops')->cascadeOnDelete();
            $table->foreignId('return_route_id')->nullable()->constrained('routes')->nullOnDelete();


            $table -> enum('status', ['active', 'suspended']) -> default('active');
            $table -> softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
