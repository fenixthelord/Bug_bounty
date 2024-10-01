<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ReportSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $statuses = ['pending', 'accept', 'reject', 'done'];

        foreach (range(1, 29) as $index) {
            DB::table('reports')->insert([
                'uuid' => Str::uuid(),
                'product_id' => $faker->numberBetween(1, 10),
                'researcher_id' => $faker->numberBetween(1, 10),
                'title' => $faker->sentence(4),
                'file' => $faker->word . '.pdf',
                'status' => $faker->randomElement($statuses),
                'review_status' => $faker->boolean,
                'user_id' => 1,
                'canceled_note' => 'iiii',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
