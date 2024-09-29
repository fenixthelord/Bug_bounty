<?php  

namespace Database\Factories;  

use App\Models\Product;  
use App\Models\Company;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class ProductFactory extends Factory  
{  
    protected $model = Product::class;  

    public function definition()  
    {  
        return [  
            'uuid' => \Illuminate\Support\Str::uuid(),  
            'title' => $this->faker->sentence,  
            'description' => $this->faker->paragraph,  
            'company_id' => Company::factory(), // Automatically associate with a company  
            'status' => 1,  
            'terms' => $this->faker->sentence, 
            'url' => $this->faker->sentence,  

        ];  
    }  
}