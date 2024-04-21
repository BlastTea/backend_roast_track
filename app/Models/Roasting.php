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

    public function user() {
        return $this->belongsTo(User::class, 'roastery_id');
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function degrees() {
        return $this->hasMany(Degree::class);
    }

    public function classificationRoastingResults() {
        return $this->hasMany(ClassificationRoastingResult::class);
    }
}
