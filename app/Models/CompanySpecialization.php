<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySpecialization extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'specialization_id'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function specilazation()
    {
        return $this->belongsTo(Specialization::class);
    }
}
