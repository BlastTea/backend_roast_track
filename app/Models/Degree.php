<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Degree extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'roasting_id',
        'type',
        'env_temp',
        'bean_temp',
        'time_elapsed'
    ];

    public function roasting() {
        return $this->belongsTo(Roasting::class);
    }
}
