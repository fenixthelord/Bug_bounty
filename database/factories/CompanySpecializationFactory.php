<?php  

namespace Database\Factories;  

use App\Models\CompanySpecialization;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class CompanySpecializationFactory extends Factory  
{  
    protected $model = CompanySpecialization::class;  

    public function definition()  
    {  
        return [  
            'company_id' => \App\Models\Company::factory(),  
            'specialization_id' => $this->faker->randomNumber(),  // Change this to the correct model  
        ];  
    }  
}