<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Company extends Model 
{

    use HasApiTokens,HasFactory,SoftDeletes,Uuid;

    protected $fillable = [
<<<<<<< HEAD
        'uuid',
        'name',
        'phone',
        'email',
        'password',
        'logo',
        'type',
        'description',
        'domain',
        'employess_count'
    ];
    public function companySpecialization()
    {
        return $this->hasMany(CompanySpecialization::class);
    }
    public function specializations()
    {
        return $this->belongsToMany(Specialization::class,'company_specializations','company_id','specialization_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
=======

        'uuid','name','phone','email','password','logo','type','description','domain','employess_count'
        ];
        public function companySpecialization(){
            return $this->hasMany(CompanySpecialization::class);
        }
        public function specializations(){
            return $this->belongsToMany(Specialization::class);
        }
        public function products(){
            return $this->hasMany(Product::class);
        }
        public function reports()
    {
        return $this->hasManyThrough(Report::class, Product::class);

>>>>>>> 817db03745428b42a476cb69a119115db25638d1
    }
}
