<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    public function run()
    {
        $specializations = [
            'Web Development',
            'Mobile App Development',
            'Cybersecurity',
            'Artificial Intelligence',
            'Cloud Computing',
        ];

        foreach ($specializations as $specialization) {
            DB::table('specializations')->insert([
                'uuid' => Str::uuid(),
                'title' => $specialization,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
