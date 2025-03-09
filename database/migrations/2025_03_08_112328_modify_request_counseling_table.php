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
            $table->string('category')->nullable()->comment('akademik, karir, pribadi, dll')->change();
            $table->string('time', 20)->nullable()->change();

            $table->json('details')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_counseling_requests', function (Blueprint $table) {
            $table->enum('category', ['akademik', 'karir', 'pribadi'])->nullable();
            $table->time('time')->nullable();

            $table->dropColumn('details');
        });
    }
};
