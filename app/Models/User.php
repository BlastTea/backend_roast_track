<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'company_id',
        'username',
        'email',
        'password',
        'role',
        'name',
        'address',
        'phone_number',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function freshTimestamp()
    {
        return now('Asia/Jakarta');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'admin_id');
    }

    public function company() {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function roastings() {
        return $this->hasMany(Roasting::class, 'roastery_id');
    }
    
}
