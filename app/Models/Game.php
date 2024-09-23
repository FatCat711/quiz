<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'link',
        'link_for_owner',
        'owner_id',
        'stage'
    ];

    use HasFactory;
}
