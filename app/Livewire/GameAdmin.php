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
    public $timer;

    public function mount($game)
    {
        $this->game = $game;
    }

    //     public function nextStage($chill_stage){
    // //        dd($chill_stage);
    //         $count = QuestionsList::where('game_id', $this->game->id)->get()->count();
    //         if ($count == $this->game->stage){
    //             redirect('/results/' . $this->game->id);
    //         }
    //         if ($chill_stage){
    //             $game = Game::find($this->game->id);
    //             $game->stage = $game->stage + 1;
    //             $game->chill_stage = false;
    //             $game->time_start = date('d.m.Y H:i:s');
    //             $game->save();
    // //            dd(UsersScore::whereIn('question', [$game->stage-1])->get());
    //         } else {
    //             $game = Game::find($this->game->id);
    //             $game->chill_stage = true;
    //             $game->save();
    //             $users_scores = UsersScore::whereIn('question', [$game->stage])->update(['question' => $game->stage+1]);//для отставших меняем стадию
    //         }
    //     }

    public function render()
    {
        $stage = $this->game->stage;
        $chill_stage = $this->game->chill_stage;

        $question_on_list = QuestionsList::where(['stage' => $stage])->first();

        $question = Question::where('id', $question_on_list->question_id)->first();
        $this->question_id = $question->id;

        $text = $question->question;

        $answers = Answer::where('question_id', $question->id)->get();
        $this->answers = $answers;

        $this->show_question = true;

        $time_db = strtotime($this->game->time_start) + 30;
        $this->timer = date('Y-m-dTH:i:s', $time_db);
        // $this->timer = date("s", strtotime(date('Y-m-d H:i:s')) - strtotime($this->game->time_start));
        // dd($this->timer);

        return view('livewire.game-admin', [
            'text' => $text,
        ]);
    }
}
