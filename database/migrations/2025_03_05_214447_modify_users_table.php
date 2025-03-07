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
        if (Schema::hasColumns('users', ['hp', 'spesialisasi', 'pengalaman', 'jadwal'])) {
            Schema::dropColumns('users', ['hp', 'spesialisasi', 'pengalaman', 'jadwal']);
        }

        Schema::table('users', function (Blueprint $table) {
            $table->json('details')->nullable()->comment('detail user')->after('user_simak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('details');
        });
    }
};
