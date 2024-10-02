<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Str;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Specialization::create([
                'uuid' => (string) Str::uuid(), // إنشاء UUID عشوائي
                'title' => 'اختصاص ' . $i, // أو يمكنك استخدام بيانات عشوائية أخرى
            ]);
        }
    }
}