<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roastery extends Model
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
