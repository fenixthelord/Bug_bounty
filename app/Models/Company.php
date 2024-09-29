<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CompanySpecialization ;
use App\Models\Product;
use App\Models\Specialization;
class Company extends Model
{

    use HasFactory,SoftDeletes,Uuid;

    protected $fillable = [
        'uuid','name','phone','email','password','logo','type','description','domain','employess_count'
        ];
      
        public function company_specializations(){
            return $this->hasMany(CompanySpecialization::class);
        }
        public function products(){
            return $this->hasMany(Product::class);
        }
        public function specializations(){
            return $this->belongsToMany(Specialization::class,'company_specializations','company_id','specialization_id');
        }



}
