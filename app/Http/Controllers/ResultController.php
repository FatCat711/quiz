<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use App\Models\UsersScore;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show(Game $game)
    {
        $result_table = UsersScore::where('game_id', $game->id)->get();
        $results = [];
        foreach ($result_table as $result) {
            $user = User::find($result->user_id);
            $results[] = ['name' => $user->name, 'score' => $result->score];
        }

        //сортировка по score
        $score = array_column($results, 'score');
        array_multisort($score, SORT_DESC, $results);

        return view(
            'results',
            [
                'game' => $game,
                'results' => $results,
            ]
        );
    }
}
