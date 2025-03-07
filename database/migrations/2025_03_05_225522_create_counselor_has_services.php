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
        if (Schema::hasTable('app_counselor_has_services')) {
            Schema::dropIfExists('app_counselor_has_services');
        }

        Schema::create('app_counselor_has_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('konselor id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('service_id')->nullable()->references('id')->on('app_services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_counselor_has_services');
    }
};
