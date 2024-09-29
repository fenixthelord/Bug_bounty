<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;  
use App\Models\Product;  
use App\Models\Report;  
use App\Models\Researcher;  
use App\Models\CompanySpecialization;  


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory(10)->create(); // Create 10 companies  
        Researcher::factory(10)->create(); // Create 10 researchers  
        Product::factory(20)->create(); // Create 20 products  
        Report::factory(30)->create(); 
    }
}
