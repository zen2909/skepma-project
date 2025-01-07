<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SertifikatLombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_lomba')->insert(values: [
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Juara 1/2/3',
                'points' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Finalis',
                'points' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Peserta',
                'points' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}