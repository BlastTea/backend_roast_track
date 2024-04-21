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

    public function users() {
        return $this->hasMany(User::class, 'company_id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'company_id');
    }

    public function classificationResults() {
        return $this->hasMany(ClassificationResult::class, 'company_id');
    }
}
