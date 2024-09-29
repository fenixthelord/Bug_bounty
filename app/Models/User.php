<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'type',
        'profile_picture',
    ];
//--------------------------------------------------------------|
    public function isSuperAdmin() {
        return $this->type === 'super admin';
    }

    public function isAdmin() {
        return $this->type === 'admin';
    }

    public function setPasswordAttribute($value) {
       $this->attributes['password'] = Hash::make($value);
    }
//--------------------------------------------------------------|
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
<<<<<<< HEAD

    public function reports() {
=======
    public function reports()
    {
>>>>>>> 817db03745428b42a476cb69a119115db25638d1
        return $this->hasMany(Report::class);
    }
}
