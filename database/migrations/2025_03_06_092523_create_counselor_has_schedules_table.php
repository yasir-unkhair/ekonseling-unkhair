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
        Schema::create('app_counselor_has_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->comment('konselor id')->constrained('users')->onDelete('cascade');
            $table->string('hari')->nullable();
            $table->string('jam')->nullable();
            $table->enum('metode', ['chat', 'video_call', 'offline'])->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_counselor_has_schedules');
    }
};
