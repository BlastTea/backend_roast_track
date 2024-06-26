<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'company_id',
        'orderers_name',
        'address',
        'bean_type',
        'from_district',
        'amount',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function roastings() {
        return $this->hasMany(Roasting::class);
    }
}
