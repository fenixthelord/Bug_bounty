<?php  

namespace Database\Factories;  

use App\Models\Report;  
use App\Models\Product;  
use App\Models\Researcher;
use App\Models\User;  

use Illuminate\Database\Eloquent\Factories\Factory;  

class ReportFactory extends Factory  
{  
    protected $model = Report::class;  

    public function definition()  
    {  
        return [  
            'uuid' => \Illuminate\Support\Str::uuid(),  
            'product_id' => Product::factory(),  
            'researcher_id' => Researcher::factory(),  
            'title' => $this->faker->sentence,  
            'file' => $this->faker->filePath(),  
            'status' => "pending",  
            'review_status' => 1,  
             
            'user_id' => User::factory(),  
            'canceled_note' => $this->faker->sentence,  
        ];  
    }  
}