<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Question;
use App\Models\QuestionsList;
use Illuminate\Http\Request;

class AdminPanel extends Controller
{
    public function show(Game $game)
    {

        $questions = Question::all();

        return view(
            'admin_panel',
            [
                'questions' => $questions,
                'game' => $game,
            ]
        );
    }
}
