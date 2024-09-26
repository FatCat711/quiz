<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Game as ModelsGame;
use App\Models\Question;
use App\Models\QuestionsList;
use App\Models\UsersScore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Game extends Component
{

    public $game;
    public $show_question;
    public $answers;
    public $checkbox_answers = [];

    public function mount($game)
    {
        $this->game = $game;
    }

    public function render()
    {
        $stage = $this->game->stage;
        $chill_stage = $this->game->chill_stage;

        if ($chill_stage) {
            $text = "oops";
            $this->show_question = false;
        } else {
            $question_on_list = QuestionsList::where(['game_id' => $this->game->id, 'stage' => $stage])->first();
            $question = Question::where('id', $question_on_list->id)->first();
            $this->question_id = $question->id;
//            dd($question);

            $text = $question->question;

            $answers = Answer::where('question_id', $question->id)->get();
            $this->answers = $answers;

            $this->show_question = true;
        }
        // dd($show_question);
        return view('livewire.game', [
            'text' => $text,
        ]);
    }

    public function sendAnswer(){
        if ($this->checkbox_answers){
            $user = Auth::user();
            $user_score = UsersScore::where('user_id', $user->id)->get()->first();
            if ($this->game->stage == $user_score->question){
                $user_score->question = strval(intval($user_score->question) + 1);
                $question_list = QuestionsList::where(['game_id' => $this->game->id, 'stage' => $this->game->stage])->get()->first();
                $answer = Answer::where(['question_id' => $question_list->id, 'right' => 1])->get()->first();
                if ($answer->answer == $this->checkbox_answers){
                    $user_score->score = $user_score->score + 10;
                }
                $user_score->save();
            }
        }

    }

    private function checkTime(){

    }
}
