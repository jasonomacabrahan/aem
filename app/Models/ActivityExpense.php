<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityExpense extends Model
{
    use HasFactory;

    protected $fillable = [
        'activityID',
        'fuelLubricants',
        'travelPerDiem',
        'foodAccommodation',
        'miscExpense',
        'activityNotes',
    ];
}
