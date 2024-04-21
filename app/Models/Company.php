<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends BaseModel
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'address'
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function members() {
        return $this->hasMany(Member::class, 'company_id');
    }
}
