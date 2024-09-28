<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Researcher extends Model
{
    use HasFactory,SoftDeletes,Uuid;
    protected $fillable = [
        'uuid','name','email','password','phone','code','image','points','facebook','linkedin','github'
    ];
    public function reports(){
        return $this->hasMany(Report::class);
    }
    public function addPoints(int $points)  
    {  
        $this->increment('points', $points);  
    }
    public function getRatingAttribute()  
    {  
       
        if ($this->points < 5) {  
            return 'Beginner';  
        } elseif ($this->points < 7) {  
            return 'Intermediate';  
        } elseif ($this->points < 9) {  
            return 'Advanced';  
        } else {  
            return 'Expert';  
        }  
    }  
  

}
