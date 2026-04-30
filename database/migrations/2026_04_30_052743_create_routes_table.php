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
            $table -> string('name');
            $table -> string('description') -> nullable();
            $table -> foreignId('return_route_id') -> nullable() -> constrained('routes');
            $table -> boolean('is_active') -> default(true);
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
