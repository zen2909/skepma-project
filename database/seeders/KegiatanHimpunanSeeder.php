<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KegiatanHimpunanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_kegiatan_himpunan')->insert([
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Ketua',
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Waka',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Sekretaris',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Bendahara',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Koordinator',
                'deskripsi_detail' => 'Korbid',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia Aktif',
                'deskripsi_detail' => 'Anggota',
                'poin' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Peserta',
                'deskripsi_detail' => 'Peserta',
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}