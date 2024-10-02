<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;


class Researcher extends Model
{

    use HasApiTokens,HasFactory,SoftDeletes,Uuid;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'phone',
        'code',
        'image',
        'points',
        'facebook',
        'linkedin',
        'github'
    ];
    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function Products() {
        return $this->belongsToMany(Product::class,Report::class);
    }


    public function addPoints(int $points) {  
        $this->increment('points', $points);  
    }  

    public function calculatePoints()  
    {  
        $acceptedReportsCount = $this->reports()->where('status', 'accept')->count();  

        // Update the points based on accepted reports  
        $this->points = $acceptedReportsCount;  
        $this->save();  

        return $this->points;  
    }  
    public function calculateRating()  
    {  
        // Get the number of accepted reports  
        $acceptedReportsCount = $this->reports()->where('status', 'accepted')->count();  

        // Prevent division by zero  
        if ($acceptedReportsCount === 0) {  
            return 0; // Or you can return null or any other value that makes sense for your application  
        }  

        // Calculate the rating  
        $rating = $this->points / $acceptedReportsCount;  

        return $rating;  
    }  
}
