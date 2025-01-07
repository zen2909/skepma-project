<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ForumKomunikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sertifikat_forum_komunikasi')->insert(values: [
            [
                'tingkat_kegiatan' => 'Internasional',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Internasional',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 75,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Nasional',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Nasional',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Regional',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Regional',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Institut',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Institut',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Fakultas',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'fakultas',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Jurusan',
                'status_keikutsertaan' => 'Pembicara',
                'poin' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tingkat_kegiatan' => 'Jurusan',
                'status_keikutsertaan' => 'Peserta',
                'poin' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}