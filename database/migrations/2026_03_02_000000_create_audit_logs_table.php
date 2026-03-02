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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('facility_id')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();
            
            $table->string('action'); // 'discharge', 'status_change', 'alert_create', etc.
            $table->string('target_model'); // 'Patient', 'Appointment', 'Alert', etc.
            $table->unsignedBigInteger('target_id'); // ID of affected record
            
            $table->json('changes')->nullable(); // What changed (from->to)
            $table->text('description')->nullable(); // Human readable description
            
            $table->timestamps();
            
            // Indexes for querying
            $table->index(['facility_id', 'created_at']);
            $table->index(['user_id', 'created_at']);
            $table->index(['target_model', 'target_id']);
            $table->index(['action']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
