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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
          // Create 10 researchers  
          \App\Models\Researcher::factory(10)->create();  
        
          // Create 5 companies  
          \App\Models\Company::factory(5)->create()  
              ->each(function ($company) {  
                  // For each company, create 3 products  
                  $company->products()->saveMany(\App\Models\Product::factory(3)->make())  
                      ->each(function ($product) {  
                          // For each product, create 2 reports  
                          $product->reports()->saveMany(\App\Models\Report::factory(2)->make());  
                      });  
              });  
    }
}
