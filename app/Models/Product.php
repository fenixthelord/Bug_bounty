<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes,Uuid;
    protected $fillable = [
        'uuid','title','description','company_id','status','terms' ,'url'
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function reports(){
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
            $user->uuid = (string) Str::uuid(); // توليد UUID عند الإنشاء
        });
    }
}
