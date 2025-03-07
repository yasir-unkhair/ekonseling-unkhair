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
        Schema::table('app_counselor_has_schedules', function (Blueprint $table) {
            $table->string('metode')->nullable()->comment('jenis methode konseling')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_counselor_has_schedules', function (Blueprint $table) {
            $table->enum('metode', ['chat', 'video_call', 'offline'])->nullable();
        });
    }
};
