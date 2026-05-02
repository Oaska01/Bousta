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
        Schema::create('lost_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporter_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('trip_id')->constrained('trips')->cascadeOnDelete();
            $table->foreignId('lost_item_report_id')->nullable()->constrained('lost_item_reports')->nullOnDelete();
            
            $table->enum('category', [
                'electronics',
                'wallet',
                'keys',
                'bag',
                'clothing',
                'documents',
                'other'
            ])->default('other');
            $table->string('description');
            $table->string('image_url')->nullable();
            $table->enum('status', ['unclaimed', 'matched', 'returned'])->default('unclaimed');
            $table->softDeletes();
            $table->timestamps();

            $table->index('status');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_items');
    }
};
