<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassificationRoastingResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'roasting_id',
        'result',
        'resulst_label',
    ]; 
}
