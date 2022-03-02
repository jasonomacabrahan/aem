<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskResolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'taskAssignmentID',
        'resolutionDetails',
        'userID',
        'verifiedBy',
    ];
}
