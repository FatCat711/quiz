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
    public $show_button;
    public $checkbox_answers = [];
    public $timer;

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
            $time_db = strtotime($this->game->time_start) + 30;
            $this->timer = date('Y-m-dTH:i:s', $time_db);
            $question_on_list = QuestionsList::where(['stage' => $stage])->first();
            $question = Question::where('id', $question_on_list->id)->first();
            //dd($question);

            $text = $question->question;

            $answers = Answer::where('question_id', $question->id)->get();
            $this->answers = $answers;

            $this->show_question = true;
            if ($this->checkTime($this->game->time_start) < 30) {
                $this->show_button = true;
            } else {
                $this->show_button = false;
            }
        }
        // dd($show_question);
        return view('livewire.game', [
            'text' => $text,
        ]);
    }

    public function sendAnswer()
    {
        if ($this->checkbox_answers) {
            $user = Auth::user();
            $this->show_button = false;
            $delta = $this->checkTime($this->game->time_start);
            if ($delta < 30) {
                $user_score = UsersScore::where('user_id', $user->id)->get()->first();
                if ($this->game->stage == $user_score->question) {
                    $user_score->question = strval(intval($user_score->question) + 1);
                    $question_list = QuestionsList::where(['stage' => $this->game->stage])->get()->first();
                    $answer = Answer::where(['question_id' => $question_list->id, 'right' => 1])->get()->first();
                    if ($answer->answer == $this->checkbox_answers) {
                        $user_score->score = $user_score->score + (30 - $delta);
                    }
                    $user_score->save();
                }
            }
        }
    }

    private function checkTime($time_start)
    {
        $time_now = date('d.m.Y H:i:s');
        return strtotime($time_now) - strtotime($time_start);
    }
}
