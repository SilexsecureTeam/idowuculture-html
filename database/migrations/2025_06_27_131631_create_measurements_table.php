<?php

use App\Enums\MeasurementStatus;
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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('measured_by')->constrained('users', 'id')->onDelete('cascade');

            // Basic Measurements
            $table->decimal('neck', 5, 2)->nullable();
            $table->decimal('chest', 5, 2)->nullable();
            $table->decimal('waist', 5, 2)->nullable();
            $table->decimal('hip', 5, 2)->nullable();
            $table->decimal('shoulder', 5, 2)->nullable();
            $table->decimal('sleeve_length', 5, 2)->nullable();
            $table->decimal('top_length', 5, 2)->nullable();
            $table->decimal('trouser_length', 5, 2)->nullable();
            $table->decimal('thigh', 5, 2)->nullable();
            $table->decimal('knee', 5, 2)->nullable();
            $table->decimal('ankle', 5, 2)->nullable();

            $table->decimal('amount', 15, 2)->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default(MeasurementStatus::PENDING);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
