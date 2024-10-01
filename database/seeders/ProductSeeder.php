<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('products')->insert([
                'uuid' => Str::uuid(),
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'company_id' => $faker->numberBetween(1, 10),
                'status' => 0,
                'terms' => $faker->paragraph,
                'url' => $faker->url,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

