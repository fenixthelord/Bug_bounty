<?php

  

namespace Database\Factories;  

use App\Models\Company;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class CompanyFactory extends Factory  
{  
    protected $model = Company::class;  

    public function definition()  
    {  
        return [  
            'uuid' => \Illuminate\Support\Str::uuid(),  
            'name' => $this->faker->company,  
            'phone' => $this->faker->phoneNumber,  
            'email' => $this->faker->unique()->safeEmail,  
            'password' => bcrypt('password'),  // Consider using Hash::make('password')  خاصة
            'logo' => $this->faker->imageUrl(),  
            'type' => "خاصة"  ,
            'description' => $this->faker->paragraph,  
            'domain' => $this->faker->domainName,  
            'employess_count' => $this->faker->numberBetween(1, 1000),  
        ];  
    }  
}