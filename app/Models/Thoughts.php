<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thoughts extends Model
{
    use HasFactory;
    protected $fillable = [
        'activity_id',
        'thoughts',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
