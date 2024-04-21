<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassificationResult extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'result',
        'result_label'
    ];
}
