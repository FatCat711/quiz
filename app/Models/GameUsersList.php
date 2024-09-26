<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameUsersList extends Model
{
    protected $fillable = [
        "game_id",
        "user_id",
    ];

    public $timestamps = false;

    use HasFactory;

    protected $table = 'game_users_lists';
}
