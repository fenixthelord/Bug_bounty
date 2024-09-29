<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('companies')->insert([
                'name' => 'Company ' . $i,
                'password' => Hash::make('password' . $i), // Hash the password
                'phone' => '123-456-789' . $i,
                'email' => 'company' . $i . '@example.com',
                'description' => 'This is a description for company ' . $i,
                'domain' => 'company' . $i . '.com',
                'uuid' => Str::uuid(), // Generate UUID
                'created_at' => now(),
                'updated_at' => now(),
                'employess_count' => rand(10, 100),
            ]);
        }
    }
}
