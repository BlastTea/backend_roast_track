<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roasting extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'roastery_id',
        'order_id',
        'unit',
        'time_elapsed'
    ];
}
