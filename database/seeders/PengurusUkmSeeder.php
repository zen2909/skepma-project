<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PengurusUkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_pengurus_ukm')->insert([
            [
                'jabatan' => 'Pengurus inti',
                'deskripsi_detail' => 'Ketua',
                'poin' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Pengurus inti',
                'deskripsi_detail' => 'Waka',
                'poin' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Pengurus inti',
                'deskripsi_detail' => 'Sekretaris',
                'poin' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Pengurus inti',
                'deskripsi_detail' => 'Bendahara',
                'poin' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Koordinator',
                'deskripsi_detail' => 'Korbid',
                'poin' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Anggota Aktif',
                'deskripsi_detail' => 'Anggota',
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}