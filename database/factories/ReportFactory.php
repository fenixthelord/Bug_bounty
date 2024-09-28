<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;  
use App\Models\Product;  
use App\Models\Researcher;  

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;  
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [  
            'title' => $this->faker->sentence,  
            'status' => $this->faker->randomElement(['pending', 'completed', 'in progress']),  
            'product_id' => Product::factory(), // Creates a Product for each Report  
            'researcher_id' => Researcher::factory(), // Creates a Researcher for each Report  
        ];  
    }
}
