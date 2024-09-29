<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class Product extends Model
{
    use HasFactory, SoftDeletes, Uuid;
    protected $fillable = [
<<<<<<< HEAD
        'uuid','title','description','company_id','status','terms','url'
=======
        'uuid',
        'title',
        'description',
        'company_id',
        'status',
        'terms',
        'url'
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = (string) \Str::uuid(); // توليد UUID عند الإنشاء
        });
    }

}
