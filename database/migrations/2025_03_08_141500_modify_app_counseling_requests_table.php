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
        Schema::table('app_counseling_requests', function (Blueprint $table) {
            $table->enum('category', ['pribadi', 'kelompok'])->nullable()->comment('pribadi, kelompok')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_counseling_requests', function (Blueprint $table) {
            $table->string('category')->nullable()->comment('akademik, karir, pribadi, dll');
        });
    }
};
