<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Researcher extends Model
{
    use HasFactory, SoftDeletes, Uuid;
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
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
