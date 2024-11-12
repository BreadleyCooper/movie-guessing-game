<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class WinnerModal extends Component
{
    public Movie $dailyMovie;
    public int $guessCount;
    public function mount(Movie $dailyMovie, int $guessCount)
    {
        $this->guessCount = $guessCount;
        $this->dailyMovie = $dailyMovie;
    }
    public function render()
    {
        return view('livewire.winner-modal');
    }
}
