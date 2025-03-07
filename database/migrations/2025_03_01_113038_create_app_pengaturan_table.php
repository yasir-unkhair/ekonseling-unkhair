<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('app_pengaturan', function (Blueprint $table) {
            $table->char('id', '20')->primary();
            $table->string('nama', 150)->nullable();
            $table->text('value')->nullable();
            $table->enum('jenis', ['text', 'image'])->default('text');
        });

        $pengaturan = [
            ['id' => 'alamat', 'nama' => 'Alamat', 'value' => 'Jl. Jusuf Abdulrahman Kotak Pos 53 Kelurahan Gambesi Kota Ternate', 'jenis' => 'text'],
            ['id' => 'author', 'nama' => 'Author', 'value' => 'UPT TIK', 'jenis' => 'text'],
            ['id' => 'email', 'nama' => 'Email', 'value' => 'upttik@unkhair.ac.id', 'jenis' => 'text'],
            ['id' => 'logo', 'nama' => 'Logo', 'value' => 'unkhair.png', 'jenis' => 'image'],
            ['id' => 'nama-aplikasi', 'nama' => 'Nama Aplikasi', 'value' => 'E-KONSELING UNKHAIR', 'jenis' => 'text'],
            ['id' => 'nama-departemen', 'nama' => 'Nama Institusi', 'value' => 'Universitas Khairun', 'jenis' => 'text'],
            ['id' => 'nama-sub-aplikasi', 'nama' => 'Detail Nama Aplikasi', 'value' => 'E-Konseling Universitas Khairun', 'jenis' => 'text'],
            ['id' => 'tahun', 'nama' => 'Tahun Pembuatan', 'value' => '2025', 'jenis' => 'text'],
            ['id' => 'telepon', 'nama' => 'Telepon', 'value' => '(0921]-31109055', 'jenis' => 'text'],
            ['id' => 'versi', 'nama' => 'Versi', 'value' => '1.0', 'jenis' => 'text'],
            ['id' => 'url-simak', 'nama' => 'URL SIMAK', 'value' => 'https://simak.unkhair.ac.id', 'jenis' => 'text'],
            ['id' => 'username-admin', 'nama' => 'Username Api SIMAK', 'value' => 'admin_ws', 'jenis' => 'text'],
            ['id' => 'password-admin', 'nama' => 'Password Api SIMAK', 'value' => '***S4lk1nLutf1###', 'jenis' => 'text'],
        ];

        DB::table('app_pengaturan')->insert($pengaturan);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_pengaturan');
    }
};
