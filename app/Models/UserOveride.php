<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOveride extends Model
{
    use HasFactory;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];  
    protected $table = "users"; 
    protected $fillable = [
        'name',
        'agency',
        'division',
        'designation',
        'contactNumber',
        'sex',
        'usertype',
        'role_id',
        'email',
        'email_verified_at',
        'password',
    ];
}
