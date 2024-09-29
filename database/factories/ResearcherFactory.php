<?php  

namespace Database\Factories;  

use App\Models\Researcher;  
use Illuminate\Database\Eloquent\Factories\Factory;  

class ResearcherFactory extends Factory  
{  
    protected $model = Researcher::class;  

    public function definition()  
    {  
        return [  
            'uuid' => \Illuminate\Support\Str::uuid(),  
            'name' => $this->faker->name,  
            'email' => $this->faker->unique()->safeEmail,  
            'password' => bcrypt('password'), // or use Hash::make('password')  
            'phone' => $this->faker->phoneNumber,  
            'code' => $this->faker->unique()->word,  
            'image' => $this->faker->imageUrl(),  
            'points' => $this->faker->numberBetween(0, 100),  
            'facebook' => $this->faker->url,  
            'linkedin' => $this->faker->url,  
            'github' => $this->faker->url,  
        ];  
    }  
}