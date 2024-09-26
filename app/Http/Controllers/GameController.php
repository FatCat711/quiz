<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
//         User::create([
//             'name' => 'admin',
//             'email' => 'admin@test.com',
//             'password' => '123',
//         ]);
        $user = User::where('id', 1)->get();
//         Game::create([
//             'link' => 'http://127.0.0.1:8000/games',
//             'link_for_owner' => 'http://127.0.0.1:8000/games',
//             'owner_id' => 1,
//             'stage' => '0',
//             'questions_list_id' => 1
//         ]);
        $games = Game::all();

        return view('test', [
            'games' => $games,
        ]);
    }

    public function show(Game $game)
    {
        // dd($id);
        // $game = Game::where('id', $game)->get();
        // dd($game);

        return view(
            'game_detail',
            [
                'game' => $game,
            ]
        );
    }
}
