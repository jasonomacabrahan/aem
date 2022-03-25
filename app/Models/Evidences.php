<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidences extends Model
{
    use HasFactory;

    protected $fillable = [
        'names'

    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['name'] = json_encode($value);
    }
}
