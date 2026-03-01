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
        Schema::create('handover_alerts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('facility_id')
                ->constrained()
                ->cascadeOnDelete();

        $table->foreignId('created_by')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->string('title');
        $table->text('message');

        $table->enum('priority', [
            'low',
            'medium',
            'critical'
        ])->default('low');

        $table->timestamp('expires_at')->nullable();

        $table->boolean('is_active')->default(true);

        $table->timestamps();

        $table->index(['facility_id', 'priority', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handover_alerts');
    }
};
