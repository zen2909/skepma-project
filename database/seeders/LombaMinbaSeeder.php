<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LombaMinbaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_minba')->insert([
            [
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Finalis',
                'poin' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Peserta',
                'poin' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Nasional',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Nasional',
                'prestasi' => 'Finalis',
                'poin' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Nasional',
                'prestasi' => 'Peserta',
                'poin' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Regional',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Regional',
                'prestasi' => 'Finalis',
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Regional',
                'prestasi' => 'Peserta',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Institut',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Institut',
                'prestasi' => 'Finalis',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Institut',
                'prestasi' => 'Peserta',
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Fakultas',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Fakultas',
                'prestasi' => 'Finalis',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Fakultas',
                'prestasi' => 'Peserta',
                'poin' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Jurusan',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Jurusan',
                'prestasi' => 'Finalis',
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_lomba' => 'Jurusan',
                'prestasi' => 'Peserta',
                'poin' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}