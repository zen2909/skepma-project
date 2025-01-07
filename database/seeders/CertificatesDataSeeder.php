<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CertificatesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificates_data')->insert(values: [
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Juara 1/2/3',
                'points' => 150,
                'kode_sertifikat' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Finalis',
                'points' => 100,
                'kode_sertifikat' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jenis' => 'Sertifikat Lomba Karya Tulis Ilmiah',
                'tingkat_lomba' => 'Internasional',
                'prestasi' => 'Peserta',
                'points' => 75,
                'kode_sertifikat' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}