<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modelas\CompanySpecialization ;
use App\Models\Company;

class Specialization extends Model
{
    use HasFactory,SoftDeletes,Uuid;
    protected $fillable = [
        'uuid','title'
        ];
        public function company_specializations(){
            return $this->hasMany(CompanySpecialization::class);
        }
        public function companies(){
            return $this->belongsToMany(Company::class,'company_specializations','company_id','specialization_id');
        }
}
