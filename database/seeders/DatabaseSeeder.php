<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->user();

        $this->services();
    }

    public function services()
    {
        $services = [
            [
                'name' => 'Akademik',
                'description' => 'Membantu siswa atau mahasiswa dalam perencanaan studi, pemilihan jurusan, strategi belajar, dan manajemen waktu.',
            ],
            [
                'name' => 'Karir',
                'description' => 'Membantu individu dalam menentukan jalur karir, persiapan kerja, dan pengembangan profesional.',
            ],
            [
                'name' => 'Pribadi',
                'description' => 'Menangani masalah pribadi seperti stres, kecemasan, dan hubungan sosial.',
            ],
            [
                'name' => 'Psikologis',
                'description' => 'Fokus pada kesehatan mental, termasuk kecemasan, depresi, trauma, dan masalah psikologis lainnya.',
            ],
            [
                'name' => 'Keluarga & Pernikahan',
                'description' => 'Menangani masalah dalam hubungan keluarga, pernikahan, atau pasangan.',
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                $service
            );
        }
    }

    public function user()
    {
        $user = [
            'name' => 'Muhamad Yasir',
            'email' => 'yasir@admin.com',
            'username' => 'yasir@admin',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ];

        User::updateOrCreate(
            ['email' => $user['email']],
            $user
        );
    }
}
