<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roasting extends Model
{
    use HasFactory;

    protected $fillable = [
        'roastery_id',
        'order_id',
        'unit',
        'time_elapsed'
    ];
}
