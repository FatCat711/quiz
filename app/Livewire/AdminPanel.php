<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Game;
use App\Models\QuestionsList;
use Livewire\Component;

class AdminPanel extends Component
{
    public $game;
    public $questions;

    public function mount($game)
    {
        $this->game = $game;
    }

    public function render()
    {
        $this->questions = Question::all();
        return view('livewire.admin-panel');
    }


    public function show_proector($question_id)
    {
        $game = Game::find($this->game->id);
        $question_list = QuestionsList::where('question_id', $question_id)->first();
        $game->stage = $question_list->stage;
        $game->save();
    }

    public function show_user()
    {
        $game = Game::find($this->game->id);
        $game->chill_stage = false;
        $game->time_start = date('d.m.Y H:i:s');
        $game->save();
    }

    public function chill()
    {
        $game = Game::find($this->game->id);
        $game->chill_stage = true;
        $game->save();
    }

    public function delete_question($question_id){
        $question_list = QuestionsList::where('question_id', $question_id)->first();
        $question_list->delete();
        $question = Question::find($question_id);
        $question->delete();
        $answers = Answer::where('question_id', $question_id)->get();
        foreach ($answers as $answer){
            $answer->delete();
        }
    }
}
