<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnaireSub extends Model
{
    use HasFactory;
    protected $primaryKey = 'q_sub_id';
    protected $fillable = [
        'qid',
        'question_sub',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
