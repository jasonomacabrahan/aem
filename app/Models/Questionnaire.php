<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    use HasFactory;
    protected $primaryKey = 'qid';
    protected $fillable = [
        'qid',
        'question',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
