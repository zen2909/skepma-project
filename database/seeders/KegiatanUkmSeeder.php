<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use \Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KegiatanUkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_kegiatan_ukm')->insert([
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Ketua',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Waka',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Sekretaris',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia inti',
                'deskripsi_detail' => 'Bendahara',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Koordinator',
                'deskripsi_detail' => 'Korbid',
                'poin' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Panitia Aktif',
                'deskripsi_detail' => 'Anggota',
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'jabatan' => 'Peserta',
                'deskripsi_detail' => 'Peserta',
                'poin' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}