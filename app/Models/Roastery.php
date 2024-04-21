<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roastery extends BaseModel
{
    use HasFactory;

    protected $table = 'roasteries';

    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'address',
        'phone_number',
        'description',
    ];
}
