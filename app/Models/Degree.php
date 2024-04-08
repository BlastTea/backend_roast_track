<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;

    protected $fillable = [
        'roasting_id',
        'type',
        'env_temp',
        'bean_temp',
        'time_elapsed'
    ];
}
