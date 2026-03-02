<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * PHASE 1: Critical Performance Indexes
     * 
     * These indexes are essential for production queries.
     * They optimize the most common filtering patterns:
     * - Filter users by role
     * - Filter appointments by clinician + date range
     * - Filter appointments by status
     * - Filter patients by care status
     */
    public function up(): void
    {
        // INDEX 1: Users - filter by facility and role (for staff listing)
        Schema::table('users', function (Blueprint $table) {
            $table->index(['facility_id', 'role']);
        });

        // INDEX 2: Patients - filter by care status (for patient status queries)
        Schema::table('patients', function (Blueprint $table) {
            $table->index(['facility_id', 'care_status']);
        });

        // INDEX 3: Appointments - filter by clinician within date range
        // This is critical for the AppointmentController::forClinician()->dateRange() query
        Schema::table('appointments', function (Blueprint $table) {
            $table->index(['facility_id', 'clinician_id', 'scheduled_at']);
        });

        // INDEX 4: Appointments - filter by status
        // Critical for status-based filtering and reporting
        Schema::table('appointments', function (Blueprint $table) {
            $table->index(['facility_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['facility_id', 'role']);
        });

        Schema::table('patients', function (Blueprint $table) {
            $table->dropIndex(['facility_id', 'care_status']);
        });

        Schema::table('appointments', function (Blueprint $table) {
            $table->dropIndex(['facility_id', 'clinician_id', 'scheduled_at']);
            $table->dropIndex(['facility_id', 'status']);
        });
    }
};
