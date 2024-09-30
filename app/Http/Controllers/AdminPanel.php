<?php

namespace App\Http\Controllers;

use App\Models\Answer;
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

    public function store(Game $game)
    {
        $question = new Question();
        $question->question = request()->get('question');
        $question->save();
        $question_list = new QuestionsList();
        $question_list->stage = QuestionsList::all()->count() + 1;
        $question_list->question_id = $question->id;
        $question_list->save();

        for ($i = 1; $i <= 4; $i++) {
            $answer = new Answer();
            $answer->answer = request()->get('answer' . $i);
            if (in_array(strval($i), request()->get('right'))){
                $answer->right = true;
            } else {
                $answer->right = false;
            }
            $answer->question_id = $question->id;
            $answer->save();
        }
        return redirect(route('admin.panel.show', $game->id));
    }
}
