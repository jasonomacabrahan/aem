<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_id',
        'rate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
