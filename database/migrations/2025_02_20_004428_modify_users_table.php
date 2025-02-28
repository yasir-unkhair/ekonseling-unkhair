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
            $table->string('username', 25)->nullable()->unique('username')->after('email_verified_at');
            $table->boolean('is_active')->default(1)->after('password');
            $table->enum('role', ['user', 'counselor', 'admin'])->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('is_active');
            $table->dropColumn('role');
        });
    }
};
