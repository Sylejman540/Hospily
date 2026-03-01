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
        Schema::create('departments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('facility_id')->constrained()->cascadeOnDelete();
        $table->string('name');
        $table->integer('total_beds')->default(0);
        $table->string('color_theme')->nullable();
        $table->timestamps();
        $table->index(['facility_id', 'name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
