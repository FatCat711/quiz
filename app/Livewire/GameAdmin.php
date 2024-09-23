<?php

namespace App\Livewire;

use Livewire\Component;

class GameAdmin extends Component
{

    public $game;
    public $show_question;

    public function mount($game)
    {
        $this->game = $game;
    }

    public function render()
    {
        return view('livewire.game-admin');
    }
}
