<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassificationRoastingResult extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'roasting_id',
        'result',
        'resulst_label',
    ]; 
}
