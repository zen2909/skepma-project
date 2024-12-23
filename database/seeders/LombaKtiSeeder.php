<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LombaKtiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_lomba_kti')->insert([
            [
                'tingkat' => 'Internasional',
                'prestasi' => 'Juara 1/2/3',
                'poin' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat' => 'Internasional',
                'prestasi' => 'Finalis',
                'poin' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat' => 'Internasional',
                'prestasi' => 'Peserta',
                'poin' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}