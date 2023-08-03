<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // admin
        \App\Models\User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'remember_token' => Str::random(10),
            'level' => 0
        ]);

        \App\Models\Jabatan::create([
            'nama_jabatan' => 'Kepala Sekolah',
        ]);

        \App\Models\Jabatan::create([
            'nama_jabatan' => 'Wakasek Kurikulum',
        ]);

        \App\Models\Jabatan::create([
            'nama_jabatan' => 'Guru Mata Pelajaran',
        ]);

        \App\Models\Kelas::create([
            'nama_kelas' => 'I',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'II',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'III',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'IV',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'V',
        ]);
        \App\Models\Kelas::create([
            'nama_kelas' => 'VI',
        ]);

        \App\Models\ProfilInstansi::create([]);

        \App\Models\InformasiKegiatan::create([]);
    }
}
