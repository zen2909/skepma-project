<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LombaKtiSeeder::class);
        $this->call(LombaKreatifitasSeeder::class);
        $this->call(LombaMinbaSeeder::class);
        $this->call(ForumKomunikasiSeeder::class);
        $this->call(PengurusHimpunanSeeder::class);
        $this->call(PengurusUkmSeeder::class);
        $this->call(KegiatanHimpunanSeeder::class);
        $this->call(KegiatanUkmSeeder::class);
    }
}