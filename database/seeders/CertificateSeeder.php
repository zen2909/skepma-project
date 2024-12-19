<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('certificates')->insert([
                'name' => $faker->name,
                'criteria' => $faker->randomElement,
                'points' => $faker->randomDigitNotNull,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}