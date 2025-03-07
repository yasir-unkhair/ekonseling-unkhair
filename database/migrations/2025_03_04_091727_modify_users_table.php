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
        Schema::table('users', function (Blueprint $table) {
            $table->string('hp', 25)->nullable()->after('role');
            $table->text('spesialisasi')->nullable()->comment('spesialisasi konselor')->after('hp');
            $table->smallInteger('pengalaman', false)->default(0)->comment('pengalaman konselor')->after('spesialisasi');
            $table->json('jadwal')->nullable()->comment('jadwal ketersediaan konselor')->after('pengalaman');
            $table->string('foto', 100)->nullable()->after('jadwal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['hp', 'spesialisasi', 'pengalaman', 'jadwal', 'foto']);
        });
    }
};
