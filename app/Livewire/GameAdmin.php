<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionsList;
use App\Models\Game;
use App\Models\UsersScore;
use Livewire\Component;

class GameAdmin extends Component
{

    public $game;
    public $show_question;
    public $answers;
    public $question_id;

    public function mount($game)
    {
        $this->game = $game;
    }

    public function nextStage($chill_stage){
//        dd($chill_stage);
        $count = QuestionsList::where('game_id', $this->game->id)->get()->count();
        if ($count == $this->game->stage){
            redirect('/results/' . $this->game->id);
        }
        if ($chill_stage){
            $game = Game::find($this->game->id);
            $game->stage = $game->stage + 1;
            $game->chill_stage = false;
            $game->time_start = date('d.m.Y H:i:s');
            $game->save();
//            dd(UsersScore::whereIn('question', [$game->stage-1])->get());
        } else {
            $game = Game::find($this->game->id);
            $game->chill_stage = true;
            $game->save();
            $users_scores = UsersScore::whereIn('question', [$game->stage])->update(['question' => $game->stage+1]);//для отставших меняем стадию
        }
    }

    public function render()
    {
        $stage = $this->game->stage;
        $chill_stage = $this->game->chill_stage;

        if ($chill_stage) {
            $text = "oooops";
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
        return view('livewire.game-admin', [
            'text' => $text,
        ]);
    }
}
