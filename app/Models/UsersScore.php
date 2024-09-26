<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersScore extends Model
{
    protected $table = 'users_score';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'question',
        'score',
    ];
}
