<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;

class LoserModal extends Component
{
    public Movie $selectedMovie;
    public Movie $dailyMovie;
    public function mount(Movie $dailyMovie, Movie $selectedMovie)
    {
        $this->dailyMovie = $dailyMovie;
        $this->selectedMovie = $selectedMovie;
    }
    public function render()
    {
        return view('livewire.loser-modal');
    }
}
