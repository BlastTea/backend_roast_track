<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'name',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}
