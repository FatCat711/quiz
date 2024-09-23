<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameAdmin extends Controller
{
    public function show(Game $game)
    {
        // dd($id);
        // $game = Game::where('id', $game)->get();
        // dd($game->id);

        return view(
            'game_admin',
            [
                'game' => $game,
            ]
        );
    }
}
