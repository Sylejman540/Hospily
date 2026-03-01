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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();

            $table->foreignId('facility_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('department_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('mrn');

            $table->string('first_name');
            $table->string('last_name');

            $table->date('dob');
            $table->enum('gender', ['male', 'female', 'other'])->nullable();

            $table->enum('care_status', [
                'outpatient',
                'in-care',
                'critical',
                'recovery'
            ])->default('outpatient');

            $table->timestamp('admitted_at')->nullable();
            $table->timestamp('discharged_at')->nullable();

            $table->timestamps();

            $table->unique(['facility_id', 'mrn']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
