<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            
        $this->call(CompanySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ResearcherSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(CompanySpecializationSeeder::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(ReportSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
