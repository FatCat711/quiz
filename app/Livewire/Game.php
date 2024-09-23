<?php

namespace App\Livewire;

use App\Models\Game as ModelsGame;
use App\Models\Question;
use Livewire\Component;

class Game extends Component
{

    public $game;
    public $show_question;

    public function mount($game)
    {
        $this->game = $game;
    }

    public function render()
    {
        if ($this->game->stage == 0) {
            $text = "dadada";
            $this->show_question = false;
        } else {
            $question = Question::where('id', str($this->game->stage))->firstOrFail();
            // dd($question);
            $text = $question->question;
            $this->show_question = true;
        }
        // dd($show_question);
        return view('livewire.game', [
            'text' => $text,
        ]);
    }
}
