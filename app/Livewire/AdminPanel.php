<?php

namespace App\Livewire;

use App\Models\Question;
use App\Models\Game;
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
        $game->stage = $question_id;
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
}
