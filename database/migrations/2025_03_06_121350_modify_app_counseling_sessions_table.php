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
        Schema::table('app_counseling_sessions', function (Blueprint $table) {
            $table->string('session_method')->nullable()->comment('method of counseling session')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_counseling_sessions', function (Blueprint $table) {
            $table->enum('session_method', ['chat', 'video_call', 'offline']);
        });
    }
};
