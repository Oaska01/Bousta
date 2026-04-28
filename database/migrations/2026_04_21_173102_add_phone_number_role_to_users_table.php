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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->unique()->nullable()->after('name');
            $table->enum('role', ['passenger', 'admin', 'driver'])->default('passenger')->after('phone_number');
            $table->timestamp('phone_verified_at')->nullable()->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone_number', 'role', 'phone_verified_at', 'deleted_at']);
        });
    }
};
